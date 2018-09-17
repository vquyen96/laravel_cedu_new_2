{{-- <style type="text/css">
	table tr td{
		border:1px solid #666;
	}
</style> --}}
<div style="background:#ddd; padding: 20px;">
	<div style="width: 500px; margin: 20px auto; background: #fff; padding: 30px;">
		<div style="width: 170px; height: 75px; margin: auto;">
			<img src="{{asset('public/layout/frontend/img/LOGO_CEDU1.png')}}" style="width: 100%">
		</div>
		
		<div id="wrap-inner">
			<div id="khach-hang">
				<h3>Thông tin khách hàng</h3>
				<p>
					<span class="info">Khách hàng: </span>
					{{$order->acc->name}}
				</p>
				<p>
					<span class="info">Email: </span>
					{{$order->acc->email}}
				</p>
				<p>
					<span class="info">Điện thoại: </span>
					{{$order->ord_phone}}
				</p>
				<p>
					<span class="info">Địa chỉ: </span>
					{{$order->ord_adress}}
				</p>
			</div>						
			<div id="hoa-don">
				<h3>Hóa đơn mua hàng</h3>							
				<table >
					<tr class="bold">
						<td width="30%">Tên sản phẩm</td>
						<td width="25%">Giá</td>
						<td width="20%">Số lượng</td>
						<td width="15%">Thành tiền</td>
					</tr>
					@foreach($cart as $item)
					<tr>
						<td>{{$item->name}}</td>
						<td class="price">{{number_format($item->price,0,',','.')}} VND</td>
						<td>{{$item->qty}}</td>
						<td class="price">{{number_format($item->price*$item->qty,0,',','.')}} VND</td>
					</tr>
					@endforeach
					<tr>
						<td>Tổng tiền: </td>
						<td colspan="3" align="right">{{$total}}</td>
					</tr>
				</table>
			</div>
			<div id="xac-nhan">
				<br>
				<p align="justify">
					<b>Quý khách đã đặt hàng thành công!</b><br />
					• Sản phẩm của Quý khách sẽ được chuyển đến Địa chỉ có trong phần Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.<br />
					• Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng.<br />
					<b><br />Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</b>
				</p>
			</div>
		</div>					
		<!-- end main -->
	</div>
</div>