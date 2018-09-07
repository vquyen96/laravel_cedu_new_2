@extends('frontend.master')
@section('title', $about->about_name)
@section('main')
<link rel="stylesheet" type="text/css" href="css/about.css">
<div class="container">
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="about">
				<h1 style="text-align: center;"> {{$about->about_name}}</h1>
				{!!$about->about_text!!}
			</div>
			
		</div>
	</div>
</div>
@stop
@section('script')
{{-- <script type="text/javascript" src="js/code.js"></script> --}}
@stop
