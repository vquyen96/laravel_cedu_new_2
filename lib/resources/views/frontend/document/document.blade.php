@extends('frontend.master')
@section('title','Tài liệu')
@section('main')

<link rel="stylesheet" type="text/css" href="css/document/document.css">
	<div class="instruction">


		<div class="instruction_body">
			<a href="{{ asset('') }}" class="instruction_item">
				Trang chủ
			</a>
			<a class="instruction_item">
				>
			</a>
			<a href="{{ asset('doc') }}" class="instruction_item">
				Tài liệu
			</a>
			
			
			
		</div>
		
	</div>
	<div class="main_body">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-8 col-12">
					<div class="title">
						<h1>Tài liệu</h1>
						<p>Chúng tôi cung cấp cho các bạn những khoá học đa dạng và chất lượng nhất</p>	
					</div>
				</div>
				<div class="col-md-4 col-sm-4 col-12">
					<div class="selectGr">
						<select>
							@foreach ($groups as $item)
								<option value="{{ $item->gr_id }}">{{ $item->gr_name }}</option>
								
							@endforeach
								
						</select>
					</div>
						
				</div>
			</div>
		</div>
	<section id="body">
		<div class="heading">
			<div class="container">
				
			</div>
		</div>
		<div id="list-document">
			<div class="container">
				<div class="row">
					@foreach($document as $item)
					<div class="col-md-4 col-sm-4 col-12">
						<div class="document">
							<a href="#" class="img" style="background: url('{{ asset('lib/storage/app/doc/'.$item->doc_img)}}') no-repeat center/cover; "></a>
							<div class="text">
								<p>{{$item->doc_name}}</p>
								<a href="#" class="download">Download</a>
							</div>
						</div>
					</div>
					@endforeach
					<div class="col-md-12">
						{!! $document->links('layout.paginate') !!}	

					</div>
				</div>
			</div>
		</div>
		<div id="page-number">	
						{{-- <div class="container">
				<a class="number" href="">01</a>
				<a class="number" href="">02</a>
				<a class="number" href="">03</a>
				<a class="number" href="">04</a>
				<a class="number" href="">05</a>
				<a class="number" href=""><i class="fas fa-angle-right"></i></a>
			</div> --}}
		</div>
	</section>

@stop
