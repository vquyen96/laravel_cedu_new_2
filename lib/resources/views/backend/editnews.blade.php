@extends('backend.master')
@section('title','Home')
@section('main')


<script type="text/javascript" src="{{asset('public/ckeditor/ckeditor.js')}}"></script>

<div class="container-fluid">
	<div>
		<h3 class="">Sửa tin tức</h3>
	</div>
	<div class="col-md-8">
		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
			    <label>Tiêu đề bài viết</label>
			    <input type="text" class="form-control" value="{{$news->news_title}}" name="title" required>
			</div>
			<div class="form-group">
			    <label>Lượt xem</label>
			    <input type="text" class="form-control" value="{{$news->news_view}}" name="view" required>
			</div>
			<div class="form-group">
				<label>Ảnh</label>
				<input id="img" type="file" name="img" class="cssInput " onchange="changeImg(this)" style="display: none!important;">
                <img style="cursor: pointer;" id="avatar" class="cssInput thumbnail tableImgAvatar" width="s%" src="{{asset('lib/storage/app/news/'.$news->news_img)}}">
			</div>
			
			
			<div class="form-group">
				<label>Nội dung</label>
				<textarea class="form-control ckeditor" rows="5" name="content">{{$news->news_content}}</textarea>
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
		    	
		    	<input type="submit" class="btn btn-success" value="Thay đổi">
		    	<a href="{{asset('admin/account')}}" class="btn btn-warning"> Quay lại</a>
		  	</div>
		  	{{csrf_field()}}
		</form>
	</div>
</div>

@stop