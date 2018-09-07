<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gift;

class GiftController extends Controller
{
    public function postGift(Request $request){
    	$gift = Gift::where('gift_email', $request->email)->first();
    	if ($gift == null) {
    		$gift = new Gift;
    		$gift->gift_email = $request->email;
    		$gift->gift_status = 1;
    		$gift->save();
    		return back()->with('success','Đăng kí nhận quà thành công');
    	}
    	else{
    		return back()->with('error', 'Bạn đã đăng kí rồi');
    	}
    }
}
