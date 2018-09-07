@extends('backend.master')
@section('title','Home')
@section('main')



<div>
	<div>
		<h3 class="col-md-6 col-sm-6 col-xs-12">Chi tiết doanh thu</h3>
		
	</div>
	<div>
		<table class="table table-hover orderTable" >
			<tr>
				<th>Hình ảnh</th>
				<th>Khóa học</th>
				<th>Học viên</th>
				<th>Lợi nhuận</th>
				<th>Ngày</th>
			</tr>
			@foreach ($acc->course as $course)
                @foreach ($course->orderDe as $orderDe)
                    @if ($orderDe->order->ord_status == 0)
                        <tr>
                        	<td class="tableCourseImg">
                        		<img src="{{ asset('lib/storage/app/course/'.$orderDe->course->cou_img) }}">
                        	</td>
							<td class="tableTD">{{$orderDe->course->cou_name}}</td>
							<td class="tableTD">{{$orderDe->order->acc->name}}</td>
							<td class="tableTD">{{number_format($orderDe->orderDe_price,0,',','.')}} VND</td>
							<td class="tableTD">{{$orderDe->created_at->format('h:m d/m/Y')}}</td>
						</tr>
                    @endif
                @endforeach
            @endforeach

		</table>
		
	</div>
</div>

@stop