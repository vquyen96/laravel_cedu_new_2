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
						<div class="img" style="background: url('{{ file_exists(storage_path('app/avatar/resized360-'.$teacher->img)) ? asset('lib/storage/app/avatar/resized360-'.$teacher->img) : ($teacher->provider == 'facebook' ? str_replace('type=normal', 'width=1920', $teacher->img) : ($teacher->provider == 'google' ? str_replace('?sz=50', '', $teacher->img) : 'img/no-avatar.jpg')) }}') no-repeat center /cover"></div>
						<div class="contact">
							<a href="{{ $teacher->teacher->tea_fb != null ? $teacher->teacher->tea_fb : asset('') }}" class="icon" target="blank"><i class="fab fa-facebook-f"></i></a>
							<a href="{{ $teacher->teacher->tea_gg != null ? $teacher->teacher->tea_gg : asset('') }}" class="icon" target="blank"><i class="fab fa-google-plus-g"></i></a>
							<a href="{{ $teacher->teacher->tea_yt != null ? $teacher->teacher->tea_yt : asset('') }}" class="icon" target="blank"><i class="fab fa-youtube"></i></a>
						</div>
						<div class="rate">
							@if($rate != null)
								@for($i=0;$i<5;$i++)
									<a href="{{ asset('teacher/'.$teacher->email.'/'.($i+1)) }}">
										<i class="fa fa-star {{ $rate->tr_rate > $i ? 'starActive' : ''}}" aria-hidden="true"></i>
									</a>
								@endfor
							@else
								@for($i=0;$i<5;$i++)
									<a href="{{ asset('teacher/'.$teacher->email.'/'.($i+1)) }}">
										<i class="fa fa-star {{ $teacher->teacher->tea_rating > $i ? 'starActive' : ''}}" aria-hidden="true"></i>
									</a>
								@endfor
							@endif
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
								<span>Update {{date_format($item->updated_at,"m/Y")}}</span>
							</div>
						</a>
						<div class="text">
							{{$item->cou_name}}
						</div>
						<div class="name">
							<img src="{{ file_exists(storage_path('app/avatar/resized50-'.$teacher->img)) ? asset('lib/storage/app/avatar/resized50-'.$teacher->img) : ($teacher->provider_id != null ? $teacher->img : 'img/no-avatar.jpg') }}">
							<p>{{$teacher->name}}</p>
							<div class="star">
								@for($i=0;$i<5;$i++)
									<i class="fa fa-star {{ $item->cou_star > $i ? 'starActive' : '' }} " aria-hidden="true"></i>
								@endfor
							</div>
						</div>
					</div> 
				</div>
				@endforeach
				
			</div>
		</div>
		<div class="container">
			<div id="page-number">
				{!! $course->links('layout.paginate') !!}	
			</div>
		</div>
	</section>
@stop
@section('script')
	<script type="text/javascript" src="js/teacher/profile.js"></script>
@stop