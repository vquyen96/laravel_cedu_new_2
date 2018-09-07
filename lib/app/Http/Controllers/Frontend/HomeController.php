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

use Auth;
class HomeController extends Controller
{
    public function getHome(){
		// $data['groups'] = Group::where('gr_parent_id', 0)->get();
        
		// $data['coursefollow'] = Course::orderBy('cou_price','desc')->where('cou_status', '1')->paginate(4);
		// $data['coursenew'] = Course::orderBy('created_at','desc')->where('cou_status', '1')->paginate(4);
		// $data['courserate'] = Course::orderBy('cou_star','desc')->where('cou_status', '1')->paginate(4);
        $data['courses'] =  Course::orderBy('created_at','desc')->where('cou_status', '1')->take(6)->get();
		$data['teacher'] = Teacher::orderBy('tea_featured','desc')->take(10)->get();
        // dd($data['teacher']);
		// $data['courseFeatured'] = Course::orderBy('cou_featured','desc')->where('cou_status', '1')->paginate(21);
        $data['bannerHead'] = Banner::where('ban_name', 'like', 'Banner Trang Chủ_Phía Trên')->get();
        $data['bannerRight'] = Banner::where('ban_name', 'like', 'Banner Thân Trang Chủ Bên Phải')->get();
        $data['bannerLeftTop'] = Banner::where('ban_name', 'like', 'Banner Thân Trang Chủ Bên Trái Phía Trên')->get();
        $data['bannerLeftBot'] = Banner::where('ban_name', 'like',  'Banner Thân Trang Chủ Bên Trái Phía Dưới')->get();
        
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
}
