@extends('frontend.master')
@section('title','Thanh toán')
@section('fb_title','Top khóa học hàng đầu')
@section('fb_description','Nơi cung cấp cho bạn những khóa học tốt nhất, rẻ nhất. Tạo lên một môi trường học tập trên cuộc cách mạng công nghệ 4.0')
@section('fb_image',asset('public/layout/frontend/img/dayne-topkin-60559-unsplash.png'))
@section('main')
    <link rel="stylesheet" type="text/css" href="css/cart/complete.css">

    
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
                Xong
            </a>
        </div>
        
    </div>
    <div class="main_body">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="comMain">
                        <h1>Cảm ơn !!!</h1>
                        <div class="comMainContent">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries !!
                        </div>
                        <a href="{{ asset('') }}" class="btnHome">
                            Về trang chủ
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop