<?php

namespace App\Http\Controllers\Admin;

use App\Models\Account;
use App\Models\Course;
use App\Models\Code;
use App\Models\News;
use App\Models\Sale;
use App\Models\Teacher;
use App\Models\Aff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Simple_html_dom\simple_html_dom;
use DateTime;
class UpdateController extends Controller
{
    public function course_student(){
        // $html = file_get_html('https://edumall.vn/');
        // echo $html;
    	$courses = Course::all();
    	foreach ($courses as $course) {
    		$cou_student = 0;
    		foreach ($course->orderDe as $orderDe) {
    			if ($orderDe->order->ord_status == 0) {
					$cou_student++;
				}
    		}
    		$course->cou_student = $cou_student;
    		$course->save();
    	}
    	return redirect('admin')->with('success', 'Cập nhật xong');
    }
    public function course_star(){
    	$courses = Course::all();
    	
    	foreach ($courses as $course) {
    		$totalRate = 0;
    		foreach ($course->rating as $item) {
	            $totalRate += $item->rat_star;
	        }
	        if (count($course->rating) == 0) {
	            $course->cou_star = 0;
	        }
	        else{
	            $course->cou_star = $totalRate/count($course->rating);
	        }
	        $course->save();
    	}
	    
    	return redirect('admin')->with('success', 'Cập nhật xong');
    }

    public function course_video(){
    	$courses = Course::all();
    	foreach ($courses as $course) {
    		$part_video_duration = 0;
    		$cou_video = 0;
    		foreach ($course->part as $part) {
    			$les_video_duration	= 0;
    			foreach ($part->lesson as $lesson) {
    				$les_video_duration += $lesson->les_video_duration;
    				$cou_video++;
    			}
    			$part->part_video_duration = $les_video_duration;
    			$part->save();
    			$part_video_duration += $part->part_video_duration;
    		}
    		$course->cou_video_duration = $part_video_duration;
    		$course->cou_video = $cou_video;
    		$course->save();
    	}

    	return redirect('admin')->with('success', 'Cập nhật xong');

    }


    function clone(Request $request){
        $link = "https://edumall.vn/goc-chia-se/chu-de/kinh-doanh-khoi-nghiep";

        $this->create_data_news($link);
        dd('chào đại ca');
    }

    function create_data_news($link){
        

        $html_home = $this->getDom1($link);

        $html_home = $html_home->load($html_home->__toString());

        $articles = $html_home->find(".thumbnail");

        // dd($link_articles);
        $list_link = [];
        $list_article = [];
        $count = 0;
        foreach ($articles as $article) {
            $link_article = $article->find("a", 0);
            $arr_link = explode('/', $link_article->href);
            if (isset($arr_link[2]) && $arr_link[2] == 'bai-viet') {
                $list_link[] =  $link_article->href;
                $html_article = $this->getDom1('https://edumall.vn'.$link_article->href);
                $news_exists = News::where('news_slug', $arr_link[3])->first();
                if ($news_exists == null) {
                    $list_article[$count]['news_slug'] = $arr_link[3];
                    $list_article[$count]['news_title'] = $html_article->find("h1.title_articles",0)->innertext;
                    $list_article[$count]['news_img'] = $html_article->find(".img_post img",0)->src;
                    $list_article[$count]['news_content'] = $html_article->find(".content_articles",0)->innertext;
                    $list_article[$count]['news_type'] = 2;
                    $tags = $article->find("small .tag");
                    $list_tags = [];
                    $list_tags_slug = [];
                    foreach ($tags as $tag) {
                        $list_tags[] = $tag->innertext;
                        $list_tags_slug[] = str_slug($tag->innertext);
                    }
                    $list_article[$count]['news_tag'] = implode(",", $list_tags);
                    $list_article[$count]['news_tag_slug'] = implode(",", $list_tags_slug);
                    News::insert($list_article[$count]);
                    $count++;
                }
                
            }
        }
            
    }

    public function sale_teacher(){
        $teachers = Teacher::all();
        $date = new DateTime();
        for ($i=0; $i < 5; $i++) { 
            date_add($date,date_interval_create_from_date_string(" -1 months"));
            foreach ($teachers as $tea) {
                $sale = Sale::where('acc_id',$tea->acc->id)->where('time',date_format($date,"m-Y"))->first();
                // dd($sale);
                if ($sale == null) {
                    $discount = $tea->tea_discount;
                    $total = 0;
                    $cou = 0;
                    foreach ($tea->acc->course as $course) {
                        foreach ($course->orderDe as $orderDe) {
                            if ($orderDe->order->ord_status == 0 && date_format($date,"m") == date_format($orderDe->created_at,"m")) {
                                $total += $orderDe->orderDe_price;
                                $cou++;
                            }
                        }
                    }
                    $sale = new Sale;
                    $sale->total = $total;
                    $sale->discount = $discount;
                    $sale->profit = ($total*$discount)/100;
                    $sale->cou = $cou;
                    $sale->time = date_format($date,"m-Y");
                    $sale->acc_id = $tea->acc->id;
                    // $data = [
                    //     'total' => $total,
                    //     'discount' => $discount,
                    //     'profit' => ($total*$discount)/100,
                    //     'time' => date_format($date,"m-Y"),
                    //     'acc_id' => $tea->acc->id
                    // ];
                    // Sale::insert($data);
                    $sale->save();
                }
            }
        }
    }
    public function sale_aff(){
        $affs = Aff::all();
        $date = new DateTime();
        for ($i=0; $i < 5; $i++) {
            date_add($date,date_interval_create_from_date_string(" -1 months"));
            foreach ($affs as $aff) {
                $sale = Sale::where('acc_id',$aff->acc->id)->where('time',date_format($date,"m-Y"))->first();
                if ($sale == null) {
                    $total = 0;
                    $cou = 0;
                    foreach ($aff->acc->aff_orderDe as $orderDe) {
                        if ($orderDe->order->ord_status == 0 && date_format($date,"m") == date_format($orderDe->created_at,"m")) {
                            $total += $orderDe->orderDe_price;
                            $cou++;
                        }
                    }
                    $sale = new Sale;
                    $sale->total = $total;
                    $sale->discount = aff_discount($total);
                    $sale->profit = aff_profit($total);
                    $sale->cou = $cou;
                    $sale->time = date_format($date,"m-Y");
                    $sale->acc_id = $aff->acc->id;
                    // $data = [
                    //     'total' => $total,
                    //     'discount' => $discount,
                    //     'profit' => ($total*$discount)/100,
                    //     'time' => date_format($date,"m-Y"),
                    //     'acc_id' => $tea->acc->id
                    // ];
                    // Sale::insert($data);
                    $sale->save();
                }
                    
            }
            
        }
            
    }
}
