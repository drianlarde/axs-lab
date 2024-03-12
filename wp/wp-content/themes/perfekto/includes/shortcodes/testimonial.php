<?php
/*  Copyright 2010  TEMPLATESQUARE */

//to block direct access
if ( ! defined( 'ABSPATH' ) )
	die( "Can't load this file directly" );

//global variable for this plugin
$pathinfo	= pathinfo(__FILE__);


class TS_Testimonial{
	
	var $imagesizes;
	var $types;
	var	$type;
	var	$longdesc;
	var $avatar;
	var	$langval;
	var	$version;
	var $defaultattr;
	var $posttypename;
	
	function TS_Testimonial(){
		$this->__construct();
	}
	
	function __construct(){
		// Register the shortcode to the function ep_shortcode()
		add_shortcode("testimonial", array($this, "ts_testimonial_shortcode"));
		
		// Register hooks for activation.
		$this->ts_testimonial_activation();
		
		//Register the Thinkbox Menu
		add_action('init', array($this, 'ts_testimonial_post_type'));
		add_action('init', array($this, 'ts_testimonial_action_init'));
		add_action('after_setup_theme', array($this, 'ts_testimonial_setup'));
		
	}
	
	function ts_testimonial_getlangval(){
		$this->langval = "templatesquare";
		return $this->langval;
	}
	
	//Get the version of ts thinkbox
	function ts_testimonial_version(){
		$this->version		= "1.0";
		
		return $this->version;
	}

	//Get the image size for every column
	function ts_testimonial_setsize(){
		//set image size for every column in here.
		$this->imagesizes = array(
			array(
				"num"		=> 'custom',
				"namesize"	=> 'ts-testimonial-custom-post-thumbnail',
				"width" 	=> get_option('ts_testimonial_widthimg'),
				"height" 	=> get_option('ts_testimonial_heightimg')
			)
			
		);
		return $this->imagesizes;
	}
	
	function ts_testimonial_getdefattr($typeattr){
		if(!isset($typeattr)) return false;
		//Specify default attributes
		$this->defaultattr = array();
		$this->defaultattr["plain"] = array(
			"col" => '1',
			"cat" => '',
			"postperpage" => '-1',
			"testiid" => '',
			"longtext" => '',
			"showthumb" => 'yes',
			"showtitle" => 'no',
			"showname"	=> 'yes',
			"showinfo"	=> 'yes',
			"customclass" => '',
			"widthimg" => get_option('ts_testimonial_widthimg'),
			"heightimg" => get_option('ts_testimonial_heightimg')
		);
		if(array_key_exists($typeattr,$this->defaultattr)){
			return $this->defaultattr[$typeattr];
		}else{
			return false;
		}
	}
	
	function ts_testimonial_getposttype(){
		$this->posttypename	= "testimonial";
		return $this->posttypename;
	}
	
	function ts_testimonial_setup(){
		add_theme_support( 'post-thumbnails' );
		$imagesizes = $this->ts_testimonial_setsize();
		foreach($imagesizes as $imgsize){
			add_image_size( $imgsize["namesize"], $imgsize["width"], $imgsize["height"], true ); // thinkbox pics thumbnail
		}
	}
	
	function ts_testimonial_getthumbinfo($col){
		$imagesizes = $this->ts_testimonial_setsize();
		foreach($imagesizes as $imgsize){
			if($col==$imgsize["num"]){
				return $imgsize;
			}
		}
		return false;
	}
	
	function ts_testimonial_getavatar(){
		$this->avatar = get_template_directory_uri()."/images/ts-testimonial/photo.gif";
		return $this->avatar;
	}
	
	//make the shortcode
	function ts_testimonial_shortcode($atts){
		global $more;
		
		$langval = $this->ts_testimonial_getlangval();
		$avatar = $this->ts_testimonial_getavatar();
		$defattr = $this->ts_testimonial_getdefattr("plain");
				
		//make all shortcode attributes into single variable
		extract(shortcode_atts($defattr, $atts));
		
		$more = 0;
		
		//validate the postperpage, default value is -1.
		$postperpage = (is_numeric($postperpage)&& $postperpage >=-1)? $postperpage : -1;
				
		//validate the long description.
		$longdesc = (is_numeric($longtext) && $longtext > 0)? $longtext : 0;
		
		//validates the Testimonial ID, default is 0
		$testiid = (strlen($testiid)>0 && $testiid!=0)? $testiid : $defattr["testiid"];
		
		//validates the image dimensions.
		$widthimg = (!is_numeric($widthimg))? $defattr["widthimg"] : $widthimg;
		$heightimg = (!is_numeric($heightimg))? $defattr["heightimg"] : $heightimg;
		
		$picwidth = $widthimg;
		$picheight = $heightimg;
		
		$thumbinfo = $this->ts_testimonial_getthumbinfo("custom");
		$thumbwidth 	= $picwidth;
		$thumbheight 	= $picheight;
		$thumbname		= $thumbinfo["namesize"];
		$paged = (get_query_var('paged'))? get_query_var('paged') : 1 ;

		//define all used variable for the query.
		$arrinclude = array();
		$arrinclude['post_type'] = $this->ts_testimonial_getposttype();
		if($postperpage>=0){
			$arrinclude['paged'] = $paged;
		}
		$arrinclude['posts_per_page'] = $postperpage;
		$arrinclude['orderby'] = 'date';
		if(strlen($cat)){
			$arrinclude['testi-category'] = $cat;
		}
		
		if(strlen($testiid)>0 && $testiid!=0){
			$arrinclude['post__in'] = explode(",",$testiid);
		}

		query_posts($arrinclude);
		global $wp_query, $post;
		
		//make a appologies content if the posts is zero or null
		if ( ! have_posts() ){
			$error404 =  '<div id="post-0" class="post error404 not-found">
				<h1 class="entry-title">'.__( 'Not Found',$langval). '</h1>
				<div class="entry-content">
					<p>'.__( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.',$langval).'</p>
					';
			$error404 .= get_search_form();
			$error404 .= '
				</div>
			</div>';
			return $error404;
		}
		
		//generate the thinkbox HTML
		$htmldisp = "";
		
		$htmldisp .=	'
		<div class="ts-testimonial '.$customclass.'">
			<ul class="ts-testimonial-list">
			';
			$i=0;
			$addclass = "";
			if($col==1){
				$addclass = "nomargin";
			}
			if (have_posts()){
				while ( have_posts() ){ 
					the_post(); 
					$prefix = 'ts_';
					$custom = get_post_custom($post->ID);
					$cf_thumb = (isset($custom[$prefix."testi-thumb"][0]))? $custom[$prefix."testi-thumb"][0] : "" ;
					$tb_name = (isset($custom[$prefix."testi-name"][0]))? $custom[$prefix."testi-name"][0] : "" ;
					$tb_info = (isset($custom[$prefix."testi-info"][0]))? $custom[$prefix."testi-info"][0] : "" ;
					$imginfos = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),$thumbname);
					
					
					if($i%$col==0 && $col > 1){
						$htmldisp .= '</ul><ul class="ts-testimonial-list">';
					}
					
					
					$stylelist = '';
					$percentage = intval(100/$col)-2;
					$stylelist = 'width:'.$percentage.'%;';
					
					
					$widthheightimg = 'width:'.$thumbwidth.'px;height:'.$thumbheight.'px;';
					if($cf_thumb!=""){
						$cf_thumb = '<img src="'.$cf_thumb.'" alt="" style="'.$widthheightimg.'"/>';
					}elseif($imginfos!=false){
						$cf_thumb = '<img src="'.$imginfos[0].'" alt="" style="'.$widthheightimg.'"/>';
					}else{
						$cf_thumb = '<img src="'.$avatar.'" alt="" style="'.$widthheightimg.'"/>';
					}
					
					$htmldisp .= '<li class="'.$addclass.'" style="'.$stylelist.'">';
					
					$textquote = "";
					$text = get_the_content();
					if($longdesc>0){
						$text = ts_string_limit_char($text,$longdesc);
					}
					if($showtitle=="yes"){
						$textquote .= '<a class="header">'.get_the_title($post->ID).'</a>';
					}
					$textquote .=''.$text.'';
					$textinfo = "";
					if($showname=="yes" && $tb_name!=""){
						$textinfo .= '<span class="ts-testimonial-name">- '. $tb_name.'</span>';
					}
					if($showinfo=="yes" && $tb_info!=""){
						$textinfo .= '<span class="ts-testimonial-info"> ('. $tb_info.')</span>';
					}
					if($textinfo!=""){
						$textinfo = '<div class="ts-testimonial-textinfo">'.$textinfo.'</div>';
					}
					
					$marginquote = '';
					$thinkboxthumb = "";
					if($showthumb=="yes"){
						$thinkboxthumb .= '<div class="ts-testimonial-thumb" style="'.$widthheightimg.'">'.$cf_thumb.'</div>';
						$totalmargin = $thumbwidth + 6 + 2 + 28;
						$marginquote .= 'margin-left:'.$totalmargin.'px;';
					}
					
					$htmldisp .= $thinkboxthumb;
					$htmldisp .= '<div class="ts-testimonial-quote" style="'.$marginquote.'">';
					$htmldisp .= $textquote;
					$htmldisp .= $textinfo;
					$htmldisp .= '</div>';
						
					
					$displayclear = "";
					if($col==1){
						$displayclear .= '<div class="ts-testimonial-clear"></div>';
					}
					$htmldisp .= $displayclear.'</li>';
					$i++;
					$addclass=""; 
				}//---------------end While(have_posts())--------------
			}//----------------end if(have_posts())-----------------
				
			$htmldisp .= '
				</ul>
				<div class="ts-testimonial-clr"></div>
			</div>';
			
			if (  $wp_query->max_num_pages > 1 ){
				 if(function_exists('wp_pagenavi')) {
					 ob_start();
					 
					 wp_pagenavi();
					 $htmldisp .= ob_get_contents();
						 
					 ob_end_clean();
				 }else{
					$htmldisp .= '
					<div id="nav-below" class="navigation nav2">
						<div class="nav-previous">'.get_next_posts_link( __( '<span class="prev"><span class="meta-nav">&laquo;</span> Prev</span>', $this->langval ) ).'</div>
						<div class="nav-next">'.get_previous_posts_link( __( '<span class="prev">Next <span class="meta-nav">&raquo;</span></span>', $this->langval ) ).'</div>
					</div><!-- #nav-below -->';
				}
			}
			wp_reset_query();
			
			return $htmldisp;
	}
	
	/* Make a Testimonial Post Type */
	function ts_testimonial_post_type() {
		register_post_type( $this->ts_testimonial_getposttype(),
			array( 
				'label' => __('Testimonial'), 
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => true,
				'rewrite' => true,
				'hierarchical' => true,
				'menu_position' => 5,
				'supports' => array(
					 'title',
					 'editor',
					 'thumbnail'
					// 'custom-fields'
				)
			) 
		);
		register_taxonomy('testi-category', $this->ts_testimonial_getposttype(), array('hierarchical' => true, 'label' => __('Testimonial Categories'), 'singular_name' => 'Category'));
	}
	
	function ts_testimonial_activation(){
		add_option("ts_testimonial_widthimg",97,"","yes");
		add_option("ts_testimonial_heightimg",114,"","yes");
	}
	
	function ts_testimonial_deactivation(){
		delete_option("ts_testimonial_widthimg");
		delete_option("ts_testimonial_heightimg");
	}
	
	function ts_testimonial_action_init(){
		// only hook up these filters if we're in the admin panel, and the current user has permission
		// to edit posts and pages
		$version = $this->ts_testimonial_version();
		
		if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
			add_filter('mce_buttons', array($this, 'ts_testimonial_filter_mce_button'));
			add_filter('mce_external_plugins',array($this, 'ts_testimonial_filter_mce_plugin'));
		}
	}
	
	function ts_testimonial_filter_mce_button( $buttons ) {
		// add a separation before our button, here our button's id is "ts_testimonial_button"
		array_push( $buttons, '|', 'ts_testimonial_button' );
		return $buttons;
	}
	
	function ts_testimonial_filter_mce_plugin( $plugins ) {
	
		// set ts-display folder url
		$basethinkboxurl = get_template_directory_uri()."/js/ts-testimonial/";
		
		// this plugin file will work the magic of our button
		$plugins['ts_testimonial'] = $basethinkboxurl . 'ts-testimonial-plugin.js';
		return $plugins;
	}
}
$ts_testimonial = new TS_Testimonial();
?>