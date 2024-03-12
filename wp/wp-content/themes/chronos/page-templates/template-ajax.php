<?php
/*
 * Template Name: Home Light
 * Description: A Page Template with a Page Builder design.
 */
$textdoimain = 'chronos';
get_header('home'); ?>

<?php if (have_posts()){ ?>
	
		<?php while (have_posts()) : the_post()?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	
	<?php }else {
		echo 'Page Ajax For Page Builder'; 
	}?>

<?php get_footer(); ?>