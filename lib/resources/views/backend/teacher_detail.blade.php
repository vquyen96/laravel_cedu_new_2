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
				    	<span class="teacherNotChange"><b> {{$teacher->acc->name}} </b></span>
				    	<span class="teacherNotChange"><b> ({{$teacher->tea_rating}}) </b></span>
				    </div>
				    <div class="form-group">
						<label>Email: </label>
				    	<span class="teacherNotChange"><b>{{$teacher->acc->email}}</b></span>
				    </div>
				    <div class="form-group">
						<label>Facebook Cá Nhân</label>
				    	<input type="text" class="form-control" name="tea_fb" placeholder="Giáo viên hóa" required value="{{$teacher->tea_fb}}">
				    </div>
				    <div class="form-group">
						<label>Học vị</label>
				    	<input type="text" class="form-control" name="tea_degree" placeholder="Giáo viên hóa" required value="{{$teacher->tea_degree}}">
				    </div>
				    <div class="form-group">
						<label>Nơi công tác</label>
				    	<input type="text" class="form-control" name="tea_work_place" placeholder="Giáo viên hóa" required value="{{$teacher->tea_work_place}}">
				    </div>
				    <div class="form-group">
						<label>Chuyên môn</label>
				    	<input type="text" class="form-control" name="tea_specialize" placeholder="Giáo viên hóa" required value="{{$teacher->tea_specialize}}">
				    </div>
				    @if(Auth::user()->level != 3)
					<div class="form-group">
						<label>Giao diện</label>
					    <select class="form-control" name="tea_templace">
					    	<option @if($teacher->tea_templace == 1) selected @endif value="1">Luyện thi</option>
					    	<option @if($teacher->tea_templace == 2) selected @endif value="2">Công nghệ & Thiết kế</option>
					    	<option @if($teacher->tea_templace == 3) selected @endif value="3">Phát triển bản thân</option>
					    </select>
					    
					</div>
				    <div class="form-group">
						<label>Lượt theo dõi</label>
				    	<input type="number" class="form-control" name="tea_follow" placeholder="2000 (Người theo dõi)" required value="{{$teacher->tea_follow}}">
				    </div>
				    <div class="form-group">
						<label>Số khóa học</label>
				    	<input type="number" class="form-control" name="tea_lesson" placeholder="50 (Khóa học)" required value="{{$teacher->tea_lesson}}">
				    </div>
				    <div class="form-group">
						<label>Kinh nghiệm(năm)</label>
				    	<input type="number" class="form-control" name="tea_exp" placeholder="10 (năm)" required value="{{$teacher->tea_exp}}">
				    </div>
				    @else
				    <div>
				    	<b>Giao diện: </b> 
				    	@switch($teacher->tea_templace)
				    		@case(1)
				    			Luyện thi
				    			@break
				    		@case(2)
				    			Công nghệ & Thiết kế
				    			@break
				    		@case(3)
				    			Phát triển bản thân
				    			@break
				    			
				    	@endswitch		
				    </div>
				    <div>
				    	<b>Lượt theo dõi: </b>{{$teacher->tea_follow}}+ người 
				    </div>
				    <div>
				    	<b>Sỗ bài học: </b>{{$teacher->tea_lesson}}+ bài
				    </div>
				    <div>
				    	<b>Kinh nghiệm: </b>{{$teacher->tea_exp}}+ năm
				    </div>
				    
				    @endif
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label>Ảnh đầu trang</label>
						<input id="imgHead" type="file" name="tea_img_head" class="cssInput " onchange="changeImgHead(this)" style="display: none!important;">
		                <img style="cursor: pointer;" id="imgHead" class="cssInput thumbnail" width="100%" @if($teacher->tea_img_head == "") src="img/Layer 1.png" @else src="{{ asset('lib/storage/app/teacher/'.$teacher->tea_img_head) }}" @endif >
					</div>
					

	                
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Ảnh cuối trang</label>
						<input id="imgFoot" type="file" name="tea_img_foot" class="cssInput " onchange="changeImgFoot(this)" style="display: none!important;">
		                <img style="cursor: pointer;" id="imgFoot" class="cssInput thumbnail" width="100%" @if($teacher->tea_img_head == "") src="img/Layer 2.png" @else src="{{ asset('lib/storage/app/teacher/'.$teacher->tea_img_foot)}}" @endif >
					</div>	
				</div>
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