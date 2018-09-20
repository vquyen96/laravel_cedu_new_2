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
			@if(Request::segment(2) == 'tag')
				<a class="instruction_item">
					>
				</a>
				<a href="{{ asset('news/tag/'.Request::segment(2)) }}" class="instruction_item">
					{{ isset($tag) ? $tag : 'Tag' }}
				</a>
			@endif
			
			
			
		</div>
		
	</div>
	<div class="main_body">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title">
						<h1>
							<span>Tin Tức</span>
							<span class="{{ isset($tag) ? '' : 'd-none' }}">{{ isset($tag) ? $tag : '' }}</span>
						</h1>
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
							<a href="{{asset('news/detail/'.$item->news_slug)}}" class="newsItemImg" style="background: url('{{ file_exists(storage_path('/app/news/resized360-'.$item->news_img)) ? asset('lib/storage/app/news/resized360-'.$item->news_img) : file_exists(storage_path('/app/news/'.$item->news_img)) ? asset('lib/storage/app/news/'.$item->news_img) : $item->news_img }}') no-repeat center/cover; "></a>
							<div class="newsItemContent">
								<a href="{{asset('news/detail/'.$item->news_slug)}}" class="newsItemTitle">{{cut_string($item->news_title,70)}}</a>
								
								@for ($i = 0; $i < count($item->news_tag) ; $i++)
									@if ($i < 3 && $item->news_tag_slug[$i] != '')
										<a href="{{ asset('news/tag/'.$item->news_tag_slug[$i]) }}" class="button">{{ $item->news_tag[$i] }}</a>
									@endif
									
								@endfor
								{{-- 
								<a href="{{ asset('') }}" class="button">Thiết kế</a>
								<a href="{{ asset('') }}" class="button">Color</a>		 --}}	
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