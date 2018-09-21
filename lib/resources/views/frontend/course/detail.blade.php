@extends('frontend.master')
@section('title', $course->cou_name)
@section('fb_title', $course->cou_name)
@section('fb_description', cut_string($course->cou_summary, 200))
@section('fb_image', asset('lib/storage/app/course/'.$course->cou_img))
@section('main')
<link rel="stylesheet" href="css/owlcarousel/owl.carousel.min.css">
<link rel="stylesheet" href="css/owlcarousel/owl.theme.default.min.css">
<link rel="stylesheet" type="text/css" href="css/course/detail.css">

<div class="instruction">

	<div class="instruction_body">
		<a href="{{ asset('courses') }}" class="instruction_item">
			Khóa học
		</a>
		<a class="instruction_item">
			>
		</a>
		<a href="{{ asset('courses') }}" class="instruction_item">
			Ngoại ngữ
		</a>
		<a class="instruction_item">
			>
		</a>
		<a href="{{ asset('courses/detail/'.Request::segment(3)) }}" class="instruction_item">
			{{ $course->cou_name }}
		</a>
		{{-- <a class="instruction_item">
			>
		</a> --}}
	</div>
	
</div>
<div class="cou_slug d-none">{{ Request::segment(3) }}</div>
<div class="main_body">
	<div class="container">
		<div class="row flex-mobile">
			<div class="col-md-7 col-sm-7">
				<div class="courseTitle">
					<h1>{{ $course->cou_name }}</h1>
					<div class="courseTitleContent">
						The only course you need to learn web development - HTML, CSS, JS, Node, and More and More!!!
					</div>
				</div>
				<div class="courseRate">
					<div class="courseRateStar">
						@for($i=0;$i<5;$i++)
							<i class="fa fa-star {{ $course->cou_star > $i ? 'starActive' : '' }} " aria-hidden="true"></i>
						@endfor
					</div>
					<div class="courseRateContent">
						{{ number_format($course->cou_star, 1, '.', ',') }} ( {{ $course->rating->count() }} người bình chọn)
					</div>
				</div>
				<div class="courseInfo">
					{{ $course->cou_video }} bài
					<i class="fa fa-circle" aria-hidden="true"></i> 
					{{ gmdate("H:i", $course->cou_video_duration)}}p 
					<i class="fa fa-circle" aria-hidden="true"></i>
					{{time_format($course->updated_at)}}
					<i class="fa fa-circle" aria-hidden="true"></i>
					{{level_format($course->cou_level)}}
				</div>
				{{-- <div class="courseBenefit">
					<div class="courseBenefitTitle">
						Bạn sẽ được học những gì?
					</div>
					<div class="courseBenefitMain">
						<div class="row">
							@for($i = 0; $i < 5; $i++)
								<div class="col-md-6">
									<div class="courseBenefitMainItem">
										<div class="courseBenefitMainItemIcon">
											<i class="fas fa-check"></i>
										</div>
										<div class="courseBenefitMainItemContent">
											Kỹ năng viết của iltes
										</div>
									</div> 										
								</div>
							@endfor
						</div>
							
					</div>
				</div> --}}
				<div class="lesson">
					<div class="lessonTitle">
						<h2>Cấu trúc bài giảng</h2>
						<div class="numOfLesson">
							356 bài giảng
						</div>
						<div class="timeOfLesson">
							{{gmdate("H:i:s", $course->cou_video_duration)}}
						</div>
					</div>
					<div class="lessonMain">
						<?php $video = 0 ?>
						@foreach($course->part as $item)
							<div class="lessonMainItem">
								<div class="lessonMainPart">
									<div class="lessonMainPartIcon">
										<i class="fas fa-minus"></i>
										<i class="fas fa-minus"></i>
									</div>
									<div class="lessonMainPartTitle">
										{{$item->part_name}}
									</div>
									<div class="lessonMainPartTime">
										{{ gmdate("i:s", $item->part_video_duration) }}
									</div>
								</div>
								<div class="lessonMainVideo">
									@foreach($item->lesson as $itemTiny)
										<a {{ isset($active) ? 'href='.asset('courses/detail/'.$course->cou_slug.'.html/video/'.$video) : '' }} class="lessonMainVideoItem">
											<div class="lessonMainVideoIcon">
												<i class="fas fa-video"></i>
											</div>
											<div class="lessonMainVideoTitle">
												{{$itemTiny->les_name}}
											</div>
											<div class="lessonMainVideoTime">
												{{ gmdate("i:s", $itemTiny->les_video_duration) }}
											</div>
										</a>
									<?php $video++ ?>
									@endforeach
								</div>
							</div>
								
								
						@endforeach
					</div>
				</div>
				<div class="description">
					<div class="descriptionTitle">
						Mô tả
					</div>
					<div class="descriptionContent">
						{!! $course->cou_content !!}

					</div>
					<div class="btnShowMoreDescription">Xem thêm >>> </div>
					<div class="btnShowLessDescription">Thu gọn <<< </div>

				</div>
				@if($course_relate->count() > 0)
				<div class="courseRelate">
					<div class="courseRelateTitle">
						Bài học liên quan
					</div>
					<div class="courseRelateMain">
						@foreach($course_relate as $item)
						<div class="courseRelateItem">
							<a href="{{ asset('courses/detail/'.$item->cou_slug.'.html') }}" class="courseRelateItemImg" style="background: url('{{ file_exists(storage_path('app/course/resized200-'.$item->cou_img)) ? asset('lib/storage/app/course/resized200-'.$item->cou_img) : 'img/no_image.jpg'}}') no-repeat center /cover;">
								
							</a>
							<div class="courseRelateItemContent">
								<div class="courseRelateItemTitle">
									<a href="{{ asset('courses/detail/'.$item->cou_slug.'.html') }}">
										{{ $item->cou_name }}
									</a>
									
								</div>
								<div class="courseRelateItemRate">
									<div class="courseRateStar">
										@for($i=0;$i<5;$i++)
											@if($item->cou_star > $i)
												<i class="fa fa-star starActive" aria-hidden="true"></i>
											@else
												<i class="fa fa-star" aria-hidden="true"></i>
											@endif
										@endfor
									</div>
									<div class="courseRateContent">
										{{ number_format($item->cou_star, 1, '.' ,'.') }} ( {{ $item->rating->count() }} người bình chọn)
									</div>
								</div>
								<div class="courseRelateItemPrice_Cart">
									<div class="courseRelateItemPrice">
										<span class="courseItemOldPrice">
											@if ($item->cou_price_old != null)
												<del>{{number_format($item->cou_price_old,0,',','.')}} đ</del>
											@endif
										</span>
										<span class="courseItemNewPrice">
											{{number_format($item->cou_price,0,',','.')}}
										</span>
									</div>
									<a href="{{asset('cart/add/'.$item->cou_slug.'?aff='.app('request')->input('aff'))}}" class="courseRelateItemCart">

										<i class="fas fa-shopping-cart"></i>
									</a>		
									
								</div>
							</div>
								
						</div>
						@endforeach
					</div>
				</div>
				@endif
				<div class="teacher">
					<div class="teacherTitle">
						Giảng viên
					</div>
					<div class="teacherMain">
						<div class="teacherMainLeft">
							<div class="teacherMainLeftImg" style="background: url('{{ file_exists(storage_path('app/avatar/resized250-'.$course->tea->img)) ? asset('lib/storage/app/avatar/resized250-'.$course->tea->img) : 'img/no-avatar.jpg' }}') no-repeat center /cover;">
							</div>
							<div class="teacherMainLeftName">
								{{ $course->tea->name }}
							</div>
						</div>
						<div class="teacherMainRight">
							<div class="teacherMainRightInfo">
								{{ $course->tea->course->count() }} bài giảng
								<i class="fa fa-circle" aria-hidden="true"></i> 
								{{ $course->tea->order->count()}} học sinh
								<i class="fa fa-circle" aria-hidden="true"></i>
								{{ $course->rating->count()}} review
							</div>
							<div class="teacherMainRightGroup">
								Java, Android & Python Expert Developer
							</div>
							<div class="teacherMainRightContent">
								{!! $course->tea->content !!}
							</div>
							<div class="btnShowMore">
								<a href="{{ asset('teacher/'.$course->tea->email) }}">Xem thêm >>></a>
							</div>
						</div>
							
					</div>
				</div>
				<div class="rate">
					<div class="rateTitle">
						Đánh giá nhận xét
					</div>
					<div class="rateChart">
						<div class="rateChartLeft">
							<div class="rateChartLeftNum">
								{{ number_format($course->cou_star, 1,'.','.') }}
							</div>
							<div class="rateChartLeftStar">
								@for($i=0;$i<5;$i++)
									@if($course->cou_star > $i)
										<i class="fa fa-star starActive" aria-hidden="true"></i>
									@else
										<i class="fa fa-star" aria-hidden="true"></i>
									@endif
								@endfor
							</div>
						</div>
						<div class="rateChartRight">

							@for($i = 5; $i > 0; $i--)
							<div class="rateChartRightItem">
								<div class="rateChartRightItemLine">
									<div class="rateChartRightItemLineActive">
										
									</div>
								</div>
								<div class="rateChartRightItemNum">
									{{ $i }} <i class="fa fa-star starActive" aria-hidden="true"></i>
								</div>
								<div class="rateChartRightItemValue">
									<?php $count = 0; $total = 0?>

									@foreach($course->rating as $item)
										@if($item->rat_star == $i)
											<?php $count++?>
										@endif
										<?php $total++?>
									@endforeach
									{{ $total != 0 ? $count/$total : 0}}
								</div>
							</div>
							@endfor
						</div>

					</div>
					<div class="rateMain">
						@foreach($course->rating as $item)
							<div class="rateMainItem">
								<div class="rateMainItemAva">
									<div class="rateMainItemAvaImg" style="background: url('{{ file_exists(storage_path('app/avatar/resized250-'.$item->acc->img)) ? asset('lib/storage/app/avatar/resized250-'.$item->acc->img) : 'img/no-avatar.jpg' }}') no-repeat center /cover;" >
										
									</div>
									<div class="rateMainItemAvaName">
										{{ $item->acc->name }}
									</div>
									<div class="rateMainItemAvaTime">

										{{ $item->updated_at == null ? time_format($item->created_at) : time_format($item->updated_at) }}
									</div>
								</div> 
								<div class="rateMainItemContent">
									<div class="rateMainItemContentStar">
										<div class="rateMainItemContentStarContent">

											@for($i=0;$i<5;$i++)
												@if($item->rat_star > $i)
													<i class="fa fa-star starActive" aria-hidden="true"></i>
												@else
													<i class="fa fa-star" aria-hidden="true"></i>
												@endif
											@endfor
										</div>
									</div>
									<div class="rateMainItemContentBody">
										{{ $item->rat_content }}
									</div>
										
								</div>
							</div>
						@endforeach
						@if (Auth::check() && isset($active))
							<div class="rateMainItem">
								<div class="rateMainItemAva">
									<div class="rateMainItemAvaImg" style="background: url('{{ file_exists(storage_path('app/avatar/resized250-'.Auth::user()->img)) ? asset('lib/storage/app/avatar/resized250-'.Auth::user()->img) : 'img/no-avatar.jpg' }}') no-repeat center /cover;" >
										
									</div>
									<div class="rateMainItemAvaName">
										{{ Auth::user()->name }}
									</div>
									
								</div> 
								<div class="rateMainItemContent">
									<div class="rateMainItemContentTitle">
										Nhận xét của bạn
									</div>
									<div class="rateMainItemContentStar">
										<div class="rateMainItemContentStarContent last">
											@for($i=0;$i<5;$i++)
												<i class="fa fa-star startLast" aria-hidden="true" value="{{ $i }}"></i>
											@endfor
										</div>
										<div class="rateMainItemContentStarText">
											(Đánh giá khóa học)
										</div>	
									</div>
										

									<div class="rateMainItemContentBody">
										<textarea class="" rows="5"></textarea>
									</div>
									<div class="cou_id" style="display: none;">{{ $course->cou_id }}</div>
									<div class="rateMainItemContentBtn">
										Nhận xét
									</div>
										
								</div>
							</div>
						@endif
							


					</div>
				</div> 
			</div>
			<div class="col-md-1 col-sm-1"></div>
			<div class="col-md-4 col-sm-4">
				<div class="courseTag">
					<div class="courseTagImg" style="background: url('{{ file_exists(storage_path('app/course/resized360-'.$course->cou_img)) ? asset('lib/storage/app/course/resized360-'.$course->cou_img) : 'img/no_image.jpg'}}') no-repeat center /cover;">
						@if(isset($active))
							<div class="courseMainItemGroup_Time">
								<div class="courseMainItemGroup">
									{{ $course->group->gr_name }}
								</div>
								<div class="courseMainItemTime">
									Update {{date_format($course->updated_at,"m/Y")}}
								</div>
							</div>
						@else 
							@if ($course->cou_sale != 0)
								<div class="courseTagSale">
									{{$course->cou_sale}}%
								</div>
							@endif
							<div class="courseTagPrice">
								
								<span class="courseTagOldPrice">
									{{-- <i class="fa fa-circle" aria-hidden="true"></i> --}}

									@if ($course->cou_price_old != null)
										<del>{{number_format($course->cou_price_old,0,',','.')}} </del>
									@endif

									{{-- <div class="courseMainItemGroup_Time">
										<div class="courseMainItemGroup">
											{{ $item->group->gr_name }}
										</div>
										<div class="courseMainItemTime">
											Update {{date_format($item->updated_at,"m/Y")}}
										</div>
									</div> --}}
									
								</span>
								{{number_format($course->cou_price,0,',','.')}}
							</div>
						@endif
							
					</div>
					<div class="courseTagContent">
						@if (!isset($active))
							<div class="courseTagContentCode">
								<input type="text" name="code" class="formCode" placeholder="Mã giảm giá">
								<button class="formCode">Xác nhận</button>
							</div>

							<div class="courseTagContentCode">
								<input type="text" name="code_aff" class="formCode" placeholder="Mã nhân viên tư vấn">
								<button class="formCodeAff">Xác nhận</button>
							</div>
							<div class="get_aff">
								<div class="aff_ava" style="background: url('{{ asset('lib/storage/app/avatar/resized50-'.Auth::user()->img) }}') no-repeat center /cover;"></div>
								<div class="aff_name">{{ Auth::user()->name }}</div>
								<div class="aff_check">
									<i class="fas fa-check"></i>
								</div>
							</div>
						@endif
							
						<div class="courseTagContentMain">
							<div class="courseTagContentMainItem">
								<div class="courseTagContentMainItemIcon">
									<i class="fas fa-file-video"></i>
								</div>
								<div class="courseTagContentMainItemBody">
									Video có {{gmdate("H", $course->cou_video_duration)}} tiếng
								</div>
							</div>
							<div class="courseTagContentMainItem">
								<div class="courseTagContentMainItemIcon">
									<i class="fas fa-file"></i>
								</div>
								<div class="courseTagContentMainItemBody">
									{{$course->cou_video}} bài học
								</div>
							</div>
							<div class="courseTagContentMainItem">
								<div class="courseTagContentMainItemIcon">
									<i class="fas fa-file-alt"></i>
								</div>
								<div class="courseTagContentMainItemBody">
									16 các tài liệu bổ trợ
								</div>
							</div>
							<div class="courseTagContentMainItem">
								<div class="courseTagContentMainItemIcon">
									<i class="fas fa-mobile-alt"></i>
								</div>
								<div class="courseTagContentMainItemBody">
									Thiết bị học là điện thoại, máy tính
								</div>
							</div>
							<div class="courseTagContentMainItem">
								<div class="courseTagContentMainItemIcon">
									<i class="fas fa-graduation-cap"></i>
								</div>
								<div class="courseTagContentMainItemBody">
									Có chứng chỉ xong khi hoàn thành
								</div>
							</div>
						</div>
						@if(isset($active))
							<div class="courseTagContentAddCart">
								<a href="{{asset('courses/detail/'.$course->cou_slug.'.html/video/0')}}">Bắt đầu học</a>

							</div>
							{{--<div class="courseTagContentBuy">--}}
								{{--<a href="{{asset('')}}">Xem khóa học khác</a>--}}
							{{--</div>--}}
						@else

							<div class="courseTagContentAddCart">
								<a href="{{asset('cart/add/'.$course->cou_slug.'.html?aff='.app('request')->input('aff'))}}">Thêm vào giỏ hàng</a>

							</div>
							<div class="courseTagContentBuy">
								<a href="{{asset('cart/buy/'.$course->cou_slug.'.html?aff='.app('request')->input('aff'))}}">Mua khóa học</a>
							</div>
						@endif
							

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
@section('script')
	<script type="text/javascript" src="js/courses/detail.js"></script>
@stop