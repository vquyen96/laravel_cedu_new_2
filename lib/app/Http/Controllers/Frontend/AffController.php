<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Aff;
use App\Models\OrderDetail;
use App\Models\Course;
use App\Models\Account_Request;
use App\Models\Sale;
use Mail;
use Auth;
use DateTime;
use Hash;

class AffController extends Controller
{
    // TOP THÀNH VIÊN
    public function getTop(){
//        $affs = Aff::all();
//        foreach ($affs as $aff){
//            $total_profit = $aff->acc->sale->sum('profit');
//            $aff->aff_earnings = $total_profit;
//            $aff->save();
//        }

        $data['top_aff'] = Aff::orderByDesc('aff_earnings')->get();

        return view('frontend.aff.top', $data);
    }

    // LỊCH SỬ GIAO DỊCH
    public function getHistory(){
        $data['orderDeTable'] = OrderDetail::where('orderDe_aff_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('frontend.aff.history', $data);
    }

    public function getDashboard(){
        app('App\Http\Controllers\Admin\UpdateController')->sale_aff();

        $acc = Account::find(Auth::user()->id);
        $courses = Course::orderByDesc('cou_star')->take(8)->get();
        $total_sale = $acc->sale->sum('total');
        $total_profit = $acc->sale->sum('profit');
        $total_student = $acc->sale->sum('cou');

        $amount_month = 0;
        $student_month = 0;
        $date = new DateTime();
        foreach ($acc->aff_orderDe as $orderDe) {
            if ($orderDe->order->ord_status == 0) {
                if (date_format($date,"m") == date_format($orderDe->created_at,"m")) {
                    $student_month ++;
                    $amount_month += $orderDe->course->cou_price;
                }
            }
        }

        $data = [
            'teacher' => $acc->teacher,
            'total_sale' => $total_sale,
            'total_profit' => $total_profit,
            'amount_month' => $amount_month,
            'total_student' => $total_student,
            'student_month' => $student_month,
            'courses' =>$courses,
            'acc' => $acc
        ];
        $data['orderDes'] = OrderDetail::where('orderDe_aff_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $data['orderDeTable'] = OrderDetail::where('orderDe_aff_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('frontend.aff.dashboard', $data);
    }

    public function getShare($slug){
        if (Auth::user()->level == 8 ) {
            $data['course'] = Course::where('cou_slug',$slug)->first();
            $data['acc'] = Account::where('id', Auth::user()->id)->first();
            return view('frontend.aff.share',$data);
        }
        else{
            return redirect('');
            
        }
    }

    public function postReq(Request $request){
        $acc_req = Account_Request::where('req_acc_id', $request->acc_id)->orderBy('created_at','desc')->first();
        $date = new DateTime();
        $date = strtotime(date_format($date,"Y-m-d h:m:s"));
        $time = 0;
        if ($acc_req != null) {
            $time = strtotime(date_format($acc_req->created_at,"Y-m-d h:m:s"));
        }

        if ($request->amount > 0 || $acc_req == null) {
            $acc_req = new Account_Request;
            $acc_req->req_status = 1;
            $acc_req->req_acc_id = $request->acc_id;
            $acc_req->req_amount = $request->amount;
            $acc_req->save();
            sleep(1);
            $acc = Account::find(Auth::user()->id);
            $acc->withdrawn +=  $request->amount;
            $acc->save();
            $email = Auth::user()->email;
            $data = [
                "acc_req" => $acc_req,
                "title" => "Yêu cầu của bạn đã được gửi",
                "content1" => "Yêu cầu của bạn <b>".$acc_req->acc->name."</b> rút <b>".number_format($acc_req->req_amount,0,',','.')."vnđ</b> đã được gửi đi",
                "content2" => "Yêu cầu rút tiền của bạn đã được chuyển đến bộ phận kế toán Số tiền bạn được nhận sẽ chuyển vào tài khoảng của bạn trong vòng từ 1 đến 2 ngày ( Không kể thứ 7 và Chủ Nhật)"
            ];
            Mail::send('frontend.email.req_acc', $data, function($message) use ($email){
                $message->from('info@ceduvn.com', 'Ceduvn');
                $message->to($email, $email);
                $message->subject('Thư thông báo rút tiền CEDU');
            });
            return back()->with('success', 'Gửi yêu cầu rút tiền thành công');
        }
        else{

            return back()->with('error', 'Số tiền của bạn không đủ');
        }
    }
}
