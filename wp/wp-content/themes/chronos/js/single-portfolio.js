/*global $:false */
$(document).ready(function(){"use strict";
	$(".scroll").click(function(event){

		event.preventDefault();

		var full_url = this.href;
		var parts = full_url.split("#");
		var trgt = parts[1];
		var target_offset = $("#"+trgt).offset();
		var target_top = target_offset.top;

		$('html, body').animate({scrollTop:target_top}, 1200);
	});

	
//Parallax effects 
	

		$('.parallax9').parallax("50%", 0.5);


//Scrolling	
		
	$(document).ready(
	function() {  
		$("html").niceScroll();
		}
	);

//Responsive video	
	

    // Target your .container, .wrapper, .post, etc.
    $("#thevideo").fitVids();


//Parallax effects 
	

		$('.parallax8').parallax("50%", 0.5);



	
//Slider	
	

	$('.bxslider').bxSlider({
		adaptiveHeight: true,
		touchEnabled: true,
		pager: false,
		controls: true,
		auto: false,
		slideMargin: 1
	});



      $(".main").onepage_scroll({
			sectionContainer: "section",
			responsiveFallback: 600
      });
});