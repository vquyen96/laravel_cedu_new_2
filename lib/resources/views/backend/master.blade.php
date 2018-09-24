<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')|| Admin</title>
	<base href="{{asset('public/layout/backend')}}/">
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="shortcut icon" href="img/cedu_icon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">


</head>
<body>
	<div class="currentUrl" style="display: none;">{{ asset('') }}</div>
	<div class="bt-mobile">
		<span></span>
		<span></span>
		<span></span>
	</div>
	<div class="masterError">
		<div class="masterErrorContent">
			@include('errors.note')
		</div>
		
	</div>
	<header class="container_fluid">
		<div class="row">
			<div class=" col-md-4 col-sm-6 col-xs-12">
				<div class="headerLogo">
					<a href="{{asset('admin')}}">
						<img src="img/LOGO_CEDU1.png">
						
					</a>


				</div>

			</div>
			<div class="col-md-8 col-sm-6 col-xs-12">
				<div class="headerAccount">
					<a href="" class="headerAccountName">
						<span class="glyphicon glyphicon-user"></span>
						{{Auth::user()->email}}
					</a>
					<a href="{{asset('logout')}}" class="headerAccountLogout">
						<span class="glyphicon glyphicon-log-out"></span>
						Đăng xuất
					</a>
				</div>
				
			</div>
			
		</div>
	</header>
	<nav>
		<ul>
			<li>
				<a href="{{asset('admin/user')}}" class="navUser navAccount @if (Request::segment(2) == 'user')  active @endif">
					<img src="{{ file_exists(storage_path('app/avatar/resized50-'.
					Auth::user()->img)) ? asset('lib/storage/app/avatar/resized50-'.Auth::user()->img) : asset('lib/storage/app/avatar/resized-'.Auth::user()->img) }}">
					{{ Auth::user()->name }}
				</a>
			</li>
			@if(Auth::user()->level == 3 || Auth::user()->level == 1 ||  Auth::user()->level == 7)
			<li>
				<a href="{{asset('admin/')}}" class="navAccount @if (Request::segment(2) == '')  active @endif">
					Thống kê
				</a>
			</li>
			@endif

			@if(Auth::user()->level < 3)
			<li>
				<a href="{{asset('admin/account')}}" class="navAccount @if (Request::segment(2) == 'account')  active @endif">
					Tài khoản
				</a>
			</li>
			@endif

			@if(Auth::user()->level < 7 && Auth::user()->level != 5 && Auth::user()->level != 4
			)
			<li>
				<a href="{{asset('admin/affiliate')}}" class="navAccount @if (Request::segment(2) == 'affiliate')  active @endif">
					Cộng tác viên
				</a>
			</li>
			@endif

			@if(Auth::user()->level < 7 && Auth::user()->level != 6  && Auth::user()->level != 4)
			<li>
				<a href="{{asset('admin/teacher')}}" class="navAccount @if (Request::segment(2) == 'teacher')  active @endif">
					Giáo viên
				</a>
			</li>
			@endif

			@if(Auth::user()->level == 3) 
			<li>
				<a href="{{asset('admin/acc_req')}}" class="navAccount @if (Request::segment(2) == 'request')  active @endif">
					Yêu cầu rút tiền
				</a>
			</li>
			@endif

			@if(Auth::user()->level < 3 || Auth::user()->level == 5)
			<li>
				<a href="{{asset('admin/group')}}" class="navAccount @if (Request::segment(2) == 'group')  active @endif">
					Lĩnh vực
				</a>
			</li>
			@endif

			@if (Auth::user()->level < 4 || Auth::user()->level == 5 || Auth::user()->level == 7) 
			<li>
				<a href="{{asset('admin/course')}}" class="navAccount @if (Request::segment(2) == 'course')  active @endif">
					Khóa học
				</a>
			</li>
			@endif

			@if (Auth::user()->level < 3 || Auth::user()->level == 5 ) 
			<li>
				<a href="{{asset('admin/course_wait')}}" class="navAccount @if (Request::segment(2) == 'course_wait')  active @endif">
					Duyệt khóa học
				</a>
			</li>
			@endif

			@if(Auth::user()->level == 7)
			<li>
				<a href="{{asset('admin/teacher/detail/'.Auth::user()->id)}}" class="navAccount @if (Request::segment(2) == 'teacher')  active @endif">
					Hồ xơ
				</a>
			</li>
			@endif

			@if(Auth::user()->level ==  1 || Auth::user()->level ==  3 )
			<li>
				<a href="{{asset('admin/order')}}" class="navAccount @if (Request::segment(2) == 'order')  active @endif">
					Đơn hàng
				</a>
			</li>
			@endif

			@if(Auth::user()->level < 5 && Auth::user()->level !=  3 )
			<li>
				<a href="{{asset('admin/banner')}}" class="navAccount @if (Request::segment(2) == 'banner')  active @endif">
					Banner
				</a>
			</li>
			
			<li>
				<a href="{{asset('admin/news')}}" class="navAccount @if (Request::segment(2) == 'news')  active @endif">
					Tin tức
				</a>
			</li>
			
			<li>
				<a href="{{asset('admin/doc')}}" class="navAccount @if (Request::segment(2) == 'doc')  active @endif">
					Tài liệu
				</a>
			</li>
			@endif

			

			@if(Auth::user()->level < 5  && Auth::user()->level != 3)
			<li>
				<a href="{{asset('admin/gift')}}" class="navAccount @if (Request::segment(2) == 'gift')  active @endif">
					Mail quà tặng
				</a>
			</li>
			@endif
			@if(Auth::user()->level < 5  && Auth::user()->level != 3)
			<li>
				<a href="{{asset('admin/noti')}}" class="navAccount @if (Request::segment(2) == 'noti')  active @endif">
					Thông báo
				</a>
			</li>
			@endif
			
			@if(Auth::user()->level < 3 )
			<li>
				<a href="{{asset('admin/about')}}" class="navAccount @if (Request::segment(2) == 'about')  active @endif">
					Giới thiệu
				</a>
			</li>
			@endif
			<li>
				<a href="{{asset('logout')}}" class="navAccount @if (Request::segment(2) == 'about')  active @endif">
					Đăng xuất
				</a>
			</li>

			
			
		</ul>
	</nav>
	<main>
		@yield('main')
	</main>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/editCom.js"></script>
	<script type="text/javascript">
		function changeImg(input){
	        //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
	        if(input.files && input.files[0]){
	        	var reader = new FileReader();
	            //Sự kiện file đã được load vào website
	            reader.onload = function(e){
	                //Thay đổi đường dẫn ảnh
	                $('#avatar').attr('src',e.target.result);
	            }
	            reader.readAsDataURL(input.files[0]);
	        }
	    }
	    $(document).ready(function() {
	    	$('#avatar').click(function(){
	    		$('#img').click();
	    	});
	    	$('#acc_req').click(function(){
	    		$('#sbm').click();
	    	});
	    	$('.bt-mobile').click(function(){

	    		$('nav').slideToggle(300);

	    	});
	    });
	</script>
	@yield('script')
</body>
</html>