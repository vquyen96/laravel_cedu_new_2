<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Teacher;
use App\Models\Story;
use Auth;
use File;
class TeacherController extends Controller
{
    public function getList(){
        if (Auth::user()->level == Account::ACCOUNTANT) {
            $accs = Account::where('level',Account::TEACHER)->orderBy('id','desc')->paginate(10);
            foreach ($accs as $acc){
                $acc->total_sale = $acc->sale->sum('total');
                $acc->total_profit = $acc->sale->sum('profit');
                $acc->total_student = $acc->sale->sum('cou');
            }
//            dd($accs);
            $data['total_sale'] = $accs->sum('total_sale');
            $data['total_profit'] = $accs->sum('total_profit');
            $data['items'] = $accs;
            return view('backend.accountant.teacher',$data);
        }
        else{
            $data['wait'] = Account::where('teacher_wait', 1)->orderBy('id','desc')->get();
            $data['items'] = Account::where('teacher_wait', 0)->where('level',Account::TEACHER)->orderBy('id','desc')->paginate(10);

            return view('backend.teacher.list',$data);
        }
            
    }
    public function getAdd(){
    	
    	return view('backend.addaccount');
    }
    public function postAdd(Request $request){
    	$acc = new Account;
        $acc->name = $request->name;

        $image = $request->file('img');
        if ($request->hasFile('img')) {
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $acc->img = $filename;
            $request->img->storeAs('avatar',$filename);
        }
        $acc->job = 'Tu do';
        $acc->email = $request->email;
        $acc->password = bcrypt($request->password);
        $acc->content = $request->content;
        $acc->level = $request->level;
        $acc->save();

    	return redirect('admin/account')->with('success','Thêm tài khoản thành công');
    }
    public function getActive($id){
        $account = Account::find($id);
        $account->level = 7;
        $account->teacher_wait = 0;
        $account->save();

        $teacher = new Teacher;
        $teacher->tea_templace = 1;
        $teacher->tea_img_head = "";
        $teacher->tea_img_foot = "";

        $teacher->tea_gender = 1;
        $teacher->tea_specialize = "";
        $teacher->tea_degree = "Cử nhân";
        $teacher->tea_email = Account::find($id)->email;
        $teacher->tea_fb = " ";
        $teacher->tea_follow = 10;
        $teacher->tea_lesson = 10;
        $teacher->tea_exp = 10;
        $teacher->tea_work_place = " ";
        $teacher->tea_acc_id = $id;
        $teacher->save();

        return back()->with('success', 'Kích hoạt thành công ');
    }

    public function getNo($id){
        $account = Account::find($id);
        $account->level = 7;
        $account->teacher_wait = 0;
        $account->save();
        return back()->with('success', 'Từ chối giáo viên thành công');
    }
    // public function postEdit(Request $request, $id){
    //     $acc = Account::find($id);
    //     $acc->name = $request->name;

    //     $image = $request->file('img');
    //     if ($request->hasFile('img')) {
    //         $filename = time() . '.' . $image->getClientOriginalExtension();
    //         $acc->img = $filename;
    //         $request->img->storeAs('avatar',$filename);
    //     }
    //     $acc->job = 'Tu do';
    //     $acc->email = $request->email;
    //     $acc->password = bcrypt($request->password);
    //     $acc->content = $request->content;
    //     $acc->level = $request->level;
    //     $acc->save();

    //     return redirect('admin/account')->with('success','Sửa tài khoản thành công');
    // }

    public function getDelete($id){
        Account::destroy($id);
        return back();
    }

    public function getDetail($id){
        $data['teacher'] = $this->findOrCreateTeacher($id);

        return view('backend.teacher.detail', $data);
    }
    public function postDetail(Request $request, $id){
        $teacher = Teacher::where('tea_acc_id',$id)->first();
        $acc = $request->acc;

        $imageHead = $request->file('tea_img_head');
        if ($request->hasFile('tea_img_head')) {
            $filename = time() . '.' . $imageHead->getClientOriginalExtension();
            $teacher->tea_img_head = $filename;

            $request->file('tea_img_head')->storeAs('teacher',$filename);
        }
        $imageFoot = $request->file('tea_img_foot');
        if ($request->hasFile('tea_img_foot')) {
            $filename = time() . '.' . $imageFoot->getClientOriginalExtension();
            $teacher->tea_img_foot = $filename;

            $request->file('tea_img_foot')->storeAs('teacher',$filename);

        }
        $image = $request->file('img');
        if ($request->hasFile('img')) {
            $size_img = [50,250,360];
            foreach ($size_img as $size) {

                File::delete('lib/storage/app/avatar/resized'.$size.'-'.$teacher->acc->img);
                // dd($size);
            }
            $acc['img'] = saveImage([$image], $size_img, 'avatar');
        }
        $teacher->acc->update($acc);

        $teacher->tea_gender = $request->tea_gender;
        // $teacher->tea_specialize = $request->tea_specialize;
        $teacher->tea_degree = $request->tea_degree;
        if(Auth::user()->level != 7){
            $teacher->tea_featured = $request->tea_featured;
        }
        $teacher->tea_fb = $request->tea_fb;
        $teacher->tea_gg = $request->tea_gg;
        $teacher->tea_yt = $request->tea_yt;
       
        $teacher->tea_work_place = $request->tea_work_place;
        $teacher->tea_acc_id = $id;

        
        $teacher->save();
        return back()->with('success','Sửa thành công');
    }
    public function getAddSto($tea){
        $data['teacher'] = Teacher::find($tea);
        return view('backend.add_story',$data);
    }
    public function postAddSto(Request $request, $tea){
        $teacher = Teacher::find($tea);
        $story = new Story;
        $story->sto_title = $request->sto_title;
        $image = $request->file('img');
        if ($request->hasFile('img')) {
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $story->sto_img = $filename;
            $request->img->storeAs('story',$filename);
        }else{
            $story->sto_img = "";
        }
        $story->sto_content = $request->sto_content;
        $story->sto_tea_id = $tea;
        $story->save();
        return redirect('admin/teacher/detail/'.$teacher->acc->id)->with('success','Thêm thành công');
    }
    public function getEditSto($tea, $sto){
        $data['teacher'] = Teacher::find($tea);
        $data['story'] = Story::find($sto);
        return view('backend.edit_story',$data);
    }
    public function postEditSto(Request $request, $tea, $sto){
        $teacher = Teacher::find($tea);
        $story = Story::find($sto);
        $story->sto_title = $request->sto_title;
        $image = $request->file('img');
        if ($request->hasFile('img')) {
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $story->sto_img = $filename;
            $request->img->storeAs('story',$filename);
        }
        $story->sto_content = $request->sto_content;
        $story->sto_tea_id = $tea;
        $story->save();
        return redirect('admin/teacher/detail/'.$teacher->acc->id)->with('success','Sửa thành công');
    }

    public function getDeleteSto($tea, $sto){
        Story::destroy($sto);
        return back();
    }

    function findOrCreateTeacher($acc_id){
        $teacher = Teacher::where('tea_acc_id',$acc_id)->first();
        if($teacher == null){
            $teacher = new Teacher;
            $teacher->tea_templace = 1;
            $teacher->tea_img_head = "";
            $teacher->tea_img_foot = "";

            $teacher->tea_gender = 1;
            $teacher->tea_specialize = "";
            $teacher->tea_degree = "Cử nhân";
            $teacher->tea_email = Account::find($acc_id)->email;
            $teacher->tea_fb = " ";
            $teacher->tea_follow = 10;
            $teacher->tea_lesson = 10;
            $teacher->tea_exp = 10;
            $teacher->tea_work_place = " ";
            $teacher->tea_acc_id = $acc_id;
            $teacher->save();
        }
        return $teacher;
    }
}
