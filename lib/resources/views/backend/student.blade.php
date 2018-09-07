@extends('backend.master')
@section('title','Home')
@section('main')


<link rel="stylesheet" type="text/css" href="css/account.css">
<div>
	<a href="{{asset('admin/course/edit/'.Request::segment(4))}}" class="btn btn-default">
		<i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
		
	</a>
	<div>
		<h3 class="col-md-12 col-sm-12 col-xs-12">
			{{$course->cou_name}}
		</h3>
		
	</div>
	<div>
		<table class="table table-hover">
			<tr>
				<th>#</th>
				<th>Ảnh đại diện</th>
				<th>Tên</th>
				<th>Email</th>
				
			</tr>
			@foreach($orderDe as $item)
			<tr>	
				<td>{{$item->order->acc->id}}</td>
				<td class="tableAcountImg">
					<img src="{{asset('lib/storage/app/avatar/'.$item->order->acc->img)}}">
				</td>
				<td>{{$item->order->acc->name}}</td>
				<td>{{$item->order->acc->email}}</td>
			</tr>
			@endforeach
		</table>
		
	</div>
</div>

@stop