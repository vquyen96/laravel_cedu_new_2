<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Support\Facades\Cache;
use Session;
use Hash;
use Auth;
use Mail;
class ForgotPass extends Controller

{
	private static $code_value;

    public function getPage(){
        // dd(Hash::make('6543210'));
    	if (Auth::check()) {
    		return redirect('/');
    	}
    	else{
    		return view('frontend.forgot.email');
    	}
    }
    public function postPage(Request $request){
    	$email = $request->email;
    	$acc = Account::where('email', $email)->first();
    	if ($acc == null) {
    		return back()->with('error','Email không tồn tại hoặc bạn chưa đăng kí');
    	}
    	else{
            $code_value = mt_rand(100000, 999999);
            // $data['code'] = $code_value;
            // Session::put('key',  $code_value);
            
            // $acc->update(['password'=> $code_value]);
            $hash = 'hahaha/hahah/hahaha';
            // dd(count(explode('/', trim($hash))));
            
            Cache::store('redis')->put($email, $code_value, 120);

            while (count(explode('/', trim($hash))) != 1) {
                $hash = Hash::make($code_value);
            }
            
            // $hash = Hash::make($code_value);
            
            
            $data['code'] = $hash;
            $data['email'] = $email;
            // dd($data['code']);
            Mail::send('frontend.email.reset_pass', $data, function($message) use ($email){
                $message->from('info@ceduvn.com', 'Ceduvn');
                $message->to($email, $email)->subject( 'Xác nhận đặt lại mật khẩu');
                
            });
            return back()->with('success','Kiểm tra email để đổi mật khẩu!');
        }
    }
    public function sendEmail($email,$code){
        if (Auth::check()) {
            return redirect('/')->with('error','Bạn đã đăng nhập rồi !');
        }
        else{
            $code_ss = Cache::store('redis')->get($email);
            if(Hash::check($code_ss, $code)){
                return view('frontend.forgot.reset');
            }
            else{
                return redirect('/')->with('error','Đường dẫn không chính xác!');
            }
        }


    }
    public function resetPass(Request $request, $email,$code){
        // $acc = Account::where('email', $email)->first();

        $code_ss = Cache::store('redis')->get($email);
        if(Hash::check($code_ss, $code)){

            if ($request->password == $request->re_password) {
                  $acc = Account::where('email', $email)->first();
                  $acc->password = bcrypt($request->password);
                  $acc->save();
                  $arr = ['email' => $request->email, 'password' => $request->password];

	        //  dd($arr);
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
        else{
             return redirect('/')->with('error','Đường dẫn không chính xác!');
        }
    }
}
