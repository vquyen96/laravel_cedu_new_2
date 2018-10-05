@extends('frontend.master')
@section('title','Thanh toán')
@section('fb_title','Top khóa học hàng đầu')
@section('fb_description','Nơi cung cấp cho bạn những khóa học tốt nhất, rẻ nhất. Tạo lên một môi trường học tập trên cuộc cách mạng công nghệ 4.0')
@section('fb_image',asset('public/layout/frontend/img/dayne-topkin-60559-unsplash.png'))
@section('main')
    <link rel="stylesheet" type="text/css" href="css/cart/login.css">

    
    <div class="instruction">


        <div class="instruction_body">
            <a href="{{ asset('') }}" class="instruction_item">
                Trang chủ
            </a>
            <a class="instruction_item">
                >
            </a>
            <a href="{{ asset('cart/show') }}" class="instruction_item">
                Giỏ hàng
            </a>
            
            
        </div>
        
    </div>
    <div class="main_body">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="loginLeft">
                        <div class="loginLeftTitle">
                            Bạn mua {{ Cart::count() }} khóa học
                        </div>
                        <div class="listCart">
                            @foreach ( $items as $item)
                            <div class="cart_item">
                                <div class="cart_item_left">
                                    <div class="cart_item_ava" style="background: url('{{ file_exists(storage_path('app/course/resized200-'.$item->cou->cou_img)) ? asset('lib/storage/app/course/resized200-'.$item->cou->cou_img) : 'img/no_image.jpg'}}') no-repeat center /cover"></div>
                                </div>
                                <div class="cart_item_right">
                                    <div class="cart_item_name">
                                        {{ $item->name }}
                                    </div>
                                    <div class="cart_item_content">
                                        
                                        <div class="cart_item_oldprice {{ $item->cou->cou_price == $item->price ? 'd-none' : '' }}">
                                            <del>{{ number_format($item->cou->cou_price, 0, ',', '.') }}</del>
                                        </div>
                                        <div class="cart_item_price">
                                            {{ number_format($item->price, 0, ',', '.') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-1 col-sm-1 col-xs-1"></div>
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="LoginRightPrice">
                        <div class="LoginRightPriceNew">
                            Tổng:  {{ number_format($total, 0, ',', '.') }} 
                        </div>
                        <div class="LoginRightPriceOld">
                            <del>{{number_format($total_old, 0, ',', '.')}} </del>
                        </div>
                        <div class="LoginRightPricePercent">
                            {{number_format($percent, 1 ,',','.')}}% off 
                        </div>
                    </div>
                    <div class="paymentRightShow">
                        <i class="far fa-circle"></i>
                        Thanh toán tại văn phòng
                    </div>
                    <div class="paymentRightHide">
                        <div class="paymentRightHideTitle">
                            <i class="far fa-circle"></i>
                            Thanh toán tại văn phòng
                        </div>
                        <div class="paymentRightHideText">
                            <em>Sau khi thanh toán thành công tại văn phòng của Cedu bạn sẽ nhận được mã code để kích hoạt khóa học.</em>
                        </div>
                        <div class="paymentRightHideBold">
                            Bạn đến trực tiếp trụ sợ công ty tại:
                        </div>
                        <div class="paymentRightHideText">
                            Tầng 4,5,6 Tòa nhà CPHONE Tower, Số 456 Xô Viết Nghệ Tĩnh, Phường 25, Quận Bình Thạnh, HCM.
                        </div>
                        <div class="paymentRightHideText">
                            Tầng 5, Tòa nhè Diamond Flower, Số 1 Hoàng Đạo Thúy, Quận Thanh Xuân, Hà Nội.
                        </div>
                        <div class="paymentRightHideText">
                            Nhân viên Cedu sẽ tận tình hướng dẫn và tư vấn cho bạn về khóa học, cách thanh toán và bạn sẽ nhận được code để kích hoạt khóa học của mình.
                        </div>
                        <a href="{{ asset('cart/complete_company') }}" class="buttonSubmit">
                            Xác nhận
                        </a>
                    </div>
                    <div class="paymentRightShow">
                        <i class="far fa-circle"></i>
                        Thanh toán chuyển khoản
                    </div>
                    <div class="paymentRightHide">
                        <div class="paymentRightHideTitle">
                            <i class="far fa-circle"></i>
                            Thanh toán chuyển khoản
                        </div>
                        <div class="paymentRightHideText">
                            Bạn có thể chuyển khoản tại quầy giao dịch, qua Internet Banking hoặc ATM <br>
                            <em>Lưu ý: Phí chuyển khoản sẽ do bạn trả</em>
                        </div>
                        <form method="post" action="{{ asset('cart/transfer') }}" id="form_transfer">
                            {{ csrf_field() }}
                            <div class="paymentRightForm">
                                <div class="paymentRightHideText">
                                    <span>Họ và tên:</span> {{ ' '.Auth::user()->name }}
                                </div>
                                <div class="paymentRightHideText">
                                    <span>Mail:</span>
                                    <input type="email" name="email" class="" placeholder="Email cua" value="{{ Auth::user()->email }}" required>
                                </div>
                                <div class="paymentRightHideText">
                                    <span>Số điện thoại </span>
                                    <input type="number" name="phone" class="" placeholder="Nhập số điện thoại của bạn">
                                </div>
                                <div class="paymentRightHideText d-none">
                                    <span>Bank</span>
                                    <input type="text" name="bank" class="" placeholder="Ngân hàng">
                                </div>
                                <button type="button" class="buttonSubmit transfer">Xác nhận</button>
                            </div>
                            <div class="paymentRightChooce">
                                <div class="row">
                                    @foreach($banks as $bank)
                                    <div class="col-md-3 col-sm-4 col-xs-4">
                                        <div class="bank" value="{{ $bank->id }}" style="background: url('{{ asset('lib/storage/app/bank/resized200-'.$bank->img) }}') no-repeat center /cover;"></div>
                                    </div>
                                    @endforeach



                                </div>

                            </div>

                        </form>
                        {{--<div class="paymentRightHideText">--}}
                            {{--<em>Thanh toán trực tiếp qua thẻ ATM hoặc Visa, Mastercard, Discover, Paypal, Bảo Kim, Ngân Lượng. Sau khi thanh toán thành công, bạn sẽ nhận được mã code qua số điện thoại và email.</em>--}}
                        {{--</div>--}}
                        {{--<a target="_blank" href="{{ asset('cart/get_ngan_luong') }}" class="buttonSubmit">--}}
                            {{--Thanh toán--}}
                        {{--</a>--}}

                    </div>
                    <div class="paymentRightShow">
                        <i class="far fa-circle"></i>
                        Giao mã khóa học và thu tiền tận nơi
                    </div>
                    <div class="paymentRightHide">
                        <div class="paymentRightHideTitle">
                            <i class="far fa-circle"></i>
                            Giao mã khóa học và thu tiền tận nơi
                        </div>
                        <div class="paymentRightHideText">
                            <em>Cedu sẽ giao mã code(mã kích hoạt) khóa học và thu tiền tận nơi(Ship COD) tới bạn trong vòng 2-5 ngày.</em>
                        </div>
                        <div class="paymentRightHideText">
                            <span>Họ và tên:</span> {{ ' '.Auth::user()->name }}
                        </div>
                        <div class="paymentRightHideText">
                            <span>Mail:</span> {{ ' '.Auth::user()->email }}
                        </div>
                        <form method="post">
                            {{ csrf_field() }}
                            <div class="paymentRightHideText">
                                <span>Số điện thoại </span>
                                <input type="number" name="phone" class="" placeholder="Nhập số điện thoại của bạn">
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        {{-- <select class="form-control" name="city">
                                            <option disabled="" selected="" value="">Tỉnh / Tp</option>
                                        </select> --}}
                                        <input type="text" name="city" class="form-control" placeholder="Tỉnh / Tp">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                     <div class="form-group">
                                        {{-- <select class="form-control" name="phuong">
                                            <option disabled="" selected="" value="">Quận/Huyện</option>
                                        </select> --}}
                                        <input type="text" name="quan" class="form-control" placeholder="Quận/Huyện">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="adress" class="form-control" placeholder="Địa chỉ">
                            </div>
                            <div class="form-group">
                                <textarea name="note" placeholder="Ghi chú" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="paymentRightHideText">
                                <em>Miễn phí giao hàng tại Hà Nội và TP.HCM</em>
                            </div>
                            
                            <button type="submit" class="buttonSubmit">Xác nhận</button>
                        </form>
                            
                    </div>

                </div>
            </div>
        </div>
    </div>

@stop
@section('script')
    <script type="text/javascript" src="js/cart/payment.js"></script>
@stop