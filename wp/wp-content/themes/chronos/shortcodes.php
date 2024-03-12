<?php 
$textdomain = 'chronos';
global $pre_text;

$pre_text = 'VG ';
//Slider
add_shortcode('slider', 'slider_func');
function slider_func($atts, $content = null){
	extract(shortcode_atts(array(
		'images'		=> 		'',
		'subtitle'		=>		'',
		'link_fb'		=>		'',
		'link_tw'		=>		'',
		'link_gg'		=>		'',
		'link_gh'		=>		'',
		'link_sc'		=>		'',
		'text_sc'		=>		'',
		'class_sc'		=>		'',
		'scroll'		=>		'',
		'text_st'		=>		'',
		'pattern'		=>		'',
	), $atts));
	ob_start(); 
	$photo = wp_get_attachment_image_src($pattern,'');
	?>	
	<?php if(isset($photo) && $photo != ''){ ?>
		<div class="just_pattern" style="background-image: url(<?php echo esc_url($photo[0]); ?>);"></div>
	<?php }else{} ?>	
		<div class="big-text">
			<ul class="flippy">
			<?php 
			$img_ids = explode(",",$images);
			$i=1;
			foreach( $img_ids AS $img_id ){

			$image_src = wp_get_attachment_image_src($img_id,'');
			$meta = wp_prepare_attachment_for_js($img_id);
			$title=$meta['title'];
			?>
				<li><span><?php echo esc_attr($title); ?></span></li>
			<?php $i++; } ?>
			</ul>
		</div>
		<div class="small-text"><?php echo esc_attr($subtitle); ?></div>
		<div class="social-top">
			<ul class="list-social">
			<?php if(isset($link_tw) && $link_tw != ''){ ?>
				<li class="icon-soc tipped" data-title="twitter"  data-tipper-options='{"direction":"top","follow":"true"}'>
					<a href="<?php echo esc_url($link_tw); ?>"><i class="fa-twitter"></i></a>
				</li>
			<?php }else{} ?>
			<?php if(isset($link_fb) && $link_fb != ''){ ?>
				<li class="icon-soc tipped" data-title="facebook"  data-tipper-options='{"direction":"top","follow":"true"}'>
					<a href="<?php echo esc_url($link_fb); ?>"><i class="fa-facebook"></i></a>
				</li>
			<?php }else{} ?>
			<?php if(isset($link_gh) && $link_gh != ''){ ?>
				<li class="icon-soc tipped" data-title="github"  data-tipper-options='{"direction":"top","follow":"true"}'>
					<a href="<?php echo esc_url($link_gh); ?>"><i class="fa-github"></i></a>
				</li>
			<?php }else{} ?>
			<?php if(isset($link_gg) && $link_gg != ''){ ?>
				<li class="icon-soc tipped" data-title="google +"  data-tipper-options='{"direction":"top","follow":"true"}'>
					<a href="<?php echo esc_url($link_gg); ?>"><i class="fa-google-plus"></i></a>
				</li>
			<?php }else{} ?>
			<?php if(isset($class_sc) && $class_sc != ''){ ?>
				<li class="icon-soc tipped" data-title="<?php echo esc_attr($text_sc); ?>"  data-tipper-options='{"direction":"top","follow":"true"}'>
					<a href="<?php echo esc_url($link_sc); ?>"><i class="<?php echo esc_attr($class_sc); ?>"></i></a>
				</li>
			<?php }else{} ?>
			</ul>	
		</div>	
		<div id="wrapper-slider">
			<div id="controls">
				<div class="prev"></div>
				<div class="next"></div>
			</div>
		</div>			
		<a class="scroll" href="<?php if($scroll != ''){echo esc_attr($scroll);}else{echo "#about";} ?>"><div class="scroll-btn tipped" data-title="<?php echo esc_attr($text_st); ?>"  data-tipper-options='{"direction":"top","follow":"true"}'></div></a>

	<script type="text/javascript">
		//Home Background Slider
		(function($) { "use strict";
		$(document).ready(function(){"use strict";
            $.mbBgndGallery.buildGallery({
                containment:"#home",
                timer:2000,
                effTimer:4000,
                controls:"#controls",
                grayScale:false,
                shuffle:true,
                preserveWidth:false,
                effect:"zoom",
//				effect:{enter:{transform:"scale("+(1+ Math.random()*2)+")",opacity:0},exit:{transform:"scale("+(Math.random()*2)+")",opacity:0}},

                // If your server allow directory listing you can use:
                // (however this doesn't work locally on your computer)

                //folderPath:"testImage/",

                // else:

                 images:[
                 <?php 
					$img_ids = explode(",",$images);
					foreach( $img_ids AS $img_id ){

					$image_src = wp_get_attachment_image_src($img_id,'');
					$meta = wp_prepare_attachment_for_js($img_id);
					echo '"'.esc_url($image_src[0]).'",';
				?>
                 
                 <?php }?>
                 ],

                onStart:function(){},
                onPause:function(){},
                onPlay:function(opt){},
                onChange:function(opt,idx){},
                onNext:function(opt){},
                onPrev:function(opt){}
            });
		});
	 })(jQuery);
	</script>
<?php  return ob_get_clean();
} 
//About
add_shortcode('about', 'about_func');
function about_func($atts, $content = null){
	extract(shortcode_atts(array(
		'image'		=> 		'',
		'illust'	=> 		'',
	), $atts));
	ob_start(); 
	$images = wp_get_attachment_image_src($image,'');
	?>	
<div id="main" class="main">
<?php if($images != ''){ ?>
	<figure>
		<div class="drawings mac">
			<img class="<?php if($illust == 'yes'){?>illustration<?php }else{} ?>" src="<?php echo esc_url($images[0]);?>" alt="iMac Illustration" />
			<?php if($illust == 'yes'){?>
			<svg class="line-drawing" id="mac" width="100%" height="600" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 600">
				<path d="M 257.85024,158.16843 754.90716,35.953537 731.06035,405.57906 228.78695,448.8014 z" /> 
				<path d="m 259.83736,136.30872 c 0,0 -6.74232,0.97288 -11.61303,5.46502 -3.96751,3.659 -6.12527,9.40831 -7.01729,20.86596 l -36.5158,346.77284 c 0,0 -3.47753,13.41382 10.68151,14.15903 l 517.67468,-21.11485 c 0,0 18.38216,0.74522 19.87257,-19.62369 L 784.07068,11.384991 c 0,0 0.059,-13.07475 -23.20111,-7.2266959 L 259.83736,136.30872 z" /> 
				<path d="m 211.29271,522.89381 c 0,0 12.5259,6.63947 19.72988,5.64573 l 513.45197,-19.12737 c 0,0 18.87884,0.74557 21.61112,-18.87848 l 29.5596,-462.528221 c 0,0 1.49047,-10.184447 -13.54272,-21.4997553" /> 
				<path d="M 208.59466,472.34637 756.27723,432.02629" /> 
				<path d="m 591.36015,515.11602 11.15099,41.36862 c 0,0 8.62435,33.16197 -11.15099,33.16197 l -55.35924,4.26821 c 0,0 -9.65275,0.58387 -13.08781,0.58387 -1.35069,0 -5.16991,0.0265 -5.16991,0.0265 l -149.57016,-0.0347 c 0,0 -1.45726,0.12035 -1.52173,-0.0853 -0.14195,-0.4531 1.2173,-0.44973 1.2173,-0.44973 l 93.42473,-4.68143 c 0,0 23.85536,1.49042 23.85127,-27.57288 l -2.70885,-42.52741" /> 
				<path d="m 595.82547,514.94947 11.52956,43.3982 c 0,0 8.23944,32.78936 -11.52956,38.00586 h -58.52044 l -12.10971,0.99374 -16.58099,-0.61332 -128.7355,0.17849 c 0,0 -10.74373,-0.45795 -13.22753,-2.50727" /> 
				<path d="m 486.38703,90.292617 c -0.3846,2.126175 -1.9686,3.619643 -3.5379,3.335758 -1.5693,-0.283875 -2.5297,-2.237606 -2.1451,-4.363775 0.38461,-2.12617 1.96859,-3.619642 3.53789,-3.335762 1.56931,0.283879 2.52971,2.23761 2.14511,4.363779 z" /> 
				<path d="m 483.95449,571.8934 120.41968,0" /> 
				<path class="line-round" d="m 783.49986,166.74023 -9.12881,133.48624" /> 
				<path class="line-round" d="m 773.91008,309.26031 -1.81646,29.43591" />
			</svg>
			<?php }else{} ?>
		</div>
	</figure>
<?php }else{}?>
</div>
<?php  return ob_get_clean();
} 
//About us
add_shortcode('aboutus', 'aboutus_func');
function aboutus_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'			=> 		'',
		'subtitle'		=> 		'',
		'effect'		=>		'',
	), $atts));
	ob_start(); 
	?>	
	<div data-scrollreveal="enter <?php if( $effect == 'effect_top'){echo 'top';}elseif( $effect == 'effect_bottom'){ echo 'bottom'; }elseif( $effect == 'effect_left'){ echo 'left'; }elseif( $effect == 'effect_right'){ echo 'right';} ?> and move 50px over 1s"> 
		<h6><?php echo esc_attr($title); ?></h6>
		<p><?php echo esc_attr($subtitle); ?></p>
	</div>
<?php  return ob_get_clean();
} 

//Team
add_shortcode('team', 'team_func');
function team_func($atts, $content = null){
	extract(shortcode_atts(array(
		'name'			=> 		'',
		'job'			=> 		'',
		'description'	=>		'',
		'link_fb'		=>		'',
		'link_tw'		=>		'',
		'link_gg'		=>		'',
		'link_gh'		=>		'',
		'link_sc'		=>		'',
		'text_sc'		=>		'',
		'class_sc'		=>		'',
		'effect_team'	=>		'',
		'image'			=>		'',
	), $atts));
	ob_start(); 
	$images = wp_get_attachment_image_src($image,'');
	$params = array( 'width' => 290, 'height' => 290 );
	$photo = bfi_thumb( $images[0], $params );
	?>	
	<div data-scrollreveal="enter <?php if( $effect_team == 'effect_top'){echo 'top';}elseif( $effect_team == 'effect_bottom'){ echo 'bottom'; }elseif( $effect_team == 'effect_left'){ echo 'left'; }elseif( $effect_team == 'effect_right'){ echo 'right';} ?> and move 50px over 1s"> 
		<h6><?php echo esc_attr($name); ?></h6>
		<div class="flipWrapper">
			<div class="card">
				<div class="face front">
					<img src="<?php echo esc_url($photo); ?>" alt="" />
				</div>
				<div class="face back">
					<p><small><em><?php echo esc_attr($job); ?></em></small></p>
					<p><?php echo esc_attr($description); ?></p>
					<div class="social-team">
						<ul class="team-social">
						<?php if(isset($link_tw) && $link_tw != ''){ ?>
							<li class="icon-team tipped" data-title="twitter"  data-tipper-options='{"direction":"top","follow":"true"}'>
								<a href="<?php echo esc_url($link_tw); ?>"><i class="fa-twitter"></i></a>
							</li>
						<?php }else{} ?>
						<?php if(isset($link_fb) && $link_fb != ''){ ?>
							<li class="icon-team tipped" data-title="facebook"  data-tipper-options='{"direction":"top","follow":"true"}'>
								<a href="<?php echo esc_url($link_fb); ?>"><i class="fa-facebook"></i></a>
							</li>
						<?php }else{} ?>
						<?php if(isset($link_gh) && $link_gh != ''){ ?>
							<li class="icon-team tipped" data-title="github"  data-tipper-options='{"direction":"top","follow":"true"}'>
								<a href="<?php echo esc_url($link_gh); ?>"><i class="fa-github"></i></a>
							</li>
						<?php }else{} ?>
						<?php if(isset($link_gg) && $link_gg != ''){ ?>
							<li class="icon-team tipped" data-title="google +"  data-tipper-options='{"direction":"top","follow":"true"}'>
								<a href="<?php echo esc_url($link_gg); ?>"><i class="fa-google-plus"></i></a>
							</li>
						<?php }else{} ?>
						<?php if(isset($class_sc) && $class_sc != ''){ ?>
							<li class="icon-team tipped" data-title="<?php echo esc_attr($text_sc); ?>"  data-tipper-options='{"direction":"top","follow":"true"}'>
								<a href="<?php echo esc_url($link_sc); ?>"><i class="<?php echo esc_attr($class_sc); ?>"></i></a>
							</li>
						<?php }else{} ?>							
						</ul>	
					</div>
				</div>
			</div>
		</div>					
	</div>
<?php  return ob_get_clean();
} 

//Clients Images
add_shortcode('clientsimg', 'clientsimg_func');
function clientsimg_func($atts, $content = null){
	extract(shortcode_atts(array(
		'image'			=>		'',
		'image_pr'		=>		'',
	), $atts));
	ob_start(); 
	$photo = wp_get_attachment_image_src($image,'');
	$images= wp_get_attachment_image_src($image_pr,'');
	?>	
	<?php if(isset($photo) && $photo != ''){ ?>
		<div class="just_pattern" style="background-image: url(<?php echo esc_url($photo[0]); ?>);"></div>
	<?php }else{} ?>	
	<div class="just_pattern1"></div>
	<?php if(isset($images) && $images != ''){ ?>
		<div class="parallax" style="background-image: url(<?php echo esc_url($images[0]); ?>);"></div>
	<?php }else{} ?>
<?php  return ob_get_clean();
} 

//Clients
add_shortcode('clients', 'clients_func');
function clients_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'			=>		'',
		'number'		=>		'',
		'show_line'		=> 		'',
	), $atts));
	ob_start(); 
	?>	
	<div class="facts-wrap">
	<?php if($show_line == 'yes'){ ?>
		<div class="facts-line"></div>
	<?php }elseif($show_line == 'no'){}?>
		<div class="facts-wrap-num"><span class="counter"><?php echo esc_attr($number); ?></span></div>
		<h6><?php echo esc_attr($title); ?></h6> 
	</div>
<?php  return ob_get_clean();
} 

// Portfolio
add_shortcode('portfolio', 'portfolio_func');
function portfolio_func($atts, $content = null){
	extract(shortcode_atts(array(
		'portfolio_show'			=>		'',
		'portfolio_number'		=>		'',
		'orderpost' => '',
        'orderby' => '', 
	), $atts));
	ob_start(); 
	global $theme_option;
	?>	
	<div class="clear"></div>

	<div class="portfolio"></div>


	<div class="expander-wrap relative">
		<div id="expander-wrap">
			<p class="cls-btn"><a class="close">X</a></p>
			<div class="expander-inner"></div>
		</div>
	</div>


	<div class="clear"></div>

	
	<div class="container">
		<div class="sixteen columns">
			<div id="portfolio-filter">
				<ul id="filter">
					<li><a href="#" class="current" data-filter="*" title=""><?php echo esc_attr($portfolio_show); ?></a></li>
					<?php 
					$categories = get_terms('categories');   
	    				foreach( (array)$categories as $categorie){
	    					$cat_name = $categorie->name;
	    					$cat_slug = $categorie->slug;
					?>
					<li><a href="#" data-filter=".<?php echo esc_attr($cat_slug); ?>" title=""><?php echo esc_attr($cat_name); ?></a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
	<ul class="portfolio-wrap">
	<?php 
		$args = array(   
			'post_type' => 'portfolio',   
			'posts_per_page' => $portfolio_number,
			'order' => $orderpost,
            'orderby' => $orderby, 
		);  
		$wp_query = new WP_Query($args);
		while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
		$cates = get_the_terms(get_the_ID(),'categories');
		$cate_name ='';
		$cate_slug = '';
			  foreach((array)$cates as $cate){
				if(count($cates)>0){
					$cate_name .= $cate->name.' ' ;
					$cate_slug .= $cate->slug .' ';     
				} 
		}
        $params=array('width' => 341,'height' => 227);
        $image=bfi_thumb(wp_get_attachment_url(get_post_thumbnail_id()),$params); 
        if(get_post_meta(get_the_ID(),'_cmb_style_portf', true) == 'ajax'){
	?>
		<li class="portfolio-box <?php echo esc_attr($cate_slug); ?>">	
			<a class="expander" href="<?php the_permalink(); ?>" title="">
				<img  src="<?php echo esc_url($image); ?>" alt="" />	
				<div class="mask"></div>
				<h4><?php the_title(); ?></h4>
			</a>	
		</li>
	<?php }
		if(get_post_meta(get_the_ID(),'_cmb_style_portf', true) == 'popup'){?>
		<li class="portfolio-box <?php echo esc_attr($cate_slug); ?>">	
			<a class="iframe group1" href="<?php the_permalink();?>" title="">
				<img  src="<?php echo esc_url($image); ?>" alt="" />	
				<div class="mask"></div>
				<h4><?php the_title(); ?></h4>
			</a>	
		</li>
	<?php  }
		endwhile;	
	?>
	</ul>					

	<div class="clear"></div>
<?php  return ob_get_clean();
} 


// Get In Touch
add_shortcode('gettouch', 'gettouch_func');
function gettouch_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'			=>		'',
		'subtitle'		=>		'',
		'link'		=>		'',
		'link_other'	=> '',
	), $atts));
	ob_start(); 
	?>	
	<a href="<?php echo esc_url($link); ?>" <?php if($link_other == 'yes'){ ?>class="scroll"<?php }else{} ?>>
		<div id="action">	
			<div class="container">	
				<div class="sixteen columns">
					<h6><?php echo esc_attr($title); ?></h6> 
					<p><small><span><?php echo esc_attr($subtitle); ?></span></small></p>
				</div>	
			</div>			
		</div>
	</a>
<?php  return ob_get_clean();
} 


// Testimonial
add_shortcode('testimonial', 'testimonial_func');
function testimonial_func($atts, $content = null){
	extract(shortcode_atts(array(
		'class_icon'=>		'',
		'desc'		=>		'',
		'job'		=>		'',
		'style_ul'	=> 		'',
	), $atts));
	ob_start(); 
	?>	
	<?php if($style_ul == 'open'){ ?>
	<ul class="slider3">
	<?php }elseif($style_ul == 'center'){} ?>
		<li>
			<div class="test">
				<div class="icon-test"><i class="<?php echo esc_attr($class_icon); ?>" ></i></div> 
				<h6><?php echo esc_attr($desc); ?></h6>			
				<p><span><?php echo esc_attr($job); ?></span></p>
			</div> 
		</li> 
	<?php if($style_ul == 'close'){ ?>
	</ul>
	<?php }elseif($style_ul == 'center'){} ?>
<?php  return ob_get_clean();
} 

// Services
add_shortcode('services', 'services_func');
function services_func($atts, $content = null){
	extract(shortcode_atts(array(
		'icon'		=>		'',
		'desc'		=>		'',
		'job'		=>		'',
		'location'	=> 		'',
		'effect_sv'	=>		'',
	), $atts));
	ob_start(); 
	?>	
	<div data-scrollreveal="enter <?php if( $effect_sv == 'effect_top'){echo 'top';}elseif( $effect_sv == 'effect_bottom'){ echo 'bottom'; }elseif( $effect_sv == 'effect_left'){ echo 'left'; }elseif( $effect_sv == 'effect_right'){ echo 'right';} ?> and move 150px over 1s">
		<div class="last-services<?php if($location == 'left'){echo '1';}elseif($location == 'right'){} ?>">
			<?php if($location == 'left'){ ?><h6><?php echo esc_attr($job); ?></h6> <?php } ?>
			<div class="icon-<?php if($location == 'left'){echo 'right1';}elseif($location == 'right'){echo 'left1';} ?>"><i class="<?php echo esc_attr($icon);?>"></i></div>
			<?php if($location == 'right'){ ?><h6><?php echo esc_attr($job); ?></h6> <?php } ?>
			<p><?php echo esc_attr($desc); ?></p>
		</div>
	</div>
<?php  return ob_get_clean();
} 

// Pricing Table
add_shortcode('pricing', 'pricing_func');
function pricing_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'			=>		'',
		'price'			=>		'',
		'subtitle'		=>		'',
		'desc'			=> 		'',
		'featured'		=>		'',
		'sing_up'		=>		'',
		'link_pr'		=>		'',
		'effect_pr'		=>		'',
		'effect_currency' =>	'',
		'currency'		=> 		'',
	), $atts));
	ob_start(); 
	?>	
	<div data-scrollreveal="enter <?php if( $effect_pr == 'effect_top'){echo 'top';}elseif( $effect_pr == 'effect_bottom'){ echo 'bottom'; }elseif( $effect_pr == 'effect_left'){ echo 'left'; }elseif( $effect_pr == 'effect_right'){ echo 'right';} ?> and move 150px over 1s">
		<div class="services-offer <?php if($featured == 'yes'){ echo 'featured'; }else{} ?>">
			<h6><?php echo esc_attr($title); ?></h6>
			<div class="services-icon <?php echo esc_attr($title); ?>"><?php echo esc_attr($price); ?></div>
			<p><?php echo esc_attr($subtitle); ?></p>
			<div class="services-list">
				<div class="list-services">
				<p>
					<?php echo htmlspecialchars_decode(esc_attr($desc)); ?>
				<p>
				</div>
			</div>
			<a href="<?php echo esc_url($link_pr); ?>"><div class="services-link"><?php echo esc_attr($sing_up); ?></div></a>
		</div>
	</div>
	<head>
	<style type="text/css">
	.services-offer .<?php echo esc_attr($title); ?>:before{
		position: absolute;
		top:0;
		left:-40px;
		font-family: 'Open Sans', sans-serif;
		content: "<?php echo esc_attr($currency);?>";
		width: 100%;
		font-size:20px;
		line-height: 20px;
		display: block;
		z-index: 1; 
	}
	<?php if($effect_currency == 'on') { ?>
	.no-touch.cssanimations .services-offer .<?php echo esc_attr($title); ?>:before {
		-webkit-animation: dollar 6s linear infinite;
		-moz-animation: dollar 6s linear infinite;
		animation: dollar 6s linear infinite;
	}
	<?php }elseif ($effect_currency == 'off') {} ?>
	</style>
	</head>
<?php  return ob_get_clean();
} 

// Logos
add_shortcode('logos', 'logos_func');
function logos_func($atts, $content = null){
	extract(shortcode_atts(array(
		'logos'				=>		'',
		'effect_logo'		=>		'',
	), $atts));
	ob_start(); 
	?>	
	<div data-scrollreveal="enter <?php if( $effect_logo == 'effect_top'){echo 'top';}elseif( $effect_logo == 'effect_bottom'){ echo 'bottom'; }elseif( $effect_logo == 'effect_left'){ echo 'left'; }elseif( $effect_logo == 'effect_right'){ echo 'right';} ?> and move 150px over 1s">
		<?php 
		$img_ids = explode(",",$logos);
		$i=1;
		foreach( $img_ids AS $img_id ){

		$image_src = wp_get_attachment_image_src($img_id,'');
		?>
			<div class="logos-wrap">
				<img  src="<?php echo esc_url($image_src[0]); ?>" alt="" />	
			</div>
		<?php $i++; } ?>
	</div>
<?php  return ob_get_clean();
} 

// contact info
add_shortcode('contactinfo', 'contactinfo_func');
function contactinfo_func($atts, $content = null){
	extract(shortcode_atts(array(
		'icon_phone'				=>		'',
		'text_phone'				=>		'',
		'phone_number'				=>		'',
		'timezone'					=>		'',
		'icon_location'				=>		'',
		'text_location'				=>		'',
		'address'					=>		'',
		'effect_contact'			=>		'',
		'title_cf'					=> 		'',
	), $atts));
	ob_start(); 
	?>	
	<div data-scrollreveal="enter <?php if( $effect_contact == 'effect_top'){echo 'top';}elseif( $effect_contact == 'effect_bottom'){ echo 'bottom'; }elseif( $effect_contact == 'effect_left'){ echo 'left'; }elseif( $effect_contact == 'effect_right'){ echo 'right';} ?> and move 150px over 1s">
		<p><i class="icon-contact1"><i class="<?php echo esc_attr($icon_phone); ?>"></i></i><span><?php echo esc_attr($text_phone); ?></span> <?php echo esc_attr($phone_number); ?> <small><em><?php echo esc_attr($timezone); ?></em></small></p>
		<p><i class="icon-contact1"><i class="<?php echo esc_attr($icon_location); ?>"></i></i><span><?php echo esc_attr($text_location); ?></span> <?php echo esc_attr($address); ?></p>
		<h6><?php echo esc_attr($title_cf); ?></h6>
	</div>
<?php  return ob_get_clean();
} 

// title of map
add_shortcode('titlemap', 'titlemap_func');
function titlemap_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'				=>		'',
	), $atts));
	ob_start(); 
	?>	
	<a class="button-map close-map"><span>Locate Us on Map</span></a>
<?php  return ob_get_clean();
} 

//Gmap
add_shortcode('gmap', 'gmap_func');
function gmap_func($atts, $content = null){
	extract(shortcode_atts(array(
		'latitude'		=> 		'',
		'longitude'		=> 		'',
		'image_map'		=>		'',
		'title'			=> 		'',
		'subtitle'		=>		'',
	), $atts));
	ob_start(); 
	global $theme_option;
	$photo_map = wp_get_attachment_image_src($image_map,'');
	?>
	<div id="google_map"></div>	
		<script type="text/javascript">
		//Google map

jQuery(document).ready(function(){
	var e=new google.maps.LatLng(<?php if($latitude != ''){echo esc_attr($latitude);}else{echo '21.033333';} ?>,<?php if($longitude != ''){echo esc_attr($longitude);}else{echo '105.850000';} ?>),
		o={zoom:14,center:new google.maps.LatLng(<?php if($latitude != ''){echo esc_attr($latitude);}else{echo '21.033333';} ?>,<?php if($longitude != ''){echo esc_attr($longitude);}else{echo '105.850000';} ?>),
		mapTypeId:google.maps.MapTypeId.ROADMAP,
		mapTypeControl:!1,
		scrollwheel:!1,
		draggable:!0,
		navigationControl:!1
	},
		n=new google.maps.Map(document.getElementById("google_map"),o);
		google.maps.event.addDomListener(window,"resize",function(){var e=n.getCenter();
		google.maps.event.trigger(n,"resize"),n.setCenter(e)});
		
		var g='<div class="map-tooltip"><h6><?php echo esc_attr($title); ?></h6><p><?php echo esc_attr($subtitle); ?></p></div>',a=new google.maps.InfoWindow({content:g})
		,t=new google.maps.MarkerImage("<?php echo esc_url($photo_map[0]); ?>",new google.maps.Size(40,70),
		new google.maps.Point(0,0),new google.maps.Point(20,55)),
		i=new google.maps.LatLng(<?php if($latitude != ''){echo esc_attr($latitude);}else{echo '21.033333';} ?>,<?php if($longitude != ''){echo esc_attr($longitude);}else{echo '105.850000';} ?>),
		p=new google.maps.Marker({position:i,map:n,icon:t,zIndex:3});
		google.maps.event.addListener(p,"click",function(){a.open(n,p)}),
		$(".button-map").click(function(){$("#google_map").slideToggle(300,function(){google.maps.event.trigger(n,"resize"),n.setCenter(e)}),
		$(this).toggleClass("close-map show-map")});

});

	</script>

<?php  return ob_get_clean();
} 

//Video
add_shortcode('video', 'video_func');
function video_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'			=> 		'',
		'link_video'	=>		'',
		'subtitle'		=>		'',
		'link_fb'		=>		'',
		'link_tw'		=>		'',
		'link_gg'		=>		'',
		'link_gh'		=>		'',
		'link_sc'		=>		'',
		'text_sc'		=>		'',
		'class_sc'		=>		'',
		'scroll'		=>		'',
		'text_st'		=>		'',
		'pattern'		=>		'',
	), $atts));
	ob_start(); 
	$photo = wp_get_attachment_image_src($pattern,'');
	?>	
	<?php if(isset($photo) && $photo != ''){ ?>
		<div class="just_pattern" style="background-image: url(<?php echo esc_url($photo[0]); ?>);"></div>
	<?php }else{} ?>	
		<div class="big-text">
			<ul class="flippy">
				<?php echo htmlspecialchars_decode(esc_attr($title)); ?>
			</ul>
		</div>
		<div class="small-text"><?php echo esc_attr($subtitle); ?></div>
		<div class="social-top">
			<ul class="list-social">
			<?php if(isset($link_tw) && $link_tw != ''){ ?>
				<li class="icon-soc tipped" data-title="twitter"  data-tipper-options='{"direction":"top","follow":"true"}'>
					<a href="<?php echo esc_url($link_tw); ?>"><i class="fa-twitter"></i></a>
				</li>
			<?php }else{} ?>
			<?php if(isset($link_fb) && $link_fb != ''){ ?>
				<li class="icon-soc tipped" data-title="facebook"  data-tipper-options='{"direction":"top","follow":"true"}'>
					<a href="<?php echo esc_url($link_fb); ?>"><i class="fa-facebook"></i></a>
				</li>
			<?php }else{} ?>
			<?php if(isset($link_gh) && $link_gh != ''){ ?>
				<li class="icon-soc tipped" data-title="github"  data-tipper-options='{"direction":"top","follow":"true"}'>
					<a href="<?php echo esc_url($link_gh); ?>"><i class="fa-github"></i></a>
				</li>
			<?php }else{} ?>
			<?php if(isset($link_gg) && $link_gg != ''){ ?>
				<li class="icon-soc tipped" data-title="google +"  data-tipper-options='{"direction":"top","follow":"true"}'>
					<a href="<?php echo esc_url($link_gg); ?>"><i class="fa-google-plus"></i></a>
				</li>
			<?php }else{} ?>
			<?php if(isset($class_sc) && $class_sc != ''){ ?>
				<li class="icon-soc tipped" data-title="<?php echo esc_attr($text_sc); ?>"  data-tipper-options='{"direction":"top","follow":"true"}'>
					<a href="<?php echo esc_url($link_sc); ?>"><i class="<?php echo esc_attr($class_sc); ?>"></i></a>
				</li>
			<?php }else{} ?>
			</ul>	
		</div>	
		<video id="video_background" preload="auto" autoplay="true" loop="loop" muted="muted" volume="0" poster=""> 
			<source src="<?php echo esc_url($link_video); ?>" type="video/mp4"> 
		</video>			
		<a class="scroll" href="<?php if($scroll != ''){echo esc_attr($scroll);}else{echo "#about";} ?>"><div class="scroll-btn tipped" data-title="<?php echo esc_attr($text_st); ?>"  data-tipper-options='{"direction":"top","follow":"true"}'></div></a>

<?php  return ob_get_clean();
} 

//Parallax
add_shortcode('parallax', 'parallax_func');
function parallax_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'			=> 		'',
		'img_prl'	=>		'',
		'subtitle'		=>		'',
		'link_fb'		=>		'',
		'link_tw'		=>		'',
		'link_gg'		=>		'',
		'link_gh'		=>		'',
		'link_sc'		=>		'',
		'text_sc'		=>		'',
		'class_sc'		=>		'',
		'scroll'		=>		'',
		'text_st'		=>		'',
		'pattern'		=>		'',
	), $atts));
	ob_start(); 
	$bg_img = wp_get_attachment_image_src($img_prl,'');
	$photo = wp_get_attachment_image_src($pattern,'');
	?>	
	<?php if(isset($photo) && $photo != ''){ ?>
		<div class="just_pattern" style="background-image: url(<?php echo esc_url($photo[0]); ?>);"></div>
	<?php }else{} ?>	
		<div class="parallax-home" <?php if ( $bg_img[0] != '' ) { ?>style="background: url('<?php echo esc_url($bg_img[0]); ?>') repeat fixed;" <?php } ?>></div>
		<div class="big-text">
			<ul class="flippy">
				<?php echo htmlspecialchars_decode(esc_attr($title)); ?>
			</ul>
		</div>
		<div class="small-text"><?php echo esc_attr($subtitle); ?></div>
		<div class="social-top">
			<ul class="list-social">
			<?php if(isset($link_tw) && $link_tw != ''){ ?>
				<li class="icon-soc tipped" data-title="twitter"  data-tipper-options='{"direction":"top","follow":"true"}'>
					<a href="<?php echo esc_url($link_tw); ?>"><i class="fa-twitter"></i></a>
				</li>
			<?php }else{} ?>
			<?php if(isset($link_fb) && $link_fb != ''){ ?>
				<li class="icon-soc tipped" data-title="facebook"  data-tipper-options='{"direction":"top","follow":"true"}'>
					<a href="<?php echo esc_url($link_fb); ?>"><i class="fa-facebook"></i></a>
				</li>
			<?php }else{} ?>
			<?php if(isset($link_gh) && $link_gh != ''){ ?>
				<li class="icon-soc tipped" data-title="github"  data-tipper-options='{"direction":"top","follow":"true"}'>
					<a href="<?php echo esc_url($link_gh); ?>"><i class="fa-github"></i></a>
				</li>
			<?php }else{} ?>
			<?php if(isset($link_gg) && $link_gg != ''){ ?>
				<li class="icon-soc tipped" data-title="google +"  data-tipper-options='{"direction":"top","follow":"true"}'>
					<a href="<?php echo esc_url($link_gg); ?>"><i class="fa-google-plus"></i></a>
				</li>
			<?php }else{} ?>
			<?php if(isset($class_sc) && $class_sc != ''){ ?>
				<li class="icon-soc tipped" data-title="<?php echo esc_attr($text_sc); ?>"  data-tipper-options='{"direction":"top","follow":"true"}'>
					<a href="<?php echo esc_url($link_sc); ?>"><i class="<?php echo esc_attr($class_sc); ?>"></i></a>
				</li>
			<?php }else{} ?>
			</ul>	
		</div>				
		<a class="scroll" href="<?php if($scroll != ''){echo esc_attr($scroll);}else{echo "#about";} ?>"><div class="scroll-btn tipped" data-title="<?php echo esc_attr($text_st); ?>"  data-tipper-options='{"direction":"top","follow":"true"}'></div></a>

<?php  return ob_get_clean();
} 

//Moving Background
add_shortcode('moving', 'moving_func');
function moving_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'			=> 		'',
		'img_prl'		=>		'',
		'subtitle'		=>		'',
		'link_fb'		=>		'',
		'link_tw'		=>		'',
		'link_gg'		=>		'',
		'link_gh'		=>		'',
		'link_sc'		=>		'',
		'text_sc'		=>		'',
		'class_sc'		=>		'',
		'scroll'		=>		'',
		'text_st'		=>		'',
		'pattern'		=>		'',
	), $atts));
	ob_start(); 
	$bg_img = wp_get_attachment_image_src($img_prl,'');
	$photo = wp_get_attachment_image_src($pattern,'');
	?>	
	<?php if(isset($photo) && $photo != ''){ ?>
		<div class="just_pattern" style="background-image: url(<?php echo esc_url($photo[0]); ?>);"></div>
	<?php }else{} ?>	
		<div class="parallax-homes" <?php if ( $bg_img[0] != '' ) { ?>style="background: url('<?php echo esc_url($bg_img[0]); ?>') repeat fixed;" <?php } ?>></div>
		<div class="big-text">
			<ul class="flippy">
				<?php echo htmlspecialchars_decode(esc_attr($title)); ?>
			</ul>
		</div>
		<div class="small-text"><?php echo esc_attr($subtitle); ?></div>
		<div class="social-top">
			<ul class="list-social">
			<?php if(isset($link_tw) && $link_tw != ''){ ?>
				<li class="icon-soc tipped" data-title="twitter"  data-tipper-options='{"direction":"top","follow":"true"}'>
					<a href="<?php echo esc_url($link_tw); ?>"><i class="fa-twitter"></i></a>
				</li>
			<?php }else{} ?>
			<?php if(isset($link_fb) && $link_fb != ''){ ?>
				<li class="icon-soc tipped" data-title="facebook"  data-tipper-options='{"direction":"top","follow":"true"}'>
					<a href="<?php echo esc_url($link_fb); ?>"><i class="fa-facebook"></i></a>
				</li>
			<?php }else{} ?>
			<?php if(isset($link_gh) && $link_gh != ''){ ?>
				<li class="icon-soc tipped" data-title="github"  data-tipper-options='{"direction":"top","follow":"true"}'>
					<a href="<?php echo esc_url($link_gh); ?>"><i class="fa-github"></i></a>
				</li>
			<?php }else{} ?>
			<?php if(isset($link_gg) && $link_gg != ''){ ?>
				<li class="icon-soc tipped" data-title="google +"  data-tipper-options='{"direction":"top","follow":"true"}'>
					<a href="<?php echo esc_url($link_gg); ?>"><i class="fa-google-plus"></i></a>
				</li>
			<?php }else{} ?>
			<?php if(isset($class_sc) && $class_sc != ''){ ?>
				<li class="icon-soc tipped" data-title="<?php echo esc_attr($text_sc); ?>"  data-tipper-options='{"direction":"top","follow":"true"}'>
					<a href="<?php echo esc_url($link_sc); ?>"><i class="<?php echo esc_attr($class_sc); ?>"></i></a>
				</li>
			<?php }else{} ?>
			</ul>	
		</div>				
		<a class="scroll" href="<?php if($scroll != ''){echo esc_attr($scroll);}else{echo "#about";} ?>"><div class="scroll-btn tipped" data-title="<?php echo esc_attr($text_st); ?>"  data-tipper-options='{"direction":"top","follow":"true"}'></div></a>

<?php  return ob_get_clean();
} 

//Video Youtube
add_shortcode('videoyt', 'videoyt_func');
function videoyt_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'			=> 		'',
		'title1'			=> 		'',
		'title2'			=> 		'',
		'title3'			=> 		'',
		'link_videoyt'	=>		'',
		'subtitle'		=>		'',
		'link_fb'		=>		'',
		'link_tw'		=>		'',
		'link_gg'		=>		'',
		'link_gh'		=>		'',
		'link_sc'		=>		'',
		'text_sc'		=>		'',
		'class_sc'		=>		'',
		'scroll'		=>		'',
		'text_st'		=>		'',
		'pattern'		=>		'',
	), $atts));
	ob_start(); 
	$photo = wp_get_attachment_image_src($pattern,'');
	?>	
	<a id="bgndVideo" class="player" data-property="{videoURL:'<?php if($link_videoyt != ''){ echo esc_url($link_videoyt); }else{ ?>http://www.youtube.com/watch?v=NTDwXK64Bjk<?php } ?>',containment:'body',autoPlay:true, mute:true, startAt:0, opacity:1}">youtube</a>	
	<?php if(isset($photo) && $photo != ''){ ?>
		<div class="just_pattern" style="background-image: url(<?php echo esc_url($photo[0]); ?>);"></div>
	<?php }else{} ?>	
		<div class="big-text">
			<ul class="flippy">
			<?php if( $title != ''){?>
				<li><span><?php echo esc_attr($title); ?></span></li>
			<?php }else{}
			if( $title1 != ''){ ?>
				<li><span><?php echo esc_attr($title1); ?></span></li>
			<?php }else{}
			if( $title2 != ''){ ?>
				<li><span><?php echo esc_attr($title2); ?></span></li>
			<?php }else{}
			if( $title3 != ''){ ?>
				<li><span><?php echo esc_attr($title3); ?></span></li>
			<?php }else{} ?>
			</ul>
		</div>
		<div class="small-text"><?php echo esc_attr($subtitle); ?></div>
		<div class="social-top">
			<ul class="list-social">
			<?php if(isset($link_tw) && $link_tw != ''){ ?>
				<li class="icon-soc tipped" data-title="twitter"  data-tipper-options='{"direction":"top","follow":"true"}'>
					<a href="<?php echo esc_url($link_tw); ?>"><i class="fa-twitter"></i></a>
				</li>
			<?php }else{} ?>
			<?php if(isset($link_fb) && $link_fb != ''){ ?>
				<li class="icon-soc tipped" data-title="facebook"  data-tipper-options='{"direction":"top","follow":"true"}'>
					<a href="<?php echo esc_url($link_fb); ?>"><i class="fa-facebook"></i></a>
				</li>
			<?php }else{} ?>
			<?php if(isset($link_gh) && $link_gh != ''){ ?>
				<li class="icon-soc tipped" data-title="github"  data-tipper-options='{"direction":"top","follow":"true"}'>
					<a href="<?php echo esc_url($link_gh); ?>"><i class="fa-github"></i></a>
				</li>
			<?php }else{} ?>
			<?php if(isset($link_gg) && $link_gg != ''){ ?>
				<li class="icon-soc tipped" data-title="google +"  data-tipper-options='{"direction":"top","follow":"true"}'>
					<a href="<?php echo esc_url($link_gg); ?>"><i class="fa-google-plus"></i></a>
				</li>
			<?php }else{} ?>
			<?php if(isset($class_sc) && $class_sc != ''){ ?>
				<li class="icon-soc tipped" data-title="<?php echo esc_attr($text_sc); ?>"  data-tipper-options='{"direction":"top","follow":"true"}'>
					<a href="<?php echo esc_url($link_sc); ?>"><i class="<?php echo esc_attr($class_sc); ?>"></i></a>
				</li>
			<?php }else{} ?>
			</ul>	
		</div>	
		<a id="video-volume" onclick="$('#bgndVideo').toggleVolume()"><i class="icon-volume-down"></i></a>						
		<a class="scroll" href="<?php if($scroll != ''){echo esc_attr($scroll);}else{echo "#about";} ?>"><div class="scroll-btn tipped" data-title="<?php echo esc_attr($text_st); ?>"  data-tipper-options='{"direction":"top","follow":"true"}'></div></a>

<?php  return ob_get_clean();
} 