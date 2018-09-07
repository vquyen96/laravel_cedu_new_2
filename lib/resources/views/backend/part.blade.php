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
		
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div>
			<h3>Thêm danh mục</h3>
		</div>
		<div>
			<form method="post" enctype="multipart/form-data">
			<div class="">
				<div class="form-group">
				    <label>Tên Phần</label>
				    <input type="text" class="form-control" name="name" required placeholder="VD: Phần 1: Giới thiệu">
				</div>
				
			</div>
			
		  	<div class="form-group">
		    	
		    	<input type="submit" class="btn btn-success" value="Thêm mới">
		    	<a href="{{asset('admin/course')}}" class="btn btn-warning"> Quay lại</a>
		  	</div>
		  	{{csrf_field()}}
		</form>
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div>
			<h3>Danh sách danh mục</h3>
		</div>
		<table class="table table-hover">
			<tr>
				<th>Tên</th>
				<th >Tùy chọn</th>

			</tr>
			@foreach($items as $item)
			<tr>	
				
				<td class="tableTD">
					<a href="{{asset('admin/course/part/detail/'.$item->part_cou_id.'/'.$item->part_id)}}">
						{{$item->part_name}}
					</a>
					
				</td>
				<td >
					<a href="{{asset('admin/course/part/detail/'.$item->part_cou_id.'/'.$item->part_id)}}" class="btn btn-warning">Chi tiết</a>
					<a href="{{asset('admin/course/part/edit/'.$item->part_cou_id.'/'.$item->part_id)}}" class="btn btn-primary">Sửa</a>
					<a href="{{asset('admin/course/part/delete/'.$item->part_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" class="btn btn-danger">Xóa</a>
				</td>
			</tr>
			@endforeach
		</table>
		{{$items->links()}}
	</div>
</div>

@stop