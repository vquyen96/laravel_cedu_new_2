	$('.rate .fa-star').hover(function(){
    	$(this).parent().prevAll().find('i').addClass('starActive');
	    $(this).addClass('starActive');
	    $(this).parent().nextAll().find('i').removeClass('starActive'); 
    });