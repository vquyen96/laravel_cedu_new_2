<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Code;
use App\Models\Account;
use Auth;
use Mail;
class OrderController extends Controller
{
    public function getList(){
        if (Auth::user()->level == 7) {
            return redirect('teacher/dashboard');
        }
    	$data['items'] = Order::where('ord_payment', 1 )->orderBy('ord_id','desc')->paginate(10);
    	return view('backend.order.ship',$data);
    }
    public function getDetail($id){
    	$data['order'] = Order::find($id);
    	$data['items'] = OrderDetail::where('orderDe_ord_id', $id)->get();
    	return view('backend.order.detail',$data);
    }
    public function getShip($id){

    	$order = Order::find($id);
    	if($order->ord_status == 1){
    		$order->ord_status = 2;
            foreach ($order->orderDe as $orderDe) {
                while (true) {
                    $code_value   = mt_rand(100000, 999999);
                    $codeExit = Code::where('code_value',$code_value)->first();
                    if($codeExit == null){
                        $code = new Code;
                        $code->code_value = $code_value;
                        $code->code_orderDe_id = $orderDe->orderDe_id;
                        $code->code_status = 0;
                        $code->save();
                        $email = $order->acc->email;
                        // $data['code'] = $code;
                        
                        // Mail::send('frontend.emailCode', $data, function($message) use ($email){
                        //     $message->from('info@ceduvn.com', 'Ceduvn');
                        //     $message->to($email, $email)->subject('Thank You!');
                        //     // $message->cc('thongminh.depzai@gmail.com', 'boss');
                        //     $message->subject('Mã code khóa học');
                        // });
                        break;
                    }
                }
            }
    	}
    	else{
    		dd('error');
    	}
    	
    	$order->save();
    	return back();
    }
    public function getDone($id){
    	$order = Order::find($id);
    	if($order->ord_status == 2 || $order->ord_status == 1){
    		$email = $order->acc->email;
            $order->ord_status = 0;
            foreach ($order->orderDe as $orderDe) {
                $data['code'] = $orderDe->code;
                Mail::send('frontend.email.code', $data, function($message) use ($email){
                    $message->from('info@ceduvn.com', 'Ceduvn');
                    $message->to($email, $email)->subject('Thank You!');
                    // $message->cc('thongminh.depzai@gmail.com', 'boss');
                    $message->subject('Mã code khóa học');
                });
            }
                
    	}
    	else{
    		dd('error');
    	}
    	
    	$order->save();
    	return back();
    }
    public function getDeny($id){
    	$order = Order::find($id);
    	if($order->ord_status == 2 || $order->ord_status == 1){
            $email = $order->acc->email;
    		$order->ord_status = -1;
            $data['order'] = $order;
            Mail::send('frontend.email.pay_deny', $data, function($message) use ($email){
                $message->from('info@ceduvn.com', 'Ceduvn');
                $message->to($email, $email)->subject('Thank You!');
                // $message->cc('thongminh.depzai@gmail.com', 'boss');
                $message->subject('Hủy đơn hàng');
            });
    	}
    	else{
    		return back()->with('error', 'Đã có lỗi xảy ra');
    	}
    	
    	$order->save();
    	return back();
    }

    public function getOrderDetailTeacher(){
        $acc = Account::where('id', Auth::user()->id)->first();
        $data['acc'] = $acc;
        $data['teacher'] = $acc->teacher;
        // dd($data['teacher']);
        return view('backend.orderdetail_teacher',$data);
    }

    public function delete_order_old(){
        $ord = Order::where('ord_status', 1)->get();
        foreach($ord as $order){
            Order::destroy($order->ord_id);
        }
        dd('ok');
    }
    public function getTransfer(){
        if (Auth::user()->level == 7) {
            return redirect('teacher/dashboard');
        }
        $data['items'] = Order::where('ord_payment', 4 )->orderBy('ord_id','desc')->paginate(10);
    	return view('backend.order.transfer',$data);
    }

    public function getTransferActive($id){
        $order = Order::find($id);
        if($order->update(['ord_status' => 0])) {
            foreach ($order->orderDe as $orderDe) {
                while (true) {
                    $code_value   = mt_rand(100000, 999999);
                    $codeExit = Code::where('code_value',$code_value)->first();
                    if($codeExit == null){
                        $code = new Code;
                        $code->code_value = $code_value;
                        $code->code_orderDe_id = $orderDe->orderDe_id;
                        $code->code_status = 1;
                        $code->save();
                        break;
                    }
                }
                $email = $order->acc->email;
                $data['code'] = $code;

                Mail::send('frontend.email.active', $data, function($message) use ($email){
                    $message->from('info@ceduvn.com', 'Ceduvn');
                    $message->to($email, $email)->subject('Kích hoạt khóa học thành công');
                });
            }
            return back()->with('success','Kích hoạt thành công');
        };

        return back()->with('error','Lỗi');
    }
    public function getTransferDeny($id){
        $order = Order::find($id);
        if($order->update(['ord_status' => -1])) return back();
        return back()->with('error','Lỗi');
    }

}
