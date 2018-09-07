<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Rating;
use Auth;
class RatingController extends Controller
{
    public function postAdd(Request $request,$slug){
        $course = Course::where('cou_slug',$slug)->first();
        $rat = new Rating;
        $rat->rat_star = $request->star;
        $rat->rat_title = $request->title;
        $rat->rat_content = $request->content;
        $rat->rat_acc_id = Auth::user()->id;
        $rat->rat_cou_id = $course->cou_id;
        $rat->save();

        $rating = Rating::where('rat_cou_id',$course->cou_id)->get();
        $totalRate = 0;

        foreach ($rating as $item) {
            $totalRate += $item->rat_star;
        }

        
        if (count($rating) == 0) {
            $course->cou_star = 0;
            $course->save();
            return back()->with('error','Chưa có đánh giá nào');
        }
        else{
            $course->cou_star = $totalRate/count($rating);
            $course->save();
            return back();
        }
        

        return back();
    }
    public function postEdit(Request $request, $id, $slug){
        $course = Course::where('cou_slug',$slug)->first();
    	$rat = Rating::find($id);
        if ($request->star != null) {
            $rat->rat_star = $request->star;
        }
    	
    	$rat->rat_title = $request->title;
    	$rat->rat_content = $request->content;
    	$rat->save();


        $rating = Rating::where('rat_cou_id',$course->cou_id)->get();
        $totalRate = 0;

        foreach ($rating as $item) {
            $totalRate += $item->rat_star;
        }

        
        if (count($rating) == 0) {
            $course->cou_star = 0;
            $course->save();
            return back()->with('error','Chưa có đánh giá nào');
        }
        else{
            $course->cou_star = $totalRate/count($rating);
            $course->save();
            return back();
        }

    	return back();
    }
}
