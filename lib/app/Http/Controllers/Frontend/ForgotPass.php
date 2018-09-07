<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;

use Auth;
use Mail;
class ForgotPass extends Controller

{
	private static $code_value;

    public function getPage(){
    	if (Auth::check()) {
    		return redirect('/');
    	}
    	else{
    		return view('frontend.forgot_pass');
    	}
    }
    public function postPage(Request $request){
    	$email = $request->email;
    	$acc = Account::where('email', $email)->first();
    	if ($acc == null) {
    		return back()->with('error','Email không tồn tại hoặc bạn chưa đăng kí');
    	}
    	else{
    		return redirect('forgot_pass/email/'.$email);
    	}
    }
    public function sendEmail($email){
        if (Auth::check()) {
            return redirect('/')->with('error','Bạn đã đăng nhập rồi !');
        }
        else{
            while (true) {
                $code_value = mt_rand(100000, 999999);
                $data['code'] = $code_value;
                Mail::send('frontend.email_reset_pass', $data, function($message) use ($email, $code_value){
                    $message->from('vquyenaaa@gmail.com', 'Ceduvn');
                    $message->to($email, $email)->subject($code_value.' là mã xác nhận của bạn');
                    
                });
                break;
            }
            return view('frontend.reset_pass', $data);
        }
        	

    }
    public function resetPass(Request $request, $email){
    	if ($request->password == $request->re_password) {
    		$acc = Account::where('email', $email)->first();
			$acc->password = bcrypt($request->password);
			$acc->save();
			$arr = ['email' => $request->email, 'password' => $request->password];

	        // dd($arr);
	        if(Auth::attempt($arr, true)){
	            if (Auth::user()->level == 4 || Auth::user()->level == 5) {
	                return redirect('/')->with('success','Thay đổi mật khẩu thành công');
	            }
	            else{
	                return redirect('admin')->with('success','Thay đổi mật khẩu thành công');
	            }
	        }
	        else{
	            return back()->withInput()->with('error','Tài khoản khặc mật khẩu của bạn không đúng');
	        }
    	}
    	else{
    		return back()->with('error','Mật khẩu của bạn không khớp');
    	}
			
}

}
