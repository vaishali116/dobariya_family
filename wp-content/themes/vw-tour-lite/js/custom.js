jQuery(function($){
 	"use strict";
   	jQuery('.main-menu > ul').superfish({
		delay:       500,
		animation:   {opacity:'show',height:'show'},  
		speed:       'fast'
	});
});

function vw_tour_lite_menu_open_nav() {
	document.getElementById("mySidenav").style.top ="0";
}
function vw_tour_lite_menu_close_nav() {
	document.getElementById("mySidenav").style.top = "-110%";
}

(function( $ ) {

	jQuery(window).load(function() {
	    jQuery("#status").fadeOut();
	    jQuery("#preloader").delay(1000).fadeOut("slow");
	})

	$(window).scroll(function(){
		var sticky = $('.header-sticky'),
			scroll = $(window).scrollTop();

		if (scroll >= 100) sticky.addClass('header-fixed');
		else sticky.removeClass('header-fixed');
	});
	
	$(document).ready(function () {

		$(window).scroll(function () {
		    if ($(this).scrollTop() > 100) {
		        $('.scrollup i').fadeIn();
		    } else {
		        $('.scrollup i').fadeOut();
		    }
		});

		$('.scrollup i').click(function () {
		    $("html, body").animate({
		        scrollTop: 0
		    }, 600);
		    return false;
		});

	});

})( jQuery );