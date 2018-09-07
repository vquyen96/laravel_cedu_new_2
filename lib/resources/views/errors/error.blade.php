<!DOCTYPE html>
<html>
<head>
	<title>Lỗi</title>
	<base href="{{asset('public/layout/frontend')}}/">
</head>
<link rel="stylesheet" type="text/css" href="css/error.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">


<body>
	<div class="error">
		<div class="errorContent">
			<span class="text">
				Cảm ơn bạn <br> đã tìm ra lỗi của chúng tôi<br>
			</span>
			
			<div class="btn btn-default ">
				Quay lại
			</div>
			<a href="{{ asset('') }}" class="btn btn-primary ">
				Trang chủ
			</a>
		</div>

	</div>


	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			setTimeout(function(){
				$('.errorContent').css('transform','translate(-50%, -50%) scale(1)')
			},1000);
			
			$('.btn.btn-default').click(function(){
				parent.history.back();
				return false;
			});
		});
	</script>
</body>
</html>