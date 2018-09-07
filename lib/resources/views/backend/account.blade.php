@extends('backend.master')
@section('title','Home')
@section('main')


<link rel="stylesheet" type="text/css" href="css/account.css">
<div>
	<div>
		<h3 class="col-md-6 col-sm-6 col-xs-12">
			Quản lý tài khoản
			<a href="{{asset('admin/account/add')}}" class="btn btn-success"> 
				<span class="glyphicon glyphicon-plus"></span>
				Thêm mới
			</a>

		</h3>
		<div class="col-md-6 col-sm-6 col-xs-12 accountBtnAdd">
			
			<form class="form-inline" method="get" action="{{asset('admin/account/search/')}}">
			  <div class="form-group">
			    
			    <input type="text" class="form-control" name="search" placeholder="Tài khoản">
			  </div>
			  <input type="submit" class="btn btn-warning" value="Tìm kiếm">
			</form>
			
		</div>
	</div>
	<div>
		<table class="table table-hover">
			<tr>
				<th>#</th>
				<th>Ảnh đại diện</th>
				<th>Tên</th>
				<th>Email</th>
				<th>Chức vụ</th>
				<th class="tableOption">Tùy Chọn</th>
			</tr>
			@foreach($items as $item)
			<tr 
				@switch($item->level)
					@case(1)
						class="danger" 
						@break
					@case(2)
						class="warning" 
						@break
					@case(3)
						class="success" 
						@break
					@case(5)
						class="" 
						@break
					@default
						@break

				@endswitch
			>	
				<td>{{$item->id}}</td>
				<td class="tableAcountImg">
					<img src="{{asset('lib/storage/app/avatar/resized-'.$item->img)}}">
				</td>
				<td>{{$item->name}}</td>
				<td>{{$item->email}}</td>
				<td>
					@switch($item->level)
						@case(1)
							Admin
							@break
						@case(2)
							Quản trị viên
							@break
						@case(3)
							Kế toán
							@break
						@case(4)
							Học viên
							@break
						@case(5)
							Quản trị giáo viên
							@break
						@case(6)
							Quản trị CTV
							@break
						@case(7)
							Giáo viên
							@break
						@case(8)
							Cộng tác viên
							@break
						@case(9)
							Học viên
							@break
						
					@endswitch
				</td>
				<td>
					<a href="{{asset('admin/account/edit/'.$item->id)}}" class="btn btn-primary">Sửa</a>
					@if(Auth::user()->id == $item->id)
						<a onclick="return alert('Bạn không được phép xóa chính mình')" class="btn btn-danger">Xóa</a>
					@else
						<a href="{{asset('admin/account/delete/'.$item->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" class="btn btn-danger">Xóa</a>
					@endif
					
				</td>
			</tr>
			@endforeach
		</table>
		{{$items->links()}}
	</div>
</div>

@stop