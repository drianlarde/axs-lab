<?php
function my_script() {
	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', get_template_directory_uri().'/js/jquery-1.5.1.min.js', false, '1.5.1');
		wp_enqueue_script('jquery');
		wp_enqueue_script('cufon-yui', get_template_directory_uri().'/js/cufon-yui.js', array('jquery'));
		wp_enqueue_script('Century Gothic', get_template_directory_uri().'/js/Century_Gothic_400-Century_Gothic_700-Century_Gothic_italic_400-Century_Gothic_italic_700.font.js', array('jquery'));
		wp_enqueue_script('Khmer UI', get_template_directory_uri().'/js/Khmer_UI_400-Khmer_UI_700.font.js', array('jquery'));
		wp_enqueue_script('lavalamp', get_template_directory_uri().'/js/jquery.lavalamp.js', array('jquery'));
		wp_enqueue_script('lavalamp-config', get_template_directory_uri().'/js/lavalamp-config.js', array('jquery'));
		wp_enqueue_script('easing', get_template_directory_uri().'/js/jquery.easing.1.1.js', array('jquery'));
		wp_enqueue_script('s3slider', get_template_directory_uri().'/js/s3Slider.js', array('jquery'));
		wp_enqueue_script('fancy', get_template_directory_uri().'/js/jqFancyTransitions.1.8.min.js', array('jquery'));
		wp_enqueue_script('cycle', get_template_directory_uri().'/js/jquery.cycle.all.min.js', array('jquery'));
	}
}
add_action('init', 'my_script');
?>