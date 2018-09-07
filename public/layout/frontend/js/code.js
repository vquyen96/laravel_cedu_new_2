$(document).ready(function(){
	$('.btnCode').click(function(){
		if ($('input[name=code_value]').val() != null && $('input[name=code_value]').val() != "") {
			if ($('input[name=code_value]').val() == localStorage.getItem('key')) {
				$('.formPass').slideToggle();
				$('.formCode').slideToggle();
			}
			else {
				alert('Mã xác nhận của bạn không đúng');
			}
		}
		else{
			alert('Bạn phải nhập mã xác nhận');
		}
			
	});
});