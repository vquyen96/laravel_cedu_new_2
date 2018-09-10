@extends('frontend.master')
@section('title','Kích hoạt mã code')
@section('main')
<link rel="stylesheet" type="text/css" href="css/code.css">

	<div class="instruction">
		<div class="instruction_body">
			<a href="{{ asset('') }}" class="instruction_item">
				Trang chủ
			</a>
			<a class="instruction_item">
				>
			</a>
			<a href="{{ asset('code') }}" class="instruction_item">
				Kích hoạt mã code
			</a>
		</div>
	</div>
	<div class="main_body">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">

					<div class="code">
						<h3>Kích hoạt khóa học của bạn</h3>
						<p>Nhập mã bạn nhận được vào ô bên dưới</p>
						<form method="post" enctype="multipart/form-data">
							<input type="text" name="code_value" placeholder="VD: 1E4G5F" autocomplete="off" required>

							<input type="submit" name="sbm" value="Kích hoạt">
							{{csrf_field()}}
						</form>
							
						<p><i>Lưu ý: Mỗi khoá học chỉ cần kích hoạt 1 lần duy nhất. Không lặp lại bước này ở lần vào học sau.</i></p>
						<p><i>Nếu bạn không kích hoạt được khóa học vui lòng liên hệ với chúng tôi theo số </i></p>
						<p class="hotline"><strong>Hotline: 1800 6886</strong></p>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
{{-- @section('script')
<script type="text/javascript" src="js/code.js"></script>
@stop --}}