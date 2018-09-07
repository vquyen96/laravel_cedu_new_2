<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
class BannerController extends Controller
{
    public function HomeHead(){
    	return Banner::where('ban_name','like','Banner Trang Chủ_Phía Trên')->get();
    }
}
