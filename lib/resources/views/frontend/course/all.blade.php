@extends('frontend.master')
@section('title','Danh sách khóa học')
@section('fb_title','Top khóa học hàng đầu')
@section('fb_description','Nơi cung cấp cho bạn những khóa học tốt nhất, rẻ nhất. Tạo lên một môi trường học tập trên cuộc cách mạng công nghệ 4.0')
@section('fb_image',asset('public/layout/frontend/img/dayne-topkin-60559-unsplash.png'))
@section('main')
<link rel="stylesheet" href="css/owlcarousel/owl.carousel.min.css">
<link rel="stylesheet" href="css/owlcarousel/owl.theme.default.min.css">
<link rel="stylesheet" type="text/css" href="css/course/course.css">
<div class="header_main">
	
	<div class="header_main_body">
		<a href="{{ asset('courses/'.Request::segment(2)) }}" class="header_main_item {{ Request::segment(3) != 'all' ? 'active' : '' }}">
			Chủ đề
		</a>
		@if (Request::segment(2) != null)
			<a href="{{ asset('courses/'.Request::segment(2).'/all') }}" class="header_main_item {{ Request::segment(3) == 'all' ? 'active' : '' }}">
				Tất cả các khoá học
			</a>
		@endif
			
	</div>
				
</div>
<div class="instruction">
	<div class="instruction_body">
		<a href="{{ asset('courses') }}" class="instruction_item">
			Khóa học
		</a>
		<a class="instruction_item">
			>
		</a>
		<a href="{{ asset('courses/'.Request::segment(2)) }}" class="instruction_item">
			{{ isset($group->gr_name) ? $group->gr_name : 'Tất cả'}}
		</a>
		@if (Request::segment(2) != null)
			<a class="instruction_item">
				>
			</a>
			<a href="{{ asset('courses/'.Request::segment(2)) }}" class="instruction_item">
				Tất cả khóa học
			</a>
		@endif
			
		{{-- <a class="instruction_item">
			>
		</a> --}}
	</div>
</div>
<div class="main_body">
	<div class="container">
		<div class="row flex-mobile">
			<div class="col-md-8 col-sm-8 col-xs-12">
				<div class="row">
					<div class="col-md-12">
						<div class="main_title">
							<h1>{{ Request::segment(1) == 'search' ? ($searchValue == '' ? 'Tất cả' : $searchValue) : $group->gr_name }}</h1>
							<div class="main_title_content">
								Chúng tôi cung cấp cho các bạn những khoá học đa dạng và chất lượng nhất
							</div>
						</div>
					</div>
				</div>
				@foreach($courses as $item)
				<div class="row ">
					<div class="col-xs-12">
						<div class="courseItem">
							<a href="{{ asset('courses/detail/'.$item->cou_slug.'.html') }}" class="courseItemImg" style="background: url('{{ asset('lib/storage/app/course/'.$item->cou_img) }}') no-repeat center /cover ;">
								@if ($item->cou_sale != 0)
									<div class="courseItemSale">
										{{$item->cou_sale}}%
									</div>
									
								@endif
							</a>
						
							<div class="courseItemRight">
								<a href="{{ asset('courses/detail/'.$item->cou_slug.'.html') }}" class="courseItemRightTitle">
									{{ $item->cou_name }}
								</a>
								<div class="courseItemRightInfo">
									20 bài
									<i class="fa fa-circle" aria-hidden="true"></i> 
									{{gmdate("H:i", $item->cou_video)}}p 
									<i class="fa fa-circle" aria-hidden="true"></i>
									{{time_format($item->updated_at)}}
									<i class="fa fa-circle" aria-hidden="true"></i>
									{{level_format($item->cou_level)}}
								</div>
								<div class="courseItemRightSummary">
									{{ cut_string($item->cou_summary, 120) }}
								</div>
								<div class="courseItemRightPrice">
									<span class="courseItemRightOldPrice">
										@if ($item->cou_price_old != null)
											<del>{{number_format($item->cou_price_old,0,',','.')}} đ</del>
										@endif
									</span>
									<span class="courseItemRightNewPrice">
										{{number_format($item->cou_price,0,',','.')}}
									</span>
									
									<div class="courseItemStar">
										@for($i=0;$i<5;$i++)
											@if($item->cou_star > $i)
												<i class="fa fa-star starActive" aria-hidden="true"></i>
											@else
												<i class="fa fa-star" aria-hidden="true"></i>
											@endif
										@endfor
									</div>
								</div>
							</div>
						</div>
							
					</div>
				</div>
				@endforeach	
				<div class="row">
					<div class="col-xs-12">
						{!! $courses->links('layout.paginate') !!}	
					</div>
				</div>
				

			</div>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<form method="get" id="form_search">
					{{-- {{ csrf_field() }} --}}

					<input type="hidden" name="search" value="{{ isset($paramater['search']) ? $paramater['search'] : '' }}">
					<div class="selectCourse">
						<select class="form-control" name="course" id="select_course">
							<option value="1" {{ isset($paramater['course']) && $paramater['course'] == '1' ? 'selected' : '' }}>Các khoá học mới nhất</option>
							<option value="2" {{ isset($paramater['course']) && $paramater['course'] == '2' ? 'selected' : '' }}>Các khoá học được quan tâm</option>
							<option value="3" {{ isset($paramater['course']) && $paramater['course'] == '3' ? 'selected' : '' }}>Các khoá học đánh giá cao nhất</option>
						</select>
					</div>
					<div class="searchCourse">
						<div class="searchCourseHeader">
							{{ Request::segment(1) == 'search' ? ($searchValue == '' ? 'Tất cả' : $searchValue) : $group->gr_name }}
						</div>
						<div class="searchCourseBody">
							<div class="searchCourseBodyItem searchGroupChild">
								@if (Request::segment(1) == 'search')
									@foreach($groups as $item)
										<div class="searchCourseBodyItemMainItem">
											<div class="searchCourseBodyItemMainItemLeft">
												{{ $item->gr_name }}
											</div>
											<div class="searchCourseBodyItemMainItemRight">
												<input type="checkbox" name="group[]" value="{{ $item->gr_id }}" {{ isset($paramater['group']) && in_array($item->gr_id, $paramater['group']) ? 'checked' : '' }}>
											</div>
										</div>
									@endforeach
								@else
									@foreach($group_child as $item)
										<div class="searchCourseBodyItemMainItem">
											<div class="searchCourseBodyItemMainItemLeft">
												{{ $item->gr_name }}
											</div>
											<div class="searchCourseBodyItemMainItemRight">
												<input type="checkbox" name="gr_child[]" value="{{ $item->gr_id }}" {{ isset($paramater['gr_child']) && in_array($item->gr_id, $paramater['gr_child'])? 'checked' : '' }}>
											</div>
										</div>
									@endforeach
								@endif
									
							</div>
							<div class="searchCourseBodyItem searchByPrice">
								<div class="searchCourseBodyItemTitle">
									Giá cả
								</div>
								<div class="searchCourseBodyItemMain">
									<div class="searchCourseBodyItemMainItem">
										<div class="searchCourseBodyItemMainItemLeft">
											Giá rẻ
										</div>
										<div class="searchCourseBodyItemMainItemRight">
											<input type="checkbox" name="price[]" value="1" {{ isset($paramater['price']) && in_array(1, $paramater['price'])? 'checked' : '' }}>
										</div>
									</div>
									<div class="searchCourseBodyItemMainItem">
										<div class="searchCourseBodyItemMainItemLeft">
											Giá cao
										</div>
										<div class="searchCourseBodyItemMainItemRight">
											<input type="checkbox" name="price[]" value="2" {{ isset($paramater['price']) && in_array(2, $paramater['price'])? 'checked' : '' }}>
										</div>
									</div>
								</div>
							</div>

							<div class="searchCourseBodyItem searchByPrice">
								<div class="searchCourseBodyItemTitle">
									Trình độ
								</div>
								<div class="searchCourseBodyItemMain">
									<div class="searchCourseBodyItemMainItem">
										<div class="searchCourseBodyItemMainItemLeft">
											Cơ bản
										</div>
										<div class="searchCourseBodyItemMainItemRight">
											<input type="checkbox" name="level[]" value="1" {{ isset($paramater['level']) && in_array(1, $paramater['level'])? 'checked' : '' }}>
										</div>
									</div>
									<div class="searchCourseBodyItemMainItem">
										<div class="searchCourseBodyItemMainItemLeft">
											Nâng cao
										</div>
										<div class="searchCourseBodyItemMainItemRight">
											<input type="checkbox" name="level[]" value="2" {{ isset($paramater['level']) && in_array(2, $paramater['level'])? 'checked' : '' }}>
										</div>
									</div>
									<div class="searchCourseBodyItemMainItem">
										<div class="searchCourseBodyItemMainItemLeft">
											Tất cả trình dộ
										</div>
										<div class="searchCourseBodyItemMainItemRight">
											<input type="checkbox" name="level[]" value="3" {{ isset($paramater['level']) && in_array(3, $paramater['level'])? 'checked' : '' }}>
										</div>
									</div>
								</div>
							</div>
							
							<div class="searchCourseBodyItem searchByPrice">
								<div class="searchCourseBodyItemTitle">
									Loại bài giảng
								</div>
								<div class="searchCourseBodyItemMain">
									<div class="searchCourseBodyItemMainItem">
										<div class="searchCourseBodyItemMainItemLeft">
											Bài quiz
										</div>
										<div class="searchCourseBodyItemMainItemRight">
											<input type="checkbox" name="type[]" value="1" {{ isset($paramater['type']) && in_array(1, $paramater['type'])? 'checked' : '' }}>
										</div>
									</div>
									<div class="searchCourseBodyItemMainItem">
										<div class="searchCourseBodyItemMainItemLeft">
											Giảng theo chủ đề
										</div>
										<div class="searchCourseBodyItemMainItemRight">
											<input type="checkbox" name="type[]" value="2" {{ isset($paramater['type']) && in_array(2, $paramater['type'])? 'checked' : '' }}>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>

	</div>
</div>


@stop

@section('script')
<script src="js/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/courses/group.js"></script>
@stop