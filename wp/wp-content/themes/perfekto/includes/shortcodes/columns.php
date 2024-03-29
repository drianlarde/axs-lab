<?php 
	/* Columns Shortcode */
	add_shortcode('one_half', 'ts_one_half');
	add_shortcode('one_half_last', 'ts_one_half_last');
	add_shortcode('one_third', 'ts_one_third');
	add_shortcode('one_third_last', 'ts_one_third_last');
	add_shortcode('one_fourth', 'ts_one_fourth');
	add_shortcode('one_fourth_last', 'ts_one_fourth_last');
	add_shortcode('one_fifth', 'ts_one_fifth');
	add_shortcode('one_fifth_last', 'ts_one_fifth_last');
	add_shortcode('one_sixth', 'ts_one_sixth');
	add_shortcode('one_sixth_last', 'ts_one_sixth_last');
	
	add_shortcode('two_third', 'ts_two_third');
	add_shortcode('two_third_last', 'ts_two_third_last');
	add_shortcode('two_fourth', 'ts_two_fourth');
	add_shortcode('two_fourth_last', 'ts_two_fourth_last');
	add_shortcode('two_fifth', 'ts_two_fifth');
	add_shortcode('two_fifth_last', 'ts_two_fifth_last');
	add_shortcode('two_sixth', 'ts_two_sixth');
	add_shortcode('two_sixth_last', 'ts_two_sixth_last');
	
	
	add_shortcode('three_fourth', 'ts_three_fourth');
	add_shortcode('three_fourth_last', 'ts_three_fourth_last');
	add_shortcode('three_fifth', 'ts_three_fifth');
	add_shortcode('three_fifth_last', 'ts_three_fifth_last');
	add_shortcode('three_sixth', 'ts_three_sixth');
	add_shortcode('three_sixth_last', 'ts_three_sixth_last');
	
	add_shortcode('four_fifth', 'ts_four_fifth');
	add_shortcode('four_fifth_last', 'ts_four_fifth_last');
	add_shortcode('four_sixth', 'ts_four_sixth');
	add_shortcode('four_sixth_last', 'ts_four_sixth_last');
	
	add_shortcode('five_sixth', 'ts_five_sixth');
	add_shortcode('five_sixth_last', 'ts_five_sixth_last');
	
	
	
	/* -----------------------------------------------------------------
		Columns shortcodes
	----------------------------------------------------------------- */
	function ts_one_half($atts, $content = null) {
		
		$content = ts_remove_autop($content);
		
		$content = ($content);
		$output = '<div class="one_half">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}
	
	function ts_one_half_last($atts, $content = null) {
		
		$content =ts_remove_autop($content);
		
		$content = ($content);
		
		$output = '<div class="one_half last">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}

	function ts_one_third($atts, $content = null) {
		
		$content = ts_remove_autop($content);
		
		$content = ($content);
		$output = '<div class="one_third">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}
	
	function ts_one_third_last($atts, $content = null) {
		
		$content =ts_remove_autop($content);
		
		$content = ($content);
		
		$output = '<div class="one_third last">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}
	

	function ts_one_fourth($atts, $content = null) {
		
		$content = ts_remove_autop($content);
		
		$content = ($content);
		$output = '<div class="one_fourth">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}
	

	function ts_one_fourth_last($atts, $content = null) {
		
		$content =ts_remove_autop($content);
		
		$content = ($content);
		
		$output = '<div class="one_fourth last">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}
	
	function ts_one_fifth($atts, $content = null) {
		
		$content = ts_remove_autop($content);
		
		$content = ($content);
		$output = '<div class="one_fifth">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}
	

	function ts_one_fifth_last($atts, $content = null) {
		
		$content =ts_remove_autop($content);
		
		$content = ($content);
		
		$output = '<div class="ts_one_fifth last">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}
	
	function ts_one_sixth($atts, $content = null) {
		
		$content = ts_remove_autop($content);
		
		$content = ($content);
		$output = '<div class="one_sixth">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}
	

	function ts_one_sixth_last($atts, $content = null) {
		
		$content =ts_remove_autop($content);
		
		$content = ($content);
		
		$output = '<div class="ts_one_sixth last">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}

	
	function ts_two_third($atts, $content = null) {
		
		$content = ts_remove_autop($content);
		
		$content = ($content);
		$output = '<div class="two_third">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}

	function ts_two_third_last($atts, $content = null) {
		
		$content =ts_remove_autop($content);
		
		$content = ($content);
		
		$output = '<div class="two_third last">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}
	
	function ts_two_fourth($atts, $content = null) {
		
		$content = ts_remove_autop($content);
		
		$content = ($content);
		$output = '<div class="two_fourth">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}

	function ts_two_fourth_last($atts, $content = null) {
		
		$content =ts_remove_autop($content);
		
		$content = ($content);
		
		$output = '<div class="two_fourth last">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}
	
	function ts_two_fifth($atts, $content = null) {
		
		$content = ts_remove_autop($content);
		
		$content = ($content);
		$output = '<div class="two_fifth">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}

	function ts_two_fifth_last($atts, $content = null) {
		
		$content =ts_remove_autop($content);
		
		$content = ($content);
		
		$output = '<div class="two_fifth last">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}
	
	function ts_two_sixth($atts, $content = null) {
		
		$content = ts_remove_autop($content);
		
		$content = ($content);
		$output = '<div class="two_sixth">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}

	function ts_two_sixth_last($atts, $content = null) {
		
		$content =ts_remove_autop($content);
		
		$content = ($content);
		
		$output = '<div class="two_sixth last">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}
	
	
	function ts_three_fourth($atts, $content = null) {
		
		$content = ts_remove_autop($content);
		
		$content = ($content);
		$output = '<div class="three_fourth">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}

	function ts_three_fourth_last($atts, $content = null) {
		
		$content =ts_remove_autop($content);
		
		$content = ($content);
		
		$output = '<div class="three_fourth last">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}
	
	function ts_three_fifth($atts, $content = null) {
		
		$content = ts_remove_autop($content);
		
		$content = ($content);
		$output = '<div class="three_fifth">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}

	function ts_three_fifth_last($atts, $content = null) {
		
		$content =ts_remove_autop($content);
		
		$content = ($content);
		
		$output = '<div class="three_fifth last">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}
	
	function ts_three_sixth($atts, $content = null) {
		
		$content = ts_remove_autop($content);
		
		$content = ($content);
		$output = '<div class="three_sixth">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}

	function ts_three_sixth_last($atts, $content = null) {
		
		$content =ts_remove_autop($content);
		
		$content = ($content);
		
		$output = '<div class="three_sixth last">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}
	
	function ts_four_fifth($atts, $content = null) {
		
		$content = ts_remove_autop($content);
		
		$content = ($content);
		$output = '<div class="four_fifth">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}

	function ts_four_fifth_last($atts, $content = null) {
		
		$content =ts_remove_autop($content);
		
		$content = ($content);
		
		$output = '<div class="four_fifth last">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}
	
	function ts_four_sixth($atts, $content = null) {
		
		$content = ts_remove_autop($content);
		
		$content = ($content);
		$output = '<div class="four_sixth">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}

	function ts_four_sixth_last($atts, $content = null) {
		
		$content =ts_remove_autop($content);
		
		$content = ($content);
		
		$output = '<div class="four_sixth last">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}
	
	function ts_five_sixth($atts, $content = null) {
		
		$content = ts_remove_autop($content);
		
		$content = ($content);
		$output = '<div class="five_sixth">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}

	function ts_five_sixth_last($atts, $content = null) {
		
		$content =ts_remove_autop($content);
		
		$content = ($content);
		
		$output = '<div class="five_sixth last">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}

?>