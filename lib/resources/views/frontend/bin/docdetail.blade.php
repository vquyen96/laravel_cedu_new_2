@extends('frontend.master')
@section('title','Tài liệu')
@section('main')
<link rel="stylesheet" type="text/css" href="css/doc_detail.css">
<div class="container main">
	<div class="row mainHead">
		<div class="col-md-3 docGroup">
			{{ $gr_name }}
		</div>
		{{-- <div class="col-md-9 docSearch">
			<div class="docSearchInput">
				<input type="text" name="search" class="inputSearch">
				<i class="fa fa-search" aria-hidden="true"></i>
			</div>
			
		</div> --}}
	</div>
	<div class="row mainBody">
		<div class="col-md-3 docGroupSmail">
			<ul>
				<li>
					<a href="{{ asset('doc/detail/'.Request::segment(3).'/all') }}">
						Tất cả tài liệu
					</a>
				</li>
				@foreach($grdoc_list as $item)
				<li>
					<a href="{{ asset('doc/detail/'.Request::segment(3).'/'.$item->grdoc_slug) }}">
						{{ $item->grdoc_name }}
					</a>
				</li>
				@endforeach
				
			</ul>
		</div>
		<div class="col-md-9 docName">
			<ul>
				@foreach($doc_list as $item) 
				<li>
					<a href="{{ asset('lib/storage/app/doc/'.$item->doc_link) }}">
						{{ $item->doc_name }}
						<div class="btnDow"><i class="fa fa-download" aria-hidden="true"></i></div>
					</a>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>

@stop
@section('script')
<script type="text/javascript" src="js/doc_detail.js"></script>
@stop


