
<div style="background:#ddd; padding: 20px;">
	<div style="width: 500px; margin: 20px auto; background: #fff; padding: 30px;">
		<div style="width: 108px; height: 75px; margin: auto;">
			<img src="{{asset('public/layout/frontend/img/LOGO_CEDU1.png')}}" style="height: 100%">
		</div>
		
		
		<h2>Khóa học: {{$code->orderDe->course->cou_name}}</h2>
		<img src="{{ asset('lib/storage/app/course/'.$code->orderDe->course->cou_img)}}">
		<h3 style="text-align: center">Khóa học kích hoạt thành công</h3>
		<a href="https://ceduvn.com/courses/detail/{{ $code->orderDe->course->cou_slug }}.html/active" style="
		    width:  150px;
		    height:  40px;
		    line-height: 40px;
		    border: 0;
		    background: #FCC72E;
		    color:  #fff;
		    font-size: 16px;
		    font-weight:  bold;
		    border-radius: 5px;
		    margin: auto;
		    display:  block;
		    cursor:  pointer;
		    text-align: center;
		    text-decoration:  none;
		">
		    Bắt đầu học
		    
		</a>
		<div id="xac-nhan">
			<br>
			<p align="justify">
				<b>Quý khách đã kích hoạt thành công!</b><br />
				• Ngay bây giờ quý khách có thể bắt đầu khóa học của mình<br />
				• Quý khách có thể tham khảo thêm một vài khóa học khác của chúng tôi <a href="{{ asset('courses') }}">tại đây</a><br />
				• Mọi thắc mắc xin liên hệ 1900.633.972<br />
				<b><br />Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</b>
			</p>
		</div>
		
	</div>
		
</div>