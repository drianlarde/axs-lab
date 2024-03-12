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
.big-text span{ 
	border-left:3px solid <?php echo esc_attr($theme_option['main-color']); ?>;
	border-right:3px solid <?php echo esc_attr($theme_option['main-color']); ?>;
}
ul.slimmenu li a:hover {
    border-bottom:1px solid <?php echo esc_attr($theme_option['main-color']); ?>;
}
ul.slimmenu li ul li a:hover {
    border-bottom:1px solid <?php echo esc_attr($theme_option['main-color']); ?>;
}
.list-social li.icon-soc a {
	color: <?php echo esc_attr($theme_option['main-color']); ?>;
}
.line-drawing path {
	stroke: <?php echo esc_attr($theme_option['main-color']); ?>;
}
h1 span:before  {
	color: <?php echo esc_attr($theme_option['main-color']); ?>;
}
h1 span:after  {
	color: <?php echo esc_attr($theme_option['main-color']); ?>;
}
.team-social li.icon-team a {
	color:<?php echo esc_attr($theme_option['main-color']); ?>;
}
.facts-wrap-num{
	color:<?php echo esc_attr($theme_option['main-color']); ?>;
}  
.portfolio-box h4{ 
	color:<?php echo esc_attr($theme_option['main-color']); ?>;
}
#action p {
	color:<?php echo esc_attr($theme_option['main-color']); ?>;
}
.pace .pace-progress {
  background: <?php echo esc_attr($theme_option['main-color']); ?>;
}
.pace .pace-progress-inner {
  box-shadow: 0 0 10px #3498db, 0 0 5px <?php echo esc_attr($theme_option['main-color']); ?>;
}
.pace .pace-activity {
  border-top-color: <?php echo esc_attr($theme_option['main-color']); ?>;
  border-left-color: <?php echo esc_attr($theme_option['main-color']); ?>;
}
.icon-left1{
	color:<?php echo esc_attr($theme_option['main-color']); ?>;
}
.icon-right1{
	color:<?php echo esc_attr($theme_option['main-color']); ?>;
}
.services-offer .services-icon{
	color:<?php echo esc_attr($theme_option['main-color']); ?>;
}
.services-offer .services-link:hover{
	background:<?php echo esc_attr($theme_option['main-color']); ?>;
}
.featured{
	border-top:3px solid <?php echo esc_attr($theme_option['main-color']); ?>;
}
.services-offer:hover{
	border-top:3px solid <?php echo esc_attr($theme_option['main-color']); ?>;
}
.icon-contact1{
	color:<?php echo esc_attr($theme_option['main-color']); ?>;
} 
.icon-footer{
	color:<?php echo esc_attr($theme_option['main-color']); ?>;
}
.icon-test  {
	color:<?php echo esc_attr($theme_option['main-color']); ?>;
} 
.bx-wrapper .bx-controls-direction a {
	background-color:<?php echo esc_attr($theme_option['main-color']); ?>;
}
#footer .back-top{
	color:<?php echo esc_attr($theme_option['main-color']); ?>;
}
.big-text span {
	border-left: 3px solid <?php echo esc_attr($theme_option['main-color']); ?>;
	border-right: 3px solid <?php echo esc_attr($theme_option['main-color']); ?>;
}
.blog-post-sublinks a {
	color: <?php echo esc_attr($theme_option['main-color']); ?>;
}
.post-link:hover {
	background: <?php echo esc_attr($theme_option['main-color']); ?>;
	border: 2px solid <?php echo esc_attr($theme_option['main-color']); ?>;
}
p.logged-in-as a{
	color: <?php echo esc_attr($theme_option['main-color']); ?>;
}
.widget_meta abbr {
color: <?php echo esc_attr($theme_option['main-color']); ?>;
}
.search_form:hover:before {
color: <?php echo esc_attr($theme_option['main-color']); ?>;
}