@extends('frontend.master')
@section('title','Tài liệu')
@section('main')
<link rel="stylesheet" type="text/css" href="css/doc.css">

<div>
	{{-- <div class="mainHead">
		<div class="mainHeadLine"></div>
		<div class="mainHeadTitle">
			<h3>Góc chia sẻ tài liệu</h3>
		</div>
	</div>
	<div class="container mainBody">
		<div class="row">
			@foreach($group as $item)
			<div class="col-md-3 col-sm-3 ">
				<a href="{{asset('doc/detail/'.$item->gr_slug)}}" class="docItem">
					<div class="docItemBorder">
						<div class="docItemImg">
							<img src="{{asset('lib/storage/app/group/'.$item->gr_img)}}">
						</div>
						<div class="docItemContent">
							{{$item->gr_name}}
						</div>
					</div>
				</a>
			
			</div>
			@endforeach		
		</div>
	</div> --}}
	<div class="bannerHead">
		<div id="slide_banner_head" class="carousel slide" data-ride="carousel">
		  

		  <div class="carousel-inner" role="listbox">
		  	
		    @foreach($bannerHead as $item)
		    <div class="item">
		      	<div class="slide_item">
		      		<a href="{{ asset($item->ban_link) }}">
		      			<img src="{{ asset('lib/storage/app/banner/'.$item->ban_img) }}">
		      		</a>
		    	</div>
		    </div>
		    @endforeach
		    
		  </div>
		</div>
	</div>
	<div class="group">
		<div class="groupMain">
			<div class="groupLine">
				@foreach ($group as $item)
					<a href="{{ asset('doc/'.$item->gr_slug) }}" class="groupItem @if (Request::Segment(2) == $item->gr_slug) active @endif">
						{{$item->gr_name}}
					</a>
				@endforeach
			</div>
		</div>
			
	</div>
	<div class="container listDoc">
		<div class="row">
			<div class="col-md-12">
				<div class="listDocNote">
					<div class="listDocNoteItem">
						Có {{$doc->count()}} tài liệu
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			@foreach ($doc as $item)
			
			<div class="col-md-4 col-sm-4">
				<div class="listDocItem">
					<div class="listDocItemImg">
						<img src="{{ asset('lib/storage/app/doc/resized-'.$item->doc_img) }}">
						<div class="listDocItemBtn">
							<a href="{{ asset('lib/storage/app/doc/'.$item->doc_link) }}" class="listDocItemBtnItem download">
								<i class="fa fa-download" aria-hidden="true"></i>
							</a>
							<a href="" class="listDocItemBtnItem share">
								<i class="fa fa-share-square-o" aria-hidden="true"></i>
							</a>
						</div>
					</div>
						
					<div class="listDocItemContent">
						{{$item->doc_name}}
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
@stop
@section('script')
<script type="text/javascript" src="js/doc.js"></script>
@stop

