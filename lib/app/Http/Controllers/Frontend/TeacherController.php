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
use App\Models\Doc;
use App\Models\Account_Request;
use App\Models\Sale;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;

use Auth;
use DateTime;
use File;
use Mail;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function getDashboard()
    {
        app('App\Http\Controllers\Admin\UpdateController')->sale_teacher();

        $acc = Account::find(Auth::user()->id);
        $data['teacher'] = $acc->teacher;
        $total_sale = $acc->sale->sum('total');
        $total_profit = $acc->sale->sum('profit');
        $total_student = $acc->sale->sum('cou');


        $month_student = 0;
        $month_sale = 0;

        $date = new DateTime();
        foreach ($acc->course as $course) {
            foreach ($course->orderDe as $orderDe) {
                if ($orderDe->order->ord_status == 0) {
                    if (date_format($date, "m") == date_format($orderDe->created_at, "m")) {
                        $month_student++;
                        $month_sale += $orderDe->orderDe_price;
                    }
                }
            }
        }


        $data = [
            'teacher' => $acc->teacher,
            'total_profit' => $total_profit,
            'total_sale' => $total_sale,
            'total_student' => $total_student,
            'month_student' => $month_student,
            'month_sale' => $month_sale

        ];
        return view('frontend.teacher.dashboard', $data);
    }

    public function getCourse()
    {
        $data['acc'] = Account::find(Auth::user()->id);
        $data['course'] = Course::where('cou_tea_id', Auth::user()->id)->paginate(6);
        return view('frontend.teacher.course', $data);
    }

    public function getTeacher($email)
    {
        $data['teacher'] = Account::where('email', $email)->first();

        if (Auth::check()) {
            $data['rate'] = Teacher_Rating::where('tr_acc_id', Auth::user()->id)->where('tr_tea_id', $data['teacher']->teacher->tea_id)->first();
        } else {
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
        $courses = Course::where('cou_tea_id', $data['teacher']->id)->paginate(6);
        foreach ($courses as $key => $item) {
            if ($item->group->gr_parent_id != 0) {
                $item->group->gr_name = Group::find($item->group->gr_parent_id)->gr_name;
            }
        }
        $data['course'] = $courses;
        // dd($data['teacher']->rate);
        return view('frontend.teacher.profile', $data);
    }


    public function getTeacherRating($email, $rate)
    {

        //Check xem người dùng đẵ đăng nhập chưa
        if (Auth::check()) {
            $account = Account::find(Auth::user()->id);
            $teacher = Teacher::where('tea_email', $email)->first();
            //check xem tài khoản có đăng ký khóa học không
            $check = 0;
            // dd($teacher);
            foreach ($account->order as $order) {
                if ($order->ord_status == 0) {
                    foreach ($order->orderDe as $orderDe) {
                        if ($orderDe->course->tea->email == $email) {
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
                    $teacher->tea_rating = $total_rate / count($teacher->rate);
                    $teacher->save();
                    return back();
                } else {
                    //Tài khoản đã có đánh giá giáo viên
                    $teacher_rating->tr_rate = $rate;
                    $teacher_rating->tr_tea_id = $teacher->tea_id;
                    $teacher_rating->tr_acc_id = $account->id;
                    $teacher_rating->save();

                    $total_rate = 0;
                    foreach ($teacher->rate as $rate) {
                        $total_rate += $rate->tr_rate;
                    }
                    $teacher->tea_rating = $total_rate / count($teacher->rate);
                    $teacher->save();
                    return back()->with("success", "Đánh giá thành công");;
                }
            } else {
                return back()->with("error", "Bạn chưa học khóa học nào của giáo viên này");
            }
        } else {
            return back()->with("error", "Bạn Phải đăng nhập để đánh giá giáo viên");
        }
    }

    public function getProfile()
    {
        $acc = Account::find(Auth::user()->id);
        $data['user'] = $acc;
        $data['course'] = $acc->course;
        return view('frontend.teacher.personal', $data);
    }

    public function postProfile(Request $request)
    {
        $acc = Account::find(Auth::user()->id);
        $data = $request->acc;

        $image = $request->file('img');
        // dd($image);
        if ($request->hasFile('img')) {
            if (filesize($image) < 2000000) {
                $data['img'] = saveImage([$image], [50, 250, 360], 'avatar');
            } else {
                return back()->with('error', 'Dung lượng ảnh của bạn quá lớn');
            }


        }
        $acc->update($data);

        unset($data);
        $teacher = Teacher::find($acc->teacher->tea_id);
        $data = $request->teacher;

        $teacher->update($data);

        return back()->with('success', 'Cập nhật thành công');

    }


    public function getDetailCourse($slug)
    {
        $acc = Account::find(Auth::user()->id);

        $cou = Course::where('cou_slug', $slug)->first();
        // dd($cou->cou_id);
        if ($cou == null) {
            return redirect('teacher/courses');
        }
        // dd($cou);
        $gr_child = [];
        if ($cou->group->gr_parent_id == 0) {
            $cou->cou_gr_child_id = null;
            $cou->cou_gr_name = $cou->group->gr_name;
        } else {
            $cou->cou_gr_child_id = $cou->cou_gr_id;
            $cou->cou_gr_child_name = Group::find($cou->cou_gr_child_id)->gr_name;

            $cou->cou_gr_id = $cou->group->gr_parent_id;
            $cou->cou_gr_name = Group::find($cou->cou_gr_id)->gr_name;
            $gr_child = Group::where('gr_parent_id', $cou->group->gr_parent_id)->get();
        }
        // dd($cou);
        $gr = Group::where('gr_parent_id', 0)->get();
        $docs = Doc::where('doc_cou_id', $cou->cou_id)->get();

        foreach ($cou->part as $part) {
            foreach ($part->lesson as $lesson) {
                foreach ($docs as $doc) {
                    // dd($lesson);
                    if ($doc->doc_les_id == $lesson->les_id) {
                        // dd($doc);
                        $lesson->les_doc_link = $doc->doc_link;
                    }
                }
            }
        }
        // dd($cou->part->get(0)->lesson);
        $data = [
            'user' => $acc,
            'course' => $cou,
            'group' => $gr,
            'group_child' => $gr_child,
            'docs' => $docs
        ];
        return view('frontend.teacher.detail', $data);
    }

    public function postDetailCourse(Request $request, $slug)
    {
        $cou = Course::where('cou_slug', $slug)->first();
        $course = $request->cou;
        $course['cou_slug'] = str_slug($course['cou_name']);
        $course['cou_tea_id'] = Auth::user()->id;
        if (!isset($course['cou_gr_child_id'])) {
            unset($course['cou_gr_child_id']);
        } else {
            $course['cou_gr_id'] = $course['cou_gr_child_id'];
            unset($course['cou_gr_child_id']);
        }
        $image = $request->file('img');
        if ($request->hasFile('img')) {
            $size = [360, 200, 100];
            File::delete('lib/storage/app/course/' . $cou->cou_img);
            foreach ($size as $sz) {
                File::delete('lib/storage/app/course/resized' . $sz . '-' . $cou->cou_img);
            }
            $course['cou_img'] = saveImage([$image], $size, 'course');
        }

        if (!$cou->update($course)) {
            return back()->with('error', 'Lỗi sửa khóa học')->withInput($request->all());
        }

        return redirect('teacher/courses/' . $cou->cou_slug)->with('success', 'Sửa khóa học thành công');
    }

    public function getAddCourse()
    {
        // dd(gmdate("i:s", '654651'));
        // $les = Lesson::all();

        // foreach ($les as $item) {
        //     $duration = explode(":",$item->les_video_duration);
        //     if (isset($duration[1])) {
        //         $item->les_video_duration = $duration[0]*60+$duration[1];
        //         $item->save();
        //     }
        // }


        // $parts = Part::all();
        // foreach ($parts as $part) {
        //     $part->part_video_duration = 0;
        //     foreach ($part->lesson as $lesson) {
        //         $part->part_video_duration += (double)$lesson->les_video_duration;

        //     }
        //     $part->save();
        // }
        $acc = Account::find(Auth::user()->id);
        $list_group = Group::get()->toArray();
        // if (count($list_group)) $this->recusiveGroup($list_group,0,"",$result);
        // else $result = [];
        // $data['list_gr'] = $result;
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
            'cou_content' => 'Nội dung của khóa học',
            'cou_summary' => 'Cedu cung cấp cho các bạn những khoá học đa dạng và chất lượng nhất',
            'cou_gr_name' => '',
            'cou_gr_child_name' => ''


        ];
        $data['group_child'] = [];
        $data['docs'] = [];
        $data['group'] = Group::where('gr_parent_id', 0)->get();

        return view('frontend.teacher.detail', $data);
    }

    public function postAddCourse(Request $request)
    {
        $course = $request->cou;
        $course['cou_slug'] = str_slug($course['cou_name']);
        $course['cou_tea_id'] = Auth::user()->id;
        $image = $request->file('img');
        if ($request->hasFile('img')) {
            $size = [360, 200, 100];
            $course['cou_img'] = saveImage([$image], $size, 'course');
        } else {
            return back()->with('error', 'Khóa học chưa có ảnh')->withInput($request->all());
        }
        if (!isset($course['cou_gr_child_id'])) {
            unset($course['cou_gr_child_id']);
        } else {
            $course['cou_gr_id'] = $course['cou_gr_child_id'];
            unset($course['cou_gr_child_id']);
        }
        if (!Course::create($course)) {
            return back()->with('error', 'Lỗi thêm khóa học');
        }
        return redirect('teacher/courses/' . $course['cou_slug']);

    }


    public function postPart(Request $request, $id)
    {
        $part = new Part;
        $part->part_name = $request->part_name;
        $part->part_cou_id = $id;
        $part->save();
        return back();
    }


    //POST VIDEO COURSE
    public function postVideo(Request $request, $id)
    {
        // gmdate("i:s", $request->duration)
        // dd($request->all());
        $lesson = new Lesson;
        $lesson->les_name = $request->les_name;
        $lesson->les_slug = str_slug($request->les_name);
        $lesson->les_part_id = $id;

        $lesson->les_video_duration = $request->duration;
        $video = $request->file('file');

        if ($request->hasFile('file')) {
            $filename = time() . '.' . $video->getClientOriginalExtension();
            $lesson->les_link = $filename;
            $path = public_path() . '/uploads/';
            $video->move($path, $filename);
        } else {
            return back()->with('error', 'Không có file upload');
        }

        $lesson->save();
        // Lưu thời lượng video vào bài giảng
        $part = Part::find($id);
        $part->part_video_duration = (int)$part->part_video_duration + (int)$lesson->les_video_duration;
        $part->save();

        $doc_file = $request->file('file_doc');
        if ($request->hasFile('file_doc')) {
            $doc = new Doc;
            $filename = time() . '.' . $doc_file->getClientOriginalExtension();
            $doc->doc_link = $filename;
            $doc_file->storeAs('doc', $filename);
            $doc->doc_name = $request->les_name;
            $part->cou->group->gr_parent_id == 0 ? $doc->doc_gr_id = $part->cou->cou_gr_id : $doc->doc_gr_id = $part->cou->group->gr_parent_id;
            $doc->doc_acc_id = Auth::user()->id;
            $doc->doc_cou_id = $part->cou->cou_id;
            $doc->doc_les_id = $lesson->les_id;
            $doc->save();

        }
        // Lưu thời lượng video vào khóa
        $cou = Course::find($part->part_cou_id);
        $cou->cou_video += (int)$lesson->les_video_duration;
        $cou->save();
        return back()->with('success', 'Thêm bài học thành công');

    }

    // EDIT PART
    public function editPart($id, Request $request)
    {
        $part = Part::find($id);
        $part->part_name = $request->part_name;
        $part->save();
        return back();
    }

    // DELETE PART
    public function destroyPart($id)
    {
        $video = Lesson::where('les_part_id', $id)->get();
        foreach ($video as $key => $item) {
            File::delete('lib/public/uploads/' . $item->les_link);
            Lesson::destroy($item->les_id);
        }
        Part::destroy($id);
        return back();
    }

    //EDIT VIDEO
    public function editVideo($id, Request $request)
    {

        $lesson = Lesson::find($id);
        $lesson->les_name = $request->les_name;
        $lesson->les_slug = str_slug($request->les_name);


        $video = $request->file('file');

        if ($request->hasFile('file')) {
            File::delete('lib/public/uploads/' . $lesson->les_link);
            $filename = time() . '.' . $video->getClientOriginalExtension();
            $lesson->les_link = $filename;
            $path = public_path() . '/uploads/';
            $video->move($path, $filename);
            $lesson->les_video_duration = $request->duration;

        }
        $lesson->save();

        // Lưu thời lượng video vào bài giảng
        $part = Part::find($lesson->les_part_id);
        if ($request->hasFile('file')) {

            $part->part_video_duration = (int)$part->part_video_duration + (int)$lesson->les_video_duration;
            $part->save();
        }


        // Lưu thời lượng video vào khóa
        $cou = Course::find($part->part_cou_id);
        $cou->cou_video += (int)$lesson->les_video_duration;
        $cou->save();

        $doc_file = $request->file('file_doc');
        if ($request->hasFile('file_doc')) {
            $doc = Doc::where('doc_les_id', $lesson->les_id)->first();
            $doc == null ? $doc = New Doc : '';
            $filename = time() . '.' . $doc_file->getClientOriginalExtension();
            $doc->doc_link = $filename;
            $doc_file->storeAs('doc', $filename);
            $doc->doc_name = $request->les_name;
            $cou->group->gr_parent_id == 0 ? $doc->doc_gr_id = $cou->cou_gr_id : $doc->doc_gr_id = $cou->group->gr_parent_id;
            $doc->doc_acc_id = Auth::user()->id;
            // dd($cou);
            $doc->doc_cou_id = $cou->cou_id;
            $doc->doc_les_id = $lesson->les_id;
            $doc->save();

        }

        return back();
    }


    //DELETE LESSON
    public function destroyLesson($id)
    {
        $video = Lesson::find($id);
        File::delete('lib/public/uploads/' . $video->les_link);
        Lesson::destroy($id);
        return back();
    }


    public function postDoc(Request $request, $cou_id)
    {
        $cou = Course::find($cou_id);
        $doc = new Doc;
        $doc->doc_name = $request->doc_name;
        $doc->doc_cou_id = $cou_id;
        $cou->group->gr_parent_id == 0 ? $doc->doc_gr_id = $cou->cou_gr_id : $doc->doc_gr_id = $cou->group->gr_parent_id;
        $doc->doc_acc_id = Auth::user()->id;
        $doc->doc_img = null;
        $filedoc = $request->file('file');
        if ($request->hasFile('file')) {
            $filename = time() . '.' . $filedoc->getClientOriginalExtension();
            $doc->doc_link = $filename;
            $request->file->storeAs('doc', $filename);
        } else {
            return back()->with('error', 'File bị lỗi');
        }
        $doc->save();
        return back()->with('success', 'Thêm tài liệu thành công');
    }

    public function editDoc(Request $request, $id)
    {
        $doc = Doc::find($id);
        $doc->doc_name = $request->doc_name;
        $filedoc = $request->file('file');
        if ($request->hasFile('file')) {
            $filename = time() . '.' . $filedoc->getClientOriginalExtension();
            $doc->doc_link = $filename;
            $request->file->storeAs('doc', $filename);
        }
        $doc->save();
        return back()->with('success', 'Sửa tài liệu thành công');
    }

    public function destroyDoc($id)
    {
        $doc = Doc::find($id);
        File::delete('lib/storage/app/doc' . $doc->doc_link);
        Doc::destroy($id);
        return back();
    }

    public function get_group_child_form()
    {

        $parentid = Input::get('groupid');

        // $list_group = Group::where('status', 1)->get();
        // dd($parentid);
        $data['list_group_child'] = Group::where('gr_parent_id', $parentid)->get();

        $view = View::make('frontend.teacher.group_form', $data)->render();
        return response($view, 200);

    }

    public function postReq(Request $request)
    {

        $acc = Account::find(Auth::user()->id); // Lấy tài khoản
        $total_profit = $acc->sale->sum('profit'); // Lấy tổng số tiền lợi nhuận
        $surplus = $total_profit - $acc->withdrawn; // Lấy số tiền có thể rút

        //số tiền yêu cầu > 0 && Số tiền có thể rút >= Số tiền yêu cầu
        if ($request->amount > 0 && $surplus >=  $request->amount) {
            //Tạo yêu cầu
            $acc_req = new Account_Request;
            $acc_req->req_status = 1; //Trạng thái đang chờ
            $acc_req->req_acc_id = $request->acc_id;
            $acc_req->req_amount = $request->amount;
            $acc_req->save();
            sleep(1);

            $acc->withdrawn += $request->amount; //Lưu có tiền đã rút
            $acc->save();
            $email = Auth::user()->email;
            $data['acc_req'] = $acc_req;
            Mail::send('frontend.emailAccountRequest', $data, function ($message) use ($email) {
                $message->from('info@ceduvn.com', 'Ceduvn');
                $message->to($email, $email);
                $message->subject('Thư thông báo rút tiền CEDU');
            });
            return back()->with('success', 'Gửi yêu cầu rút tiền thành công');
        } else {

            return back()->with('error', 'Số tiền của bạn không đúng');
        }
    }
}
