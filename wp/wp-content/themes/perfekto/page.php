<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Perfekto
 * @since Perfekto 1.0
 */

get_header(); ?>
	<div id="content">
		<div id="main">
		
			<div id="maincontent">
				<?php
				if(!is_front_page()){
					get_template_part( 'title' );
				}
				 ?>
				<?php if ( function_exists('yoast_breadcrumb') && !is_front_page() ) {
				yoast_breadcrumb('<div id="breadcrumbs">','</div>');
				} ?>
				
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
						<?php the_content( __( 'Read More', 'templatesquare' ) ); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'templatesquare' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'templatesquare' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				</div><!-- #post -->
	
				<?php comments_template( '', true ); ?>
	
				<?php endwhile; ?>
				<div class="clear"></div><!-- clear float -->
			</div><!-- end #maincontent -->
			
			<div id="side">
				<?php get_sidebar('page');?>
			</div><!-- end #side -->
			
		  <div class="clear"></div><!-- clear float -->
		  
		</div><!-- end #main -->
	</div><!-- end #content -->
<?php get_footer(); ?>
