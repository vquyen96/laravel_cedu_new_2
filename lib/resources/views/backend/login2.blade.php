<!DOCTYPE html>
<html>
<head>
	<title>C_edu || Login</title>
	<base href="{{asset('public/layout/backend')}}/">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../frontend/img/LOGO_CEDU1.png">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700,800" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/login2.css">

</head>
<body>
	<div class="login">
		<div class="loginBody">
			<div class="loginMain">
				<div class="loginMainTitle">
					<div class="loginMainTitleLeft">
						Đăng Nhập
					</div>
					<div class="loginMainTitleRight">
						<a href="{{asset('redirect/google')}}">
							<img src="img/image (2).png">
						</a>
						<a  href="{{asset('redirect/facebook')}}">
							<img src="img/image 2.png">
						</a>
					</div>
				</div>
				@include('errors.note')
				<form method="post" class="formLogin" action="{{asset('login')}}">
					<div class="" >
						<input type="text" class="inputItem" name="email" required placeholder="Email" id="emailLogin">
						<input type="password" class="inputItem" name="password" required placeholder="Mật khẩu" id="passwordLogin">
						<div id="pass_error" class="error_mess"></div>
					</div>
					
					<div class="formBot">
						<a href="{{ asset('forgot_pass') }}" class="forgotPass">
							Bạn quên mật khẩu
						</a>
						<div class="formSbm">
							<input type="submit" name="" class="inputSbm" value="Đăng Nhập">
						</div>
					</div>
					{{csrf_field()}}
				</form>
				<form method="post" class="formRegister"  action="{{asset('register')}}">
					<div class="" >
						<input type="text" class="inputItem" name="name" required placeholder="Họ và Tên">
						<input type="text" class="inputItem" name="email" required placeholder="Email">
						<input type="password" class="inputItem" name="password" required placeholder="Mật khẩu" id="passwordRegister">
						<div id="pass_regis_error" class="error_mess"></div>
						<input type="password" class="inputItem" name="repassword" required placeholder="Nhập lại mật khẩu" id="repasswordRegister"> 
						<div id="re_pass_error" class="error_mess"></div>
					</div>
					
					<div class="formBot">
						
						<div class="formSbm">
							<input type="submit" name="" class="inputSbm" value="Đăng ký">
						</div>
					</div>
					{{csrf_field()}}
				</form>
			</div>
			
		</div>
		<div class="loginItem">
			<div class="loginItemMain">
				<div class="loginTitle">
					CHÀO MỪNG BẠN ĐẾN VỚI CEDU
				</div>
				<div class="loginTitleSmall">
					Trải nghiệm thú vị với nền giáo dục công nghệ 4.0
				</div>
				<div class="btnLogin">
					Đăng Nhập
				</div>
			</div>	
		</div>
		<div class="loginItem">
			<div class="loginItemMain">
				<div class="loginTitle">
					Đăng ký để trở thành học viên của Cedu
				</div>
				<div class="loginTitleSmall">
					Nếu bạn chưa có tài khoản?
				</div>
				<div class="btnRegister">
					Đăng ký
				</div>
			</div>
				
		</div> 
	</div>
		
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/login2.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			
			@if (Request::segment(1) == 'register')
				$('.btnRegister').click();
			@endif
		});
			
	</script>
</body>
</html>