<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class DiscountController extends Controller
{
    public function check_discount(){
        $code = Input::get('code');
        $dis = Discount::where('code', $code)->first();
        $data['dis'] = $dis;
//        return response($dis , 202);
//        $view = View::make('frontend.course.discount',$data)->render();
        if (!isset($dis)) return response('Mã khuyến mãi không tồn tại', 502);
        if ($dis->created_at > time()) return response('Mã giảm giá của bạn chưa đến ngày' , 501);
        if ($dis->timeout < time()) return response('Mã giảm giá của bạn đã hết hạn' , 501);
        if ($dis != null) return response($dis , 202);

    }
}
