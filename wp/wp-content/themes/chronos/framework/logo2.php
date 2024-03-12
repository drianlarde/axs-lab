<?php
$root =dirname(dirname(dirname(dirname(dirname(__FILE__)))));
//echo $root; 
if ( file_exists( $root.'/wp-load.php' ) ) {
    require_once( $root.'/wp-load.php' );
} elseif ( file_exists( $root.'/wp-config.php' ) ) {
    require_once( $root.'/wp-config.php' );
}
header("Content-type: text/css; charset=utf-8");
global $theme_option; 
?>
/* Color Theme - Amethyst /Violet/

/**** Custom logo ****/
.logo{
	width: <?php echo $theme_option['logo_width_dark']; ?>;
	height: <?php echo $theme_option['logo_height_dark']; ?>;
    <?php if($theme_option['logo_dark']['url'] != ''){ ?>
	background: url('<?php echo $theme_option['logo_dark']['url']; ?>') no-repeat center center;
    <?php }?>
	background-size: <?php echo $theme_option['logo_width_dark']; ?> <?php echo $theme_option['logo_height_dark']; ?>;
}
.cbp-af-header.cbp-af-header-shrink .logo{
	width: <?php echo $theme_option['logo2_width_dark']; ?>;
	height: <?php echo $theme_option['logo2_height_dark']; ?>;
    <?php if($theme_option['logo2_dark']['url'] != ''){ ?>
	background: url('<?php echo $theme_option['logo2_dark']['url']; ?>') no-repeat center center;
    <?php }?>
	background-size: <?php echo $theme_option['logo2_width_dark']; ?> <?php echo $theme_option['logo2_height_dark']; ?>;
}