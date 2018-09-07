@extends('frontend.master')
@section('title','Thông tin cá nhân')
@section('fb_title','Top khóa học hàng đầu')
@section('fb_description','Nơi cung cấp cho bạn những khóa học tốt nhất, rẻ nhất. Tạo lên một môi trường học tập trên cuộc cách mạng công nghệ 4.0')
@section('fb_image',asset('public/layout/frontend/img/dayne-topkin-60559-unsplash.png'))
@section('main')
	<link rel="stylesheet" type="text/css" href="css/user/profile.css">
	<div class="instruction">

		<div class="instruction_body">
			<a href="{{ asset('') }}" class="instruction_item">
				Trang chủ
			</a>
			<a class="instruction_item">
				>
			</a>
			<a href="{{ asset('user') }}" class="instruction_item">
				Thông tin cá nhân
			</a>
			<a class="instruction_item">
				>
			</a>
			<a href="{{ asset('user/change_pass') }}" class="instruction_item">
				Đổi mật khẩu
			</a>
			
			
		</div>
		
	</div>
	<div class="main_body">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title">
						<h1>Đổi mật khẩu</h1>
						<div class="titleContent">
							Chúng tôi cung cấp cho các bạn những khoá học đa dạng và chất lượng nhất
						</div>
					</div>
					<div class="changePass">
						<form method="post">
							{{ csrf_field() }}
							<div class="changePassItem">
								<div class="row">
									<div class="col-md-1 col-sm-12"></div>
									<div class="col-md-2 col-sm-4">
										<div class="changePassItemLeft">
											Mật khẩu cũ
										</div>
									</div>
									<div class="col-md-8 col-sm-8">
										<div class="changePassItemRight">
											<input type="password" name="old_password" >
										</div>
									</div>
									<div class="col-md-1 col-sm-12"></div>
								</div>
							</div>
							<div class="changePassItem">
								<div class="row">
									<div class="col-md-1 col-sm-12"></div>
									<div class="col-md-2 col-sm-4">
										<div class="changePassItemLeft">
											Mật khẩu mới
										</div>
									</div>
									<div class="col-md-8 col-sm-8">
										<div class="changePassItemRight">
											<input type="password" name="new_password" >
										</div>
									</div>
									<div class="col-md-1 col-sm-12"></div>
								</div>
							</div>
							<div class="changePassItem">
								<div class="row">
									<div class="col-md-1 col-sm-12"></div>
									<div class="col-md-2 col-sm-4">
										<div class="changePassItemLeft">
											Nhập lại mật khẩu
										</div>
									</div>
									<div class="col-md-8 col-sm-8">
										<div class="changePassItemRight">
											<input type="password" name="re_new_password" >
										</div>
									</div>
									<div class="col-md-1 col-sm-12"></div>
								</div>
							</div>
							<div class="changePassItem">
								<div class="row">
									<div class="col-md-1 col-sm-12"></div>
									<div class="col-md-2 col-sm-4">
										
									</div>
									<div class="col-md-8 col-sm-8">
										<div class="changePassItemRight">
											<input type="submit" name="" value="Đổi mật khẩu">
										</div>
									</div>
									<div class="col-md-1 col-sm-12"></div>
								</div>
							</div>
						</form>
							
							
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
@section('script')
	<script type="text/javascript"></script>
@stop