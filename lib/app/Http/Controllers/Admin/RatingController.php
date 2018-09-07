<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Course;
use App\Models\Rating;
use App\Models\Teacher;
use App\Models\Teacher_Rating;
use Auth;
class RatingController extends Controller
{
    public function getListCou(){
        $acc = Account::where('id', Auth::user()->id)->first();
    	// if (Auth::user()->level == 3) {
    	// 	$data['items'] = Course::where('cou_tea_id',Auth::user()->id)->orderBy('cou_id','desc')->paginate(7);
    	// }
    	// else{
    	// 	$data['items'] = Course::orderBy('cou_id','desc')->paginate(7);
    	// }
        $data['items'] = Teacher_Rating::where('tr_tea_id', $acc->teacher->tea_id)->get();

    	return view('backend.rating',$data);
    }

    public function getDetail($id){
    	$data['course'] = Course::find($id);
		$data['items'] = Rating::where('rat_cou_id',$id)->orderBy('rat_id','desc')->paginate(8);
    	return view('backend.ratingdetail',$data);
    }
    public function postAdd(Request $request,$slug){
        $course = Course::where('cou_slug',$slug)->first();
        dd('oke');
        $rat = new Rating;
        $rat->rat_star = $request->star;
        $rat->rat_title = $request->title;
        $rat->rat_content = $request->content;
        $rat->rat_acc_id = Auth::user()->id;
        $rat->rat_cou_id = $course->cou_id;
        $rat->save();

        return back();
    }
    public function getEdit($id){
    	$data['rat'] = Rating::find($id);

    	return view('backend.editrating',$data);
    }
    public function postEdit(Request $request,$id){
    	$rat = Rating::find($id);
    	$rat->rat_star = $request->star;
    	$rat->rat_title = $request->title;
    	$rat->rat_content = $request->content;
    	$rat->save();

    	return back();
    }

    public function getDelete($id){
    	Rating::destroy($id);
    	return back();
    }



    //Cập nhật sao
    public function getUpdate($cou_id){
    	$rating = Rating::where('rat_cou_id',$cou_id)->get();
    	$totalRate = 0;

    	foreach ($rating as $item) {
    		$totalRate += $item->rat_star;
    	}

    	$course = Course::find($cou_id);
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
    	
    }
}
