<?php
/**
 * The template for displaying 404 pages (Not Found)
 */
global $theme_option; 
get_header(); ?>
<div id="blog">
	<div class="container">
        
        <div class="line"></div>
        <div class="home-big-text"><?php if($theme_option['404_title'] != ''){ echo esc_attr($theme_option['404_title']);}else{echo "404";} ?></div>   
        <div class="home-small-text"><?php if($theme_option['404_content'] != ''){ echo esc_attr($theme_option['404_content']);}else{} ?>
        </br></br><a id="notfound" href="<?php echo home_url(); ?>">BACK TO HOME</a>
        </div>   
    </div>
</div>
<?php
get_footer();
