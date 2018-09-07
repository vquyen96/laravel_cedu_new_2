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
	<link rel="stylesheet" type="text/css" href="css/teacher3.css">
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
				<img src="img/logoTiny.png">
			</a>
		</div>
		<div class="headerBorder">
		</div>
		<div class="headerCircleBig"></div>
		<div class="headerCircleSmail"></div>
		<div class="headerText">
			01
		</div>
		<div class="headerAva">
			<img src="{{ asset('lib/storage/app/teacher/'.$teacher->teacher->tea_img_head) }}">
		</div>
		<div class="headerBorderTiny"></div>
		<div  class="headerContent">
			<p class="txt36">
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
			</p>
			<p class="txt48">
				{{$teacher->name}}
			</p>
			<p class="txt36">
				{{$teacher->teacher->tea_specialize}}
			</p>
		</div>
	</div>
	<div class="folow">
		<div class="folowItem">
			<p class="txt36">{{number_format($teacher->teacher->tea_follow,0,',','.')}} +</p>
			<p class="txt24">Học viên theo dõi</p>
		</div>
		<div class="folowItem">
			<p class="txt36">{{number_format($teacher->teacher->tea_lesson,0,',','.')}} +</p>
			<p class="txt24">Bài giảng online</p>
		</div>
		<div class="folowItem">
			<p class="txt36">{{number_format($teacher->teacher->tea_exp,0,',','.')}} +</p>
			<p class="txt24">Năm kinh nghiệm</p>
		</div>

	</div>
	<div class="info">
		<div class="infoAva">
			<img src="{{ asset('lib/storage/app/teacher/'.$teacher->teacher->tea_img_foot) }}">
		</div>
		<div class="infoCircleLeft"></div>
		<div class="infoText">02</div>
		<div class="infoSlide">
			<div id="slide_intro" class="carousel slide" data-ride="carousel">
			  <div class="carousel-inner" role="listbox">
			    <div class="item active">
			    	<div class="slide_item">
			    		<p class="txt36"><b>Thông tin về tôi</b></p>
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
			    		<p class="txt36" ><b>{{$item->sto_title}}</b></p>
				    	{!!$item->sto_content!!}
			    	</div>
			    </div>
			    @endforeach
			    
			  </div>
			  <div class="btnControl">
			  	<a href="#slide_intro" role="button" data-slide="prev" class="left">
			  		<i class="fa fa-long-arrow-left" aria-hidden="true"></i>
			  	</a>
			  	<a href="#slide_intro" role="button" data-slide="next" class="right">
			  		<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
			  	</a>
			  </div>
			</div>
		</div>
		<div class="infoCircleRight"></div>	
	</div>
	<div class="rate">
		<div class="rateText">
			03
		</div>
		<div class="rateLeft">
			<p class="txt36">Đánh giá của học viên</p>
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
		<div class="rateRight">
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
		<div class="rateCircleRight">
			
		</div>
	</div>
	<div class="course">
		<p class="txt36">Khóa học của tôi</p>
		<div class="courseText">04</div>
		<div class="courseMain">
			<div class="courseMainImg">
				<img src="{{ asset('lib/storage/app/teacher/'.$teacher->teacher->tea_img_foot) }}">
			</div>
			<div class="courseMainSlide">
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
				    		<div class="courseImg">
				    			<img src="{{ asset('lib/storage/app/course/'.$item->cou_img) }}">
				    		</div>
				    		
				    	</a>
				    </div>
				    @endforeach
				    
				  </div>
				  {{-- <div class="btnControl">
				  	<a href="#slide_course" role="button" data-slide="prev" class="left">
				  		<i class="fa fa-long-arrow-left" aria-hidden="true"></i>
				  	</a>
				  	<a href="#slide_course" role="button" data-slide="next" class="right">
				  		<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
				  	</a>
				  </div> --}}
				</div>  
			</div>
		</div>
		<div class="courseCircleLeft"></div>
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
	<script type="text/javascript" src="js/teacher3.js"></script>
</body>
</html>