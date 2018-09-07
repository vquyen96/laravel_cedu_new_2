$(document).ready(function(){
	// alert('ok');
	

	$('.carouselCourse').owlCarousel({
	    animateOut: 'fadeOut',
	    margin:45,
	    loop: false,
	    autoWidth: false,
	    nav:false,
	    dots: false,
	    responsiveClass:true,
	    responsive:{
	        0:{
	            items:1
	        },
	        768:{
	            items:2
	        },
	        992:{
	            items:3
	        }
	    }
	});

	
});