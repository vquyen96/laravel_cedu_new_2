<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gift;
use Auth;
use Mail;
class GiftController extends Controller
{
    public function getList(){
    	$data['items'] = Gift::get();
    	return view('backend.gift', $data);
    }
    public function postGift(Request $request){
        if ($request->check_item == null) {
            return redirect('errors');
        }
        else{
            foreach ($request->check_item as $item) {

                $data['data'] = $request->content;
                $email = $item;
                Mail::send('frontend.emailGift', $data, function($message) use ($email){
                    $message->from('info@ceduvn.com', 'Ceduvn');
                    $message->to($email, $email)->subject('Quà tặng cho thành viên CEDU!');
                    // $message->cc('thongminh.depzai@gmail.com', 'boss');
                });
            }
            return back()->with('success','Gửi mail thành công');
        }
        	

    	
    }
}
