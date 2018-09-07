@extends('backend.master')
@section('title','Home')
@section('main')



<div>
	<div>
		<h3 class="">Đánh giá của học viên</h3>
		
	</div>
	<div>
		<table class="table table-hover">
			<tr>
				<th>Ảnh đại diện</th>
				<th>Học viên</th>
				<th>Đánh giá</th>
				<th>Ngày</th>
			</tr>
			@foreach($items as $item)
			<tr>	
				<td class="tableCourseImg">
					
					<img class="" src="{{asset('lib/storage/app/avatar/'.$item->acc->img)}}">					
				</td>
				<td class="tableTD">
					{{$item->acc->name}}				
				</td>
				<td class="tableTD">
					@for($i=0;$i<5;$i++)
						@if(FLOOR($item->tr_rate) > $i)
							<i class="fa fa-star starActive" aria-hidden="true"></i>
						@else
							<i class="fa fa-star" aria-hidden="true"></i>
						@endif
					@endfor						
				</td>
				<td>
					{{$item->created_at->format('h:m d/m/Y')}}
				</td>
			</tr>
			@endforeach
		</table>
		
	</div>
</div>

@stop