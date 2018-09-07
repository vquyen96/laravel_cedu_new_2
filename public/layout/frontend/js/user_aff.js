
function changeImg(input){
    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
    if(input.files && input.files[0]){
        var reader = new FileReader();
        //Sự kiện file đã được load vào website
        reader.onload = function(e){
            //Thay đổi đường dẫn ảnh
            $('#avatarImg').attr('src',e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$(document).ready(function(){
	var pathname = window.location.pathname;
	var getUrlParameter = function getUrlParameter(sParam) {
	    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
	        sURLVariables = sPageURL.split('&'),
	        sParameterName,
	        i;

	    for (i = 0; i < sURLVariables.length; i++) {
	        sParameterName = sURLVariables[i].split('=');

	        if (sParameterName[0] === sParam) {
	            return sParameterName[1] === undefined ? true : sParameterName[1];
	        }
	    }
	};
	var page = getUrlParameter('page');
	switch(page){
		case 'dashboardLeft':
			$('.userRightLine').css('margin-left', '0px');
			$('.userLeftBorder').css('top', '202px');
			break;
		case 'get_link':
			$('.userRightLine').css('margin-left', '-912px');
			$('.userLeftBorder').css('top', '243px');
			break;
		case 'top10':
			$('.userRightLine').css('margin-left', '-1824px');
			$('.userLeftBorder').css('top', '284px');
			break;
		case 'history':
			$('.userRightLine').css('margin-left', '-2736px');
			$('.userLeftBorder').css('top', '325px');
			break;
		default:
			
			break;
	}
	$(document).on('click', ".userLeftItem.dashboardLeft", function() {
		$('.userRightLine').css('margin-left', '0px');
		$('.userLeftBorder').css('top', '202px');
		window.history.replaceState(null, null, pathname+'?page=dashboardLeft');
	});
	$(document).on('click', ".userLeftItem.get_link", function() {
		$('.userRightLine').css('margin-left', '-912px');
		$('.userLeftBorder').css('top', '243px');
		window.history.replaceState(null, null, pathname+'?page=get_link');
	});
	$(document).on('click', ".userLeftItem.top10", function() {
		$('.userRightLine').css('margin-left', '-1824px');
		$('.userLeftBorder').css('top', '284px');
		window.history.replaceState(null, null, pathname+'?page=top10');
	});
	$(document).on('click', ".userLeftItem.history", function() {
		$('.userRightLine').css('margin-left', '-2736px');
		$('.userLeftBorder').css('top', '325px');
		window.history.replaceState(null, null, pathname+'?page=history');
	});
	// if (page == 'profile') {
	// 	$('.userRightLine').css('margin-left', '-912px');
	// 	// window.history.replaceState(null, null, pathname+'?page=change_pass');
	// }




	$('#avatar').click(function(){
        $('#img').click();
    });
	$('.item.course').click(function(){
        $('#sbm').click();
    });
    

	var countBtnChangeChart = 0;
    $('.btnChangeChart').click(function(){
        if (countBtnChangeChart == 0) {
            $('#chartSpLine_year').css({'right':'50%'});
            $('#chartSpLine_month').css({'right':'150%'});
            $(this).text('<<< 1 tháng');
            countBtnChangeChart = 1;
        }
        else{
            $('#chartSpLine_year').css({'right':'-50%'});
            $('#chartSpLine_month').css({'right':'50%'});
            $(this).text('1 năm >>>');
            countBtnChangeChart = 0;
        }
        
    });

    $('#form_change_pass').submit(function(){
 
        // BƯỚC 1: Lấy dữ liệu từ form
        var old_pass    = $.trim($('#old_pass').val());
        var new_pass    = $.trim($('#new_pass').val());
        var re_new_pass = $.trim($('#re_new_pass').val());
        var super_pass = localStorage.getItem('sp');
 
        // BƯỚC 2: Validate dữ liệu
        // Biến cờ hiệu
        var flag = true;
 
        // Username
        if (old_pass.length <= 6){
            $('#old_pass_error').text('Mật khẩu cũ của bạn quá ngắn');
            flag = false;
        }else if (old_pass != super_pass){
	            $('#old_pass_error').text('Mật khẩu cũ của bạn không khớp');
	            flag = false;
        }
        else{
            $('#old_pass_error').text('');
        }
        
       
        // Password
        if (new_pass.length <= 6){
            $('#new_pass_error').text('Mật khẩu mới của bạn quá ngắn');
            flag = false;
        }
        else{
            $('#new_pass_error').text('');
        }
        // Re password
        if (new_pass != re_new_pass){
            $('#re_new_pass_error').text('Mật khẩu nhập lại không đúng');
            flag = false;
        }
        else{
            $('#re_new_pass_error').text('');
        }

        if (flag == true) {
        	localStorage.setItem('sp', new_pass);
        }
        return flag;
    });
});


// function validate_change_pass(){
//     	alert('ok');
//     	return false;
//     }