<?php
/**
 * The Header for our theme.
 *
 *
 * @package WordPress
 * @subpackage Perfekto
 * @since Perfekto 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'templatesquare' ), max( $paged, $page ) );

	?></title>
<?php $bodyclass = ""; ?>
<?php  $optColorStyle = get_option('templatesquare_color_style')? get_option('templatesquare_color_style') : "blue" ;?>
<?php 
	/***********************STYLE SWITCHER****************************/
	
	$styleswitcher = get_option("templatesquare_styleswitcher");
	if($styleswitcher==true){
		$optStyleSwitcher = isset($_SESSION['StyleColor'])? $_SESSION['StyleColor'] : $optColorStyle;
		if(isset($_POST['cmbstyleswitcher'])){
			$_SESSION['StyleColor'] = $_POST['cmbstyleswitcher'];
			$optStyleSwitcher = $_SESSION['StyleColor'];
		}
		$optColorStyle = $optStyleSwitcher;
	}
	
	/***********************END STYLE SWITCHER****************************/
?>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/s3slider.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/jqfancytransitions.css" />
<!--<link rel="stylesheet" type="text/css" media="all" href="<?php //echo get_template_directory_uri(); ?>/styles/<?php //echo $optColorStyle;?>/style.css" id="skins-switcher" />
--><link rel="alternate" id="templateurl" href="<?php echo get_template_directory_uri(); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php 
$favicon = get_option('templatesquare_favicon');
?>
<link rel="shortcut icon" href="<?php echo $favicon; ?>" />
<?php if (is_front_page()) { ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>	
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/carousel.min.js"></script>
<?php } ?>	
<?php

	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>

<?php if($styleswitcher==true){?>
<!-- ////////////////////////////////// -->
<!-- //         Custom Files         // -->
<!-- ////////////////////////////////// -->
<link href="<?php echo get_template_directory_uri(); ?>/styles/colorpicker.css" rel="stylesheet" type="text/css" />
<link href="<?php echo get_template_directory_uri(); ?>/styles/style-switcher.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/colorpicker.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/switcher.js"></script>
<?php } ?>


<!-- ////////////////////////////////// -->
<!-- //      Get Option					        // -->
<!-- ////////////////////////////////// -->
<?php
	$sliderType = get_option('templatesquare_slider_type');
	$sliderTimeout = get_option('templatesquare_slider_timeout');
	$sliderDisabletext= get_option('templatesquare_slider_disable_text');
	
	$sliderEffect= get_option('templatesquare_slider_effect');
	$sliderStrips= get_option('templatesquare_slider_strips');
	$sliderDelay= get_option('templatesquare_slider_delay');
	$sliderStripsDelay= get_option('templatesquare_slider_strips_delay');
	$sliderTitleOpacity= get_option('templatesquare_slider_title_opacity');
	$sliderTitleSpeed= get_option('templatesquare_slider_title_speed');
	$sliderPosition= get_option('templatesquare_slider_position');
	$sliderDirection= get_option('templatesquare_slider_direction');
	$sliderDisableNav= get_option('templatesquare_slider_disable_navigation');
	
	$sliderMiniTimeout = get_option('templatesquare_slidermini_timeout');
	$sliderMiniEffect= get_option('templatesquare_slidermini_effect');
	
?>
<!-- ////////////////////////////////// -->
<!-- //      Javascript Files        			// -->
<!-- ////////////////////////////////// -->
<script type="text/javascript">
	 Cufon.replace('h1') ('h2') ('h3') ('h4') ('h5') ('h6') ('.navigation ') ('.pagenavi a', {hover:true});
	 Cufon.replace('#topnav li a', { hover:true, fontFamily: 'Khmer UI' });
</script>
<script type="text/javascript">
var $jts = jQuery.noConflict();

$jts(document).ready(function(){
	
	//Single portfolio and Mini Slider cycle
	$jts('#slider').cycle({
            timeout: <?php echo $sliderMiniTimeout;?>,  // milliseconds between slide transitions (0 to disable auto advance)
            fx:      '<?php echo $sliderMiniEffect; ?>', // choose your transition type, ex: fade, scrollUp, shuffle, etc...            
			pager:   '#pager',  // selector for element to use as pager container
            pause:   0,	  // true to enable "pause on hover"
			cleartypeNoBg: true, // set to true to disable extra cleartype fixing (leave false to force background color setting on slides) 
            pauseOnPagerHover: 0 // true to pause when hovering over pager link
        });	
		
	
	//Widget cycle
	$jts('.boxslideshow').cycle({
		timeout: 6000,  // milliseconds between slide transitions (0 to disable auto advance)
		fx:      'fade', // choose your transition type, ex: fade, scrollUp, shuffle, etc...            
		pause:   0,	  // true to enable "pause on hover"
		cleartypeNoBg:true, // set to true to disable extra cleartype fixing (leave false to force background color setting on slides)
		after:onAfter,
		pauseOnPagerHover: 0
	});
	
	$jts('.boxslideshow2').cycle({
		timeout: 6000,  // milliseconds between slide transitions (0 to disable auto advance)
		fx:      'scrollVert', // choose your transition type, ex: fade, scrollUp, shuffle, etc...            
		pause:   0,	  // true to enable "pause on hover"
		cleartypeNoBg:true, // set to true to disable extra cleartype fixing (leave false to force background color setting on slides)
		after:onAfter,
		pauseOnPagerHover: 0 // true to pause when hovering over pager link
	});
	
	function onAfter(curr, next, opts, fwd){
	    //get the height of the current slide
	    var $ht =  $jts(this).height();
		
	    //set the container's height to that of the current slide
	    $jts(this).parent().animate({height: $ht});
	}
	
	//jQuery tab
	$jts(".tab-content").hide(); //Hide all content
	$jts("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$jts(".tab-content:first").show(); //Show first tab content
	//On Click Event
	$jts("ul.tabs li").click(function() {
		$jts("ul.tabs li").removeClass("active"); //Remove any "active" class
		$jts(this).addClass("active"); //Add "active" class to selected tab
		$jts(".tab-content").hide(); //Hide all tab content
		var activeTab = $jts(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
		$jts(activeTab).fadeIn(200); //Fade in the active content
		return false;
	});
	
	//jQuery toggle
	$jts(".toggle_container").hide();
	$jts("h2.trigger").click(function(){
		$jts(this).toggleClass("active").next().slideToggle("slow");
	});

	// Homepage slider
	<?php if(is_front_page()){ ?>
		<?php if($sliderType=="fancyslider"){?>
		
			//jQuery FancyTransition
			$jts('#slideshowHolder').jqFancyTransitions({
			 width: 940,
			 height: 370,
			effect: '<?php echo $sliderEffect;?>', // wave, zipper, curtain
			strips: <?php echo $sliderStrips;?>, // number of strips
			delay: <?php echo $sliderDelay;?>, // delay between images in ms
			stripDelay: <?php echo $sliderStripsDelay;?>, // delay beetwen strips in ms
			titleOpacity: <?php echo $sliderTitleOpacity;?>, // opacity of title
			titleSpeed: <?php echo $sliderTitleSpeed;?>, // speed of title appereance in ms
			position: '<?php echo $sliderPosition;?>', // top, bottom, alternate, curtain
			direction: '<?php echo $sliderDirection;?>', // left, right, alternate, random, fountain, fountainAlternate
			navigation: <?php if($sliderDisableNav!=true){echo "true";} else{echo "false";}?> // prev and next navigation buttons		 navigation: true
			  });
			
			<?php }else{?>
		
			//jQuery s3slider
			$jts("#s3slider").s3Slider({
					timeOut: <?php echo $sliderTimeout;?>
			 });
			 
		 <?php } ?>
	 <?php } ?>
	 
	
});
</script>
<!-- ////////////////////////////////// -->
<!-- //     Background & Title Color		 // -->
<!-- ////////////////////////////////// -->
<?php 
$optBgStyle = get_option('templatesquare_background')? get_option('templatesquare_background') : "bg-body1.png" ;
$optYourImg = get_option('templatesquare_bg_image');
$BgColor = get_option('templatesquare_bgbodycolor');
$BgSubmenuColor = get_option('templatesquare_bgsubmenucolor');
$BgContentColor = get_option('templatesquare_bgcontentcolor');
$BgFooterColor = get_option('templatesquare_bgfootercolor');

$menulinkcolor = get_option('templatesquare_menulinkcolor');
$menulinkhovercolor = get_option('templatesquare_menulinkhovercolor');
$submenulinkcolor = get_option('templatesquare_submenulinkcolor');
$submenulinkhovercolor = get_option('templatesquare_submenulinkhovercolor');
$menulinecolor = get_option('templatesquare_menulinecolor');
$menulinehovercolor = get_option('templatesquare_menulinehovercolor');
$submenulinecolor = get_option('templatesquare_submenulinecolor');
$textcontentcolor = get_option('templatesquare_textcontentcolor');
$linkcontentcolor = get_option('templatesquare_linkcontentcolor');
$headingtitlecolor = get_option('templatesquare_headingtitlecolor');
$headingtitlefootercolor = get_option('templatesquare_headingtitlefootercolor');
$textfootercolor = get_option('templatesquare_textfootercolor');
$linkfootercolor = get_option('templatesquare_linkfootercolor');
$borderlistfootercolor = get_option('templatesquare_borderlistfootercolor');
?>

<style type="text/css" media="all">
body {
	<?php if($optYourImg==""){?>
		background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/styles/bg/<?php echo $optBgStyle;?>);
	<?php } else { ?>
		background-image:url(<?php echo $optYourImg;?>);
	<?php } ?>
	background-repeat:repeat;
	background-color:<?php echo $BgColor;?>;
	background-repeat:repeat;
	background-position:top;
	background-attachment:fixed;
}

/* links Default */
a, a:visited, a:hover{color:<?php echo $linkcontentcolor;?>; }

/* frame image */
.imgborder{ background-color:#f6f6f6; border:1px solid #eaeaea; padding:4px;}

/* top navigation */
#topnav a{color:<?php echo $menulinkcolor;?>}
#topnav li a:hover{color:<?php echo $menulinkhovercolor;?>}

#topnav li li a  {color:<?php echo $submenulinkcolor;?>}
#topnav li li a:hover{color:<?php echo $submenulinkhovercolor;?>}

#topnav li {border-top:1px solid <?php echo $menulinecolor;?>;}
#topnav li li {border-top:1px solid <?php echo $submenulinecolor;?>;}

/* line at menu top */
#topnav li.back {border-top:2px solid <?php echo $menulinehovercolor;?>;}

/* bg color dropdown menu*/
#topnav li ul{	background-color: <?php echo $BgSubmenuColor;?>;}

/* bg color container */
#container{	background-color:<?php echo $BgContentColor;?>; }

/* text content */
#content{color:<?php echo $textcontentcolor;?>}

/* heading */
#content h1, #content h2,#content h3,#content h4,
#content h5,#content h6, .posttitle a, .posttitle a:visited{color:<?php echo $headingtitlecolor;?>}

/* bg color footer*/
#footer{background-color:<?php echo $BgFooterColor;?>;}

/* font color footer*/
#footer h1, #footer h2, #footer h3, #footer h4, #footer h5, #footer h6{color:<?php echo $headingtitlefootercolor;?>;}
#footer{ color:<?php echo $textfootercolor;?>;}
#footer ul li a, #footer ul li a:visited{color:<?php echo $linkfootercolor;?>;}
#footer ul li{border-bottom:solid 1px <?php echo $borderlistfootercolor;?>;}

/*slider*/
<?php if($sliderDisabletext==true){?>
.s3sliderImage div{
   filter: alpha(opacity=0); /* here you can set the opacity of box with text */
   opacity: 0; /* here you can set the opacity of box with text */
}
<?php } ?>

</style>

</head>

<body <?php body_class($bodyclass); ?>>
		<div id="frame">
			<div id="container">
			<div class="pad_container">
				<div id="top">
					<div id="top-left">
						<?php
						$logotype = get_option('templatesquare_logo_type');
						$logoimage =get_option('templatesquare_logo_image'); 
						$sitename = get_option('templatesquare_site_name');
						$tagline = get_option('templatesquare_tagline');
						if($logoimage == ""){ $logoimage = get_stylesheet_directory_uri() . "/images/logo.png"; }
						?>
						<?php if($logotype == 'textlogo'){ ?>
							<div id="logo">
								<?php if($sitename=="" && $tagline==""){?>
									<h1><a href="<?php echo home_url( '/'); ?>" title="<?php _e('Click for Home','templatesquare'); ?>"><?php bloginfo('name'); ?></a></h1><span class="desc"><?php bloginfo('description'); ?></span>
								<?php }else{ ?>
									<h1><a href="<?php echo home_url( '/'); ?>" title="<?php _e('Click for Home','templatesquare'); ?>"><?php echo $sitename; ?></a></h1><span class="desc"><?php echo $tagline; ?></span>
								<?php }?>
							
							</div><!-- end #logo -->
							<?php } else { ?>
							<div id="logo">
								<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'templatesquare' ) ); ?>" >
									<img src="<?php echo $logoimage;?>" alt="" />
								</a>
							</div><!-- end #logo -->
						<?php }?>
					</div><!-- end #top-left -->
					<div id="top-right">
						<?php
						$sMail = get_option('templatesquare_sMail');
						$sFb = get_option('templatesquare_sFacebook');
						$sRss = get_option('templatesquare_sRss');
						$sTwitter = get_option('templatesquare_sTwitter');
						
						 ?>
						<ul class="sn">
							<?php if($sMail!=""){?><li>
							<a href="<?php echo $sMail;?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/i-email.png" alt=""  /></a></li><?php } ?>
							<?php if($sFb!=""){?><li><a href="<?php echo $sFb;?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/i-fb.png" alt=""  /></a></li><?php } ?>
							<?php if($sRss!=""){?><li><a href="<?php echo $sRss;?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/i-rss.png" alt=""  /></a></li><?php } ?>
							<?php if($sTwitter!=""){?><li><a href="<?php echo $sTwitter;?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/i-twitter.png" alt=""  /></a></li><?php } ?>
						</ul>
					
					</div><!-- end #top-right -->
					<div class="donatenow"><form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
<input type="image" src="http://axslab.org/wp-content/themes/perfekto/images/btn-donate_now.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
</div>
				</div><!-- end #top -->
				
				<div id="top-navigation">
					<?php wp_nav_menu( array(
						  'container'       => 'ul', 
						  'menu_class'      => 'lavaLamp',
						  'menu_id'         => 'topnav', 
						  'depth'           => 0,
						  'sort_column'    => 'menu_order',
						  'fallback_cb'     => 'nav_page_fallback',
						  'theme_location' => 'mainmenu' 
						  )); 
					?>
			  </div><!-- end #top-navigation -->
			<div class="clear"></div><!-- clear float -->  
				
			<?php if(is_front_page()){?>
				<?php include(TEMPLATEPATH . '/slider.php');?>
			<?php } ?>