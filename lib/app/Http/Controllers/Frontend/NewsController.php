<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
class NewsController extends Controller
{

    public function getList(){

     //    $data['newsHead'] = News::orderBy('created_at','desc')->paginate(5);
    	// $data['newInWeekL'] = News::where('news_id','<','4')->paginate(3);
    	// $data['newInWeekM'] = News::where('news_id','>','3')->paginate(3);
    	// $data['newInWeekR'] = News::where('news_id','>','5')->paginate(3);

    	// $data['newMostFollowL'] = News::orderBy('news_id','desc')->paginate(4);
    	// $data['newMostFollowR'] = News::orderBy('news_id','asc')->paginate(6);
        $data['news'] = News::orderBy('news_id','desc')->paginate(6);
    	return view('frontend/news.list-news',$data);
    }
    public function getDetail($slug){
        
        $data['news'] = News::where('news_slug',$slug)->first();
        $data['newsList'] = News::paginate(4);
        $data['news']->news_view += 1;
        $data['news']->save();
    	return view('frontend.news.news',$data);
    }
}
