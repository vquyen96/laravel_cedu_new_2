<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use File;

class NewsController extends Controller
{
    public function getList(){
    	$data['items'] = News::orderBy('news_id','desc')->paginate(8);
    	return view('backend.news',$data);
    }
    public function getAdd(){

    	return view('backend.addnews');
    }
    public function postAdd(Request $request){
    	$news = new News;
        $news->news_title = $request->title;
		$news->news_slug = str_slug($request->title);
        $news->news_view = $request->view;
        $news->news_tag = $request->tag;
        $tags = explode(',', $news->news_tag);
        $tag_slug = [];
        foreach ($tags as $tag) {
            $tag_slug[] = str_slug($tag);
        }
        $news->news_tag_slug = implode(",", $tag_slug);
        $image = $request->file('img');
        if ($request->hasFile('img')) {
            $news->news_img = saveImage([$image], [360], 'news');
        }
        $news->news_content = $request->content;
        $news->news_type = 1;
        $news->save();

    	return redirect('admin/news')->with('success','Thêm tin tức thành công');
    }
    public function getEdit($id){
    	$data['news'] = News::find($id);
        // dd($data);
    	return view('backend.editnews',$data);
    }
    public function postEdit(Request $request, $id){
    	$news = News::find($id);
    	$news->news_title = $request->title;
		$news->news_slug = str_slug($request->title);
        $news->news_view = $request->view;
        $news->news_tag = $request->tag;
        $tags = explode(',', $news->news_tag);
        $tag_slug = [];
        foreach ($tags as $tag) {
            $tag_slug[] = str_slug($tag);
        }
        $news->news_tag_slug = implode(",", $tag_slug);
        $image = $request->file('img');
        if ($request->hasFile('img')) {
            File::delete('lib/storage/app/news/'.$news->img);
            File::delete('lib/storage/app/news/resized360-'.$news->img);
            $news->news_img = saveImage([$image], [360], 'news');
        }
        $news->news_content = $request->content;
        $news->news_type = 1;
        $news->save();
        return redirect('admin/news')->with('success','Sửa tin tức thành công');
    }
    public function getDelete($id){
        $news = News::find($id);
        $namefile = $news->img;
        File::delete('lib/storage/app/news/'.$namefile);
        File::delete('lib/storage/app/news/resized360-'.$namefile);
        $news->delete();
        return back();
    }
}
