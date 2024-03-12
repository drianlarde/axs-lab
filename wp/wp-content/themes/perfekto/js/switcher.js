  jQuery(document).ready(function($) {
    var templateurl = jQuery('#templateurl').attr('href') + "/";
	
	
	var styleswitcherstr = ' \
	<div id="style-switcher"> \
	  <div class="switchercontainer"> \
		  <span>BG Color</span> \
		  <div id="colorpicker"></div> <span class="pickertext">Body</span> \
		  <div class="clear"></div> \
		  <div id="colorpicker13"></div> <span class="pickertext">Border Menu</span>  \
		  <div class="clear"></div> \
		  <div id="colorpicker12"></div> <span class="pickertext">Sub Menu</span>  \
		  <div class="clear"></div> \
		  <div id="colorpicker10"></div> <span class="pickertext">Menu Line</span>  \
		  <div class="clear"></div> \
		  <div id="colorpicker14"></div> <span class="pickertext">Sub Menu Line</span>  \
		  <div class="clear"></div> \
		  <div id="colorpicker2"></div> <span class="pickertext">Content</span>  \
		  <div class="clear"></div> \
		  <div id="colorpicker3"></div> <span class="pickertext">Footer</span> \
		  <div class="clear"></div> \
	  </div> \
	  <div class="switchercontainer"> \
		  <span>BG Patterns</span> \
		  <a rel="bg-body1" class="bg-box" href=""></a> \
		  <a rel="bg-body2" class="bg-box" href=""></a> \
		  <a rel="bg-body3" class="bg-box" href=""></a> \
		  <a rel="bg-body4" class="bg-box" href=""></a> \
		  <a rel="bg-body5" class="bg-box" href=""></a> \
		  <a rel="bg-body6" class="bg-box" href=""></a> \
		  <a rel="bg-body7" class="bg-box" href=""></a> \
		  <a rel="bg-body8" class="bg-box" href=""></a> \
		  <a rel="bg-body9" class="bg-box" href=""></a> \
		  <a rel="bg-body10" class="bg-box" href=""></a> \
		  <a rel="bg-body11" class="bg-box" href=""></a> \
		  <a rel="bg-body12" class="bg-box" href=""></a> \
		  <a rel="bg-body13" class="bg-box" href=""></a> \
		  <a rel="bg-body14" class="bg-box" href=""></a> \
		  <div class="clear"></div> \
	  </div> \
	  <div class="switchercontainer"> \
		  <span>Fonts Color</span> \
		  <div id="colorpicker9"></div> <span class="pickertext">Menu Link</span>  \
		  <div class="clear"></div> \
		  <div id="colorpicker15"></div> <span class="pickertext">Sub Menu Link</span>  \
		  <div class="clear"></div> \
		  <div id="colorpicker4"></div> <span class="pickertext">Heading</span>  \
		  <div class="clear"></div> \
		  <div id="colorpicker7"></div> <span class="pickertext">Content</span>  \
		  <div class="clear"></div> \
		  <div id="colorpicker5"></div> <span class="pickertext">Link</span>  \
		  <div class="clear"></div> \
		  <div id="colorpicker11"></div> <span class="pickertext">Heading Footer</span>  \
		  <div class="clear"></div> \
		  <div id="colorpicker8"></div> <span class="pickertext">Footer</span>  \
		  <div class="clear"></div> \
		  <div id="colorpicker6"></div> <span class="pickertext">Footer Link</span>  \
		  <div class="clear"></div> \
	  </div> \
	  <div class="switchercontainer"> \
		  <a href="#" id="switcher-reset">Reset</a> \
		  <div class="clear"></div> \
	  </div> \
	</div> \
	';
	
	jQuery("body").prepend( styleswitcherstr );
    
	/*************** COLOR PICKER ******************/
	jQuery('#colorpicker').ColorPicker({
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn("fast");
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut("fast");
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				
				var bgcolor = hex;
				jQuery('body').css({
					"background-color": '#' + bgcolor
				});     
				jQuery.cookie("ts_cookie_bgcolor", bgcolor);   
			},
      color: '#f5f5f5'
    });
	
	jQuery('#colorpicker2').ColorPicker({
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn("fast");
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut("fast");
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				
				var bgcontainercolor = hex;
				jQuery('#container').css({
					"background-color": '#' + bgcontainercolor
				});     
				Cufon.refresh();
				jQuery.cookie("ts_cookie_bgcontainercolor", bgcontainercolor);   
				
			},
      color: '#ffffff'
    });
	
	jQuery('#colorpicker3').ColorPicker({
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn("fast");
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut("fast");
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				
				var bgfootercolor = hex;
				jQuery('#footer').css({
					"background-color": '#' + bgfootercolor
				});     
				Cufon.refresh();
				jQuery.cookie("ts_cookie_bgfootercolor", bgfootercolor);   
				
			},
      color: '#f8f8f8'
    });
	
	jQuery('#colorpicker4').ColorPicker({
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn("fast");
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut("fast");
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				
				var headercolor = hex;
				jQuery('#content h1, #content h2, #content h3, #content h4, #content h5, #content h6, .posttitle a').css({
					"color": '#' + headercolor
				});     
				Cufon.refresh();
				jQuery.cookie("ts_cookie_headercolor", headercolor);   
				
			},
      color: '#303030'
    });
	
	jQuery('#colorpicker5').ColorPicker({
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn("fast");
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut("fast");
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				
				var linkcolor = hex;
				jQuery('#content a').css({
					"color": '#' + linkcolor
				});     
				Cufon.refresh();
				jQuery.cookie("ts_cookie_linkcolor", linkcolor);   
				
			},
      color: '#000000'
    });
	
	jQuery('#colorpicker6').ColorPicker({
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn("fast");
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut("fast");
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				
				var footerlinkcolor = hex;
				jQuery('#footer ul li a').css({
					"color": '#' + footerlinkcolor
				});     
				Cufon.refresh();
				jQuery.cookie("ts_cookie_footerlinkcolor", footerlinkcolor);   
				
			},
      color: '#000000'
    });
	
	jQuery('#colorpicker7').ColorPicker({
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn("fast");
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut("fast");
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				
				var contentcolor = hex;
				jQuery('#content').css({
					"color": '#' + contentcolor
				});     
				Cufon.refresh();
				jQuery.cookie("ts_cookie_contentcolor", contentcolor);   
				
			},
      color: '#666666'
    });
	
	jQuery('#colorpicker8').ColorPicker({
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn("fast");
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut("fast");
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				
				var footercolor = hex;
				jQuery('#footer').css({
					"color": '#' + footercolor
				});     
				Cufon.refresh();
				jQuery.cookie("ts_cookie_footercolor", footercolor);   
				
			},
      color: '#666666'
    });
	
	jQuery('#colorpicker9').ColorPicker({
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn("fast");
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut("fast");
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				
				var menulinkcolor = hex;
				jQuery('#topnav a').css({
					"color": '#' + menulinkcolor
				});     
				Cufon.refresh();
				jQuery.cookie("ts_cookie_menulinkcolor", menulinkcolor);   
				
			},
      color: '#444444'
    });
	jQuery('#colorpicker10').ColorPicker({
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn("fast");
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut("fast");
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				
				var menulinecolor = hex;
				jQuery('#topnav li.back').css({
					"border-top-color": '#' + menulinecolor
				});     
				Cufon.refresh();
				jQuery.cookie("ts_cookie_menulinecolor", menulinecolor);   
				
			},
      color: '#c0c0c0'
    });
	
	jQuery('#colorpicker11').ColorPicker({
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn("fast");
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut("fast");
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				
				var headerfootercolor = hex;
				jQuery('#footer h1, #footer h2, #footer h3, #footer h4, #footer h5, #footer h6').css({
					"color": '#' + headerfootercolor
				});     
				Cufon.refresh();
				jQuery.cookie("ts_cookie_headerfootercolor", headerfootercolor);   
				
			},
      color: '#303030'
    });
	
	jQuery('#colorpicker12').ColorPicker({
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn("fast");
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut("fast");
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				
				var bgsubmenucolor = hex;
				jQuery('#topnav li ul').css({
					"background-color": '#' + bgsubmenucolor
				});     
				jQuery.cookie("ts_cookie_bgsubmenucolor", bgsubmenucolor);   
				
			},
      color: '#ffffff'
    });
	
	jQuery('#colorpicker13').ColorPicker({
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn("fast");
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut("fast");
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				
				var bordertopcolor = hex;
				jQuery('#topnav li').css({
					"border-top-color": '#' + bordertopcolor
				});     
				jQuery.cookie("ts_cookie_bordertopcolor", bordertopcolor);   
				
			},
      color: '#dadada'
    });
	
	jQuery('#colorpicker14').ColorPicker({
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn("fast");
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut("fast");
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				
				var submenulinecolor = hex;
				jQuery('#topnav li li').css({
					"border-top-color": '#' + submenulinecolor
				});     
				jQuery.cookie("ts_cookie_submenulinecolor", submenulinecolor);   
				
			},
      color: '#dadada'
    });
	
	jQuery('#colorpicker15').ColorPicker({
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn("fast");
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut("fast");
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				
				var submenulinkcolor = hex;
				jQuery('#topnav li li a').css({
					"color": '#' + submenulinkcolor
				});     
				Cufon.refresh();
				jQuery.cookie("ts_cookie_submenulinkcolor", submenulinkcolor);   
				
			},
      color: '#444444'
    });
	
	/*************** END COLOR PICKER ******************/
	
	/*************** BACKGROUND PATTERN BOX **************/
	jQuery('#style-switcher a.bg-box').each(function (i) {
		var backgroundUrl = 'url('+templateurl+'/styles/bg/' + jQuery(this).attr('rel') + '.png)';
		var a = jQuery(this);
		a.css({
			backgroundImage: backgroundUrl,
	  		backgroundRepeat: "repeat"
		})
	});
	/*************** END BACKGROUND PATTERN BOX **************/
	
  
  /********** bg-box.click ***************/
  jQuery('#style-switcher a.bg-box').click(function (e) {
      e.preventDefault();
      var backgroundUrl = 'url('+templateurl+'/styles/bg/' + jQuery(this).attr('rel') + '.png)';
      jQuery('body').css({
          backgroundImage: backgroundUrl,
          backgroundRepeat: "repeat"
      });
    jQuery.cookie("ts_cookie_bgimage",backgroundUrl);
  });
  /********** end bg-box.click ***********/

  var bgcolor 			= jQuery.cookie("ts_cookie_bgcolor");
  var defaultPattern	= jQuery.cookie("ts_cookie_defaultBg");
  var pattern 			= jQuery.cookie("ts_cookie_pattern");
  var background 		= jQuery.cookie("ts_cookie_bgimage");
  var bgcontainercolor	= jQuery.cookie("ts_cookie_bgcontainercolor");
  var bgfootercolor		= jQuery.cookie("ts_cookie_bgfootercolor");
  var bordertopcolor	= jQuery.cookie("ts_cookie_bordertopcolor");
  var bgsubmenucolor	= jQuery.cookie("ts_cookie_bgsubmenucolor");
  var headercolor		= jQuery.cookie("ts_cookie_headercolor");
  var menulinkcolor		= jQuery.cookie("ts_cookie_menulinkcolor");
  var menulinecolor		= jQuery.cookie("ts_cookie_menulinecolor");
  var submenulinkcolor	= jQuery.cookie("ts_cookie_submenulinkcolor");
  var submenulinecolor	= jQuery.cookie("ts_cookie_submenulinecolor");
  var contentcolor		= jQuery.cookie("ts_cookie_contentcolor");
  var footercolor		= jQuery.cookie("ts_cookie_footercolor");
  var linkcolor			= jQuery.cookie("ts_cookie_linkcolor");
  var headerfootercolor	= jQuery.cookie("ts_cookie_headerfootercolor");
  var footerlinkcolor	= jQuery.cookie("ts_cookie_footerlinkcolor");
  
  
  if(bgcolor){
	jQuery("body").css({
		"background-color" : "#"+bgcolor
	});  
  }

  if (background) {
      jQuery('body').css({
        backgroundImage: background,
        backgroundRepeat: "repeat"
      });
  }
  
  if(bgcontainercolor){
  	jQuery('#container').css({
		"background-color": '#'+bgcontainercolor
	});
  }
  
  if(bordertopcolor){
  	jQuery('#topnav li').css({
		"border-top-color": '#'+bordertopcolor
	});
  }
  
  if(bgsubmenucolor){
  	jQuery('#topnav li ul').css({
		"background-color": '#'+bgsubmenucolor
	});
  }
  
  if(bgfootercolor){
  	jQuery('#footer').css({
		"background-color": '#'+bgfootercolor	
	});
  }
  
  if(headercolor){
  	jQuery('#content h1, #content h2, #content h3, #content h4, #content h5, #content h6, .posttitle a').css({
		"color": '#'+headercolor
	});
  }
  
  if(menulinkcolor){
  	jQuery('#topnav a').css({
		"color": '#'+menulinkcolor
	});
  }
  
  if(menulinecolor){
  	jQuery('#topnav li.back').css({
		"border-top-color": '#'+menulinecolor
	});
  }
  
  if(submenulinkcolor){
  	jQuery('#topnav li li a').css({
		"color": '#'+submenulinkcolor
	});
  }
  
  if(submenulinecolor){
  	jQuery('#topnav li li').css({
		"border-top-color": '#'+submenulinecolor
	});
  }
  
  if(contentcolor){
  	jQuery('#content').css({
		"color": '#'+contentcolor
	});
  }
  
  if(footercolor){
  	jQuery('#footer').css({
		"color": '#'+footercolor
	});
  }
  
  if(linkcolor){
  	jQuery('#content a').css({
		"color": '#'+linkcolor
	});
  }
  
  if(footerlinkcolor){
  	jQuery('#footer ul li a').css({
		"color": '#'+footerlinkcolor
	});
  }
  
  if(headerfootercolor){
  	jQuery('#footer h1, #footer h2, #footer h3, #footer h4, #footer h5, #footer h6').css({
		"color": '#'+headerfootercolor
	});
  }
  
  Cufon.refresh();
  
  jQuery("#switcher-reset").click(function(){
  		
		var bgcolor = "f5f5f5";
		jQuery('body').css({
			"background-color": '#' + bgcolor
		});     
		jQuery.cookie("ts_cookie_bgcolor", bgcolor);
		
		var backgroundUrl = 'url('+templateurl+'/styles/bg/bg-body1.png)';
		jQuery('body').css({
		  	backgroundImage: backgroundUrl,
		  	backgroundRepeat: "repeat"
	  	});
		jQuery.cookie("ts_cookie_bgimage",backgroundUrl);
		
		var bgcontainercolor = "ffffff";
		jQuery('#container').css({
			"background-color": '#' + bgcontainercolor
		});     
		jQuery.cookie("ts_cookie_bgcontainercolor", bgcontainercolor);
		
		var bordertopcolor = "dadada";
		jQuery('#topnav li').css({
			"border-top-color": '#' + bordertopcolor
		});     
		jQuery.cookie("ts_cookie_bordertopcolor", bordertopcolor);   
		
		var bgsubmenucolor = "ffffff";
		jQuery('#topnav li ul').css({
			"background-color": '#' + bgsubmenucolor
		});     
		jQuery.cookie("ts_cookie_bgsubmenucolor", bgsubmenucolor);
		
		var bgfootercolor = "f8f8f8";
		jQuery('#footer').css({
			"background-color": '#' + bgfootercolor
		});     
		jQuery.cookie("ts_cookie_bgfootercolor", bgfootercolor);  
		
		var headercolor = "303030";
		jQuery('#content h1, #content h2, #content h3, #content h4, #content h5, #content h6, .posttitle a').css({
			"color": '#' + headercolor
		});     
		Cufon.refresh();
		jQuery.cookie("ts_cookie_headercolor", headercolor);  
		
		var linkcolor = "000000";
		jQuery('#content a').css({
			"color": '#' + linkcolor
		});     
		jQuery.cookie("ts_cookie_linkcolor", linkcolor);  
		
		var footerlinkcolor = "000000";
		jQuery('#footer ul li a').css({
			"color": '#' + footerlinkcolor
		});     
		jQuery.cookie("ts_cookie_footerlinkcolor", footerlinkcolor);
		
		var contentcolor = "666666";
		jQuery('#content').css({
			"color": '#' + contentcolor
		});     
		jQuery.cookie("ts_cookie_contentcolor", contentcolor);
		
		var headerfootercolor = "303030";
		jQuery('#footer h1, #footer h2, #footer h3, #footer h4, #footer h5, #footer h6').css({
			"color": '#' + headerfootercolor
		});     
		jQuery.cookie("ts_cookie_headerfootercolor", headerfootercolor);
		
		var footercolor = "666666";
		jQuery('#footer').css({
			"color": '#' + footercolor
		});     
		jQuery.cookie("ts_cookie_footercolor", footercolor);
		
		var menulinkcolor = "444444";
		jQuery('#topnav a').css({
			"color": '#' + menulinkcolor
		});     
		jQuery.cookie("ts_cookie_menulinkcolor", menulinkcolor);
		
		var menulinecolor = "c0c0c0";
		jQuery('#topnav li.back').css({
			"border-top-color": '#' + menulinecolor
		});     
		jQuery.cookie("ts_cookie_menulinecolor", menulinecolor);
		
		var submenulinkcolor = "444444";
		jQuery('#topnav li li a').css({
			"color": '#' + submenulinkcolor
		});     
		jQuery.cookie("ts_cookie_submenulinkcolor", submenulinkcolor);
		
		var submenulinecolor = "dadada";
		jQuery('#topnav li li').css({
			"border-top-color": '#' + submenulinecolor
		});     
		jQuery.cookie("ts_cookie_submenulinecolor", submenulinecolor);
		
		Cufon.refresh();
  });
         
});   
 