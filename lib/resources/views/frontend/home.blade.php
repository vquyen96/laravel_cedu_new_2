@extends('frontend.master')
@section('title','Trang chủ')
@section('fb_title','Top khóa học hàng đầu')
@section('fb_description','Nơi cung cấp cho bạn những khóa học tốt nhất, rẻ nhất. Tạo lên một môi trường học tập trên cuộc cách mạng công nghệ 4.0')
@section('fb_image',asset('public/layout/frontend/img/dayne-topkin-60559-unsplash.png'))
@section('main')
<link rel="stylesheet" type="text/css" href="css/home2.css">
<div>
	<div class="bannerHead">
		<div id="slide_banner_head" class="carousel slide" data-ride="carousel">
		  

		  <div class="carousel-inner" role="listbox">
		  	
		    @foreach($bannerHead as $item)
		    <div class="item">
		      	<div class="slide_item">
		      		<a href="{{ asset($item->ban_link) }}">
		      			<img src="{{ asset('lib/storage/app/banner/'.$item->ban_img) }}">
		      		</a>
		    	</div>
		    </div>
		    @endforeach
		    
		  </div>
		</div>
	</div>
	<div class="menuGroup">

		<div class="menuGroupMain">
			<div class="menuGroupLine">
				@foreach ($groups as $item)
				<a href="{{asset('group/'.$item->gr_slug.'.html')}}" class="menuGroupItem">
					<div class="menuGroupItemIcon">
						<img src="{{asset('lib/storage/app/group/'.$item->gr_img)}}">
					</div>
					<div class="menuGroupItemContent">
						{{$item->gr_name}}
					</div>
				</a>
				@endforeach
				
			</div>
		</div>
		<div class="menuGroupBtn">
			
			<div class="menuGroupBtnItem Right">
				<i class="fa fa-angle-right" aria-hidden="true"></i>
			</div>
			<div class="menuGroupBtnItem Left">
				<i class="fa fa-angle-left" aria-hidden="true"></i>
			</div>
		</div>
	</div>
	<div class="title">
		<div class="titleMain left">
			<div class="titleMainBody">
				Khóa học
			</div>
		</div>
	</div>
	<div class="homeCourse">
		{{-- <div class="homeCourseTitle">
			<div class="homeCourseTitleLeft txt64">01.</div>
			<div class="homeCourseTitleRight">Khóa học</div>
		</div> --}}
		<div class="homeCourseMainTitle">
			<div class="homeCourseMainTitleItem follow">
				Được quan tâm nhất
			</div>
			<div class="homeCourseMainTitleItem new">
				Mới ra mắt nhất
			</div>
			<div class="homeCourseMainTitleItem rate">
				Đánh giá cao nhất
			</div>
			<div class="homeCourseMainTitleBorder"></div>
		</div>
		<div class="homeCourseMain">
			<div class="homeCourseMainline">
				@foreach ($coursefollow as $item)
				<a href="{{ asset('courses/detail/'.$item->cou_slug.'.html') }}" class="homeCourseMainItem">
					<div class="homeCourseMainItemImg">
						<img src="{{ asset('lib/storage/app/course/resized-'.$item->cou_img) }}">
					</div>
					@if ($item->cou_sale != 0)
						<div class="homeCourseMainItemSale">
							-{{$item->cou_sale}}%
						</div>
					@endif
					<div class="homeCourseMainItemContent">
						<div class="homeCourseMainItemContentTea">
							<img src="{{ asset('lib/storage/app/avatar/resized-'.$item->tea->img) }}">
							{{$item->tea->name}}
							<div class="homeCourseMainItemContentStar">
								@for($i=0;$i<5;$i++)
									@if($item->cou_star > $i)
										<i class="fa fa-star starActive" aria-hidden="true"></i>
									@else
										<i class="fa fa-star" aria-hidden="true"></i>
									@endif
								@endfor
							</div>
						</div>
						
						<div class="homeCourseMainItemContentCourse">
							{{cut_string($item->cou_name , 80)}}
						</div>
						<div class="homeCourseMainItemContentPrice">
							<b> {{number_format($item->cou_price,0,',','.')}} đ </b>
							@if ($item->cou_price_old != null)
								<del>{{number_format($item->cou_price_old,0,',','.')}} đ</del>
							@endif
							
						</div>
					</div>
				</a>
				@endforeach
				@foreach ($coursenew as $item)
				<a href="{{ asset('courses/detail/'.$item->cou_slug.'.html') }}" class="homeCourseMainItem">
					<div class="homeCourseMainItemImg">
						<img src="{{ asset('lib/storage/app/course/resized-'.$item->cou_img) }}">
					</div>
					@if ($item->cou_sale != 0)
						<div class="homeCourseMainItemSale">
							-{{$item->cou_sale}}%
						</div>
					@endif
					<div class="homeCourseMainItemContent">
						<div class="homeCourseMainItemContentTea">
							<img src="{{ asset('lib/storage/app/avatar/resized-'.$item->tea->img) }}">
							{{$item->tea->name}}
							<div class="homeCourseMainItemContentStar">
								@for($i=0;$i<5;$i++)
									@if($item->cou_star > $i)
										<i class="fa fa-star starActive" aria-hidden="true"></i>
									@else
										<i class="fa fa-star" aria-hidden="true"></i>
									@endif
								@endfor
							</div>
						</div>
						
						<div class="homeCourseMainItemContentCourse">
							{{cut_string($item->cou_name , 80)}}
						</div>
						<div class="homeCourseMainItemContentPrice">
							<b> {{number_format($item->cou_price,0,',','.')}} đ </b>
							@if ($item->cou_price_old != null)
								<del>{{number_format($item->cou_price_old,0,',','.')}} đ</del>
							@endif
							
						</div>
					</div>
				</a>
				@endforeach
				@foreach ($courserate as $item)
				<a href="{{ asset('courses/detail/'.$item->cou_slug.'.html') }}" class="homeCourseMainItem">
					<div class="homeCourseMainItemImg">
						<img src="{{ asset('lib/storage/app/course/resized-'.$item->cou_img) }}">
					</div>
					@if ($item->cou_sale != 0)
						<div class="homeCourseMainItemSale">
							-{{$item->cou_sale}}%
						</div>
					@endif
					<div class="homeCourseMainItemContent">
						<div class="homeCourseMainItemContentTea">
							<img src="{{ asset('lib/storage/app/avatar/resized-'.$item->tea->img) }}">
							{{$item->tea->name}}
							<div class="homeCourseMainItemContentStar">
								@for($i=0;$i<5;$i++)
									@if($item->cou_star > $i)
										<i class="fa fa-star starActive" aria-hidden="true"></i>
									@else
										<i class="fa fa-star" aria-hidden="true"></i>
									@endif
								@endfor
							</div>
						</div>
						
						<div class="homeCourseMainItemContentCourse">
							{{cut_string($item->cou_name , 80)}}
						</div>
						<div class="homeCourseMainItemContentPrice">
							<b> {{number_format($item->cou_price,0,',','.')}} đ </b>
							@if ($item->cou_price_old != null)
								<del>{{number_format($item->cou_price_old,0,',','.')}} đ</del>
							@endif
							
						</div>
					</div>
				</a>
				@endforeach
			</div>
		</div>
	</div>

	<div class="banner">
		<div class="bannerLeftTop">
			<div id="carousel_left_top" class="carousel slide" data-ride="carousel">
			  <div class="carousel-inner" role="listbox">
			    @foreach($bannerLeftTop as $item)
			    <div class="item">
			      	<div class="slide_item">
			      		<a href="{{ asset($item->ban_link) }}">
			      			<img src="{{ asset('lib/storage/app/banner/'.$item->ban_img) }}">
			      		</a>
			    	</div>
			    </div>
			    @endforeach
			  </div>
			</div>
		</div>
		<div class="bannerLeftBot">
			<div id="carousel_left_bot" class="carousel slide" data-ride="carousel">
			  <div class="carousel-inner" role="listbox">
			    @foreach($bannerLeftBot as $item)
			    <div class="item">
			      	<div class="slide_item">
			      		<a href="{{ asset($item->ban_link) }}">
			    			<img src="{{ asset('lib/storage/app/banner/'.$item->ban_img) }}">
			    		</a>
			    	</div>
			    </div>
			    @endforeach
			  </div>
			</div>
		</div>
		<div class="bannerRight">
			<div id="carousel_right" class="carousel slide" data-ride="carousel">
			  <div class="carousel-inner" role="listbox">
			    @foreach($bannerRight as $item)
			    <div class="item">
			      	<div class="slide_item">
			      		<a href="{{ asset($item->ban_link) }}">
			    			<img src="{{ asset('lib/storage/app/banner/'.$item->ban_img) }}">
			    		</a>
			    	</div>
			    </div>
			    @endforeach
			  </div>
			</div>
		</div>
	</div>
	<div class="title">
		<div class="titleMain right">
			<div class="titleMainBody">
				Nổi bật trong tháng
			</div>
		</div>
		<div class="featuredTitleBtn">
			<div class="featuredTitleMainBtnItem left">
				<i class="fa fa-angle-left" aria-hidden="true"></i>
			</div>
			<div class="featuredTitleMainBtnItem right">
				<i class="fa fa-angle-right" aria-hidden="true"></i>
			</div>
		</div>
	</div>
	<div class="featured">
		{{-- <div class="featuredTitle">
			
			<div class="featuredTitleBtn">
				<div class="featuredTitleMainBtnItem left">
					<i class="fa fa-angle-left" aria-hidden="true"></i>
				</div>
				<div class="featuredTitleMainBtnItem right">
					<i class="fa fa-angle-right" aria-hidden="true"></i>
				</div>
			</div>
		</div> --}}
		<div class="featuredMain">
			<div class="featuredMainLine">
				<?php $i = 0?>
				@foreach ($courseFeatured as $item)
				<a href="{{ asset('courses/detail/'.$item->cou_slug.'.html') }}" class="featuredMainItem">
					<div class="featuredMainItemImg">
						@if ($i == 0)
							<img src="{{ asset('lib/storage/app/course/'.$item->cou_img) }}">
						@else
							<img src="{{ asset('lib/storage/app/course/resized-'.$item->cou_img) }}">
						@endif
						
					</div>
					@if ($item->cou_sale != 0)
						<div class="featuredMainItemSale">
							-{{$item->cou_sale}}%
						</div>
					@endif
					<div class="featuredMainItemContent">
						<div class="featuredMainItemContentTea">
							<img src="{{ asset('lib/storage/app/avatar/resized-'.$item->tea->img) }}">
							{{$item->tea->name}}
							<div class="featuredMainItemContentStar">
								@for($i=0;$i<5;$i++)
									@if($item->cou_star > $i)
										<i class="fa fa-star starActive" aria-hidden="true"></i>
									@else
										<i class="fa fa-star" aria-hidden="true"></i>
									@endif
								@endfor
							</div>
						</div>
						
						<div class="featuredMainItemContentCourse">
							{{$item->cou_name}}
						</div>
						<div class="featuredMainItemContentPrice">
							<b> {{number_format($item->cou_price,0,',','.')}} đ </b>
							@if ($item->cou_price_old != null)
								<del>{{number_format($item->cou_price_old,0,',','.')}} đ</del>
							@endif
						</div>
					</div>
				</a>
				<?php $i++;?>
				@endforeach
			</div>
		</div>
		
	</div>
	<div class="title">
		<div class="titleMain left">
			<div class="titleMainBody">
				Giáo viên tiêu biểu
			</div>
		</div>
	</div>
	<div class="teacher">
		{{-- <div class="teacherTitle">
			<div class="teacherTitleMain">
				<div class="teacherTitleMainLeft txt64">
					03.
				</div>
				<div class="teacherTitleMainRight">
					Giáo viên tiêu biểu
				</div>
			</div>
		</div> --}}
		<div class="teacherMain">
			<div class="teacherMainBtn">
				<div class="teacherMainBtnItem right">
					<i class="fa fa-angle-right" aria-hidden="true"></i>
				</div>
				<div class="teacherMainBtnItem left">
					<i class="fa fa-angle-left" aria-hidden="true"></i>
				</div>
				
			</div>
			<div class="teacherMainContainer">
				<div class="teacherMainLine">
					@foreach ($teacher as $item)
					<a href="{{ asset('teacher/'.$item->acc->email) }}" class="teacherMainItem">
						<div class="teacherMainItemBorder"></div>
						<div class="teacherMainItemImg">
							<img src="{{ asset('lib/storage/app/avatar/resized-'.$item->acc->img) }}">
						</div>
						<div class="teacherMainItemContent">
							<p>Giảng viên</p>
							<div class="teacherMainItemContentName">
								{{$item->acc->name}}
							</div>
							<div class="teacherMainItemContentText">
								{!!cut_string($item->acc->content, 200)!!}
							</div>
						</div>
					</a>
					@endforeach
				</div>
			</div>
			
		</div>
	</div>
	<div class="title">
		<div class="titleMain right">
			<div class="titleMainBody">
				Điểm nổi bật của Cedu
			</div>
		</div>
	</div>
	<div class="cedu">
		{{-- <div class="ceduTitle">
			<div class="ceduTitleMain">
				<div class="ceduTitleMainLeft txt64">
					04.
				</div>
				<div class="ceduTitleMainRight">
					Điểm nổi bật của Cedu
				</div>
			</div>
		</div> --}}
		<div class="ceduMain">
			<div class="ceduMainItem">
				<div class="ceduMainItemIcon">
					<img src="img/Group 8.png">
				</div>
				<div class="ceduMainItemTitle">
					Giáo dục theo nên công nghệ 4.0
				</div>
				<div class="ceduMainItemBorder">
				</div>
				<div class="ceduMainItemContent">
					CEDU tự hào là một trong mô hình giáo dục 4.0 mang lại cho khách hàng những trải nghiệm thú vị ,kiến thức phong phú nhất. 
				</div>
			</div>
			<div class="ceduMainItem">
				<div class="ceduMainItemIcon">
					<img src="img/Group 12.png">
				</div>
				<div class="ceduMainItemTitle">
					Luôn có đội ngũ giảng viên hỗ trợ nhiệt tình
				</div>
				<div class="ceduMainItemBorder">
				</div>
				<div class="ceduMainItemContent">
					CEDU sẽ cùng đội ngũ giảng viên hỗ trợ những thắc mắc mà bạn gặp phải trong các khóa học 
				</div>
			</div>
			<div class="ceduMainItem">
				<div class="ceduMainItemIcon">
					<img src="img/Group 13.png">
				</div>
				<div class="ceduMainItemTitle">
					Luôn đặt chất lượng lên hàng đầu
				</div>
				<div class="ceduMainItemBorder">
				</div>
				<div class="ceduMainItemContent">
					Luôn đặt chất lượng khóa học lên hàng đầu chính vì thế giảng viên của CEDU đều là những chuyên gia nổi tiếng trong các lĩnh vực : luyện thi,kĩ năng mềm, marketing, kĩ thuật, ….. 
				</div>
			</div>
			<div class="ceduMainItem">
				<div class="ceduMainItemIcon">
					<img src="img/Group 14.png">
				</div>
				<div class="ceduMainItemTitle">
					Thời gian học chủ động và Linh hoạt
				</div>
				<div class="ceduMainItemBorder">
				</div>
				<div class="ceduMainItemContent">
					Tại CEDU thời gian học của bạn sẽ được linh động mọi lúc mọi nơi. Bạn chỉ cần đăng nhập và click vào khóa học bạn muốn 
				</div>
			</div>
		</div>
	</div>
</div>
	
@stop	
@section('script')
<script type="text/javascript" src="js/home2.js"></script>
@stop