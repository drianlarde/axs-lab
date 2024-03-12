<?php
	/* Shortcode */
	add_shortcode('separator', 'ts_separator');
	add_shortcode('clear', 'ts_clearfloat');
	
	/* -----------------------------------------------------------------
		Separator
	----------------------------------------------------------------- */
	function ts_separator($atts, $content = null) {
		extract(shortcode_atts(array(
					"line" => ''
		), $atts));
		$content =ts_remove_autop($content);
		if($line==""){
		$output = '<div class="separator"></div>';
		}else{
		$output = '<div class="separator line"></div>';
		}
		
		return do_shortcode($output);
		
	}
	
	/* -----------------------------------------------------------------
		Clear
	----------------------------------------------------------------- */
	function ts_clearfloat($atts, $content = null) {
		$content =ts_remove_autop($content);
		$output = '<div class="clear">&nbsp;</div>';
		return do_shortcode($output);
		
	}

?>