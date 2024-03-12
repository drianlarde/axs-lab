<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_cmb_';
	$meta_boxes[] = array(
        'id'         => 'page_setting',
        'title'      => 'Page Setting',
        'pages'      => array('portfolio'), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
        'fields' => array(   
            
            
            array(
                'name' => 'Selected Style Images of Video. Show or not Show',
                'desc' => 'Ex: show images',
                'id'   => $prefix . 'style_portf',
                'type'    => 'select',
                'options' => array(
                    array( 'name' => 'Ajax Portfolio', 'value' => 'ajax', ),
                    array( 'name' => 'Popup Portfolio', 'value' => 'popup', ),
                    )
            ),        
        )
    );
	
	$meta_boxes[] = array(
        'id'         => 'post_setting',
        'title'      => 'Post Setting',
        'pages'      => array('post'), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
        'fields' => array(   
            
            
            array(
                'name' => 'Selected Style Images of Video. Show or not Show',
                'desc' => 'Ex: show images',
                'id'   => $prefix . 'style_video',
                'type'    => 'select',
                'options' => array(
                    array( 'name' => 'Show Images', 'value' => 'yes', ),
                    array( 'name' => 'Not Show Images', 'value' => 'no', ),
                    )
            ),
            array(
                'name' => 'Upload Background Image for Video Show',
                'desc' => 'Upload an image or enter an URL.',
                'id' => $prefix . 'image_video',
                'type' => 'file',
                'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
            ),
			array(
				'name' => __( 'Link Video', 'cmb' ),
				'desc' => __( 'Add link Video Youtube, Vimeo. Ex: http://www.youtube.com/embed/hsEUBLIJvmE or http://player.vimeo.com/video/23237102', 'cmb' ),
				'id'   => $prefix . 'link_video',
				'type' => 'text'
			),  
            array(
                'name' => __( 'Link Audio', 'cmb' ),
                'desc' => __( 'Add link Audio. Ex: http://localhost/chronos/wp-content/uploads/2015/02/1.mp3', 'cmb' ),
                'id'   => $prefix . 'link_audio',
                'type' => 'text'
            ),  
            array(
                'name' => __( 'Link For format Link', 'cmb' ),
                'desc' => __( 'Add link For format Link.', 'cmb' ),
                'id'   => $prefix . 'link_link',
                'type' => 'text'
            ),            
        )
    );
	// Add other metaboxes as needed
	
	$meta_boxes[] = array(
        'id'         => 'portfolio_setting',
        'title'      => 'Portfolio Setting',
        'pages'      => array('portfolio'), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
        'fields' => array(
            
            array(
                'name' => 'Upload Background Image for Single Portfolio',
                'desc' => 'Upload an image or enter an URL.',
                'id' => $prefix . 'single_img',
                'type' => 'file',
                'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
            ),
            array(
                'name' => 'Selected Style Standard Post. Scroll or not Scroll.',
                'desc' => 'Ex: show images',
                'id'   => $prefix . 'style_scroll',
                'type'    => 'select',
                'options' => array(
                    array( 'name' => 'Not Scroll', 'value' => 'no', ),
                    array( 'name' => 'Scroll', 'value' => 'yes', ),
                    )
            ),
             array(
                'name' => 'Selected Style Images of Video. Show or not Show',
                'desc' => 'Ex: show images',
                'id'   => $prefix . 'style_portfolio',
                'type'    => 'select',
                'options' => array(
                    array( 'name' => 'Show Images', 'value' => 'yes', ),
                    array( 'name' => 'Not Show Images', 'value' => 'no', ),
                    )
            ),
            array(
                'name' => 'Upload Background Image for Video Show',
                'desc' => 'Upload an image or enter an URL.',
                'id' => $prefix . 'portfolio_img',
                'type' => 'file',
                'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
            ),
            array(
                'name' => __( 'Link Video', 'cmb' ),
                'desc' => __( 'Add link Video Youtube, Vimeo. Ex: http://www.youtube.com/embed/hsEUBLIJvmE or http://player.vimeo.com/video/23237102', 'cmb' ),
                'id'   => $prefix . 'portfolio_video',
                'type' => 'text'
            ),  
        )
    );
	// Add other metaboxes as needed
	
	$meta_boxes[] = array(
		'id'         => 'seo_fields',
		'title'      => 'WordPress SEO by VergaTheme',
		'pages'      => array( 'page', 'post','portfolio'), // Post type
		'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
		//'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
		'fields' => array(
			array(
                'name' => 'Focus Keyword:',
                'desc' => 'SEO keywords (optional)',
                'id'   => $prefix . 'seo_keywords',
                'type' => 'text',
            ),
			array(
				'name' => 'SEO Title:',
				'desc' => 'Title display in search engines is limited to 70 chars.',
				'id'   => $prefix . 'seo_title',
				'type' => 'text',
			),
            array(
                'name' => 'Meta Description:',
                'desc' => 'The meta description will be limited to 156 chars.',
                'id'   => $prefix . 'seo_description',
                'type' => 'textarea',
            ),
		)
	);
	// Add other metaboxes as needed
	
	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';

}
