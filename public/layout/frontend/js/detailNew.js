	

$(document).ready(function(){
	window.onscroll = function(){
		if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
        	$('.headerTiny').slideDown();
            $('.btnScrollTop').css('bottom','20px');
	    } else {
	        $('.headerTiny').slideUp();
            $('.btnScrollTop').css('bottom','-120px');
	    }
	    
	    if (document.body.scrollTop > ($(".newsListMain").offset().top+$(".newsListMain").height()) || document.documentElement.scrollTop > ($(".newsListMain").offset().top+$(".newsListMain").height())) {
	    	$(".newsBanner").css({"position":"fixed","width":$('.newsList').width()});
	    }
	    else{
	    	
	    	$(".newsBanner").css({"position":"unset","width":$('.newsList').width()});
	    }
	    if (document.body.scrollTop > ($("footer").offset().top-600) || document.documentElement.scrollTop > ($("footer").offset().top-600)) {
	    	$(".newsBanner").fadeOut();
	    }
	    else{
	    	
	    	$(".newsBanner").fadeIn();
	    }
	    
	};
	// if (document.body.scrollTop > ($(".newsBanner").offset().top-100) ||document.documentElement.scrollTop > ($(".newsBanner").offset().top-100)) {
 //    	$(".newsBanner").css({"position":"fixed","width":$('.newsList').width()});
 //    }
 //    else{
 //    	$(".newsBanner").css({"position":"unset","width":$('.newsList').width()});
 //    }
	    
});
	