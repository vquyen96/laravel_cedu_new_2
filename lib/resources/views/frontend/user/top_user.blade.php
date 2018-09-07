@extends('frontend.master')
@section('title','Top thành viên')
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
						<h1>Top các cộng tác viên nổi bật</h1>
						<p>Chúng tôi cung cấp cho các bạn những khoá học đa dạng và chất lượng nhất</p>
					</div>
					<div id="list">
						<table class="table table-striped">
							<thead>
								<tr>
									<th><p class="tieu-de">#</p></th>
									<th><p class="tieu-de">Avatar</p></th>
									<th><p class="tieu-de">Tên</p></th>
									<th><p class="tieu-de">Số đơn</p></th>
									<th><p class="tieu-de">Thu nhập</p></th>
								</tr>
							</thead>

							<tbody>
								@foreach ($top_aff as $key=>$item)
									<tr>
										<td>
											<p>{{$key+1}}</p>
										</td>
										<td>
											<div class="img" style="background: url('{{ asset('lib/storage/app/avatar/resized-'.$item->acc->img) }}') no-repeat center /cover;">
												
											</div>
										</td>
										<td>
											<p>{{ $item->acc->name }}</p>
										</td>
										<td>
											<p>{{ $item->aff_order_num }}</p>
										</td>
										<td>
											<p>{{ $item->aff_earnings }}</p>
										</td>
									</tr>
								@endforeach
								

								
							</tbody>
						</table>
						{{-- {!! $top_user->links('layout.paginate') !!} --}}
					</div>
				</div>
			</div>
		</div>
	</div>
<section id="body">
	<div class="container">
		<div class="heading">
			<h1>Top các cộng tác viên nổi bật</h1>
			<p>Chúng tôi cung cấp cho các bạn những khoá học đa dạng và chất lượng nhất</p>
		</div>
					
	</div>
</section>

@stop
@section('script')

@stop