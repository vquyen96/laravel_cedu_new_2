$(document).ready(function(){
	$('.header').height($('.header').width()*680/1440);
	$('.make').height($('.make').width()*550/1440);
	$('.step').height($('.step').width()*700/1440);
	setTimeout(function(){
        $('.masterError').fadeOut();
    },3000);
	window.onscroll = function(){
        
		if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
            $('.btnScrollTop').css('bottom','20px');
	    } else {
            $('.btnScrollTop').css('bottom','-120px');
	    }
	};
	if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
        $('.btnScrollTop').css('bottom','20px');
    } else {
        $('.btnScrollTop').css('bottom','-120px');
    }

    $(document).on('click', ".btnScrollTop", function(){
       $('html, body').animate({
          scrollTop: 0
        }, 500);
    });

	


	$(document).on('click', ".headerMenu1", function() {
		$('html, body').animate({
	      scrollTop: $(".about").offset().top
	    }, 800);
	});
	$(document).on('click', ".headerMenu2", function() {
		$('html, body').animate({
	      scrollTop: $(".make").offset().top
	    }, 800);
	});
	$(document).on('click', ".headerMenu3", function() {
		$('html, body').animate({
	      scrollTop: $(".why").offset().top
	    }, 800);
	});
	$(document).on('click', ".headerMenu4", function() {
		$('html, body').animate({
	      scrollTop: $(".step").offset().top
	    }, 800);
	});
});