<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Course;
use simple_html_dom;

include_once __DIR__.'/../../../libary/simple_html_dom.php';

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    function reloadRate($id){
    	$course = Course::find($id);
    	$totalRate = 0;
    	
    	foreach ($course->rating as $item) {
            $totalRate += $item->rat_star;
        }
        if (count($course->rating) == 0) {
            $course->cou_star = 0;
            $course->save();
            return false;
        }
        else{
            $course->cou_star = $totalRate/count($course->rating);
            $course->save();
            return true;
        }

    }

    public static function recusiveGroup($data,$parent_id = 0,$text = "",&$result){
        foreach ($data as $key => $item){
            if($item->gr_parent_id == $parent_id){
                $item->gr_name = $text.$item->gr_name;
                $result [] = $item;
                unset($data[$key]);
                self::recusiveGroup($data,$item->gr_id,$text."--",$result);
            }
        }
    }


    public function getDOM($base_url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_URL, $base_url);
        curl_setopt($curl, CURLOPT_REFERER, $base_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $str = curl_exec($curl);
        curl_close($curl);

        // Create a DOM object
        $html_base = new simple_html_dom();
        $html_base->load($str);
        return $html_base;
    }

    function getDom1($link)
    {
        $ch = curl_init($link);

        $headers = [
            'Content-Type: text/html; charset=utf-8',
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);// Khi thực thi lệnh sẽ k view ra trình duyệt mà lưu lại vào 1 biến kiểu string
        $content = curl_exec($ch);
        curl_close($ch);
        $dom = new simple_html_dom($content);

        return $dom;
    }
}
