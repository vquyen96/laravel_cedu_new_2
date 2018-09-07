@extends('frontend.master')
@section('title','Đăng nhập')
@section('main')
<link rel="stylesheet" type="text/css" href="css/payment-login.css">

<div >
	<div class="paymentHeader">
		<div class="paymentHeaderMain">
			<div class="headerCircle paymentHeaderLogin active"><i class="fa fa-check" aria-hidden="true"></i></div>
			<div class="headerLine paymentHeaderLinePayment "></div>
			<div class="headerCircle paymentHeaderPayment "><i class="fa fa-check" aria-hidden="true"></i></div>
			<div class="headerLine paymentHeaderLineComplete"></div>
			<div class="headerCircle paymentHeaderComplete"><i class="fa fa-check" aria-hidden="true"></i></div>
		</div>
		<div class="paymentHeaderContent">
			<span class="active">Đăng nhập</span>
			<span>Cách thức thanh toán</span>
			<span>Xác nhận</span>
		</div>
	</div>
	<div class="container">
		<div class="paymentBody">
			<div class="row">
				<div class="col-md-5 col-sm-6">
					<div class="paymentListCart">
						<div class="listCartItem head">
							<h4>Thông tin giỏ hàng</h4>
							<a href="{{asset('cart/show')}}">
								<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
							</a>
						</div>
						<div class="listCartItem main">
							<div class="listCartItemTable">
								<span class="nameItem">
									Đơn hàng ({{Cart::count()}} sản phẩm)
								</span>
								<span class="priceItem">
									Giá (VND)
								</span>
							</div>
							@foreach($items as $item)
							<div class="listCartItemTable">
								<span class="nameItem">
									{{$item->name}}
								</span>
								<span class="priceItem">
									{{number_format($item->price*$item->qty,0,',','.')}}
								</span>
							</div>
							@endforeach
						</div>
						<div class="listCartItem footer">
							<div class="listCartItemTable">
								<span class="nameItem">
									Tổng
								</span>
								<span class="priceItem">
									{{$total}}
								</span>
							</div>
						</div>
						
					</div>
				</div>
				<div class="col-md-7 col-sm-6">
					<div class="row loginMain">
					
						<div class="loginHeader">
							<div class="col-md-6 col-sm-6 loginHeaderItem Left">
								Đăng nhập
								<div class="loginHeaderBorderLeft"></div>
							</div>
							<div class="col-md-6 col-sm-6 loginHeaderItem Right">
								Đăng kí
								<div class="loginHeaderBorderRight"></div>
							</div>
						</div>
					
					
						
						<div>
							<form method="post" class="formModal" id="paymentLogin" action="{{asset('loginHome')}}">
								<h4>Đăng nhập</h4>
								<div class="">
									<div class="form-group">
										<input type="text" class="form-control" name="email" required placeholder="Email">
										<i class="fa fa-envelope" aria-hidden="true"></i>
									</div>
								</div>
								<div class="" >
									<div class="form-group">
										<input type="password" class="form-control" name="password" required placeholder="Mật khẩu">
										<i class="fa fa-lock" aria-hidden="true"></i>
									</div>
								</div>
								<div class="forgotPassword">
									<a href="">
										Bạn quên mật khẩu ?
									</a>
									
								</div>
								<div class="form-group">
									<input type="submit" name="" class="btn-Modal" value="Đăng Nhập">
								</div>
								<div class="formModalOr">
									<div class="borderLine"></div>
									<div class="content">hoặc</div>
									
								</div>
								<div class="connect">
									<a href="{{asset('redirect/google')}}">
										Login with Google
									</a>
								</div>
								{{csrf_field()}}
							</form>
						
							<form method="post" class="formModal" id="paymentRegister" action="{{asset('register')}}">
								<h4>Đăng ký</h4>
								<div class="">
									<div class="form-group">
										<input type="text" class="form-control" name="name" required placeholder="Tên của bạn">
										<i class="fa fa-user" aria-hidden="true"></i>
									</div>
								</div>
								<div class="">
									<div class="form-group">
										<input type="text" class="form-control" name="email" required placeholder="Email">
										<i class="fa fa-envelope" aria-hidden="true"></i>
									</div>
								</div>
								<div class="" >
									<div class="form-group">
										<input type="password" class="form-control" name="password" required placeholder="Mật khẩu">
										<i class="fa fa-lock" aria-hidden="true"></i>
									</div>
								</div>
								<div class="form-group">
									<input type="submit" name="" class="btn-Modal" value="Đăng kí">
								</div>
								
								{{csrf_field()}}
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
<script type="text/javascript" src="js/payment-login.js"></script>
@stop
