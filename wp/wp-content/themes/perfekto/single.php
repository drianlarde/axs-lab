<?php
/**
 * The Template for dising all single posts.
 *
 * @package WordPress
 * @subpackage Perfekto
 * @since Perfekto 1.0
 */

get_header(); ?>
	<div id="content">
		<div id="main">
			<div id="maincontent">
			<?php if ( function_exists('yoast_breadcrumb') && !is_front_page() ) {
			yoast_breadcrumb('<div id="breadcrumbs">','</div>');
			} ?>
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php
				$custom = get_post_custom($post->ID);
				$cf_thumb = (isset($custom["thumb"][0]))? $custom["thumb"][0] : "";
				
				if($cf_thumb!=""){
					$cf_thumb = "<img src='" . $cf_thumb . "' alt='' width='589' height='328' class='imgborder'/>";
				}
			?>
			<?php if($cf_thumb!=""){ echo $cf_thumb; }else{ the_post_thumbnail( 'blog-post-thumbnail', array('class' => 'imgborder','alt' =>'', 'title' =>'') );} ?>
				
				<span class="entry-utility">
					<span class="date"><?php  the_time('M d, Y') ?>  |  <?php _e('Post by','templatesquare');?>: <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"> <?php the_author();?></a> </span><span class="comment"><?php comments_popup_link(__('No Comments', 'templatesquare'), __('1 Comments', 'templatesquare'), __('% Comments', 'templatesquare')); ?></span> <?php edit_post_link( __( 'Edit', 'templatesquare' ), '<span class="edit-link">&nbsp;-&nbsp;', '</span>' ); ?> 
				</span>
				
				<h2 class="posttitle"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'templatesquare' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						
						
				<div class="entry-content">
					<?php the_content( __( 'Read More', 'templatesquare' ) ); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'templatesquare' ), 'after' => '</div>' ) ); ?>
					<div class="clear"></div><!-- end clear float -->
				</div>
			</div><!-- end post -->
			<?php /* comments_template( '', true ); */ ?>
			<?php endwhile; // end of the loop. ?>
				<div class="clear"></div><!-- clear float -->
			</div><!-- end #maincontent -->
			
			<div id="side">
				<?php get_sidebar();?>
			</div><!-- end #side -->
			
		  <div class="clear"></div><!-- clear float -->
		  
		</div><!-- end #main -->
	</div><!-- end #content -->
<?php get_footer(); ?>
