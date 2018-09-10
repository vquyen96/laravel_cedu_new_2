<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Course;
use App\Models\Group;
use App\Models\Code;
use App\Models\Teacher;
use App\Models\Teacher_Rating;
use App\Models\Lesson;
use App\Models\Part;
use Auth;
use DateTime;
use File;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function getDashboard(){
    	$acc= Account::find(Auth::user()->id);
    	$data['teacher'] = $acc->teacher;
    	$total_amount = 0;
    	$total_student = 0;
    	$student_month = 0;
    	$date = new DateTime();
    	foreach ($acc->course as $course) {
    		$total_amount += $course->cou_price;
    		// $total_student += $course->cou_student;
    		foreach ($course->orderDe as $orderDe) {
    			if ($orderDe->order->ord_status == 0) {
    				$total_student ++;
                    if (date_format($date,"m") == date_format($orderDe->created_at,"m")) {
                        $student_month ++;
                    }
                }
            }
        }
        $data = [
          'teacher' => $acc->teacher,
          'total_amount' => $total_amount,
          'total_student' => $total_student,
          'student_month' => $student_month
      ];
      return view('frontend.teacher.dashboard', $data);
  }

  public function getCourse(){
        // dd('ok');
   $data['acc']= Account::find(Auth::user()->id);
   $data['course'] = Course::where('cou_tea_id',Auth::user()->id)->paginate(6);
   return view('frontend.teacher.course', $data );
}

public function getTeacher($email){
    $data['teacher'] = Account::where('email',$email)->first();

    if(Auth::check()){
        $data['rate'] = Teacher_Rating::where('tr_acc_id', Auth::user()->id)->where('tr_tea_id',$data['teacher']->teacher->tea_id)->first();
    }
    else{
        $data['rate'] = "";
    }

        // switch ($data['teacher']->teacher->tea_templace) {
        //     case 1:
        //         return view('frontend.teacher1',$data);
        //     case 2:
        //         return view('frontend.teacher2',$data);
        //     case 3:
        //         return view('frontend.teacher3',$data);
        //     default:
        //         return view('frontend.teacher1',$data);
        // }
        // dd($data['teacher']);
    $data['course'] = Course::where('cou_tea_id',$data['teacher']->id)->paginate(6);
    return view('frontend.teacher.profile',$data);
}



public function getTeacherRating($email ,$rate){

        //Check xem người dùng đẵ đăng nhập chưa
    if(Auth::check()){
        $account = Account::find(Auth::user()->id);
        $teacher = Teacher::where('tea_email', $email)->first();
            //check xem tài khoản có đăng ký khóa học không
        $check = 0;
            // dd($teacher);
        foreach ($account->order as $order) {
            if ($order->ord_status == 0) {
                foreach ($order->orderDe as $orderDe) {
                    if($orderDe->course->tea->email == $email){
                        $check = 1;
                    }
                }
            }
        }
        if ($check == 1) {
            $teacher_rating = Teacher_Rating::where('tr_acc_id', Auth::user()->id)->where('tr_tea_id', $teacher->tea_id)->first();
                //Check xem người dùng đã đánh giá hay chưa ??
            if ($teacher_rating == null) {
                    //Tài khoản chưa đánh giá
                $teacher_rating = new Teacher_Rating;
                $teacher_rating->tr_rate = $rate;
                $teacher_rating->tr_tea_id = $teacher->tea_id;
                $teacher_rating->tr_acc_id = $account->id;
                $teacher_rating->save();

                $total_rate = 0;
                foreach ($teacher->rate as $rate) {
                    $total_rate += $rate->tr_rate;
                }
                $teacher->tea_rating = $total_rate/count($teacher->rate);
                $teacher->save();
                return back();
            }
            else{
                    //Tài khoản đã có đánh giá giáo viên
                $teacher_rating->tr_rate = $rate;
                $teacher_rating->tr_tea_id = $teacher->tea_id;
                $teacher_rating->tr_acc_id = $account->id;
                $teacher_rating->save();

                $total_rate = 0;
                foreach ($teacher->rate as $rate) {
                    $total_rate += $rate->tr_rate;
                }
                $teacher->tea_rating = $total_rate/count($teacher->rate);
                $teacher->save();
                return back();
            }
        }
        else{
            return back()->with("error","Bạn chưa học khóa học nào của giáo viên này");
        }
    }
    else{
        return back()->with("error","Bạn Phải đăng nhập để đánh giá giáo viên");
    }
}

public function getProfile(){
   $acc= Account::find(Auth::user()->id);
   $data['user'] = $acc;
   $data['course'] = $acc->course;
   return view('frontend.teacher.personal', $data);
}
public function postProfile(Request $request){
   $acc = Account::find(Auth::user()->id);
   $data = $request->acc;

   $image = $request->file('img');
   if ($request->hasFile('img')) {
    $data['img'] = saveImage([$image], 200, 'avatar');
            // dd($data);
}
$acc->update($data);

unset($data);
$teacher = Teacher::find($acc->teacher->tea_id);
$data = $request->teacher;

$teacher->update($data);

return back()->with('success', 'Cập nhật thành công');

}


public function getDetailCourse($slug){
    $acc= Account::find(Auth::user()->id);
    $data['user'] = $acc;
    $data['course'] = Course::where('cou_slug',$slug)->first();
    $data['group'] = Group::where('gr_parent_id',0)->get();
    return view('frontend.teacher.detail', $data);
}
public function postDetailCourse(Request $request, $slug){
    $cou = Course::where('cou_slug',$slug)->first();
    $course = $request->cou;
    $course['cou_slug'] = str_slug($course['cou_name']);
    $course['cou_tea_id'] = Auth::user()->id;
    $image = $request->file('img');
    if ($request->hasFile('img')) {
        $course['cou_img']  = saveImage([$image], 360, 'course');
    }

    if (!$cou->update($course)) {
        return back()->with('error', 'Lỗi sửa khóa học')->withInput($request->all());
    }

    return redirect('teacher/courses')->with('success','Sửa khóa học thành công');
}

public function getAddCourse(){

    $acc= Account::find(Auth::user()->id);
    $data['user'] = $acc;
    $data['course'] = (object)[
        'cou_id' => '',
        'cou_name' => '',
        'cou_img' => '1',
        'cou_price' => 0,
        'cou_level' => 3,
        'cou_type' => 1,
        'cou_gr_id' => '',
        'cou_gr_child' => '',
        'cou_content' => 'Nội dung của khóa học'
    ];
    $data['group'] = Group::where('gr_parent_id',0)->get();

    return view('frontend.teacher.detail', $data);
}

    public function postAddCourse(Request $request){
        $course = $request->cou;
        $course['cou_slug'] = str_slug($course['cou_name']);
        $course['cou_tea_id'] = Auth::user()->id;
        $image = $request->file('img');
        if ($request->hasFile('img')) {
            $course['cou_img']  = saveImage([$image], 360, 'course');
        }else{
            return back()->with('error', 'Khóa học chưa có ảnh')->withInput($request->all());
        }
        if (!Course::create($course)) {
            return back()->with('error', 'Lỗi thêm khóa học');
        }
        return redirect('teacher/courses/'.$course['cou_slug']); 

    }


    public function postPart(Request $request,$id){
        $part = new Part;
        $part->part_name = $request->part_name;
        $part->part_cou_id = $id;
        $part->save();
        return back();
    }


    //POST VIDEO COURSE
    public function postVideo(Request $request,$id){

        $lesson = new Lesson;
        $lesson->les_name = $request->les_name;
        $lesson->les_slug = str_slug($request->les_name);
        $lesson->les_part_id = $id;

        $lesson->les_video_duration = gmdate("i:s", $request->duration);
        $video = $request->file('file');

        if ($request->hasFile('file')) {
            $filename = time() . '.' . $video->getClientOriginalExtension();
            $lesson->les_link = $filename;
            $path = public_path().'/uploads/';
            $video->move($path, $filename);
        }
        $lesson->save();

        return back()->with('success','Thêm bài học thành công');

    }

    // EDIT PART
    public function editPart($id,Request $request){
        $part = Part::find($id);
        $part->part_name = $request->part_name;
        $part->save();
        return back();
    }

    // DELETE PART
    public function destroyPart($id){
        $video = Lesson::where('les_part_id',$id)->get();
        foreach ($video as $key => $item) {
            File::delete('lib/public/uploads/'.$item->les_link);
            Lesson::destroy($item->les_id);
        }
        Part::destroy($id);
        return back();
    }

    //EDIT VIDEO
    public function editVideo($id,Request $request){

        $lesson = Lesson::find($id);
        $lesson->les_name = $request->les_name;
        $lesson->les_slug = str_slug($request->les_name);

        $lesson->les_video_duration = gmdate("i:s", $request->duration);
        $video = $request->file('file');

        if ($request->hasFile('file')) {
            File::delete('lib/public/uploads/'.$lesson->les_link);
            $filename = time() . '.' . $video->getClientOriginalExtension();
            $lesson->les_link = $filename;
            $path = public_path().'/uploads/';
            $video->move($path, $filename);
           
        }
        $lesson->save();
        return back();
    }


    //DELETE LESSON
    public function destroyLesson($id){
        $video = Lesson::find($id);
        File::delete('lib/public/uploads/'.$video->les_link);
        Lesson::destroy($id);
        return back();
    }

}
