<?php
/**
 * The Template for displaying all single posts.
 *
 * @package 
 * @subpackage Perfekto
 * @since Perfekto 1.0
 */
get_header(); ?>
	<div id="content">
		<div id="main">
				<?php if ( function_exists('yoast_breadcrumb') && !is_front_page() ) {
				yoast_breadcrumb('<div id="breadcrumbs">','</div>');
				} ?>
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				
				<?php
					$prefix = 'ts_';
					
					$custom = get_post_custom($post->ID);
					$cf_disableclientinfo = (isset($custom[$prefix."disable-clientinfo"][0]))?$custom[$prefix."disable-clientinfo"][0] : "";
					$cf_clienturl = (isset($custom[$prefix."client-url"][0]))?$custom[$prefix."client-url"][0] : "";
					$cf_client = (isset($custom[$prefix."client"][0]))?$custom[$prefix."client"][0] : "";
					$cf_clientshortdesc = (isset($custom[$prefix."client-shortdesc"][0]))?$custom[$prefix."client-shortdesc"][0] : "";
					$cf_lightbox = (isset($custom[$prefix."lightbox"][0]))?$custom[$prefix."lightbox"][0] : "";
					
					$attachments = get_children( array(
						'post_parent' => $post->ID,
						'post_type' => 'attachment',
						'order' => '',
						'post_mime_type' => 'image')
						);            
					
					
				?>	
				
				<?php if($cf_disableclientinfo!=true){ ?>
				
						<?php if(count($attachments)!=0){ ?>
						
						<div id="portfolio-gallery">
							<div id="frame-slider-portfolio" class="imgborder">
								<ul id="slider">
									<?php 
									 foreach ( $attachments as $att_id => $attachment ) {
									$getimage = wp_get_attachment_image_src($att_id, 'portfolio-gallery', true);
									$portfolioimage = $getimage[0];
									echo '<li><a href="'.$cf_lightbox.'" rel="wp-video-lightbox"><img src="'.$portfolioimage.'" alt="" /></a></li>';
									 }
									?>
								</ul><!-- end #slider -->
								<div id="slide-nav">
									<div id="pager"></div>
								</div><!-- end #slide-nav -->
							</div><!-- end #farme-slider-portfolio -->
						</div> 
						
						<?php } ?>
						
						<?php
						echo '<h2 class="titleportfolio">'.get_the_title().'</h2>';
						if($cf_clienturl!=""){ echo '<div class="clienturl"><a href="'.$cf_clienturl.'">'.$cf_clienturl.'</a></div><br />'; } 
						
						echo '<p>'.$cf_clientshortdesc.'</p>';
						
						if($cf_client!=""){echo '<p><strong>'.__('Client','templatesquare').'</strong><br />'.$cf_client.'</p>';}
						
						echo '<p>';
							$taglist = get_the_term_list( $post->ID, 'portfoliotag', '<strong>Tags:</strong> <br/>', ', ', '' );
							echo $taglist;
						 echo'</p>';
						 ?>
						<div class="clear"></div><!-- clear float -->
				
				 <?php } ?>
	
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
						<?php the_content( __( 'Read More', 'templatesquare' ) ); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'templatesquare' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'templatesquare' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				</div><!-- #post -->
				
				<?php endwhile; ?>
		  <div class="clear"></div><!-- clear float -->
		</div><!-- end #main -->
	</div><!-- end #content -->
<?php get_footer(); ?>