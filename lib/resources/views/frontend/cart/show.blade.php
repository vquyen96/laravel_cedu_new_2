@extends('frontend.master')
@section('title','Giỏ hàng')
@section('fb_title','Top khóa học hàng đầu')
@section('fb_description','Nơi cung cấp cho bạn những khóa học tốt nhất, rẻ nhất. Tạo lên một môi trường học tập trên cuộc cách mạng công nghệ 4.0')
@section('fb_image',asset('public/layout/frontend/img/dayne-topkin-60559-unsplash.png'))
@section('main')
    <link rel="stylesheet" type="text/css" href="css/cart/show.css">

    
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
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="title">
                        <h1>
                            Giỏ hàng
                            <span class="title_num_cart">({{ Cart::count() }} khóa học)</span>
                        </h1>
                        
                        <div class="title_content">
                            Chúng tôi cung cấp cho các bạn những khoá học đa dạng và chất lượng nhất
                        </div>
                    </div>
                    <div class="cart">
                        @foreach ( $items as $item)
                        <div class="cart_item">
                            <div class="cart_item_left">
                                <div class="cart_item_ava" style="background: url('{{asset('lib/storage/app/course/'.$item->cou_img)}}') no-repeat center /cover;"></div>
                            </div>
                            <div class="cart_item_right">
                                <div class="cart_item_name">
                                    {{ $item->cou_name }}
                                </div>
                                <div class="cart_item_content">
                                    <a href="{{asset('cart/delete/'.$item->cou_row_id)}}" class="cart_item_remove">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                    <div class="cart_item_oldprice {{ $item->cou_price_old <= 0 ? 'd-none' : '' }}">
                                        <del>{{ number_format($item->cou_price_old, 0, ',', '.') }}</del>
                                    </div>
                                    <div class="cart_item_price">
                                        {{ number_format($item->cou_price, 0, ',', '.') }}
                                    </div>
                                </div>
                            </div>

                        </div>
                        @endforeach
                            
                    </div>
                </div>
                <div class="col-md-1 col-sm-1 col-xs-12"></div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="cartRight">
                        <div class="cartTotal">
                            <div class="cartTotalTitle">
                                Tổng tiền thanh toán
                            </div>
                            <div class="cartTotalPrice">
                                {{ number_format($total, 0, ',', '.') }} 
                            </div>
                            <div class="cartTotalPriceOld">
                                <del>{{number_format($total_old, 0, ',', '.')}} </del>
                            </div>
                            <div class="cartTotalPercent">
                                {{number_format($percent, 1 ,',','.')}}% off 
                            </div>
                        </div>
                        <div class="saleCode">
                            <input type="text" name="code" class="" placeholder="Mã xác nhận">
                            <input type="submit" name="sbm" value="Xác nhận">
                        </div>
                        <div class="btnPayment">
                            <a href="{{asset('cart/login')}}">
                                Thanh toán
                            </a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')

@stop