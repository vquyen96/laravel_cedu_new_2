<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta property="og:url" 		content="{{ str_replace('https', 'http', Request::url())}}" />


	<meta property="fb:app_id" 		content="1577563652342523" />
	<meta property="og:title" 		content="@yield('fb_title')" />
	<meta property="og:description" content="@yield('fb_description')" />
	<meta property="og:image" 		content="@yield('fb_image')" />
	<meta property="og:image:type" 	content="image/png">
	<meta property="og:image:width" content="300">
	<meta property="og:image:height" content="300">
	<!-- Global Site Tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=GA_TRACKING_ID"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-123557478-1');
	</script>
	<title>@yield('title')</title>


	<base href="{{asset('public/layout/frontend')}}/">
	<link rel="shortcut icon" href="img/LOGO_CEDU1.png">

	<meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- <meta property="og:url" content="https://developers.zalo.me/" />
	<meta property="og:title" content="Zalo For Developers" />
	<meta property="og:image" content="https://developers.zalo.me/web/static/prodution/zalo.png" />
	<meta property="og:description" content="Trang thông tin về Zalo dành cho cộng đồng lập trình viên" />  --}}

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	{{-- <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"> --}}
	{{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous"> --}}
	<link rel="stylesheet" type="text/css" href="css/font/all.css">

	<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Serif:500|Roboto:400,500" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700,800" rel="stylesheet">

	{{--<link rel="stylesheet" href="css/plugin/bootstrap.min.css">--}}
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="css/master.css">
	<link rel="stylesheet" type="text/css" href="css/layout/header.css">
	<link rel="stylesheet" type="text/css" href="css/layout/footer.css">
	<link rel="stylesheet" type="text/css" href="css/layout/instruction.css">
</head>

<body onunload="end()">

	<div class="currentUrl" style="display: none;">{{ asset('') }}</div>

	<div id="status">
	</div>
	<div id="messenger">
		<a href="https://www.facebook.com/messages/t/ceducationvn" target="_blank">
			<img src="img/messenger-1495274_960_720.png" alt="">
		</a>
	</div>
	<div class="masterError">
		<div class="masterErrorContent">
			@include('errors.note')
		</div>
	</div>
	<div class="loadingPage">
		<div class="loadingPageIcon">
			<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
		</div>
	</div>
	<input type="hidden" name="url" value="{{ asset('')}}">

	{{-- <div class="btnScrollTop">
		<i class="fa fa-angle-double-up" aria-hidden="true"></i>
	</div> --}}
	@include('frontend.layout.header')

	<main>
		@yield('main')
	</main>
    @if(Request::segment(1) != null)
        @include('frontend.layout.footer')
    @endif
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/master.js"></script>
	{{--<script type="text/javascript" src="js/index/index.js"></script>--}}
	@yield('script')

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

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
{{-- <script>
	
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '{your-app-id}',
      cookie     : true,
      xfbml      : true,
      version    : '{api-version}'
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
</script> --}}

</body>
</html>