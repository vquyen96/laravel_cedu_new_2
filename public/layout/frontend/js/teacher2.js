$(document).ready(function(){
	$('#slide_course .item:first').attr('class','item active');
	$('#slide_course ol li:first').attr('class','active');

	setTimeout(function(){
        $('.masterError').fadeOut();
    },3000);

    $('.btnMenuItemContent').click(function(){
    	switch($(this).text()){
    		case '02':
    			$('html, body').animate({
			      scrollTop: $(".infoSlide").offset().top-80
			    }, 800);
			    break;
			case '03':
    			$('html, body').animate({
			      scrollTop: $(".rateBig").offset().top
			    }, 800);
			    break;
			case '04':
    			$('html, body').animate({
			      scrollTop: $(".course").offset().top-40
			    }, 800);
			    break;
			default:
				alert("Lỗi");
				break;
    	}
    });
});