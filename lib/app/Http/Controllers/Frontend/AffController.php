<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Aff;
use App\Models\OrderDetail;
use App\Models\Course;
use Auth;
use DateTime;
use Hash;

class AffController extends Controller
{
    // TOP THÀNH VIÊN
    public function getTop(){
        $data['top_aff'] = Aff::orderByDesc('aff_earnings')->get();
        // dd($data['top_aff'][0]->orderDe);
        // foreach ($data['top_aff'] as $key => $aff) {
        // 	$aff->aff_earnings = 0;
        // 	$aff->aff_order_num = 0;
        	
        // 	foreach ($aff->acc->aff_orderDe as $orderDe) {
        // 		// dd($orderDe);
        // 		if ($orderDe->order->ord_status == 0) {
        // 			$aff->aff_order_num++;
        // 			$aff->aff_earnings += $orderDe->course->cou_price;
        // 		}
        // 	}
        // 	// dd($aff);
        // 	$aff->save();
        // }
        return view('frontend.aff.top', $data);
    }

    // LỊCH SỬ GIAO DỊCH
    public function getHistory(){
        $data['orderDeTable'] = OrderDetail::where('orderDe_aff_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('frontend.aff.history', $data);
    }

    public function getDashboard(){
        
        $acc = Account::find(Auth::user()->id);
        $courses = Course::orderByDesc('cou_star')->take(8)->get();
        $total_amount = 0;
        $total_student = 0;
        $student_month = 0;
        $date = new DateTime();
        foreach ($acc->aff_orderDe as $orderDe) {
            if ($orderDe->order->ord_status == 0) {
                $total_student ++;
                $total_amount += $orderDe->course->cou_price;
                if (date_format($date,"m") == date_format($orderDe->created_at,"m")) {
                    $student_month ++;
                }
            }
            // $total_amount += $course->cou_price;
            // // $total_student += $course->cou_student;
            // foreach ($course->orderDe as $orderDe) {
            //     if ($orderDe->order->ord_status == 0) {
            //         $total_student ++;
            //         if (date_format($date,"m") == date_format($orderDe->created_at,"m")) {
            //             $student_month ++;
            //         }
            //     }
            // }
        }

        
        $data = [
            'teacher' => $acc->teacher,
            'total_amount' => $total_amount,
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
}
