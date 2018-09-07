@extends('backend.master')
@section('title','Banner')
@section('main')

<div>
	<div>
		<h3 class="col-md-6 col-sm-6 col-xs-12">Quản lý Banner</h3>
		<div class="col-md-6 col-sm-6 col-xs-12 accountBtnAdd">
			<a href="{{asset('admin/banner/add')}}" class="btn btn-success"> 
				<span class="glyphicon glyphicon-plus"></span>
				Thêm mới
			</a>
		</div>
	</div>
	<div>
		<table class="table table-hover">
			<tr>
				
				<th>Hình ảnh</th>
				<th>Tên</th>
				<th class="tableOption">Tùy Chọn</th>
			</tr>
			@foreach($banner as $item)
			<tr>	
				
				<td class="tableBannerImg">
					<img class="" src="{{asset('lib/storage/app/banner/'.$item->ban_img)}}">
				</td>
				<td>{{cut_string($item->ban_name, 50)}}</td>
				<td>
					<a href="{{asset('admin/banner/edit/'.$item->ban_id)}}" class="btn btn-primary">Sửa</a>
					<a href="{{asset('admin/banner/delete/'.$item->ban_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" class="btn btn-danger">Xóa</a>
				</td>
			</tr>
			@endforeach
		</table>
		{{$banner->links()}}
	</div>
</div>

@stop