@extends('frontend.master')
@section('title','Khóa học')
@section('main')
<link rel="stylesheet" type="text/css" href="css/course.css">
<link rel="stylesheet" type="text/css" href="js/nouislider.min.css">
<div>
	{{-- <div class="title">
		<div class="titleLine"></div>
		<div class="titleContent">
			<h1>Khóa học</h1>
		</div>

	</div> --}}
	<div class="container main">
		<div class="row">
			<div class="col-md-9 col-sm-12 mainHead">
				
				@switch(Request::segment(1))
					@case("courses")
						<h3>Tất cả khóa học</h3>
						@break
					@case("group")
						<h3>{{$groupName}}</h3>
						@break
					@default               
						<h3>Tìm kiếm: "{{$searchValue}}"</h3>
						@break
					
				@endswitch
				
				<div class="mainMenu">
					
					<ul class="">
						<li  class="active">
							<a id="courseMostBuy" class="active">Được mua nhiều nhất</a>
						</li>
						<li>
							<a @if(Request::segment(1) != "courses") style="cursor: no-drop;" @endif id="courseMostNew" >Mới ra mắt </a>
						</li>
						<li>
							<a @if(Request::segment(1) != "courses") style="cursor: no-drop;" @endif id="courseMostRate" >Đánh giá cao nhất</a>
						</li>
						<li>
							<a @if(Request::segment(1) != "courses") style="cursor: no-drop;" @endif id="courseMostSale" >Đang khuyến mại</a>
						</li>
					</ul>
				</div>
				<div class="mainHeadNum">
					{{$course->count()}} Khóa học
				</div>
				<div class="mainHeadTag">
					@if (!isset($searchValue))
						@foreach(Request::all() as $item)
							@if( $item != 'null')
								<div class="mainHeadTagItem">
									<div class="mainHeadTagItemContent">
										@switch($item)
											@case('all')
												Mọi cấp độ
												@break
											@case('basic')
												Cơ bản
												@break
											@case('master')
												Nâng cao
												@break
											@default
												{{number_format($item,0,',','.')}} VND
												@break;
										@endswitch
										
									</div>
									<div class="mainHeadTagItemRemove" onclick="btnRemove('{{$item}}')">
										<i class="fa fa-times" aria-hidden="true"></i>
									</div>
								</div>
							@endif
								
							
						@endforeach
					@endif
						
				</div>
			</div>
		</div>
		
		<div class="row">
			{{-- @if(Request::segment(1) != 'courses')
			<div class="col-md-9 col-sm-9">
				<div class="row buyMost">
					<div class="col-md-12 courseTitle">
						<h3>Được mua nhiều nhất</h3>
					</div>
					 
					@foreach($course as $item)
					<div class="col-md-4 col-sm-6 col-xs-12">
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
					</div>
					@endforeach
					
				</div>
			</div>
			@else
			<div class="col-md-9 col-sm-9">
				<div class="row buyMost">
					<div class="col-md-12 courseTitle">
						<h3>Được mua nhiều nhất</h3>
					</div>
					 
					@foreach($courseByMost as $item)
					<div class="col-md-4 col-sm-6 col-xs-12">
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
					</div>
					@endforeach
					
				</div>
				<div class="row newMost">
					<div class="col-md-12 courseTitle">
						<h3>Mới ra mắt</h3>
					</div>
					 
					@foreach($courseNewMost as $item)
					<div class="col-md-4 col-sm-6 col-xs-12">
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
					</div>
					@endforeach
					
				</div>
				<div class="row ratingMost">
					<div class="col-md-12 courseTitle">
						<h3>Đánh giá cao nhất</h3>
					</div>
					 
					@foreach($courseVoteMost as $item)
					<div class="col-md-4 col-sm-6 col-xs-12">
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
					</div>
					@endforeach
					
				</div>
				<div class="row saleMost">
					<div class="col-md-12 courseTitle">
						<h3>Đang khuyến mãi</h3>
					</div>
					 
					@foreach($courseSaleMost as $item)
					<div class="col-md-4 col-sm-6 col-xs-12">
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
					</div>
					@endforeach
					
				</div>
			</div>
			@endif --}}
			@if(Request::segment(1) != 'courses')
			<div class="col-md-9 col-sm-9">
				<div class="buyMost">
					 
					@foreach($course as $item)
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
											{{cut_string($item->cou_name , 70)}}
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
			@else

			<div class="col-md-9">
				<div class="courseMain">
					<div class="couserLine">
						<div class="couserLineItem buyMost">
							@foreach($courseByMost as $item)
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
											{{cut_string($item->cou_name , 70)}}
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
						<div class="couserLineItem newMost">
							@foreach($courseNewMost as $item)
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
											{{cut_string($item->cou_name , 70)}}
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
						<div class="couserLineItem voteMost">
							@foreach($courseVoteMost as $item)
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
											{{cut_string($item->cou_name , 70)}}
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
						<div class="couserLineItem saleMost">
							@foreach($courseSaleMost as $item)
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
											{{cut_string($item->cou_name , 70)}}
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
			</div>
			@endif
			<div class="col-md-3 col-sm-3 right">
				<div class="row">
					<div class="col-dm-12 customPrice rightItem">
						<h4>Giá</h4>
						<div>Từ: 0 - <span id="slidePrice"></span> VND <div class="customPriceBtn">Lọc</div></div>
						<div class="slidecontainer">
						 {{--  <input type="range" min="0" max="400" @if(Request::get('price') == 0) value="300" @else value="{{ (int)Request::get('price') / 10000 }}" @endif class="slider" id="myRange"> --}}
						<div id="slider"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-dm-12 rightItem customLevel">
						<h4>Trình độ</h4>
						<div class="btn-group " role="group" aria-label="...">
							<div class="btn btn-level btnLevelAll @if (Request::get('level') == 'all') active @endif">Toàn tập</div>
							<div class="btn btn-level btnLevelBasic @if (Request::get('level') == 'basic') active @endif">Cơ bản</div>
							<div class="btn btn-level btnLevelMaster @if (Request::get('level') == 'master') active @endif">Chuyên nghiệp</div>
							<input type="hidden" name="url" id="urlPage" value="{{Request::url()}}">
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-dm-12 rightItem topTeacher">
						<h4>Top giảng viên</h4>
						<ul class="listTeacher">
							<li class="courseTeacher">
								<a href="{{asset('courses')}}">
									<div class="rightTeacherName">
										Tất cả
									</div>
									<div class="rightNumCourse">
										{{$teacher_total}}
									</div>
								</a>
							</li>
							@foreach($teacher as $item)
							<li class="courseTeacher">
								<a href="{{ asset('teacher/'.$item->acc->email) }}">
									<span class="rightTeacherName">
										{{$item->acc->name}}
									</span>
									<span class="rightNumCourse">
										{{$item->acc->course->count()}}
									</span>
								</a>
							</li>
							@endforeach
							
						</ul>
					</div>
				</div>
				
				<div class="row">
					<div class="col-dm-12 rightItem Ads">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
{{-- <div>
	<iframe src="https://thanhnien.vn/giao-duc/tuyen-sinh/2017/tra-cuu-diem-thi-thpt-quoc-gia.html" width="900" height="600" style="overflow: hidden;"></iframe>
</div> --}}
@stop

@section('script')
<script type="text/javascript" src="js/nouislider.min.js"></script>
<script type="text/javascript" src="js/course.js"></script>

<script type="text/javascript">
	
</script>
@stop