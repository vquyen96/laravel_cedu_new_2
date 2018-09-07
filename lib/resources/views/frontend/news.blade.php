@extends('frontend.master')
@section('title','Tin tức')
@section('main')
<link rel="stylesheet" type="text/css" href="css/news.css">

<div >
	{{-- <div class="mainHead">
		<div class="mainHeadLine"></div>
		<div class="mainHeadTitle">
			<h3>Tin tức</h3>
		</div>
	</div> --}}
	<div class="container mainBody">
		<div class="row newsHeadBig">
			<div class="col-md-12 col-sm-12 col-xs-12">
				{{-- <img src="img/avi-richards-183715-unsplash.png"> --}}
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				  <!-- Indicators -->
				  <ol class="carousel-indicators">
				  	<?php $i = 0 ?>

				  	@foreach($newsHead as $item)
				  	
				    <li data-target="#carousel-example-generic" data-slide-to="{{$i}}"></li>
				    <?php $i++ ?>
				    @endforeach
				    
				  </ol>

				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">
				  	@foreach($newsHead as $item)
				    <div class="item">
				    	<a href="{{ asset('news/detail/'.$item->news_slug) }}">
				    		<img src="{{ asset('lib/storage/app/news/'.$item->news_img) }}" alt="...">
				    	</a>
				    </div>
				    @endforeach
				  </div>

				  <!-- Controls -->
				  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>
			</div>
		</div>
		<div class="row newsHeadSmail">
			@foreach($newInWeekL as $item)

			<div class="col-md-4 col-sm-4 col-xs-4 ">
				<a href="{{ asset('news/detail/'.$item->news_slug)}}" class="newsHeadSmailItem">
					<div class="newsHeadSmailImg thumbnail">
						<img  src="{{asset('lib/storage/app/news/'.$item->news_img)}}">
					</div>
					<div class="newsHeadSmailDetail">
						<div class="newsHeadSmailTime">
							<img src="img/ic_time1.png">
							<span>{{time_format($item->created_at)}}</span>
						</div>
						<div class="newsHeadSmailView">
							<i class="fa fa-eye" aria-hidden="true"></i>
							<span>{{number_format($item->news_view,0,',','.')}}</span> lượt xem
						</div>
					</div>
					<div class="newsHeadSmailFoot">
						<div class="newsHeadSmailTitle">
							{{$item->news_title}}
						</div>
						
						<div class="newsHeadSmailContent">
							{{-- {!!cut_string($item->news_content, 20)!!} --}}
						</div>
					</div>
				</a>
					
			</div>
			@endforeach
			
		</div>
		<div class="row newsWeek">
			<div class="newsWeekHead">
				<div class="newsWeekLine"></div>
				<div class="newsWeekTitle">
					<h3>Tin mới trong tuần</h3>
				</div>
			</div>
			<div class="newsWeekBody">
				<div class="col-md-4 col-sm-4 newInWeekL">
					@foreach($newInWeekL as $item)
					<a href="{{ asset('news/detail/'.$item->news_slug) }}" class="newsItem">
						<div class="newsItemImg">
							<div>
								<img src="{{asset('lib/storage/app/news/'.$item->news_img)}}">
							</div>
							
						</div>
						<div class="newsWeekDetail">
							<div class="newsHeadSmailTime">
								<img src="img/ic_time1.png">
								<span>{{time_format($item->created_at)}}</span>
							</div>
							<div class="newsHeadSmailView">
								<i class="fa fa-eye" aria-hidden="true"></i>
								<span>{{number_format($item->news_view,0,',','.')}} lượt xem</span>
							</div>
							
						</div>
						<div class="newsWeekFoot">
							<div class="newsWeekItemTitle">
								{{cut_string($item->news_title,40)}}
							</div>
							
							<div class="newsWeekContent">
								{!!cut_string($item->news_content,150)!!}
							</div>
						</div>
					</a>
					@endforeach
				</div>
				<div class="col-md-4 col-sm-4 newInWeekM">
					@foreach($newInWeekM as $item)
					<a href="{{ asset('news/detail/'.$item->news_slug) }}" class="newsItem">
						<div class="newsItemImg">
							<img src="{{asset('lib/storage/app/news/'.$item->news_img)}}">
						</div>
						<div class="newsWeekDetail">
							<div class="newsHeadSmailTime">
								<img src="img/ic_time1.png">
								<span>{{time_format($item->created_at)}}</span>
							</div>
							<div class="newsHeadSmailView">
								<i class="fa fa-eye" aria-hidden="true"></i>
								<span>{{number_format($item->news_view,0,',','.')}} lượt xem</span>
							</div>
							
						</div>
						<div class="newsWeekFoot">
							<div class="newsWeekItemTitle">
								{{cut_string($item->news_title,40)}}
							</div>
							
							<div class="newsWeekContent">
								{!!cut_string($item->news_content,150)!!}
							</div>
						</div>
					</a>
					@endforeach
				</div>
				<div class="col-md-4 col-sm-4 newInWeekR">
					@foreach($newInWeekR as $item)
					<a href="{{ asset('news/detail/'.$item->news_slug) }}" class="newsItem">
						<div class="newsItemImg">
							<img src="{{asset('lib/storage/app/news/'.$item->news_img)}}">
						</div>
						<div class="newsWeekDetail">
							<div class="newsHeadSmailTime">
								<img src="img/ic_time1.png">
								<span>{{time_format($item->created_at)}}</span>
							</div>
							<div class="newsHeadSmailView">
								<i class="fa fa-eye" aria-hidden="true"></i>
								<span>{{number_format($item->news_view,0,',','.')}} lượt xem</span>
							</div>
							
						</div>
						<div class="newsWeekFoot">
							<div class="newsWeekItemTitle">
								{{cut_string($item->news_title,40)}}
							</div>
							<div class="newsWeekContent">
								{!!cut_string($item->news_content,150)!!}
							</div>
						</div>
					</a>
					@endforeach
				</div>
			</div>
		</div>
		<div class="row newsCare">
			<div class="newsCareHead">
				<div class="newsCareLine"></div>
				<div class="newsCareTitle">
					<h3>Tin được quan tâm</h3>
				</div>
			</div>
			<div class="newsCareBody">
				<div class="col-md-8 col-sm-8">
					<div class="row">
						@foreach($newMostFollowL as $item)
						<div class="col-md-6 col-sm-6">
							<a href="{{ asset('news/detail/'.$item->news_slug) }}" class=" newsItemShort">
								<div class="newsItemImg">
									<img src="{{asset('lib/storage/app/news/'.$item->news_img)}}">
								</div>
								<div class="newsWeekDetail">
									<div class="newsHeadSmailTime">
										<img src="img/ic_time1.png">
										<span>{{time_format($item->created_at)}}</span>
									</div>
									<div class="newsHeadSmailView">
										<i class="fa fa-eye" aria-hidden="true"></i>
										<span>{{number_format($item->news_view,0,', lượt xem','.')}} lượt xem</span>
									</div>
									
								</div>
								<div class="newsWeekFoot">
									<div class="newsWeekItemTitle">
										{{cut_string($item->news_title,40)}}
									</div>
									<div class="newsWeekContent">
										{!!cut_string($item->news_content,150)!!}
									</div>
								</div>
							</a>
						</div>
						@endforeach
						
						
					</div>
				</div>
				
				<div class="col-md-4 col-sm-4">
					@foreach($newMostFollowR as $item)
					<div class="row">
						<div class="newsItemSmail">
							<div class="newsItemSmailImg">
								<a href="{{ asset('news/detail/'.$item->news_slug) }}">
									<img src="{{asset('lib/storage/app/news/'.$item->news_img)}}">
								</a>
							</div>
							
							<div class="newsItemSmailTitle">
								{{cut_string($item->news_title,40)}}
							</div>
							<div class="newsItemSmailTime">
								<img src="img/ic_time1.png">
								<span>{{time_format($item->created_at)}}</span>
							</div>
							<div class="newsItemSmailContent">
								{!!cut_string($item->news_content,120)!!}
							</div>
						</div>
					</div>
					@endforeach
										
				</div>
			</div>
		</div>
		<div class="row newsOrther">
			@foreach($newInWeekL as $item)
			<div class="col-md-4 col-sm-4">
				<div class="newsItemShort">
					<div class="newsItemImg">
						<a href="{{ asset('news/detail/'.$item->news_slug) }}">
							<img src="{{asset('lib/storage/app/news/'.$item->news_img)}}">
						</a>
					</div>
					<div class="newsWeekDetail">
						<div class="newsHeadSmailTime">
							<img src="img/ic_time1.png">
							<span>{{time_format($item->created_at)}}</span>
						</div>
						<div class="newsHeadSmailView">
							<i class="fa fa-eye" aria-hidden="true"></i>
							<span>{{number_format($item->news_view,0,',','.')}}</span> lượt xem
						</div>
						
					</div>
					<div class="newsWeekFoot">
						<div class="newsWeekItemTitle">
							{{cut_string($item->news_title,40)}}
						</div>
						
						<div class="newsWeekContent">
							{!!cut_string($item->news_content,180)!!}
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
@stop
@section('script')
<script type="text/javascript" src="js/news.js"></script>
@stop

