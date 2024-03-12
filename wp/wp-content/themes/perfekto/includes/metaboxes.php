<?php
$prefix = 'ts_';

// Create meta box slider
$meta_boxes = array();

$meta_boxes[] = array(
	'id' => 'slider-meta-box',
	'title' => __('Slider Images','templatesquare'),
	'page' => 'slider',
	'showbox' => 'slider_show_box',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => __('Thumb','templatesquare'),
			'desc' => '<em>The value is the url of the slider image, this will disable featured image. (optional)</em>',
			'id' => $prefix.'thumb',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __('Slider url','templatesquare'),
			'desc' => '<em>The value is pages, post or any url, if filled it will redirect to the url. (optional)</em>',
			'id' => $prefix.'slider-url',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __('Slider rel','templatesquare'),
			'desc' => '<em>The value is wp-video-lightbox, if your Slider Url is releate to video clip, or just live it blank for any other Url. (optional)</em>',
			'id' => $prefix.'slider-rel',
			'type' => 'text',
			'std' => ''
		),
	)
);

$meta_boxes[] = array(
	'id' => 'testimonial-meta-box',
	'title' => __('Testimonial Option','templatesquare'),
	'page' => 'testimonial',
	'showbox' => 'testimonial_show_box',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => __('Name','templatesquare'),
			'desc' => '<em>The value is the person name or company name.</em>',
			'id' => $prefix.'testi-name',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __('Info','templatesquare'),
			'desc' => '<em>The value is any value that show after name: title, website, etc.</em>',
			'id' => $prefix.'testi-info',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __('Photo','templatesquare'),
			'desc' => '<em>The value is the url of photo of the person. (optional)</em>',
			'id' => $prefix.'testi-thumb',
			'type' => 'text',
			'std' => ''
		),
	)
);


$meta_boxes[] = array(
	'id' => 'portfolio-meta-box',
	'title' => __('Portfolio Option','templatesquare'),
	'page' => 'portfolio',
	'showbox' => 'portfolio_show_box',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => __('Thumb','templatesquare'),
			'desc' => '<em>The value is the url of the portfolio thumbnail image, this will disable featured image. (optional)</em>',
			'id' => $prefix.'thumb',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __('Lightbox','templatesquare'),
			'desc' => '<em>The value is the big image url or video url. (optional)</em>',
			'id' => $prefix.'lightbox',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __('External Link','templatesquare'),
			'desc' => '<em>The value is any url, if filled it will redirect to the url. (optional)</em>',
			'id' => $prefix.'external-link',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __('Thumb Cycle','templatesquare'),
			'desc' => '<em>The value is the url of thumbnail images that used for TS Post Cycle widget. (optional)</em>',
			'id' => $prefix.'thumb-cycle',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __('Thumb Recent Portfolio','templatesquare'),
			'desc' => '<em>The value is the url of thumbnail image that used for [recent-portfolio] shortcode. (optional)</em>',
			'id' => $prefix.'thumb-recent-portfolio',
			'type' => 'text',
			'std' => ''
		),
	)
);

$meta_boxes[] = array(
	'id' => 'portfolio-clientinfo-meta-box',
	'title' => __('Client Info','templatesquare'),
	'page' => 'portfolio',
	'showbox' => 'portfolio_clientinfo_show_box',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => __('Disable','templatesquare'),
			'desc' => '<em>Check to disable client information and you can put the portfolio detail in the content editor above.</em>',
			'id' => $prefix.'disable-clientinfo',
			'type' => 'checkbox',
			'std' => ''
		),
		array(
			'name' => __('Client','templatesquare'),
			'desc' => '<em>The value is the client name or company name. (optional)</em>',
			'id' => $prefix.'client',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __('Website','templatesquare'),
			'desc' => '<em>The value is the client website url. (optional)</em>',
			'id' => $prefix.'client-url',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __('Short Desc','templatesquare'),
			'desc' => '<em>The value is the short information about the client. (optional)</em>',
			'id' => $prefix.'client-shortdesc',
			'type' => 'textarea',
			'std' => ''
		),
	)
);

$meta_boxes[] = array(
	'id' => 'portfolio-images-meta-box',
	'title' => __('Portfolio Images','templatesquare'),
	'page' => 'portfolio',
	'showbox' => 'portfolio_images_show_box',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => __('Upload Images','templatesquare'),
			'desc' => '<em>Click here if you want to upload and manage your image.</em>',
			'id' => $prefix.'uploadimg',
			'type' => 'upload',
			'std' => ''
		),
	)
);


add_action('admin_menu', 'mytheme_add_box');

// Add meta box
function mytheme_add_box() {
	global $meta_boxes;
	foreach($meta_boxes as $meta_box){
		add_meta_box($meta_box['id'], $meta_box['title'], $meta_box['showbox'], $meta_box['page'], $meta_box['context'], $meta_box['priority']);
	}
}
 
// Callback function to show fields in meta box
function slider_show_box() {
	global $meta_boxes, $post;
 
	// Use nonce for verification
	echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo mytheme_create_metabox($meta_boxes[0]);
}

// Callback function to show fields in meta box
function testimonial_show_box() {
	global $meta_boxes, $post;
 
	// Use nonce for verification
	echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo mytheme_create_metabox($meta_boxes[1]);
}

// Callback function to show fields in meta box
function portfolio_show_box() {
	global $meta_boxes, $post;
 
	// Use nonce for verification
	echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo mytheme_create_metabox($meta_boxes[2]);
}

// Callback function to show fields in meta box
function portfolio_clientinfo_show_box() {
	global $meta_boxes, $post;
 
	// Use nonce for verification
	echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo mytheme_create_metabox($meta_boxes[3]);
}

// Callback function to show fields in meta box
function portfolio_images_show_box() {
	global $meta_boxes, $post;
 
	// Use nonce for verification
	echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo mytheme_create_metabox($meta_boxes[4]);
}



// Create Metabox Form Table
function mytheme_create_metabox($meta_box){

	global $post;
	
	$returnstring = "";
	
	$returnstring .= '<table class="form-table">';
 
	foreach ($meta_box['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
 
		$returnstring .= '<tr>'.
				'<th style="width:20%"><label for="'. $field['id']. '">'. $field['name']. '</label></th>'.
				'<td>';
		switch ($field['type']) {
 
//If Text		
			case 'text':
				$textvalue = $meta ? $meta : $field['std'];
				$widthinput = "97%";
				$prefixinput = "";
				$postfixinput = "";
				if(isset($field['class'])){
					if($field['class']=="mini"){
						$widthinput = "20%";
					}
				}
				if(isset($field['prefix'])){
					$prefixinput = stripslashes(trim($field['prefix']));
				}
				if(isset($field['postfix'])){
					$postfixinput = stripslashes(trim($field['postfix']));
				}
				$returnstring .= $prefixinput.'<input type="text" name="'. $field['id']. '" id="'. $field['id']. '" value="'. $textvalue .'" size="30" style="width:'.$widthinput.'" /> '.$postfixinput.
					'<br />'. $field['desc'];
				break;
 
 
//If Text Area			
			case 'textarea':
				$textvalue = $meta ? $meta : $field['std'];
				$returnstring .= '<textarea name="'. $field['id']. '" id="'. $field['id']. '" cols="60" rows="4" style="width:97%">'. $textvalue .'</textarea>'.
					'<br />'. $field['desc'];
				break;
 
//If Select Combobox			
			case 'select':
				$optvalue = $meta ? $meta : $field['std'];
				$returnstring .= '<select name="'. $field['id']. '" id="'. $field['id']. '">';
				foreach ($field['options'] as $option){
					$selectedstr = ($optvalue==$option)? 'selected="selected"' : '';
					$returnstring .= '<option value="'.$option.'" '.$selectedstr.'>'. $option .'</option>';
				}
				$returnstring .= '</select>';
				$returnstring .= '<br />'. $field['desc'];
				break;

//If Checkbox			
			case 'checkbox':
				$chkvalue = $meta ? true : $field['std'];
				$checkedstr = ($chkvalue)? 'checked="checked"' : '';
				$returnstring .= '<input type="checkbox" name="'. $field['id']. '" id="'. $field['id']. '" '.$checkedstr.' />';
				$returnstring .= '<br />'. $field['desc'];
				break;
				 
//If Button	
 
			case 'button':
				$buttonvalue = $meta ? $meta : $field['std'] ;
				$returnstring .= '<input type="button" name="'. $field['id']. '" id="'. $field['id']. '"value="'. $buttonvalue. '" />';
				$returnstring .= '<br />'. $field['desc'];
				break;

//If Upload	
 
			case 'upload':
				$uploadvalue = $meta ? $meta : $field['std'] ;
				
				$returnstring .= '<input type="hidden" name="'. $field['id']. '" id="'. $field['id']. '"value="'. $uploadvalue. '" />';
				$returnstring .= '<input type="button" name="'. $field['id']. '_button" id="'. $field['id']. '_button" value="'.__("Manage Images","templatesquare").'" />';
				$returnstring .= '<input type="hidden" name="'. $field['id']. '_hidden" id="'. $field['id']. '_hidden" value="'.$post->ID.'" />';
				$returnstring .= '<br />'. $field['desc'];
				
				break;
		}
		$returnstring .= 	'<td>'.
						'</tr>';
	}
 
	$returnstring .= '</table>';
	
	return $returnstring;

}//END : mytheme_create_metabox
 
 
add_action('save_post', 'mytheme_save_data');
 
 
// Save data from meta box
function mytheme_save_data($post_id) {
	global $meta_boxes;
 
	// verify nonce
	if(isset($_POST['mytheme_meta_box_nonce'])){
		if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], basename(__FILE__))) {
			return $post_id;
		}
	}
 
	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}
 
	// check permissions
	if ('page' == isset($_POST['post_type'])) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
 	
	foreach($meta_boxes as $meta_box){
		foreach ($meta_box['fields'] as $field) {
			$old = get_post_meta($post_id, $field['id'], true);
			$new = (isset($_POST[$field['id']]))? $_POST[$field['id']] : "";
	 
			if ($new && $new != $old) {
				update_post_meta($post_id, $field['id'], $new);
			} elseif ('' == $new && $old) {
				delete_post_meta($post_id, $field['id'], $old);
			}
		}
	}
}
function my_admin_scripts() {
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
wp_register_script('my-upload', get_template_directory_uri(). '/js/upload.js', array('jquery','media-upload','thickbox'));
wp_enqueue_script('my-upload');
}

function my_admin_styles() {
wp_enqueue_style('thickbox');
}

add_action('admin_print_scripts', 'my_admin_scripts');
add_action('admin_print_styles', 'my_admin_styles');

?>