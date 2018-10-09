<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Course;
use App\Models\Account;
use App\Models\Banner;
use App\Models\About;
use App\Models\Teacher;
use App\Http\Requests\AddAccountRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;

use Auth;
class HomeController extends Controller
{
    public function getHome(){
        if ( Auth::check() && $this->checkemail(Auth::user()->email) || Auth::guest() ){

        }
        else{
            return 'Errorr';
        }
        $data['banner'] = Banner::where('ban_link', 'Banner trang chủ')->inRandomOrder()->first();
    	return view('frontend.index.home',$data);
    }
    public function getToHome(){
        return redirect('');
    }
    public function getRegister(){
        return view('backend.login2');

    }
    public function postRegister(AddAccountRequest $request){
        // dd($request->all());
    	$acc = new Account;
        $acc->name = $request->name;
        $acc->email = $request->email;
        // dd($request->password ." - - ". $request->repassword);
        if ($request->password != $request->repassword) {
           return back()->with('error', 'Mật khẩu bạn nhập không trùng khớp');
        }
        $acc->password = bcrypt($request->password);
        $acc->level = 9;
        $acc->content = " ";
        $acc->save();
        sleep(1);
        
        $arr = ['email' => $acc->email, 'password' => $request->password];
        if(Auth::attempt($arr, true)){
            return back();
        }
        else{
            return back()->withInput()->with('error','Tài khoản khặc mật khẩu của bạn không đúng');
        }
    }
    public function postLogin(Request $request){
        $arr = ['email' => $request->email, 'password' => $request->password];

        // dd($arr);
        if(Auth::attempt($arr, true)){
            if (Auth::user()->level >7) {
                return back()->with('success','Đăng nhập thành công');
            }
            else{
                return redirect('admin');
            }
        }
        else{
            return back()->withInput()->with('error','Tài khoản khặc mật khẩu của bạn không đúng');
        }
    }

    public function getAbout($slug){
        // dd('ok');
        $data['about'] = About::where('about_slug', $slug)->first();
        return view('frontend.about.about',$data);
    }


    public function get_course_home(){
        $id = Input::get('id');

        switch ($id) {
            case 1:
                $data['courses'] = Course::orderBy('created_at','desc')->where('cou_status', '1')->take(6)->get();
                break;
            case 2:
                $data['courses'] = Course::orderBy('cou_featured','desc')->where('cou_status', '1')->take(6)->get();
                break;
            case 3:
                $data['courses'] = Course::orderBy('cou_star','desc')->where('cou_status', '1')->take(6)->get();
                break;
            
            default:
                return response('error', 404);
                break;
        }
        // return response($id, 200);
        // dd($id);
        $view = View::make('frontend.index.course',$data)->render();
        // dd($view);
        return response($view, 200);
    }
    public function get_templace(){
        $num = Input::get('num');
        $templaces = ['home1','home2','home3','home4'];
        $data['courses'] =  Course::orderBy('created_at','desc')->where('cou_status', '1')->take(6)->get();
        $data['teacher'] = Teacher::orderBy('tea_featured','desc')->take(10)->get();
        $data['banner'] = Banner::where('ban_link', 'Banner trang chủ')->first();
//        $data = [];
        switch ($num) {
            case 0:
                $view = View::make('frontend.index.'.$templaces[0],$data)->render();
                return response($view, 200);
                break;
            case 1:
                $view = View::make('frontend.index.'.$templaces[1],$data)->render();
                return response($view, 200);
                break;
            case 2:
                $view = View::make('frontend.index.'.$templaces[2],$data)->render();
                return response($view, 200);
                break;
            case 3:
                $view = View::make('frontend.index.'.$templaces[3],$data)->render();
                return response($view, 200);
                break;
            case 4:
                $view = View::make('frontend.layout.footer',$data)->render();
                return response($view, 200);
                break;

            default:
                return response('error', 404);
                break;
        }
    }
    public function getEmail(){
        if (\Illuminate\Support\Facades\Auth::check()){
            return view('frontend.forgot.email');
        }
    }
    public function postEmail(Request $request){
        $email = $request->email;
        $emailExists = Account::where('email', $email)->first();
        if ($emailExists == null){
            $acc = Account::find(Auth::user()->id);
            $acc->update(['email'=>$email]);
            return redirect('/')->with('success', 'Cập nhật email thành công');
        }
        else{
            return back()->with('error', 'email đã tồn tại');
        }
    }





    
}
