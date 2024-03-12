<?php
global $theme_option;
if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/ReduxFramework/sample/sample-config.php' ) ) {
    require_once( dirname( __FILE__ ) . '/ReduxFramework/sample/sample-config.php' );
}
//Custom fields:
require_once dirname( __FILE__ ) . '/framework/bfi_thumb-master/BFI_Thumb.php';
require_once dirname( __FILE__ ) . '/framework/Custom-Metaboxes/metabox-functions.php';
require_once dirname( __FILE__ ) . '/framework/post_type.php';
require_once dirname( __FILE__ ) . '/shortcodes.php';
require_once dirname( __FILE__ ) . '/framework/wp_bootstrap_navwalker.php';
//Define Text Doimain
$textdomain = 'chronos';
$lang = get_template_directory_uri() . '/languages';
load_theme_textdomain($textdomain, $lang);
//Theme Set up:
function chronos_theme_setup() {
    /*
     * This theme uses a custom image size for featured images, displayed on
     * "standard" posts and pages.
     */
	add_theme_support( 'custom-header' ); 
	add_theme_support( 'custom-background' );
	add_theme_support ('title-tag');
    add_theme_support( 'post-thumbnails' );
    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );
    // Switches default core markup for search form, comment form, and comments
    // to output valid HTML5.
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
    //Post formats
    add_theme_support( 'post-formats', array(
        'gallery', 'video', 'audio', 'quote', 'link'
    ) );
    // This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => 'Primary Navigation Menu (Use For All Page)',    
    'secondary' => 'Secondary Navigation Menu (Only Use For Home Page, Template Canvas)',
	) );
    // This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
    add_shortcode('gallery', '__return_false');
}
add_action( 'after_setup_theme', 'chronos_theme_setup' );
if ( ! isset( $content_width ) ) $content_width = 900;

function chronos_theme_scripts_styles() {
	global $theme_option;
	$protocol = is_ssl() ? 'https' : 'http';  
if( !is_page_template('page-templates/template-slider.php') && !is_page_template('page-templates/template-moving.php') ){
  wp_enqueue_style( 'base', get_template_directory_uri().'/css/base-ajax.css');
}
if(is_page_template('page-templates/template-slider.php') || is_page_template('page-templates/template-moving.php') ){
  wp_enqueue_style( 'base-dark', get_template_directory_uri().'/css/base-dark.css');
}
  wp_enqueue_style( 'skeleton', get_template_directory_uri().'/css/skeleton.css');
  wp_enqueue_style( 'stylecolor-css', get_template_directory_uri().'/css/style-color.css');
  wp_enqueue_style( 'style', get_stylesheet_uri(), array(), '2015-02-2' );

  if(is_page_template('page-templates/template-slider.php') || ( is_singular('portfolio') && $theme_option['style_color'] == 'dark') || is_page_template('page-templates/template-moving.php') ){
    wp_enqueue_style( 'dark-color', get_template_directory_uri().'/css/style-dark.css');
  }
  wp_enqueue_style( 'font-awesome-full', get_template_directory_uri().'/css/font-awesome/css/font-awesome.css');
	wp_enqueue_style( 'font-awesome-theme', get_template_directory_uri().'/css/font-awesome.css');
	wp_enqueue_style( 'colorbox-css', get_template_directory_uri().'/css/colorbox.css');
	wp_enqueue_style( 'retina-css', get_template_directory_uri().'/css/retina.css');

	wp_enqueue_style( 'orange-css', get_template_directory_uri().'/css/colors/color-orange.css');
  
  wp_enqueue_style( 'color', get_template_directory_uri().'/framework/color.php');
if( !is_page_template('page-templates/template-slider.php') && !is_page_template('page-templates/template-moving.php')  ){
  wp_enqueue_style( 'logo1', get_template_directory_uri().'/framework/logo1.php');
}  
if( is_page_template('page-templates/template-slider.php') || is_page_template('page-templates/template-moving.php')  ){
  wp_enqueue_style( 'logo2', get_template_directory_uri().'/framework/logo2.php');
}  
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
  wp_enqueue_script( 'comment-reply' );}
	//Javascript
  wp_enqueue_script("jquery");
	//wp_enqueue_script("jquery-js", get_template_directory_uri()."/js/jquery.js",array(),false,true);
  wp_enqueue_script("modernizr", get_template_directory_uri()."/js/modernizr.custom.js",array(),false,true);
if(is_single()  || is_home() || is_tag() || is_search() ||is_category() || is_archive() || is_author() || is_page_template('page-templates/template-blog.php') ){
  wp_enqueue_script("plugins-js", get_template_directory_uri()."/js/plugins.js",array(),false,true);
  }
  wp_enqueue_script("royal_preloader", get_template_directory_uri()."/js/royal_preloader.min.js",array(),false,true);
if(is_page_template('page-templates/template-yt.php') || is_page_template('page-templates/template-ajax.php') || ( is_singular('portfolio') && $theme_option['style_color'] == 'light') || is_single() || is_page() || is_home() || is_tag() || is_search() ||is_category() || is_archive() || is_author() || is_page_template('page-templates/template-blog.php') || is_404() ){
  wp_enqueue_script("preloader", get_template_directory_uri()."/framework/preload.php",array(),false,true);
}
if( is_page_template('page-templates/template-slider.php') || ( is_singular('portfolio') && $theme_option['style_color'] == 'dark') || is_page_template('page-templates/template-moving.php') ){
  wp_enqueue_script("preloader-dark", get_template_directory_uri()."/framework/preload_dark.php",array(),false,true);
}
if(is_page_template('page-templates/template-moving.php')){
  wp_enqueue_script("moving", get_template_directory_uri()."/js/moving.js",array(),false,true);
}
if( (!is_singular( 'portfolio' ) && is_single() ) || is_home()  || is_tag() || is_search() ||is_category() || is_archive() || is_author() || is_page_template('page-templates/template-blog.php') ){
  wp_enqueue_script("blog", get_template_directory_uri()."/js/blog.js",'','1.1',true);
}
if(!is_singular( 'portfolio' )){
  wp_enqueue_script("classie", get_template_directory_uri()."/js/classie.js",array(),false,true);
  wp_enqueue_script("cbpAnimatedHeader", get_template_directory_uri()."/js/cbpAnimatedHeader.min.js",array(),false,true);
  wp_enqueue_script("styleswithcher", get_template_directory_uri()."/js/styleswitcher.js",array(),false,true);
  wp_enqueue_script("retina", get_template_directory_uri()."/js/retina-1.1.0.min.js",array(),false,true);
if(!is_single() && !is_home() && !is_tag() && !is_search() && !is_category() && !is_archive() && !is_author() && !is_page_template('page-templates/template-blog.php')){
  wp_enqueue_script("flippy", get_template_directory_uri()."/js/flippy.js",array(),false,true);
  wp_enqueue_script("mb.bgndGallery", get_template_directory_uri()."/js/mb.bgndGallery.js",array(),false,true);
}
  wp_enqueue_script("jquery.easing", get_template_directory_uri()."/js/jquery.easing.js",array(),false,true);
if(!is_single()  && !is_home() && !is_tag() && !is_search() && !is_category() && !is_archive() && !is_author() && !is_page_template('page-templates/template-blog.php')){
  wp_enqueue_script("svganimations", get_template_directory_uri()."/js/svganimations.js",array(),false,true);
}
  wp_enqueue_script("bxslider", get_template_directory_uri()."/js/jquery.bxslider.min.js",array(),false,true);
if(is_single()  || is_home() || is_tag() || is_search() ||is_category() || is_archive() || is_author() || is_page_template('page-templates/template-ajax.php') || is_page_template('page-templates/template-blog.php') || is_page_template('page-templates/template-slider.php') || is_page_template('page-templates/template-moving.php') || is_page_template('page-templates/template-yt.php')){
  wp_enqueue_script("fitvids", get_template_directory_uri()."/js/jquery.fitvids.js",array(),false,true);
}
if(!is_single()  && !is_home() && !is_tag() && !is_search() && !is_category() && !is_archive() && !is_author() && !is_page_template('page-templates/template-blog.php')){
  wp_enqueue_script("jquery.colorbox", get_template_directory_uri()."/js/jquery.colorbox.js",array(),false,true);
  wp_enqueue_script("map-api", "$protocol://maps.google.com/maps/api/js?sensor=true",array(),false,true);
  wp_enqueue_script("plugins", get_template_directory_uri()."/js/plugins.js",array(),false,true);
if( is_page_template('page-templates/template-yt.php') ){
  wp_enqueue_script("YTPlayer", get_template_directory_uri()."/js/mb.YTPlayer.js",array(),false,true);
}
  wp_enqueue_script("template", get_template_directory_uri()."/js/template.js",'','1.1',true);
}		
}
if(is_singular( 'portfolio' )){
  wp_enqueue_script("retina", get_template_directory_uri()."/js/retina-1.1.0.min.js",array(),false,true);
  wp_enqueue_script("nicescroll", get_template_directory_uri()."/js/jquery.nicescroll.min.js",array(),false,true);
  wp_enqueue_script("scrollReveal", get_template_directory_uri()."/js/scrollReveal.js",array(),false,true);
  wp_enqueue_script("easing", get_template_directory_uri()."/js/jquery.easing.js",array(),false,true);
  wp_enqueue_script("parallax", get_template_directory_uri()."/js/jquery.parallax-1.1.3.js",array(),false,true);
  wp_enqueue_script("localscroll", get_template_directory_uri()."/js/jquery.localscroll-1.2.7-min.js",array(),false,true);
  wp_enqueue_script("scrollTo", get_template_directory_uri()."/js/jquery.scrollTo-1.4.2-min.js",array(),false,true);
  wp_enqueue_script("fitvids", get_template_directory_uri()."/js/jquery.fitvids.js",array(),false,true);
  wp_enqueue_script("bxslider", get_template_directory_uri()."/js/jquery.bxslider.min.js",array(),false,true);
  wp_enqueue_script("onepage", get_template_directory_uri()."/js/jquery.onepage-scroll.js",array(),false,true);
  wp_enqueue_script("single", get_template_directory_uri()."/js/single-portfolio.js",array(),false,true);

  }
}
add_action( 'wp_enqueue_scripts', 'chronos_theme_scripts_styles' );

if(!function_exists('chronos_custom_frontend_style')){
	function chronos_custom_frontend_style(){
	global $theme_option;
	echo '<style type="text/css">'.$theme_option['custom-css'].'</style>';
}
}
add_action('wp_head', 'chronos_custom_frontend_style');
if(!function_exists('chronos_custom_frontend_scripts')){
	function chronos_custom_frontend_scripts(){
	global $theme_option;
	echo $theme_option['google_id'];
}
}
add_action('wp_footer', 'chronos_custom_frontend_scripts');
//Custom Excerpt Function
function chronos_do_shortcode($content) {
    global $shortcode_tags;
    if (empty($shortcode_tags) || !is_array($shortcode_tags))
        return $content;
    $pattern = get_shortcode_regex();
    return preg_replace_callback( "/$pattern/s", 'do_shortcode_tag', $content );
}
// Widget Sidebar
function chronos_widgets_init() {
	register_sidebar( array(
        'name'          => __( 'Primary Sidebar', 'chronos' ),
        'id'            => 'sidebar-1',        
		'description'   => __( 'Appears in the sidebar section of the site.', 'chronos' ),        
		'before_widget' => '<div id="%1$s" class="widget %2$s" data-scrollreveal="enter bottom and move 50px over 1s">',        
		'after_widget'  => '</div>',        
		'before_title'  => '<h6>',        
		'after_title'   => '</h6>'
    ) );
}
add_action( 'widgets_init', 'chronos_widgets_init' );

//function tag widgets
function chronos_tag_cloud_widget($args) {
	$args['number'] = 0; //adding a 0 will display all tags
	$args['largest'] = 18; //largest tag
	$args['smallest'] = 11; //smallest tag
	$args['unit'] = 'px'; //tag font unit
	$args['format'] = 'list'; //ul with a class of wp-tag-cloud
	$args['exclude'] = array(20, 80, 92); //exclude tags by ID
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'chronos_tag_cloud_widget' );
function chronos_portfolio_excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
function chronos_excerpt($limit) {
  
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
//pagination
function chronos_pagination($prev = '<i class="fa fa-chevron-left"></i>', $next = '<i class="fa fa-chevron-right"></i>', $pages='') {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    if($pages==''){
        global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
    }
    $pagination = array(
		'base' 			=> str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
		'format' 		=> '',
		'current' 		=> max( 1, get_query_var('paged') ),
		'total' 		=> $pages,
		'prev_text' => __($prev,'chronos'),
        'next_text' => __($next,'chronos'),		'type'			=> 'list',
		'end_size'		=> 3,
		'mid_size'		=> 3
);
    $return =  paginate_links( $pagination );
	echo str_replace( "<ul class='page-numbers'>", '<ul>', $return );
}
//Get thumbnail url
function chronos_thumbnail_url($size){
    global $post;
    //$url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()),$size );
    if($size==''){
        $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
         return $url;
    }else{
        $url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $size);
         return $url[0];
    }
}
function chronos_post_nav() {
    global $post;
    // Don't print empty markup if there's nowhere to navigate.
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );
    if ( ! $next && ! $previous )
        return;
    ?>
	<ul class="pager clearfix">
	  <li class="previous">
		<?php previous_post_link( '%link', _x( ' &larr; Older Item', 'Previous post link', 'nevermind' ) ); ?>
	  </li>
	  <li class="next">
		<?php next_post_link( '%link', _x( 'Newer Item &rarr;', 'Next post link', 'nevermind' ) ); ?>
	  </li>
	</ul>   
<?php
}
function chronos_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="search_form" action="' . home_url( '/' ) . '" >  
    	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Search the site..." />
    	<input type="submit" class="search_btn" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" />    
    </form>';
    return $form;
}
add_filter( 'get_search_form', 'chronos_search_form' );
//Custom comment List:

// Comment Form
function chronos_theme_comment($comment, $args, $depth) {
    //echo 's';
   $GLOBALS['comment'] = $comment; ?>
  <div class="post-down" data-scrollreveal="enter bottom and move 150px over 1s">
      <div class="rpl-but"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div>
              <?php echo get_avatar($comment,$size='100',$default='http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=70' ); ?>
              <h6><?php printf(__('%s','chronos'), get_comment_author_link()) ?> <span>on <?php $d = "F j, Y, \A\T h:m a"; printf(get_comment_date($d)) ?></span></h6>
              <?php if ($comment->comment_approved == '0') : ?>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<em><?php _e('Your comment is awaiting moderation.','chronos') ?></em>
               <br />
              <?php endif; ?>
                <p><?php comment_text() ?></p>            
  </div>
<?php
}


//Code Visual Compurso.
require_once dirname( __FILE__ ) . '/vc_shortcode.php';
//if(class_exists('WPBakeryVisualComposerSetup')){
function chronos_custom_css_classes_for_vc_row_and_vc_column($class_string, $tag) {
    if($tag=='vc_row' || $tag=='vc_row_inner') {
        $class_string = str_replace('vc_row-fluid', '', $class_string);
    }
    if($tag=='vc_column' || $tag=='vc_column_inner') {
    $class_string = preg_replace('/vc_col-sm-12/', 'sixteen columns', $class_string);
    $class_string = preg_replace('/vc_col-sm-6/', 'eight columns', $class_string);
    $class_string = preg_replace('/vc_col-sm-4/', 'one-third column', $class_string);
    $class_string = preg_replace('/vc_col-sm-3/', 'four columns', $class_string);
    $class_string = preg_replace('/vc_col-sm-5/', 'seven columns', $class_string);
    $class_string = preg_replace('/vc_col-sm-7/', 'nine columns', $class_string);
    $class_string = preg_replace('/vc_col-sm-8/', 'two-thirds column', $class_string);
    $class_string = preg_replace('/vc_col-sm-9/', 'twelve columns', $class_string);
    $class_string = preg_replace('/vc_col-sm-10/', 'thirteen column', $class_string);
    $class_string = preg_replace('/vc_col-sm-11/', 'fifteen columns', $class_string);
    $class_string = preg_replace('/vc_col-sm-1/', 'one columns', $class_string);
    $class_string = preg_replace('/vc_col-sm-2/', 'three columns', $class_string);
    }
    return $class_string;
}
// Filter to Replace default css class for vc_row shortcode and vc_column
add_filter('vc_shortcodes_css_class', 'chronos_custom_css_classes_for_vc_row_and_vc_column', 10, 2); 
// Add new Param in Row
if(function_exists('vc_add_param')){
vc_add_param('vc_row',array(
                              "type" => "textfield",
                              "heading" => __('Extra id name', 'wpb'),
                              "param_name" => "extra_id",
                              "value" => "",
                              "description" => __("If you wish to style particular content element differently, then use this field to add a id name and then refer to it in your css file.", "wpb"),   
    ));
vc_add_param('vc_row',array(
                              "type" => "textfield",
                              "heading" => __('Section Title', 'wpb'),
                              "param_name" => "ses_title",
                              "value" => "",
                              "description" => __("Title of Section, Leave a blank do not show frontend.", "wpb"),   
    )); 
vc_add_param('vc_row',array(
                              "type" => "textarea_html",
                              "heading" => __('Section Sub Title', 'wpb'),
                              "param_name" => "ses_sub_title",
                              "value" => "",
                              "description" => __("Section Sub Title, Leave a blank do not show frontend.", "wpb"),   
    ));
vc_add_param('vc_row',array(
                              "type" => "textfield",
                              "heading" => __('Container Class', 'wpb'),
                              "param_name" => "wrap_class",
                              "value" => "",
                              "description" => __("Container Class", "wpb"),   
    ));
vc_add_param('vc_row',array(
                              "type" => "dropdown",
                              "heading" => __('Fullwidth', 'wpb'),
                              "param_name" => "fullwidth",
                              "value" => array(   
                                                __('No', 'wpb') => 'no',  
                                                __('Yes', 'wpb') => 'yes',                                                                                
                                              ),
                              "description" => __("Select Fullwidth or not, Default: No fullwidth", "wpb"),      
                            ) 
    );
  
// Add new Param in Column  
vc_add_param('vc_column',array(
                              "type" => "textfield",
                              "heading" => __('Column Title', 'wpb'),
                              "param_name" => "title",
                              "value" => "",
                              "description" => __("Title of column", "wpb"),      
                            ) 
    );
vc_add_param('vc_column',array(
                              "type" => "textfield",
                              "heading" => __('Container Class', 'wpb'),
                              "param_name" => "wap_class",
                              "value" => "",
                              "description" => __("Container Class", "wpb"),      
                            ) 
    );
vc_add_param('vc_column',array(
                              "type" => "textfield",
                              "heading" => __('Container id', 'wpb'),
                              "param_name" => "wap_id",
                              "value" => "",
                              "description" => __("Container ID, Only use for content slider.", "wpb"),      
                            ) 
    );  
vc_add_param('vc_column',array(
                              "type" => "dropdown",
                              "heading" => __('Column Effect', 'wpb'),
                              "param_name" => "column_effect",
                              "value" => array(    
                                                __('Bottom Move', 'wpb') => 'bottommove',     
                        __('Top Move', 'wpb') => 'topmove', 
                        __('None', 'wpb') => 'none',  
                                              ),
                              "description" => __("Select Effect for column, Default: Move Bottom", "wpb"),      
                            ) 
    );  
vc_add_param('vc_column',array(
                              "type" => "dropdown",
                              "heading" => __('Column Effect With Animate Version', 'wpb'),
                              "param_name" => "column_effectanimate",
                              "value" => array(    
                                __('Center', 'wpb') => 'flipInY',     
                                __('Left', 'wpb') => 'bounceInLeft', 
                                __('Right', 'wpb') => 'bounceInRight',  
                                __('Up', 'wpb') => 'bounceInUp',
                                __('Rubber', 'wpb') => 'rubberBand',
                                __('Roll In', 'wpb') => 'rollIn',
                                              ),
                              "description" => __("Select Effect for column in Animate Version.", "wpb"),      
                            ) 
    );   
}


/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.4.0
 * @author     Thomas Griffin <thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo.com>
 * @copyright  Copyright (c) 2014, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/framework/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'chronos_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
 
 
function chronos_theme_register_required_plugins() {
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(	
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
    array(            'name'               => 'WPBakery Visual Composer', // The plugin name.
            'slug'               => 'js_composer', // The plugin slug (typically the folder name).
            'source'             => get_template_directory_uri() . '/framework/plugins/js_composer.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ),
    array(
            'name'               => 'Revolution Slider', // The plugin name.
            'slug'               => 'revslider', // The plugin slug (typically the folder name).
            'source'             => get_template_directory_uri() . '/framework/plugins/revslider.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ),

		array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contact-form-7',
            'required'  => true,
        ),
    );
    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'tgmpa' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'tgmpa' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'tgmpa' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );
    tgmpa( $plugins, $config );
}
?>