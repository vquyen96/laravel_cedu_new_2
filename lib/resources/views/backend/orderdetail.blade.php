@extends('backend.master')
@section('title','Home')
@section('main')



<div>
	<div>
		<a href="{{asset('admin/order')}}" class="btn btn-default">
			<i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
			
		</a>
		<h3>
			Chi tiết đơn hàng
			( 
			@switch($order->ord_status)
				@case(-1)
					<span style="color: #d43939;">Từ chối</span>
					@break
				@case(0)
					<span style="color: #008400;">Đã hoàn thành</span>
					
					@break
				@case(1)
					<span style="color: #ffc61b;">Chờ thanh toán</span>
					
					@break
				@case(2)
					<span style="color: #ff8300;">Đang giao hàng</span>
					
					@break
			@endswitch
			 )

		</h3>
		<div>
			@if($order->ord_payment == 1)
				@if($order->ord_status == 1)
					<a onclick="return confirm(Bạn chắc chắn muốn giao khóa học này);" href="{{asset('admin/order/ship/'.$order->ord_id)}}" class="btn btn-success">Giao hàng</a>
				@else
					@if($order->ord_status == 2)
						<a onclick="return confirm(Bạn chắc chắn khóa học này đã được thanh toán);" href="{{asset('admin/order/done/'.$order->ord_id)}}" class="btn btn-success">Đã hoàn thành</a>
						<a onclick="return confirm(Bạn chắc chắn học viên không muốn nhận khóa học này);" href="{{asset('admin/order/deny/'.$order->ord_id)}}" class="btn btn-danger">Từ chối</a>
					@endif
				@endif
			@else
				@if($order->ord_status == 1)
					<a href="{{asset('admin/order/done/'.$order->ord_id)}}" class="btn btn-success">Đã hoàn thành</a>
					<a href="{{asset('admin/order/deny/'.$order->ord_id)}}" class="btn btn-danger">Từ chối</a>
				@endif
			@endif
		</div>
		<div class="orderDetailInfo container-fluid">
			<div class="col-md-12">
				<div class="col-md-6 col-sm-6 col-xs-12">
					Tên : {{$order->acc->name}}
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
					Email : {{$order->acc->email}}
				</div>
			</div>
			<div class="col-md-12">
				<div class="col-md-6 col-sm-6 col-xs-12">
					Số đt : {{$order->ord_phone}}
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
					Địa chỉ : {{$order->ord_adress}}
				</div>
			</div>
			<div class="col-md-12">
				<div class="col-md-6 col-sm-6 col-xs-12">
					Số tiền : {{number_format($order->ord_total_price,0,',','.')}} VNĐ
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
					Phương thức thanh toán :
					@switch($order->ord_payment)
						@case(1)
							Tại nhà
							@break
						@case(2)
							Tại công ty
							@break
						@case(3)
							Thẻ VISA
							@break
						@case(4)
							Chuyển khoản
							@break
						
					@endswitch
				</div>
			</div>
		</div>
		
	</div>
	<div>
		<table class="table table-hover">
			<tr>
				<th>#</th>
				<th>Tên khóa học</th>
				<th>Code</th>
				<th>Giá</th>
				
				
			</tr>
			@foreach($items as $item)
			<tr>
				<td>{{$item->orderDe_id}}</td>	
				<td>{{$item->orderDe_name}}</td>
				@if ($item->code != null )
					<td>{{$item->code->code_value}}</td>
				@else
					<td>null</td>
				@endif
				
				<td>{{number_format($item->orderDe_price,0,',','.')}} VND</td>
				
			</tr>
			@endforeach
		</table>
		
	</div>
</div>

@stop