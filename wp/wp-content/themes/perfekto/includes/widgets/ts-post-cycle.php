<?php
// =============================== TS Post Cycle widget ======================================
class TS_PostCycleWidget extends WP_Widget {
    /** constructor */
	function TS_PostCycleWidget() {
		$widget_ops = array('classname' => 'widget_ts_post_cycle', 'description' => __('TS - Post Cycle','templatesquare') );
		$this->WP_Widget('ts-post-cycle', __('TS - Post Cycle','templatesquare'), $widget_ops);
	}


    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
		
		$instance['title'] = (isset($instance['title']))? $instance['title'] : "";
		$instance['limit'] = (isset($instance['limit']))? $instance['limit'] : "";
		$instance['cat'] = (isset($instance['cat']))? $instance['cat'] : "";
		$instance['posttype'] = (isset($instance['posttype']))? $instance['posttype'] : "";
		$instance['effect'] = (isset($instance['effect']))? $instance['effect'] : "";
		
        $title = apply_filters('widget_title', $instance['title']);
		$limit = apply_filters('widget_title', $instance['limit']);
		$cat = apply_filters('widget_title', $instance['cat']);
		$posttype = apply_filters('widget_posttype', $instance['posttype']);
		$effect = apply_filters('widget_effect', $instance['effect']);
		
		if($effect=="fade"){
		$boxslideshow="boxslideshow";
		}else{
		$boxslideshow="boxslideshow2";
		}
        ?>
		

              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title .'<a class="next"></a><a class="prev"></a>'. $after_title; ?>
						
						<?php if($posttype=="testimonial"){?>
						<div class="textwidget">
							<div class="<?php echo $boxslideshow; ?>">
								
								<?php 
									$limittext = $limit;
									global $more;	$more = 0;
									query_posts('post_type=testimonial&testimonial-category='.$cat .'&showposts=-1');
									global $post;
									
									while (have_posts()) : the_post(); 
										$prefix ='ts_';
										$custom = get_post_custom($post->ID);
										$tbname = (isset($custom[$prefix."testi-name"][0]))?$custom[$prefix."testi-name"][0] : "";
										$tbinfo = (isset($custom[$prefix."testi-info"][0]))?$custom[$prefix."testi-info"][0] : "";
								?>
								
								<div class="cycle">

								<?php if($limittext=="" || $limittext==0){ ?>
									
									<div class="quote">
									<?php the_excerpt(); ?>
									 </div>
									 <div class="name-testi">
									 <span class="user"><?php echo $tbname; ?></span>
									 <br style="line-height:4px" /><?php echo $tbinfo; ?>
									 </div>
								<?php }else{ ?>
									
									<div class="quote">
									<?php $excerpt = get_the_excerpt(); echo ts_string_limit_words($excerpt,$limittext).'... ';?>
									 </div>
									 <div class="name-testi">
									 <span class="user"><?php echo $tbname; ?></span>
									 <br style="line-height:4px" /><?php echo $tbinfo; ?></div>
								<?php } ?>
								</div>
								<?php endwhile; ?>
								<?php wp_reset_query();?>
							</div>
							<!-- end of boxslideshow -->
						</div>
						
						<?php } else { ?>
						
						<div class="textwidget">
						
							<div class="<?php echo $boxslideshow; ?>">
								<?php $limittext = $limit;?>
								<?php global $more;	$more = 0;?>
							
								<?php 
									if($posttype=="portfolio") { 
										query_posts('&portfolio-category='.$cat .'&showposts=-1');
									} else { 
										query_posts("category_name=" . $cat);
									}
									global $post;
								?>
								
								<?php while (have_posts()) : the_post(); ?>	
								<?php
									$prefix ='ts_';
									$custom = get_post_custom($post->ID);
									$cf_thumb =  (isset($custom[$prefix."thumb-cycle"][0]))?$custom[$prefix."thumb-cycle"][0] : "";
									$cf_externallink = (isset($custom[$prefix."external-link"][0]))?$custom[$prefix."external-link"][0] : "";
									
									if($cf_thumb!=""){
										$cf_thumb = "<img src='" . $cf_thumb . "' alt=''  width='300' height='120' />";
									}
								?>	
								<div class="cycle">
									<?php 
									if($cf_thumb!=""){ echo $cf_thumb; } 
									if($cf_externallink!=""){$golink=$cf_externallink;}else{$golink=get_permalink();}
									?>
									
									<span class="wdt-title"><a href="<?php echo $golink; ?>"><?php the_title();?></a></span>
									<?php if($limittext=="" || $limittext==0){
									the_excerpt();
									}else{
									$excerpt = get_the_excerpt(); echo ts_string_limit_words($excerpt,$limittext).'... ';
									?>
									<?php } ?>
								</div>
								<?php endwhile; ?>
								<?php wp_reset_query();?>
							</div>
							<!-- end of boxslideshow -->
							</div>
							<?php }?>
              <?php echo $after_widget; ?>
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
        $title = (isset($instance['title']))? esc_attr($instance['title']) : "";
		$limit = (isset($instance['limit']))? esc_attr($instance['limit']) : "";
		$cat = (isset($instance['cat']))? esc_attr($instance['cat']) : "";
		$posttype = (isset($instance['posttype']))? esc_attr($instance['posttype']) : "";
		$effect = (isset($instance['effect']))? esc_attr($instance['effect']) : "";
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'templatesquare'); ?> 
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
			
 <p><label for="<?php echo $this->get_field_id('limit'); ?>"><?php _e('Limit Text:', 'templatesquare'); ?> 
 <input class="widefat" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="text" value="<?php echo $limit; ?>" /></label></p>
 			
            <p><label for="<?php echo $this->get_field_id('posttype'); ?>"><?php _e('Post Type:', 'templatesquare'); ?><br />

		<select id="<?php echo $this->get_field_id('posttype'); ?>" name="<?php echo $this->get_field_name('posttype'); ?>" style="width:150px;" > 
		<option value="testimonial" <?php echo ($posttype === 'testimonial' ? ' selected="selected"' : ''); ?>><?php _e('Testimonial','templatesquare');?></option>
		<option value="portfolio" <?php echo ($posttype === 'portfolio' ? ' selected="selected"' : ''); ?> ><?php _e('Portfolio','templatesquare');?></option>
		<option value="" <?php echo ($posttype === '' ? ' selected="selected"' : ''); ?>><?php _e('Default','templatesquare');?></option>
		</select>
			</label></p>
			
 <p><label for="<?php echo $this->get_field_id('cat'); ?>"><?php _e('Category:', 'templatesquare'); ?> 
 <input class="widefat" id="<?php echo $this->get_field_id('cat'); ?>" name="<?php echo $this->get_field_name('cat'); ?>" type="text" value="<?php echo $cat; ?>" /></label></p>
 
  <p><label for="<?php echo $this->get_field_id('effect'); ?>"><?php _e('Effect:', 'templatesquare'); ?> <br />
 		<select id="<?php echo $this->get_field_id('effect'); ?>" name="<?php echo $this->get_field_name('effect'); ?>" style="width:150px;" > 
		<option value="fade" <?php echo ($effect === 'fade' ? ' selected="selected"' : ''); ?>>Fade</option>
		<option value="scroll" <?php echo ($effect === 'scroll' ? ' selected="selected"' : ''); ?> >Scroll</option>
		</select>

 </label></p>
			
        <?php 
    }

} // class Cycle Widget


?>