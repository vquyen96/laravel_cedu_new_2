@extends('backend.master')
@section('title',$teacher->acc->name )
@section('main')


<script type="text/javascript" src="{{asset('public/ckeditor/ckeditor.js')}}"></script>

<div>
	<div>
		<h3 class="">Hồ sơ giáo viên</h3>
	</div>
	<div>
		<form method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-6">
					@if(Auth::user()->level != 3)
					<div class="form-group">
						<label>Nổi bật: </label>
				    	<input type="text" class="form-control" name="tea_featured" placeholder="VD: 1" required value="{{$teacher->tea_featured}}">
				    </div>
				    @endif
					<div class="form-group">
						<label>Học sinh gọi</label>
					    <select class="form-control" name="tea_gender">
					    	<option @if($teacher->tea_gender == 1) selected @endif value="1">Thầy</option>
					    	<option @if($teacher->tea_gender == 2) selected @endif value="2">Cô</option>
					    	<option @if($teacher->tea_gender == 3) selected @endif value="3">Giáo viên</option>
					    </select>
					    
					</div>
					<div class="form-group">
						<label>Họ tên: </label>
						<input type="text" class="form-control" name="" placeholder="" disabled value="{{$teacher->acc->name}} ({{$teacher->tea_rating}})">
				    	{{-- <span class="teacherNotChange"><b> {{$teacher->acc->name}} </b></span>
				    	<span class="teacherNotChange"><b> ({{$teacher->tea_rating}}) </b></span> --}}
				    </div>
				    <div class="form-group">
						<label>Email: </label>
						<input type="text" class="form-control" name="" placeholder="" disabled value="{{$teacher->acc->email}}">
				    </div>
				    <div class="form-group">
						<label>Ngày sinh: </label>
						<input type="text" class="form-control" name="acc[birthday]" placeholder="" value="{{$teacher->acc->birthday}}">
				    </div>
				    <div class="form-group">
						<label>Địa chỉ: </label>
						<input type="text" class="form-control" name="acc[address]" placeholder="" value="{{$teacher->acc->address}}">
				    </div>
				    <div class="form-group">
						<label>Só điện thoại: </label>
						<input type="text" class="form-control" name="acc[phone]" placeholder="" value="{{$teacher->acc->phone}}">
				    </div>
				    <div class="form-group">
						<label>Học vị</label>
				    	<input type="text" class="form-control" name="tea_degree" placeholder="Giáo viên hóa" required value="{{$teacher->tea_degree}}">
				    </div>
				    <div class="form-group">
						<label>Nơi công tác</label>
				    	<input type="text" class="form-control" name="tea_work_place" placeholder="C" required value="{{$teacher->tea_work_place}}">
				    </div>
				    <div class="form-group">
						<label>Facebook</label>
				    	<input type="text" class="form-control" name="tea_fb" placeholder="vd: https://fb.com" required value="{{$teacher->tea_fb}}">
				    </div>
				    <div class="form-group">
						<label>Google Plus</label>
				    	<input type="text" class="form-control" name="tea_gg" placeholder="vd: https://fb.com" required value="{{$teacher->tea_gg}}">
				    </div>
				    <div class="form-group">
						<label>Youtube</label>
				    	<input type="text" class="form-control" name="tea_yt" placeholder="vd: https://fb.com" required value="{{$teacher->tea_yt}}">
				    </div>
					
				    <div class="form-group">
						<label>Tóm tắt nhanh</label>
				    	<textarea class="form-control" name="acc[summary]" rows="5" placeholder="">{{$teacher->acc->summary}}</textarea>
				    </div>
				    <div class="form-group">
						<label>Đôi lời giới thiệu về bản thân</label>
				    	<textarea class="form-control" name="acc[content]" rows="5" placeholder="vd: https://fb.com">{{$teacher->acc->content}}</textarea>
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

				<div class="col-md-6">
					<div class="form-group">
						<label>Ảnh đại diện</label>
						<input id="imgHead" type="file" name="img" class="cssInput " onchange="changeImgHead(this)" style="display: none!important;">
		                <img style="cursor: pointer;" id="imgHead" class="cssInput thumbnail" width="100%" @if($teacher->acc->img == "") src="img/Layer 1.png" @else src="{{ asset('lib/storage/app/avatar/'.$teacher->acc->img) }}" @endif >
					</div>
					

	                
				</div>
				{{-- <div class="col-md-3">
					<div class="form-group">
						<label>Ảnh cuối trang</label>
						<input id="imgFoot" type="file" name="tea_img_foot" class="cssInput " onchange="changeImgFoot(this)" style="display: none!important;">
		                <img style="cursor: pointer;" id="imgFoot" class="cssInput thumbnail" width="100%" @if($teacher->tea_img_head == "") src="img/Layer 2.png" @else src="{{ asset('lib/storage/app/teacher/'.$teacher->tea_img_foot)}}" @endif >
					</div>	
				</div> --}}
			</div>
			
			
			<div class="form-group teacher_story" >
				<label>Các câu chuyện</label>
				<a href="{{ asset('admin/teacher/detail/'.$teacher->tea_id.'/addstory') }}" class="btn btn-success">Thêm Câu chuyện</a>

				<table class="table table-hover">
					@foreach($teacher->story as  $item)
					<tr>
						<td>
							<b>{{$item->sto_title}}</b>
						</td>
						<td>
							<a href="{{asset('admin/teacher/detail/'.$teacher->tea_id.'/editstory/'.$item->sto_id)}}" class="btn btn-primary">Sửa</a>
							<a href="{{asset('admin/teacher/detail/'.$teacher->tea_id.'/deletestory/'.$item->sto_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" class="btn btn-danger">Xóa</a>
						</td>
					</tr>
					@endforeach
				</table>
			</div>
		  	<div class="form-group">
		    	
		    	<input type="submit" class="btn btn-success" value="Thay đổi">
		    	<a href="{{asset('admin/teacher')}}" class="btn btn-warning"> Quay lại</a>
		  	</div>
		  	{{csrf_field()}}
		</form>
	</div>
</div>

@stop
@section('script')
	<script type="text/javascript">
		function changeImgHead(input){
	        //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
	        if(input.files && input.files[0]){
	            var reader = new FileReader();
	            //Sự kiện file đã được load vào website
	            reader.onload = function(e){
	                //Thay đổi đường dẫn ảnh
	                $('img#imgHead').attr('src',e.target.result);
	            }
	            reader.readAsDataURL(input.files[0]);
	        }
	    }
	    function changeImgFoot(input){
	        //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
	        if(input.files && input.files[0]){
	            var reader = new FileReader();
	            //Sự kiện file đã được load vào website
	            reader.onload = function(e){
	                //Thay đổi đường dẫn ảnh
	                $('img#imgFoot').attr('src',e.target.result);
	            }
	            reader.readAsDataURL(input.files[0]);
	        }
	    }
	    $(document).ready(function() {
	        $('img#imgHead').click(function(){
	        	
	            $('#imgHead').click();
	        });
	        $('img#imgFoot').click(function(){
	        	
	            $('#imgFoot').click();
	        });
	        
	    });
	</script>
@stop