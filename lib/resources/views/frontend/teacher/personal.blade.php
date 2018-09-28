@extends('frontend.master')
@section('title','Thông tin cá nhân')
@section('fb_title','Top khóa học hàng đầu')
@section('fb_description','Nơi cung cấp cho bạn những khóa học tốt nhất, rẻ nhất. Tạo lên một môi trường học tập trên cuộc cách mạng công nghệ 4.0')
@section('fb_image',asset('public/layout/frontend/img/dayne-topkin-60559-unsplash.png'))
@section('main')
	<link rel="stylesheet" type="text/css" href="css/user/profile.css">
	<script type="text/javascript" src="{{asset('public/ckeditor/ckeditor.js')}}"></script>
	<div class="instruction">

		<div class="instruction_body">
			<a href="{{ asset('') }}" class="instruction_item">
				Trang chủ
			</a>
			<a class="instruction_item">
				>
			</a>
			<a href="{{ asset('teacher/profile') }}" class="instruction_item">
				Thông tin cá nhân
			</a>
			
			
		</div>
		
	</div>
	<div class="main_body">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title">
						<h1>Cập nhật thông tin</h1>
						<div class="titleContent">
							Chúng tôi cung cấp cho các bạn những khoá học đa dạng và chất lượng nhất
						</div>
					</div>
					
				</div>
			</div>
			<div class="row profile">
				<div class="col-md-4">
					<div class="profileLeft">
						<div class="profileLeftAva">
							<img id="avatarImg" class="cssInput" src="{{ file_exists(storage_path('app/avatar/resized360-'.Auth::user()->img)) ? asset('lib/storage/app/avatar/resized360-'.Auth::user()->img) : (Auth::user()->provider == 'facebook' ? str_replace('type=normal', 'width=1920', Auth::user()->img) : (Auth::user()->provider == 'google' ? str_replace('?sz=50', '', Auth::user()->img) : 'img/no-avatar.jpg')) }}">
						</div>
						<div class="profileLeftButton">
							<div class="buttonChangeAva">
								Chọn ảnh đại diện
							</div>
							<div class="buttonSaveAva">
								Lưu
							</div>
						</div>
					</div> 
				</div>
				<div class="col-md-8">
					<div class="profileRight">
						<form method="post" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="profileRightItem">
								<div class="profileRightTitle">
									Thông tin cơ bản
									<div class="inputEdit">
										Sửa
										<i class="fas fa-pencil-alt"></i>
									</div>
									<div class="inputDeni">
										Hủy
										<i class="fas fa-ban"></i>
									</div>
								</div>
								<div class="form_group">
									<label>Tên</label>
									<div class="form_item">
										<div class="inputText">
											{{ $user->name }}
										</div>
										<div class="inputMain">
											<input type="text" name="acc[name]" class="inputProfile" value="{{ $user->name }}">
											<input id="img" type="file" name="img" class="cssInput " onchange="changeImg(this)" style="display: none!important;">
										</div>
									</div>
								</div>
								<div class="form_group">
									<label>Giới tính</label>
									<div class="form_item">
										<div class="inputText">
											{{ gender_format($user->gender) }}
										</div>
										<div class="inputMain">
											<select class="inputProfile" name="acc[gender]">
												<option value="1">Nam</option>
												<option value="2">Nữ</option>
												<option value="3">Khác</option>
											</select>
										</div>
										
									</div>
								</div>
								<div class="form_group">
									<label>Ngày sinh</label>
									<div class="form_item">
										<div class="inputText">
											{{ $user->birthday }}
										</div>
										<div class="inputMain">
											<input type="text" name="acc[birthday]" class="inputProfile" value="{{ $user->birthday }}">
										</div>
									</div>
								</div>
								<div class="form_group">
									<label>Địa chỉ</label>
									<div class="form_item">
										<div class="inputText">
											{{ $user->address }}
										</div>
										<div class="inputMain">
											<input type="text" name="acc[address]" class="inputProfile" value="{{ $user->address }}">
										</div>
									</div>
								</div>
								<div class="form_group">
									<label>Học vị</label>
									<div class="form_item">
										<div class="inputText">
											{{ $user->teacher->tea_degree }}
										</div>
										<div class="inputMain">
											<input type="text" name="teacher[tea_degree]" class="inputProfile" value="{{ $user->teacher->tea_degree }}">
										</div>
									</div>
								</div>
								<div class="form_group">
									<label>Chuyên môn</label>
									<div class="form_item">
										<div class="inputText">
											{{ $user->teacher->tea_specialize }}
										</div>
										<div class="inputMain">
											<input type="text" name="teacher[tea_specialize]" class="inputProfile" value="{{ $user->teacher->tea_specialize }}">
										</div>
									</div>
								</div>
								<div class="form_group mb_60">
									<label>Nơi công tác</label>
									<div class="form_item">
										<div class="inputText">
											{{ $user->teacher->tea_work_place }}
										</div>
										<div class="inputMain">
											<input type="text" name="teacher[tea_work_place]" class="inputProfile" value="{{ $user->teacher->tea_work_place }}">
										</div>
									</div>
								</div>
							</div>
								

							<div class="profileRightItem">
								<div class="profileRightTitle">
									Thông tin liên hệ
								</div>
								<div class="form_group">
									<label>Email</label>
									<div class="form_item">
										<div class="inputText">
											{{ $user->email }}
										</div>
										<div class="inputMain">
											<input type="email" name="acc[email]" class="inputProfile" value="{{ $user->email }}">
										</div>
									</div>
								</div>
								<div class="form_group">
									<label>Số điện thoại</label>
									<div class="form_item">
										<div class="inputText">
											{{ $user->phone }}
										</div>
										<div class="inputMain">
											<input type="number" name="acc[phone]" class="inputProfile" value="{{ $user->phone }}">
										</div>
									</div>
								</div>
								<div class="form_group">
									<label>Facebook</label>
									<div class="form_item">
										<div class="inputText">
											{{ $user->teacher->tea_fb}}
										</div>
										<div class="inputMain">
											<input type="text" name="teacher[tea_fb]" class="inputProfile" value="{{ $user->teacher->tea_fb}}">
										</div>
									</div>
								</div>
								<div class="form_group">
									<label>Google plus</label>
									<div class="form_item">
										<div class="inputText">
											{{ $user->teacher->tea_gg}}
										</div>
										<div class="inputMain">
											<input type="text" name="teacher[tea_gg]" class="inputProfile" value="{{ $user->teacher->tea_gg}}">
										</div>
									</div>
								</div>
								<div class="form_group">
									<label>Youtube</label>
									<div class="form_item">
										<div class="inputText">
											{{ $user->teacher->tea_yt }}
										</div>
										<div class="inputMain">
											<input type="text" name="teacher[tea_yt]" class="inputProfile" value="{{ $user->teacher->tea_yt }}">
										</div>
									</div>
								</div>
							</div>
							<div class="profileRightItem">
								<div class="profileRightTitle">
									Tóm tắt nhanh
								</div>
								<div class="inputText inputContent">
									{!! $user->summary !!}
								</div>
								<div class="inputMain">
									<textarea class="form-control" rows="5" name="acc[summary]">{!! $user->summary !!}</textarea>
								</div>
							</div>
							<div class="profileRightItem">
								<div class="profileRightTitle">
									Đôi lời giới thiệu về bản thân
								</div>
								<div class="inputText inputContent">
									{!! $user->content !!}
								</div>
								<div class="inputMain">
									<textarea class="form-control ckeditor" rows="5" name="acc[content]">{!! $user->content !!}</textarea>
									<script type="text/javascript">
										var editor = CKEDITOR.replace('acc[content]',{
											language:'vi',
											filebrowserImageBrowseUrl: '../../ckfinder/ckfinder.html?Type=Images',
											filebrowserFlashBrowseUrl: '../../ckfinder/ckfinder.html?Type=Flash',
											filebrowserImageUploadUrl: '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
											filebrowserFlashUploadUrl: '../../public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
										});
									</script>
								</div>
							</div>
							<div class="inputButon">
								
								<button type="submit" class="btnSubmit">
									Lưu thay đổi
								</button>
								<button type="button" class="btnReset">
									Hủy thay đổi
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
		
@stop
@section('script')
	<script type="text/javascript" src="js/user/profile.js"></script>
	<script type="text/javascript">
		function changeImg(input){
	        //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
	        if(input.files && input.files[0]){
	            var reader = new FileReader();
	            //Sự kiện file đã được load vào website
	            reader.onload = function(e){
	                //Thay đổi đường dẫn ảnh
	                $('#avatarImg').attr('src',e.target.result);
	                $('.buttonSaveAva').show();
	            }
	            reader.readAsDataURL(input.files[0]);
	        }
	    }
	    $(document).ready(function() {
	        $('.buttonChangeAva').click(function(){
	            $('#img').click();
	        });
	        $('.buttonSaveAva').click(function(){
	        	// $('.btnSubmit').prop('disabled', true);
	        	$('.btnSubmit').click();
	        });
	    });
	</script>
@stop