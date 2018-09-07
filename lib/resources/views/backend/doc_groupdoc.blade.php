@extends('backend.master')
@section('title','Home')
@section('main')


<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div>
				<h3>Thêm nhóm tài liệu</h3>
			</div>
			<div>
				<form method="post" enctype="multipart/form-data">
				
				<div class="form-group">
				    <label>Tên nhóm</label>
				    <input type="text" class="form-control" name="name" placeholder="Tên của bạn" required>
				</div>
			  	<div class="form-group">
			    	<input type="submit" class="btn btn-success" value="Thêm mới">
			    	<a href="{{asset('admin/doc')}}" class="btn btn-warning"> Quay lại</a>
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
					<th>Tên</th>
					<th>Tùy chọn</th>
				</tr>
				@foreach($grdoc as $item)
				<tr>	
					<td class="tableTD">
						<a href="{{ asset('admin/doc/get_doc/'.$item->group->gr_id.'/'.$item->grdoc_id) }}">
							{{$item->grdoc_name}}
						</a>
					</td>
					<td>
						<a href="{{asset('admin/doc/edit_group/'.$item->group->gr_id.'/'.$item->grdoc_id)}}" class="btn btn-primary">Sửa</a>
						<a href="{{asset('admin/doc/delete_group/'.$item->group->gr_id.'/'.$item->grdoc_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" class="btn btn-danger">Xóa</a>
					</td>
				</tr>
				@endforeach
			</table>
			{{$grdoc->links()}}
		</div>
	</div>
</div>

@stop