
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<div style="background:#ddd; padding: 20px; font-family: 'Roboto', sans-serif;">
	<div style="width: 700px;height: 600px;margin: auto;">
		<div style="width: 50%;height: 600px;background: #35465c;float: left;">
			<div style="margin-top: 30px; font-family: 'Roboto', sans-serif;color: #cecece; font-size: 16px; font-weight: 300;margin-left: 20px;padding: 0 10px;margin-bottom: 25px;border-left: 3px solid #cecece;">
				<h3 style="color: #cecece;margin: 0;font-size: 16px;text-transform: uppercase;">KHÓA HỌC:</h3>
				@foreach ($order->orderDe as $orderDe)
				<p style="margin: 0;">{{$orderDe->course->cou_name}}</p>
				@endforeach
			</div>
			<div style="background: url('{{ asset('lib/storage/app/course/'.$orderDe->course->cou_img)}}') no-repeat center/cover;width: 100%;height: 70%;">	
			</div>
		</div>
		<div style="width: 50%;height: 600px;background: #eeeeee;float: left;">
			<div style="margin-bottom: 80px;">
				<img src="{{asset('public/layout/frontend/img/logo-png.png')}}" style="width: 110px;height: 80px;margin-top: 20px;">
			</div>
			<div style="margin: 0 25px;	color: #666;font-size: 16px;border-bottom: 1px solid #000;padding-bottom: 20px;">
				<h3 style="color: #666;font-size: 16px;text-transform: uppercase;">KHÓA HỌC ĐÃ BỊ HỦY</h3>
			</div>
		
			<div style="margin: 0 25px;	color: #666;font-size: 16px;border-bottom: 1px solid #000;padding-bottom: 20px;">
				<h3 style="color: #666;font-size: 16px;text-transform: uppercase;">CEDU rất mong hợp tác với quý khách trong lần tới</h3>
				<p style="font-weight: 300;font-size: 14px;"><i class="fas fa-circle" style="font-size: 11px;color: #35465c;"></i> Quý khách có thể tham khảo thêm một vài khóa học khác của chúng tôi 
					<a href="{{ asset('courses') }}">tại đây</a>
				</p>
				<p style="font-size: 14px;font-weight: 300;"><i class="fas fa-circle" style="font-size: 11px;color: #35465c;"></i> Mọi thắc mắc xin liên hệ 1900.633.972</p>			
			</div>
			<p style="font-family: 'Roboto', sans-serif;color: #666666; font-size: 12px; font-weight: 300;padding: 0 20px;
			">Cảm ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</p>
		</div>
	</div>
</div>