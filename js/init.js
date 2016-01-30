$(function(){
	
	$('.slider1').mobilyslider({
        transition:'fade',
        animationSpeed:500,
        autoplay: true,
        arrowsHide:false,
        bullets: false,
        pauseOnHover:true,
        autoplaySpeed:2500
    });
	
	$('.slider2').mobilyslider({
		transition: 'vertical',
		animationSpeed: 500,
		autoplay: true,
		autoplaySpeed: 3000,
		pauseOnHover: true,
		bullets: false
	});
	
	$('.slider3').mobilyslider({
		transition: 'fade',
		animationSpeed: 800,
		bullets: true,
		arrowsHide: false
	});
	
	
});
