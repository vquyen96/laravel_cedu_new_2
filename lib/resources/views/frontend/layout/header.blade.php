
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
				<a href="{{ asset('courses') }}">
					Trở thành đối tác
				</a>
			</div>
			<div class="headerLeftItem {{ Request::segment(1) == '' ? 'd-none' : '' }} searchHeader">
				<form method="get" action="{{ asset('search') }}">

					<input type="text" name="search" class="inputSearchHead" placeholder="Search">
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
			<div class="headerRightItem cart" >
				<a href="{{ asset('cart/show') }}">
					<i class="fa fa-shopping-cart" aria-hidden="true"></i>
				</a>
				@if(Cart::count() > 0)
				<div class="headerRightItemNum">
					{{ Cart::count() }}
				</div>
				@endif
			</div>
		@endif
		<div class="headerRightItem noti">
			<a href="">
				<i class="fa fa-bell" aria-hidden="true"></i>
			</a>
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
				<a style="background: url('{{ Auth::user()->provider == null ? asset('lib/storage/app/avatar/resized-'.Auth::user()->img) : Auth::user()->img }}') no-repeat center /cover">
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

					<div class="headerItemDropdownItem">
						<div class="headerItemDropdownItemIcon">
							<i class="fas fa-unlock-alt"></i>
						</div>
						<a href="{{ asset('user/change_pass') }}" class="headerItemDropdownItemContent">
							Đổi mật khẩu
						</a>
					</div>
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