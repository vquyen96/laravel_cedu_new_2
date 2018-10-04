<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransferController extends Controller
{
    public function postTranfer(Request $rq){
    	if(count(Cart::content()) == 0){
            return redirect('/')->with('error', 'Bạn không có khóa học nào !');
        }
        DB::beginTransaction();
        $order = new Order;
        $order->ord_payment = 3;
        $order->ord_acc_id = Auth::user()->id;
        // dd($order->ord_adress);
        $order->ord_phone = $request->phone;
        $total = str_replace(",","",Cart::total());
        $total = (int)$total;
        $order->ord_total_price = $total;
        $order->ord_status = 1 ;
        // dd($order);
        $order->save();
        $data['cart'] = Cart::content();
        
        sleep(2);
        foreach ($data['cart'] as $item) {
            $orderdetail = new OrderDetail;
            $orderdetail->orderDe_name = $item->name;
            $orderdetail->orderDe_price = $item->price;
            $orderdetail->orderDe_qty = $item->qty;
            $orderdetail->orderDe_ord_id = $order->ord_id;
            $orderdetail->orderDe_cou_id = $item->id;
            $aff = Aff::where('aff_code', $item->options->aff)->first();
            if($aff != null){
                $orderdetail->orderDe_aff_id = $aff->aff_acc_id;
            }
            $orderdetail->save();
        }
        
        // $data['order'] = $order;
        // $email = Auth::user()->email;
        // $data['cart'] = Cart::content();
        // $data['total'] = $total;

        // $data['image'] = $orderdetail->course->cou_img;
        // // return view('frontend.email', $data);

        // Mail::send('frontend.email.pay_home', $data, function($message) use ($email){
        //     $message->from('info@ceduvn.com', 'Ceduvn');
        //     $message->to($email, $email)->subject('Thank You!');
        //     // $message->cc('thongminh.depzai@gmail.com', 'boss');
        //     $message->subject('Hóa đơn khóa học');
        // });
        DB::commit();

        
        Cart::destroy();
        
        return redirect('cart/info/');

    }
    public function infoTransfer(){
        return view('frontend.cart.info_transfer');
    }
}
