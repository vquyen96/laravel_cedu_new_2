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
						<div class="mb-2">{!! $web_info->content_left_top_1 !!}</div>
						<div class="mb-2">{!! $web_info->content_left_top_2 !!}</div>
						<div class="mb-2">{!! $web_info->content_left_top_3 !!}</div>
						<div class="mb-2">{!! $web_info->content_left_top_4 !!}</div>
						<div class="mb-2">{!! $web_info->content_left_top_5 !!}</div>
					</div>
					<div class="footerLeftCopyRight">
						{{ $web_info->content_left_bot }}
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
							{{ $web_info->branch_sg }}
						</div>
					</div>
					<div class="footerMidContent">
						<span class="footerContentIcon">
						 	<i class="fas fa-map-marker-alt"></i>
						</span>
						<div class="footerContentBody">
							{{ $web_info->branch_hn }}
						</div>
					</div>
					<div class="footerMidContent">
						<span class="footerContentIcon">
						 	<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
						<div class="footerContentBody">
							{{ $web_info->hotline }}
						</div>
					</div>
					<div class="footerMidContent">
						<span class="footerContentIcon">
						 	<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
						<div class="footerContentBody">
							{{ $web_info->email }}
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
{{--<div class="footerBot">--}}
	{{--<div class="container">--}}
		{{--<div class="row">--}}
			{{--<div class="col-md-12">--}}
				{{--<div class="footerBotContent">--}}
					{{--Made with  &  in Bentonville, Boston, Joplin, Seattle, and Vergennes.Made with  &  in Bentonville, Boston, Joplin, Seattle, and Vergennes.--}}
				{{--</div>--}}
			{{--</div>--}}
		{{--</div>--}}
	{{--</div>--}}
{{--</div>--}}