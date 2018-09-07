<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Part;
use App\Models\Course;
class PartController extends Controller
{
    public function getPart($id){
        $data['course'] = Course::find($id);
    	$data['items'] = Part::where('part_cou_id',$id)->orderBy('part_id','desc')->paginate(8);
    	return view('backend.part',$data);
    }
    public function postPart(Request $request,$id){
    	$part = new Part;
    	$part->part_name = $request->name;
    	$part->part_cou_id = $id;
    	$part->save();
    	return back()->with('success','Thêm thành công');
    }
    public function getEdit( $cou_id, $part_id){
        $data['course'] = Course::find($cou_id);
    	$data['part'] = Part::find($part_id);
    	$data['items'] = Part::where('part_cou_id',$cou_id)->orderBy('part_id','desc')->paginate(8);
    	return view('backend.editpart',$data);
    }
    public function postEdit(Request $request, $cou_id, $part_id){
    	$part = Part::find($part_id);
    	$part->part_name = $request->name;
    	$part->save();
    	return back()->with('success','Sửa thành công');
    }
    public function getDelete($id){
    	Part::destroy($id);
    	return back();
    }
}
