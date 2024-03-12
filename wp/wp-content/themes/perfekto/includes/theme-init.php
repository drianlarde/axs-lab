<?php

add_action( 'after_setup_theme', 'ts_setup' );

if ( ! function_exists( 'ts_setup' ) ):

function ts_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// This theme uses post thumbnails
	if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'blog-post-thumbnail', 589, 328, true ); // Blog Thumbnail
		add_image_size( 'blog-post-thumbnail2', 143, 88, true ); // Blog Thumbnail2
		add_image_size( 'slider-home', 940, 370, true ); // Slider Homepage
		add_image_size( 'recent-portfolio', 280, 138, true ); // Recent Portfolio
		add_image_size( 'portfolio-gallery', 608, 408, true ); // Portfolio Gallery
	}

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'mainmenu' => __( 'Main Menu', 'templatesquare' ),
		'footmenu' => __( 'Footer Menu', 'templatesquare' )
	) );
	
	global $themename, $shortname, $optionstheme;
	  foreach ($optionstheme as $value) {
	  	if(isset($value['id']) && isset($value['std'])){
			add_option( $value['id'],  $value['std'] ); 
		}
	  }
}
endif;

/* Slider */
function ts_post_type_slider() {
	register_post_type( 'slider',
                array( 
				'label' => __('Slider'), 
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => false,
				'menu_position' => 5,
				'supports' => array(
				                     'title',
									 'excerpt',
                                     'thumbnail')
					) 
				);
}

add_action('init', 'ts_post_type_slider');
?>
