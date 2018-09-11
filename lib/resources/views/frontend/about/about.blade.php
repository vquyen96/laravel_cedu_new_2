@extends('frontend.master')
@section('title', $about->about_name)
@section('main')
<link rel="stylesheet" type="text/css" href="css/about/about.css">

	<div class="instruction">

		<div class="instruction_body">
			<a href="{{ asset('') }}" class="instruction_item">
				Trang chủ
			</a>
			<a class="instruction_item">
				>
			</a>
			<a href="{{ asset('user') }}" class="instruction_item">
				Thông tin cá nhân
			</a>
			
			
		</div>
		
	</div>
	<div class="main_body">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="about">
						<h1> {{$about->about_name}}</h1>
						{!!$about->about_text!!}
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
@section('script')
{{-- <script type="text/javascript" src="js/code.js"></script> --}}
@stop
