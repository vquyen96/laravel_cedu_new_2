@extends('frontend.master')
@section('title',$news->news_title)
@section('fb_title', cut_string($news->news_title, 70))
{{--@section('fb_description', cut_string($news->new))--}}
@section('fb_image',  file_exists(storage_path('/app/news/resized360-'.$news->news_img)) ? asset('lib/storage/app/news/resized360-'.$news->news_img) : file_exists(storage_path('/app/news/'.$news->news_img)) ? asset('lib/storage/app/news/'.$news->news_img) : $news->news_img )
@section('main')
<link rel="stylesheet" type="text/css" href="css/news/news.css">
	<div class="instruction">
		<div class="instruction_body">
			<a href="{{ asset('') }}" class="instruction_item">
				Trang chủ
			</a>
			<a class="instruction_item">
				>
			</a>
			<a href="{{ asset('news') }}" class="instruction_item">
				Tin tức
			</a>
			<a class="instruction_item">
				>
			</a>
			<a href="{{ asset('news/detail/'.$news->news_slug) }}" class="instruction_item">
				{{$news->news_title}}
			</a>
			
			
		</div>
		
	</div>
	<div class="main_body">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-8 col-12">
					<div id="content-left">
						<h1>{{$news->news_title}}</h1>
						<div class="thong-ke">
							<div class="date"><i class="far fa-clock"></i>{{$news->created_at}}<i class="far fa-eye"></i>{{$news->news_view}} view</div>
							<div class="btn-fb" style="float: right">
	                            <div class="fb-like" data-href=" {{ asset('news/detail/'.$news->news_slug) }}"
	                                 data-action="like" data-size="small" data-layout="button_count"></div>

	                            <div class="fb-share-button"
	                                 data-href="{{ asset('news/detail/'.$news->news_slug) }}" data-size="small"
	                                 data-layout="button_count">
	                            </div>
	                            {{-- <a href="{{$web_info->facebook}}" class="fb-fanpage" target="blank">
	                                <i class="fab fa-facebook-f"></i>
	                                Fanpage
	                            </a> --}}
	                        </div>
							{{-- <div class="like-share">
								<a href="" class="like"><i class="fas fa-thumbs-up"></i> Like</a>
								<a href="" class="like">Share</a>
							</div> --}}
						</div>
						<div class="content">
							{!!$news->news_content!!}
						</div>
						<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="100%" data-numposts="5"></div>
						{{-- <div class="comment">
							<h5>Comment</h5>
							<div class="list-cmt">
								<div class="cmt">
									<img src="img/anh-1.png">
									<div class="noi-dung">
										<p class="name">Robby de Leon</p>
										<span>( 2 months ago )</span>
										<p class="feel">Tim is a great Instructor. I just started to watch the course few weeks ago, but I can say that I already know many things about Java programming. It's great that he's also making a Quizzes and Challenges for us to apply what we've learned. But the reason why it's 4 STARS</p>
									</div>
								</div>
								<div class="cmt">
									<img src="img/anh-1.png">
									<div class="noi-dung">
										<p class="name">Robby de Leon</p>
										<span>( 2 months ago )</span>
										<p class="feel">Tim is a great Instructor. I just started to watch the course few weeks ago, but I can say that I already know many things about Java programming. It's great that he's also making a Quizzes and Challenges for us to apply what we've learned. But the reason why it's 4 STARS</p>
									</div>
								</div>
							</div>
							<div class="write-cmt">
								<div class="avatar">
									<img src="img/anh-1.png"></br>
									<p class="name">Robby de Leon</p>
								</div>
								<textarea></textarea>
							</div>
						</div> --}}
					</div>
				</div>
				<div class="col-md-4 col-sm-4 col-12">
					<div id="content-right">
						<h2>Bài viết liên quan</h2>
						@foreach($newsList as $item)
						<a href="{{asset('news/detail/'.$item->news_slug)}}"" class="news">
							<div class="img" style="background:url('{{ file_exists(storage_path('/app/news/resized360-'.$item->news_img)) ? asset('lib/storage/app/news/resized360-'.$item->news_img) : $item->news_img }}') no-repeat center /cover;"></div>
							<p>{{$item->news_title}}</p>
						</a>
						@endforeach
						
					</div>
				</div>
			</div>
		</div>
	</div>

@stop
@section('script')

@stop