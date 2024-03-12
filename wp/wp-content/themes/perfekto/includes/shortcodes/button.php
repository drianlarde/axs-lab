<?php
	/* Buttons */
	add_shortcode('button', 'ts_button');
	
	/* -----------------------------------------------------------------
		Button
	----------------------------------------------------------------- */
	function ts_button($atts, $content){
		
		extract(shortcode_atts(array(
			'color' => 'blue',
			'tooltip' => '',
			'size' => '',
			'link' => '#'
		), $atts));
		
		
		if($tooltip != ''){$tooltip = 'title="'.$tooltip.'"'; }
		
		$output = '<a class="but-color '.$size . ' ' . $color.'" '.$tooltip.' href="'.$link.'">'.$content.'</a>';
		
		return do_shortcode($output);
		
	}

?>