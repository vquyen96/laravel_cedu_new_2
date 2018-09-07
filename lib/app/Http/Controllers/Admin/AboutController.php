<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;

class AboutController extends Controller
{
    public function getList(){
    	$data['items'] = About::orderBy('about_id','desc')->paginate(7);
    	return view('backend.about',$data);
    }
    public function getAdd(){

    	return view('backend.add_about');
    }
    public function postAdd(Request $request){
    	$about = new About;
        $about->about_name = $request->name;
		$about->about_slug = str_slug($request->name);
		$about->about_text = $request->content;
        $about->save();

    	return redirect('admin/about')->with('success','Thêm mục thành công');
    }
    public function getEdit($id){
        $data['item'] = About::find($id);

        return view('backend.edit_about', $data);
    }
    public function postEdit(Request $request, $id){
        $about = About::find($id);
        $about->about_name = $request->name;
		$about->about_slug = str_slug($request->name);
		$about->about_text = $request->content;
        $about->save();
        return redirect('admin/about')->with('success','Sửa thành công');
    }

    public function getDelete($id){
        About::destroy($id);
        return back();
    }

}