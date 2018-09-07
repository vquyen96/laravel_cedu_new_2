@extends('frontend.master')
@section('title','Thành công')
@section('main')
<link rel="stylesheet" type="text/css" href="css/complete.css">
<div>
	<div class="paymentHeader">
		<div class="paymentHeaderMain">
			<div class="headerCircle paymentHeaderLogin done"><i class="fa fa-check" aria-hidden="true"></i></div>
			<div class="headerLine paymentHeaderLinePayment done "></div>
			<div class="headerCircle paymentHeaderPayment  done"><i class="fa fa-check" aria-hidden="true"></i></div>
			<div class="headerLine paymentHeaderLineComplete  done"></div>
			<div class="headerCircle paymentHeaderComplete active"><i class="fa fa-check" aria-hidden="true"></i></div>
		</div>
		<div class="paymentHeaderContent">
			<span class="">Đăng nhập</span>
			<span class="">Cách thức thanh toán</span>
			<span class="active">Xác nhận</span>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="completeBody">
					<div class="completeLogo">
						<img src="img/icon_Checked.png">
					</div>
					<div class="completeBodyContent">
						<h3>Thanh toán thành công</h3>
						<p>Chúc mừng bạn đã thanh toán thành công khóa học của mình</p>
						<p>Mã khóa học của bạn sẽ được gửi vào mail đăng ký của bạn trong vòng 1-2 phút</p>
						<p>Vui lòng kiểm tra mail của mình</p>
					</div>
					<div class="completeBodyCount">
						10 giây
					</div>
					<div class="completeBodyback">
						<a href="{{asset('')}}">
							Quay lại trang chủ
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
@stop
@section('script')

<script type="text/javascript" src="js/complete.js"></script>

@stop