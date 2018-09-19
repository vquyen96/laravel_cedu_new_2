<?php

namespace App\Http\Controllers\Admin;

use App\Models\Account;
use App\Models\Course;
use App\Models\Code;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Simple_html_dom\simple_html_dom;

class UpdateController extends Controller
{
    public function course_student(){
        $html = file_get_html('https://edumall.vn/');
        echo $html;
    // 	$courses = Course::all();
    // 	foreach ($courses as $course) {
    // 		$cou_student = 0;
    // 		foreach ($course->orderDe as $orderDe) {
    // 			if ($orderDe->order->ord_status == 0) {
				// 	$cou_student++;
				// }
    // 		}
    // 		$course->cou_student = $cou_student;
    // 		$course->save();
    // 	}
    // 	return redirect('admin')->with('success', 'Cập nhật xong');
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
}
