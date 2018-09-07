@extends('backend.master')
@section('title','Home')
@section('main')



<div>
	<div>
		<h3 class="col-md-6 col-sm-6 col-xs-12">Quản lý đơn hàng</h3>
		
	</div>
	<div>
		<table class="table table-hover orderTable" >
			<tr>
				<th>Tên</th>
				<th>Email</th>
				<th>Điện thoại</th>
				<th>Hóa đơn</th>
				<th>Thanh toán</th>
				<th class="tableOption">Trạng thái</th>
			</tr>
			@foreach($items as $item)
			<tr 
				@switch($item->ord_status)
					@case(-1)
						class="danger" 
						@break
					@case(0)
						class="" 
						@break
					@case(1)
						class="success" 
						@break
					@case(2)
						class="warning" 
						@break
				@endswitch
			>
				<td class="tableTD"><a href="{{asset('admin/order/detail/'.$item->ord_id)}}">{{$item->acc->name}}</a></td>
				<td class="tableTD"><a href="{{asset('admin/order/detail/'.$item->ord_id)}}">{{$item->acc->email}}</a></td>
				
				<td class="tableTD"><a href="{{asset('admin/order/detail/'.$item->ord_id)}}">{{$item->ord_phone}}</a></td>
				<td class="tableTD"><a href="{{asset('admin/order/detail/'.$item->ord_id)}}"><b style="color: #e33;">{{number_format($item->ord_total_price,0,',','.')}} VND </b></a></td>
				<td>
					@switch($item->ord_payment)
						@case(1)
							Tại nhà
							@break
						@case(2)
							Ngân Lượng
							@break
						@case(3)
							Paypal
							@break
						@case(4)
							Bảo kim
							@break
					@endswitch

				</td>
				<td>
					@switch($item->ord_status)
						@case(-1)
							Từ chối
							@break
						@case(0)
							Đã hoàn thành
							@break
						@case(1)
							Đang chờ 
							@break
						@case(2)
							Đang giao hàng
							@break
					@endswitch
				</td>
			</tr>
			@endforeach
		</table>
		{{$items->links()}}
	</div>
</div>

@stop