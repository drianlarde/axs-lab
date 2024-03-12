<?php
	/* Styled Box Shortcode */
	add_shortcode('styled_box', 'ts_styled_box');
	
	/* -----------------------------------------------------------------
		Styled Box
	----------------------------------------------------------------- */
	function ts_styled_box($atts, $content = null) {
	
		extract(shortcode_atts(array(
			'title' => '',
			'color' => '',
			'icon' => ''
			
		), $atts));
		
		$content = ts_remove_autop($content);
		
		$output = '<div class="styled-box '.$icon . ' ' . $color.'"><strong>' . $title . ': </strong>' . $content . '</div>';
		
		return do_shortcode($output);
		
	}
	
?>