$(document).ready(function () {
    window.onload = function () { 
        setTimeout(function(){
            $('.loadingPage').fadeOut();
        },0);
    }
    

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
    },4000);



    $(document).on('click', ".iconSearch", function(){
        $(".headerSearch").css({"display": "block", "width": "540px"});
        $('.headerTopMenuItem').fadeOut(100);
        $('.iconSearch').fadeOut();

    });
    $(document).on('focusout', ".inputSearch", function(){
        $(".headerSearch").css({"display": "block", "width": "52px"});
        $(".inputSearch").val("");
        setTimeout(function(){
            $(".headerSearch").css('display','none');
            $('.headerTopMenuItem').fadeIn();
            $('.iconSearch').fadeIn();
        }, 200)
        
    });

    $(document).on('click', ".btnScrollTop, .footerTopItemBtnScrollTop", function(){
       $('html, body').animate({
          scrollTop: 0
        }, 1000);
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

    $(document).on('click', ".giftShow", function(){
        $(".giftShow").toggle();
        $(".giftHide").toggle();
        
    });
    $(document).on('click', ".giftHideBtn", function(){
        $(".giftShow").toggle();
        $(".giftHide").toggle();
        
    });

    var countClickAcc = 0;
    $(document).on('click', ".headerTopMenuItem.account", function(){
        $('.headerTopMenuHide.noti').hide();
        $('.headerTopMenuHide.account').toggle();
        // if (countClickAcc == 0) {
        //     $('.headerTopMenuHide').hide();
        //     $('.headerTopMenuHide.account').show();
        //     $(this).css('color',' #000');
        //     countClickAcc = 1;
        // }
        // else{
        //     $('.headerTopMenuHide.account').hide();
        //     countClickAcc = 0;
        // }
        
    });
    var countClickNoti = 0;
    $(document).on('click', ".headerTopMenuItem.noti", function(){
        $('.headerTopMenuHide.account').hide();
        $('.headerTopMenuHide.noti').toggle();
        // if (countClickNoti == 0) {
        //     $('.headerTopMenuHide').hide();
        //     $('.headerTopMenuHide.noti').show();
        //     countClickNoti = 1;
        // }
        // else{
        //     $('.headerTopMenuHide.noti').hide();
        //     countClickNoti = 0;
        // }
        
    });
    $(document).on('click', "main, .headerBot", function(){
        $('.headerTopMenuHide').hide();
        
    });
    //setting seen
    var noti = $('.headerTopMenuHideItem.noti');
    var countNoti = 0;
    for (var i = 0; i < noti.length ; i++) {
        var noti_seen = localStorage.getItem('noti_'+noti.eq(i).find('.notiID').text());

        if (noti_seen == null) {
            countNoti++;
            noti.eq(i).addClass("active");
        }
    }
    if (countNoti == 0) {
        $('.headerTopMenuNotiCount').hide();
    }
    else{
        $('.headerTopMenuNotiCount').text(countNoti);
    }
    
    //setting seen
    $(document).on('click', ".headerTopMenuHideItem.noti", function(){
       localStorage.setItem('noti_'+$(this).find('.notiID').text(), true);
       window.location.href = $(this).find('.notiLink').text();
    });
});