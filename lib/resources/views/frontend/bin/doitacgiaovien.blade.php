<!DOCTYPE html>
<html>
<head>
	<title>Trở thành giảng viên</title>
	<base href="{{asset('public/layout/frontend')}}/">
	<link rel="shortcut icon" href="img/LOGO_CEDU1.png">
	<meta charset="utf-8">
	<meta property="og:url" 		content="http://ceduvn.com/" />
	<meta property="fb:app_id" 		content="1577563652342523" />
	<meta property="og:title" 		content="Cộng tác viên bán kháo học" />
	<meta property="og:description" content="" />
    <meta property="og:image" 		content="" />
    <meta property="og:image:type" 	content="image/png">
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="300">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Serif:500|Roboto:400,500" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700,800" rel="stylesheet">
	{{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous"> --}}
	<link rel="stylesheet" type="text/css" href="css/font/all.css">
	<link rel="stylesheet" type="text/css" href="css/doitacgiaovien.css">
	<link rel="stylesheet" type="text/css" href="css/layout/footer.css">
</head>
<body>
	<div class="masterError">
		<div class="masterErrorContent">
			@include('errors.note')
		</div>
	</div>
	<div class="header">
		<div class="headerLogo">
			<a href="{{ asset('') }}">
				<img src="{{asset('public/layout/frontend/img/LOGO_CEDU1.png')}}">
			</a>
		</div>
		<div class="headerForm">
			<div class="headerFromMain">
				<p>ĐĂNG KÝ ĐỂ TRỞ THÀNH </p>
				<p>Giảng viên của CEDU</p>
				<form method="post">
					@if(Auth::check())
					<div class="formItem">
						<b>Họ và tên: </b>
						{{Auth::user()->name}}
					</div>
					<div class="formItem">
						<b>Email: </b>
						{{Auth::user()->email}}
					</div>
					@else
					<input type="text" name="name" placeholder="Họ và tên" required>
					<input type="text" name="email" placeholder="Email" required>
					@endif
					
					<input type="text" name="phone" placeholder="Số điện thoại" required>
					<input type="text" name="facebook" placeholder="Link Facebook" required>
					<textarea rows="4" name="chude" placeholder="Chủ đề giảng dạy" required></textarea>
					<textarea rows="4" name="exp" placeholder="Kinh nghiệm giảng dạy" required></textarea>
					<input type="submit" name="sbm" value="Đăng ký">
					{{@csrf_field()}}
				</form>
			</div>
		</div>
		<div class="headerContent">
			<span class="txt30">CÙNG </span>
			<span class="txt30 yell">CEDU </span>
			<span class="txt30">VIẾT TIẾP CÂU </span><br>
			<span class="txt30">CHUYỆN </span>
			<span class="txt30 yell">TRI THỨC</span>
			<p>Bạn đã sẵn sàng chia sẻ kiến thức của mình</p>
		</div>
		<div class="headerImg">
			<img src="{{asset('public/layout/frontend/img/say_yes.png')}}">
		</div>
	</div>
	<div class="contact">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="contactItem">
						<div class="contactItemImg">
							<img src="{{asset('public/layout/frontend/img/tele.png')}}">
							<p>(+84) 888 790 111</p>
						</div>
						
					</div>
					<div class="contactItem">
						<div class="contactItemImg">
							<img src="{{asset('public/layout/frontend/img/email.png')}}">
							<p>teacher@ceduvn.com</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{-- <div class="main"></div> --}}
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="main">
					<div class="main01">
						<div class="row">
							<div class="col-md-12">
								<div class="mainTitle">
									<div class="mainTitleBody">
										<span class="txt155">01</span>
										<span class="mainTitleContent">Đối tác giảng dạy tại Cedu là ai?</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-3">
								<div class="main01Item">
									<img src="{{asset('public/layout/frontend/img/giangvien.png')}}">
									<p>giảng viên</p>
								</div>

							</div>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<div class="main01Item">
									<img src="{{asset('public/layout/frontend/img/IC_CHUYENGIA.png')}}">
									<p>chuyên gia</p>
								</div>
								
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<div class="main01Item">
									<img src="{{asset('public/layout/frontend/img/daonhnhan.png')}}">
									<p>doanh nhân</p>
								</div>
								
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<div class="main01Item">
									<img src="{{asset('public/layout/frontend/img/canhanxuatsac.png')}}">
									<p>Cá nhân xuất sắc</p>
								</div>
								
							</div>
						</div>
					</div>
					<div class="main02">
						<div class="row">
							<div class="col-md-12">
								<div class="mainTitle">
									<div class="mainTitleBody">
										<span class="txt155">02</span>
										<span class="mainTitleContent">Lý do nên giảng dạy tại CEDU</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="main02Body">
								<div class="main02Main">
									<div class="main02Item">
										<img src="{{asset('public/layout/frontend/img/quangba.png')}}">
										<p>Quảng bá đến hàng triệu học viên </p>
									</div>
								</div>
								<div class="main02Main">
									<div class="main02Item">
										<img src="{{asset('public/layout/frontend/img/hoahong.png')}}">
										<p>Được hưởng hoa hồng hấp dẫn</p>
									</div>
								</div>
								<div class="main02Main">
									<div class="main02Item">
										<img src="{{asset('public/layout/frontend/img/bannhieulan.png')}}">
										<p>Xây 1 khóa, bán n lần</p>
									</div>
								</div>
								<div class="main02Main">
									<div class="main02Item">
										<img src="{{asset('public/layout/frontend/img/phattrienthuonghieu.png')}}">
										<p>Xây dựng và phát triển thương hiệu cá nhân</p>
									</div>
								</div>
									

							</div>
							
						</div>
					</div>
					<div class="main03">
						<div class="row">
							<div class="col-md-12">
								<div class="mainTitle">
									<div class="mainTitleBody">
										<span class="txt155">03</span>
										<span class="mainTitleContent">Quy trinh trở thành giảng viên của cedu</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-4">
								<div class="main03Body">
									<div class="main03BodyItem">
										<div class="num96">1</div>
										<b>Đăng ký</b>
										<p>Thủ tục đăng ký nhanh chóng chỉ trong 1 phút</p>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
								<div class="main03Body">
									<div class="main03BodyItem">
										<div class="num96">2</div>
										<b>Soạn đề cương</b>
										<p>Xây dựng đề cương chất lượng, hấp dẫn học viên.</p>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
								<div class="main03Body">
									<div class="main03BodyItem">
										<div class="num96">3</div>
										<b>Dựng video</b>
										<p>Toàn bộ khâu dựng, hậu kỳ sẽ được CEDU hỗ trợ, tư vấn.</p>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2 col-sm-2 col-xs-2">

							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
								<div class="main03Body">
									<div class="main03BodyItem">
										<div class="num96">4</div>
										<b>Phát Hành</b>
										<p>CEDU sẽ chịu trách nhiệm phát hành và quảng bá khóa học.</p>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
								<div class="main03Body">
									<div class="main03BodyItem">
										<div class="num96">5</div>
										<b>Thu Nhập</b>
										<p>Giảng viên sẽ được chia sẻ lợi nhuận trên từng khóa học.</p>
									</div>
								</div>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
								
							</div>
						</div>
					</div>
					<div class="main04">
						<div class="row">
							<div class="col-md-12">
								<div class="mainTitle">
									<div class="mainTitleBody">
										<span class="txt155">04</span>
										<span class="mainTitleContent">sứ mệnh của cedu</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-4">
								<div class="main04Body">
									<div class="main04BodyItem">
										<img src="{{asset('public/layout/frontend/img/giaoduc4.0.png')}}">
										<p>Giảng dạy theo hướng công nghệ 4.0</p>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
								<div class="main04Body">
									<div class="main04BodyItem">
										<img src="{{asset('public/layout/frontend/img/lantoakienthuc.png')}}">
										<p>Là cầu nối lan tỏa tri thức đến mọi người.</p>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
								<div class="main04Body">
									<div class="main04BodyItem">
										<img src="{{asset('public/layout/frontend/img/chatluonghangdau.png')}}">
										<p>Luôn đặt chất lượng giảng dạy lên hàng đầu.</p>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="register">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="registerMain">
						<span class="txt30">Bạn đã sẵn sàng để </span>
						<span class="txt30 yell">hoàn thành sứ mệnh </span>
						<span class="txt30">của mình. </span><br>
						<span class="txt30">Hãy đăng ký giảng dạy tại </span>
						<span class="txt30 yell">CEDU </span>
						<span class="txt30">nhé! </span>
						<div class="btnRegister">Đăng ký</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('frontend/layout/footer')
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/doitacgiaovien.js"></script>
</body>
</html>