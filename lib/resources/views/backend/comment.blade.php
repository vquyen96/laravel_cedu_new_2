@extends('backend.master')
@section('title','Bình luận')
@section('main')



<div>
	<div>
		<h3 class="">Quản lý bình luận</h3>
		
	</div>
	<div>
		<table class="table table-hover">
			<tr>
				<th>Đánh giá</th>
				<th>Khóa học</th>
				<th>Người dùng</th>
				<th>Tiêu đề</th>
				<th>Nội dung</th>
				<th>Tùy chọn</th>
			</tr>
			@foreach($items as $item)
			<tr>	
				<td>
					@for($i=0;$i<5;$i++)
						@if($item->com_star > $i)
							<i class="fa fa-star starActive" aria-hidden="true"></i>
						@else
							<i class="fa fa-star" aria-hidden="true"></i>
						@endif
					@endfor
				</td>
				<td>{{cut_string($item->cou->cou_name,30)}}</td>
				<td>{{$item->acc->name}}</td>
				<td>{{$item->com_title}}</td>
				<td>{{cut_string($item->com_content, 50)}}</td>
				<td>
					<a href="{{asset('admin/comment/edit/'.$item->com_id)}}" class="btn btn-primary">Sửa</a>
				
					<a href="{{asset('admin/comment/delete/'.$item->com_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" class="btn btn-danger">Xóa</a>
					
				</td>
			</tr>
			@endforeach
		</table>
		{{$items->links()}}
	</div>
</div>

@stop