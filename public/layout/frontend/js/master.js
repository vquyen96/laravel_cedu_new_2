$(document).ready(function () {
    window.onload = function () {
        setTimeout(function(){
            $('.loadingPage').fadeOut();
        },0);
    }
    setTimeout(function(){
        $('.masterError').fadeOut();
    },4000);

    $('.headerDropdown').click(function(){
        // $('.headerItemDropdown').slideUp();
        // $(this).find('.headerItemDropdown').slideDown();
        $(this).find('.headerItemDropdown').slideToggle();
    });

    $('.iconSearchHead').click(function(){
        $(this).parent().submit();
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