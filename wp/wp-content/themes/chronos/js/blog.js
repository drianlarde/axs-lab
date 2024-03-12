//Scrolling	
jQuery(document).ready(function( $ ) {
//Navigation	

var width = $(window).width(); 
if ((width <= 800)){ 
    $(this).slideToggle(); 
}              

    $('ul.slimmenu').slimmenu(
    {
        resizeWidth: '800',
        collapserTitle: '',
        easingEffect:'easeInOutQuint',
        animSpeed:'medium',
        indentChildren: true,
        childrenIndenter: '&raquo;'
    });				

/*global $:false */

	$(".scroll").click(function(event){

		event.preventDefault();

		var full_url = this.href;
		var parts = full_url.split("#");
		var trgt = parts[1];
		var target_offset = $("#"+trgt).offset();
		var target_top = target_offset.top - 60;

		$('html, body').animate({scrollTop:target_top}, 1200);
	});


// Switcher CSS 

"use strict";
    $("#hide, #show").click(function () {
        if ($("#show").is(":visible")) {
           
            $("#show").animate({
                "margin-left": "-300px"
            }, 300, function () {
                $(this).hide();
            });
            
            $("#switch").animate({
                "margin-left": "0px"
            }, 300).show();
        } else {
            $("#switch").animate({
                "margin-left": "-300px"
            }, 300, function () {
                $(this).hide();
            });
            $("#show").show().animate({
                "margin-left": "0"
            }, 300);
        }
    });
                      


// Target your .container, .wrapper, .post, etc.
$(".video").fitVids();



                    $('.bxslider').bxSlider({
                        adaptiveHeight: true,
                        touchEnabled: true,
                        pager: false,
                        controls: true,
                        auto: false,
                        slideMargin: 1
                    });

jQuery('#switch ul.header li a').click(function(){
        var bg_name = jQuery(this).attr('title');
        
        jQuery('body').removeClass().addClass(bg_name);
        
        return false;
    });


});