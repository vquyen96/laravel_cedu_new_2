@extends('frontend.master')
@section('title','Lịch sử giao dịch')
@section('main')
<link rel="stylesheet" type="text/css" href="css/user/top_user.css">
	<div class="instruction">

		<div class="instruction_body">
			<a href="{{ asset('') }}" class="instruction_item">
				Trang chủ
			</a>
			<a class="instruction_item">
				>
			</a>
			<a href="{{ asset('user') }}" class="instruction_item">
				Thông tin cá nhân
			</a>
			
			
		</div>
		
	</div>
	<div class="main_body">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="heading">
						<h1>Lịch sử giao dịch</h1>
						<p>Chúng tôi cung cấp cho các bạn những khoá học đa dạng và chất lượng nhất</p>
					</div>
					<div id="list">
						<table class="table table-striped">
							<thead>
								<tr>
									<th><p class="tieu-de">#</p></th>
									<th><p class="tieu-de">Avatar</p></th>
									<th><p class="tieu-de">Tên khóa học</p></th>
									<th><p class="tieu-de">Giá</p></th>
									<th><p class="tieu-de">Trạng thái</p></th>
									<th><p class="tieu-de">Ngày</p></th>
								</tr>
							</thead>

							<tbody>
								@foreach($orderDeTable as $key=>$item)
								<tr>
									<td>
										<p>{{$key+1}}</p>
									</td>
									<td>
										<div class="image" style="background: url('{{asset('lib/storage/app/course/resized-'.$item->course->cou_img)}}') no-repeat center /cover;">
											
										</div>
									</td>
									<td>
										<p>{{cut_string($item->course->cou_name, 60)}}</p>
									</td>
									<td>
										<p>{{number_format($item->course->cou_price,0,',','.')}} VND</p>
									</td>
									<td>
										<p>@if($item->order->ord_status == 0) Xong @else Chưa @endif</p>
									</td>
									<td>
										<p>{{$item->created_at->format('d-m-Y')}}</p>
									</td>
								</tr>
								@endforeach
								

							</tbody>
						</table>
						
					</div>
					{!! $orderDeTable->links('layout.paginate') !!}
				</div>
				</div>
			</div>
		</div>
	</div>
<section id="body">
	<div class="container">
		
					
</section>

@stop
@section('script')

@stop