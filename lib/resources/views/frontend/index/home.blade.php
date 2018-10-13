@extends('frontend.master')
@section('title','HỌC NGU ĐÃ CÓ CEDU')
@section('fb_title','HỌC NGU ĐÃ CÓ CEDU')
@section('fb_description','Nơi cung cấp cho bạn những khóa học tốt nhất, rẻ nhất. Tạo lên một môi trường học tập trên cuộc cách mạng công nghệ 4.0')
@section('fb_image',asset('public/layout/frontend/img/dayne-topkin-60559-unsplash.png'))
@section('main')
<link rel="stylesheet" type="text/css" href="css/index/home.css">

<div>
	<div class="bannerHead" style="background: url('{{ asset('lib/storage/app/banner/'.$banner->ban_img) }}') no-repeat center /cover;">
		<div class="bannerHeadMain">
			<h1 class="bannerHeadMainTitle">Cedu</h1>
			<div class="bannerHeadMainContent">Thắp sáng tri thức, Chắp cánh ước mơ</div>
			<form class="formSearchBanner" method="get" action="{{asset('search/')}}">
				<input type="text" name="search" placeholder="Tìm kiếm các khóa học">
				<button type="submit">
					<i class="fa fa-search" aria-hidden="true"></i>
				</button>
			</form>
		</div>
	</div>


	<div class="listGroup home1">

	</div>
	<div class="course home2">

	</div>
	<div class="teacher home3">

	</div>
	<div class="home4"></div>
</div>
	
@stop	
@section('script')
<script type="text/javascript" src="js/index/index.js"></script>
<script src="js/owl.carousel.min.js"></script>

@stop