@extends('backend.master')
@section('title','Home')
@section('main')


<script type="text/javascript" src="{{asset('public/ckeditor/ckeditor.js')}}"></script>

<div>
	<div>
		<h3 class="">Thêm mới tài khoản</h3>
	</div>
	<div>
		<form method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
					    <label>Tên của bạn</label>
					    <input type="text" class="form-control" value="{{$item->name}}" name="name" required>
					</div>
					<div class="form-group">
					    <label>Địa chỉ email</label>
					    @if (Request::segment(2) == 'user')
					    	<div>
					    		{{$item->email}}
					    	</div>
					    @else
					    	<input type="text" class="form-control" name="email" value="{{$item->email}}"  required>
					    @endif

					    
					</div>
				  	<div class="form-group">
				    	<label>Mật khẩu</label>
				    	<br/>
				    	<a class="btn btn-primary btnChangePass">Thay đổi mật khẩu</a>
				    	<input type="password" class="form-control" name="password" placeholder="Mật khẩu của bạn">
				  	</div>
				  	<div class="form-group">
				    	<label>Chức vụ</label>
				    	<select class="form-control" name="level">
				    		<option value="9" @if($item->level == 9) selected @endif >Học viên</option>
				    		<option value="8" @if($item->level == 8) selected @endif >Cộng tác viên</option>
				    		<option value="7" @if($item->level == 7) selected @endif >Giáo viên</option>
				    		<option value="6" @if($item->level == 6) selected @endif >Quản trị CTV</option>
				    		<option value="5" @if($item->level == 5) selected @endif >Quản trị giáo viên</option>
				    		@if(Auth::user()->level <5)
								<option value="4" @if($item->level == 4) selected @endif>Biên tập viên</option>
				    		@endif
				    		@if(Auth::user()->level <4)
				    			<option value="3" @if($item->level == 3) selected @endif>Kế toán</option>
				    		@endif
				    		@if(Auth::user()->level <3)
				    			<option value="2" @if($item->level == 2) selected @endif>Quản trị viên</option>
				    		@endif
				    		@if(Auth::user()->level <2)
				    			<option value="1" @if($item->level == 1) selected @endif>Admin</option>
				    		@endif
				    	</select>
				  	</div>
				  	<div class="form-group">
						<label>Chi tiết</label>
						<textarea class="form-control" rows="5" name="summary">{{$item->summary}}</textarea>
					</div>
				  	<div class="form-group">
						<label>Chi tiết</label>
						<textarea class="form-control" rows="5" name="content">{{$item->content}}</textarea>
						<script type="text/javascript">
							var editor = CKEDITOR.replace('content',{
								language:'vi',
								filebrowserImageBrowseUrl: '../../ckfinder/ckfinder.html?Type=Images',
								filebrowserFlashBrowseUrl: '../../ckfinder/ckfinder.html?Type=Flash',
								filebrowserImageUploadUrl: '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
								filebrowserFlashUploadUrl: '../../public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
							});
						</script>

					</div>
				</div>

				<div class="form-group col-md-6">
					<label>Ảnh</label>
					<input id="img" type="file" name="img" class="cssInput " onchange="changeImg(this)" style="display: none!important;">
	                <img style="cursor: pointer;" id="avatar" class="cssInput thumbnail tableImgAvatar" width="s%" src="{{ file_exists(storage_path('app/avatar/resized50-'.$item->img)) ? asset('lib/storage/app/avatar/resized50-'.$item->img) : $item->provider_id != null ? str_replace('type=normal', 'width=1920', $item->img) : 'img/no-avatar.jpg' }}">
				</div>
			</div>
			
			
				
		  	<div class="form-group">
		    	
		    	<input type="submit" class="btn btn-success" value="Thay đổi">
		    	<a href="{{asset('admin/account')}}" class="btn btn-warning"> Quay lại</a>
		  	</div>
		  	{{csrf_field()}}
		</form>
	</div>
</div>

@stop
@section('script')
	<script type="text/javascript">
		$('input[name = password]').hide();
		$('.btnChangePass').click(function(){
			$('input[name = password]').show();
			$(this).hide();
		});
	</script>
@stop