@extends('backend.master')
@section('title','Home')
@section('main')


<link rel="stylesheet" type="text/css" href="css/account.css">
<div>
	<div>
		<table class="table table-hover">
			<tr>
				<th>Ảnh đại diện</th>
				<th>Tên</th>
				<th>Email</th>
				<th>Mức tiền</th>
				<th>Chức vụ</th>

				<th>Tùy Chọn</th>
			</tr>
			@foreach($items as $item)
			<tr 
				@switch($item->req_status)
					@case(1)
						class="success" 
						@break
					@case(-1)
						class="danger" 
						@break
					@default
						@break

				@endswitch
			>	
				<td class="tableAcountImg">
					<img src="{{asset('lib/storage/app/avatar/resized-'.$item->acc->img)}}">
				</td>
				<td>{{$item->acc->name}}</td>
				<td>{{$item->acc->email}}</td>
				<td>{{number_format($item->req_amount,0,',','.')}} đ</td>
				<td>
					@switch($item->acc->level)
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
					@if ($item->req_status == 1)
						<a href="{{asset('admin/acc_req/accept/'.$item->req_id)}}" class="btn btn-primary">Chấp nhận</a>
						<a href="{{asset('admin/acc_req/denied/'.$item->req_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" class="btn btn-danger">Từ chối</a>
					@endif
				</td>
			</tr>
			@endforeach
		</table>
		
	</div>
</div>

@stop
