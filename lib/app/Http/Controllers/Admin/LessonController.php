<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Part;
use App\Models\Course;
use App\Models\Doc;
class LessonController extends Controller
{
    public function getLesson($cou_id, $part_id){
    	$data['course'] = Course::find($cou_id);
    	$data['part'] = Part::find($part_id);
    	$data['items'] = Lesson::where('les_part_id',$part_id)->orderBy('les_id','desc')->paginate(8);
    	return view('backend.lesson.add',$data);
    }
    public function postLesson(Request $request, $cou_id,$part_id){
    	$lesson = new Lesson;
    	$lesson->les_name = $request->name;
    	$lesson->les_slug = str_slug($request->name);
    	$lesson->les_part_id = $part_id;
        
        $lesson->les_video_duration = $request->duration;
        $video = $request->file('file');
        
        if ($request->hasFile('file')) {
            $filename = time() . '.' . $video->getClientOriginalExtension();
            $lesson->les_link = $filename;
            $path = public_path().'/uploads/';
            $video->move($path, $filename);
        }
        $lesson->save();

        $part = Part::findOrFail($part_id);
        $part->update_part_duration($lesson->les_video_duration);

        $course = Course::findOrFail($cou_id);
        $course->cou_video += $request->duration;
        $course->save();

        $doc_file = $request->file('file_doc');
        if ($request->hasFile('file_doc')) {
            $doc = new Doc;
            $filename = time() . '.' . $doc_file->getClientOriginalExtension();
            $doc->doc_link = $filename;
            $doc_file->storeAs('doc', $filename);
            $doc->doc_name = $request->name;
            $part->cou->group->gr_parent_id == 0 ? $doc->doc_gr_id = $part->cou->cou_gr_id : $doc->doc_gr_id = $part->cou->group->gr_parent_id;
            $doc->doc_acc_id = $course->tea->id;
            $doc->doc_cou_id = $cou_id;
            $doc->doc_les_id = $lesson->les_id;
            $doc->save();

        }
    	return back()->with('success','Thêm bài học thành công');
    }

    public function getEdit($cou_id, $part_id,$les_id){
    	$data['course'] = Course::find($cou_id);
    	$data['part'] = Part::find($part_id);
    	$data['lesson'] = Lesson::find($les_id);
    	$data['items'] = Lesson::where('les_part_id',$part_id)->orderBy('les_id','desc')->paginate(8);
    	$data['doc'] = Doc::where('doc_les_id', $les_id)->first();
    	return view('backend.lesson.edit',$data);
    }
    public function postEdit(Request $request, $cou_id, $part_id, $les_id){
    	$lesson = Lesson::find($les_id);
    	$lesson->les_name = $request->name;
        $lesson->les_slug = str_slug($request->name);
        $lesson->les_part_id = $part_id;

        $video = $request->file('file');

        if ($request->hasFile('file')) {
            $filename = time() . '.' . $video->getClientOriginalExtension();
            $lesson->les_link = $filename;
            $path = public_path().'/uploads/';
            $video->move($path, $filename);
            $lesson->les_video_duration = $request->duration;
        }
        $lesson->save();

        $part = Part::findOrFail($part_id);
        $part->update_part_duration($lesson->les_video_duration);

        $course = Course::find($cou_id);
        $course->cou_video += $request->duration;
        $course->save();

        $doc_file = $request->file('file_doc');
        if ($request->hasFile('file_doc')) {
            $doc = new Doc;
            $filename = time() . '.' . $doc_file->getClientOriginalExtension();
            $doc->doc_link = $filename;
            $doc_file->storeAs('doc', $filename);
            $doc->doc_name = $request->name;
            $part->cou->group->gr_parent_id == 0 ? $doc->doc_gr_id = $part->cou->cou_gr_id : $doc->doc_gr_id = $part->cou->group->gr_parent_id;
            $doc->doc_acc_id = $course->tea->id;
            $doc->doc_cou_id = $cou_id;
            $doc->doc_les_id = $les_id;
            $doc->save();

        }
    	return back()->with('success','Sửa bài học thành công');
    }
    public function getDelete($id){
    	Lesson::destroy($id);
    	return back()->with('success','Xóa bài học thành công');
    }




}
