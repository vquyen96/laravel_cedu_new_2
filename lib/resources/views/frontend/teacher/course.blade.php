@extends('frontend.master')
@section('title','Giảng viên')
@section('main')
<link rel="stylesheet" type="text/css" href="css/teacher/course.css">
	<div class="instruction">


		<div class="instruction_body">
			<a href="{{ asset('') }}" class="instruction_item">
				Trang chủ
			</a>
			<a class="instruction_item">
				>
			</a>
			<a href="{{ asset('user') }}" class="instruction_item">
				{{ Auth::user()->name }}
			</a>
			<a class="instruction_item">
				>
			</a>
			<a href="{{ asset('teacher/dashboard') }}" class="instruction_item">
				Dashboard
			</a>
			
			
		</div>
		
	</div>
	<div class="main_body">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-8 col-12">
					<div class="heading">
						<h1>Khóa học</h1>
						<p>Chúng tôi cung cấp cho các bạn những khoá học đa dạng và chất lượng nhất</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 col-12">
					<a href="{{asset('teacher/add')}}" class="add-course">
						<p>Thêm khóa học mới</p>
					</a>
				</div>
			</div>
			@foreach($course as $item)	
			<div class="row course">
				<div class="col-md-4 col-sm-4 col-12">
					<div class="img" style="background: url('{{ asset('lib/storage/app/course/'.$item->cou_img)}}') no-repeat center/cover;">
						@if(isset($item->cou_price_old))
						<div class="sticker" style="background:url('img/rectangle3.png') no-repeat;">
							<p>Sale off</p>
						</div>
						@endif
					</div>
				</div>
				<div class="col-md-8 col-sm-8 col-12">
					<div class="info">
						<p class="tieu-de">{{$item->cou_name}}</p>
						<div class="chi-tiet">
							<div class="star">
								@for($i=0;$i<5;$i++)
									<i class="fa fa-star {{ $item->cou_star > $i ? 'starActive' : '' }} " aria-hidden="true"></i>
								@endfor
							</div>
							<p>{{$item->cou_video}} bài 
								<i class="fas fa-circle"></i> {{ gmdate("H:m", $item->cou_video_duration)}} giờ 
								<i class="fas fa-circle"></i> {{time_format($item->updated_at)}} 
								<i class="fas fa-circle"></i> {{ level_format($item->cou_level) }}
							</p>
						</div>
						<div class="price">
							@if(isset($item->cou_price_old))
							<strike> {{number_format($item->cou_price_old,0,',','.')}}<sup>đ</sup></strike>
							@endif
							<p>{{number_format($item->cou_price,0,',','.')}}<sup>đ</sup></p>
						</div>
						<p class="summary">{!!cut_string($item->cou_summary, 300)!!}</p>
					</div>
					<a href="{{asset('teacher/courses/'.$item->cou_slug)}}" class="button">
						Chi tiết
					</a>
				</div>
			</div>
			@endforeach
			<div class="row">
				<div class="col-md-12">
					{!! $course->links('layout.paginate') !!}	
				</div>
			</div>
		</div>
	</div>

	
@stop
@section('script')

@stop