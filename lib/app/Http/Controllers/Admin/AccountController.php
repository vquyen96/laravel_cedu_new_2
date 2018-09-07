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
    	return view('backend.account',$data);
    }
    public function getAdd(){
    	return view('backend.addaccount');
    }
    public function postAdd(AddAccountRequest $request){
        try{
            $acc = new Account;
            $acc->name = $request->name;

            $image = $request->file('img');
            if ($request->hasFile('img')) {
                $acc->img = saveImage([$image], 200, 'avatar');
            }
            
            $acc->email = $request->email;
            $acc->password = bcrypt($request->password);
            
            if($acc->content != null){
                $acc->content = $request->content;
            }
            else{
                $acc->content = "";
            }
            $acc->level = $request->level;
            
            $acc->save();

            return redirect('admin/account')->with('success','Thêm tài khoản thành công');
        } 
        catch(\Exception $e){
            
            return redirect('errors');
        }
        	
    }
    public function getEdit($id){
        $data['item'] = Account::find($id);
        return view('backend.editaccount', $data);
    }
    public function postEdit(Request $request, $id){
        $acc = Account::find($id);
        $acc->name = $request->name;

        $image = $request->file('img');
        if ($request->hasFile('img')) {
            $acc->img = saveImage([$image], 200, 'avatar');
            // $filename = time() . '.' . $image->getClientOriginalExtension();
            // $acc->img = $filename;
            // $request->img->storeAs('avatar',$filename);
        }
        $acc->email = $request->email;
        if ($acc->password != null) {
            $acc->password = bcrypt($request->password);
        }
        
        $acc->content = $request->content;
        $acc->level = $request->level;
        $acc->save();

        return redirect('admin/account')->with('success','Sửa tài khoản thành công');
    }

    public function getDelete($id){
        $acc = Account::find($id);
        $namefile = $acc->img;
        File::delete('libs/storage/app/avatar/'.$namefile);
        File::delete('libs/storage/app/avatar/resized-'.$namefile);
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
        return view('backend.account',$data);
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
