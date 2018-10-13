@extends('frontend.master')
@section('title',$course->cou_name)
@section('main')
<link rel="stylesheet" type="text/css" href="css/courseActive.css">
<link rel="stylesheet" href="css/circle.css">
<div class="courseActive">
	<div class="headMain">
		<img src="{{asset('lib/storage/app/course/'.$course->cou_img)}}">
	</div>
	<h1>{{$course->cou_name}}</h1>
	<div class="container bodyMain">
		<div class="row">
			<div class="col-md-8 col-sm-8">
				<div class=" mainItem headMenu">
					<ul>
						<li>
							<a id="courseHeader" class="active">Giới thiệu</a>
						</li>
						<li>
							<a id="courseVideo">Cấu trúc bài giảng</a>
						</li>
						<li>
							<a  id="courseDetail">Mô tả khóa học</a>
						</li>
					</ul>
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
							<a href="{{asset('courses/detail/'.$course->cou_slug.'.html/video/'.$video)}}">
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
							</a>
							<?php $video++ ?>
							@endforeach
						@endforeach
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
					
				</div>
				<div class="mainItem courseComment">
					<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="100%" data-numposts="5"></div>
				</div>
			</div>

			<div class="col-md-4 col-sm-4">
				<div class="courseRate">
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
			            	@if($rat != null)
			            		@for($i=0;$i<5;$i++)
									@if($rat->rat_star > $i)
										<i class="fa fa-star starActive" id="star{{$i}}" aria-hidden="true"></i>
									@else
										<i class="fa fa-star" id="star{{$i}}" aria-hidden="true"></i>
									@endif
								@endfor
			            	@else
			            		@for($i=0;$i<5;$i++)
			            			<i class="fa fa-star" id="star{{$i}}" aria-hidden="true"></i>
								@endfor
			            	@endif
				            	
			            </div>
					</div>
					<div class="courseRateContent">
						@if($rat != null)
							<form method="post" enctype="multipart/form-data" action="{{asset('rating/edit/'.$rat->rat_id.'/'.$course->cou_slug)}}">
								<div class="form-group">
								    <input type="hidden" class="form-control" id="star" name="star" required>
								</div>
								<div class="form-group">
								    <input type="text" class="form-control" value="{{$rat->rat_title}}" name="title" required>
								</div>
								<div class="form-group">
								    <textarea class="form-control" name="content" rows="5">{{$rat->rat_content}}</textarea>
								</div>
								<div class="form-group">
							    	<input type="submit" class="btn btn-success" value="Thay đổi">
							    	
							  	</div>
					  			{{csrf_field()}}
							</form>
						@else
							<form method="post" enctype="multipart/form-data" action="{{asset('rating/add/'.$course->cou_slug)}}">
								<div class="form-group">
								    <input type="hidden" class="form-control" id="star" name="star" required>
								</div>
								<div class="form-group">
								    <input type="text" class="form-control" value="" name="title" required placeholder="Tiêu đề">
								</div>
								<div class="form-group">
								    <textarea class="form-control" name="content" rows="5" placeholder="Nội dung"></textarea>
								</div>
								<div class="form-group">
							    	<input type="submit" class="btn" value="Đánh giá">
							    	
							  	</div>
					  			{{csrf_field()}}
							</form>
						@endif
							
					</div>
				</div>
				<div class="courseTeacher">
					<div class="courseTeacherHead">
						<img src="{{asset('lib/storage/app/avatar/'.$course->tea->img)}}">
						<p>Giảng viên</p>
						<h3>{{$course->tea->name}}</h3>
						<a href="{{asset('teacher/'.$course->tea->email)}}">Xem hồ sơ</a>
					</div>
					<div class="courseTeacherContent">
						<p>{!!cut_string($course->tea->content, 400)!!}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
@stop
@section('script')
<script type="text/javascript" src="js/courseActive.js"></script>
@stop

