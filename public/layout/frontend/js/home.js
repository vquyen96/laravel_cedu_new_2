$(document).ready(function(){
 
	var owl = $(".owl-carousel");
	owl.owlCarousel({
	    loop: true,
	    autoplay: false,
	    items: 3,
	    nav:true,
	    navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
	    animateOut: 'fadeOut'
	});
	owl.on('changed.owl.carousel',function(property){
		$(property.target).find(".owl-item").find('.owlItemImg').css({'width': '184px', 'margin': '50px auto 20px'});
		$(property.target).find(".owl-item").find('.owlItemContent').css('display', 'none');
	    var current = property.item.index;
	    // $(property.target).find(".owl-item").eq(current).find('.owlItemImg').css('width', '184px');
	    // $(property.target).find(".owl-item").eq(current).find('.owlItemContent').css('display', 'none');

	    $(property.target).find(".owl-item").eq(current+1).find('.owlItemImg').css({'width': '250px', 'margin': '0 auto 40px'});
	    $(property.target).find(".owl-item").eq(current+1).find('.owlItemContent').css('display', 'block');

	    // $(property.target).find(".owl-item").eq(current+2).find('.owlItemImg').css('width', '184px');
	    // $(property.target).find(".owl-item").eq(current+2).find('.owlItemContent').css('display', 'none');
	    
	});
	$('.owl-next').click();
	
});
