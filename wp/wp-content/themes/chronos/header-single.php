<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]>
<!--><html <?php language_attributes(); ?>><!--<![endif]-->
<?php 
global $theme_option; 
global $wp_query;
    $seo_title = get_post_meta($wp_query->get_queried_object_id(), "_cmb_seo_title", true);
    $seo_description = get_post_meta($wp_query->get_queried_object_id(), "_cmb_seo_description", true);
    $seo_keywords = get_post_meta($wp_query->get_queried_object_id(), "_cmb_seo_keywords", true);
?>
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- For SEO -->
	<?php if($seo_description!="") { ?>
	<meta name="description" content="<?php echo esc_attr($seo_description); ?>">
	<?php }elseif($theme_option['seo_des']){ ?>
	<meta name="description" content="<?php echo esc_attr($theme_option['seo_des']); ?>">
	<?php } ?>
	<?php if($seo_keywords!="") { ?>
	<meta name="keywords" content="<?php echo esc_attr($seo_keywords); ?>">
	<?php }elseif($theme_option['seo_key']){ ?>
	<meta name="keywords" content="<?php echo esc_attr($theme_option['seo_key']); ?>">
	<?php } ?>
		
	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="<?php echo esc_url($theme_option['favicon']['url']); ?>" type="image/png">
	<link rel="apple-touch-icon" href="<?php echo esc_url($theme_option['apple_icon']['url']); ?>">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url($theme_option['apple_icon_72']['url']); ?>">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url($theme_option['apple_icon_114']['url']); ?>">
	
	
	<?php wp_head(); ?>
</head>
<body class="royal_loader">