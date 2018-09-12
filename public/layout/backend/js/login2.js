$(document).ready(function(){
	$('body').height($(window).height());

	$('.btnRegister').click(function(){
		var x = screen.width;
		if(x < 769){
			if (x < 340){
				$('.loginBody').css('top', '215px');
			}
			else{
				$('.loginBody').css('top', '240px');
			}
			
		}
		
		else{
			$('.loginBody').css('left', '491px');
		}
		$('.formRegister').toggle();
		$('.formLogin').toggle();
		$('.loginMainTitleLeft').text("Đăng ký");
		
	});
	$('.btnLogin').click(function(){
		var x = screen.width;
		if(x<769){
			$('.loginBody').css('top', '30px');
		}
		else{
			$('.loginBody').css('left', '20px');
		}
		
		$('.formRegister').toggle();
		$('.formLogin').toggle();
		$('.loginMainTitleLeft').text("Đăng nhập");
	});
	
	$('.formLogin').submit(function(){
		var flag = true;
		var passwordLogin    = $.trim($('#passwordLogin').val());
		if (passwordLogin.length <= 0){
			$('#pass_error').text('Mật khẩu của bạn quá ngắn');
			flag = false;
		}
		else{
			$('#pass_error').text('');
		}
		localStorage.setItem('sp',$('#passwordLogin').val());
		
		return flag;
	});
	$('.formRegister').submit(function(){
		var flag = true;
		var passwordRegister    = $.trim($('#passwordRegister').val());
		var repasswordRegister    = $.trim($('#repasswordRegister').val());
		if (passwordRegister.length <= 0){
			$('#pass_regis_error').text('Bạn chưa nhập mật khẩu');
			flag = false;
		}
		else{
			$('#pass_regis_error').text('');
		}

		if (passwordRegister != repasswordRegister){
			$('#re_pass_error').text('Nhập lại mật khẩu không trùng khớp');
			flag = false;
		}
		else{
			$('#re_pass_error').text('');
		}
		localStorage.setItem('sp',$('#passwordLogin').val());
		
		return flag;
	});
});