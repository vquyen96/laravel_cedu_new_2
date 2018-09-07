@extends('frontend.master')
@section('title','Danh sách khóa học')
@section('fb_title','Top khóa học hàng đầu')
@section('fb_description','Nơi cung cấp cho bạn những khóa học tốt nhất, rẻ nhất. Tạo lên một môi trường học tập trên cuộc cách mạng công nghệ 4.0')
@section('fb_image',asset('public/layout/frontend/img/dayne-topkin-60559-unsplash.png'))
@section('main')
<link rel="stylesheet" href="css/owlcarousel/owl.carousel.min.css">
<link rel="stylesheet" href="css/owlcarousel/owl.theme.default.min.css">
<link rel="stylesheet" type="text/css" href="css/user/course.css">
<link href="http://vjs.zencdn.net/6.6.3/video-js.css" rel="stylesheet">
<div class="header_main">
	<div class="header_main_body">
		<a href="{{ asset('user/course_doing') }}" class="header_main_item {{ Request::segment(2) == 'course_doing' ? 'active' : '' }}">
			Khóa học chưa hoàn thành
		</a>
		<a href="{{ asset('user/course_done') }}" class="header_main_item {{ Request::segment(2) == 'course_done' ? 'active' : '' }}">
			Khóa học hoàn thành
		</a>
	</div>

</div>
<div class="instruction">
	
	<div class="instruction_body">
		<a href="{{ asset('') }}" class="instruction_item">
			Trang chủ
		</a>
		<a class="instruction_item">
			>
		</a>
		<a href="{{ asset('user') }}" class="instruction_item">
			Tài khoản
		</a>
		<a class="instruction_item">
			>
		</a>
		<a href="{{ asset('user/'.Request::segment(2)) }}" class="instruction_item">
			Khóa học hoàn thành
		</a>
		{{-- <a class="instruction_item">
			>
		</a> --}}
	</div>
</div>
<div class="main_body">
	<div class="container">
		
		<div class="row">
			<div class="col-md-12">
				<div class="courseBodyTitle">
					<h2>Khóa học hoàn thành</h2>
					<div class="courseBodyTitleContent">
						Chúng tôi cung cấp cho các bạn những khoá học đa dạng và chất lượng nhất
					</div>
				</div>
				<div class="courseBodyMain">
					
				</div>
			</div>
		</div>
		<div class="row courseDone">
			@foreach($course as $item)
				<div class="col-md-4">
					<a href="{{ asset('courses/detail/'.$item->cou_slug.'.html') }}" class="courseMainItem">
						<div class="courseMainItemImg" style="background: url('{{ asset('lib/storage/app/course/'.$item->cou_img) }}') no-repeat center /cover;">
							
							<div class="courseMainItemGroup_Time">
								<div class="courseMainItemGroup">
									{{ $item->group->gr_name }}
								</div>
								<div class="courseMainItemTime">
									Update {{date_format($item->updated_at,"m/Y")}}
								</div>
								{{-- <span class="courseMainItemTime">
									<i class="fa fa-circle" aria-hidden="true"></i>
									@if ($item->cou_price_old != null)
										<del>{{number_format($item->cou_price_old,0,',','.')}} đ</del>
									@endif
									
								</span> --}}
								
							</div>
							
						</div>
						<div class="courseMainItemName">
							{{cut_string($item->cou_name , 100)}}
						</div>
						<div class="courseMainItemTeacher">
							<div class="courseMainItemTeacherAva" style="background: url('{{ asset('lib/storage/app/avatar/resized-'.$item->tea->img) }}') no-repeat center /cover;">
							</div>
							<div class="courseMainItemTeacherName">
								{{ $item->tea->name }}
							</div>
							<div class="courseMainItemStar">
								@for($i=0;$i<5;$i++)
									@if($item->cou_star > $i)
										<i class="fa fa-star starActive" aria-hidden="true"></i>
									@else
										<i class="fa fa-star" aria-hidden="true"></i>
									@endif
								@endfor
							</div>
						</div>
					</a>
				</div>
			
			@endforeach
			<div class="col-md-12">
				{!! $course->links('layout.paginate') !!}	
			</div>
		</div>
		
		<div class="row courseCare">
			<div class="col-md-12">
				<div class="courseCareTitle">
					<h2>Khóa học bạn có thể quan tâm</h2>
					<div class="courseCareTitleContent">
						Chúng tôi cung cấp cho các bạn những khoá học đa dạng và chất lượng nhất
					</div>
				</div>
				<div class="courseCareMain">
					<div class="owl-carousel owl-theme carouselCourse">
						@foreach($course_care as $item)
						
							<div class="item">
								<a href="{{ asset('courses/detail/'.$item->cou_slug.'.html') }}" class="courseMainItem">
									<div class="courseMainItemImg" style="background: url('{{ asset('lib/storage/app/course/'.$item->cou_img) }}') no-repeat center /cover;">
										@if ($item->cou_sale != 0)
											<div class="courseMainItemSale">
												{{$item->cou_sale}}%
											</div>
											
										@endif
										<div class="courseMainItemPrice">
											{{number_format($item->cou_price,0,',','.')}}
											<span class="courseMainItemTime">
												<i class="fa fa-circle" aria-hidden="true"></i>
												@if ($item->cou_price_old != null)
													<del>{{number_format($item->cou_price_old,0,',','.')}} đ</del>
												@endif
												{{-- {{time_format($item->updated_at)}} --}}
											</span>
											
										</div>
										
									</div>
									<div class="courseMainItemName">
										{{cut_string($item->cou_name , 100)}}
									</div>
									<div class="courseMainItemTeacher">
										<div class="courseMainItemTeacherAva" style="background: url('{{ asset('lib/storage/app/avatar/resized-'.$item->tea->img) }}') no-repeat center /cover;">
										</div>
										<div class="courseMainItemTeacherName">
											{{ $item->tea->name }}
										</div>
										<div class="courseMainItemStar">
											@for($i=0;$i<5;$i++)
												@if($item->cou_star > $i)
													<i class="fa fa-star starActive" aria-hidden="true"></i>
												@else
													<i class="fa fa-star" aria-hidden="true"></i>
												@endif
											@endfor
										</div>
									</div>
								</a>
							</div>
						
						@endforeach
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<a href="{{ asset('course') }}" class="btnSeeMore">
					Xem thêm các khóa học
				</a>
			</div>
		</div>
	</div>
</div>
@stop
@section('script')
	<script src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/user/course_doing.js"></script>
	<script src="http://vjs.zencdn.net/6.6.3/video.js"></script>
@stop