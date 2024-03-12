<?php 
while(have_posts()) : the_post(); 
$video=get_post_meta(get_the_ID(),"_cmb_portfolio_video",true);
$image_video=get_post_meta(get_the_ID(),'_cmb_portfolio_img', true);
$style=get_post_meta(get_the_ID(),'_cmb_style_portfolio', true);
$bg_imgae= get_post_meta(get_the_ID(),'_cmb_single_img', true);
$scroll_st=get_post_meta(get_the_ID(),'_cmb_style_scroll', true);
$format = get_post_format($post->ID);

if(get_post_meta(get_the_ID(),'_cmb_style_portf', true) == 'popup'){
	get_header('single');
}
?>
<?php if(get_post_meta(get_the_ID(),'_cmb_style_portf', true) == 'ajax'){ ?>
	<div id="project-single-slider">


		<div class="clear"></div>
		
		<div id="last-work">
			<div class="container">
				<div class="sixteen columns">
					<h2><?php the_title(); ?></h2>	
				</div>
				<div class="clear"></div>
				<div class="eight columns">
					<img  src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt="" />	
				</div>
				<div class="eight columns" data-scrollreveal="enter left and move 150px over 2s">
					<?php the_content();
					wp_link_pages(); ?>
				</div>
			</div>
		</div>
		
		<div class="clear"></div>
		
		<div id="slider-wrap">
			<div class="container">
				<div class="sixteen columns">
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
					
					<?php }elseif($format == 'gallery'){ ?> 
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
					<?php }else{ ?> 
						<img  src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt="" />
					<?php } ?> 
				</div>
			</div>
		</div>

	</div>	
<?php }elseif(get_post_meta(get_the_ID(),'_cmb_style_portf', true) == 'popup'){ ?>
	<?php if($format == 'video'){ ?>
<div id="project-single-video">
	<div id="single-portfolio">
				
		<div id="sep9">
			<div class="parallax9" <?php if ( $bg_imgae != '' ) { ?>style="background: url('<?php echo $bg_imgae; ?>') repeat fixed;" <?php } ?>></div>
			<div class="container z-index">
				<div class="sixteen columns" data-scrollreveal="enter top and move 150px over 2s">
					<h1><?php the_title(); ?></h1>
				</div>
			</div>
		</div>	

		<div class="clear"></div>
		
		<div id="last-work">
			<div class="container">
				<div class="eight columns" data-scrollreveal="enter bottom and move 550px over 3s">
					<img  src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt="" />	
				</div>
				<div class="eight columns" data-scrollreveal="enter left and move 150px over 2s">
					<?php the_content(); 
						wp_link_pages();?>
				</div>
			</div>
		</div>
		
		<div class="clear"></div>
		
		<div id="slider-wrap" class="padding-project">
			<div class="container">
				<div class="sixteen columns">
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
				</div>
			</div>
		</div>
		<?php get_footer('single');?>			
	</div>
</div>
	<?php }elseif($format == 'gallery'){  ?>
<div id="project-single-slider">

	<div id="single-portfolio">
		<div id="sep8">
			<div class="parallax8" <?php if ( $bg_imgae != '' ) { ?>style="background: url('<?php echo $bg_imgae; ?>') repeat fixed;" <?php } ?>></div>
			<div class="container z-index">
				<div class="sixteen columns" data-scrollreveal="enter top and move 150px over 2s">
					<h1><?php the_title(); ?></h1>
				</div>
			</div>
		</div>	

		<div class="clear"></div>
		
		<div id="last-work">
			<div class="container">
				<div class="eight columns" data-scrollreveal="enter bottom and move 550px over 3s">
					<img  src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt="" />	
				</div>
				<div class="eight columns" data-scrollreveal="enter left and move 150px over 2s">
					<?php the_content(); 
						wp_link_pages();?>
				</div>
			</div>
		</div>
		
		<div class="clear"></div>
		
		<div id="slider-wrap" class="padding-project">
			<div class="container">
				<div class="sixteen columns">
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
				</div>
			</div>
		</div>
		<?php get_footer('single');?>	
	
	</div>		
</div>	
	<?php }else{ 
		if($scroll_st == 'yes'){ ?>
	<div class="project-info">
		<h6><?php the_title(); ?></h6>
		<p><?php echo chronos_excerpt(10); ?></p>
	</div>		
	

	<div class="wrapper">
		<div class="main">
			<?php $gallery = get_post_gallery( get_the_ID(), false );
			  	  if(isset($gallery['ids'])){  
			      $gallery_ids = $gallery['ids'];
			      $img_ids = explode(",",$gallery_ids);
				  $i=0;
					
			        foreach( $img_ids AS $img_id ){
			        $image_src = wp_get_attachment_image_src($img_id,''); 
					$i++;	
			        ?>
				 	<section id="project-image<?php echo esc_attr($i); ?>" style="background: url('<?php echo esc_url($image_src[0]); ?>') repeat center center;">
						<div class="just_pattern" style="opacity:.3;"></div>
						<div class="just_pattern11"></div>
						<?php if($i==1){ ?>
						<div class="scroll-btn navigation"><p>scroll</p>
							<input type="button" style="opacity:0;" value="Jump to 1" data-target="1" />
						</div>	
						<?php }else{}?>		
					</section>
			 <?php  }
			 }else{ ?> 
			 <h6>Please Add Gallerry in Single Portfolio.</h6>
			 <?php } ?>
		
		</div>
	</div>
	<style type="text/css">		
		body {
		      height: 100%;
		 }		
	</style>
	<?php get_footer('single'); ?>
		<?php }elseif($scroll_st == 'no') { ?> 
		<div id="project-single-slider">

			<div id="single-portfolio">
				<div id="sep8">
					<div class="parallax8" <?php if ( $bg_imgae != '' ) { ?>style="background: url('<?php echo $bg_imgae; ?>') repeat fixed;" <?php } ?>></div>
					<div class="container z-index">
						<div class="sixteen columns" data-scrollreveal="enter top and move 150px over 2s">
							<h1><?php the_title(); ?></h1>
						</div>
					</div>
				</div>	

				<div class="clear"></div>
				
				<div id="last-work">
					<div class="container">
						<div class="eight columns" data-scrollreveal="enter bottom and move 550px over 3s">
							<img  src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt="" />	
						</div>
						<div class="eight columns" data-scrollreveal="enter left and move 150px over 2s">
							<?php the_content(); 
								wp_link_pages();?>
						</div>
					</div>
				</div>
				
				<div class="clear"></div>
				
				<div id="slider-wrap" class="padding-project">
					<div class="container">
						<div class="sixteen columns">
							<img  src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt="" />
						</div>
					</div>
				</div>
				<?php get_footer('single');?>	
			
			</div>		
		</div>
		<?php } ?>
	
	<?php }?>
<?php }?>
<?php endwhile; 
?>