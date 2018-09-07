<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Course;


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
}
