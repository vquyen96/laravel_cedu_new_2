<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;
use Auth;
class LoginController extends Controller
{
    public function getLogin(){
        $acc = Account::find(1);
        $acc->password = bcrypt('admin');
        $acc->save();
    	return view('backend.login2');
    }
    public function postLogin(Request $request){
    	$arr = ['email' => $request->email, 'password' => $request->password];

    	// dd($arr);
    	if(Auth::attempt($arr, true)){
    		if (Auth::user()->level > 6  ) {
                if (Auth::user()->level == 7) {
                    return redirect('teacher/dashboard');
                }
                if (Auth::user()->level == 8) {
                    return redirect('aff/dashboard');
                }
                else{
                    return redirect('/');
                }
    			
    		}
    		else{
    			return redirect('admin');
    		}
    	}
    	else{
    		return back()->withInput()->with('error','Tài khoản khặc mật khẩu của bạn không đúng');
    	}
    	return view('backend.login');
    }

    public function getLogout(){
        Auth::logout();
        return back();
    }
    public function postRegister(Request $request){
        $acc = new Account;
        $acc->name = $request->name;
        $acc->email = $request->email;
        $acc->password = bcrypt($request->password);
        $acc->status = 9;
        $acc->content = " ";
        $acc->save();
        sleep(1);
        $arr = ['email' => $request->email, 'password' => $request->password];

        // dd($arr);
        if(Auth::attempt($arr, true)){
            if (Auth::user()->level > 7) {
                return redirect('/');
            }
            else{
                return redirect('admin');
            }
        }
        else{
            return back()->withInput()->with('error','Tài khoản khặc mật khẩu của bạn không đúng');
        }
        return back();
    }
}
