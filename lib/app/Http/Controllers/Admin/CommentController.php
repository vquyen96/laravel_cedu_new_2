<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;


class CommentController extends Controller
{
    public function getList(){
        
    	$data['items'] = Comment::orderBy('com_id','desc')->paginate(8);
    	return view('backend.comment',$data);
    }
    public function getEdit($id){
    	$data['com'] = Comment::find($id);

    	return view('backend.editcomment',$data);
    }
    public function postEdit(Request $request,$id){
    	$com = Comment::find($id);
    	$com->com_star = $request->star;
    	$com->com_title = $request->title;
    	$com->com_content = $request->content;
    	$com->save();

    	return redirect('admin/comment');
    }
    public function getDelete($id){
    	Comment::destroy($id);

    	return back();
    }
}
