@extends('frontend.master')
@section('title','Đơn hàng')
@section('main')
<link rel="stylesheet" type="text/css" href="css/cart.css">

<div class="container cartShow">
	@if(Cart::count() == 0)
		<div class="row cartBodyNull">
			<div class="col-md-12 col-sm-12">
				<div class="cartAlert">
					<h2>Hiện tại chưa có khóa học nào được mua</h2>
				</div>
				<div class="btnBuyMore">
					<a href="{{asset('courses')}}">
						Tiếp tục mua khóa học
					</a>
				</div>
			</div>
		</div>

	@else
	<div class="row">
		<div class="col-md-12 col-sm-12">Giỏ hàng({{Cart::count()}} khóa học)</div>
	</div>
	<div class="row cartBody">
		<div class="col-md-8">
			<div class="cartList">
				@foreach($items as $item)
					<div class="cartItem">
						<div class="cartItemImg">
							<img src="{{asset('lib/storage/app/course/'.$item->options->img)}}" >
						</div>
						<div class="cartItemContent">
							<h4>{{$item->name}}</h4>
							<p>{{$item->options->tea}}</p>
							<a href="{{asset('cart/delete/'.$item->rowId)}}">
								Xóa
							</a>
						</div>
						<div class="cartItemPrice">
							{{number_format($item->price,0,',','.')}} đ
						</div>
					</div>
				@endforeach
			</div>
				
		</div>
		<div class="col-sm-4">
			<div class="cartRight">
				<div class="cartTotal">
					<div class="cartTotalTitle">
						Tổng
					</div>
					<div class="cartTotalContent">
						<div class="cartTotalContentLeft">
							Thành tiền
						</div>
						<div class="cartTotalContentRight price">
							{{$total}} đ
						</div>
					</div>
				</div>
				<div class="btnPayment">
					<a href="{{asset('cart/login')}}">
						Thanh toán
					</a>
					
				</div>
			</div>
				
		</div>
	</div>
	@endif
</div>

@stop
@section('script')
<script type="text/javascript" src="js/cart.js"></script>
@stop