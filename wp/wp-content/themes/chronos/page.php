<?php
/**
 * The template for displaying all pages
 */

get_header(); ?>
	<?php
		// Start the Loop.
		while ( have_posts() ) : the_post(); ?>
			
<div id="blog">
	<div class="container">
		<div class="sixteen columns">
				<h1><span><?php the_title(); ?></span></h1>
	    </div>
	</div>
	<div class="container">
		<div class="twelve columns">            
			<div class="blog-post">
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
					<?php if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail(); ?>
					<?php }?>
					<?php the_content();?>
					
					<?php wp_link_pages(); ?>
				</div>
			</div>
			<?php endwhile; ?>						
		</div>
		<div class="four columns">
			<div class="sidebar-wrapper">
				<?php get_sidebar();?>
			</div>
		</div>
	</div>	
	
</div>		

<?php
get_footer();
