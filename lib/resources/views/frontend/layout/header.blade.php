
<div class="container">
	<div class="header-mobile">
		<div class="headerLeftLogo-mb">
			<a href="{{ asset('') }}">
				<img src="img/LOGO_CEDU1.png">
			</a>
		</div>
		<div class="button-menu">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
</div>
<header>
	<div class="headerLeft">
		<div class="headerLeftLogo">
			<a href="{{ asset('') }}">
				<img src="img/LOGO_CEDU1.png">
			</a>
		</div>
		@if (Auth::guest() || Auth::user()->level != 7 )
		<div class="headerLeftItem headerDropdown">
			<a>
				Khóa học
			</a>
			<div class="headerItemDropdown course">
				@foreach($groups as $item)
				<div class="headerItemDropdownItem">
					<div class="headerItemDropdownItemIcon">
						<img src="{{ asset('lib/storage/app/group/'.$item->gr_img) }}">
					</div>
					<a href="{{ asset('courses/'.$item->gr_slug) }}" class="headerItemDropdownItemContent">
						{{ $item->gr_name }}
					</a>
				</div>
				@endforeach
			</div>
		</div>
		<div class="headerLeftItem {{ Request::segment(1) != '' ? 'd-none' : '' }}">
			<a href="{{ asset('doc') }}">
				Tài liệu
			</a>
		</div>
		<div class="headerLeftItem {{ Request::segment(1) != '' ? 'd-none' : '' }}">
			<a href="{{ asset('news') }}">
				Tin tức
			</a>
		</div>
		<div class="headerLeftItem {{ Request::segment(1) != '' ? 'd-none' : '' }}">
			<a href="{{ asset('partner') }}">
				Trở thành đối tác
			</a>
		</div>
		<div class="headerLeftItem {{ Request::segment(1) == '' ? 'd-none' : '' }} searchHeader">
			<form method="get" action="{{ asset('search') }}">

				<input type="text" name="search" class="inputSearchHead" placeholder="Search">
				<div class="iconSearchHead">
					<i class="fas fa-search"></i>
				</div>
			</form>
		</div>
		@endif

		@if (Auth::check() && Auth::user()->level == 8)
		{{-- expr --}}
		@endif

		@if (Auth::check() && Auth::user()->level == 7)
		<div class="headerLeftItem">
			<a href="{{ asset('teacher/dashboard') }}">
				Thống kê
			</a>
		</div>
		<div class="headerLeftItem">
			<a href="{{ asset('teacher/courses') }}">
				Khóa học
			</a>
		</div>
		@endif


	</div>

	<div class="headerRight">
		@if (Auth::guest() || Auth::user()->level > 7)
		<div class="headerRightItem headerDropdown {{ Request::segment(1) == '' ? 'd-none' : '' }}">
			<a>
				<i class="fas fa-ellipsis-h"></i>
			</a>
			<div class="headerItemDropdown menu">
				<div class="headerItemDropdownItem">
					<div class="headerItemDropdownItemIcon">
						<i class="fas fa-file-alt"></i>
					</div>
					<a href="{{ asset('doc') }}" class="headerItemDropdownItemContent">
						Tài liệu
					</a>
				</div>
				<div class="headerItemDropdownItem">
					<div class="headerItemDropdownItemIcon">
						<i class="far fa-newspaper"></i>
					</div>
					<a href="{{ asset('news') }}" class="headerItemDropdownItemContent">
						Tin tức
					</a>
				</div>
				<div class="headerItemDropdownItem">
					<div class="headerItemDropdownItemIcon">
						<i class="fas fa-handshake"></i>
					</div>
					<a href="{{ asset('partner') }}" class="headerItemDropdownItemContent">
						Trở thành đối tác
					</a>
				</div>

			</div>
		</div>
		@endif

		@if (Auth::guest() || Auth::user()->level == 9)
		<div class="headerRightItem cart cart-hide" >
			<a href="{{ asset('cart/show') }}">
				<i class="fa fa-shopping-cart" aria-hidden="true"></i>
			</a>
			@if(Cart::count() > 0)
			<div class="headerRightItemNum">
				{{ Cart::count() }}
			</div>
			@endif
		</div>
		<div class="headerRightItem cart cart-mobile" >
			<a href="{{ asset('cart/show') }}" >
				Giỏ hàng
			</a>
			@if(Cart::count() > 0)
			<div class="headerRightItemNum">
				{{ Cart::count() }}
			</div>
			@endif
		</div>
		@endif
		<div class="headerRightItem headerDropdown noti">
			<a >
				<i class="fa fa-bell" aria-hidden="true"></i>
			</a>
			<div class="headerRightItemNum noti">

			</div>
			<div class="headerItemDropdown noti">
				@foreach ($noti as $item)
					<div href="{{ $item->noti_link }}" class="noti_item">
						<div class="noti_ava" style="background: url('{{ asset('lib/storage/app/noti/resized-'.$item->noti_img) }}') no-repeat center /cover;"></div>
						<div class="noti_name">
							{{ $item->noti_name }}
						</div>
						<div class="noti_content">
							{{ $item->noti_content }}
						</div>
						<div class="notiID d-none">
							{{ $item->noti_id }}
						</div>
						<div class="notiLink d-none">
							{{ $item->noti_link }}
						</div>
					</div>
				@endforeach
				{{-- 
				<div class="headerItemDropdownItem">
					<div class="headerItemDropdownItemIcon">
						<i class="far fa-newspaper"></i>
					</div>
					<a href="{{ asset('news') }}" class="headerItemDropdownItemContent">
						Tin tức
					</a>
				</div>
				<div class="headerItemDropdownItem">
					<div class="headerItemDropdownItemIcon">
						<i class="fas fa-handshake"></i>
					</div>
					<a href="{{ asset('partner') }}" class="headerItemDropdownItemContent">
						Trở thành đối tác
					</a>
				</div> --}}

			</div>
		</div>
		@if (Auth::guest() || Auth::user()->level == 9)	
		<div class="headerRightItem codeActive">
			<a href="{{ asset('code') }}">
				Kích hoạt mã code
			</a>
		</div>
		@endif
		
		
		@if(Auth::check())
		<div class="headerRightItem ">
			<a href="{{ asset('user') }}">
				{{ Auth::user()->name }}
			</a>
		</div>
		<div class="headerRightItem ava headerDropdown">
			<a style="background: url('{{ file_exists(storage_path('app/avatar/resized50-'.Auth::user()->img)) ? asset('lib/storage/app/avatar/resized50-'.Auth::user()->img) : (Auth::user()->provider_id != null ? Auth::user()->img : 'img/no-avatar.jpg') }}') no-repeat center /cover">
			</a>
			<div class="headerItemDropdown ava">
				@if(Auth::user()->level == 9)
				<div class="headerItemDropdownItem">
					<div class="headerItemDropdownItemIcon">
						<i class="fas fa-book"></i>
					</div>
					<a href="{{ asset('user/course_doing') }}" class="headerItemDropdownItemContent">
						Khóa học đang học
					</a>
				</div>
				<div class="headerItemDropdownItem">
					<div class="headerItemDropdownItemIcon">
						<i class="fas fa-user"></i>
					</div>
					<a href="{{ asset('user') }}" class="headerItemDropdownItemContent">
						Thông tin cá nhân
					</a>
				</div>
				<div class="headerItemDropdownItem">
					<div class="headerItemDropdownItemIcon">
						<i class="fas fa-user"></i>
					</div>
					<a href="{{ asset('user/history') }}" class="headerItemDropdownItemContent">
						Lịch sử giao dịch
					</a>
				</div>
				
				@endif

				@if(Auth::user()->level == 8 || Auth::user()->level == 7)

				@endif


				@if(Auth::user()->level == 8)
				<div class="headerItemDropdownItem">
					<div class="headerItemDropdownItemIcon">
						<i class="fas fa-tachometer-alt"></i>
					</div>
					<a href="{{ asset('aff/dashboard') }}" class="headerItemDropdownItemContent">
						Thống kê
					</a>
				</div>
				<div class="headerItemDropdownItem">
					<div class="headerItemDropdownItemIcon">
						<i class="fas fa-medal"></i>
					</div>
					<a href="{{ asset('aff/top') }}" class="headerItemDropdownItemContent">
						Top thành viên
					</a>
				</div>
				<div class="headerItemDropdownItem">
					<div class="headerItemDropdownItemIcon">
						<i class="fas fa-history"></i>
					</div>
					<a href="{{ asset('aff/history') }}" class="headerItemDropdownItemContent">
						Lịch sử giao dịch
					</a>
				</div>
				<div class="headerItemDropdownItem">
					<div class="headerItemDropdownItemIcon">
						<i class="fas fa-user"></i>
					</div>
					<a href="{{ asset('user') }}" class="headerItemDropdownItemContent">
						Thông tin cá nhân
					</a>
				</div>

				@endif

				@if(Auth::user()->level == 7)
				<div class="headerItemDropdownItem">
					<div class="headerItemDropdownItemIcon">
						<i class="fas fa-tachometer-alt"></i>
					</div>
					<a href="{{ asset('teacher/dashboard') }}" class="headerItemDropdownItemContent">
						Thống kê
					</a>
				</div>
				<div class="headerItemDropdownItem">
					<div class="headerItemDropdownItemIcon">
						<i class="fas fa-book"></i>
					</div>
					<a href="{{ asset('teacher/courses') }}" class="headerItemDropdownItemContent">
						Khóa học
					</a>
				</div>

				<div class="headerItemDropdownItem">
					<div class="headerItemDropdownItemIcon">
						<i class="fas fa-user"></i>
					</div>
					<a href="{{ asset('teacher/profile') }}" class="headerItemDropdownItemContent">
						Thông tin cá nhân
					</a>
				</div>
				@endif
				@if (Auth::user()->provider == null)
					<div class="headerItemDropdownItem">
						<div class="headerItemDropdownItemIcon">
							<i class="fas fa-unlock-alt"></i>
						</div>
						<a href="{{ asset('user/change_pass') }}" class="headerItemDropdownItemContent">
							Đổi mật khẩu
						</a>
					</div>
				@endif
					
				<div class="headerItemDropdownItem">
					<div class="headerItemDropdownItemIcon">
						<i class="fas fa-sign-out-alt"></i>
					</div>
					<a href="{{ asset('logout') }}" class="headerItemDropdownItemContent">
						Đăng xuất
					</a>
				</div>

			</div>
		</div>


		@else
		<div class="headerRightItem login">
			<a href="{{ asset('login') }}">
				Đăng nhập
			</a>
		</div>
		<div class="headerRightItem register">
			<a href="{{ asset('register') }}">
				Đăng ký
			</a>
		</div>
		@endif
	</div>
</header>

<script type="text/javascript">
$(document).ready(function(){
	$('.button-menu').click(function(){
		$('header').slideToggle(400);	
	});
});
</script>