<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>


	<base href="{{asset('public/layout/frontend')}}/">
	<link rel="shortcut icon" href="{{ asset('public/layout/frontend/img/BUT.png') }}">
	<meta charset="utf-8">

	<meta property="og:url" 		content="{{Request::url()}}" />

	<meta property="fb:app_id" 		content="1577563652342523" />
	<meta property="og:title" 		content="@yield('fb_title')" />
	<meta property="og:description" content="@yield('fb_description')" />
    <meta property="og:image" 		content="@yield('fb_image')" />
    <meta property="og:image:type" 	content="image/png">
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="300">

    {{-- <meta property="og:url" content="https://developers.zalo.me/" />
	<meta property="og:title" content="Zalo For Developers" />
	<meta property="og:image" content="https://developers.zalo.me/web/static/prodution/zalo.png" />
	<meta property="og:description" content="Trang thông tin về Zalo dành cho cộng đồng lập trình viên" />  --}}

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Serif:500|Roboto:400,500" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/video.css">

</head>

<body>

<div class="videoMain">
	<link href="http://vjs.zencdn.net/6.6.3/video-js.css" rel="stylesheet">
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-9 col-sm-9">
				<div class="videoCourse">
					<script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
					<video id="my-video" class="video-js" controls preload="auto"
				  poster="" data-setup="{}" autoplay src="{{ asset('lib/public/uploads/'.$video) }}">
					    <source src="{{ asset('lib/public/uploads/'.$video) }}" type='video/webm'>
					    <p class="vjs-no-js">
					      To view this video please enable JavaScript, and consider upgrading to a web browser that
					      <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
					    </p>
				 	</video>
				</div>
				<div id="link" style="display: none;">
					{{$video}}
				</div>
			</div>
			<div class="col-md-3 col-sm-3 videoMainItem">
				<?php $videoCount = 0 ?>
					@foreach($course->part as $item)
						<h4>{{$item->part_name}}</h4>
						@foreach($item->lesson as $itemTiny)	
						<a href="{{asset('courses/detail/'.$course->cou_slug.'.html/video/'.$videoCount)}}">
							<div class="videoItem">
								<div class="videoIctemBtnPlay">
									<i class="fa fa-play-circle-o" aria-hidden="true"></i>
								</div>
								<div class="videoItemTitle">
									{{$itemTiny->les_name}}
								</div>
								<div class="videoItemTime">
									{{$itemTiny->les_video_duration}}
								</div>
							</div>
						</a>
						<?php $videoCount++ ?>
						@endforeach
					@endforeach
			</div>
		</div>
		
	</div>
  	

</div>



{{-- <script type="text/javascript">
	var myVideoPlayer = document.getElementById('my-video');
	
	var URL = window.URL || window.webkitURL;
	var video = document.getElementsByTagName('video')[0];
	var vid = document.getElementsByTagName('textarea');
	$('#video').attr('style','display: none');
	var url = '{{asset('lib/public/uploads')}}/';
	url += '{{$video}}';
	console.log(url);
	var xhr = new XMLHttpRequest();
	xhr.open('GET', url, true);
	xhr.responseType = 'blob';
	xhr.onload = function(e) {
	  	if (this.status == 200) {
	  	  	var myObject = this.response;
	  	  	var url = URL.createObjectURL(myObject);
	  	  	console.log(url);
	  	  	video.src = url;
	  	}
	};
	xhr.send();
	console.log(xhr);
	function onChange() {
	    var fileItem = document.getElementById('fileItem');
	    var files = fileItem.files;
	    var file = files[0];
	    $('#video').show();
	   	var url = URL.createObjectURL(file);
	   	video.src = url;
	    video.load();
	    video.onloadeddata = function() {
	    	URL.revokeObjectURL(this.src); 
	        video.play();
	        $('#duration').val(video.duration);
	        console.log(video.duration);
	    }
	}
</script> --}}


	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script src="http://vjs.zencdn.net/6.6.3/video.js"></script>
	<script>
	  window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '1577563652342523',
	      xfbml      : true,
	      version    : 'v2.12'
	    });
	    FB.AppEvents.logPageView();
	  };

	  (function(d, s, id){
	     var js, fjs = d.getElementsByTagName(s)[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement(s); js.id = id;
	     js.src = "https://connect.facebook.net/en_US/sdk.js";
	     fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));
	</script>	
	<!--Start of Tawk.to Script-->
	{{-- <script type="text/javascript">
	var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
	(function(){
	var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
	s1.async=true;
	s1.src='https://embed.tawk.to/5b3c71934af8e57442dc5245/default';
	s1.charset='UTF-8';
	s1.setAttribute('crossorigin','*');
	s0.parentNode.insertBefore(s1,s0);
	})();
	</script>
	--}}
</body>
</html>