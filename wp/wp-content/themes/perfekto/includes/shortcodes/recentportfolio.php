<?php
	/* Recent Portfolio */
	add_shortcode('recent-portfolio', 'ts_portfolio');
	
	/* -----------------------------------------------------------------
		Recent Portfolio
	----------------------------------------------------------------- */
	function ts_portfolio($atts, $content){
	
		extract(shortcode_atts(array(
			'showposts' => '3',
			'catname' => '',
			'title' => '',
			'showtitle' => 'no',
			'showdesc' => 'no',
		), $atts));
		$content =ts_remove_autop($content);
		query_posts("showposts=".$showposts."&portfolio-category=" . $catname ."&post_type=portfolio");
		global $post;
		
		
		if($title!=""){$title='<h2>'.$title.'</h2>';}
		
		$i=1;
		$addclass = "";
		$output  = '
		'.$title.'
		<ul class="three_column recentportfolio">';
		
		while (have_posts()) : the_post();
		if(($i%3) == 0){ 
			$addclass = "last";
		}
		$prefix = 'ts_';
		$custom = get_post_custom($post->ID);
		$cf_thumb = (isset($custom[$prefix."thumb-recent-portfolio"][0]))?$custom[$prefix."thumb-recent-portfolio"][0] : "";
		$cf_externallink = (isset($custom[$prefix."external-link"][0]))?$custom[$prefix."external-link"][0] : "";
		$imginfos = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'recent-portfolio');
		
		if($cf_thumb==""){
			$cf_thumb = $imginfos[0];
		}
		if($cf_thumb!="" || $imginfos[0]!=""){
			if($cf_externallink!=""){
			$cf_thumb = '<a href="'.$cf_externallink.'"><img src="'.$cf_thumb.'" alt=""   class="imgborder"/></a>';
			}else{
			$cf_thumb = '<img src="'.$cf_thumb.'" alt=""   class="imgborder"/>';
			}
		
		}
		
		$excerpt = get_the_excerpt();
		
		$output .= '<li class="'.$addclass.'">';
		$output .= $cf_thumb;
		if($showtitle=="yes"){
			if($cf_externallink!=""){
			$output .=  '<h2><a href="'.$cf_externallink.'">'. get_the_title($post->ID).'</a></h2>';
			}else{
			$output .=  '<h2><a href="'.get_permalink().'" rel="bookmark" title="'.__('Permanent Link to '. get_the_title($post->ID).'','templatesquare') .'">'. get_the_title($post->ID).'</a></h2>';
			}
		}
		if($showdesc=="yes"){
			$output .= ts_string_limit_words($excerpt,15);
		}
		$output .='</li>';
		
		 $i++; $addclass=""; endwhile; 
		 
		wp_reset_query();
		
		return do_shortcode($output).'</ul>';
	}
?>