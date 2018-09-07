@extends('frontend.master')
@section('title','Thành công')
@section('main')
<link rel="stylesheet" type="text/css" href="css/code.css">
<div class="container">
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="code">
				<h3>Email của bạn</h3>
				<p>Nhập email bạn dùng để đăng nhập vào ô phía dưới</p>
				<form method="post" enctype="multipart/form-data">
					<input type="text" name="email" placeholder="VD: lethihoa.92@gmail.com" autocomplete="off" required>
					<input type="submit" name="sbm" value="Xác Nhận">
					{{csrf_field()}}
				</form>
				<p><i>Lưu ý: Nếu bạn gặp vấn đề trong việc xác nhận email vui lòng liên hệ với chúng tôi theo số </i></p>
				<p><strong>Hotline: 1800 6886</strong></p>
			</div>
		</div>
	</div>

</div>
@stop
{{-- @section('script')
<script type="text/javascript" src="js/code.js"></script>
@stop --}}