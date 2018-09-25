<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<div style="background:#ddd; padding: 20px; font-family: 'Roboto', sans-serif;">
	<div style="width: 900px;margin: auto;overflow: hidden;">
		<div style="float: left;width: 50%;background: #35465c;height: 700px;">
			<div style="font-family: 'Roboto', sans-serif;color: #cecece; font-size: 16px; font-weight: 300;margin-left: 20px;padding: 0 10px;margin-top: 20px;border-left: 3px solid #cecece;">
				<h3 style="color: #cecece;">KHÓA HỌC:</h3>
				@foreach($cart as $item)
					<p>{{$item->name}}</p>
				@endforeach
			</div>

			{{-- THIẾU ẢNH --}}
			<div style="width: 100%;height: 500px;background: url('{{asset('public/layout/frontend/img/layer-2.png')}}') no-repeat center/cover;">		
			</div>

		</div>
		<div style="float: left;width: 50%;background: #eeeeee;">
			<div class="logo">
				<img src="{{asset('public/layout/frontend/img/logo-png.png')}}" style="width: 110px;height: 80px;margin-top: 20px;">
			</div>

			{{-- THIẾU SĐT, ĐỊA CHỈ --}}
			<div style="margin: 0 25px;color: #666;font-size: 16px;border-bottom: 1px solid #000;padding-bottom: 20px;">
				<h3 style="color: #666;font-size: 16px;">THÔNG TIN KHÁCH HÀNG</h3>
				<p style="font-weight: 300;font-size: 14px;"><span>Khách hàng : </span> {{$order->acc->name}}</p>
				<p style="font-weight: 300;font-size: 14px;"><span>Email :</span> {{$order->acc->email}}</p>
				<p style="font-weight: 300;font-size: 14px;"><span>Điện thoại:  </span> {{$order->ord_phone}}</p>
				<p style="font-weight: 300;font-size: 14px;"><span>Địa chỉ : </span> {{$order->ord_adress}}</p>
			</div>
			
			<div style="padding-bottom: 30px;margin: 20px 25px;	margin-top: 30px;">
				<h3 style="color: #666;font-size: 16px;">HÓA ĐƠN MUA HÀNG</h3>
				<table style="font-family: 'Roboto', sans-serif;border-collapse: collapse;width: 100%;margin-bottom: 30px;">
					<thead>
						<th style="text-align: left;color: #666;border: 1px solid #ddd;padding: 8px;font-size: 14px;">Tên sản phẩm :</th>
						<th style="text-align: left;color: #666;border: 1px solid #ddd;padding: 8px;font-size: 14px;">Giá: </th>
						<th style="text-align: left;color: #666;border: 1px solid #ddd;padding: 8px;font-size: 14px;">Số lượng </th>
						<th style="text-align: left;color: #666;border: 1px solid #ddd;padding: 8px;font-size: 14px;">Thành tiền </th>
					</thead>
					<tbody>
						@foreach($cart as $item)
						<tr>
							<td style="border: 1px solid #ddd;padding: 8px;font-size: 14px;">{{$item->name}}</td>
							<td style="border: 1px solid #ddd;padding: 8px;font-size: 14px;">{{number_format($item->price,0,',','.')}} VNĐ</td>
							<td style="border: 1px solid #ddd;padding: 8px;font-size: 14px;">{{$item->qty}}</td>
							<td style="border: 1px solid #ddd;padding: 8px;font-size: 14px;">{{number_format($item->price*$item->qty,0,',','.')}} VNĐ</td>
						</tr>
						@endforeach
						<tr>
							<td style="border: 1px solid #ddd;padding: 8px;font-size: 14px;">Tổng tiền</td>
							<td style="border: 1px solid #ddd;padding: 8px;font-size: 14px;"></td>
							<td style="border: 1px solid #ddd;padding: 8px;font-size: 14px;"></td>
							<td style="border: 1px solid #ddd;padding: 8px;font-size: 14px;">{{$total}} VNĐ</td>
						</tr>
					</tbody>
				</table>
				<p style="font-family: 'Roboto', sans-serif;color: #666666; font-size: 12px; font-weight: 300;
				">Cảm ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</p>
			</div>

		</div>
	</div>
</div>