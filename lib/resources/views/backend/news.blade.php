@extends('backend.master')
@section('title','Home')
@section('main')



<div>
	<div>
		<h3 class="col-md-6 col-sm-6 col-xs-12">Quản lý tin tức</h3>
		<div class="col-md-6 col-sm-6 col-xs-12 accountBtnAdd">
			<a href="{{asset('admin/news/add')}}" class="btn btn-success"> 
				<span class="glyphicon glyphicon-plus"></span>
				Thêm mới
			</a>
		</div>
	</div>
	<div>
		<table class="table table-hover">
			<tr>
				<th>#</th>
				<th>Hình ảnh</th>
				<th>Tiêu đề</th>
				<th>Lượt xem</th>
				<th class="tableOption">Tùy Chọn</th>
			</tr>
			@foreach($items as $item)
			<tr>	
				<td>{{$item->news_id}}</td>
				<td class="tableNewsImg">
					<img class="" src="{{asset('lib/storage/app/news/resized-'.$item->news_img)}}">
				</td>
				<td>{{cut_string($item->news_title, 50)}}</td>
				<td>{{number_format($item->news_view)}}</td>
				<td>
					<a href="{{asset('admin/news/edit/'.$item->news_id)}}" class="btn btn-primary">Sửa</a>
				
					<a href="{{asset('admin/news/delete/'.$item->news_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" class="btn btn-danger">Xóa</a>
					
					
				</td>
			</tr>
			@endforeach
		</table>
		{{$items->links()}}
	</div>
</div>

@stop