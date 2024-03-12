<?php 
/*
 *  The template for displaying Archive pages
 */
$textdoimain = 'chronos';
get_header();?>
<!--Portfolio section-->

	<div class="clear"></div>

	<div class="portfolio"></div>


	<div class="expander-wrap relative">
		<div id="expander-wrap">
			<p class="cls-btn"><a class="close">X</a></p>
			<div class="expander-inner"></div>
		</div>
	</div>


	<div class="clear"></div>

	
	<div class="container">
		<div class="sixteen columns">
			<div id="portfolio-filter">
				<ul id="filter">
					<li><a href="#" class="current" data-filter="*" title="">All</a></li>
					<?php 
					$categories = get_terms('categories');   
	    				foreach( (array)$categories as $categorie){
	    					$cat_name = $categorie->name;
	    					$cat_slug = $categorie->slug;
					?>
					<li><a href="#" data-filter=".<?php echo esc_attr($cat_slug); ?>" title=""><?php echo esc_attr($cat_name); ?></a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
	<ul class="portfolio-wrap">
	<?php 
		$args = array(   
			'post_type' => 'portfolio',   
			'posts_per_page' => -1,
		);  
		$wp_query = new WP_Query($args);
		while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
		$cates = get_the_terms(get_the_ID(),'categories');
		$cate_name ='';
		$cate_slug = '';
			  foreach((array)$cates as $cate){
				if(count($cates)>0){
					$cate_name .= $cate->name.' ' ;
					$cate_slug .= $cate->slug .' ';     
				} 
		}
        $params=array('width' => 341,'height' => 227);
        $image=bfi_thumb(wp_get_attachment_url(get_post_thumbnail_id()),$params); 
        if(get_post_meta(get_the_ID(),'_cmb_style_portf', true) == 'ajax'){
	?>
		<li class="portfolio-box <?php echo esc_attr($cate_slug); ?>">	
			<a class="expander" href="<?php the_permalink(); ?>" title="">
				<img  src="<?php echo esc_url($image); ?>" alt="" />	
				<div class="mask"></div>
				<h4><?php the_title(); ?></h4>
			</a>	
		</li>
	<?php }
		if(get_post_meta(get_the_ID(),'_cmb_style_portf', true) == 'popup'){?>
		<li class="portfolio-box <?php echo esc_attr($cate_slug); ?>">	
			<a class="iframe group1" href="<?php the_permalink();?>" title="">
				<img  src="<?php echo esc_url($image); ?>" alt="" />	
				<div class="mask"></div>
				<h4><?php the_title(); ?></h4>
			</a>	
		</li>
	<?php  }
		endwhile;	
	?>
	</ul>					

	<div class="clear"></div>

<?php get_footer(); ?>