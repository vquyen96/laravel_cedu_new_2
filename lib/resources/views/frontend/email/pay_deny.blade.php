<div style="background:#ddd; padding: 20px; font-family: 'Roboto', sans-serif;">
    <div style="width: 700px;height: 700px;margin: auto;display: flex;">
        <div style="background: #35465c;height: 700px;">
            <div style="font-family: 'Roboto', sans-serif;color: #cecece; font-size: 16px; font-weight: 300;margin-left: 20px;padding: 0 10px;margin-top: 20px;border-left: 3px solid #cecece;">
                <h3 style="color: #cecece;">KHÓA HỌC:</h3>
                @foreach ($order->orderDe as $orderDe)
                    <p>{{$orderDe->course->cou_name}}</p>
                @endforeach
            </div>

            {{-- THIẾU ẢNH --}}
            <div style="width: 350px;height: 500px;background: url('{{ asset('lib/storage/app/course/'.$orderDe->course->cou_img)}}') no-repeat center/cover;">
            </div>
        </div>
        <div style="background: #eeeeee;height: 700px;">
            <div style="margin-bottom: 80px;">
                <img src="{{asset('public/layout/frontend/img/logo-png.png')}}" style="width: 110px;height: 80px;margin-top: 20px;">
            </div>
            <div style="margin: 0 25px; color: #666;font-size: 16px;border-bottom: 1px solid #000;padding-bottom: 20px;">
                <h3 style="color: #666;font-size: 16px;text-transform: uppercase;">KHÓA HỌC ĐÃ BỊ HỦY</h3>
            </div>

            <div style="margin: 0 25px; color: #666;font-size: 16px;border-bottom: 1px solid #000;padding-bottom: 20px;">
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


