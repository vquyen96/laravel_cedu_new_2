
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
setTimeout(function(){
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
			case 'course':
				$('.userRightLine').css('margin-left', '0px');
				$('.userLeftBorder').css('top', '202px');
				break;
			case 'profile':
				$('.userRightLine').css('margin-left', '-912px');
				$('.userLeftBorder').css('top', '243px');
				break;
			case 'change_pass':
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
		$(document).on('click', ".userLeftItem.course", function() {
			$('.userRightLine').css('margin-left', '0px');
			$('.userLeftBorder').css('top', '202px');
			window.history.replaceState(null, null, pathname+'?page=course');

		});
		$(document).on('click', ".userLeftItem.profile", function() {
			$('.userRightLine').css('margin-left', '-912px');
			$('.userLeftBorder').css('top', '243px');
			window.history.replaceState(null, null, pathname+'?page=profile');
		});
		$(document).on('click', ".userLeftItem.change_pass", function() {
			$('.userRightLine').css('margin-left', '-1824px');
			$('.userLeftBorder').css('top', '284px');
			window.history.replaceState(null, null, pathname+'?page=change_pass');
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
},500);
	


// function validate_change_pass(){
//     	alert('ok');
//     	return false;
//     }