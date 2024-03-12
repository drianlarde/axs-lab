<?php
	/* List Bullets */
	add_shortcode( 'list', 'ts_list' );
	
	
	/* -----------------------------------------------------------------
		List Bullets
	----------------------------------------------------------------- */
	function ts_list($atts, $content = null) {
	
		extract(shortcode_atts(array(
			'type' => 'check',
			'line' => ''
		), $atts));
		
		if($line==""){
		$output = '<div class="bullet-'.$type.' noborder">' . $content . '</div>';
		}else{
		$output = '<div class="bullet-'.$type.'">' . $content . '</div>';
		}
		
		return do_shortcode($output);
		
	}

?>