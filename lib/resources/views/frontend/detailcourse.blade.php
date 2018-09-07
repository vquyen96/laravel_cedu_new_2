@extends('frontend.master')
@section('title',$course->cou_name)
@section('main')
<link rel="stylesheet" type="text/css" href="css/detailcourse.css">
<link rel="stylesheet" href="css/circle.css">
<div class="container ">
	<div class="row mainHead">
		<div class="col-md-12 col-sm-12">
			<h1>{{$course->cou_name}}</h1>
		</div>
	</div>
	<div class="row mainItem">
		<div class="col-md-9 col-sm-9" >
			<div class="headMenu">
				<ul>
					<li>
						<a id="courseHeader" class="active">Giới thiệu</a>
					</li>
					<li>
						<a id="courseDetail">Mô tả khóa học</a>
					</li>
					<li>
						<a id="courseVideo">Cấu trúc bài giảng</a>
					</li>
					<li>
						<a id="courseRating">
							Đánh giá
							<span class="menuRate">({{$course->rating->count()}})</span>
						</a>
					</li>
				</ul>
			</div>
		</div>

		@if(Auth::check() && Auth::user()->level == 8)
		<div class="col-md-3 col-sm-3">
			<div class="affiliate">
				<div class="content">
					<input type="text" name="aff" id="aff" value="{{Request::url().'?aff='.$acc->aff->aff_code}}">
				</div>
				<div class="btnGetLink">
					Lấy link 
				</div>
				
				{{-- {{ app('request')->input('aff') }}
				 --}}
			</div>
			<div class="alertCopy">
				đã copy
			</div>
		</div>
		@endif
	</div>
	<div class="row ">
		<div class="col-md-9 col-sm-9">
			<div class="mainItem courseImg">
				<img src="{{asset('lib/storage/app/course/'.$course->cou_img)}}">
				<div class="courseItemSale" @if($course->cou_sale == 0) style="display: none;" @endif>
					<img src="img/tag.png">
					<span class="courseItemSaleContent">
						{{$course->cou_sale}}%
					</span>
				</div>
			</div>
			<div class="mainItem teacher">
				<img src="{{asset('lib/storage/app/avatar/'.$course->tea->img)}}">
				<span class="teacherName">
					{{$course->tea->name}}
				</span>
				<p class="teacherContent">
					{!!cut_string($course->tea->content,200)!!}
				</p>
				<a href="{{asset('teacher/'.$course->tea->email)}}" class="btnTeacher">
					Xem hồ xơ
				</a>
				
				<div class="teacherStar">
					@for($i=0;$i<5;$i++)
						@if($course->cou_star > $i)
							<i class="fa fa-star starActive" aria-hidden="true"></i>
						@else
							<i class="fa fa-star" aria-hidden="true"></i>
						@endif
					@endfor
					
				</div>
			</div>
			<div class="mainItem courseDetail">
				<div class="courseDetailHead">
					<h4>Mô tả khóa học</h4>
					<span class="courseName">
						({{$course->cou_name}})
					</span>
				</div>
				<div class="courseContent">
					{!!$course->cou_content!!}
					
				</div>
				<div class="btnSeeMore">
					<i class="fa fa-arrow-up" aria-hidden="true"></i>
					<span class="btnSeeMoreText">
						Xem thêm
					</span>
					
				</div>	
			</div>
			<div class="mainItem videoDetail">
				<div class="videoDetailHead">
					<h4>Cấu trúc bài giảng</h4>
					<span class="numOfVideo">
						(Gồm 14 bài)
					</span>
				</div>
				<div class="videoContent">
					<?php $video = 0 ?>
					@foreach($course->part as $item)
						<h4>{{$item->part_name}}</h4>
						{{-- {{$item->lesson->count()}} --}}
						@foreach($item->lesson as $itemTiny)	
							<div class="videoItem">
								<div class="videoItemBtnPlay">
									<img src="img/ic_Play-button_b1.png">
								</div>
								<div class="videoItemTitle">
									{{$itemTiny->les_name}}
								</div>
								<div class="videoItemTime">
									{{$itemTiny->les_video_duration}}
								</div>
							</div>
						<?php $video++ ?>
						@endforeach
					@endforeach
					
				</div>
				<div class="videoBtnSeeMore">
					<i class="fa fa-arrow-up" aria-hidden="true"></i>
					<span class="videoBtnSeeMoreText">
						Xem thêm
					</span>
				</div>	
			</div>
			<div class="mainItem courseRate">
				<div class="courseRatelHead">
					<h4>Nhận xét đánh giá</h4>
					<span class="courseRateNum">
						({{$course->rating->count()}} nhận xét)
					</span>
				</div>
				<div class="courseRateDetail col-md-12">
					<div class="col-md-5 courseRateLeft">
						<div class="courseCircle">
							<div class="clearfix">
				                <div class="c100 p{{$course->cou_star*20}} orange">
				                    <span>{{$course->cou_star}}</span>
				                    <div class="slice">
				                        <div class="bar"></div>
				                        <div class="fill"></div>
				                    </div>
				                </div>
				            </div>
				            <div class="rateStar">
				            	@for($i=0;$i<5;$i++)
									@if($course->cou_star > $i)
										<i class="fa fa-star starActive" aria-hidden="true"></i>
									@else
										<i class="fa fa-star" aria-hidden="true"></i>
									@endif
								@endfor
				            </div>
						</div>
						
					</div>
					<div class="col-md-7 courseRateRight">
						<ul>
							<li>
								<span class="rateName">
									5 sao 
								</span>
								<span class="rateSlide"></span>
								<span class="rateValue">
									@for($i = 0,$star5 = 0; $i<$course->rating->count(); $i++)
										@if($course->rating->get($i)->rat_star == 5)
											<?php $star5++?>
										@endif
									@endfor
									{{$star5}}
								</span>
							</li>
							<li>
								<span class="rateName">
									4 sao 
								</span>
								<span class="rateSlide"></span>
								<span class="rateValue">
									@for($i = 0,$star4 = 0; $i<$course->rating->count(); $i++)
										@if($course->rating->get($i)->rat_star == 4)
											<?php $star4++?>
										@endif
									@endfor
									{{$star4}}
								</span>
							</li>
							<li>
								<span class="rateName">
									3 sao 
								</span>
								<span class="rateSlide"></span>
								<span class="rateValue">
									@for($i = 0,$star3 = 0; $i<$course->rating->count(); $i++)
										@if($course->rating->get($i)->rat_star == 3)
											<?php $star3++?>
										@endif
									@endfor
									{{$star3}}
								</span>
							</li>
							<li>
								<span class="rateName">
									2 sao 
								</span>
								<span class="rateSlide"></span>
								<span class="rateValue">
									@for($i = 0,$star2 = 0; $i<$course->rating->count(); $i++)
										@if($course->rating->get($i)->rat_star == 2)
											<?php $star2++?>
										@endif
									@endfor
									{{$star2}}
								</span>
							</li>
							<li>
								<span class="rateName">
									1 sao 
								</span>
								<span class="rateSlide"></span>
								<span class="rateValue">
									@for($i = 0,$star1 = 0; $i<$course->rating->count(); $i++)
										@if($course->rating->get($i)->rat_star == 1)
											<?php $star1++?>
										@endif
									@endfor
									{{$star1}}

								</span>
							</li>
						</ul>
					</div>
					 
				</div>
				<div class="rateComment">
					@foreach($course->rating as $item)
					<div class="comItem">
						<div class="comItemAva">
							<img src="{{asset('lib/storage/app/avatar/'.$item->acc->img)}}">
						</div>
						<div class="comItemName">
							{{$item->acc->name}}
						</div>
						<div class="comItemStar">
							@for($i=0;$i<5;$i++)
								@if($item->rat_star > $i)
									<i class="fa fa-star starActive" aria-hidden="true"></i>
								@else
									<i class="fa fa-star" aria-hidden="true"></i>
								@endif
							@endfor
						</div>
						<div class="comItemContent">
							{{$item->rat_content}}
						</div>
						<div class="comItemTime">
							{{time_format($item->created_at)}}
						</div>
					</div>
					@endforeach
					
				</div>
				<div class="comBtnSeeMore">
					<i class="fa fa-arrow-up" aria-hidden="true"></i>
					<span class="comBtnSeeMoreText">
						Xem thêm
					</span>
					
				</div>	
			</div>
		</div>
		<div class="col-md-3 col-sm-3 ">
			<div class="courseParameter">
				<ul>
					<li class="coursePrice">

								
						{{number_format($course->cou_price,0,',','.')}} <sup>đ</sup>
						@if($course->cou_sale != 0)
							<span class="coursePriceSale">{{number_format((100*ROUND($course->cou_price/ (100 - $course->cou_sale))),0,',','.')}}<sup>đ</sup></span>
						@endif
					</li>
					<li>
						<span class="paraName">
							Thể loại:
						</span>
						<span class="paraValue">
							{{$course->group->gr_name}}
						</span>
					</li>
					<li>
						<span class="paraName">
							Trình độ:
						</span>
						<span class="paraValue">
							{{$course->cou_level}}
						</span>
					</li>
					<li>
						<span class="paraName">
							Số bài học:
						</span>
						<span class="paraValue">
							{{$video}}
						</span>
					</li>
					<li>
						<span class="paraName">
							Số học viên:
						</span>
						<span class="paraValue">
							{{$course->cou_student}}
						</span>
					</li>
					<li>
						<span class="paraName">
							Thời lượng video:
						</span>
						<span class="paraValue">
							
							{{gmdate("H:i", $course->cou_video)}}p
						</span>
					</li>
				</ul>
				@if(app('request')->input('aff') == null)
				<div class="btnCourse">
					<div class="btnBuyNow">
						<a href="{{asset('cart/buy/'.$course->cou_slug)}}">Mua khóa học</a>
					</div>
					<div class="btnAddToCart">
						<a href="{{asset('cart/add/'.$course->cou_slug)}}">Thêm vào giỏ hàng</a>
					</div>
				</div>
				@else
				<div class="btnCourse">
					<div class="btnBuyNow">
						<a href="{{asset('cart/buy/'.$course->cou_slug.'?aff='.app('request')->input('aff'))}}">Mua khóa học</a>
					</div>
					<div class="btnAddToCart">
						<a href="{{asset('cart/add/'.$course->cou_slug.'?aff='.app('request')->input('aff'))}}">Thêm vào giỏ hàng</a>
					</div>
				</div>
				@endif
				
			</div>
				
		</div>
	</div>
	
		
</div>
@stop
@section('script')
<script type="text/javascript" src="js/detailcourse.js"></script>
@stop

