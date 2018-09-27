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
						<form method="get" class="formSearch">
							<select class="select_group" name="group">
								<option value="0" @if(!isset(Request::all()['group']) || Request::all()['group']==0) selected @endif>
									Tất cả tài liệu
								</option>
							@foreach ($groups as $item)
								<option value="{{ $item->gr_id }}" {{ $group_id == $item->gr_id ? 'selected' : '' }}>{{ $item->gr_name }}</option>
							@endforeach
							</select>
						</form>
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
							<a href="{{ asset('lib/storage/app/doc/'.$item->doc_link) }}" class="img" style="background: url('{{ $item->doc_img != null ? asset('lib/storage/app/doc/resized360-'.$item->doc_img) : 'img/doc.png' }}') no-repeat center/cover; " target="blank"></a>
							<div class="text">
								<p>{{$item->doc_name}}</p>
								<a href="{{ asset('lib/storage/app/doc/'.$item->doc_link) }}" class="download" target="blank" >Download</a>
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
	</section>
@stop
@section('script')
	<script type="text/javascript" src="js/document/doc.js"></script>
@stop
