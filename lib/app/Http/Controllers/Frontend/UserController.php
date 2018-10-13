<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Discount;
use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Course;
use App\Models\Code;
use App\Models\Teacher;
use App\Models\Teacher_Rating;
use App\Models\OrderDetail;
use App\Models\Account_Request;
use App\Models\Leaning;
use App\Models\Group;
use App\Models\Order;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use App\Models\Bank;

use Auth;
use DateTime;
use Hash;

class UserController extends Controller
{
    public function getCourseDoing()
    {
        $learning_last = Leaning::where('account_id', Auth::user()->id)->orderByDesc('updated_at')->first();
        if ($learning_last == null){
            $learning_last = Leaning::orderByDesc('updated_at')->first();
        }
        $video = Lesson::find($learning_last->lesson_id);
        $video->time_last = $learning_last->updated_at;
        $count = 0;
        foreach ($video->part->cou->part as $part){
            foreach ($part->lesson as $lesson){
                if ($lesson->les_id == $video->les_id){
                    $video->num = $count;
                    break;
                }
                $count++;
            }
        }
        $acc = Account::find(Auth::user()->id);
        $list_ids = [];
        foreach ($acc->order as $order) {
            if ($order->ord_status == 0) {
                foreach ($order->orderDe as $orderDe) {
                    $list_lessons_ids = [];
                    foreach ($orderDe->course->part as $part) {
                        foreach ($part->lesson as $lesson) {
                            $list_lessons_ids[] = $lesson->les_id;
                        }
                    }
                    $done = Leaning::where('account_id', Auth::user()->id)->whereIn('lesson_id', $list_lessons_ids)->where('status', 2)->get();
                    if (count($done) < count($list_lessons_ids)) {
                        $list_ids[] = $orderDe->orderDe_cou_id;
                    }
                }
            }
        }
//        dd($list_ids);
        $courses = Course::whereIn('cou_id', $list_ids)->where('cou_status', 1)->get();
        foreach ($courses as $key => $item) {
            if ($item->group->gr_parent_id != 0) {
                $item->group = Group::find($item->group->gr_parent_id);
            }
        }
//        dd($courses[2]->group);
        $course_care = Course::whereNotIn('cou_id', $list_ids)->inRandomOrder()->take(10)->get();
        $data = [
            'acc' => $acc,
            'course_care' => $course_care,
            'course' => $courses,
            'video' => $video
        ];
        return view('frontend.user.course_doing', $data);
    }

    public function getCourseDone()
    {
        // dd('ok');
        $acc = Account::find(Auth::user()->id);
        $list_ids = [];
        foreach ($acc->order as $order) {
            if ($order->ord_status == 0) {
                foreach ($order->orderDe as $orderDe) {
                    $list_lessons_ids = [];
                    foreach ($orderDe->course->part as $part) {
                        foreach ($part->lesson as $lesson) {
                            $list_lessons_ids[] = $lesson->les_id;
                        }
                    }
                    $done = Leaning::where('account_id', Auth::user()->id)->whereIn('lesson_id', $list_lessons_ids)->where('status', 2)->get();
                    if (count($done) == count($list_lessons_ids)) {
                        $list_ids[] = $orderDe->orderDe_cou_id;
                    }
                }
            }
                
        }

        $courses = Course::whereIn('cou_id', $list_ids)->where('cou_status', 1)->paginate(9);
        foreach ($courses as $key => $item) {
            if ($item->group->gr_parent_id != 0) {
                $item->group = Group::find($item->group->gr_parent_id);
            }
        }

        $course_care = Course::whereNotIn('cou_id', $list_ids)->inRandomOrder()->take(10)->get();
        $data = [
            'acc' => $acc,
            'course_care' => $course_care,
            'course' => $courses
        ];
        return view('frontend.user.course_done', $data);
    }

    public function getUser()
    {
        if (Auth::check()) {

            $data['user'] = Account::find(Auth::user()->id);
            return view('frontend.user.profile', $data);
        } else {
            return redirect('/');
        }
    }

    public function getUserAff()
    {
        if (Auth::check()) {
            if (Auth::user()->level == 8) {
                $acc = Account::where('id', Auth::user()->id)->first();
                // $date= new DateTime();
                // date_add($date,date_interval_create_from_date_string(" -1 months"));
                $data['aff'] = Account::where('level', 8)->get();
                $data['user'] = Account::find(Auth::user()->id);
                // $data['code'] = Code::where('code_acc_id',Auth::user()->id)->get();
                $data['orderDe'] = OrderDetail::where('orderDe_aff_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
                $data['orderDeTable'] = OrderDetail::where('orderDe_aff_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);
                // dd($data['orderDeTable']);
                $data['course'] = Course::orderBy('cou_sale', 'desc')->get();

                $date = new DateTime();
                $date_now = new DateTime();
                date_add($date, date_interval_create_from_date_string(" -1 months"));


                $total = 0;
                $total_month = 0;
                $total_month_now = 0;
                // dd($acc->aff);
                foreach ($data['orderDe'] as $orderDe) {
                    if ($orderDe->order->ord_status == 0) {
                        $total += $orderDe->orderDe_price;
                        if (date_format($date, "m") == date_format($orderDe->created_at, "m")) {
                            $total_month += $orderDe->orderDe_price;
                        }
                        if (date_format($date_now, "m") == date_format($orderDe->created_at, "m")) {
                            $total_month_now += $orderDe->orderDe_price;
                        }
                    }
                }

                $data['total_price'] = $total;
                $data['total_month'] = $total_month;
                $data['total_month_now'] = $total_month_now;

                $data['month'] = date_format($date, "m");
                $data['month_now'] = date_format($date_now, "m");


                $acc_req = Account_Request::where('req_acc_id', Auth::user()->id)->orderBy('created_at', 'desc')->first();
                $date = new DateTime();
                $date = strtotime(date_format($date, "Y-m-d h:m:s"));
                $time = 0;
                if ($acc_req != null) {
                    $time = strtotime(date_format($acc_req->created_at, "Y-m-d h:m:s"));
                }

                if ($time > $date - (86400 * 10) || $acc_req == null) {

                    $data['acc_req'] = $acc_req;
                } else {
                    $data['acc_req'] = null;
                }
                return view('frontend.user_aff', $data);
            } else {
                return redirect('user');
            }
        } else {
            return redirect('');
        }

    }

    public function postUser(Request $request)
    {
        $acc = Account::find(Auth::user()->id);
        $data = $request->acc;

        $image = $request->file('img');
        if ($request->hasFile('img')) {
            if (filesize($image) < 1500000) {
                $data['img'] = saveImage([$image], [50, 250, 360], 'avatar');
                if ($data['img'] == false) {
                    return back()->with('error', 'Ảnh của bạn bị lỗi !!! vui lòng thay ảnh khác');
                }
                // dd($data);
            } else {
                return back()->with('error', 'Dung lượng ảnh của bạn quá lớn');
            }
        }
        // dd('ok');
        $acc->update($data);
        return back()->with('success', 'Sửa tài khoản thành công');
    }

    public function getChangePass()
    {
        return view('frontend.user.change_pass');
    }

    public function postChangePass(Request $request)
    {
        if (Hash::check($request->old_password, Auth::user()->password)) {

            if ($request->new_password == $request->re_new_password) {
                $acc = Account::find(Auth::user()->id);
                $acc->password = Hash::make($request->new_password);
                $acc->save();

                return back()->with('success', 'Thay đổi mật khẩu thành công');
            } else {
                return back()->withInput()->with('error', 'Nhập lại mật khẩu mới không trùng khớp');
            }
        } else {
            return back()->withInput()->with('error', 'Mật khẩu cũ không đúng');
        }


    }
    // public function getTeacher($email){
    //     $data['teacher'] = Account::where('email',$email)->first();

    //     if(Auth::check()){
    //         $data['rate'] = Teacher_Rating::where('tr_acc_id', Auth::user()->id)->where('tr_tea_id',$data['teacher']->teacher->tea_id)->first();
    //     }
    //     else{
    //         $data['rate'] = "";
    //     }

    //     // switch ($data['teacher']->teacher->tea_templace) {
    //     //     case 1:
    //     //         return view('frontend.teacher1',$data);
    //     //     case 2:
    //     //         return view('frontend.teacher2',$data);
    //     //     case 3:
    //     //         return view('frontend.teacher3',$data);
    //     //     default:
    //     //         return view('frontend.teacher1',$data);
    //     // }
    //     // dd($data['teacher']);
    //     $data['course'] = Course::where('cou_tea_id',$data['teacher']->id)->paginate(6);
    //     return view('frontend.teacher.profile',$data);
    // }

    // public function getTeacherRating($email ,$rate){

    //     //Check xem người dùng đẵ đăng nhập chưa
    //     if(Auth::check()){
    //         $account = Account::find(Auth::user()->id);
    //         $teacher = Teacher::where('tea_email', $email)->first();
    //         //check xem tài khoản có đăng ký khóa học không
    //         $check = 0;
    //         // dd($teacher);
    //         foreach ($account->order as $order) {
    //             if ($order->ord_status == 0) {
    //                 foreach ($order->orderDe as $orderDe) {
    //                     if($orderDe->course->tea->email == $email){
    //                         $check = 1;
    //                     }
    //                 }
    //             }
    //         }
    //         if ($check == 1) {
    //             $teacher_rating = Teacher_Rating::where('tr_acc_id', Auth::user()->id)->where('tr_tea_id', $teacher->tea_id)->first();
    //             //Check xem người dùng đã đánh giá hay chưa ??
    //             if ($teacher_rating == null) {
    //                 //Tài khoản chưa đánh giá
    //                 $teacher_rating = new Teacher_Rating;
    //                 $teacher_rating->tr_rate = $rate;
    //                 $teacher_rating->tr_tea_id = $teacher->tea_id;
    //                 $teacher_rating->tr_acc_id = $account->id;
    //                 $teacher_rating->save();

    //                 $total_rate = 0;
    //                 foreach ($teacher->rate as $rate) {
    //                     $total_rate += $rate->tr_rate;
    //                 }
    //                 $teacher->tea_rating = $total_rate/count($teacher->rate);
    //                 $teacher->save();
    //                 return back();
    //             }
    //             else{
    //                 //Tài khoản đã có đánh giá giáo viên
    //                 $teacher_rating->tr_rate = $rate;
    //                 $teacher_rating->tr_tea_id = $teacher->tea_id;
    //                 $teacher_rating->tr_acc_id = $account->id;
    //                 $teacher_rating->save();

    //                 $total_rate = 0;
    //                 foreach ($teacher->rate as $rate) {
    //                     $total_rate += $rate->tr_rate;
    //                 }
    //                 $teacher->tea_rating = $total_rate/count($teacher->rate);
    //                 $teacher->save();
    //                 return back();
    //             }
    //         }
    //         else{
    //             return back()->with("error","Bạn chưa học khóa học nào của giáo viên này");
    //         }
    //     }
    //     else{
    //         return back()->with("error","Bạn Phải đăng nhập để đánh giá giáo viên");
    //     }
    // }
    public function getShare($slug)
    {
        if (Auth::user()->level == 8) {
            $data['course'] = Course::where('cou_slug', $slug)->first();
            $data['acc'] = Account::where('id', Auth::user()->id)->first();
            return view('frontend.share', $data);
        } else {
            return redirect('');

        }
    }

    public function postAccReq(Request $request)
    {
        $acc_req = Account_Request::where('req_acc_id', $request->acc_id)->orderBy('created_at', 'desc')->first();
        $date = new DateTime();
        $date = strtotime(date_format($date, "Y-m-d h:m:s"));
        $time = 0;
        if ($acc_req != null) {

            $time = strtotime(date_format($acc_req->created_at, "Y-m-d h:m:s"));
        }

        if ($time < $date - (86400 * 10) || $acc_req == null) {
            $acc_req = new Account_Request;
            $acc_req->req_status = 1;
            $acc_req->req_acc_id = $request->acc_id;
            $acc_req->req_amount = $request->amount;
            $acc_req->save();

            return back()->with('success', 'Gửi yêu cầu rút tiền thành công');
        } else {

            return back()->with('error', 'Bạn đã gửi yêu cầu rút tiền rồi');
        }
    }

    public function getHistory(){
        $acc = Account::find(Auth::user()->id);
        $orders = Order::where('ord_acc_id', $acc->id)->orderByDesc('ord_id')->paginate(10);
        foreach ($orders as $key => $order) {
            if ($order->ord_payment == 4 && time() - strtotime($order->created_at) > 7200 && $order->ord_status == 1) {
                $order->ord_status = -1;
                $order->save();
            }
        }
        $data = [
            'acc' => $acc,
            'orders' => $orders
        ];
        return view('frontend.user.his_user', $data);
    }
    function list_orderdetail(){
        $id_order = Input::get('id_order');
        $data['order'] = Order::find($id_order);
        $data['orderdetail'] = OrderDetail::where('orderDe_ord_id', $id_order)->orderByDesc('orderDe_id')->get();
        foreach ($data['orderdetail'] as $orderdetail){
            $orderdetail->dis = Discount::find($orderdetail->orderDe_dis_id);
        }
        $data['bank'] = Bank::find( $data['order']->ord_bank);
        switch ($data['order']->ord_payment){
            case 1:
                $view = View::make('frontend.user.list_ord_cod', $data)->render();
                break;
            case 2:
                $view = View::make('frontend.user.list_ord_cod', $data)->render();
                break;
            case 3:
                $view = View::make('frontend.user.list_ord_cod', $data)->render();
                break;
            case 4:
                $view = View::make('frontend.user.list_ord_ck', $data)->render();
                break;
            case 5:
                $view = View::make('frontend.user.list_ord_cod', $data)->render();
                break;
            default:
                return response('Đơn hàng này bị lỗi rồi', 501);

        }

        return response($view, 200);
    }

}
