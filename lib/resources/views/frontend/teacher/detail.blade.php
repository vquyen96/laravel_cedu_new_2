@extends('frontend.master')
@section('title','Thông tin cá nhân')
@section('fb_title','Top khóa học hàng đầu')
@section('fb_description','Nơi cung cấp cho bạn những khóa học tốt nhất, rẻ nhất. Tạo lên một môi trường học tập trên cuộc cách mạng công nghệ 4.0')
@section('fb_image',asset('public/layout/frontend/img/dayne-topkin-60559-unsplash.png'))
@section('main')
<link rel="stylesheet" type="text/css" href="css/teacher/detail.css">
<script type="text/javascript" src="{{asset('public/ckeditor/ckeditor.js')}}"></script>

<div class="instruction">

	<div class="instruction_body">
		<a href="{{ asset('') }}" class="instruction_item">
			Trang chủ
		</a>
		<a class="instruction_item">
			>
		</a>
		<a href="{{ asset('teacher/courses') }}" class="instruction_item">
			Khóa học
		</a>
		<a class="instruction_item">
			>
		</a>
		<a href="{{ Request::segment(2) == 'add' ? asset('teacher/add') : asset('teacher/courses/'.$course->cou_slug)}}" class="instruction_item">
			{{ Request::segment(2) == 'add' ? 'Thêm mới' : $course->cou_name }}
		</a>



	</div>

</div>
<div class="main_body">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="title">
					<h1>{{!isset($course) ? 'Thêm bài giảng'  : 'Chỉnh sửa bài giảng' }}</h1>
					<div class="titleContent">
						Chúng tôi cung cấp cho các bạn những khoá học đa dạng và chất lượng nhất
					</div>
				</div>

			</div>

			
			
			<div class="col-md-4 {{ Request::segment(2) == 'add' ? 'd-none' : '' }}">
				<a href="{{asset('teacher/addcourse')}}"class="button-add">Thêm khóa học mới</a> 
			</div>
			
			
		</div>
		<div class="row profile">
			<div class="col-md-4">
				<div class="profileLeft">
					<div class="profileLeftAva">
						<img id="avatarImg" class="cssInput" src="{{ file_exists(storage_path('app/course/'.$course->cou_img)) ? asset('lib/storage/app/course/'.$course->cou_img) : 'img/iamgesadd.jpg' }}">

					</div>
					<div class="profileLeftButton">	
						{{!isset($course) ? 'Update'  : 'Thay đổi cover' }}
					</div>
				</div> 
			</div>
			<div class="col-md-8">
				<div class="profileRight">
					<form method="post" enctype="multipart/form-data" >
						{{ csrf_field() }}
						<div class="profileRightTitle">
							Thông tin cơ bản
							@if(isset($course))
							<div class="inputEdit">
								Sửa
								<i class="fas fa-pencil-alt"></i>
							</div>
							<div class="inputDeni">
								Hủy
								<i class="fas fa-ban"></i>
							</div>
							@endif
						</div>
						
						<div class="form_group">
							<label>Tên khóa học</label>
							<div class="form_item">
								@if(isset($course))
								<div class="inputText">
									{{ $course->cou_name }}
								</div>
								@endif
								<div class="inputMain">
									<input type="text" name="cou[cou_name]" class="inputProfile" @if(isset($course)) value="{{ $course->cou_name }} @endif">
									<input id="img" type="file" name="img" class="cssInput " onchange="changeImg(this)"  style="display: none!important;">
								</div>
							</div>
						</div>
						<div class="form_group">
							<label>Giá</label>
							<div class="form_item">
								@if(isset($course))
								<div class="inputText">
									{{ number_format($course->cou_price, 0, ',', '.') }}
								</div>
								@endif
								<div class="inputMain">
									<input type="number" name="cou[cou_price]" class="inputProfile" @if(isset($course)) value="{{ $course->cou_price }} @endif">
									
								</div>


							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form_group">
									<label>Trình độ</label>
									<div class="form_item">
										@if(isset($course))
										<div class="inputText">
											{{ level_format($course->cou_level) }}
										</div>
										@endif
										<div class="inputMain">
											<select class="inputProfile" name="cou[cou_level]">
												@for ($i = 1; $i < 4 ; $i++)
													<option value="{{ $i }}" {{ $course->cou_level == $i ? 'selected' : '' }}>{{ level_format($i) }}</option>
												@endfor
											</select>
										</div>

									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form_group">
									<label>Loại bài giảng</label>
									<div class="form_item">
										@if(isset($course))
										<div class="inputText">
											{{ type_format($course->cou_type) }}
										</div>
										@endif
										<div class="inputMain">
											<select class="inputProfile" name="cou[cou_type]">
												@for ($i = 1; $i < 3 ; $i++)
													<option value="{{ $i }}" {{ $course->cou_type == $i ? 'selected' : '' }}>{{ type_format($i) }}</option>
												@endfor
											</select>
										</div>

									</div>
								</div>
							</div>
						</div>
								
						<div class="row">
							<div class="col-md-6">
								<div class="form_group">
									<label>Loại khóa học</label>
									@if(isset($course))
									<div class="inputText">
										{{ isset($course->group) ? $course->group->gr_name : '' }}
									</div>
									@endif
									<div class="form_item">
										<div class="inputMain">
											<select class="inputProfile" name="cou[cou_gr_id]">
												@foreach($group as $item)
												<option value="{{$item->gr_id}}">{{$item->gr_name}}</option>
												
												@endforeach
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form_group">
									<label>Lĩnh vực</label>
									@if(isset($course))
									<div class="inputText">
										{{ $course->cou_gr_child }}
									</div>
									@endif
									<div class="form_item">
										<div class="inputMain">
											<select class="inputProfile" name="cou[cou_gr_child_id]">
												
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form_group">
							<label>Nội dung</label>
							@if(isset($course))
							<div class="inputText inputTextarea">
								{!! $course->cou_content !!}
							</div>
							@endif
							<div class="form_item">
								<div class="inputMain">
									<textarea class="ckeditor inputProfileTextarea" rows="5" name="cou[cou_content]">
										@if(isset($course)) 
										{!! $course->cou_content !!} 
										@endif
									</textarea>
									<script type="text/javascript">
										var editor = CKEDITOR.replace('cou[cou_content]',{
											language:'vi',
											filebrowserImageBrowseUrl: '../../ckfinder/ckfinder.html?Type=Images',
											filebrowserFlashBrowseUrl: '../../ckfinder/ckfinder.html?Type=Flash',
											filebrowserImageUploadUrl: '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
											filebrowserFlashUploadUrl: '../../public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
										});
									</script>
								</div>
							</div>
						</div>		
								
						

						
						<div class="inputButon">
							<button type="button" class="btnNoSubmit">
								Hủy
							</button>
							<button type="submit" class="btnSubmit">
								{{ Request::segment(2) == 'add' ? 'Lưu thay đổi ' : 'Tạo mới' }}
							</button>
						</div>
						
					</form>
					{{-- EDIT COURSE --}}
					<div class="profileRightTitle {{ Request::segment(2) == 'add' ? 'd-none' : '' }}">
						Chi tiết bài học
					</div>
					<div class="editCourse {{ Request::segment(2) == 'add' ? 'd-none' : '' }}">
						

						@if(isset($course) && isset($course->part))
						<?php $video = 0 ?>
						@foreach($course->part as $item)
						
						<ul>
							<li class="listUnit">
								<i class="fas fa-plus toggle" ></i>
								{{-- Giới thiệu khóa học --}}
								{{$item->part_name}}
								<div class="tool">
									<i class="fas fa-edit" data-toggle="modal" data-target="#myModal"></i>
									<a href="">
										<i class="fas fa-trash-alt" data-toggle="modal" data-target="#myModal3"></i>
									</a>

									4:30		
								</div>
								
								<ul class="unit">
									@foreach($item->lesson as $itemTiny)
									<li>
										<i class="fas fa-video"></i>
										{{$itemTiny->les_name}}
										<div class="tool-2">
											<i class="fas fa-edit" data-toggle="modal" data-target="#myModal3"></i>
											<a href="">
												<i class="fas fa-trash-alt"></i>
											</a>
											{{$itemTiny->les_video_duration}}		
										</div>
									</li>
									<?php $video++ ?>
									@endforeach
									<li class="add-video">
										<i class="fas fa-plus" data-toggle="modal" data-target="#myModal3{{$item->part_id}}"></i>
										Thêm video
										<div class="d-none action_form">
											{{asset('teacher/postvideocourse/'.$item->part_id)}}
										</div>
									</li>
								</ul>
							</li>
						</ul>

						
						@endforeach
						@endif
						{{-- UP LOAD--}}
						<div class="modal fade"	 id="modal_add_video">
							<div class="modal-dialog">
								<div class="modal-content">

									<div class="modal-title">
										Up video
									</div>
									<form method="post" enctype="multipart/form-data" class="form_add_video">
										{{csrf_field()}}
										<div class="form_group">
											<label>Tên video</label>
											<div class="form_item">
												<div class="input">
													<input type="text"  placeholder="Tên bài" name="les_name">
												</div>
											</div>
										</div>
										<div class="form_group">
											<label>Tải video lên</label>
											<div class="form_item">
												<div class="inputFile">
													Chọn file
													<input id="fileItem" type="file" name="file" class="cssInput" onchange="onChange()">
													<video width="100%" controls autoplay src="" id="video"></video>
													<input type="hidden" name="duration" id="duration">
												</div>
											</div>
										</div>

										<div class="modal-footer">
											<button type="button" class="btn-miss" data-dismiss="modal">Không</button>
											<input type="submit" class="btn-create" value="Lưu" />
										</div>
									</form>
								</div>
							</div>
						</div>
						{{-- END UP LOAD--}}
						<div class="addListUnit" >
							<i class="fas fa-plus" data-toggle="modal" data-target="#myModal"></i>
							Thêm bài giảng
						</div>
					</div>
					{{-- END EDIT COURSE --}}


					{{-- EDIT DOCUMENT --}}
					<div class="profileRightTitle {{ Request::segment(2) == 'add' ? 'd-none' : '' }}">
						Tài liệu
					</div>
					<div class="editDocument {{ Request::segment(2) == 'add' ? 'd-none' : '' }}">
						<ul>
							<li class="document">
								<a href="">
									<i class="fas fa-trash-alt"></i>
								</a>
								Tài liệu các khóa học photoshop
								<i class="fas fa-edit" data-toggle="modal" data-target="#myModal2"></i>
							</li>

							<li class="document">
								<a href="">
									<i class="fas fa-trash-alt"></i>
								</a>
								Tài liệu các khóa học photoshop
								<i class="fas fa-edit" data-toggle="modal" data-target="#myModal2"></i>
							</li>

							<li class="document">
								<a href="">
									<i class="fas fa-trash-alt"></i>
								</a>
								Tài liệu các khóa học photoshop
								<i class="fas fa-edit" data-toggle="modal" data-target="#myModal2"></i>
							</li>


						</ul>
						<div class="addDocument" >
							<i class="fas fa-plus" data-toggle="modal" data-target="#myModal2"></i>
							Thêm tài liệu
						</div>
					</div>
					{{--END EDIT DOCUMENT --}}		


					
				</div>
			</div>
		</div>
	</div>
</div>


{{-- TẠO BÀI GIẢNG --}}
<div class="modal fade"	 id="myModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-title">
				Tạo bài giảng
			</div>
			<form method="post" enctype="multipart/form-data" action="{{asset('teacher/posttitlecourse/'.$course->cou_id)}}">
				{{ csrf_field() }}
				<div class="form_group">
					<label>Tên bài giảng</label>
					<div class="form_item">
						<div class="input">
							<input type="text"  name="part_name"  placeholder="Tên bài giảng">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn-miss" data-dismiss="modal">Không</button>
					<input type="submit" class="btn-create" value="Tạo"/>
				</div>
			</form>
		</div>
	</div>
</div>
{{-- END TẠO BÀI GIẢNG --}}

{{-- TẠO TÀI LIỆU--}}
<div class="modal fade"	 id="myModal2">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-title">
				Tài liệu
			</div>
			<div class="form_group">
				<label>Tên tài liệu</label>
				<div class="form_item">
					<div class="input">
						<input type="text"  value="Tên bài giảng">
					</div>
				</div>
			</div>
			<div class="form_group">
				<label>File tài liệu</label>
				<div class="form_item">
					<div class="inputFile">
						Chọn file
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn-miss" data-dismiss="modal">Không</button>
				<button type="button" class="btn-create" data-dismiss="modal">Lưu</button>
			</div>
		</div>
	</div>
</div>
{{-- END TẠO TÀI LIỆU --}}





<style type="text/css">
@if(!isset($course))
.inputText,.inputTextarea,.inputMain,.inputButon,.inputEdit,.inputDeni{
	display: unset;
}
@endif
</style>

@stop

@section('script')

<script type="text/javascript" src="js/user/profile.js"></script>
<script type="text/javascript">

	

	$('.add-video').click(function(){
		var action = $(this).find('.action_form').text();
		console.log(action);
		$('.form_add_video').attr('action', action);
		$('#modal_add_video').modal();
	});


function changeImg(input){
    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
    if(input.files && input.files[0]){
    	var reader = new FileReader();
        //Sự kiện file đã được load vào website
        reader.onload = function(e){
            //Thay đổi đường dẫn ảnh
            $('#avatarImg').attr('src',e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$(document).ready(function() {
	$('.profileLeftButton').click(function(){
		$('#img').click();
	});
	@if (Request::segment(2) == 'add')
		$('.inputEdit').click();	
	@endif
	

});



$(document).ready(function(){
	$('.toggle').click(function(){

		if($(this).hasClass('fa-plus')){
			$(this).removeClass('fa-plus');
			$(this).addClass('fa-minus');
		}
		else{
			$(this).removeClass('fa-minus');
			$(this).addClass('fa-plus');
		}
		$(this).siblings('ul').slideToggle(400);
	})
});

	</script>
	<script type="text/javascript">

		var myVideoPlayer = document.getElementById('fileItem');
		
		var URL = window.URL || window.webkitURL;
		var video = document.getElementsByTagName('video')[0];
		var vid = document.getElementsByTagName('textarea');
		$('#video').attr('style','display: none');
		// var url = 'http://localhost:83/c_edu/lib/public/uploads/HÔM NAY TÔI BUỒN - Official MV - Phùng Khánh Linh.mp4';
		// var xhr = new XMLHttpRequest();
		// xhr.open('GET', url, true);
		// xhr.responseType = 'blob';
		// xhr.onload = function(e) {
		//   	if (this.status == 200) {
		//   	  	var myObject = this.response;
		//   	  	console.log(myObject);
		//   	  	var url = URL.createObjectURL(myObject);
		//   	  	console.log(url);
		//   	  	video.src = url;
		//   	}
		// };
		// xhr.send();
		// console.log(xhr);

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
</script>
	@stop