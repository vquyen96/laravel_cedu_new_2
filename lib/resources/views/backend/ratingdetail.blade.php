@extends('backend.master')
@section('title','Bình luận')
@section('main')



<div>
	<div>
		<h3 class="">{{cut_string($course->cou_name, 20)}}</h3>
		
	</div>
	<div>
		<table class="table table-hover">
			<tr>
				<th>Đánh giá</th>
				<th>Người dùng</th>
				<th>Tiêu đề</th>
				<th>Nội dung</th>
				@if(Auth::user()->level != 3)
				<th>Tùy chọn</th>
				@endif
			</tr>
			@foreach($items as $item)
			<tr>	
				<td>
					@for($i=0;$i<5;$i++)
						@if($item->rat_star > $i)
							<i class="fa fa-star starActive" aria-hidden="true"></i>
						@else
							<i class="fa fa-star" aria-hidden="true"></i>
						@endif
					@endfor
				</td>
				<td>{{$item->acc->name}}</td>
				<td>{{$item->rat_title}}</td>
				<td>{{cut_string($item->rat_content, 50)}}</td>
				@if(Auth::user()->level != 3)
				<td>
					<a href="{{asset('admin/rating/edit/'.$item->rat_id)}}" class="btn btn-primary">Sửa</a>
				
					<a href="{{asset('admin/rating/delete/'.$item->rat_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" class="btn btn-danger">Xóa</a>
					
				</td>
				@endif
			</tr>
			@endforeach
		</table>
		{{$items->links()}}
	</div>
</div>

@stop