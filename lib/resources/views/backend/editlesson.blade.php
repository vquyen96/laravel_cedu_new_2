
@extends('backend.master')
@section('title','Home')
@section('main')


<div class="row">
	<div>
		<a href="{{asset('admin/course')}}">
			Khóa học
		</a>
		>>
		<a href="{{asset('admin/course/detail/'.$course->cou_id)}}">
			{{cut_string($course->cou_name, 20)}}
		</a>
		>>
		<a href="{{asset('admin/course/part/detail/'.$course->cou_id.'/'.$part->part_id)}}">
			{{cut_string($part->part_name, 20)}}
		</a>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div>
			<h3>Sửa bài học</h3>
		</div>
		<div>
			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
				    <label>Tên bài học</label>
				    <input type="text" class="form-control" name="name" value="{{$lesson->les_name}}" required>
				</div>
				<div class="form-group">
				    <label>Video bài học</label>
				    <video width="100%" controls autoplay src="{{asset('lib/public/uploads/'.$lesson->les_link)}}" id="video"></video>
					<input type="file" name="file" id="fileItem" onchange="onChange()" class="form-control">
				</div>
				
    			<input type="hidden" name="duration" id="duration">
    			
			  	<div class="form-group">
			    	<input type="submit" class="btn btn-success" value="Sửa lại">
			    	<a href="{{asset('admin/course/part/detail/'.Request::segment(6).'/'.Request::segment(7))}}" class="btn btn-warning"> Quay lại</a>
			  	</div>
			  	{{csrf_field()}}
			</form>
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div>
			<h3>Danh sách bài học</h3>
		</div>
		<table class="table table-hover">
			<tr>
				<th>Tên</th>
				<th>Tùy chọn</th>

			</tr>
			@foreach($items as $item)
			<tr>	
				
				<td>
					<a href="{{asset('admin/course/part/lesson/detail/'.$item->les_part_id.'/'.$item->les_id)}}">
						
					</a>
					{{$item->les_name}}
					
				</td>
				<td>
					<a href="{{asset('admin/course/part/lesson/edit/'.Request::segment(6).'/'.$item->les_part_id.'/'.$item->les_id)}}" class="btn btn-primary">Sửa</a>
					<a href="{{asset('admin/course/part/lesson/delete/'.$item->les_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" class="btn btn-danger">Xóa</a>
				</td>
			</tr>
			@endforeach
		</table>
		{{$items->links()}}
	</div>
</div>
@stop
@section('script')
<script type="text/javascript">

	var myVideoPlayer = document.getElementById('fileItem');
	
	var URL = window.URL || window.webkitURL;
	var video = document.getElementsByTagName('video')[0];
	var vid = document.getElementsByTagName('textarea');
	// $('#video').attr('style','display: none');
	// var url = '{{asset('lib/public/uploads/'.$lesson->les_link)}}';
	// var xhr = new XMLHttpRequest();
	// xhr.open('GET', url, true);
	// xhr.responseType = 'blob';
	// xhr.onload = function(e) {
	//   	if (this.status == 200) {
	//   	  	var myObject = this.response;
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