@extends('backend.master')
@section('title','Thông báo')
@section('main')


<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div>
				<h3>Thêm thông báo</h3>
			</div>
			<div>
				<form method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="form-group">
					    <label>Tên </label>
					    <input type="text" class="form-control" name="name" placeholder="Tên của bạn" required>
					</div>
					<div class="form-group">
					    <label>Liên kết</label>
					    <input type="text" class="form-control" name="link" placeholder="http://ceduvn.com/" required>
					</div>
					<div class="form-group">
					    <label>Nội dung </label>
					    <textarea rows="3" class="form-control" name="content"></textarea>
					</div>
					<div class="form-group">
						<label>Ảnh</label>
						<input id="img" type="file" name="img" class="cssInput " onchange="changeImg(this)" style="display: none!important;">
		                <img style="cursor: pointer;" id="avatar" class="cssInput thumbnail tableImgAvatar" width="s%" src="img/album-default.png">
					</div>
					
				</div>
				
				
				
			  	<div class="form-group">
			    	<input type="submit" class="btn btn-success" value="Thêm mới">
			  	</div>
			  	{{csrf_field()}}
			</form>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div>
				<h3>Danh sách lĩnh vực</h3>
			</div>
			<table class="table table-hover">
				<tr>
					<th>Ảnh</th>
					<th>Nội dung</th>
					<th>Tùy chọn</th>

				</tr>
				@foreach($items as $item)
				<tr>	
					
					<td class="tableAcountImg">
						<img src="{{asset('lib/storage/app/noti/'.$item->noti_img)}}">
					</td>
					<td><b>{{$item->noti_name}}</b> {{$item->noti_content}}</td>
					<td>
						<a href="{{asset('admin/noti/edit/'.$item->noti_id)}}" class="btn btn-primary">Sửa</a>
						<a href="{{asset('admin/noti/delete/'.$item->noti_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" class="btn btn-danger">Xóa</a>
					</td>
				</tr>
				@endforeach
			</table>
			{{$items->links()}}
		</div>
	</div>
		
</div>

@stop