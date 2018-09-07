@extends('frontend.master')
@section('title','Kích hoạt mã code')
@section('main')
<link rel="stylesheet" type="text/css" href="css/code.css">
<div class="container">
	<form method="post" enctype="multipart/form-data">
	<div class="row formCode" >
		<div class="col-md-12 col-sm-12">
			<div class="code">
				<h3>Mã Xác Nhận</h3>
				<p>Nhập mã bạn nhận được vào ô bên dưới</p>
					<input type="text" name="code_value" placeholder="VD: 1E4G5F" autocomplete="off" required>
					<div class="btnCode">Xác nhận</div>
				<p><i>Lưu ý: Nhập mã mới nhất bạn nhận được </i></p>
				<p><i>Nếu bạn không nhận đưuọc email hoặc gặp lỗi vui lòng liên hệ với chúng tôi theo số </i></p>
				<p><strong>Hotline: 1800 6886</strong></p>
			</div>
		</div>
	</div>
	<div class="row formPass" >
		<div class="col-md-12 col-sm-12">
			<div class="code">
				<h3>Thay đổi mật khẩu</h3>
				<p>Nhập mật khẩu mới của bạn</p>
				
					<input type="password" name="password" placeholder="Mật khẩu" autocomplete="off" required>
					<input type="password" name="re_password" placeholder="Nhập lại mật khẩu" autocomplete="off" required>
					<input type="submit" name="sbm" value="Thay đổi">
					{{csrf_field()}}
				
					
				<p><i>Lưu ý: Nhập mã mới nhất bạn nhận được </i></p>
				<p><i>Nếu bạn không nhận đưuọc email hoặc gặp lỗi vui lòng liên hệ với chúng tôi theo số </i></p>
				<p><strong>Hotline: 1800 6886</strong></p>
			</div>
		</div>
	</div>
	</form>
</div>
@stop
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		localStorage.setItem('key', {{$code}});

	});
	
</script>
<script type="text/javascript" src="js/code.js"></script>
@stop