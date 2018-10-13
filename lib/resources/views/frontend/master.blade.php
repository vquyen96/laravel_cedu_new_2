<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:url" content="{{ str_replace('https', 'http', Request::url())}}"/>


    <meta property="fb:app_id" content="1577563652342523"/>
    <meta property="og:title" content="@yield('fb_title')"/>
    <meta property="og:description" content="@yield('fb_description')"/>
    <meta property="og:image" content="@yield('fb_image')"/>
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="300">
    <!-- Global Site Tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=GA_TRACKING_ID"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

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
{{--<div id="messenger">--}}
{{--<a href="https://www.facebook.com/messages/t/ceducationvn" target="_blank">--}}
{{--<img src="img/messenger-1495274_960_720.png" alt="">--}}
{{--</a>--}}
{{--</div>--}}
<div class="masterError">
    <div class="masterErrorContent">
        @include('errors.note')
    </div>
</div>
<div class="loadingPage">
    <div class="loadingPageIcon">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
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

{{--<div id="fb-root"></div>--}}
{{--<script>(function (d, s, id) {--}}
{{--var js, fjs = d.getElementsByTagName(s)[0];--}}
{{--if (d.getElementById(id)) return;--}}
{{--js = d.createElement(s);--}}
{{--js.id = id;--}}
{{--js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";--}}
{{--fjs.parentNode.insertBefore(js, fjs);--}}
{{--}(document, 'script', 'facebook-jssdk'));</script>--}}

{{--<div style="position:fixed; z-index:9999999; right:10px; bottom:10px;" class="fb-page" data-tabs="messages"--}}
{{--data-href="https://www.facebook.com/ceducationvn/" data-width="250"--}}
{{--data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"--}}
{{--data-show-facepile="true" data-show-posts="false"></div>--}}


<style>
    .fb-livechat, .fb-widget {
        display: none
    }

    .ctrlq.fb-button, .ctrlq.fb-close {
        position: fixed;
        right: 24px;
        cursor: pointer
    }

    .ctrlq.fb-button {
        z-index: 999;
        background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDEyOCAxMjgiIGhlaWdodD0iMTI4cHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxMjggMTI4IiB3aWR0aD0iMTI4cHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxnPjxyZWN0IGZpbGw9IiMwMDg0RkYiIGhlaWdodD0iMTI4IiB3aWR0aD0iMTI4Ii8+PC9nPjxwYXRoIGQ9Ik02NCwxNy41MzFjLTI1LjQwNSwwLTQ2LDE5LjI1OS00Niw0My4wMTVjMCwxMy41MTUsNi42NjUsMjUuNTc0LDE3LjA4OSwzMy40NnYxNi40NjIgIGwxNS42OTgtOC43MDdjNC4xODYsMS4xNzEsOC42MjEsMS44LDEzLjIxMywxLjhjMjUuNDA1LDAsNDYtMTkuMjU4LDQ2LTQzLjAxNUMxMTAsMzYuNzksODkuNDA1LDE3LjUzMSw2NCwxNy41MzF6IE02OC44NDUsNzUuMjE0ICBMNTYuOTQ3LDYyLjg1NUwzNC4wMzUsNzUuNTI0bDI1LjEyLTI2LjY1N2wxMS44OTgsMTIuMzU5bDIyLjkxLTEyLjY3TDY4Ljg0NSw3NS4yMTR6IiBmaWxsPSIjRkZGRkZGIiBpZD0iQnViYmxlX1NoYXBlIi8+PC9zdmc+) center no-repeat #0084ff;
        width: 60px;
        height: 60px;
        text-align: center;
        bottom: 50px;
        border: 0;
        outline: 0;
        border-radius: 60px;
        -webkit-border-radius: 60px;
        -moz-border-radius: 60px;
        -ms-border-radius: 60px;
        -o-border-radius: 60px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .06), 0 1px 1px rgba(0, 0, 0, .16);
        -webkit-transition: box-shadow .2s ease;
        background-size: 80%;
        transition: all .2s ease-in-out
    }

    .ctrlq.fb-button:focus, .ctrlq.fb-button:hover {
        transform: scale(1.1);
        box-shadow: 0 1px 2px rgba(0, 0, 0, .09), 0 1px 4px rgba(0, 0, 0, .24)
    }

    .fb-widget {
        background: #fff;
        opacity: 0;
        z-index: 5;
        position: fixed;
        width: 360px;
        height: 400px;
        overflow: hidden;
        opacity: 0;
        bottom: 0;
        right: 24px;
        border-radius: 10px;
        -o-border-radius: 10px;
        -webkit-border-radius: 10px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .16);
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .16);
        -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, .16);
        -o-box-shadow: 0 1px 1px rgba(0, 0, 0, .16);
        max-width: 100%;

    }

    .fb-credit {
        text-align: center;
        margin-top: 8px
    }

    .fb-credit a {
        transition: none;
        color: #bec2c9;
        font-family: Helvetica, Arial, sans-serif;
        font-size: 12px;
        text-decoration: none;
        border: 0;
        font-weight: 400
    }

    .ctrlq.fb-overlay {
        z-index: 4;
        position: fixed;
        height: 100vh;
        width: 100vw;
        -webkit-transition: opacity .4s, visibility .4s;
        transition: opacity .4s, visibility .4s;
        top: 0;
        left: 0;
        background: rgba(0, 0, 0, .25);
        display: none
    }

    .ctrlq.fb-close {
        z-index: 4;
        padding: 0 6px;
        background: #365899;
        font-weight: 700;
        font-size: 11px;
        color: #fff;
        margin: 8px;
        border-radius: 3px
    }

    .ctrlq.fb-close::after {
        content: "X";
        font-family: sans-serif
    }

    .bubble {
        width: 20px;
        height: 20px;
        background: #c00;
        color: #fff;
        position: absolute;
        z-index: 999999999;
        text-align: center;
        vertical-align: middle;
        top: -2px;
        left: -5px;
        border-radius: 50%;
    }

    .bubble-msg {
        width: 120px;
        left: -140px;
        top: 5px;
        position: relative;
        background: rgba(59, 89, 152, .8);
        color: #fff;
        padding: 5px 8px;
        border-radius: 8px;
        text-align: center;
        font-size: 13px;
    }

    .fb_iframe_widget {
        border-radius: 10px;
        overflow: hidden;
    }

    img._1drn._-s.img {
        border: 0;
    }
</style>
<div class="fb-livechat">
    <div class="ctrlq fb-overlay"></div>
    <div class="fb-widget">
        <div class="ctrlq fb-close"></div>
        <div class="fb-page" data-href="https://www.facebook.com/ilovecedu" data-tabs="messages" data-width="360"
             data-height="400" data-small-header="true" data-hide-cover="true" data-show-facepile="false"></div>
        <div id="fb-root"></div>
    </div>
    <a href="https://m.me/ceducationvn" title="Gửi tin nhắn cho chúng tôi qua Facebook" class="ctrlq fb-button">
        <div class="bubble">1</div>
        <div class="bubble-msg">Bạn cần hỗ trợ?</div>
    </a></div>
<script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>$(document).ready(function () {
        function detectmob() {
            if (navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i)) {
                return true;
            } else {
                return false;
            }
        }

        var t = {delay: 125, overlay: $(".fb-overlay"), widget: $(".fb-widget"), button: $(".fb-button")};
        setTimeout(function () {
            $("div.fb-livechat").fadeIn()
        }, 8 * t.delay);
        if (!detectmob()) {
            $(".ctrlq").on("click", function (e) {
                e.preventDefault(), t.overlay.is(":visible") ? (t.overlay.fadeOut(t.delay), t.widget.stop().animate({
                    bottom: 0,
                    opacity: 0
                }, 2 * t.delay, function () {
                    $(this).hide("slow"), t.button.show()
                })) : t.button.fadeOut("medium", function () {
                    t.widget.stop().show().animate({bottom: "30px", opacity: 1}, 2 * t.delay), t.overlay.fadeIn(t.delay)
                })
            })
        }
    });</script>
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

    window.fbAsyncInit = function () {
        FB.init({
            appId: '1577563652342523',
            xfbml: true,
            version: 'v2.12'
        });
        FB.AppEvents.logPageView();
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
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