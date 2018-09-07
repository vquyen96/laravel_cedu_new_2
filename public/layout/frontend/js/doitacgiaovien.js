$(document).ready(function(){
	$('.header').height($('.header').width()*680/1440);
	$('.register').height($('.register').width()*285/1440);

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

	$(document).on('click', ".btnRegister", function() {
		$('html, body').animate({
	      	scrollTop: $(".headerForm").offset().top
	    }, 800);
	    $('input[type="text"]')[0].focus(); 
	});
});