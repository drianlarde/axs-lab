		<?php
		$sliderType = get_option('templatesquare_slider_type');
		$sliderarrange = get_option('templatesquare_slider_arrange');
		$texturl = get_option('templatesquare_slider_texturl');
		?>

		<div id="header">
			<div id="slideshow">
				
				<?php if($sliderType=="fancyslider") { ?>
				
				
				<div id="slideshowHolder">
					<?php
						query_posts("post_type=slider&post_status=publish&posts_per_page=-1&order=" . $sliderarrange);
						while ( have_posts() ) : the_post();
					?>
					
					<?php
						$prefix = 'ts_';
						
						$custom = get_post_custom($post->ID);
						$cf_slideurl = (isset($custom[$prefix."slider-url"][0]))?$custom[$prefix."slider-url"][0] : "";
                                                $cf_sliderel = (isset($custom[$prefix."slider-rel"][0]))?$custom[$prefix."slider-rel"][0] : "";
						$cf_thumb = (isset($custom[$prefix."thumb"][0]))? $custom[$prefix."thumb"][0] : "";
						$sliderDisabletext= get_option('templatesquare_slider_disable_text');
						$cf_text = "";
					?>	
					
					<?php 
					if($sliderDisabletext!=true){
					
						$cf_text .= '<h1>'.get_the_title().'</h1>';
						$cf_text .= '<p>';
						$excerpt = get_the_excerpt(); 
						$cf_text .= ts_string_limit_words($excerpt,30);
						if($cf_slideurl!=""){
							$cf_text .= ' <a href="'.$cf_slideurl.'" rel="'.$cf_sliderel.'">'.__($texturl, 'templatesquare').'</a>';
						} 
						$cf_text .= '</p>';
					
					} 
					?>
					
				
					<?php if(has_post_thumbnail( get_the_ID()) || $cf_thumb!=""){ ?>		
						<?php 
							if($cf_thumb!=""){
								echo "<img src='" . $cf_thumb . "' alt='".$cf_text."'  width='940' height='370' />";
							}else{
								the_post_thumbnail( 'slider-home', array('alt' =>''.$cf_text.''));
							}
						?>
					<?php } ?>

					
					
					<?php endwhile; ?>
					<?php wp_reset_query();?>

				</div>

			
				
				<?php }else{ ?>
				
				<div id="s3slider">
					<ul id="s3sliderContent">
					
						<?php
							query_posts("post_type=slider&post_status=publish&posts_per_page=-1&order=" . $sliderarrange);
							while ( have_posts() ) : the_post();
						?>
						
						<?php
							$prefix = 'ts_';
							
							$custom = get_post_custom($post->ID);
							$cf_slideurl = (isset($custom[$prefix."slider-url"][0]))?$custom[$prefix."slider-url"][0] : "";
                                                         $cf_sliderel = (isset($custom[$prefix."slider-rel"][0]))?$custom[$prefix."slider-rel"][0] : "";
							$cf_thumb = (isset($custom[$prefix."thumb"][0]))? $custom[$prefix."thumb"][0] : "";
							$sliderDisabletext= get_option('templatesquare_slider_disable_text');
						?>	

						<li class="s3sliderImage">
						
						<?php if(has_post_thumbnail( get_the_ID()) || $cf_thumb!=""){ ?>		
							<?php 
								if($cf_thumb!=""){
									echo "<img src='" . $cf_thumb . "' alt=''  width='940' height='370' />";
								}else{
									the_post_thumbnail( 'slider-home' );
								}
							?>
						<?php } ?>
						
							<div>
							<?php if($sliderDisabletext!=true){?>
								<h1><?php the_title(); ?></h1>
								<p>
								<?php $excerpt = get_the_excerpt(); echo ts_string_limit_words($excerpt,30);?>
								<?php if($cf_slideurl!=""){?>
								<a href="<?php echo $cf_slideurl; ?>" rel="<?php echo $cf_sliderel; ?>"><?php _e($texturl, 'templatesquare');?></a>
								<?php } ?> 
								</p>
							<?php } ?>
							</div>
						</li>
						<?php endwhile; ?>
						<?php wp_reset_query();?>
						<li class="clear s3sliderImage"></li>
					</ul>
				</div>
				
				
				<?php } ?>
				
				
			</div>
		</div><!-- end #header -->