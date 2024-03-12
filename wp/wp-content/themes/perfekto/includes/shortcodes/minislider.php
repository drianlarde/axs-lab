<?php
	/* Mini Slider */
	add_shortcode('mini-slider', 'ts_minislider');
	
	/* -----------------------------------------------------------------
		Recent Posts
	----------------------------------------------------------------- */
	function ts_minislider($atts, $content){
	
		extract(shortcode_atts(array(
			'position' => '',
			'width' => '450',
			'height' => '289'
		), $atts));
		
		$content =ts_remove_autop($content);
		$imgurls = explode(",",$content);
		
		$items = "";
		$addclass = "";
		foreach($imgurls as $imgurl){
		$items .= '<li><img src="'.$imgurl.'" alt="" /></li>'; 
		}
		if($position=="right"){
		$addclass ="positionright";
		}elseif($position=="left"){
		$addclass ="positionleft";
		}
		
		$output = '<div id="minislider"  class="'.$addclass.'">
							<div id="frame-slider" style="width:'.$width.'px; height:'.$height.'px"  class="imgborder">
							<ul id="slider" style="height:'.$height.'px">
								'.$items.'
							</ul>
							<div id="slide-nav">
								<div id="pager"></div>
							</div>
							</div>	
						</div>';
		
		return do_shortcode($output);
	}
?>
