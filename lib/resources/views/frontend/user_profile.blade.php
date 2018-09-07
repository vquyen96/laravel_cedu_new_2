@extends('frontend.master')
@section('title','Bạn')
@section('main')
<link rel="stylesheet" type="text/css" href="css/user_profile.css">
<div class="user">
	<div class="userLeft">
		<div class="userLeftItem">
			<img src="{{ asset('lib/storage/app/avatar/resized-'.Auth::user()->img) }}">
			{{Auth::user()->name}}
			<div class="userLeftItemLogo">
				
			</div>
		</div>
		<div href="{{ asset('user?page=course') }}" class="userLeftItem course">
			<i class="fa fa-book" aria-hidden="true"></i>
			Khóa học của tôi
		</div>
		<div href="{{ asset('user?page=profile') }}" class="userLeftItem profile">
			<i class="fa fa-user" aria-hidden="true"></i>
			Cập nhật thông tin
		</div>
		<div href="{{ asset('user?page=change_pass') }}" class="userLeftItem change_pass">
			<i class="fa fa-key" aria-hidden="true"></i>
			Đổi mật khẩu
		</div>
		<div href="{{ asset('user?page=change_pass') }}" class="userLeftItem history">
			<i class="fa fa-history" aria-hidden="true"></i>
			Lịch sử giao dịch
		</div>
		<a href="{{ asset('code') }}" class="userLeftItem">
			<i class="fa fa-unlock" aria-hidden="true"></i>
			Kích hoạt khóa học
		</a>
		@if (Auth::user()->level == 9)
			<a href="{{ asset('affiliate') }}" class="userLeftItem">
				<i class="fa fa-users" aria-hidden="true"></i>
				Trở thành cộng tác
			</a>
		@endif
		@if (Auth::user()->level == 8)
			<a href="{{ asset('user_aff?dashboardLeft') }}" class="userLeftItem">
				<i class="fa fa-link" aria-hidden="true"></i>
				Tới trang cộng tác
			</a>
		@endif
		<div class="userLeftBorder"></div>


	</div>
	<div class="userRight">
		<div class="userRightMain">
			<div class="userRightLine">
				<div class="userRightLineItem">
					<h4>Khóa học của bạn</h4>
					@foreach($user->order as $order)
						@foreach ($order->orderDe as $item)
							@if ($item->code != null)
								<a href="{{ asset('courses/detail/'.$item->course->cou_slug.'.html') }}" class="homeCourseMainItem">
									<div class="homeCourseMainItemImg">
										<img src="{{ asset('lib/storage/app/course/resized-'.$item->course->cou_img) }}">
									</div>
									<div class="homeCourseMainItemContent">
										<div class="homeCourseMainItemContentTea">
											<img src="{{ asset('lib/storage/app/avatar/resized-'.$item->course->tea->img) }}">
											{{$item->course->tea->name}}
										</div>
										<div class="homeCourseMainItemContentCourse">
											{{cut_string($item->course->cou_name , 60)}}
										</div>
									</div>
								</a>
							@endif
						@endforeach
					@endforeach
				</div>
				<div class="userRightLineItem">
					<div class="userAva">
						<div class="userAvaImg">
							<img style="cursor: pointer;" id="avatarImg" class="cssInput thumbnail tableImgAvatar" width="s%" src="{{asset('lib/storage/app/avatar/resized-'.Auth::user()->img)}}">
							<div class="userAvaHover" id="avatar">
				        		Thay đổi ảnh
				        	</div>
				        	
						</div>
					</div>
						
					<div class="userInfoTitle">
						<h4>Thông tin cơ bản</h4>
						<form method="post" enctype="multipart/form-data" class="userInfoForm">
							<div class="form-group">
							    <label class="formName">Tên của bạn</label>
							    <div class="inputGr">
							    	<input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" placeholder="Tên của bạn" required>
							    </div>
							    
							</div>
							<div class="form-group">
							    <label class="formName">Email của bạn</label>
							    <div class="inputGr">
							    	{{Auth::user()->email}}
							    	
							    </div>
							    
							</div>
				  			<input id="img" type="file" name="img" class="cssInput " onchange="changeImg(this)" style="display: none!important;">
							<div class="form-group">
								<label  class="formName">Giới thiệu bản thân</label>
								<div class="inputGr">
									<textarea class="form-control ckeditor" rows="5" name="content" placeholder="Mục tiêu sống">{!! Auth::user()->content!!}</textarea>
								</div>
							</div>
						  	<div class="form-group ">
						    	<input type="submit" class="btn btn-warning" value="Lưu thay đổi">
						  	</div>
						  	{{csrf_field()}}
						</form>
					</div>
				</div>
				<div class="userRightLineItem">
						
					<div class="userInfoTitle">
						<h4>Thay đổi mật khẩu</h4>
						<form method="post" enctype="multipart/form-data" class="userInfoForm" id="form_change_pass" action="{{ asset('user/change_pass') }}">
							<div class="form-group">
							    <label class="formName">Mật khẩu cũ của bạn</label>
							    <div class="inputGr">
							    	<input type="password" class="form-control" name="old_pass" id="old_pass" placeholder="Mật khẩu cũ" required>
							    </div>
							    <div id="old_pass_error" class="error_mess"></div>
							</div>
							<div class="form-group">
							    <label class="formName">Mật khẩu mới của bạn</label>
							    <div class="inputGr">
							    	<input type="password" class="form-control" name="new_pass" id="new_pass" placeholder="Mật khẩu mới" required>
							    </div>
							    <div id="new_pass_error" class="error_mess"></div>
							</div>
							<div class="form-group">
							    <label class="formName">Nhập lại mật khẩu mới</label>
							    <div class="inputGr">
							    	<input type="password" class="form-control" name="re_new_pass" id="re_new_pass" placeholder="Nhập lại mật khẩu mới" required>
							    </div>
							    <div id="re_new_pass_error" class="error_mess"></div>
							</div>
							
						  	<div class="form-group ">
						    	<input type="submit" class="btn btn-warning" value="Thay đổi mật khẩu">
						  	</div>
						  	{{csrf_field()}}
						</form>
					</div>
				</div>
				<div class="userRightLineItem">
					<h4>Lịch sử mua khóa học</h4>
					<table class="table table-hover historyTable">
						<tr>
							<th>Khóa học</th>
							<th>Số tiền</th>
							<th>Trạng thái</th>
							<th>Thời gian</th>
						</tr>
					
						@foreach($user->order as $order)
							@foreach ($order->orderDe as $item)
								@if ($item->code != null)
								<tr>
									<td>
										<img src="{{ asset('lib/storage/app/course/resized-'.$item->course->cou_img) }}" class="historyImg">
										{{cut_string($item->course->cou_name , 60)}}
									</td>
									<td>{{number_format($item->course->cou_price,0,',','.')}} đ</td>
									<td>{{$item->code->code_status}}</td>
									<td>{{date_format($item->order->created_at,"d/M/Y  h:m")}}</td>
								</tr>	
								@endif
							@endforeach
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('script')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/user_profile.js"></script>

@stop