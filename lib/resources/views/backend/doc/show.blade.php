@extends('backend.master')
@section('title','Home')
@section('main')
<link rel="stylesheet" type="text/css" href="../frontend/css/doc_detail.css">



<div>
	<div>
		<h3 class="col-md-6 col-sm-6 col-xs-12">Quản lý tài liệu</h3>
		<div class="col-md-3 col-sm-3 col-xs-6 accountBtnAdd">
			<a href="{{ asset('admin/doc/add')}}" class="btn btn-success"> 
				<span class="glyphicon glyphicon-plus"></span>
				Thêm mới
			</a>
		</div>
		<div class="col-md-3 col-sm-3 col-xs-6 accountBtnAdd">
			<div class="selectGr">
				<form method="get" class="formSearch">
					<select class="select_group form-control" name="group">
						<option value="0" @if(isset(Request::all()['group']) && Request::all()['group']==0) selected="" @endif>
							Tất cả tài liệu
						</option>
						@foreach ($group as $item)
						<option value="{{ $item->gr_id }}" @if(isset(Request::all()['group']) && Request::all()['group']==$item->gr_id) selected="" @endif>
							{{ $item->gr_name }}
						</option>
						@endforeach
						
					</select>
				</form>
			</div>
		</div>
	</div>
	<div>
		<table class="table table-hover">
			<tr>
				<th>#</th>
				<th>Hình ảnh</th>
				<th>Tiêu đề</th>
				<th class="tableOption">Tùy Chọn</th>
			</tr>
			@foreach($doc as $item)
				<tr>
					<td>{{$item->doc_id}}</td>
					<td class="tableNewsImg">
						<img class="" src="{{ file_exists(storage_path('app/doc/resized360-'.$item->doc_img)) ? asset('lib/storage/app/doc/resized360-'.$item->doc_img) : 'img/no_image.png' }}">
					</td>
					<td>{{$item->doc_name}}</td>
					<td>
						<a href="{{asset('admin/doc/edit/'.$item->doc_id)}}" class="btn btn-primary">Sửa</a>

						<a href="{{asset('admin/doc/delete/'.$item->doc_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" class="btn btn-danger">Xóa</a>
					</td>
				</tr>
			@endforeach
		</table>
		{{-- {{$doc->links()}} --}}
	</div>
</div>

@stop
@section('script')
<script type="text/javascript">
	$( document ).ready(function(){
		$('.select_group').change(function(){
			$('.formSearch').submit();
		});
	});
</script>
@stop