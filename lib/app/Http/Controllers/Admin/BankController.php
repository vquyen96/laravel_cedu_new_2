<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bank;

class BankController extends Controller
{
    private $size = [200];
    public function getList(){
    	$bank = Bank::orderByDesc('id')->paginate(10);
    	$data = [
    		'items' => $bank
    	];
    	return view('backend.bank.list', $data);
    }
    public function getAdd(){
    	$bank = [
    		'nickname' => '',
    		'name' => '',
    		'img' => '',
    		'acc_num' => '',
    		'acc_name' => ''
    	];
    	$data['bank'] = (object) $bank;
    	return view('backend.bank.form', $data);
    }
    public function postAdd(Request $request){
    	$bank = $request->bank;
        $image = $request->file('img');
        if ($request->hasFile('img')) {
            if (filesize($image) < 1500000) {
                $bank['img'] = saveImage([$image], $this->size, 'bank');
                if ($bank['img'] == false) {
                    return back()->with('error', 'Ảnh của bạn bị lỗi !!! vui lòng thay ảnh khác');
                }
                // dd($data);
            } else {
                return back()->with('error', 'Dung lượng ảnh của bạn quá lớn');
            }
        }
    	if (Bank::create($bank)) {
    		return redirect('admin/bank')->with('success', 'Tạo mới tài khoản ngân hàng thành công');
    	}
    	else{
    		return redirect('admin/bank')->with('error', 'Tạo mới tài khoản ngân hàng gặp lỗi');
    	}
    }
    public function getEdit($id){
    	$bank = Bank::find($id);
    	$data['bank'] = $bank;
    	return view('backend.bank.form', $data );
    }

    public function postEdit(Request $request, $id){
    	$bank = Bank::find($id);
    	$data = $request->bank;
        $image = $request->file('img');
        if ($request->hasFile('img')) {
            if (filesize($image) < 1500000) {
                $data['img'] = saveImage([$image], $this->size, 'bank');
                if ($data['img'] == false) {
                    return back()->with('error', 'Ảnh của bạn bị lỗi !!! vui lòng thay ảnh khác');
                }
                // dd($data);
            } else {
                return back()->with('error', 'Dung lượng ảnh của bạn quá lớn');
            }
        }
    	if ($bank->update($data)) {
    		return redirect('admin/bank')->with('success', 'Sửa tài khoản ngân hàng thành công');
    	}
    	else{
    		return redirect('admin/bank')->with('error', 'Sửa tài khoản ngân hàng gặp lỗi');
    	}
    }
    public function delete($id){
    	$bank = Bank::find($id);
        $size_img = [200];
        foreach ($size_img as $size) {
            File::delete('lib/storage/app/bank/resized'.$size.'-'.$bank->img);
        }
        $bank->delete();
        return back();
    }

}
