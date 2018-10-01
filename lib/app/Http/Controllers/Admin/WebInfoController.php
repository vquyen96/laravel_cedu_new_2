<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Webinfo;
use App\Models\Account;

class WebInfoController extends Controller
{
    public function index(){
        $website_info = Webinfo::first();

        $website_info->info = (object)json_decode($website_info->info,true);

        $website_info->updated = date('d/m/Y H:m',$website_info->updated);

        $website_info->user_updated = Account::find($website_info->acc_id);

        $data = [
            'website_info' => $website_info
        ];

        return view('backend.website_info.index',$data);
    }

    public function add_info(Request $request){
        $data = $request->get('info');
    }

    public function update_info(Request $request){
        $data = $request->get('info');

        $info = WebInfo::first();
        if(!$info){
            return redirect()->route('website_info')->with('error','Có lỗi xảy ra khi cập nhật');
        }else {
            $user = Auth::user();
            $info->acc_id = $user->id;
            $info->info = json_encode($data);
            $info->updated = time();
            if($info->update()){
                return redirect()->route('website_info')->with('success','Cập nhật thành công');
            }else {
                return redirect()->route('website_info')->with('error','Có lỗi xảy ra khi cập nhật');
            }
        }
    }

    public function delete_info($id){
        $info = WebInfo::find($id);
        if(!$info){
            return redirect()->route('website_info')->with('error','Có lỗi xảy ra khi xóa');
        }else {
            if($info->delete()){
                return redirect()->route('website_info')->with('success','Xóa thành công');
            }else {
                return redirect()->route('website_info')->with('error','Có lỗi xảy ra khi xóa');
            }
        }
    }
}
