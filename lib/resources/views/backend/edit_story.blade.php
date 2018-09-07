@extends('backend.master')
@section('title','Home')
@section('main')


<script type="text/javascript" src="{{asset('public/ckeditor/ckeditor.js')}}"></script>

<div>
	<div>
		<h3 class="">Sửa câu chuyện</h3>
	</div>
	<div>
		<form method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group ">
					    <label>Tiêu đề</label>
					    <input type="text" class="form-control" name="sto_title" placeholder="Tiêu đề" required value="{{$story->sto_title}}">
					</div>
					<div class="form-group">
						<label>Chi tiết</label>
						<textarea class="form-control ckeditor" rows="5" name="sto_content">{!!$story->sto_content!!}</textarea>
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
				<div class="col-md-6">
					<div class="form-group">
						<label>Ảnh</label>
						<input id="img" type="file" name="img" class="cssInput " onchange="changeImg(this)" style="display: none!important;">
		                <img style="cursor: pointer;" id="avatar" class="cssInput thumbnail tableImgAvatar" width="s%" @if($story->sto_img == "") src="img/Layer 2.png" @else src="{{ asset('lib/stoage/app/story/'.$story->sto_img) }}" @endif>
					</div>
				</div>
			</div>
			
		  	<div class="form-group">
		    	
		    	<input type="submit" class="btn btn-success" value="Sửa lại">
		    	<a href="{{asset('admin/teacher/detail/'.$teacher->acc->id)}}" class="btn btn-warning"> Quay lại</a>
		  	</div>
		  	{{csrf_field()}}
		</form>
	</div>
</div>

@stop