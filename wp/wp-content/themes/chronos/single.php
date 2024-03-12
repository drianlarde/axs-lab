<?php
 global $theme_option;
 $textdoimain = 'chronos';
get_header(); 
?>
<?php while(have_posts()) : the_post(); 
$params = array( 'width' => 700, 'height' => 385 );
$image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );
$video=get_post_meta(get_the_ID(),"_cmb_link_video",true);
$image_video=get_post_meta(get_the_ID(),'_cmb_image_video', true);
$style=get_post_meta(get_the_ID(),'_cmb_style_video', true);
$audio=get_post_meta(get_the_ID(),'_cmb_link_audio', true);
$link=get_post_meta(get_the_ID(),'_cmb_link_link', true);
?>
<?php  $format = get_post_format($post->ID);?>
<div id="blog">
	<div class="container">
		<div class="sixteen columns">
			<h1 class="padding-post"><span><?php echo the_title(); ?></span></h1>
		</div>
	</div>
	<div class="clear"></div>
	<div class="container">
		<div class="twelve columns">
			<div class="blog-post">
				<?php if($format == 'video'){ ?>
					<?php if($style == 'yes'){ ?>
				<div onclick="thevid=document.getElementById('thevideo'); thevid.style.display='block'; this.style.display='none'">
					<img src="<?php if($image_video != ''){ echo esc_url($image_video);}else{ echo get_template_directory_uri();?>/images/projects/27.jpg <?php }?>" style="cursor:pointer" alt=""/>
				</div>
				<?php if(isset($video) && $video != ''){ ?>
				<div id="thevideo" class="video">
					<iframe width="940" height="529" src="<?php echo esc_url($video); ?>?wmode=transparent"></iframe>
				</div>
					<?php }else{} 
					}elseif($style == 'no'){ ?>
						<?php if(isset($video) && $video != ''){ ?>
					<div class="videonot">
						<iframe width="940" height="529" src="<?php echo esc_url($video); ?>?wmode=transparent"></iframe>	
					</div>		
						<?php }else{} ?>		
					<?php } ?>
				
				<?php	}elseif($format == 'gallery'){ ?>
				<ul class="bxslider">
					<?php $gallery = get_post_gallery( get_the_ID(), false );
		 			  	  if(isset($gallery['ids'])){  
					      $gallery_ids = $gallery['ids'];
					      $img_ids = explode(",",$gallery_ids);
						  $i=0;
							
					        foreach( $img_ids AS $img_id ){
					        $image_src = wp_get_attachment_image_src($img_id,''); 
							$i++;	
					        ?>
					      <li><img src="<?php echo esc_url($image_src[0]); ?>" alt="<?php the_title(); ?>"></li>
						 
					 <?php }
					 } ?>
				</ul>
				<?php }elseif($format == 'audio'){ ?> 
					<div class="audio-player">
						<audio controls>
							<source src="<?php echo esc_url($audio); ?>" type="audio/mpeg">
						</audio> 
					</div>
				<?php }elseif($format == 'link'){ ?> 
				<div class="blog-post link-post" data-scrollreveal="enter bottom and move 150px over 1s">
					<a href="<?php echo esc_url($link);?>"><h6><?php the_title(); ?></h6></a>
				</div>
				<?php }elseif($format == 'quote'){ ?> 
				<div class="blog-post qu-post" data-scrollreveal="enter bottom and move 150px over 1s">					
					<a href="<?php the_permalink(); ?>"><h6><?php the_title(); ?></h6></a>
					<h5>- <?php the_author(); ?> -</h5>
				</div>
				<?php }else{ ?>
				<img  src="<?php echo esc_attr($image); ?>" alt="" /> 
				<?php }?>
				<div class="blog-post-sublinks padding-links"><?php echo esc_attr($theme_option['blog_posted']); ?> <?php the_time('d.M, h:m') ?>h <?php echo esc_attr($theme_option['blog_in']);?> <?php the_category(' '); ?> <?php echo esc_attr($theme_option['blog_by']); ?> <?php the_author_posts_link(); ?> - <a href="#"><?php comments_number( __('0 Comments', $textdoimain), __('1 Comments', $textdoimain), __('% Comments', $textdoimain) ); ?></a></div>
				<?php the_content();
				wp_link_pages();
				 ?>
				 <?php
					if(get_the_tag_list()) {
						echo get_the_tag_list('<div class="tagss" rel="tag" href="#">',' ','</div>');
					}
				?>
			</div>
			<?php comments_template();?>
		</div>
		<div class="four columns">
			<div class="sidebar-wrapper">
			<?php get_sidebar();?>
			</div>
		</div>
	</div>	
</div>
<?php endwhile; ?>

				
<?php
get_footer();
?>						
