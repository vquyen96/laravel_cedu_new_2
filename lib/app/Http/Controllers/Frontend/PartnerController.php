<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Aff;
use App\Models\Teacher;
use App\Models\Banner;

use App\Http\Requests\AddAccountRequest;
use Auth;
class PartnerController extends Controller
{
    public function getList(){
    	// $data['teacher'] = Account::where('level',3)->paginate(3);
        // $data['teacher'] = Teacher::orderBy('tea_featured','desc')->paginate(3);
            $data['teacher'] = Teacher::orderBy('tea_featured','desc')->take(10)->get();
            $data['banner'] = Banner::where('ban_link', 'Banner đối tác')->inRandomOrder()->first();
            
    	return view('frontend.partner.partner',$data);
    }
    public function getAffiliate(){
    	return view('frontend.landing.goto_affiliate');
    }
    public function postAffiliate(AddAccountRequest $request){
        if (Auth::check()) {
            if (Auth::user()->level == 8) {
                return back()->with('error', 'Bạn đã đăng ký trở thành CTV');
            }
            if (Auth::user()->level < 8) {
                return back()->with('error', 'Bạn ấn nhầm rồi');
            }
            $acc = Account::find(Auth::user()->id);
            $acc->level = 8;
            $acc->save();
            
            $aff = Aff::where('aff_acc_id', $acc->id)->first();
            if ($aff == null) {
                while (true) {
                    $code_value   = mt_rand(100000, 999999);
                    $codeExit = Aff::where('aff_code', $code_value)->first();
                    if($codeExit == null){
                        $aff = new Aff;
                        $aff->aff_code = $code_value;
                        $aff->aff_acc_id =  $acc->id;
                        $aff->save();
                        break;
                    }
                }
            }
            return back()->with('success', 'Cảm ơn bạn đã đăng ký trở thành CTV');
        }
        else{
            $acc = new Account;
            $acc->name = $request->name;
            $acc->email = $request->email;
            $acc->password = bcrypt($request->password);
            $acc->level = 8;
            $acc->content = " ";
            $acc->save();
            sleep(1);

            $aff = Aff::where('aff_acc_id', $acc->id)->first();
            if ($aff == null) {
                while (true) {
                    $code_value   = mt_rand(100000, 999999);
                    $codeExit = Aff::where('aff_code', $code_value)->first();
                    if($codeExit == null){
                        $aff = new Aff;
                        $aff->aff_code = $code_value;
                        $aff->aff_acc_id =  $acc->id;
                        $aff->save();
                        break;
                    }
                }
            }
            $arr = ['email' => $request->email, 'password' => $request->password];
            if(Auth::attempt($arr, true)){
               return back()->with('success', 'Cảm ơn bạn đã đăng ký trở thành CTV');
            }
            else{
                return back()->withInput()->with('error','Tài khoản khặc mật khẩu của bạn không đúng');
            }
        }
            
    	
    }

    public function getGiaovien(){
    	return view('frontend.landing.goto_teacher');
    }
    public function postGiaovien(Request $request){
        if (Auth::check()) {
            if (Auth::user()->level < 7) {
                return back()->with('error', 'Bạn bấm nhầm rồi ^^ !!');
            }
            $acc = Account::find(Auth::user()->id);
            $acc->phone = $request->phone;
            $acc->teacher_wait = 1;
            $acc->content = "fb: ".$request->facebook.' | Chủ đề giảng dạy: '.$request->chude.' | Kinh Nghiệm: '.$request->exp;
            $acc->save();
        }
        else{
            $acc = new Account;
            $acc->name = $request->name;
            $acc->email = $request->email;
            $acc->password = bcrypt("Cedu2018@");
            $acc->phone = $request->phone;
            $acc->level = 7;
            $acc->teacher_wait = 1;
            $acc->content = "fb: ".$request->facebook.' | Chủ đề giảng dạy: '.$request->chude.' | Kinh Nghiệm: '.$request->exp;
            $acc->save();
            sleep(1);
            $arr = ['email' => $acc->email, 'password' => "Cedu2018@"];
            if(Auth::attempt($arr, true)){
                return back()->with('success', 'Đăng ký thành công');
            }
        }
    	return back()->with('success', 'Đăng ký thành công');


        //http://localhost/laravel_c_edu/cart/complete_nganluong?transaction_info=&order_code=803432&price=2000&payment_id=36141779&payment_type=2&error_text=&secure_code=d59124e77077ef5666887153d90128a9&token_nl=15318951-7b01812a3e3d5a07e92984b77ffde8b3
    }
}
