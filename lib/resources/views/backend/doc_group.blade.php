@extends('backend.master')
@section('title','Home')
@section('main')


<div class="container-fluid">
	<div class="row">
		@foreach($group as $item)
			<div class="col-md-3 col-sm-4 col-xs-6">
				<a href="{{ asset('admin/doc/show/'.$item->gr_id) }}" class="docGroupItem">
					<img src="{{ asset('lib/storage/app/group/'.$item->gr_img) }}">
					<p>{{$item->gr_name}}</p>
				</a>
			</div>
		@endforeach
	</div>
</div>

@stop