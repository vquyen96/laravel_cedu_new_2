<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<div style="background:#ddd; padding: 20px; font-family: 'Roboto', sans-serif;">
    <div style="width: 900px;height: 780px;margin: auto;">
        <div style="width: 50%;height: 780px;background: #35465c;float: left;">
            <div style="font-family: 'Roboto', sans-serif;color: #cecece; font-size: 16px; font-weight: 300;margin-left: 20px;padding: 0 10px;margin-top: 20px;border-left: 3px solid #cecece;">
                <h3 style="color: #cecece; ">KHÓA HỌC:</h3>
                <p>{{$code->orderDe->course->cou_name}}</p>
            </div>
            <div style="width: 100%;height: 70%;background: url('{{asset('public/layout/frontend/img/layer-2.png')}}') no-repeat center/cover;"></div>
        </div>
        <div style="width: 50%;height: 780px;float: left;background: #eeeeee;">
            <div class="logo">
                <img src="{{asset('public/layout/frontend/img/logo-png.png')}}" style="width: 110px;height: 80px;margin-top: 20px;">
            </div>
            <div class="profile" style="margin: 0 25px;	color: #666;font-size: 16px;border-bottom: 1px solid #000;padding-bottom: 20px;">
                <h3 style="color: #666;">KHÓA HỌC BẠN ĐÃ THANH TOÁN</h3>
                <p style="font-weight: 300;font-size: 14px;"><span style="font-weight: 500 !important;">Khách hàng : </span> {{$code->orderDe->order->acc->name}}</p>
                <p style="font-weight: 300;font-size: 14px;"><span style="font-weight: 500 !important;">Email :</span> {{$code->orderDe->order->acc->email}}</p>
                <p style="font-weight: 300;font-size: 14px;"><span style="font-weight: 500 !important;">Điện thoại:  </span> Quyến Đỗ</p>
                <p style="font-weight: 300;font-size: 14px;"style="font-weight: 300;font-size: 14px;"><span>Địa chỉ : </span> Quyến Đỗ</p>
            </div>

            <div class="profile" style="margin: 0 25px;	color: #666;font-size: 16px;border-bottom: 1px solid #000;padding-bottom: 20px;">
                <h3 style="	font-size: 16px;">Khóa học: {{$code->orderDe->course->cou_name}}</h3>
                <span style="font-weight: 500 !important;">Mã kích hoạt</span><p class="code" style="display: inline-block;margin-left: 20px;line-height: 35px;width: 100px;background: #35465c;color: #fff;font-weight: bold !important;text-align: center;border-radius: 25px;">{{$code->code_value}}</p>
                <div style="color: #35465c;font-size: 14px; font-weight: bold;">MÃ KÍCH HOẠT KHÓA HỌC CHỈ TỒN TẠI 7 NGÀY</div>
            </div>

            <div class="profile" style="margin: 0 25px;	color: #666;font-size: 16px;border-bottom: 1px solid #000;padding-bottom: 20px;">
                <h3 style="color: #666;font-size: 16px;">QUÝ KHÁCH ĐÃ THANH TOÁN THÀNH CÔNG!</h3>
                <p style="font-weight: 300;font-size: 14px;"><i class="fas fa-circle" style="font-size: 11px;color: #35465c;"></i> Quý khách nhanh chóng kích hoạt trong thời gian sớm nhất</p>
                <p style="font-weight: 300;font-size: 14px;"><i class="fas fa-circle" style="font-size: 11px;color: #35465c;"></i> Quý khách có thể tham khảo thêm một vài khóa học khác của chúng tôi
                    <a href="{{ asset('courses') }}">tại đây</a>
                </p>
                <p style="font-weight: 300;font-size: 14px;"><i class="fas fa-circle" style="font-size: 11px;color: #35465c;"></i> Mọi thắc mắc xin liên hệ 1900.633.972</p>
            </div>
            <p style="font-family: 'Roboto', sans-serif;color: #666666; font-size: 12px; font-weight: 300;padding-left: 20px;
			">Cảm ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</p>
        </div>
    </div>
</div>