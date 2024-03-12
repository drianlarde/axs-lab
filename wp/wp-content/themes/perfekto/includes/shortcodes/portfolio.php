<?php /*  Copyright 2010  TEMPLATESQUARE */

//to block direct access
if ( ! defined( 'ABSPATH' ) )
	die( "Can't load this file directly" );

//global variable for this plugin
$pathinfo	= pathinfo(__FILE__);


class TS_Portfolio{
	
	var $imagesizes;
	var $frames;
	var	$longdesc;
	var	$langval;
	var	$version;
	var $defaultattr;
	
	function TS_Portfolio(){
		$this->__construct();
	}
	
	function __construct(){
		// Register the shortcode to the function ep_shortcode()
		add_shortcode("portfolio", array($this, "ts_portfolio_shortcode"));
		
		//Register the Display Menu
		add_action('init', array($this, 'ts_portfolio_post_type'));
		add_action('init', array($this, 'ts_portfolio_action_init'));
		add_action('after_setup_theme', array($this, 'ts_portfolio_setup'));
		
	}
	
	//Get the display Options from Theme Options
	function ts_portfolio_getoption(){
	
		$options = array(
			"readmoretext"	=> get_option('templatesquare_display_readmoretext',"Read More")
		);
		
		return $options;
	}
	
	//Get the version of ts display
	function ts_portfolio_version(){
		$this->version = "1.5.4";
		
		return $this->version;
	}

	//Get the image size for every column
	function ts_portfolio_setsize(){
		//set image size for every column in here.
		
		$this->imagesizes = array(
			array(
				"num"		=> '1',
				"namesize"	=> 'ts-portfolio-1-post-thumbnail',
				"width" 	=> 550,
				"height" 	=> 463,
				"colspacing"=> 0,
				"rowspacing"=> 30
			),
			array(
				"num"		=> '2',
				"namesize"	=> 'ts-portfolio-2-post-thumbnail',
				"width" 	=> 438,
				"height" 	=> 283,
				"colspacing"=> 50,
				"rowspacing"=> 0
			),
			array(
				"num"		=> '3',
				"namesize"	=> 'ts-portfolio-3-post-thumbnail',
				"width" 	=> 274,
				"height" 	=> 213,
				"colspacing"=> 52,
				"rowspacing"=> 0
			),
			array(
				"num"		=> '4',
				"namesize"	=> 'ts-portfolio-4-post-thumbnail',
				"width" 	=> '',
				"height" 	=> '',
				"colspacing"=> 52,
				"rowspacing"=> 0
			),
			array(
				"num"		=> '5',
				"namesize"	=> 'ts-portfolio-5-post-thumbnail',
				"width" 	=> '',
				"height" 	=> '',
				"colspacing"=> 52,
				"rowspacing"=> 0
			)
			
		);
		return $this->imagesizes;
	}
	
	function ts_portfolio_setup(){
		add_theme_support( 'post-thumbnails' );
		$imagesizes = $this->ts_portfolio_setsize();
		foreach($imagesizes as $imgsize){
			add_image_size( $imgsize["namesize"], $imgsize["width"], $imgsize["height"], true ); // Portfolio Thumbnail
		}
	}
	
	function ts_portfolio_getthumbinfo($col){
		$imagesizes = $this->ts_portfolio_setsize();
		foreach($imagesizes as $imgsize){
			if($col==$imgsize["num"]){
				return $imgsize;
			}
		}
		return false;
	}
	
	//Count all posts from post type 'display'.	
	function ts_portfolio_getnumposts($cat){
		global $wpdb;
		$qryString = "
			SELECT	Count(*) as totpost FROM ".$wpdb->posts." a 
			INNER 	JOIN ".$wpdb->term_relationships." b ON a.ID = b.object_id 
			INNER 	JOIN ".$wpdb->term_taxonomy." c ON b.term_taxonomy_id = c.term_taxonomy_id
			INNER	JOIN ".$wpdb->terms."  d ON c.term_id = d.term_id
			WHERE 	a.post_type = 'portfolio'
		";
		if(strlen($cat)>0){
			$qryString .= " AND	d.slug = '".$cat."'";
		}
		$numposts = $wpdb->get_var($wpdb->prepare($qryString));
		return $numposts;
	}
	
	//make the shortcode
	function ts_portfolio_shortcode($atts){
		global $more;
		
		$options = $this->ts_portfolio_getoption();
		$version = $this->ts_portfolio_version();
		
		/*******************SHORTCODE PROPERTIES**********************/
		//Specify default attributes
		$this->defaultattr = array(
			"cat" => '',
			"col" => '3',
			"postperpage" => '8',
			"orderby" => 'date',
			"frame" => 'plain',
			"showdesc" => 'no',
			"showtitle" => 'no',
			"showmore"	=> 'no',
			"customclass" => '',
			"colspacing" => '',
			"rowspacing" => '',
			"moretext" => ''
		);
		
		//Set all frames that available.
		$this->frames = array("plain");
		$this->col = array(1,2,3,4,5);
		
		//Get the setting option value
		$this->longdesc 	= 500;
		
		$this->langval 		= "templatesquare";
		/*******************END SHORTCODE PROPERTIES**********************/
		
		$defattr = $this->defaultattr;

		//make all shortcode attributes into single variable
		extract(shortcode_atts($defattr, $atts));
		
		$more = 0;
		
		$readmoretext = ($moretext!="")? $moretext : $options["readmoretext"];
		
		//validate the postperpage, default value is -1.
		$postperpage = (is_numeric($postperpage)&& $postperpage >=-1)? $postperpage : -1;
		
		//validate the orderby, default value is 'date'
		$orderby = (strlen($orderby)<1)? $defattr["orderby"] : $orderby;
		$exporderby = explode(" ",$orderby);
		
		$orderby = strtolower($exporderby[0]);
		
		if(count($exporderby)>1){
			$order2 = strtoupper($exporderby[1]);
		}else{
			$order2 = "";
		}
				
		//validate the frame, default value is 'frame1'.
		$frame = (in_array($frame,$this->frames))? $frame : $defattr["frame"];
		$longdesc = $this->longdesc;
		
		//validates the column
		$col = (in_array($col,$this->col))? $col : $defattr["col"];
		
		$sizeinfo = $this->ts_portfolio_getthumbinfo($col);
		
		//validates the frame dimensions.
		$widthimg = $sizeinfo["width"];
		$heightimg = $sizeinfo["height"];
		
		$colspacing = (!is_numeric($colspacing) || $colspacing < 0)?  $sizeinfo["colspacing"] : $colspacing;
		$rowspacing = (!is_numeric($rowspacing) || $rowspacing < 0)?  $sizeinfo["rowspacing"] : $rowspacing;
		
		$framewidth = $widthimg;
		$frameheight = $heightimg;
		
		$thumbwidth 	= $framewidth;
		$thumbheight 	= $frameheight;
		$thumbname		= (isset($sizeinfo["namesize"]))?$sizeinfo["namesize"] : "";
		
		$paged = (get_query_var('paged'))? get_query_var('paged') : 1 ;
		
		//Get total of all posts from post type 'display'.
		$numposts = $this->ts_portfolio_getnumposts($cat);
		
		//Count the total page.
		$num_page = floor($numposts/$postperpage)+1;
		$num_page = ($numposts%$postperpage!=0)? $num_page : $num_page - 1; 

		//Get the post from the query.
		$catinclude = 'post_type=portfolio';
		$orderstr = "";
		
		if(strlen($cat)){
			$catinclude .= '&portfolio-category='.$cat;
		}
		if($order2!=""){
			$orderstr .= '&order='.$order2;
		}
		query_posts('&' . $catinclude .' &paged='.$paged.'&posts_per_page='.$postperpage.'&orderby='.$orderby.$orderstr);
		global $post;
		//make a appologies content if the posts is zero or null
		if ( ! have_posts() ){
			$error404 =  '<div id="post-0" class="post error404 not-found">
				<h1 class="entry-title">'.__( 'Not Found',$this->langval). '</h1>
				<div class="entry-content">
					<p>'.__( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.',$this->langval).'</p>
					';
			$error404 .= get_search_form();
			$error404 .= '
				</div>
			</div>';
			return $error404;
		}
		
		//generate the display HTML
		$htmldisp = "";
		$htmldisp .=	'
		<div id="ts-portfolio" class="'.$customclass.'">
			<ul class="ts-portfolio-list ts-portfolio-col-'.$col.'">
			';
			$i=1;
			$addclass = "";
			if (have_posts()){
				while ( have_posts() ){ 
					the_post(); 
					$stylelist = 'width:'.$framewidth.'px;';
					$rowsstyle = $rowspacing;
					$colsstyle = $colspacing;
					if(($i%$col) == 0 && $col){ 
						$colsstyle = 0;
					}
					$stylelist .= 'margin:0px '.$colsstyle.'px '.$rowsstyle.'px 0px;';
					$prefix = 'ts_';
					$custom = get_post_custom($post->ID);
					$cf_externallink = (isset($custom[$prefix."external-link"][0]))?$custom[$prefix."external-link"][0] : "";
					$cf_thumb = (isset($custom[$prefix."thumb"][0]))?$custom[$prefix."thumb"][0] : "";
					$cf_lightbox = (isset($custom[$prefix."lightbox"][0]))?$custom[$prefix."lightbox"][0] : "";
					$imginfos = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),$thumbname);
					
					if($cf_thumb!=""){
						$cf_thumb = '<img src="'.$cf_thumb.'" alt=""  width="'.$thumbwidth.'" height="'.$thumbheight.'" class="fade"/>';
					}elseif($imginfos[0]){
						$cf_thumb = '<img src="'.$imginfos[0].'" alt=""  width="'.$thumbwidth.'" height="'.$thumbheight.'" class="fade"/>';
					}else{
						$attachments = get_children( array(
						'post_parent' => $post->ID,
						'post_type' => 'attachment',
						'posts_per_page' => 1,
						'order' => '',
						'post_mime_type' => 'image')
						);
						if(count($attachments)!=0){
							foreach ( $attachments as $att_id => $attachment ) {
								$getimage = wp_get_attachment_image_src($att_id, 'portfolio-gallery', true);
								$portfolioimage = $getimage[0];
								$cf_thumb = '<img src="'.$portfolioimage.'" alt=""  width="'.$thumbwidth.'" height="'.$thumbheight.'" class="fade"/>';
							}
						}else{
							$cf_thumb = '<img src="'.get_template_directory_uri().'/images/noimage.jpg" alt=""  width="'.$thumbwidth.'" height="'.$thumbheight.'" class="fade"/>';
						}
					}

					$addancclass = "image";
					$addancclassimgsmall = "";
					
					if($thumbwidth<=150 || $thumbheight<=150){
						$addancclassimgsmall = " imagesmall";
					}
					
					$styleancimg = 'height:'.$thumbheight.'px; width:'.$thumbwidth.'px;';
					
					$htmlancimg = "";
					if($cf_externallink!=""){
						$htmlancimg .= '<a class="'.$addancclass.'" href="'.$cf_externallink.'" style="'.$styleancimg.'" title="'.__('Go to '.$cf_externallink.'','templatesquare').'">';
						$htmlancimg .= "<span class='rollover gotolink". $addancclassimgsmall. "'></span>";
						$htmlancimg .= "<span class='rounded-frame'></span>";
						$htmlancimg .= $cf_thumb;
						$htmlancimg .= "<span class='afterthumb'></span>";
						$htmlancimg .= '</a>';
					}
					elseif($cf_lightbox!=""){ 
						$htmlancimg .= '<a class="'.$addancclass.'" href="'.$cf_lightbox.'" style="'.$styleancimg.'" rel="wp-video-lightbox" title="'.get_the_title($post->ID).'">';
						$htmlancimg .= "<span class='rollover". $addancclassimgsmall. "'></span>";
						$htmlancimg .= "<span class='rounded-frame'></span>";
						$htmlancimg .= $cf_thumb;
						$htmlancimg .= "<span class='afterthumb'></span>";
						$htmlancimg .= '</a>';
					}else{ 
						$htmlancimg .= '<a class="'.$addancclass.'" style="'.$styleancimg.'" href="'.get_permalink($post->ID).'" title="'.__('Permanent Link to ',$this->langval).the_title_attribute('echo=0').'" >';
						$htmlancimg .= "<span class='rollover gotopost". $addancclassimgsmall. "''></span>";
						$htmlancimg .= "<span class='rounded-frame'></span>";
						$htmlancimg .= $cf_thumb;
						$htmlancimg .= "<span class='afterthumb'></span>";
						$htmlancimg .= '</a>';
					}
					
					$textdescription = "";
					if($showtitle=="yes"){
						$textdescription .= '<h2>'. get_the_title($post->ID).'</h2>';
					}
					if($showdesc=="yes"){
						$excerpt = get_the_excerpt();
						if($col==99){
							$textdescription .= ts_string_limit_words($excerpt,$longdesc);
						}else{
							$textdescription .='<p>'.ts_string_limit_char($excerpt,$longdesc).'</p>';
						}
						if($showmore=="yes"){
							if($cf_externallink!=""){
								$textdescription .='<a href="'.$cf_externallink.'" title="'.__('Go to '.$cf_externallink.'','templatesquare').'" rel="bookmark" class="displaymore">'.__($readmoretext,$this->langval).'</a>';
								}else{
								$textdescription .='<a href="'.get_permalink($post->ID).'" title="'.__( 'Permalink to ',$this->langval).the_title_attribute('echo=0').'" rel="bookmark" class="displaymore">'.__($readmoretext,$this->langval).'</a>';
							}
						}
					}
					if($textdescription!=""){
						$textdescription = '<div class="ts-portfolio-text-content">'.$textdescription.'</div>';
					}
					
					$displayclear = "";
					if($col==1){
						$displayclear .= '<div class="ts-portfolio-clear"></div>';
					}
					
					
					$htmldisp .= '<li class="'.$addclass.'" style="'.$stylelist.'">';
						$htmldisp .= '<div class="ts-portfolio-img-'.$frame.' ts-portfolio-img-container">';
							$htmldisp .= $htmlancimg;
						$htmldisp .= '</div>';
						$htmldisp .= $textdescription;
						$htmldisp .= $displayclear;
					$htmldisp .= '</li>';
					
					if($i%$col==0 && $col > 1){
						$htmldisp .= '</ul>
<ul class="ts-portfolio-list ts-portfolio-'.$frame.' ts-portfolio-col-'.$col.'">';
					}
					
					$i++;
					$addclass=""; 
				}//---------------end While(have_posts())--------------
			}//----------------end if(have_posts())-----------------
			
			$htmldisp .= '
				</ul>
				<div class="clr"></div>
			</div>
			<div class="separator line"></div>';
			
			if (  $num_page > 1 ){
				 if(function_exists('wp_pagenavi')) {
					 ob_start();
					 
					 wp_pagenavi();
					 $htmldisp .= ob_get_contents();
						 
					 ob_end_clean();
				 }else{
					$htmldisp .= '
					<div id="nav-below" class="navigation nav2">
						<div class="nav-previous">'.get_next_posts_link( __( '<span class="prev"><span class="meta-nav">&laquo;</span> Prev</span>', 'templatesquare' ) ).'</div>
						<div class="nav-next">'.get_previous_posts_link( __( '<span class="prev">Next <span class="meta-nav">&raquo;</span></span>', 'templatesquare' ) ).'</div>
					</div><!-- #nav-below -->';
				}
			}
			wp_reset_query();
			
			return $htmldisp;
	}
	
	/* Make a Display Post Type */
	function ts_portfolio_post_type() {
		register_post_type( 'portfolio',
					array( 
					'label' => __('Portfolio'), 
					'public' => true, 
					'show_ui' => true,
					'show_in_nav_menus' => true,
					'rewrite' => true,
					'hierarchical' => true,
					'menu_position' => 5,
					'supports' => array(
										 'title',
										 'editor',
										 'thumbnail',
										 'excerpt',
										 //'custom-fields',
										 'revisions')
						) 
					);
		register_taxonomy('portfolio-category', 'portfolio', array('hierarchical' => true, 'label' => __('Portfolio Categories'), 'singular_name' => 'Category'));
		
		  register_taxonomy('portfoliotag','portfolio',array('hierarchical' => false,'label' => __('Portfolio Tags'),'rewrite' => array( 'slug' => 'portfoliotag' ),
		  ));
	}
	
	function ts_portfolio_action_init(){
		
		$version = $this->ts_portfolio_version();
		// only hook up these filters if we're in the admin panel, and the current user has permission
		// to edit posts and pages
		if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
			add_filter('mce_buttons', array($this, 'ts_portfolio_filter_mce_button'));
			add_filter('mce_external_plugins',array($this, 'ts_portfolio_filter_mce_plugin'));
		}
		
		$basedisplayurl = get_template_directory_uri()."/";
		
		//Register jQuery and Pretty Photo plugin and use it
		wp_enqueue_script("prettyphoto", $basedisplayurl.'js/jquery.prettyPhoto.js', array('jquery'), "3.0");
		wp_enqueue_script("fade", $basedisplayurl.'js/ts-portfolio/fade.js', array('jquery'));
		wp_enqueue_script("ts-lightbox", $basedisplayurl.'js/ts-portfolio/ts-portfolio-lightbox.js', array('jquery'));
		wp_enqueue_script("cornerz", $basedisplayurl.'js/ts-portfolio/cornerz.js', array('jquery'));
		
		wp_register_style('ts-display-prettyPhoto', $basedisplayurl.'prettyPhoto.css', array(), "2.5.6");
		wp_enqueue_style('ts-display-prettyPhoto');
		
	}
	
	function ts_portfolio_filter_mce_button( $buttons ) {
		// add a separation before our button, here our button's id is "mygallery_button"
		array_push( $buttons, '|', 'ts_portfolio_button' );
		return $buttons;
	}
	
	function ts_portfolio_filter_mce_plugin( $plugins ) {
		
		// set ts-display folder url
		$basedisplayurl = get_template_directory_uri()."/";
		
		// this plugin file will work the magic of our button
		$plugins['ts_portfolio'] = $basedisplayurl . 'js/ts-portfolio/ts-portfolio-plugin.js';
		return $plugins;
	}
	
}
$ts_portfolio = new TS_Portfolio();



?>