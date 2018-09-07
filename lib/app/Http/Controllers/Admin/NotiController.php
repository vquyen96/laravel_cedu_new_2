<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Noti;

class NotiController extends Controller
{
    public function getList(){
    	$data['items'] = Noti::paginate(8);
    	return view('backend.noti', $data);
    }
    public function postAdd(Request $request){
    	$noti = new Noti;
    	$noti->noti_name = $request->name;
    	$noti->noti_link = $request->link;
    	$noti->noti_content = $request->content;
    	$image = $request->file('img');
        if ($request->hasFile('img')) {
            $noti->noti_img = saveImage([$image], 100, 'noti');
        }
        $noti->noti_status = 1;
        $noti->save();
        return back()->with('success','Thêm thông báo thành công');

    }
    public function getEdit($id){
        $data['items'] = Noti::paginate(8);
    	$data['item'] = Noti::find($id);
        // dd($data['item']);
    	return view('backend.edit_noti', $data);
    }
    public function postEdit(Request $request, $id){
    	$noti = Noti::find($id);
    	$noti->noti_name = $request->name;
    	$noti->noti_link = $request->link;
    	$noti->noti_content = $request->content;
    	$image = $request->file('img');
        if ($request->hasFile('img')) {
            $noti->noti_img = saveImage([$image], 100, 'noti');
        }
        $noti->noti_status = 1;
        $noti->save();
        return back()->with('success','Sửa thông báo thành công');

    }

    public function getSeen($id){
    	$noti = Noti::find($id);
    	$noti->noti_status = 0;
    	$noti->save();
    	return back();
    }
    public function getDelete($id){
    	$noti = Noti::find($id);
    	$namefile = $noti->noti_img;
        File::delete('libs/storage/app/news/'.$namefile);
        File::delete('libs/storage/app/news/resized-'.$namefile);
        $noti->delete();
        return back();
    	
    }
}
