$(document).ready(function(){
	// alert('ok');
	$('.groupChild').owlCarousel({
	    animateOut: 'fadeOut',
	    margin:10,
	    loop:true,
	    autoWidth:true,
	    items: 9
	});

	$('.carouselCourse1').owlCarousel({
	    animateOut: 'fadeOut',
	    margin:45,
	    loop: true,
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
	$('.teacherCarouselMain').owlCarousel({
	    animateOut: 'fadeOut',
	    margin:18,
	    loop: true,
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
	            items:4
	        }
	    }
	});


	$('input[type=checkbox]').click(function(){
		$('#form_search').submit();
	});
	$('#select_course').change(function(){
		$('#form_search').submit();
	});
});