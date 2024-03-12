<?php

// Theme Setting
	$themename 			= "Perfekto Theme";
	$shortname 				= "templatesquare";
	
// Options panel
$optLogotype 				= array(
				'imagelogo' 	=> 'Image logo',
				'textlogo' 		=> 'Text-based logo'
				 );
				 
$optTypeSlider 				= array(
				'' => 's3slider',
				'fancyslider' => 'jQuery FancyTransitions'
				 );	
			 
$optArrSlider 				= array(
				'ASC' => 'Ascending',
				'DESC' => 'Descending'
				 );	
				 
$optBgStyle = array(
			'bg-body1.png' => "Pattern1",
			'bg-body2.png' => "Pattern 2",
			'bg-body3.png' => "Pattern 3",
			'bg-body4.png' => "Pattern 4",
			'bg-body5.pngf' => "Pattern 5",
			'bg-body6.png' => "Pattern 6",
			'bg-body7.png' => "Pattern 7",
			'bg-body8.png' => "Pattern 8",
			'bg-body9.png' => "Pattern 9",
			'bg-body10.png' => "Pattern 10",
			'bg-body11.png' => "Pattern 11",
			'bg-body12.png' => "Pattern 12",
			'bg-body13.png' => "Pattern 13",
			'bg-body14.png' => "Pattern 14",
			'bg-body15.png' => "Pattern 15"
			);	 
 
			 
// Setting header
$optionstheme = array (

				/**************************GENERAL SETTINGS**********************/
				array(	"name" => "General",
											"type" => "open"),
											
											
				array(	"name" => __('Header Settings', 'templatesquare'),
											"type" => "heading",
											"desc" => __('', 'templatesquare')),
									
											
				array(	"name" => __('Logo Type', 'templatesquare'),
											"desc" => __('If text-based logo is activated, enter the sitename and tagline in the fields below.', 'templatesquare'),
											"options" => $optLogotype,
											"id" => $shortname."_logo_type",
											"std" => "imagelogo",
											"type" => "select"),
				
				
				array(	"name" => __('Site name', 'templatesquare'),
											"desc" => '',
											"id" => $shortname."_site_name",
											"std" => "",
											"type" => "text"),												
				
																	
				array(	"name" => __('Tagline', 'templatesquare'),
											"desc" => '',
											"id" => $shortname."_tagline",
											"std" => "",
											"type" => "text"),	
											
											
				array(	"name" => __('Logo Image URL', 'templatesquare'),
											"desc" => __('If image logo is activated, enter the logo image url (http://www.fullurl.com/logo.png).', 'templatesquare'),
											"id" => $shortname."_logo_image",
											"std" => "",
											"type" => "text"),
											
				array(	"name" => __('Favicon URL', 'templatesquare'),
											"desc" => __('Enter the favicon image url (http://www.fullurl.com/favicon.ico).', 'templatesquare'),
											"id" => $shortname."_favicon",
											"std" => "",
											"type" => "text"),
											
				array(	"name" => __('Social Networks', 'templatesquare'),
											"type" => "heading",
											"desc" => __('', 'templatesquare')),
									

				array(	"name" => __('Mail', 'templatesquare'),
											"desc" => __('Enter the mail (mailto:mail@yourdomain.com)  or your contact page url.', 'templatesquare'),
											"id" => $shortname."_sMail",
											"std" => "mailto:webmaster@templatesquare.com",
											"type" => "text"),
											
				array(	"name" => __('Facebook Profile', 'templatesquare'),
											"desc" => __('Enter the facebook profile url (http://facebook.com/username).', 'templatesquare'),
											"id" => $shortname."_sFacebook",
											"std" => "http://facebook.com/templatesquare",
											"type" => "text"),
											
				array(	"name" => __('Rss Url', 'templatesquare'),
											"desc" => __('Enter the rss feed url (http://www.fullurl.com/rss).', 'templatesquare'),
											"id" => $shortname."_sRss",
											"std" => "http://templatesquare.com",
											"type" => "text"),
											
				array(	"name" => __('Twitter Profile', 'templatesquare'),
											"desc" => __('Enter the twitter profile url (http://twitter.com/username).', 'templatesquare'),
											"id" => $shortname."_sTwitter",
											"std" => "http://twitter.com/templatesquare",
											"type" => "text"),
											
				array(	"name" => __('Footer Settings', 'templatesquare'),
											"type" => "heading",
											"desc" => __('', 'templatesquare')),
											
																	
				array(	"name" => __('Footer Text', 'templatesquare'),
											"desc" => __('You can use html tag in here.', 'templatesquare'),
											"id" => $shortname."_footer",
											"type" => "textarea"),
		
				array(	"name" => __('Tracking Code', 'templatesquare'),
											"desc" => __('Enter your tracking code here.', 'templatesquare'),
											"id" => $shortname."_google",
											"std" => "",
											"type" => "textarea"),
											
											
				array(	"type" 	=> "close"),
				
				
				/**************************COLOR SETTINGS**********************/			
				array(	"name" => "Style",
											"type" => "open"),
											
				array(	"name" => __('Font Color Settings', 'templatesquare'),
											"type" => "heading",
											"desc" => __('', 'templatesquare')),
											
											
				array(	"name" => __('Top Menu Link', 'templatesquare'),
											"desc" => '',
											"id" => $shortname."_menulinkcolor",
											"std" => "#444444",
											"type" => "colorpicker"),
											
																							
				array(	"name" => __('Top Menu Link Hover', 'templatesquare'),
											"desc" => '',
											"id" => $shortname."_menulinkhovercolor",
											"std" => "#010101",
											"type" => "colorpicker"),
											
				array(	"name" => __('Top Sub Menu Link', 'templatesquare'),
											"desc" => '',
											"id" => $shortname."_submenulinkcolor",
											"std" => "#444444",
											"type" => "colorpicker"),
											
																							
				array(	"name" => __('Top Sub Menu Link Hover', 'templatesquare'),
											"desc" => '',
											"id" => $shortname."_submenulinkhovercolor",
											"std" => "#010101",
											"type" => "colorpicker"),
											
				array(	"name" => __('Text Content', 'templatesquare'),
											"desc" => '',
											"id" => $shortname."_textcontentcolor",
											"std" => "#666666",
											"type" => "colorpicker"),
											
				array(	"name" => __('Link Content', 'templatesquare'),
											"desc" => '',
											"id" => $shortname."_linkcontentcolor",
											"std" => "#2b2b2b",
											"type" => "colorpicker"),												
		
				array(	"name" => __('Heading Title', 'templatesquare'),
											"desc" => '',
											"id" => $shortname."_headingtitlecolor",
											"std" => "#303030",
											"type" => "colorpicker"),	
											
				array(	"name" => __('Heading Title Footer', 'templatesquare'),
											"desc" => '',
											"id" => $shortname."_headingtitlefootercolor",
											"std" => "#303030",
											"type" => "colorpicker"),
											
				array(	"name" => __('Text Footer', 'templatesquare'),
											"desc" => '',
											"id" => $shortname."_textfootercolor",
											"std" => "#666666",
											"type" => "colorpicker"),
											
				array(	"name" => __('Border List Footer', 'templatesquare'),
											"desc" => '',
											"id" => $shortname."_borderlistfootercolor",
											"std" => "#dadada",
											"type" => "colorpicker"),
											
				array(	"name" => __('Link Footer', 'templatesquare'),
											"desc" => '',
											"id" => $shortname."_linkfootercolor",
											"std" => "#2b2b2b",
											"type" => "colorpicker"),
											
											
				array(	"name" => __('Background Color Settings', 'templatesquare'),
											"type" => "heading",
											"desc" => __('', 'templatesquare')),
				

				array(	"name" => __('Body', 'templatesquare'),
											"desc" => '',
											"id" => $shortname."_bgbodycolor",
											"std" => "#f5f5f5",
											"type" => "colorpicker"),
											
				array(	"name" => __('Top Menu Line', 'templatesquare'),
											"desc" => '',
											"id" => $shortname."_menulinecolor",
											"std" => "#dadada",
											"type" => "colorpicker"),
											
				array(	"name" => __('Top Menu Line Hover', 'templatesquare'),
											"desc" => '',
											"id" => $shortname."_menulinehovercolor",
											"std" => "#c0c0c0",
											"type" => "colorpicker"),
											
				array(	"name" => __('Top Sub Menu Line', 'templatesquare'),
											"desc" => '',
											"id" => $shortname."_submenulinecolor",
											"std" => "#dadada",
											"type" => "colorpicker"),
											
											
				array(	"name" => __('Top Sub Menu Background', 'templatesquare'),
											"desc" => '',
											"id" => $shortname."_bgsubmenucolor",
											"std" => "#ffffff",
											"type" => "colorpicker"),
											
				array(	"name" => __('Content', 'templatesquare'),
											"desc" => '',
											"id" => $shortname."_bgcontentcolor",
											"std" => "#ffffff",
											"type" => "colorpicker"),
											
				array(	"name" => __('Footer', 'templatesquare'),
											"desc" => '',
											"id" => $shortname."_bgfootercolor",
											"std" => "#f8f8f8",
											"type" => "colorpicker"),
											
											
				array(	"name" => __('Background Patern Settings', 'templatesquare'),
											"type" => "heading",
											"desc" => __('', 'templatesquare')),
											
				array(	"name" => __('Background Pattern', 'templatesquare'),
											"desc" => __('Choose the background you want.', 'templatesquare'),
											"options" => $optBgStyle,
											"id" => $shortname."_background",
											"std" => "bg-body1.png",
											"type" => "select"),
											
				array(	"name" => __('Background Pattern URL', 'templatesquare'),
											"desc" => __('enter the background image url (http://www.fullurl.com/yourbg.png).', 'templatesquare'),
											"id" => $shortname."_bg_image",
											"std" => "",
											"type" => "text"),
											
				array(	"name" => __('Style Switcher', 'templatesquare'),
											"desc" => 'For Demo Only',
											"id" => $shortname."_styleswitcher",
											"std" => "",
											"type" => "checkbox"),
											
											
				array(	"type" 	=> "close"),

				
				/**************************SLIDER SETTINGS**********************/
				array(	"name" => "Slider",
											"type" => "open"),
									
				array(	"name" => __('Slider Homepage Settings', 'templatesquare'),
											"type" => "heading",
											"desc" => __('', 'templatesquare')),
											
				array(	"name" => __('Slider Type', 'templatesquare'),
											"desc" => __('Select slider type.', 'templatesquare'),
									"options" => $optTypeSlider,
									"id" => $shortname."_slider_type",
									"std" => "",
									"type" => "select"),
											
											
				array(	"name" => __('Arrange Slider Post', 'templatesquare'),
									"desc" => __('Select arrange.', 'templatesquare'),
									"options" => $optArrSlider,
									"id" => $shortname."_slider_arrange",
									"std" => "ASC",
									"type" => "select"),
									
				array(	"name" => __('Text Url', 'templatesquare'),
									"desc" => __('', 'templatesquare'),
									"id" => $shortname."_slider_texturl",
									"std" => "Read more &raquo;",
									"type" => "text"),
									
											
				array(	"name" => __('Disable Slider Text', 'templatesquare'),
											"desc" => __('Select this checkbox to disable the slider text.', 'templatesquare'),
											"id" => $shortname."_slider_disable_text",
											"std" => "",
											"type" => "checkbox"),
											

				array(	"name" => __('s3Slider Settings', 'templatesquare'),
											"type" => "heading",
											"desc" => __('', 'templatesquare')),
											
				array( 	"name" => __('Slider Timeout', 'templatesquare'),
											"desc" => __('Please enter number for default slider timeout(transition time). Default is 5000', 'templatesquare'),
											"id" => $shortname."_slider_timeout",
											"std" => "10000",
											"type" => "text"),
											
				array(	"name" => __('jqFancyTransitions Settings', 'templatesquare'),
											"type" => "heading",
											"desc" => __('', 'templatesquare')),
											
				array( 	"name" => __('Effect', 'templatesquare'),
											"desc" => __('Please enter name of transition effect (or comma separated names, ex: wave, zipper, curtain).', 'templatesquare'),
											"id" => $shortname."_slider_effect",
											"std" => "",
											"type" => "text"),
											
				array( 	"name" => __('Strips', 'templatesquare'),
											"desc" => __('Number of strips.', 'templatesquare'),
											"id" => $shortname."_slider_strips",
											"std" => "20",
											"type" => "text"),
											
				array( 	"name" => __('Delay', 'templatesquare'),
											"desc" => __('Delay between images in ms.', 'templatesquare'),
											"id" => $shortname."_slider_delay",
											"std" => "5000",
											"type" => "text"),
											
											
				array( 	"name" => __('Strip Delay', 'templatesquare'),
											"desc" => __('Delay beetwen strips in ms.', 'templatesquare'),
											"id" => $shortname."_slider_strips_delay",
											"std" => "20",
											"type" => "text"),
											
											
				array( 	"name" => __('Title Opacity', 'templatesquare'),
											"desc" => __('Opacity of title.', 'templatesquare'),
											"id" => $shortname."_slider_title_opacity",
											"std" => "0.7",
											"type" => "text"),
											
											
				array( 	"name" => __('Title Speed', 'templatesquare'),
											"desc" => __('Speed of title appereance in ms.', 'templatesquare'),
											"id" => $shortname."_slider_title_speed",
											"std" => "1000",
											"type" => "text"),
											
											
				array( 	"name" => __('Position', 'templatesquare'),
											"desc" => __('top, bottom, alternate, curtain.', 'templatesquare'),
											"id" => $shortname."_slider_position",
											"std" => "alternate",
											"type" => "text"),
											
											
				array( 	"name" => __('Direction', 'templatesquare'),
											"desc" => __('left, right, alternate, random, fountain, fountainAlternate.', 'templatesquare'),
											"id" => $shortname."_slider_direction",
											"std" => "fountainAlternate",
											"type" => "text"),
											
											
				array( 	"name" => __('Disable Navigation', 'templatesquare'),
											"desc" => __('prev and next navigation buttons.', 'templatesquare'),
											"id" => $shortname."_slider_disable_navigation",
											"std" => "",
											"type" => "checkbox"),
											
											
				array(	"name" => __('Mini Slider Shortcode Settings', 'templatesquare'),
											"type" => "heading",
											"desc" => __('', 'templatesquare')),
											
				array( 	"name" => __('Slider Timeout', 'templatesquare'),
											"desc" => __('Please enter number for default slider timeout(transition time). Default is 5000', 'templatesquare'),
											"id" => $shortname."_slidermini_timeout",
											"std" => "10000",
											"type" => "text"),
											
				array( 	"name" => __('Effect', 'templatesquare'),
											"desc" => __('Please enter name of transition effect (or comma separated names, ex: fade,scrollUp,shuffle). Default is (fade). <br>for more effects visit <a href="http://jquery.malsup.com/cycle/browser.html">http://jquery.malsup.com/cycle/browser.html</a>', 'templatesquare'),
											"id" => $shortname."_slidermini_effect",
											"std" => "fade",
											"type" => "text"),
											
											
				array(	"type" 	=> "close"),
				
				
);


		function mytheme_add_admin() {
	    global $themename, $shortname, $optionstheme;
		$getpage = (isset($_GET['page']))? $_GET['page'] : "";
	    if ( $getpage == basename(__FILE__) ) {
	      if (isset($_REQUEST['reset']) ) {
		      foreach ($optionstheme as $value) {
		      	update_option( $value['id'],  $value['std'] ); }
		      foreach ($optionstheme as $value) {
		      	if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $value['std'] ); } else { delete_option( $value['id'] ); } }
		      header("Location: themes.php?page=admin-options.php&saved=true");
		      die;
	      }
		  if ( 'save' == $_REQUEST['action'] ) {
		      foreach ($optionstheme as $value) {
		      	update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
		      foreach ($optionstheme as $value) {
		      	if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
		      header("Location: themes.php?page=admin-options.php&saved=true");
		      die;
	      }
	      
	    }
	    add_theme_page($themename." Options", "Theme Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');
		}
		
		function mytheme_admin() {
	
	    global $themename, $shortname, $optionstheme;
	
	    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
	    
?>

	<div class="wrap">
	<div id="icon-themes" class="icon32"><br></div>
	<h2><?php echo $themename; ?> <?php _e('Options','templatesquare');?></h2>
	<div class="bordertitle"></div>
	<style type="text/css">
	table, td {font-size:13px; }
	th {font-weight:normal; width:250px;}
	span.setting-description { font-size:11px; line-height:16px; font-style:italic;}
	</style>
	
	<link rel="stylesheet" media="screen" type="text/css" href="<?php echo get_template_directory_uri(); ?>/admin/css/colorpicker.css" />
	<script type="text/javascript" src="<?php echo get_template_directory_uri();  ?>/admin/js/colorpicker.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri();  ?>/admin/js/eye.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/admin/js/utils.js"></script>
	<link rel="stylesheet" media="screen" type="text/css" href="<?php echo get_template_directory_uri();  ?>/admin/css/tabs.css" />
	<!-- Javascript for the tabs -->
	<script type="text/javascript">
	var $ = jQuery.noConflict();
		$(document).ready(function(){
			/* For Tab */
			$(".tab_content").hide(); //Hide all content
			$("ul.tabs li:first").addClass("active").show(); //Activate first tab
			$(".tab_content:first").show(); //Show first tab content
			//On Click Event
			$("ul.tabs li").click(function() {
				$("ul.tabs li").removeClass("active"); //Remove any "active" class
				$(this).addClass("active"); //Add "active" class to selected tab
				$(".tab_content").hide(); //Hide all tab content
				var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
				$(activeTab).fadeIn(900); //Fade in the active content
				return false;
			});
	});	
	</script><br />
	
	<ul class="tabs"> 
		<li><a href="#General"><?php _e('General','templatesquare'); ?></a></li>
		<li><a href="#Style"><?php _e('Style','templatesquare'); ?></a></li>
		<li><a href="#Slider"><?php _e('Slider','templatesquare'); ?></a></li>
	</ul> 

		<form method="post">
		<div class="tab_container">
		<?php 
			foreach ($optionstheme as $value) {
			if ($value['type'] == "open") { 
		?>
		 
		 <div id="<?php echo $value['name']; ?>" class="tab_content" >
		<table  border="1" cellpadding="0" cellspacing="12" style="text-align:left">
		<?php
				}
				if ($value['type'] == "close") { 
		?>
		</table></div>
		<?php
				}
				if ($value['type'] == "heading") { 
		?>
		<thead>
		<tr>
        	<td colspan="2"><h3><?php echo $value['name']; ?></h3><span class="setting-description"><?php echo $value['desc']; ?></span></td>
        </tr>
		</thead>
		<?php
				}
				
				if ($value['type'] == "description") { 
		?>
		<tr valign="top"> 
		    <th scope="row"><?php echo $value['name']; ?>:</th>
		    <td>
					<span class="setting-description"><?php echo $value['desc']; ?></span>
		    </td>
		</tr>
		<?php
				}
				
				if ($value['type'] == "info") { 
		?>
		<tr valign="top"> 
		    <th scope="row" colspan="2"><span class="setting-description"><?php echo $value['desc']; ?></span></th>

		</tr>
		<?php
				}
				if ($value['type'] == "line") { 
		?>
		<tr valign="top"> 
		    <th colspan="2" ><div style="padding-top:10px;padding-bottom:10px; vertical-align:middle; padding-left:0px;"><div style="border-bottom: 1px solid #efefef;"></div></div></th>

		</tr>
		
		<?php
				}
				
				
				if ($value['type'] == "text") { 
		?>
		<tr valign="top"> 
		    <th scope="row"><?php echo $value['name']; ?>:</th>
		    <td>
		        <input name="<?php echo $value['id']; ?>" size="60" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" /><br />
 
						<span class="setting-description"><?php echo $value['desc']; ?></span>
		    </td>
		</tr>
		<?php
				}
				
				
				if ($value['type'] == "textarea") { 
				
		?>
		
		<tr valign="top"> 
		    <th scope="row"><?php echo $value['name']; ?>:</th>
		    <td>
			<textarea cols="50" rows="5"  name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option($value['id']));; } else { echo $value['std']; } ?></textarea><br /><span class="setting-description"><?php echo $value['desc']; ?></span>

		    </td>
		</tr>
		<?php
				}
			if ($value['type'] == "checkbox") { 
		?>
		<tr valign="top"> 
		    <th scope="row"><?php echo $value['name']; ?>:</th>
		    <td>
			<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                            <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                            <br /><span class="setting-description"><?php echo $value['desc']; ?></span>
		    </td>
		</tr>
		<?php
				}
			if ($value['type'] == "checkbox-pages") { 
		?>
		<tr valign="top"> 
		    <th scope="row"><?php echo $value['name']; ?>:<br /><span class="setting-description"><?php echo $value['desc']; ?></span></th>
		    <td>
			<?php 
			$pages_list = get_pages();

			
			?>
			
<table><?php $i = 0; foreach ($pages_list as $option) { $checked = ""; ?><?php if (get_option( $value['id'])) { if (in_array($option->ID, get_option( $value['id'] ))) $checked = "checked=\"checked\""; } elseif ($value['std'][$i] == "true") { $checked = "checked=\"checked\""; } ?><tr><td><input type="checkbox" name="<?php echo $value['id']; ?>[]" id="<?php echo $value['id']; ?>-<?php echo $option->ID; ?>" value="<?php echo $option->ID; ?>" <?php echo $checked; ?> /> <label for="<?php echo $value['id']; ?>-<?php echo $option->ID; ?>"><?php echo is_array($value['desc'])?$value['desc'][$i]:$option->post_title; ?></label> </td></tr> <?php $i++; } ?></table>
		    </td>
		</tr>
		<?php
				}

				if ($value['type'] == "select") { 
		?>
		<tr valign="top"> 
		    <th scope="row"><?php echo $value['name']; ?>:</th>
		    <td>
						<select style="width:50%" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $key => $option) { ?><option<?php if ( get_option( $value['id'] ) == $key) { echo ' selected="selected"'; } elseif ($key == $value['std']) { echo ' selected="selected"'; } ?> value="<?php echo $key; ?>"><?php echo $option; ?></option><?php } ?></select> <br /><span class="setting-description"><?php echo $value['desc']; ?></span>
		    </td>
		</tr>
		<?php
				}
				
				
				if ($value['type'] == "colorpicker") { 
		?>
		<tr valign="top"> 
		    <th scope="row"><?php echo $value['name']; ?>:</th>
		    <td>
            <script language="javascript">
            	(function($){
					var initLayout = function() {		
						$('#colorSelector-<?php echo $value['id']; ?>').ColorPicker({
							color: '<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>',
							onShow: function (colpkr) {
								$(colpkr).fadeIn(500);
								return false;
							},
							onHide: function (colpkr) {
								$(colpkr).fadeOut(500);
								return false;
							},
							onChange: function (hsb, hex, rgb) {
								$('#colorSelector-<?php echo $value['id'] ?> div').css('backgroundColor', '#' + hex);
								$("#<?php echo $value['id']; ?>").attr('value', '#' + hex);								
							}
						});
					};	
					EYE.register(initLayout, 'init');
				})(jQuery)
            </script>
			<div id="colorContainer" style="float:left"><div id="colorSelector-<?php echo $value['id']; ?>"><div style="background-color: <?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>"></div></div></div>
            <input style="margin:8px 0 0 10px" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" />  
			          
		    </td>
		</tr>
		<?php
				}

				if ($value['type'] == "select-categories") { 
				
					$pn_categories_obj = get_categories('hide_empty=0');
					$pn_categories = array();
						
					foreach ($pn_categories_obj as $pn_cat) {
						$pn_categories[$pn_cat->cat_ID] = $pn_cat->cat_name;
					}
					$categories_tmp = array_unshift($pn_categories, "All Categories");
		?>
		<tr valign="top"> 
		    <th scope="row"><?php echo $value['name']; ?>:</th>
		    <td>
		        <select style="width:140px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
               <?php foreach ($pn_categories as $option) { ?>
               <option <?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
               <?php } ?>
           </select><br />
 <span class="setting-description"><?php echo $value['desc']; ?></span>
		    </td>
		</tr>
		<?php
				}	

			}
		?>
		</table>
	</div>
	
	<p class="submit">
	<input name="save" type="submit" class="button-primary" value="Save changes" /> 
	<input name="reset" type="submit" class="button-primary"  value="<?php _e('Restore Defaults', 'templatesquare')?>" onclick="return confirm('<?php _e('Click OK to reset. Any theme settings will be lost!', 'templatesquare')?>');"/>
	<input type="hidden" id="action" name="action" value="save" />
	</p>
	</form>
	
	<?php
	}
	add_action('admin_menu', 'mytheme_add_admin');

?>
