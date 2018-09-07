@extends('backend.master')
@section('title','Home')
@section('main')


<link rel="stylesheet" type="text/css" href="css/account.css">
{{-- @if($wait->get(0) != null)
<div>
	<div>
		<h3 class="col-md-6 col-sm-6 col-xs-12">Danh sách Chờ</h3>
	</div>
	<div>
		<table class="table table-hover">
			<tr>
				<th>Ảnh đại diện</th>
				<th>Tên</th>
				<th>Email</th>
				<th>Thông tin</th>
				<th>Tuỳ chọn</th>
			</tr>
			@foreach($wait as $item)
			<tr>	
				
				<td class="tableAcountImg">
					<img src="{{asset('lib/storage/app/avatar/resized-'.$item->img)}}">
				</td>
				<td>{{$item->name}}</td>
				<td>{{$item->email}}</td>
				<td>{{cut_string($item->content, 100)}}</td>
				<td>
					<a href="{{asset('admin/teacher/active/'.$item->id)}}" class="btn btn-success">Kích hoạt</a>
					<a href="{{asset('admin/teacher/no/'.$item->id)}}" class="btn btn-danger">Xóa</a>
				</td>	
			</tr>
			@endforeach
		</table>
		{{$items->links()}}
	</div>
</div>
@endif --}}
<div>
	<div>
		<h3 class="col-md-6 col-sm-6 col-xs-12">Danh sách giáo viên</h3>
		<div class="col-md-6 col-sm-6 col-xs-12 accountBtnAdd">
			<a href="{{asset('admin/account/add')}}" class="btn btn-success"> 
				<span class="glyphicon glyphicon-plus"></span>
				Thêm mới
			</a>
		</div>
	</div>
	<div>
		<table class="table table-hover">
			<tr>
				<th>Ảnh đại diện</th>
				<th>Tên</th>
				<th>Email</th>
				<th>Doanh thu</th>
				{{-- <th>Tuỳ chọn</th> --}}
			</tr>
			@foreach($items as $item)
			<tr>	
				
				<td class="tableAcountImg">
					<img src="{{asset('lib/storage/app/avatar/resized-'.$item->acc->img)}}">
				</td>
				<td>{{$item->acc->name}}</td>
				<td>{{$item->acc->email}}</td>
				<td>
					<?php $total = 0;?>
					@foreach ($item->acc->course as $course)
						@foreach ($course->orderDe as $orderDe)
							@if ($orderDe->order->ord_status == 0)
								<?php $total += $orderDe->orderDe_price ?>
							@endif
						@endforeach
							
						
					@endforeach
					<b style="color: #e33;">{{number_format($total,0,',','.')}} VND</b>
				</td>
				{{-- <td>
					<a href="{{asset('admin/teacher/detail/'.$item->id)}}" class="btn btn-primary">Chi tiết</a>
					<a href="{{asset('admin/account/delete/'.$item->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" class="btn btn-danger">Xóa</a>
				</td> --}}	
			</tr>
			@endforeach
		</table>
		{{-- {{$items->links()}} --}}
	</div>
</div>

@stop