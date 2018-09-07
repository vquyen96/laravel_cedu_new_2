<!DOCTYPE html>
<html>
<head>
	<title>Affiliate</title>
	<base href="{{asset('public/layout/frontend')}}/">
	<link rel="shortcut icon" href="{{ asset('public/layout/frontend/img/BUT.png') }}">
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
	<link rel="stylesheet" type="text/css" href="css/affiliate.css">
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
		<div class="headerMenu">
			<ul>
				<li class="headerMenu1">
					Affiliate Marketing là gì?	
				</li>
				<li class="headerMenu2">
					Quy trình
				</li>
				<li class="headerMenu3">
					Lý do chọn Cedu
				</li>
				<li class="headerMenu4">
					Chương trình
				</li>
			</ul>
		</div>
		<div class="headerForm">
			<div class="headerFromMain">
				<p>ĐĂNG KÝ ĐỂ TRỞ THÀNH</p>
				<p>AFFILIATE MARKETING</p>
				<form method="post">
					@if(Auth::guest())
						<input type="text" name="name" placeholder="Họ và tên">
						<input type="text" name="email" placeholder="Email">
						<input type="password" name="password" placeholder="Mật khẩu">
						<input type="password" name="repassword" placeholder="Nhập lại mật khẩu">
					@else
						<div class="formItem"><b>Họ và tên: </b> {{Auth::user()->name}}</div>
						<div class="formItem"><b>Email: </b> {{Auth::user()->email}}</div>
					@endif
						
						
					<input type="submit" name="sbm" value="Đăng ký">
					{{@csrf_field()}}
				</form>
			</div>
			<div class="headerFormPhone">
				<img src="{{asset('public/layout/frontend/img/tel.png')}}">
				(+84) 888 790 111
			</div>
		</div>
		<div class="headerContent">
			<span class="txt30 yell">TRỞ THÀNH ĐỐI TÁC </span>
			<span class="txt30">PHÂN PHỐI </span><br>
			<span class="txt30">KHÓA HỌC CỦA </span>
			<span class="txt30 yell">CEDU</span>
			<p>Khóa học chất lượng - Đăng ký dễ dàng - Hưởng hoa hồng hấp dẫn</p>
		</div>
	</div>
	<div class="about">
		<div class="aboutMain">
			<h3>Affiliate Marketing là gì?</h3>
			<div class="left">
				<div class="logo">
					<img src="{{ asset('public/layout/frontend/img/user1.png') }}">
					<p>Khách hàng</p>
				</div>
				<div class="content">
					<p>Người mua sản phẩm, dịch vụ trực tuyến của nhà cung cấp thông qua liên kết giới thiệu của các đối tác (Affiliater). Đây là đối tượng để đối tác nhắm tới.</p>
				</div>
			</div>
			<div class="mid">
				<div class="logo">
					<img src="{{ asset('public/layout/frontend/img/Vector Smart Object4.png') }}">
					<p>Affiliater</p>
				</div>
				<div class="content">
					<p>Là những người như chúng ta: marketer, affiliater, có sở hữu website, blog hay các trang mạng xã hội, fanpage, kênh youtube,… muốn kiếm thêm thu nhập từ việc quảng bá các sản phẩm cho nhà cung cấp.</p>
				</div>
			</div>
			<div class="right">
				<div class="logo">
					<img src="{{ asset('public/layout/frontend/img/ic_nhacungcap.png') }}">
					<p>Nhà cung cấp</p>
				</div>
				<div class="content">
					<p>Công ty, doanh nghiệp cung cấp sản phẩm, dịch vụ muốn gia tăng lợi nhuận từ kinh doanh internet, thay vì chỉ kinh doanh theo hình thức cũ.</p>
				</div>
			</div>
			<div class="arrowLeft">
				<img src="{{ asset('public/layout/frontend/img/arrow_right.png') }}">
			</div>
			<div class="arrowRight">
				<img src="{{ asset('public/layout/frontend/img/arrow_left_right.png') }}">
			</div>
		</div>
	</div>
	<div class="make">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="makeTitle">
						Quy trình kiếm tiền cùng CEDU
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="makeItem">
						<div class="makeItemLogo">
							<img src="{{ asset('public/layout/frontend/img/Vector Smart Object5.png')}}">
						</div>
						<div class="makeItemContent">
							<h4>01. ĐĂNG KÝ</h4>
							<p>Sau khi bạn đăng ký thành công sẽ có bộ phận nhân sự gọi điện để xác nhận</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="makeItem">
						<div class="makeItemLogo">
							<img src="{{ asset('public/layout/frontend/img/ic_link.png')}}">
						</div>
						<div class="makeItemContent">
							<h4>02. LẤY LINK</h4>
							<p>Tìm khóa học bạn yêu thích và muốn chia sẻ. Sau đó, click link AFFILIATE dành riêng cho bạn</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="makeItem">
						<div class="makeItemLogo">
							<img src="{{ asset('public/layout/frontend/img/Vector Smart Object1.png') }}">
						</div>
						<div class="makeItemContent">
							<h4>03. CHIA SẺ KHÓA HỌC</h4>
							<p>Sau khi lấy link bạn chia sẻ link AFFILIATE trên website, Facebook, Blog, Email, forum, chạy quảng cáo...</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="makeItem">
						<div class="makeItemLogo">
							<img src="{{ asset('public/layout/frontend/img/Vector Smart Object2.png') }}">
						</div>
						<div class="makeItemContent">
							<h4>04. NHẬN HOA HỒNG</h4>
							<p>Nếu khách hàng vào link AFFILIATE của bạn để mua KHÓA HỌC, bạn sẽ nhận được hoa hồng >= 35%</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="why">
		<div class="whyHeader">
			Lý do bạn nên chọn CEDU
		</div>
		<div class="whyMain">
			<div class="whyMainItem">
				<img src="{{ asset('public/layout/frontend/img/Vector Smart Object.png') }}">
				<div class="whyMainItemContent">
					<h3>01</h3>
					<p>Khóa học chất lượng, đa dạng từ các Thầy cô có bề dày kinh nghiệm</p>
				</div>
			</div>
			<div class="whyMainItem">
				<img src="{{ asset('public/layout/frontend/img/Vector Smart Object.png') }}">
				<div class="whyMainItemContent">
					<h3>02</h3>
					<p>Bạn được hưởng hoa hồng hấp dẫn >=35% khi có khách hàng mua khóa học từ link của bạn</p>
				</div>
			</div>
			<div class="whyMainItem">
				<img src="{{ asset('public/layout/frontend/img/Vector Smart Object.png') }}">
				<div class="whyMainItemContent">
					<h3>03</h3>
					<p>Luôn có đội ngũ hỗ trợ bạn khi bạn gặp khó khăn trong vấn đề chia sẻ khóa học.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="step">
		<div class="stepTitle">
			Chương trình AFFILIATE tại CEDU
		</div>
		<div class="stepContent">
			<div class="stepContentItem">
				
				<div class="boder"></div>
				<div class="stt">1</div>
				<div class="circle"></div>
				<p>Chương trình liên kết CEDU Affiliate cung cấp hàng nghìn link tới các khóa học với nhiều chuyên ngành khác nhau - như Luyện thi THPT Quốc gia, IT, Kỹ năng mềm... và mức hoa hồng lớn hơn 35% cho mỗi khóa học được bán thông qua quảng cáo của bạn.</p>
			</div>
			<div class="stepContentItem">
				
				<div class="boder"></div>
				<div class="stt">2</div>
				<div class="circle"></div>
				<p>Dữ liệu được lưu trữ trong 30 ngày. Ngay cả khi khách hàng không thực hiện mua khóa học ngay sau khi nhấp vào quảng cáo của bạn, CEDU vẫn sẽ tính doanh số bán hàng cho bạn nếu việc mua khóa học diễn ra trong vòng 30 ngày.</p>
			</div>
			<div class="stepContentItem">
				
				<div class="boder"></div>
				<div class="stt">3</div>
				<div class="circle"></div>
				<p>Nếu có nhiều Affiliater tiếp cận 1 khách hàng thì Affiliater cuối cùng sẽ được tính hoa hồng.</p>
			</div>
			<div class="stepContentItem">
				
				<div class="boder"></div>
				<div class="stt">4</div>
				<div class="circle"></div>
				<p>Thanh toán ngày 10 hàng tháng. Hạn mức thanh toán 400.000đ. Nếu Affiliater không đạt được hạn mức thì sẽ được cộng vào tháng sau. </p>
			</div>
			<div class="stepContentItem">
				
				<div class="boder"></div>
				<div class="stt">5</div>
				<div class="circle"></div>
				<p>Kênh nhận thanh toán hoa hồng: Paypal, Ngân lượng, thẻ ATM.</p>
			</div>
		</div>
	</div>
	<div class="btnScrollTop">
		<i class="fa fa-angle-double-up" aria-hidden="true"></i>
	</div>
	
	<footer>

		<div class="container footerMain">
			<div class="row">
				<div class="col-md-4 col-sm-4 ">
					<div class="footerItem footerMainItemPlace">
						<h4>TRỤ SỞ CÔNG TY</h4>
						<div class="footerHoverBorder"></div>
						<div class="footerMainItemContent">
							<p>
								<img src="img/ic_placeholder.png">
								Tầng 4, 5, 6 CPHONE Tower, Số 456 Xô Viết Nghệ Tĩnh, P25, Q Bình Thạnh, HCM
							</p>
							<p>
								<img src="img/ic_placeholder.png">
								Tầng 5, Tòa Nhà Diamond Flower, Sớ 1 Hoàng Đạo Thúy, Thanh Xuân, Hà Nội
							</p>
							<p>
								MST: 0314813082 do Sở kế hoạch và đầu tư TP.HCM cấp

							</p>
							<p>
								Đại diện :Ông Đoàn Công Chung
							</p>
						</div>
						<div class="footerItemFootPlace">
							<a href="">
								<img src="img/dadangky.png">
							</a>
						</div>
					</div>
						
					
				</div>
				<div class="col-md-4 col-sm-4 ">
					<div class=" footerItem footerContact">
						<h4>THÔNG TIN LIÊN HỆ</h4>
						<div class="footerHoverBorder"></div>
						<div class="footerMainItemContent">
							<p>
								<img src="img/ic_placeholder.png">
								08.887.790.111<br>
								02.473.016.366
							</p>
							<p>
								<img src="img/ic_mail.png">
								info@ceduvn.com
							</p>
							
						</div>
						<div class="footerItemFoot">
							<a href="">
								<img src="img/ic_facebook.png">
							</a>
							<a href="">
								<img src="img/ic_g+.png">
							</a>
							<a href="">
								<img src="img/ic_ins.png">
							</a>
							<a href="">
								<img src="img/ic_youtube.png">
							</a>
						</div>
					</div>
					
				</div>
				<div class="col-md-4 col-sm-4">
					<div class=" footerItem footerInfo">
						<h4>THÔNG TIN VỀ CEDU</h4>
						<div class="footerHoverBorder"></div>
						<div class="footerMainItemContent">
							<ul>
								@foreach($about_list as $item)
								<li><a href="{{ asset('about/'.$item->about_slug.'.html') }}">{{$item->about_name}}</a></li>
								@endforeach
								{{-- <li><a href=""> Điều khoản</a></li>
								<li><a href=""> Chính sách bảo mật</a></li>
								<li><a href=""> Liên hệ hợp tác</a></li>
								<li><a href=""> Câu hỏi thường gặp</a></li> --}}
							</ul>
						</div>
						<div class="footerItemFootInfo">
							<a href="">
								<img src="img/appios.png">
							</a>
						</div>
					</div>
					
				</div>

			</div>
		</div>
		<div class="footerFoot">
			<div class="footerCopyright">
				<p>@ 2018 by CEDU All rights reserved</p>
			</div>
			<div class="foooterCart">
				<ul>
					<li><img src="img/ic_mastercard.png"></li>
					<li><img src="img/ic_paypal.png"></li>
					<li><img src="img/ic_visa.png"></li>
					<li><img src="img/ic_discover.png"></li>
					<li><img src="img/ic_baokim.png"></li>
					<li><img src="img/ic_nganluong.png"></li>
				</ul>
			</div>
		</div>
		<div class="footerFly">
			<img src="img/ic_plane_dichuyen.png">
		</div>
	</footer>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/affiliate.js"></script>
</body>
</html>