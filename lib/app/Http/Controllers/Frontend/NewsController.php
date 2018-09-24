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
        $list_news = News::orderBy('news_id','desc')->paginate(24);
        // dd($list_news);
        foreach ($list_news as $news) {
            $news->news_tag = explode(',', $news->news_tag);
            $news->news_tag_slug = explode(',', $news->news_tag_slug);
            // dd(count($news->news_tag_slug));
        }
        $data['news'] = $list_news;

        // dd($list_news);
    	return view('frontend/news.list-news',$data);
    }
    public function getDetail($slug){
        
        $data['news'] = News::where('news_slug',$slug)->first();
        $data['newsList'] = News::inRandomOrder()->take(4)->get();
        $data['news']->news_view += 1;

        $data['news']->save();
    	return view('frontend.news.news',$data);
    }
    public function getTag($tag){
        $list_news = News::where('news_tag_slug', 'like', '%'.$tag.'%')->orderBy('news_id','desc')->paginate(24);
        // dd($list_news);
        foreach ($list_news as $news) {
            $news->news_tag = explode(',', $news->news_tag);
            $news->news_tag_slug = explode(',', $news->news_tag_slug);
            // dd(count($news->news_tag_slug));
        }
        foreach ($list_news[0]->news_tag_slug as $index => $news_tag_slug){
            if ($news_tag_slug == $tag) $data['tag'] = $list_news[0]->news_tag[$index];
        }
        $data['news'] = $list_news;

        // dd($list_news);
        return view('frontend/news.list-news',$data);
    }
}
