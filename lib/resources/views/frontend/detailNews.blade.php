@extends('frontend.master')
@section('title',"Tin tức")
@section('fb_title', $news->news_title)
@section('fb_description')
{!!cut_string($news->news_content, 200)!!}
@stop
@section('fb_image',asset('lib/storage/app/news/'.$news->news_img))
@section('main')
<link rel="stylesheet" type="text/css" href="css/detailNews.css">

<div class="container newsPage">
	{{-- <div class="row">
		<div class="col-md-12 sol-sm-12">
			
		</div>
	</div> --}}
	<div class="row">
		<div class="col-md-8 col-sm-6 ">

			
			<div class="newsDetail">
				<div class="newsHeader">
					<h3>{{$news->news_title}}</h3>
				</div>

				<div
				  class="fb-like"
				  data-share="true"
				  data-width="450"
				  data-show-faces="true">
				</div>
				
				<div class="zalo-share-button" data-href="{{asset('')}}{{Request::path()}}" data-oaid="1002971025686324636" data-layout="1" data-color="blue" data-customize=false></div>
				<span class="news_view">{{number_format($news->news_view,0,',','.')}} Lượt xem</span> 
				{{-- <span class="news_view">{{time_format($news->created_at)}}</span> --}}
				<img src="{{ asset('lib/storage/app/news/'.$news->news_img) }}">

				<p>
					{!!$news->news_content!!}
				</p>
				<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="100%" data-numposts="5"></div>
			</div>

		</div>
		<div class="col-md-4 col-sm-4">
			<div class="newsList">
				<div class="newsListMain">
					@foreach($newsList as $item)
					<a href="{{ asset('news/detail/'.$item->news_slug) }}" class="newsListItem">
						<img src="{{ asset('lib/storage/app/news/resized-'.$item->news_img) }}">
						<h4>{{cut_string($item->news_title, 60)}}</h4>
						
					</a>
					@endforeach
				</div>
					
				<div class="newsBanner"></div>
			</div>

		</div>
	</div>
</div>
@stop
@section('script')
<script type="text/javascript" src="js/detailNew.js"></script>
<script src="https://sp.zalo.me/plugins/sdk.js"></script>
@stop