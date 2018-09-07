$(document).ready(function () {
    setTimeout(function(){
        $('.loadingPage').fadeOut();
    },100);
    
	window.onscroll = function(){
        
		if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
        	$('.headerTiny').slideDown();
            $('.btnScrollTop').css('bottom','20px');
	    } else {
	        $('.headerTiny').slideUp();
            $('.btnScrollTop').css('bottom','-120px');
	    }
	};
	if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
        $('.headerTiny').slideDown();
        $('.btnScrollTop').css('bottom','20px');
    } else {
        $('.headerTiny').slideUp();
        $('.btnScrollTop').css('bottom','-120px');
    }

    setTimeout(function(){
        $('.masterError').fadeOut();
    },2000);
    $(document).on('click', ".btnSearchHead a", function(){
    	$(".headerSearch").css({"display": "block", "width": "340px", "margin-top": "15px"});
        $('.headerMenuNav ul').fadeOut(100);

    });
    $(document).on('focusout', ".inputSearch", function(){
    	
    	$(".headerSearch").css({"display": "block", "width": "52px", "margin-top": "0px"});
    	$(".inputSearch").val("");
        setTimeout(function(){
        	$(".headerSearch").css('display','none');
        	$('.headerMenuNav ul').fadeIn();
        }, 500)
        

    });

    $(document).on('click', ".btnSearchHeadTiny", function(){
        $(".headerSearchTiny").css({"display": "block", "width": "240px"});
        

    });
    $(document).on('focusout', ".headerSearchTiny", function(){
        
        $(".headerSearchTiny").css({"display": "block", "width": "52px"});
        $(".inputSearch").val("");
        setTimeout(function(){
            $(".headerSearchTiny").css('display','none');
        }, 500)
        

    });
    $(document).on('click', ".btnScrollTop", function(){
       $('html, body').animate({
          scrollTop: 0
        }, 500);
    });


    $(document).on('click', ".formFooterLogin a", function(){
        
        setTimeout(function(){
            $('.formTitleRegister').fadeIn();
            $('#register').fadeIn();
            $('.formFooterRegister').fadeIn();
        },1000);
        

        $('.formTitleLogin').fadeOut();
        $('#login').fadeOut();
        $('.formFooterLogin').fadeOut();
    });
    $(document).on('click', ".formFooterRegister a", function(){
        
        setTimeout(function(){
            $('.formTitleLogin').fadeIn();
            $('#login').fadeIn();
            $('.formFooterLogin').fadeIn();
        },1000);
        

        $('.formTitleRegister').fadeOut();
        $('#register').fadeOut();
        $('.formFooterRegister').fadeOut();
    });
    // $.get("https://oauth.zaloapp.com/v3/auth?app_id=437472528420236617&redirect_uri=http://ceduvn.com/&state=login", function(data, status){
    //     alert("Data: " + data + "\nStatus: " + status);
    // });

    
});