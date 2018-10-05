@extends('frontend.master')
@section('title','Đăng nhập')
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
                    <div class="loginRight">
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
                        <div class="loginForm">
                            <div class="loginFormTitle">
                                Đăng nhập
                            </div>
                            <div class="loginFormSocial">
                                Đăng nhập với 
                                <a href="{{ asset('redirect/google') }}">
                                    <img src="img/gg.png">
                                </a>
                                <a href="{{ asset('redirect/facebook') }}">
                                    <img src="img/fb.png">
                                </a>
                            </div>
                            <div class="loginFormMain">
                                <form method="post" action="{{ asset('login') }}">
                                    {{ csrf_field() }}
                                    <div class="inputTitle">
                                        Mail
                                    </div>
                                    <div class="inputContent">
                                        <input type="text" name="email" class="" placeholder="Nhập email của bạn"> 
                                    </div>
                                    <div class="inputTitle">
                                        Mật khẩu
                                    </div>
                                    <div class="inputContent">
                                        <input type="password" name="password" class="" placeholder="Nhập mật khẩu của bạn">
                                    </div>
                                    <div class="inputSubmit">
                                        <input type="submit" name="" value="Đăng nhập">
                                    </div>
                                    <div class="formText">
                                        Nếu bạn chưa có tài khoản xin vui lòng 
                                        <a>đăng kí?</a>
                                    </div>
                                    <div class="formText">
                                        <a href="{{ asset('forgot_pass') }}">Bạn quên mật khấu?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    
@stop