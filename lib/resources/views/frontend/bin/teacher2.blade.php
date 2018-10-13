<!DOCTYPE html>
<html>
<head>
	<title>{{$teacher->name}}</title>
	<base href="{{asset('public/layout/frontend')}}/">
	<link rel="shortcut icon" href="{{ asset('public/layout/frontend/img/BUT.png') }}">
	<meta charset="utf-8">
	<meta property="og:url" 		content="http://ceduvn.com/" />
	<meta property="fb:app_id" 		content="1577563652342523" />
	<meta property="og:title" 		content="{{$teacher->name}}" />
	<meta property="og:description" content="@yield('fb_description')" />
    <meta property="og:image" 		content="@yield('fb_image')" />
    <meta property="og:image:type" 	content="image/png">
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="300">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Serif:500|Roboto:400,500" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/teacher2.css">
</head>
<body>
	<div class="masterError">
		<div class="masterErrorContent">
			@include('errors.note')
		</div>
	</div>
	<header>
		<div class="headLogo">
			<a href="{{ asset('') }}">
				<img src="img/logoTiny.png">
			</a>
			
		</div>
		<div class="headLink">
			<a href="">
				<i class="fa fa-facebook" aria-hidden="true"></i>
			</a>
			<a href="">
				<i class="fa fa-envelope" aria-hidden="true"></i>
			</a>
			
		</div>
	</header>
	<div class="menu">
		<div class="btnMenu">
			<div class="btnMenuItem active">
				<span class="btnMenuItemContent">01</span>
				<div class="btnMenuItemLine"></div>
			</div>
			<div class="btnMenuItem">
				<span class="btnMenuItemContent">02</span>
				<div class="btnMenuItemLine"></div>
			</div>
			<div class="btnMenuItem">
				<span class="btnMenuItemContent">03</span>
				<div class="btnMenuItemLine"></div>
			</div>
			<div class="btnMenuItem">
				<span class="btnMenuItemContent">04</span>
				<div class="btnMenuItemLine"></div>
			</div>
		</div>
	</div>
	<div class="info">
		<div class="infoMain">
			<div class="infoMainAva">
				<div class="infoMainAvaMain">
					<h1>
						@switch($teacher->teacher->tea_gender)
							@case(1)
								Thầy 
								@break
							@case(2)
								Cô 
								@break
							@default
								Giáo viên 
								@break
						@endswitch
						{{$teacher->name}}
						
					</h1>
					<div class="infoMainAvaMainImg">
						<img src="{{ asset('lib/storage/app/teacher/'.$teacher->teacher->tea_img_head) }}">

					</div>
					<div class="infoMainAvaMainCard">
						<h3>Giảng viên</h3>
						<h2>{{$teacher->teacher->tea_specialize}}</h2>
					</div>	
				</div>
			</div>
			<div class="infoSlide">
				<div class="infoSlideContent">
					<div class="number">
						<span class="numContent">02</span>
						<div class="numberLine"></div>
					</div>
					<div class="slide">
						<div id="slide_intro" class="carousel slide" data-ride="carousel">
						  <div class="carousel-inner" role="listbox">
						    <div class="item active">
						    	<div class="slide_item">
						    		<h3>Thông tin về tôi</h3>
							    	<div class="inforItem">
							    		<b>
							    			<i class="fa fa-graduation-cap" aria-hidden="true"></i>
							    			Học vị: 
							    		</b>
							    		<span>{{$teacher->teacher->tea_degree}}</span>
							    	</div>
							    	<div class="inforItem">
							    		<b>
							    			<i class="fa fa-folder-open" aria-hidden="true"></i>
							    			Chuyên môn: 
							    		</b>
							    		<span>{{$teacher->teacher->tea_specialize}}</span>
							    	</div>
							    	<div class="inforItem">
							    		<b>
							    			<i class="fa fa-street-view" aria-hidden="true"></i>
							    			Nơi công tác: 
							    		</b>
							    		<span>{{$teacher->teacher->tea_work_place}}</span>
							    	</div>	
							    	<div class="inforItem">
							    		<b>
							    			<i class="fa fa-facebook-square" aria-hidden="true"></i>
								    		Facebook: 
								    	</b>
							    		<span>{{$teacher->teacher->tea_fb}}</span>
							    	</div>
							    	<div class="inforItem">
							    		<b>
							    			<i class="fa fa-envelope" aria-hidden="true"></i>
							    			Email: 
							    		</b>
							    		<span>{{$teacher->teacher->tea_email}}</span>
							    	</div>
						    	</div>
							    	
						    </div>
						    @foreach($teacher->teacher->story as $item)
						    <div class="item">
						      	<div class="slide_item">
						    		<h3>{{$item->sto_title}}</h3>
							    	{!!$item->sto_content!!}
						    	</div>
						    </div>
						    @endforeach
						  </div>
						  <div class="btnControl">
						  	<a href="#slide_intro" role="button" data-slide="prev" class="left">
						  		<img src="img/next_arrow copy.png">
						  	</a>
						  	<a href="#slide_intro" role="button" data-slide="next" class="right">
						  		<img src="img/next_arrow.png">
						  	</a>
						  </div>
						</div>
					</div>
				</div>
				<div class="infoSlideImg">
					<div class="infoSlideImgCard">
						Thông tin của tôi
					</div>
					<img src="{{ asset('lib/storage/app/teacher/'.$teacher->teacher->tea_img_foot) }}">
				</div>
			</div>
		</div>
	</div>
	<div class="enter01">
	</div>
	<div class="line01">
	</div>
	<div class="enter02">
	</div>

	<div class="rate_course">
		<div class="rate">
			<div class="rateBig">
				<h3>Đánh giá của học viên</h3>
				<div class="rateBigMain">

					@if($rate != null)
						@switch($rate->tr_rate)
							@case(1)
								<img src="img/khongnen.png">
								<p>Không nên học nha</p>
								@break
							@case(2)
								<img src="img/dando.png">
								<p>Đắn đo quá</p>
								@break
							@case(3)
								<img src="img/cungduoc.png">
								<p>Cũng được đó</p>
								@break
							@case(4)
								<img src="img/haylamdo.png">
								<p>Hay lắm luôn</p>
								@break
							@default
								<img src="img/xuatsac.png">
								<p>Quá xuất sắc luôn</p>
								@break
						@endswitch
					@else
						<img src="img/xuatsac.png">
						<p>Thầy dạy xuất xắc</p>
					@endif
					
				</div>
				<div class="number">
					<span class="numContent">03</span>
					<div class="numberLine"></div>
				</div>
			</div>
			<div class="rateContent">
				<div class="rateContentItem">
					<a href="{{ asset('teacher/'.$teacher->email.'/5') }}" class="rateContentItemImg">
						<img src="img/xuatsac.png">
					</a>
					
					
					<p>Xuất sắc</p>
				</div>
				<div class="rateContentItem">
					<a href="{{ asset('teacher/'.$teacher->email.'/4') }}" class="rateContentItemImg">
						<img src="img/haylamdo.png">
					</a>
					<p>Hay lắm đó</p>
				</div>
				<div class="rateContentItem">
					<a href="{{ asset('teacher/'.$teacher->email.'/3') }}" class="rateContentItemImg">
						<img src="img/cungduoc.png">
					</a>
					<p>Cũng được</p>
				</div>
				<div class="rateContentItem">
					<a href="{{ asset('teacher/'.$teacher->email.'/2') }}" class="rateContentItemImg">
						<img src="img/dando.png">
					</a>
					<p>Đắn đo</p>
				</div>
				<div class="rateContentItem">
					<a href="{{ asset('teacher/'.$teacher->email.'/1') }}" class="rateContentItemImg">
						<img src="img/khongnen.png">
					</a>
					<p>Không nên học</p>
				</div>
			</div>
		</div>
		<div class="border"></div>
		<div class="course">
			<h3>Khóa học của tôi</h3>
			<div class="courseImg">
				<img src="{{ asset('lib/storage/app/teacher/'.$teacher->teacher->tea_img_foot) }}">
			</div>
			<div class="courseLeft">
				<div class="number">
					<span class="numContent">04</span>
					<div class="numberLine"></div>
				</div>
				<div id="slide_course" class="carousel slide" data-ride="carousel">
				  <ol class="carousel-indicators slide_dot">
				  	<?php $i = 0?>
				  	@foreach($teacher->course as $item)
				    <li data-target="#slide_course" data-slide-to="{{$i}}"></li>
				    <?php $i++?>
				    @endforeach
				    
				  </ol>

				  <div class="carousel-inner" role="listbox">
				  	
				  	@foreach($teacher->course as $item)
				    <div class="item">
				    	<a href="{{ asset('courses/detail/'.$item->cou_slug.'.html') }}" class="slide_item">
				    		<div class="coursePrice">
				    			{{number_format($item->cou_price,0,',','.')}} đ
				    		</div>
				    		<div class="slideCourseImg">
				    			<img src="{{ asset('lib/storage/app/course/'.$item->cou_img) }}">
				    		</div>
				    		{{-- <div class="courseContent">
				    			Luyện thi trung học phổ thông quốc gia
				    		</div> --}}
				    	</a>
				    </div>
				    @endforeach
				    
				  </div>
				  <div class="btnControl">
				  	<a href="#slide_course" role="button" data-slide="prev" class="left">
				  		<i class="fa fa-angle-left" aria-hidden="true"></i>
				  	</a>
				  	<a href="#slide_course" role="button" data-slide="next" class="right">
				  		<i class="fa fa-angle-right" aria-hidden="true"></i>
				  	</a>
				  </div>
				  
				</div>
			</div>
		</div>
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
	<script type="text/javascript" src="js/teacher2.js"></script>
</body>
</html>