@extends('backend.master')
@section('title','Home')
@section('main')


<script type="text/javascript" src="{{asset('public/ckeditor/ckeditor.js')}}"></script>

<div>
	<div>
		<h3 class="">Thêm mới khóa học</h3>
	</div>
	<div>
		<form method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
					    <label>Tên khóa học</label>
					    <input type="text" class="form-control" name="cou_name" required>
					</div>
					@if (Auth::user()->level < 6)
						<div class="form-group">
						    <label>Nổi bật</label>
						    <input type="number" class="form-control" name="cou_featured" placeholder="1-9">
						</div>
					@endif
						

					<div class="form-group">
					    <label>Giá chính thức</label>
					    <input type="text" class="form-control" name="cou_price" placeholder="300000" required>
					</div>
					
					@if (Auth::user()->level < 6)
					<div class="form-group">
					    <label>Giá chưa sale</label>
					    <input type="text" class="form-control" name="cou_price_old"  placeholder="600000" >
					</div>
					<div class="form-group">
					    <label>Sale</label>
					    <input type="text" class="form-control" name="cou_sale" placeholder="VD: 15%" >
					</div>
					<div class="form-group">
				    	<label>Số học viên thêm</label>
				    	<input type="number" class="form-control" name="cou_student_fake">
				  	</div>
					@endif
				  	<div class="form-group">
				    	<label>Cấp độ</label>
				    	<select class="form-control" name="cou_level">
				    		<option value="1">Tất cả</option>
				    		<option value="2">Cơ bản</option>
				    		<option value="3">Chuyên nghiệp</option>
				    	</select>
				    	
				  	</div>
				  	
				  	
				  	{{-- <div class="form-group">
				    	<label>Tag</label>
				    	<input type="text" class="form-control" name="cou_tag" required placeholder="VD: #Ngoại ngữ #Giao tiếp-+
				    	">
				  	</div> --}}
				  	<div class="form-group">
				    	<label>Lĩnh vực</label>
				    	<select class="form-control" name="cou_gr_id" id="group">
				    		<option value="" disabled selected>Chọn lĩnh vực</option>
				    		@foreach($group as $item)
					    	<option value="{{$item->gr_id}}">{{$item->gr_name}}</option>
					    	@endforeach
					    </select>
				  	</div>
				  	<div class="form-group">
				    	<label>Chuyên mục</label>
				    	<select class="form-control" name="cou_gr_child_id" id="group_child">
				    		{{-- @foreach($group as $item)
					    	<option value="{{$item->gr_id}}">{{$item->gr_name}}</option>
					    	@endforeach --}}
					    </select>
				  	</div>
				  	
				  	@if(Auth::user()->level != 7)
				  	<div class="form-group">
				    	<label>Giáo viên</label>
				    	<select class="form-control" name="cou_tea_id">
				    		@foreach($tea as $item)
					    	<option value="{{$item->id}}">{{$item->name}}</option>
					    	@endforeach
					    </select>
				  	</div>
				  	@endif
				</div>

				<div class="form-group col-md-6">
					<label>Ảnh</label>
					<input id="img" type="file" name="img" class="cssInput " onchange="changeImg(this)" style="display: none!important;">
	                <img style="cursor: pointer;" id="avatar" class="cssInput thumbnail tableImgAvatar" width="s%" src="img/user.png">
				</div>
			</div>
			
			
			<div class="form-group">
					<label>Chi tiết</label>
					<textarea class="form-control ckeditor" rows="5" name="content"></textarea>
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
		  	<div class="form-group">
		    	
		    	<input type="submit" class="btn btn-success" value="Thêm mới">
		    	<a href="{{asset('admin/account')}}" class="btn btn-warning"> Quay lại</a>
		  	</div>
		  	{{csrf_field()}}
		</form>
	</div>
</div>

@stop