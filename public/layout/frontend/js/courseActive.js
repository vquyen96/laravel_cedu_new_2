$(document).ready(function(){
	$('.rateStar i').hover(function(){
	    $(this).prevAll().addClass('starActive');
	    $(this).addClass('starActive');
	    $(this).nextAll().removeClass('starActive'); 
	    var numItems = $('.starActive').length;
		$('#star').val(numItems);
	});


	var widthHeadMenu = $('.videoDetail').css('width');
	var widthCourseParameter = $('.widthCourseParameter').css('width');
	window.onscroll = function(){
		if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
			$('.headerTiny').slideDown();
            $('.btnScrollTop').css('bottom','20px');
	    } else {
	        $('.headerTiny').slideUp();
            $('.btnScrollTop').css('bottom','-120px');
	    }
	    if (document.body.scrollTop > 800 || document.documentElement.scrollTop > 800) {
        	$('.headMenu').css({'position':'fixed','top':'47px','z-index':'9','width':widthHeadMenu, 'box-shadow': 'rgb(162, 162, 162) 7px 7px 20px'});
        	$('.courseParameter').css({'position':'fixed','top':'67px','z-index':'9','width':widthCourseParameter, 'box-shadow': 'rgb(162, 162, 162) 7px 7px 20px'});
	    } else {
        	$('.headMenu').css({'position':'unset','top':'0','z-index':'9','width': '100%', 'box-shadow': 'none'});
        	$('.courseParameter').css({'position':'unset','top':'0','z-index':'9','width': 'auto', 'box-shadow': 'none'});
	    }
	};
	if (document.body.scrollTop > 800 || document.documentElement.scrollTop > 800) {
    	$('.headMenu').css({'position':'fixed','top':'47px','z-index':'9','width':widthHeadMenu, 'box-shadow': 'rgb(162, 162, 162) 7px 7px 20px'});
    	$('.courseParameter').css({'position':'fixed','top':'67px','z-index':'9','width':widthCourseParameter, 'box-shadow': 'rgb(162, 162, 162) 7px 7px 20px'});
    } else {
    	$('.headMenu').css({'position':'unset','top':'0','z-index':'9','width': '100%', 'box-shadow': 'none'});
    	$('.courseParameter').css({'position':'unset','top':'0','z-index':'9','width': 'auto', 'box-shadow': 'none'});
    }


	$(document).on('click', "#courseHeader", function() {
		$('.headMenu .active').removeClass("active");
		$('#courseHeader').addClass("active");
		$('html, body').animate({
	      scrollTop: 177.7777862548828
	    }, 800);
	});
	$(document).on('click', "#courseDetail", function() {
		$('.headMenu .active').removeClass("active");
		$('#courseDetail').addClass("active");
		$('html, body').animate({
	      scrollTop: $(".courseDetail").offset().top-120
	    }, 800);
	    
	});
	$(document).on('click', "#courseVideo", function() {
		$('.headMenu .active').removeClass("active");
		$('#courseVideo').addClass("active");
		$('html, body').animate({
	      scrollTop: $(".videoDetail").offset().top-120
	    }, 800);
	   
	});
});
	