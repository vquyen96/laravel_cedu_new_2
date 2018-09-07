@extends('frontend.master')
@section('title','Danh sách khóa học')
@section('fb_title','Top khóa học hàng đầu')
@section('fb_description','Nơi cung cấp cho bạn những khóa học tốt nhất, rẻ nhất. Tạo lên một môi trường học tập trên cuộc cách mạng công nghệ 4.0')
@section('fb_image',asset('public/layout/frontend/img/dayne-topkin-60559-unsplash.png'))
@section('main')

<div class="header_main">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="header_main_item {{ Request::segment(3) == '' ? 'active' : '' }}">
					Chủ đề
				</div>
				<div class="header_main_item {{ Request::segment(3) == 'all' ? 'active' : '' }}">
					Tất cả các khoá học
				</div>
			</div>
		</div>
	</div>
</div>


@stop

@section('script')

@stop