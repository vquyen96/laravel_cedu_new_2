@extends('frontend.master')
@section('title','Giảng viên')
@section('main')
<link rel="stylesheet" type="text/css" href="css/teacher/teacher.css">

	<div class="instruction">
		<div class="instruction_body">
			<a href="{{ asset('') }}" class="instruction_item">
				Trang chủ
			</a>
			<a class="instruction_item">
				>
			</a>
			
			</a>
			<a href="{{ asset('teacher/'.$teacher->email) }}" class="instruction_item">
				{{$teacher->name}}
			</a>
			
			
		</div>
		
	</div>
	<div class="main_body">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4 col-12">
					<div class="avatar">
						<div class="img" style="background:url('{{ asset('lib/storage/app/avatar/'.$teacher->img)}}') no-repeat center/cover;"></div>
						<div class="contact">
							<a href="" class="icon"><i class="fab fa-facebook-f"></i></a>
							<a href="" class="icon"><i class="fab fa-google-plus-g"></i></a>
							<a href="" class="icon"><i class="fab fa-youtube"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-8 col-sm-8 col-12">
					<div id="profile">
						<h1>{{$teacher->name}}</h1>
						<p></p>
						<p>
							{!!$teacher->content!!}
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<section id="teacher">
		<div class="container">
			<div class="row">
				
			</div>
		</div>
	</section>

	<section id="khoa-hoc">
		<div class="container">
			<div class="heading">
				<h1>Các khóa học của giảng viên</h1>
				<p>Web Developer And Teacher</p>
			</div>
		</div>
		<div class="container">
			<div class="row">
				@foreach($course as $item)
				<div class="col-md-4 col-sm-4 col-12">
					<div class="details">
						<a href="{{asset('courses/detail/'.$item->cou_slug.'.html')}}" class="img" style="background: url('{{ asset('lib/storage/app/course/'.$item->cou_img)}}') no-repeat center/cover; ">
							<div class="tieu-de">
								<p>{{$item->group->gr_name}}</p>
								<span>Update {{$item->updated_at}}</span>
							</div>
						</a>
						<div class="text">
							<p>{{$item->cou_name}}</p>		
						</div>
						<div class="name">
							<img src="{{asset('lib/storage/app/avatar/'.$teacher->img)}}">
							<p>{{$teacher->name}}</p>
							<div class="star">
								<i class="fas fa-star" style="color: #FCC72E;"></i>
								<i class="fas fa-star" style="color: #FCC72E;"></i>
								<i class="fas fa-star" style="color: #FCC72E;"></i>
								<i class="fas fa-star" style="color: #FCC72E;"></i>
								<i class="fas fa-star" style="color: #C4C4C4;"></i>
							</div>
						</div>
					</div> 
				</div>
				@endforeach
				
			</div>
		</div>
		<div class="container">
			<div id="page-number">
				{{-- {!! $course->links('layout.paginate') !!}	 --}}
			</div>
		</div>
	</section>
@stop
@section('script')

@stop