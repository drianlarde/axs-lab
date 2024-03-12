<?php
function ts_widgets_init() {
	register_sidebar( array(
		'name' 					=> __( 'Post Sidebar', 'templatesquare' ),
		'id' 						=> 'post-sidebar',
		'description' 		=> __( 'Located at the right side of archives, single and search.', 'templatesquare' ),
		'before_widget' 	=> '<ul><li id="%1$s" class="widget-container %2$s">',
		'after_widget' 		=> '</li></ul>',
		'before_title' 		=> '<h2 class="widget-title">',
		'after_title' 			=> '</h2>',
	));
	
	register_sidebar(array(
		'name'          		=> __('Page Sidebar', 'templatesquare' ),
		'id'         				=> 'page-sidebar',
		'description'   		=> __( 'Located at the right side of page templates.', 'templatesquare' ),
		'before_widget' 	=> '<ul><li id="%1$s" class="widget-container %2$s">',
		'after_widget' 		=> '</li></ul>',
		'before_title' 		=> '<h2 class="widget-title">',
		'after_title' 			=> '</h2>',
	));
				
	register_sidebar(array(
		'name'          		=> __('Footer1 Sidebar', 'templatesquare' ),
		'id'         				=> 'footer1',
		'description'  		=> __( 'Located at the footer column 1.', 'templatesquare' ),
		'before_widget' 	=> '<ul><li id="%1$s" class="widget-container %2$s">',
		'after_widget' 		=> '</li></ul>',
		'before_title' 		=> '<h2 class="widget-title">',
		'after_title' 			=> '</h2>',
	));
	
	register_sidebar(array(
		'name'          		=> __('Footer2 Sidebar', 'templatesquare' ),
		'id'         				=> 'footer2',
		'description'   		=> __( 'Located at the footer column 2.', 'templatesquare' ),
		'before_widget' 	=> '<ul><li id="%1$s" class="widget-container %2$s">',
		'after_widget' 		=> '</li></ul>',
		'before_title' 		=> '<h2 class="widget-title">',
		'after_title' 			=> '</h2>',
	));
	
	register_sidebar(array(
		'name'          		=> __('Footer3 Sidebar', 'templatesquare' ),
		'id'         				=> 'footer3',
		'description'   		=> __( 'Located at the footer column 3.', 'templatesquare' ),
		'before_widget' 	=> '<ul><li id="%1$s" class="widget-container %2$s">',
		'after_widget' 		=> '</li></ul>',
		'before_title' 		=> '<h2 class="widget-title">',
		'after_title' 			=> '</h2>',
	));

}
/** Register sidebars by running creativedesign_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'ts_widgets_init' );
?>