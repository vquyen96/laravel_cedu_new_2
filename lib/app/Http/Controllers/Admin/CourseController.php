<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Group;
use App\Models\Account;
use Auth;
use File;
use Illuminate\Foundation\Validation\ValidatesRequests;
class CourseController extends Controller
{
    public function getListWait(){
        $data['items'] = Course::orderBy('cou_name','asc')->where('cou_status', '0')->paginate(20);
        return view('backend.course.list',$data);
    }
    public function getList(){
        if(Auth::user()->level == 7){
            $data['items'] = Course::where('cou_tea_id',Auth::user()->id)->orderBy('cou_id','desc')->paginate(7);
        }
        else{
            $data['items'] = Course::orderBy('cou_name','asc')->where('cou_status', '1')->paginate(20);
        }
    	
    	return view('backend.course.list',$data);
    }
    public function getAdd(){
    	$data['tea'] = Account::where('level',7)->get();
    	$data['group'] = Group::where('gr_parent_id', 0)->get();
    	return view('backend.course.add',$data);
    }
    public function postAdd(Request $request){
    	$cou = new Course;
        $cou->cou_name = $request->cou_name;
		$cou->cou_slug = str_slug($request->cou_name);
        $image = $request->file('img');
        if ($request->hasFile('img')) {
            $cou->cou_img = saveImage([$image], [360, 200, 100], 'course');
        }else{
            return back()->with('error', 'Khóa học chưa có ảnh')->withInput($request->all());
        }
        $cou->cou_price = $request->cou_price;
        $cou->cou_level = $request->cou_level;
        $cou->cou_content = $request->content;
        $cou->cou_video = '0';
        $cou->cou_star = 0;
        // $cou->cou_gr_id = $request->cou_gr_id;
        
        $cou->cou_tag = $request->cou_tag;
        $cou->cou_featured = $request->cou_featured;
        
        if (isset($request->cou_gr_child_id) ) {
            $cou->cou_gr_id = $request->cou_gr_child_id;
        }
        

        if (Auth::user()->level == 7) {
            $cou->cou_sale = 0;
            $cou->cou_student = 0;
            $cou->cou_student_fake = 0;
        	$cou->cou_tea_id = Auth::user()->id;
            $cou->cou_status = 0;
        }
        else{
            if ($request->cou_sale == null && $request->cou_price_old == null) {
                $cou->cou_sale = 0;
                $cou->cou_price_old = null;
            }
            else if ($request->cou_price_old == null && $request->cou_sale != null) {
                $cou->cou_sale = $request->cou_sale;
                $cou->cou_price_old = ROUND(100*$cou->cou_price/ (100 - $cou->cou_sale));
            }else if ($request->cou_price_old != null && $request->cou_sale == null) {
                $cou->cou_price_old = $request->cou_price_old;
                $cou->cou_sale = ROUND(100*($cou->cou_price_old-$cou->cou_price)/ $cou->cou_price_old );
            }else{
                $cou->cou_sale = $request->cou_sale;
                $cou->cou_price_old = $request->cou_price_old;
            }


            if ($request->cou_student == null) {
                $cou->cou_student = 0;
            }
            else{
               $cou->cou_student = $request->cou_student; 
            }
            
        	$cou->cou_tea_id = $request->cou_tea_id;
            $cou->cou_status = 1;
        }
        $cou->save();

    	return redirect('admin/course')->with('success','Thêm khóa học thành công');
    }
    public function getEdit($id){
    	$data['tea'] = Account::where('level',7)->get();
    	$data['group'] = Group::where('gr_parent_id', 0)->get();
        $data['item'] = Course::find($id);
        if ($data['item']->group->gr_parent_id == 0 ) {
            $data['item']->cou_gr_child_id = '';
            $data['group_child'] = Group::where('gr_parent_id',$data['item']->group->gr_id)->get();
        }
        else{

            $data['item']->cou_gr_child_id = $data['item']->cou_gr_id;
            $data['item']->cou_gr_id = $data['item']->group->gr_parent_id;
            $data['group_child'] = Group::where('gr_parent_id',$data['item']->group->gr_parent_id)->get();
        }
        $i=0;
        // dd($data['item']);
        foreach ($data['item']->part as $part) {
            foreach ($part->lesson as $item) {
                $i++;
            }
        }
        $data['lesson'] = $i;
        // dd($data);
        return view('backend.course.edit', $data);
    }
    public function postEdit(Request $request, $id){
        $cou  = Course::find($id);
        $cou->cou_name = $request->cou_name;
        $cou->cou_slug = str_slug($request->cou_name);
        $image = $request->file('img');
        if ($request->hasFile('img')) {
            $size = [360, 200, 100];
            File::delete('lib/storage/app/course/'.$cou->cou_img);
            foreach ($size as $sz) {
                File::delete('lib/storage/app/course/resized'.$sz.'-'.$cou->cou_img);
            }
            $cou->cou_img = saveImage([$image], $size, 'course');
        }
        $cou->cou_price = $request->cou_price;
        $cou->cou_level = $request->cou_level;
        $cou->cou_content = $request->content;
        // $cou->cou_gr_id = $request->cou_gr_id;
        $cou->cou_tag = $request->cou_tag;
        $cou->cou_featured = $request->cou_featured;
        

        if (isset($request->cou_gr_child_id) ) {
            $cou->cou_gr_id = $request->cou_gr_child_id;
        }

        if (Auth::user()->level == 7) {
            $cou->cou_tea_id = Auth::user()->id;
        }
        else{
            if ($request->cou_sale == null && $request->cou_price_old == null) {
                $cou->cou_sale = 0;
                $cou->cou_price_old = null;
            }
            else if ($request->cou_price_old == null && $request->cou_sale != null) {
                $cou->cou_sale = $request->cou_sale;
                $cou->cou_price_old = ROUND(100*$cou->cou_price/ (100 - $cou->cou_sale));
            }else if ($request->cou_price_old != null && $request->cou_sale == null) {
                $cou->cou_price_old = $request->cou_price_old;
                $cou->cou_sale = ROUND(100*($cou->cou_price_old-$cou->cou_price)/ $cou->cou_price_old );
                // dd(($cou->cou_price_old-$cou->cou_price)/ $cou->cou_price_old );
                
            }else{
                $cou->cou_sale = $request->cou_sale;
                $cou->cou_price_old = $request->cou_price_old;
            }
            $cou->cou_student_fake = $request->cou_student_fake;
            $cou->cou_tea_id = $request->cou_tea_id;
        }
        $cou->save();


        return redirect('admin/course')->with('success','Sửa khóa học thành công');
    }

    public function getStudent($id){
        $data['course'] = Course::find($id);
        $data['orderDe'] = $data['course']->orderDe;

        return view('backend.student',$data);
    }
    public function getDelete($id){
        $course = Course::find($id);
        File::delete('lib/storage/app/course/'.$course->cou_img);
        File::delete('lib/storage/app/course/resized360-'.$course->cou_img);
        File::delete('lib/storage/app/course/resized200-'.$course->cou_img);
        File::delete('lib/storage/app/course/resized100-'.$course->cou_img);
        Course::destroy($id);
        return redirect('admin/course');
    }
    public function getDown($id){
        $cou = Course::find($id);
        $cou->cou_status = 0;
        $cou->save();
        return back()->with('success', 'gỡ xuống thành công');
    }
    public function getUp($id){
        $cou = Course::find($id);
        $cou->cou_status = 1;
        $cou->save();
        return back()->with('success', 'Đăng lên thành công');
    }
}
