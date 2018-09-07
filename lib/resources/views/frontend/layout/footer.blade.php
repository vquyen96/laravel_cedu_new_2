<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="footerLeft">
					<div class="footerLeftTop">
						<a href="{{ asset('') }}" class="footerLeftTopLogo">
							<img src="img/LOGO_CEDU1.png">
						</a>
						<div class="footerLeftTopLang">
							<select class="form-control">
								<option value="en">English</option>
								<option value="vi">Tiếng Việt</option>
							</select>
						</div>
					</div>
					<div class="footerLeftBot">
						Teach what you love. Cedu gives you the tools to create an online cou. Cedu gives you the tools to create an online course.
					</div>
					<div class="footerLeftCopyRight">
						Copyright © 2018 Cedu, Inc.
					</div>
					
				</div>
			</div>
			<div class="col-md-1 col-sm-12 col-xs-12"></div>
			<div class="col-md-4 col-sm-7 col-xs-12">
				<div class="footerMid">
					<div class="footerTitle">
						Contact
					</div>
					<div class="footerMidContent">
						<span class="footerContentIcon">
						 	<i class="fas fa-map-marker-alt"></i>
						</span>
						<div class="footerContentBody">
							Tầng 2, 5, 6 CPHONE Tower, Số 456 Xô Viết Nghệ Tĩnh, P25, Q Bình Thạnh, HCM
						</div>
					</div>
					<div class="footerMidContent">
						<span class="footerContentIcon">
						 	<i class="fas fa-map-marker-alt"></i>
						</span>
						<div class="footerContentBody">
							Tầng 5, Tòa Nhà Diamond Flower, Số 1 Hoàng Đạo Thúy, Thanh Xuân, Hà Nội
						</div>
					</div>
					<div class="footerMidContent">
						<span class="footerContentIcon">
						 	<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
						<div class="footerContentBody">
							1900.633.972    |       08.887.790.111
						</div>
					</div>
					<div class="footerMidContent">
						<span class="footerContentIcon">
						 	<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
						<div class="footerContentBody">
							info@ceduvn.com
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-1 col-sm-12 col-xs-12"></div>
			<div class="col-md-2 col-sm-5 col-xs-12">
				<div class="footerRight">
					<div class="footerTitle">
						Thông tin
					</div>
					@foreach($about_list as $item)
						<div class="footerRightContent">
							<a href="{{ asset('about/'.$item->about_slug.'.html') }}" class="footerContentBody">
								{{$item->about_name}}
							</a>
						</div>
						
					@endforeach
					
				</div>
			</div>
		</div> 
		
	</div>
</footer>
<div class="footerBot">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="footerBotContent">
					Made with  &  in Bentonville, Boston, Joplin, Seattle, and Vergennes.Made with  &  in Bentonville, Boston, Joplin, Seattle, and Vergennes.
				</div>
			</div>
		</div>
	</div>
</div>