@extends('backend.master')
@section('title','Home')
@section('main')


<link rel="stylesheet" type="text/css" href="css/course.css">
<div>
	<div>
		<h3 class="col-md-6 col-sm-6 col-xs-12">Danh sách khóa học bán được</h3>
		
	</div>
	<div>
		<table class="table table-hover">
			<tr>
				<th>Tên học sinh</th>
				<th>Ảnh khóa học</th>
				<th>Tên khóa học</th>
				<th>Giá</th>
				<th>Thời gian</th>
			</tr>
			@foreach($orderDe as $item)
			@if ($item->order->ord_status == 0)
				<tr>
					<td>
						{{$item->order->acc->name}}
					</td>	
					<td class="tableCourseImg">
						<img class="" src="{{asset('lib/storage/app/course/'.$item->course->cou_img)}}">
					</td>
					<td class="tableTD">
						{{$item->course->cou_name}}
					</td>
					<td class="tableTD">
						{{number_format($item->course->cou_price,0,',','.')}} VND
					</td>
					<td> 
						{{$item->created_at}}
					</td>
				</tr>
			@endif
			@endforeach
		</table>
		
	</div>
</div>

@stop