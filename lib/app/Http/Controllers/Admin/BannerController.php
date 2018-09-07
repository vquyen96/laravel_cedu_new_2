<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
class BannerController extends Controller
{
    public function getList(){
    	$data['banner'] = Banner::paginate(20);
    	return view('backend.banner', $data);
    }
    public function getAdd(){
    	$data['banner'] = Banner::paginate(20);
    	return view('backend.add_banner', $data);
    }
    public function postAdd(Request $request){
    	$banner = new Banner;
    	$banner->ban_name = $request->ban_name;
        $banner->ban_link = $request->ban_link;

    	$image = $request->file('img');
        if ($request->hasFile('img')) {
            
            $filename = time() . '.' . $image->getClientOriginalExtension();
            
            $banner->ban_img = $filename;
            $request->img->storeAs('banner',$filename);
            $banner->save();
            return redirect('admin/banner')->with('succcess','Thêm banner thành công!');
        }
        else{
        	return redirect('admin/banner')->with('error','Banner không có hình ảnh');
        }

    	
    }
    public function getEdit($id){
    	$data['banner'] = Banner::find($id);
        return view('backend.edit_banner', $data);
    }
    public function postEdit(Request $request, $id){
        $banner = Banner::find($id);
        $banner->ban_name = $request->ban_name;
        $banner->ban_link = $request->ban_link;
        
        $image = $request->file('img');
        if ($request->hasFile('img')) {
            
            $filename = time() . '.' . $image->getClientOriginalExtension();
            
            $banner->ban_img = $filename;
            $request->img->storeAs('banner',$filename);
        }
        $banner->save();
        return redirect('admin/banner')->with('succcess','Sửa banner thành công!');
    	$data['banner'] = Banner::paginate(20);
    	return view('backend.banner', $data);
    }
    public function getDelete($id){
    	Banner::destroy($id);
    	return back()->with('success','Xóa thành công');
    }
}
