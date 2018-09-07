@extends('frontend.master')
@section('title','Hợp tác')
@section('main')
<link rel="stylesheet" type="text/css" href="css/partner/partner.css">
<link rel="stylesheet" href="css/owlcarousel/owl.carousel.min.css">
<link rel="stylesheet" href="css/owlcarousel/owl.theme.default.min.css">
<section id="banner">
	<div class="container">
		<div class="main-top">
			<div class="heading">
				<h1>Trở thành đối tác của Cedu</h1>
				<p>Chúng tôi cung cấp cho các bạn những khoá học đa dạng và chất lượng nhất</p>
			</div>
			<div class="button">
				<a href="{{ asset('affiliate') }}" target="_blank" class="ctv">
					Đăng kí trở thành CTV
				</a>
				<a href="{{asset('doitacgiaovien')}}" target="_blank" class="gv">
					Đăng kí trở thành giảng viên
				</a>
			</div>
		</div>
	</div>
</section>

<section id="content">
	<div id="content-1">
		<div class="container">
			<div class="heading-1">
				<h2>Tại sao nên hợp tác cùng chúng tôi</h2>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-3 col-12">
					<div class="ly-do">
						
						<div class="images">
							<img src="../frontend/img/icons8-handshake-heart-96.png">
							<p class="test">Đối tác chuyên nghiệp</p>
						</div>
						<div class="summary">
							<p>Cedu cam kết về một môi trường cùng phát triển và hợp tác chuyên nghiệp. Mọi hoạt động đều dựa trên lợi ích của cả hai bên và chính học viên.</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-3 col-12">
					<div class="ly-do">
						
						<div class="images">
							<img src="../frontend/img/icons8-connect-96.png">
							<p>Kết nối tri thức</p>
						</div>
						<div class="summary">
							<p>Cedu cam kết về một môi trường cùng phát triển và hợp tác chuyên nghiệp. Mọi hoạt động đều dựa trên lợi ích của cả hai bên và chính học viên.</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-3 col-12">
					<div class="ly-do">
						<div class="images">
							<img src="../frontend/img/icons8-training-96.png">
							<p>Giảng viên tài năng</p>
						</div>
						<div class="summary">
							<p>Cedu cam kết về một môi trường cùng phát triển và hợp tác chuyên nghiệp. Mọi hoạt động đều dựa trên lợi ích của cả hai bên và chính học viên.</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-3 col-12">
					<div class="ly-do">
						
						<div class="images">
							<img src="../frontend/img/icons8-money-96.png">
							<p>Chiết khấu hấp dẫn</p>
						</div>
						<div class="summary">
							<p>Cedu cam kết về một môi trường cùng phát triển và hợp tác chuyên nghiệp. Mọi hoạt động đều dựa trên lợi ích của cả hai bên và chính học viên.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="content-2">
		<div class="container">
			<div class="heading-1">
				<h2>Quy trình chia sẻ đam mê cùng Cedu</h2>
				<p>Chúng tôi cung cấp cho các bạn những khoá học đa dạng và chất lượng nhất</p>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-12">
					<div class="quy-trinh">
						<h3>Trở thành giáo viên</h3>
						<div class="cac-buoc">
							<span>Bước 1</span>
							<p>Đăng kí</p>
							<div class="summary-2">Tất cả những gì bạn cần làm là để lại một số thông tin cơ bản, chúng tôi sẽ liên lạc với bạn trong vòng 3 ngày</div>
						</div>
						<div class="cac-buoc">
							<span>Bước 2</span>
							<p>Quay video</p>
							<div class="summary-2">Hãy thật tự nhiên, thoải mái chia sẻ kiến thức và là chính bản thân mình. Nếu bạn biết tự quay phim và dựng phim, đó sẽ là một lợi thế không nhỏ</div>
						</div>
						<div class="cac-buoc">
							<span>Bước 3</span>
							<p>Thu nhập</p>
							<div class="summary-2">Chia sẻ kiến thức, tạo ra những giá trị đích thực và nhận lại nguồn thu nhập trong mơ</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-12">
					<div class="quy-trinh">
						<h3>Trở thành CTV</h3>
						<div class="cac-buoc">
							<span>Bước 1</span>
							<p>Đăng kí</p>
							<div class="summary-2">Tất cả những gì bạn cần làm là để lại một số thông tin cơ bản, chúng tôi sẽ liên lạc với bạn trong vòng 3 ngày</div>
						</div>
						<div class="cac-buoc">
							<span>Bước 2</span>
							<p>Quay video</p>
							<div class="summary-2">Hãy thật tự nhiên, thoải mái chia sẻ kiến thức và là chính bản thân mình. Nếu bạn biết tự quay phim và dựng phim, đó sẽ là một lợi thế không nhỏ</div>
						</div>
						<div class="cac-buoc">
							<span>Bước 3</span>
							<p>Thu nhập</p>
							<div class="summary-2">Chia sẻ kiến thức, tạo ra những giá trị đích thực và nhận lại nguồn thu nhập trong mơ</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="teacher">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="teacherTitle">
						<div class="teacherTitleLeft">
							Đối tác tiêu biểu
						</div>
						<div class="teacherTitleRight">
							Những giao viên trẻ tài năng chất lương luôn tìm tòi nhưng phương pháp sáng tạo nhất để giảng dạy.
						</div>
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="owl-carousel">
						@foreach($teacher as $item)
						<div class="owlItem">
							<a href="{{ asset('teacher/'.$item->acc->email) }}" class="owlItemImg" style="background: url('{{ asset('lib/storage/app/avatar/'.$item->acc->img) }}') no-repeat center /cover ;">
							</a>
							<a href="{{ asset('teacher/'.$item->acc->email) }}" class="owlItemName">
								{{ $item->acc->name }}
							</a>
							<div class="owlItemContent">
								{!! cut_string($item->acc->content, 200) !!}
							</div>
						</div>
						@endforeach
					</div>
					
				</div>
			</div>
		</div>
	</div>
</section>
@stop
@section('script')
<script type="text/javascript" src="js/partner.js"></script>
<script type="text/javascript" src="js/home.js"></script>
<script src="js/owl.carousel.min.js"></script>

@stop


