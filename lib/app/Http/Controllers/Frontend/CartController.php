<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Course;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Aff;
use App\Models\Code;
use App\Models\Account;
use Cart;
use Auth;
use Mail;
// use App\Http\Controllers\Frontend\nganluong.class;
class CartController extends Controller
{
    public function getAddCart(Request $request, $slug){
    	$course = Course::where('cou_slug',$slug)->first();
        // Kiểm tra người dùng đã từng mua khóa học chưa
        $countCouExit = 0;
        if (Auth::check()) {
            $order = Order::where('ord_acc_id', Auth()->user()->id)->get();
            foreach ($order as $item) {
                $courseExist = OrderDetail::where('orderDe_cou_id',$course->cou_id)->where('orderDe_ord_id',$item->ord_id)->first();
                if ($courseExist != null) {
                    $countCouExit = 1;
                }
            }
        }
        
        if ($countCouExit == 0) {
            //Kiểm tra khóa học có trong giỏ hàng không
            $courseExit = 0;
            foreach (Cart::content() as $cart) {
                if ($cart->id == $course->cou_id) {
                    $courseExit = 1;
                }
            }
            if ($courseExit == 0) {
                if($request->aff == null){
                    Cart::add(['id'=>$course->cou_id, 'name'=>$course->cou_name, 'qty'=>1, 'price'=>$course->cou_price , 'options'=>['img'=>$course->cou_img,'tea'=>$course->tea->name]]);
                }
                else{
                    Cart::add(['id'=>$course->cou_id, 'name'=>$course->cou_name, 'qty'=>1, 'price'=>$course->cou_price , 'options'=>['img'=>$course->cou_img,'tea'=>$course->tea->name, 'aff'=>$request->aff]]);
                }
                return back()->with('success','Khoá học đã được thêm vào giỏ hàng');
            }
            else{
                return back()->with('error','Khoá học đã được thêm trước đó');
            }
        }   
        else{
            return back()->with('error','Tài khoản của bạn đã mua khóa học này');
        }   
           
    	
    }
    public function getBuyNow(Request $request, $slug){
        $course = Course::where('cou_slug',$slug)->first();
        // Kiểm tra người dùng đã từng mua khóa học chưa
        $countCouExit = 0;
        if (Auth::check()) {
            $order = Order::where('ord_acc_id', Auth()->user()->id)->get();
            foreach ($order as $item) {
                $courseExist = OrderDetail::where('orderDe_cou_id',$course->cou_id)->where('orderDe_ord_id',$item->ord_id)->first();
                if ($courseExist != null) {
                    $countCouExit = 1;
                }
            }
        }
        
        if ($countCouExit == 0) {
            //Kiểm tra khóa học có trong giỏ hàng không
            $courseExit = 0;
            foreach (Cart::content() as $cart) {
                if ($cart->id == $course->cou_id) {
                    $courseExit = 1;
                }
            }
            if ($courseExit == 0) {
                if($request->aff == null){
                    Cart::add(['id'=>$course->cou_id, 'name'=>$course->cou_name, 'qty'=>1, 'price'=>$course->cou_price , 'options'=>['img'=>$course->cou_img,'tea'=>$course->tea->name]]);
                }
                else{
                    Cart::add(['id'=>$course->cou_id, 'name'=>$course->cou_name, 'qty'=>1, 'price'=>$course->cou_price , 'options'=>['img'=>$course->cou_img,'tea'=>$course->tea->name, 'aff'=>$request->aff]]);
                }
                return redirect('cart/show')->with('success','Khoá học đã được thêm vào giỏ hàng');
            }
            else{
                return redirect('cart/show')->with('error','Khoá học đã được thêm trước đó');
            }
        }   
        else{
            return back()->with('error','Tài khoản của bạn đã mua khóa học này');
        } 
        
    }
    public function getShowCart(){
    	// $data['total'] = str_replace(".00","",Cart::total());

    	$cart = Cart::content();
        $list_cart = [];
        foreach ($cart as $item) {
            $list_cart[] = $item->id;
        }

        $items = Course::whereIn('cou_id', $list_cart)->get();
        $total = 0;
        $total_old = 0;
        foreach ($items as $item) {
            $total += $item->cou_price;
            if ($item->cou_price_old != 0) {
                $total_old += $item->cou_price_old;
            }
            else{
                $total_old += $item->cou_price;
            }
            foreach ($cart as $cart_item) {
                if ($item->cou_id == $cart_item->id) {
                    $item->cou_row_id = $cart_item->rowId;
                }
            }
        }
        if ($total_old == 0) {
            $total_old = 1;
            return redirect('/')->with('error', 'Giỏ hàng của bạn không có gì');
        }
        $percent = ($total/$total_old)*100;

        // $data['items'] = $items;
        $data = [
            'items' => $items,
            'total' => $total,
            'total_old' => $total_old,
            'percent' => $percent
        ];
        
        
    	return view('frontend.cart.show', $data);
    }
    public function getDeleteCart($id){
    	if($id == 'all'){
    		Cart::destroy();
    	}
    	else{
    		Cart::remove($id);
    	}
    	return back();
    }

    public function getUpdateCart(Request $request){
    	Cart::update($request->rowId, $request->qty);
    }
    public function postComplete(Request $request, $type){
    	$order = new Order;
        $order->ord_payment = 1;
        $order->ord_acc_id = Auth::user()->id;
        $order->ord_note = $request->note;
        $order->ord_adress = $request->adress;
        $order->ord_phone = $request->name;
        $total = str_replace(",","",Cart::total());
    	$total = (int)$total;
    	$order->ord_total_price = $total;
        if ($type == 'paypal') {
            $order->ord_status = 0 ;
        }
        else{
            $order->ord_status = 1 ;
        }
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
            $orderdetail->orderDe_aff_id = $aff->aff_acc_id;
	        $orderdetail->save();
        }
        $data['order'] = $order;
        $email = $request->email;
        $data['cart'] = Cart::content();
        $data['total'] = Cart::total();
        // return view('frontend.email', $data);
        // dd($data);
        Mail::send('frontend.emailShip', $data, function($message) use ($email){
            $message->from('info@ceduvn.com', 'Ceduvn');
            $message->to($email, $email)->subject('Thank You!');
            // $message->cc('thongminh.depzai@gmail.com', 'boss');
            $message->subject('Hóa đơn khóa học');
        });

    	Cart::destroy();
    	
    	return back();
    }
    public function getComplete($type){
        if ($type == 'paypal' ) {
            $order = new Order;
            $order->ord_payment = 1;
            $order->ord_acc_id = Auth::user()->id;
            $total = str_replace(",","",Cart::total());
            $total = (int)$total;
            $order->ord_total_price = $total;
            $order->ord_status = 0 ;
            // dd($order);
            $order->save();
            $data['cart'] = Cart::content();



            $data['order'] = $order;
            $email = Auth::user()->email;
            $data['cart'] = Cart::content();
            $data['total'] = Cart::total();
            
            Mail::send('frontend.emailShip', $data, function($message) use ($email){
                $message->from('info@ceduvn.com', 'Ceduvn');
                $message->to($email, $email)->subject('Thank You!');
                $message->subject('Hóa đơn khóa học');
            });
            
            sleep(1);
            foreach ($data['cart'] as $item) {
                $orderdetail = new OrderDetail;
                $orderdetail->orderDe_name = $item->name;
                $orderdetail->orderDe_price = $item->price;
                $orderdetail->orderDe_qty = $item->qty;
                $orderdetail->orderDe_ord_id = $order->ord_id;
                $orderdetail->orderDe_cou_id = $item->id;
                if ($item->options->aff != null) {
                    $aff = Aff::where('aff_code', $item->options->aff)->first();
                    $orderdetail->orderDe_aff_id = $aff->aff_acc_id;
                }
                $orderdetail->save();
            }
            sleep(1);
            
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
                        $data['code'] = $code;
                        
                        Mail::send('frontend.emailCode', $data, function($message) use ($email){
                            $message->from('info@ceduvn.com', 'Ceduvn');
                            $message->to($email, $email);
                            $message->subject('Mã code khóa học');
                        });
                        break;
                    }
                }
            }

            

            Cart::destroy();
        }

    	return view('frontend.cart.complete');
    }
    public function getPaymentLogin(){
        if (Cart::total() == "0.00") {
            return redirect('cart/show');
        }
        else{
            if(Auth::check()){
                return redirect('cart/');
            }
            $cart = Cart::content();
            $list_cart = [];
            foreach ($cart as $item) {
                $list_cart[] = $item->id;
            }

            $items = Course::whereIn('cou_id', $list_cart)->get();
            $total = 0;
            $total_old = 0;
            foreach ($items as $item) {
                $total += $item->cou_price;
                if ($item->cou_price_old != 0) {
                    $total_old += $item->cou_price_old;
                }
                else{
                    $total_old += $item->cou_price;
                }
                foreach ($cart as $cart_item) {
                    if ($item->cou_id == $cart_item->id) {
                        $item->cou_row_id = $cart_item->rowId;
                    }
                }
            }
            if ($total_old == 0) {
                $total_old = 1;
                return redirect('/')->with('error', 'Giỏ hàng của bạn không có gì');
            }
            $percent = ($total/$total_old)*100;

            $data['items'] = $items;
            $data = [
                'items' => $items,
                'total' => $total,
                'total_old' => $total_old,
                'percent' => $percent
            ];
            // dd($items);
            return view('frontend.cart.login', $data);
        }
    }
    public function getPayment(){
        if (Cart::total() == "0.00") {
            return redirect('cart/show');
        }else{
            if (Auth::check()) {
                $cart = Cart::content();
                $list_cart = [];
                foreach ($cart as $item) {
                    $list_cart[] = $item->id;
                }

                $items = Course::whereIn('cou_id', $list_cart)->get();
                $total = 0;
                $total_old = 0;
                foreach ($items as $item) {
                    $total += $item->cou_price;
                    if ($item->cou_price_old != 0) {
                        $total_old += $item->cou_price_old;
                    }
                    else{
                        $total_old += $item->cou_price;
                    }
                    foreach ($cart as $cart_item) {
                        if ($item->cou_id == $cart_item->id) {
                            $item->cou_row_id = $cart_item->rowId;
                        }
                    }
                }
                if ($total_old == 0) {
                    $total_old = 1;
                    return redirect('/')->with('error', 'Giỏ hàng của bạn không có gì');
                }
                $percent = ($total/$total_old)*100;

                $data['items'] = $items;
                $data = [
                    'items' => $items,
                    'total' => $total,
                    'total_old' => $total_old,
                    'percent' => $percent
                ];
                // dd($items);
                return view('frontend.cart.payment', $data);
            }
            else{
                return redirect('cart/login');
            }
        }
    }
    public function postPayment(Request $request){
        $order = new Order;
        $order->ord_payment = 1;
        $order->ord_acc_id = Auth::user()->id;
        $order->ord_note = $request->note;
        $order->ord_adress = $request->city." | ".$request->quan." | ".$request->phuong." | ".$request->adress;
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
        $data['order'] = $order;
        $email = Auth::user()->email;
        $data['cart'] = Cart::content();
        $data['total'] = Cart::total();
        // return view('frontend.email', $data);
        // dd($data);
        Mail::send('frontend.emailShip', $data, function($message) use ($email){
            $message->from('info@ceduvn.com', 'Ceduvn');
            $message->to($email, $email)->subject('Thank You!');
            // $message->cc('thongminh.depzai@gmail.com', 'boss');
            $message->subject('Hóa đơn khóa học');
        });
        
        Cart::destroy();
        
        return redirect('cart/complete/all');
        
    }

    //Thanh toán bằng ngân lượng
    public function getNganLuong(){

        $total = str_replace(",","",Cart::total());
        $total = (int)$total;
        $cancel_url= 'https://ceduvn.com/';
        $order_code='CEDU_'.time();
        // if ($affiliate_code == "") $affiliate_code = $this->affiliate_code;
        $arr_param = array(
            'merchant_site_code'=>  strval('36680'),
            'return_url'        =>  strval(strtolower('https://ceduvn.com/cart/complete_nganluong')),
            'receiver'          =>  strval('info@ceduvn.com'),
            'transaction_info'  =>  strval("Thong tin giao dich"),
            'order_code'        =>  strval($order_code),
            'price'             =>  strval($total),
            'currency'          =>  strval("vnd"),
            'quantity'          =>  strval(1),
            'tax'               =>  strval(0),
            'discount'          =>  strval(0),
            'fee_cal'           =>  strval(0),
            'fee_shipping'      =>  strval(0),
            'order_description' =>  strval("Thong tin don hang: ".$order_code),
            'buyer_info'        =>  strval(Auth::user()->name."*|*".Auth::user()->email."*|*"."190001001"), //"Họ tên người mua *|* Địa chỉ Email *|* Điện thoại *|* Địa chỉ nhận hàng"
            'affiliate_code'    =>  strval("")
        );
        
        $secure_code ='';
        $secure_code = implode(' ', $arr_param) . ' ' . 'matkhauketnoi';
        //var_dump($secure_code). "<br/>";
        $arr_param['secure_code'] = md5($secure_code);      
        //echo $arr_param['secure_code'];
        /* */
        $redirect_url = 'https://www.nganluong.vn/checkout.php';
        if (strpos($redirect_url, '?') === false) {
            $redirect_url .= '?';
        } else if (substr($redirect_url, strlen($redirect_url)-1, 1) != '?' && strpos($redirect_url, '&') === false) {
            $redirect_url .= '&';           
        }
                
        /* */
        $url = '';
        foreach ($arr_param as $key=>$value) {
            $value = urlencode($value);
            if ($url == '') {
                $url .= $key . '=' . $value;
            } else {
                $url .= '&' . $key . '=' . $value;
            }
        }
        $url = $redirect_url.$url;
        if ($order_code != "") {
            //một số tham số lưu ý
            //&cancel_url=http://yourdomain.com --> Link bấm nút hủy giao dịch
            //&option_payment=bank_online --> Mặc định forcus vào phương thức Ngân Hàng
            $url .='&cancel_url='. $cancel_url;
            //$url .='&option_payment=bank_online';
            
            return redirect($url);
            //&lang=en --> Ngôn ngữ hiển thị google translate
        }
    }
    //Cancel Ngân lượng
    public function getCancelNganLuong(){
        return redirect('errors');
    }
    //Thanh toán thành công
    public function getCompleteNganLuong(){
        if (isset($_GET['payment_id'])) {
            // Lấy các tham số để chuyển sang Ngânlượng thanh toán:

            $transaction_info =$_GET['transaction_info'];
            $order_code =$_GET['order_code'];
            $price =$_GET['price'];
            $payment_id =$_GET['payment_id'];
            $payment_type =$_GET['payment_type'];
            $error_text =$_GET['error_text'];
            $secure_code =$_GET['secure_code'];

            //Nối chuỗi 
            $str = '';
            $str .= ' ' . strval($transaction_info);
            $str .= ' ' . strval($order_code);
            $str .= ' ' . strval($price);
            $str .= ' ' . strval($payment_id);
            $str .= ' ' . strval($payment_type);
            $str .= ' ' . strval($error_text);
            $str .= ' ' . strval('36680');
            $str .= ' ' . strval('matkhauketnoi');
            
            // Mã hóa các tham số
            $verify_secure_code = '';
            $verify_secure_code = md5($str);
            
            // Xác thực mã của chủ web với mã trả về từ nganluong.vn
            if ($verify_secure_code === $secure_code) { 
                //Khi thanh toán xác nhận là chính xác
                $order = new Order;
                $order->ord_payment = 2;// ngan luong

                $order->ord_acc_id = Auth::user()->id;
                
                $total = str_replace(",","",Cart::total());
                $total = (int)$total;
                $order->ord_total_price = $total;
                $order->ord_code = $order_code;
                $order->ord_status = 1 ;
                // dd($order);
                $order->save();
                $data['cart'] = Cart::content();
                
                sleep(1);

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
                // $data['total'] = Cart::total();
                
                //Gửi mail Hóa đơn khóa học
                // Mail::send('frontend.emailShip', $data, function($message) use ($email){
                //     $message->from('info@ceduvn.com', 'Ceduvn');
                //     $message->to($email, $email)->subject('Thank You!');
                //     // $message->cc('thongminh.depzai@gmail.com', 'boss');
                //     $message->subject('Hóa đơn khóa học');
                // });
                //Tạo mã code cho khóa học
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
                            // $email = $order->acc->email;
                            // $data['code'] = $code;
                            // Mail::send('frontend.emailCode', $data, function($message) use ($email){
                            //     $message->from('info@ceduvn.com', 'Ceduvn');
                            //     $message->to($email, $email);
                            //     $message->subject('Mã code khóa học');
                            // });
                            break;
                        }
                    }
                }
                $email = Auth::user()->email;
                $data['order'] = $order;
                Mail::send('frontend.emailNganLuong', $data, function($message) use ($email){
                    $message->from('info@ceduvn.com', 'Ceduvn');
                    $message->to($email, $email);
                    $message->subject('Thanh toán thành công CEDU');
                });
                Cart::destroy();
                return redirect('user/course_doing');
                // return view('frontend.cart.complete');
                
            }else{
                return redirect('errors');
            }
        }

    }

    public function getEmailCompany(){
        $order = new Order;
        $order->ord_payment = 2;// ngan luong

        $order->ord_acc_id = Auth::user()->id;
        
        $total = str_replace(",","",Cart::total());
        $total = (int)$total;
        $order->ord_total_price = $total;
        $order->ord_code = 'CEDU_1537237834';
        $order->ord_status = 1 ;
        // dd($order);
        $order->save();
        $data['cart'] = Cart::content();
        sleep(1);

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
                    // $email = $order->acc->email;
                    // $data['code'] = $code;
                    // Mail::send('frontend.emailCode', $data, function($message) use ($email){
                    //     $message->from('info@ceduvn.com', 'Ceduvn');
                    //     $message->to($email, $email);
                    //     $message->subject('Mã code khóa học');
                    // });
                    break;
                }
            }
        }


        $email = Auth::user()->email;
                $data['order'] = $order;
                Mail::send('frontend.emailNganLuong', $data, function($message) use ($email){
                    $message->from('info@ceduvn.com', 'Ceduvn');
                    $message->to($email, $email);
                    $message->subject('Thanh toán thành công CEDU');
                });
                Cart::destroy();
                return view('frontend.cart.complete');


        $data['user'] = Account::find(Auth::user()->id);
        $email = Auth::user()->email;
        Mail::send('frontend.emailPaymentCompany', $data, function($message) use ($email){
            $message->from('info@ceduvn.com', 'Ceduvn');
            $message->to($email, $email)->subject('Thanh toán trực tiếp lại công ty CEDU');
            // $message->cc('thongminh.depzai@gmail.com', 'boss');
        });
        Cart::destroy();
        return view('frontend.cart.complete');
    }
    
}
