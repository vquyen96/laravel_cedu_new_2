@extends('frontend.master')
@section('title','Trang chủ')
@section('fb_title','Top khóa học hàng đầu')
@section('fb_description','Nơi cung cấp cho bạn những khóa học tốt nhất, rẻ nhất. Tạo lên một môi trường học tập trên cuộc cách mạng công nghệ 4.0')
@section('fb_image',asset('public/layout/frontend/img/dayne-topkin-60559-unsplash.png'))
@section('main')
<link rel="stylesheet" type="text/css" href="css/index/home.css">
<link rel="stylesheet" href="css/owlcarousel/owl.carousel.min.css">
<link rel="stylesheet" href="css/owlcarousel/owl.theme.default.min.css">
<div>
	<div class="bannerHead" style="background: url('{{ asset('lib/storage/app/banner/'.$banner->ban_img) }}') no-repeat center /cover;">
		<div class="bannerHeadMain">
			<h1 class="bannerHeadMainTitle">Cedu</h1>
			<div class="bannerHeadMainContent">Thắp sáng tri thức, Chắp cánh ước mơ</div>
			<form class="formSearchBanner" method="get" action="{{asset('search/')}}"> 
				<input type="text" name="search" placeholder="Tìm kiếm các khóa học">
				<button type="submit">
					<i class="fa fa-search" aria-hidden="true"></i>
				</button>
			</form>
		</div>
	</div>
	<div class="listGroup">
		@foreach($groups as $item)
		<div class="listGroupItem">
			<a href="{{ asset('courses/'.$item->gr_slug) }}" class="listGroupItemImg">
				<img src="{{ asset('lib/storage/app/group/'.$item->gr_img) }}">
			</a>
			<a href="{{ asset('courses/'.$item->gr_slug) }}" class="listGroupItemContent">
				{{ $item->gr_name }}
			</a>
		</div>
		@endforeach
	</div>
	<div class="course">
		<div class="container">
			<div class="row courseHead">
				<div class="col-md-4">
					<div class="courseTitle">
						<div class="courseTitleBig">
							Khóa học
						</div>
						<div class="courseTitleSmail">
							Chúng tôi cung cấp cho các bạn những khoá học đa dạng và chất lượng nhất
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="courseSelect">
						<select class="form-control" name="course" id="select_course">
							<option value="1">Các khoá học mới nhất</option>
							<option value="2">Các khoá học được quan tâm</option>
							<option value="3">Các khoá học đánh giá cao nhất</option>
						</select>
					</div>
				</div>
					
			</div>
			<div class="row courseMain">
				@foreach($courses as $item)
					<div class="col-md-4 col-sm-6 col-xs-12">
						<a href="{{ asset('courses/detail/'.$item->cou_slug.'.html') }}" class="courseMainItem">
							<div class="courseMainItemImg" style="background: url('{{ file_exists(storage_path('app/course/resized360-'.$item->cou_img)) ? asset('lib/storage/app/course/resized360-'.$item->cou_img) : asset('lib/storage/app/course/'.$item->cou_img)}}') no-repeat center /cover;">
								@if ($item->cou_sale != 0)
									<div class="courseMainItemSale">
										{{$item->cou_sale}}%
									</div>
									
								@endif
								<div class="courseMainItemPrice">
									{{number_format($item->cou_price,0,',','.')}}
									<span class="courseMainItemTime">
										<i class="fa fa-circle" aria-hidden="true"></i>
										{{time_format($item->updated_at)}}
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
				<div class="loadingCourse">
					<img src="img/Double Ring-1.4s-200px.gif">
				</div>
			</div>
		</div>
	</div>
	<div class="teacher">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="teacherTitle">
						<div class="teacherTitleLeft">
							Giáo viên tiêu biểu
						</div>
						<div class="teacherTitleRight">
							Những giao viên trẻ tài năng chất lương luôn tìm tòi nhưng phương pháp sáng tạo nhất để giảng dạy.
						</div>
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="owl-carousel">
						@foreach($teacher as $item)
							<div class="owlItem">
								<a href="{{ asset('teacher/'.$item->acc->email) }}" class="owlItemImg" style="background: url('{{ asset('lib/storage/app/avatar/resized-'.$item->acc->img) }}') no-repeat center /cover ;">
								</a>
								<a href="{{ asset('teacher/'.$item->acc->email) }}" class="owlItemName">
									{{ $item->acc->name }}
								</a>
								<div class="owlItemContent">
									{!! cut_string($item->acc->summary, 200) !!}
								</div>
							</div>
						@endforeach
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>
	
@stop	
@section('script')
<script type="text/javascript" src="js/home.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script type="text/javascript">
	$(document).on('change', '#select_course', function (e) {
		$('.loadingCourse').show();
        var id = $(this).val();
        var url = $('.currentUrl').text();
        console.log(id);
        e.preventDefault();
        $.ajax({
          method: 'POST',
          url: url+'get_course_home',
          data: {
              '_token': $('meta[name="csrf-token"]').attr('content'),
              'id': id
          },
          success: function (resp) {
          	console.log(resp);
           	if(resp != 'error'){
           		// $('.courseMain').html('');
                setTimeout(function () {
                    $('.courseMain').html(resp);
                    // $('#relate').selectpicker('refresh');
                    $('.loadingCourse').hide();
                },200);
            }

          },
          error: function () {
            console.log('error');
          }
        });
    });
</script>
@stop