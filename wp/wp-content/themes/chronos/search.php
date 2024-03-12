<?php
 global $theme_option;
 $textdoimain = 'chronos';
get_header(); ?>
<?php 
	// search only posts
	global $wp_query;
	$args = array_merge( $wp_query->query, array( 'post_type' => 'post' ) );
	query_posts( $args ); 
?>
<div id="blog">
    <div class="container">
        <div class="sixteen columns">
            <h1><span><?php printf( __( 'Search Results for: %s', $textdoimain ), get_search_query() ); ?></span></h1>
        </div>
    </div>
    <div class="clear"></div>
    <div class="container">
        <div class="twelve columns">
        <?php 
            while(have_posts()) : the_post();
            $params = array( 'width' => 700, 'height' => 385 );
            $image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );
            $video=get_post_meta(get_the_ID(),"_cmb_link_video",true);
            $image_video=get_post_meta(get_the_ID(),'_cmb_image_video', true);
            $style=get_post_meta(get_the_ID(),'_cmb_style_video', true);
            $audio=get_post_meta(get_the_ID(),'_cmb_link_audio', true);
            
            $format = get_post_format($post->ID);
            if($format=='video'){
        ?>                      
            <div class="blog-post" data-scrollreveal="enter bottom and move 150px over 1s">
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
                <h5><span><?php the_time('d.M');?></span> <?php the_title(); ?></h5>
                <?php if ( is_sticky() )
                 echo '<span class="featured-post">' . __( 'Sticky', 'horme' ) . '</span>';
                 ?>
                <div class="blog-post-sublinks"><?php echo esc_attr($theme_option['blog_posted']); ?> <?php the_time('d.M, h:m') ?>h <?php echo esc_attr($theme_option['blog_in']);?> <?php the_category(' '); ?> <?php echo esc_attr($theme_option['blog_by']); ?> <?php the_author_posts_link(); ?> - <a href="#"><?php comments_number( __('0 Comments', $textdoimain), __('1 Comments', $textdoimain), __('% Comments', $textdoimain) ); ?></a></div>
                <p><?php if(isset($theme_option['blog_excerpt']) && $theme_option['blog_excerpt'] != ''){ echo chronos_excerpt($theme_option['blog_excerpt']); }else{ echo chronos_excerpt(30); } ?></p>
                <a href="<?php the_permalink(); ?>"><div class="post-link"><?php echo esc_attr($theme_option['blog_readmore']); ?></div></a>
            </div>
        <?php }elseif($format == 'link'){ ?>
            <div class="blog-post link-post" data-scrollreveal="enter bottom and move 150px over 1s">
                <div class="blog-post-sublinks"><?php echo esc_attr($theme_option['blog_posted']); ?> <?php the_time('d.M, h:m') ?>h <?php echo esc_attr($theme_option['blog_in']);?> <?php the_category(' '); ?> <?php echo esc_attr($theme_option['blog_by']); ?> <?php the_author_posts_link(); ?> - <a href="#"><?php comments_number( __('0 Comments', $textdoimain), __('1 Comments', $textdoimain), __('% Comments', $textdoimain) ); ?></a></div>
                <a href="<?php the_permalink();?>"><h6><?php the_title(); ?></h6></a>
                <?php if ( is_sticky() )
                 echo '<span class="featured-post">' . __( 'Sticky', 'horme' ) . '</span>';
                 ?>
            </div>
        <?php }elseif($format == 'gallery'){ ?>
            <div class="blog-post" data-scrollreveal="enter bottom and move 150px over 1s"> 
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
                <h5><span><?php the_time('d.M');?></span> <?php the_title(); ?></h5>
                <?php if ( is_sticky() )
                 echo '<span class="featured-post">' . __( 'Sticky', 'horme' ) . '</span>';
                 ?>
                <div class="blog-post-sublinks"><?php echo esc_attr($theme_option['blog_posted']); ?> <?php the_time('d.M, h:m') ?>h <?php echo esc_attr($theme_option['blog_in']);?> <?php the_category(' '); ?> <?php echo esc_attr($theme_option['blog_by']); ?> <?php the_author_posts_link(); ?> - <a href="#"><?php comments_number( __('0 Comments', $textdoimain), __('1 Comments', $textdoimain), __('% Comments', $textdoimain) ); ?></a></div>
                <p><?php if(isset($theme_option['blog_excerpt']) && $theme_option['blog_excerpt'] != ''){ echo chronos_excerpt($theme_option['blog_excerpt']); }else{ echo chronos_excerpt(30); } ?></p>
                <a href="<?php the_permalink(); ?>"><div class="post-link"><?php echo esc_attr($theme_option['blog_readmore']); ?></div></a>
            </div>
        <?php }elseif($format == 'audio'){ ?>
            <div class="blog-post" data-scrollreveal="enter bottom and move 150px over 1s">
                <div class="audio-player">
                    <audio controls>
                        <source src="<?php echo esc_url($audio); ?>" type="audio/mpeg">
                    </audio> 
                </div>
                <h5><span><?php the_time('d.M');?></span> <?php the_title(); ?></h5>
                <?php if ( is_sticky() )
                 echo '<span class="featured-post">' . __( 'Sticky', 'horme' ) . '</span>';
                 ?>
                <div class="blog-post-sublinks"><?php echo esc_attr($theme_option['blog_posted']); ?> <?php the_time('d.M, h:m') ?>h <?php echo esc_attr($theme_option['blog_in']);?> <?php the_category(' '); ?> <?php echo esc_attr($theme_option['blog_by']); ?> <?php the_author_posts_link(); ?> - <a href="#"><?php comments_number( __('0 Comments', $textdoimain), __('1 Comments', $textdoimain), __('% Comments', $textdoimain) ); ?></a></div>
                <p><?php if(isset($theme_option['blog_excerpt']) && $theme_option['blog_excerpt'] != ''){ echo chronos_excerpt($theme_option['blog_excerpt']); }else{ echo chronos_excerpt(30); } ?></p>
                <a href="<?php the_permalink(); ?>"><div class="post-link"><?php echo esc_attr($theme_option['blog_readmore']); ?></div></a>
            </div>
        <?php }elseif($format == 'quote'){ ?>
            <div class="blog-post qu-post" data-scrollreveal="enter bottom and move 150px over 1s">
                <div class="blog-post-sublinks"><?php echo esc_attr($theme_option['blog_posted']); ?> <?php the_time('d.M, h:m') ?>h <?php echo esc_attr($theme_option['blog_in']);?> <?php the_category(' '); ?> <?php echo esc_attr($theme_option['blog_by']); ?> <?php the_author_posts_link(); ?> - <a href="#"><?php comments_number( __('0 Comments', $textdoimain), __('1 Comments', $textdoimain), __('% Comments', $textdoimain) ); ?></a></div>
                <a href="<?php the_permalink(); ?>"><h6><?php the_title(); ?></h6></a>
                <?php if ( is_sticky() )
                 echo '<span class="featured-post">' . __( 'Sticky', 'horme' ) . '</span>';
                 ?>
                <h5>- <?php the_author(); ?> -</h5>
            </div>
        <?php }else{ ?>
            <div class="blog-post" data-scrollreveal="enter bottom and move 150px over 1s">
                <img  src="<?php echo esc_attr($image); ?>" alt="" /> 
                <h5><span><?php the_time('d.M');?></span> <?php the_title(); ?></h5>
                <?php if ( is_sticky() )
                 echo '<span class="featured-post">' . __( 'Sticky', 'chronos' ) . '</span>';
                 ?>
                <div class="blog-post-sublinks"><?php echo esc_attr($theme_option['blog_posted']); ?> <?php the_time('d.M, h:m') ?>h <?php echo esc_attr($theme_option['blog_in']);?> <?php the_category(' '); ?> <?php echo esc_attr($theme_option['blog_by']); ?> <?php the_author_posts_link(); ?> - <a href="#"><?php comments_number( __('0 Comments', $textdoimain), __('1 Comments', $textdoimain), __('% Comments', $textdoimain) ); ?></a></div>
                <p><?php if(isset($theme_option['blog_excerpt']) && $theme_option['blog_excerpt'] != ''){ echo chronos_excerpt($theme_option['blog_excerpt']); }else{ echo chronos_excerpt(30); } ?></p>
                <a href="<?php the_permalink(); ?>"><div class="post-link"><?php echo esc_attr($theme_option['blog_readmore']); ?></div></a>
            </div>
        <?php }?>
            
        <?php endwhile; ?>
            <div class="bottom-link-wrap">
            <?php chronos_pagination(); ?>
            </div>
        </div>
        <div class="four columns">
            <div class="sidebar-wrapper">
                <?php get_sidebar();?>
            </div>
        </div>
    </div>  
</div>  
<?php get_footer(); ?>
