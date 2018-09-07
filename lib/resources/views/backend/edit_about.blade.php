@extends('backend.master')
@section('title','Thêm giới thiệu')
@section('main')


<script type="text/javascript" src="{{asset('public/ckeditor/ckeditor.js')}}"></script>

<div class="container-fluid">
	<div>
		<h3 class="">Sửa {{$item->about_name}}</h3>
	</div>
	<div class="col-md-8">
		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
			    <label>Tiêu đề</label>
			    <input type="text" class="form-control" name="name" placeholder="Tiêu đề" required value="{{$item->about_name}}"> 
			</div>
			
			
			<div class="form-group">
				<label>Nội dung</label>
				<textarea class="form-control ckeditor" rows="5" name="content">{!!$item->about_text!!}</textarea>
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
		    	<a href="{{asset('admin/about')}}" class="btn btn-warning"> Quay lại</a>
		  	</div>
		  	{{csrf_field()}}
		</form>
	</div>
</div>

@stop