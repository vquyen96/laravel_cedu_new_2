<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;
use Auth;
use App\Http\Requests\AddAccountRequest;
use File;
// use Image;
class AccountController extends Controller
{
    public function getList(){
        if (Auth::user()->level > 2) {
           return redirect('');
        }
    	$data['items'] = Account::orderBy('id','desc')->paginate(7);
    	return view('backend.account.list',$data);
    }
    public function getAdd(){
    	return view('backend.account.add');
    }
    public function postAdd(AddAccountRequest $request){
        try{
            $acc = new Account;
            $acc->name = $request->name;

            $image = $request->file('img');
            if ($request->hasFile('img')) {
                $acc->img = saveImage([$image], [50,250,360], 'avatar');
            }
            
            $acc->email = $request->email;
            $acc->password = bcrypt($request->password);
            $acc->summary = $request->summary;
            if($acc->content != null){
                $acc->content = $request->content;
            }
            else{
                $acc->content = "";
            }
            $acc->level = $request->level;
            $acc->save();
            sleep(1);
            if ($acc->level == 7) app(\App\Http\Controllers\TeacherController::class)->findOrCreateTeacher($acc->id);

            return redirect('admin/account')->with('success','Thêm tài khoản thành công');
        } 
        catch(\Exception $e){
            
            return redirect('errors');
        }
        	
    }
    public function getEdit($id){
        $data['item'] = Account::find($id);
        return view('backend.account.edit', $data);
    }
    public function postEdit(Request $request, $id){
        $acc = Account::find($id);
        $acc->name = $request->name;

        $image = $request->file('img');
        if ($request->hasFile('img')) {
            $size_img = [50,250,360];
            foreach ($size_img as $size) {
                File::delete('lib/storage/app/avatar/resized'.$size.'-'.$acc->img);
            }
            $acc->img = saveImage([$image], $size_img, 'avatar');
            
        }
        $acc->email = $request->email;
        if ($acc->password != null) {
            $acc->password = bcrypt($request->password);
        }
        
        $acc->content = $request->content;
        $acc->summary = $request->summary;
        $acc->level = $request->level;
        $acc->save();

        return redirect('admin/account')->with('success','Sửa tài khoản thành công');
    }

    public function getDelete($id){
        $acc = Account::find($id);
        $size_img = [50,250,360];
        foreach ($size_img as $size) {
            File::delete('lib/storage/app/avatar/resized'.$size.'-'.$acc->img);
        }
        $acc->delete();
        Account::destroy($id);
        return back();
    }

    public function getSearch(Request $request){
        $result = $request->search;
        $data['keyword'] = $result;
        $result = str_replace(' ', '%', $result);
        $data['items'] =  Account::where('name', 'like', '%'.$result.'%')->paginate(8);
        // dd($data['items']);
        return view('backend.account.list',$data);
    }

    public function change_level(){
        $acc = Account::where('level', 5)->get();
        foreach ($acc as $item) {
            $item->level = 8;
            $item->save();
        }
        dd("oke");
    }
}
