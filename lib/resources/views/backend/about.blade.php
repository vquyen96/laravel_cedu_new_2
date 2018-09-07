@extends('backend.master')
@section('title','Giới thiệu')
@section('main')


<link rel="stylesheet" type="text/css" href="css/account.css">
<div>
	<div>
		<h3 class="col-md-6 col-sm-6 col-xs-12">
			Quản lý giới thiếu
			<a href="{{asset('admin/about/add')}}" class="btn btn-success"> 
				<span class="glyphicon glyphicon-plus"></span>
				Thêm mới
			</a>

		</h3>
		
	</div>
	<div>
		<table class="table table-hover">
			<tr>
				<th>#</th>
				<th>Tiêu đề</th>
				<th>Slug</th>
				<th class="tableOption">Tùy Chọn</th>
			</tr>
			@foreach($items as $item)
			<tr>	
				<td>{{$item->about_id}}</td>
				<td>{{$item->about_name}}</td>
				<td>{{$item->about_slug}}</td>
				<td>
					<a href="{{asset('admin/about/edit/'.$item->about_id)}}" class="btn btn-primary">Sửa</a>
					<a href="{{asset('admin/about/delete/'.$item->about_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" class="btn btn-danger">Xóa</a>
				</td>
			</tr>
			@endforeach
		</table>
		{{$items->links()}}
	</div>
</div>

@stop