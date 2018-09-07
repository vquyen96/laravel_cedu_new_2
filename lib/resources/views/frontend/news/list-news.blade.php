@extends('frontend.master')
@section('title','Tin tức')
@section('main')
<link rel="stylesheet" type="text/css" href="css/news/list-news.css">
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
			
			
			
		</div>
		
	</div>
	<div class="main_body">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title">
						<h1>Tin Tức</h1>
						<div class="titleContent">
							Chúng tôi cung cấp cho các bạn những khoá học đa dạng và chất lượng nhất
						</div>
					</div>
						
				</div>
			</div>	
			<div class="row">
				@foreach($news as $item)
					<div class="col-md-4 col-sm-4 col-12">
						<div class="newsItem">
							<a href="{{asset('news/detail/'.$item->news_slug)}}" class="newsItemImg" style="background: url('{{ asset('lib/storage/app/news/'.$item->news_img)}}') no-repeat center/cover; "></a>
							<div class="newsItemContent">
								<a href="{{asset('news/detail/'.$item->news_slug)}}" class="newsItemTitle">{{cut_string($item->news_title,70)}}</a>
								<a href="{{ asset('') }}" class="button">Mẹo học tập</a>
								<a href="{{ asset('') }}" class="button">Thiết kế</a>
								<a href="{{ asset('') }}" class="button">Color</a>			
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div class="row">
				<div class="col-md-12">
					{!! $news->links('layout.paginate') !!}	
				</div>
			</div>				
		</div>
		<div id="list-news">
			<div class="container">
				<div class="row">
					
				</div>
			</div>
		</div>

		<div id="page-number">
			<div class="container">
				
			
			</div>
		</div>
	</section>

@stop
@section('script')

@stop