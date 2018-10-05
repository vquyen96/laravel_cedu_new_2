
@extends('frontend.master')
@section('title','Thanh toán')
@section('fb_title','Top khóa học hàng đầu')
@section('fb_description','Nơi cung cấp cho bạn những khóa học tốt nhất, rẻ nhất. Tạo lên một môi trường học tập trên cuộc cách mạng công nghệ 4.0')
@section('fb_image',asset('public/layout/frontend/img/dayne-topkin-60559-unsplash.png'))
@section('main')
    <link rel="stylesheet" href="css/cart/info_payment.css">

    <script language="javascript">
    var url = $('.currentUrl').text();

    var h = {{$time_del['h']}}; // Giờ
    var m = {{$time_del['m']}}; // Phút
    var s = {{$time_del['s']}}; // giây

    // var h = 0; // Giờ
    // var m = 0; // Phút
    // var s = 3; // giây

    var timeout = null; // Timeout
    start();
    function start()
    {
        if (s === -1){
            m -= 1;
            s = 59;
        }
        if (m === -1){
            h -= 1;
            m = 59;
        }
        if (h === -1){
            timeover();
            clearTimeout(timeout);
            return false;
        }
        $('#h').html(h);
        $('#m').html(m);
        $('#s').html(s);

        timeout = setTimeout(function(){
            s--;
            start();
        }, 1000);
    };
    setInterval(function () {
        check_status({{ $order->ord_id }});
    },10000)

    function check_status(id) {
        $.ajax({
            method: 'POST',
            url: url+'cart/check_status',
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'id': id
            },
            success: function (resp) {
                console.log(resp);
                if(resp == 0){
                   window.location.href = url+'cart/complete/all';
                }
                if (resp == -1) {
                    window.location.href = url+'cart/complete/all';
                }
            },
            error: function (resp) {
                console.log(resp);
            }
        });
    }
    function timeover(id){
         $.ajax({
          method: 'POST',
          url: url+'cart/update_status',
          data: {
              '_token': $('meta[name="csrf-token"]').attr('content'),
              'id': id,
              'status': '-1'
          },
          success: function (resp) {
           if(resp){
               window.location.href = url+'complete?status=-1';
            }
          },
          error: function (resp) {
            console.log(resp);
          }
        });
    }
</script>
    <div class="instruction">


        <div class="instruction_body">
            <a href="{{ asset('') }}" class="instruction_item">
                Trang chủ
            </a>
            <a class="instruction_item">
                >
            </a>
            <a href="{{ asset('') }}" class="instruction_item">
                Thanh toán
            </a>
            <a class="instruction_item">
                >
            </a>
            <a href="{{ asset('') }}" class="instruction_item">
                Chuyển khoản
            </a>
        </div>
        
    </div>
    <section class="hs-section main_body">
        <div class="container">
            <div class="row main_title">
                <div class="col-sm-12">
                    <h1 class="bold">Thanh toán chuyển khoản</h1>
                </div>
            </div>

            <div class="row d-flex">
                <div class="col-sm-12 col-md-8 col-lg-8">
                    <div class=" pb-200 confirm-box">
                        <div>
                            <i class="fas fa-exclamation-circle" style="color: #fcc72e;"></i> Hướng dẫn thanh toán đã được Ctogo gửi vào mail của bạn
                        </div>
                        <div class="confirm-box-main">
                            <div class="confirm-box-child">
                                <div class="confirm-box-header">
                                    <span class="main-color">01.</span> Bạn vui lòng tiến hành thanh toán trước
                                </div>
                                <div class="confirm-box-body">
                                    <p class="bold">Hôm nay {{ date('d/m/Y H:i:s', strtotime($order->created_at) + 7200)}}</p>
                                    <p class="fs-14">Thời gian còn lại <span id="h"></span> tiếng &nbsp; <span id="m"></span> phút &nbsp; <span id="s"></span> giây</p>
                                    @if(isset($url_payment) && $url_payment != '')
                                        <p><span>Link thanh toán: </span><a target="_blank" href="{{$url_payment}}">Link thanh toán</a></p>
                                    @endif
                                </div>
                            </div>

                            <div class="confirm-box-child">
                                <div class="confirm-box-header">
                                    <span class="main-color">02.</span> Khách hàng vui lòng chuyển khoản đến STK sau:
                                </div>

                                <div class="confirm-box-body">
                                    <div class="bankHead">
                                        <div class="bankImg" style="background: url('{{ asset('lib/storage/app/bank/resized200-'.$bank->img) }}') no-repeat center /cover"></div>
                                        <div class="bankName bold">
                                            {{ $bank->name }}
                                        </div>
                                    </div>

                                    <hr>
                                    <p class="fs-14">Số tài khoản: {{ $bank->acc_num }}</p>
                                    <p class="fs-14">Chủ tài khoản: {{ $bank->acc_name }}</p>
                                    <p class="fs-14">Nội dung thanh toán: {{ $order->ord_note }}</p>
                                    <hr>
                                    <p class="fs-14">Số tiền cần thanh toán: <span class="bold">{{number_format($order->ord_total_price)}}đ</span></p>
                                    <p class="italic fs-12"><i class="fas fa-exclamation-circle" style="color: #fcc72e;"></i> Lưu ý: -Bạn cần thanh toán chính xác số tiền đặt phòng của mình</p>
                                    <p class="italic fs-12"><i class="fas fa-exclamation-circle" style="color: #fcc72e;"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nếu thanh toán qua chuyển khoản bạn cần chụp lại ảnh gửi cho chúng tôi</p>
                                </div>
                            </div>

                            <div class="confirm-box-child">
                                <div class="confirm-box-header">
                                    <span class="main-color">03.</span> Sau khi thanh toán thành công chúng tôi sẽ gửi mail xác nhận thanh toán cho bạn
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="book-box">
                        <div class="book-box-header">
                            Thông tin homestay
                        </div>
                        <div class="book-box-body">
                            @foreach ($order->orderDe as $orderDe)
                                <div class="book-homestay">
                                    <div class="book-image" style="background: url('{{asset('lib/storage/app/course/resized200-'.$orderDe->course->cou_img)}}') no-repeat center /cover;"></div>
                                    <div class="book-homestay-info">
                                        {{-- <div class="book-homestay-code">Mã đặt chỗ: 01111212</div> --}}
                                        <div class="book-homestay-name">{{ cut_string($orderDe->course->cou_name , 60) }}</div>
                                        <div class="book-homestay-address">{{ number_format($orderDe->orderDe_price) }} vnđ</div>
                                    </div>
                                </div>
                            @endforeach
                                
                            <div class="book-info">
                                
                                <hr>
                                <div class="book-info-row">
                                    <span class="book-info-discount">Giảm (-20%)</span>
                                </div>
                                <div class="book-info-row-last">
                                    <span class="book-info-left">TỔNG</span>
                                    <span class="book-info-right">{{number_format($order->ord_total_price)}} vnđ</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
@section('script')

@stop