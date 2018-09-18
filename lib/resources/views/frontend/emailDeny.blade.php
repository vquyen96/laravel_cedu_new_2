
<div style="background:#ddd; padding: 20px;">
	<div style="width: 500px; margin: 20px auto; background: #fff; padding: 30px;">
		<div style="width: 108px; height: 75px; margin: auto;">
			<img src="{{asset('public/layout/frontend/img/LOGO_CEDU1.png')}}" style="height: 100%">
		</div>
		
		@foreach ($order->orderDe as $orderDe)
			<h2>Khóa học: {{$orderDe->course->cou_name}}</h2>
			<img style="width: 80%; margin: auto; display: block;" src="{{ asset('lib/storage/app/course/'.$orderDe->course->cou_img)}}" >
			<h3 style="text-align: center">Khóa học của bạn đã bị hủy</h3>
		@endforeach
		
		<div id="xac-nhan">
			<br>
			<p align="justify">
				<b>CEDU rất mong hợp tác với quý khách trong lần tới</b><br />
				• Quý khách có thể tham khảo thêm một vài khóa học khác của chúng tôi <a href="{{ asset('courses') }}">tại đây</a><br />
				• Mọi thắc mắc xin liên hệ 1900.633.972<br />
				<b><br />Cám ơn Quý khách đã tin tưởng sử dụng Sản phẩm của Công ty chúng Tôi!</b>
			</p>
		</div>
		
	</div>
		
</div>