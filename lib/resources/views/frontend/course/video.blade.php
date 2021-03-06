@extends('frontend.master')
@section('title', $video->les_name)
@section('fb_title', $video->les_name)
@section('fb_description','Nơi cung cấp cho bạn những khóa học tốt nhất, rẻ nhất. Tạo lên một môi trường học tập trên cuộc cách mạng công nghệ 4.0')
@section('fb_image',asset('lib/storage/app/course/'.$course->cou_name))
@section('main')
<link rel="stylesheet" href="css/owlcarousel/owl.carousel.min.css">
<link rel="stylesheet" href="css/owlcarousel/owl.theme.default.min.css">
<link rel="stylesheet" type="text/css" href="css/course/detail.css">
<link href="css/plugins/video-js.css" rel="stylesheet">

<div class="instruction">

	<div class="instruction_body">
		<a href="{{ asset('courses') }}" class="instruction_item">
			Khóa học
		</a>
		<a class="instruction_item">
			>
		</a>
		<a href="{{ asset('courses/'.$course->group->gr_slug) }}" class="instruction_item">
			{{$course->group->gr_name}}
		</a>
		<a class="instruction_item">
			>
		</a>
		<a href="{{ asset('courses/detail/'.Request::segment(3)) }}" class="instruction_item">
			{{ $course->cou_name }}
		</a>
		<a class="instruction_item">
			>
		</a>
		<a href="{{ Request::url() }}" class="instruction_item">
			Bài {{ Request::segment(5)+1 }}
		</a>

	</div>

</div>
<div class="main_body">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="courseTitle">
					<h1>{{ $video->les_name }}</h1>
					<div class="courseTitleContent">
						The only course you need to learn web development - HTML, CSS, JS, Node, and More and More!!!
					</div>
				</div>
				<div class="courseRate">
					<div class="courseRateStar">
						@for($i=0;$i<5;$i++)
							@if($course->cou_star > $i)
								<i class="fa fa-star starActive" aria-hidden="true"></i>
							@else
								<i class="fa fa-star" aria-hidden="true"></i>
							@endif
						@endfor
					</div>
					<div class="courseRateContent">
						{{ number_format($course->cou_star, 1, '.','.') }} ( {{ $course->rating->count() }} người bình chọn)
					</div>
				</div>

				<div class="courseHeadVideo">

					{{--<video id="my-video" class="video-js" controls preload="auto"--}}
				  {{--poster="img/poster.png">--}}
					    {{--<source src="{{ asset('lib/public/uploads/'.$video->les_link) }}" type='video/webm'>--}}
					    {{--<p class="vjs-no-js">--}}
					      	{{--<a href="{{ asset('') }}" target="_blank"></a>--}}
					    {{--</p>--}}
				 	{{--</video>--}}
					<video id="my-video" class="video-js" controls preload="auto"
						   poster="img/poster72.png" autoplay  src="" data-setup='{ "playbackRates": [0.5, 0.75, 1, 1.5, 2, 4, 8] }'>
						<source src="{{ $video->les_link }}" type='video/webm'>

					</video>
				</div>
				@if($leaning)
					@if($leaning->status == 1)
						<p style="font-style: italic;color: red"><b>Bạn đang xem ở {{gmdate('H:i:s',$leaning->time_in_video)}}</b></p>
					@else
						<p style="font-style: italic;color: red"><b>Bạn đã xem hết video</b></p>
					@endif
				@endif
				<input id="lesson-id" value="{{$video->les_id}}" class="d-none">
			</div>
		</div>
		<div class="row">
			<div class="col-md-7 col-sm-7">

				<div class="lesson">
					<div class="lessonTitle">
						<h2>Cấu trúc bài giảng</h2>
						<div class="numOfLesson">
							{{ count($listVideo) }} bài giảng
						</div>
						<div class="timeOfLesson">
							{{gmdate("H:i", $course->cou_video)}}h
						</div>
					</div>
					<div class="lessonMain">
						<?php $video_num = 0 ?>
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
                                <div class="lessonMainVideo" style="{{ $video_num <= Request::segment(5) ? 'display : block;' : ''  }}">
                                    @foreach($item->lesson as $itemTiny)
                                        <div href="" class="lessonMainVideoItem">
                                            @if ($itemTiny->check == 2)
                                                <div class="lessonMainVideoIcon done">
                                                    <i class="fa fa-check-double"></i>
                                                </div>
                                            @else
                                                @if ($itemTiny->check == 1)
                                                    <div class="lessonMainVideoIcon pause">
                                                        <i class="far fa-pause-circle"></i>
                                                    </div>
                                                @else
                                                    <div class="lessonMainVideoIcon none">
                                                        <i class="far fa-play-circle"></i>
                                                    </div>
                                                @endif
                                            @endif


                                            <div class="lessonMainVideoIcon">
                                                <i class="fas fa-video"></i>
                                            </div>
                                            <div class="lessonMainVideoTitle">
                                                <a href="{{asset('courses/detail/'.$course->cou_slug.'.html/video/'.$video_num)}}">
                                                    {{$itemTiny->les_name}}
                                                </a>
                                            </div>
                                            @if (isset($itemTiny->les_doc_link))
                                                <div class="lessonMainVideoDoc">
                                                    <a href="{{ isset($itemTiny->les_doc_link) ? asset('lib/storage/app/doc/'.$itemTiny->les_doc_link) : '' }}" target="blank">
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                </div>
                                            @endif

                                            <div class="lessonMainVideoTime">
                                                {{ gmdate("i:s", $itemTiny->les_video_duration) }}
                                            </div>
                                        </div>
                                        <?php $video_num++ ?>
                                    @endforeach
                                </div>
                            </div>


						@endforeach
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
									<div class="rateMainItemAvaImg" style="background: url('{{ file_exists(storage_path('app/avatar/resized360-'.$item->acc->img)) ? asset('lib/storage/app/avatar/resized360-'.$item->acc->img) : ($item->acc->provider == 'facebook' ? str_replace('type=normal', 'width=1920', $item->acc->img) : ($item->acc->provider == 'google' ? str_replace('?sz=50', '', $item->acc->img) : 'img/no-avatar.jpg')) }}') no-repeat center /cover" >

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
						<div class="rateMainItem form">
							<div class="rateMainItemAva">
								<div class="rateMainItemAvaImg" style="background: url('{{ file_exists(storage_path('app/avatar/resized360-'.Auth::user()->img)) ? asset('lib/storage/app/avatar/resized360-'.Auth::user()->img) : (Auth::user()->provider == 'facebook' ? str_replace('type=normal', 'width=1920', Auth::user()->img) : (Auth::user()->provider == 'google' ? str_replace('?sz=50', '', Auth::user()->img) : 'img/no-avatar.jpg')) }}') no-repeat center /cover" >

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
									<div class="rateMainItemContentStarContent last rateStar">
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


					</div>
				</div>
			</div>
			<div class="col-md-1 col-sm-1"></div>
			<div class="col-md-4 col-sm-4">
				<div class="courseTag">
					<div class="courseTagDoc">
						<div class="courseTagDocTitle">
							Tài liệu
						</div>
						<div class="courseTagDocBody">
							@foreach($doc as $item)
								@if (!isset($item->doc_les_id) || $item->doc_les_id == null)
									<a href="{{ asset('lib/storage/app/doc/'.$item->doc_link) }}" class="courseTagDocBodyItem" target="_blank">
										<div class="courseTagDocBodyItemIcon">
											<i class="fas fa-download"></i>
										</div>
										<div class="courseTagDocBodyItemContent">
											{{ $item->doc_name}}
										</div>
									</a>
								@endif
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
@section('script')
	@if(isset($leaning->time_in_video) && $leaning->time_in_video != 0)
		<script>
            $(window).on('load', function () {
                var les_id = $('#lesson-id').val();
                var acc_id = {{ Auth::user()->id }};
                $.ajax({
                    method: 'POST',
                    async: false,
                    url: url + 'courses/get_leaning',
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        'les_id': les_id,
                        'acc_id': acc_id
                    },
                    success: function (resp) {

                        if (resp.time_in_video > 10 && resp.time_in_video < {{ $video->les_video_duration-5 }}){
                            var check = confirm("Bạn đang xem ở "+SecondsTohhmmss(resp.time_in_video)+", bạn có muốn xem tiếp?");
                            if (check) {
                                var vid = document.getElementById("my-video_html5_api");
                                vid.currentTime = resp.time_in_video;
                            }
                        }
                    },
                    error: function () {}
                });

                {{--if ({{ $leaning->time_in_video }} > 10 && {{ $leaning->time_in_video }} < {{ $video->les_video_duration-5 }}){--}}
                    {{--var check = confirm("Bạn đang xem ở {{gmdate('H:i:s',$leaning->time_in_video)}}, bạn có muốn xem tiếp?");--}}
                    {{--if (check) {--}}
                        {{--var vid = document.getElementById("my-video_html5_api");--}}
                        {{--vid.currentTime = {{$leaning->time_in_video}};--}}
                    {{--}--}}
				{{--}--}}

            });
            var SecondsTohhmmss = function(totalSeconds) {
                var hours   = Math.floor(totalSeconds / 3600);
                var minutes = Math.floor((totalSeconds - (hours * 3600)) / 60);
                var seconds = totalSeconds - (hours * 3600) - (minutes * 60);

                // round seconds
                seconds = Math.round(seconds * 100) / 100

                var result = (hours < 10 ? "0" + hours : hours);
                result += ":" + (minutes < 10 ? "0" + minutes : minutes);
                result += ":" + (seconds  < 10 ? "0" + seconds : seconds);
                return result;
            }
		</script>
	@endif
	<script src="js/plugins/video.js"></script>
	<script type="text/javascript" src="js/courses/detail.js"></script>
	<script src="https://vjs.zencdn.net/7.1.0/video.js"></script>

	<script >
        var vid = document.getElementById("my-video_html5_api");
        var url = $('.currentUrl').text();
        $(document).ready(function(){
            $('#my-video_html5_api').on('ended',function(){
                end();
                window.location.href = url+'courses/detail/{{ $course->cou_slug }}.html/video/'+{{Request::segment(5)+1}};
            });
        });

        function end() {
            var url = $('.currentUrl').text();
            var vid = document.getElementById("my-video_html5_api");
            var current_time = vid.currentTime;
            var les_id = $('#lesson-id').val();
            console.log('12121-'+current_time);
            $.ajax({
                method: 'POST',
                async: false,
                url: url + 'courses/time_lession/update_time_les',
                data: {
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                    'les_id': les_id,
                    'current_time' : current_time
                },
                success: function (resp) {
                    console.log(resp);
                },
                error: function () {}
            });
            return false;
        }

        // $(document).ready(start());
	</script>
@stop