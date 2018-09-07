<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Part;
use App\Models\Course;
class LessonController extends Controller
{
    public function getLesson($cou_id, $part_id){
    	$data['course'] = Course::find($cou_id);
    	$data['part'] = Part::find($part_id);
    	$data['items'] = Lesson::where('les_part_id',$part_id)->orderBy('les_id','desc')->paginate(8);
    	return view('backend.lesson',$data);
    }
    public function postLesson(Request $request, $cou_id,$part_id){
    	$lesson = new Lesson;
    	$lesson->les_name = $request->name;
    	$lesson->les_slug = str_slug($request->name);
    	$lesson->les_part_id = $part_id;
        
        $lesson->les_video_duration = gmdate("i:s", $request->duration);
        $video = $request->file('file');
        
        if ($request->hasFile('file')) {
            $filename = time() . '.' . $video->getClientOriginalExtension();
            $lesson->les_link = $filename;
            $path = public_path().'/uploads/';
            $video->move($path, $filename);
        }
        $lesson->save();

        $course = Course::find($cou_id);
        $course->cou_video += $request->duration;
        $course->save();
    	return back()->with('success','Thêm bài học thành công');
    }

    public function getEdit($cou_id, $part_id,$les_id){
    	$data['course'] = Course::find($cou_id);
    	$data['part'] = Part::find($part_id);
    	$data['lesson'] = Lesson::find($les_id);
    	$data['items'] = Lesson::where('les_part_id',$part_id)->orderBy('les_id','desc')->paginate(8);
    	return view('backend.editlesson',$data);
    }
    public function postEdit(Request $request, $cou_id, $part_id, $les_id){
    	$lesson = Lesson::find($les_id);
    	$lesson->les_name = $request->name;
        $lesson->les_slug = str_slug($request->name);
        $lesson->les_part_id = $part_id;
        $lesson->les_video_duration = gmdate("i:s", $request->duration);
        $video = $request->file('file');

        if ($request->hasFile('file')) {
            $filename = time() . '.' . $video->getClientOriginalExtension();
            $lesson->les_link = $filename;
            $path = public_path().'/uploads/';
            $video->move($path, $filename);
        }
        $lesson->save();

        $course = Course::find($cou_id);
        $course->cou_video += $request->duration;
        $course->save();
    	return back()->with('success','Sửa bài học thành công');
    }
    public function getDelete($id){
    	Lesson::destroy($id);
    	return back()->with('success','Xóa bài học thành công');
    }
}
