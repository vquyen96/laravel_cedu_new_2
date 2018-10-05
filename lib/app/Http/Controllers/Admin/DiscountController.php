<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Discount;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class DiscountController extends Controller
{
    public function getList(){
        $items = Discount::orderBy('id','desc')->paginate(10);
        $data['items'] = $this->format_date_dis($items);
        return view('backend.discount.list',$data);
    }
    public function getAdd(){
        $dis = [
            'name'=>'',
            'code'=>'',
            'percent'=>'',
            'created_at'=>'',
            'timeout'=>'',
        ];
        $data['dis'] = (object)$dis;
        return view('backend.discount.form', $data);
    }
    public function postAdd(Request $request){
        $data = $request->dis;
        $data['created_at'] = strtotime($data['created_at']);
        $data['timeout'] = strtotime($data['timeout']);
        $data['acc_id'] = Auth::user()->id;

        if (Discount::create($data)) return redirect('admin/discount')->with('success', 'Thêm mới thành công');
        return back()->with('error', 'Thêm mới thất bại');

    }
    public function getEdit($id){
        $dis = Discount::find($id);
        $dis->created_at = date('Y/m/d H:i:s', $dis->created_at);
        $dis->timeout = date('Y/m/d H:i:s', $dis->timeout);
        $data['dis'] = $dis;
        return view('backend.discount.form', $data);
    }
    public function postEdit(Request $request, $id){
        $dis = Discount::find($id);
        $data = $request->dis;
        $data['created_at'] = strtotime($data['created_at']);
        $data['timeout'] = strtotime($data['timeout']);
        $data['acc_id'] = Auth::user()->id;

        if ($dis->update($data)) return redirect('admin/discount')->with('success', 'Sửa thành công');
        return back()->with('error', 'Sửa thất bại');
    }

    public function getDelete($id){
        $dis = Discount::find($id);
        $dis->delete();
        return back();
    }
    function format_date_dis($items){
        foreach ($items as $item){
            $item->created_at = date('Y/m/d H:i:s', $item->created_at);
            $item->timeout = date('Y/m/d H:i:s', $item->timeout);
        }
        return $items;
    }
}
