@extends('backend.master')
@section('title','Sửa tài liệu')
@section('main')


<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div>
				<h3>Thêm tài liệu</h3>
			</div>
			<div>
				<form method="post" enctype="multipart/form-data" action="{{asset('admin/doc/postedit/'.$edit_doc->doc_id)}}">
				
					<div class="form-group">
					    <label>Tên tài liệu</label>
					    <input type="text" class="form-control" name="name" placeholder="Tên của tài liệu" value="{{$edit_doc->doc_name}}" required>
					</div>
					<div class="form-group">
						<label>Ảnh</label>
						<input id="img" type="file" name="img" class="cssInput " onchange="changeImg(this)" style="display: none!important;">
		                <img style="cursor: pointer;" id="avatar" class="cssInput thumbnail " height="300px"  src="{{ asset('lib/storage/app/doc/'.$edit_doc->doc_img) }}">
					</div>
					<div class="form-group">
					    <label>Tải lên</label>
					    <input type="file" class="form-control" name="file">
					</div>
					<div class="form-group">
					    <label>Lĩnh vực</label>
					    <select class="form-control" name="group">
					    	
					    	@foreach($group as $item)
					    	<option {{ $edit_doc->group->gr_name == $item->gr_name?'selected' : ''}} value="{{$item->gr_id}}">{{$item->gr_name}}</option>
					    	@endforeach
					    </select>
					</div>

				  	<div class="form-group">
				    	<input type="submit" class="btn btn-success" value="Sửa lại">
				    	<a href="{{asset('admin/doc')}}" class="btn btn-warning"> Quay lại</a>
				  	</div>
				  	{{csrf_field()}}
				</form>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			
		</div>
	</div>
</div>

@stop