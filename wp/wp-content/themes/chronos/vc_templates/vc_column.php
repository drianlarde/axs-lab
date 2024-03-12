<?php
$output = $el_class = $width = '';
extract(shortcode_atts(array(
    'el_class' => '',
    'width' => '1/1',
    'wap_class' => '',
	'wap_id' => '',
	'title' =>'',
	'column_effect' => '',
	'column_effectanimate' => ''
), $atts));

$el_class = $this->getExtraClass($el_class);
$width = wpb_translateColumnWidthToSpan($width);

$effectanimate = '';
if(is_page_template('page-templates/template-animate.php') || is_page_template('page-templates/template-effect.php')){
if($column_effectanimate == 'flipInY'){
	$effectanimate = 'data-anijs="if: scroll, on: window, do: flipInY animated, before: scrollReveal"';
}elseif($column_effectanimate == 'bounceInLeft'){
	$effectanimate = 'data-anijs="if: scroll, on: window, do: bounceInLeft animated, before: scrollReveal"';
}elseif($column_effectanimate == 'bounceInRight'){
	$effectanimate = 'data-anijs="if: scroll, on: window, do: bounceInRight animated, before: scrollReveal"';
}elseif($column_effectanimate == 'bounceInUp'){
	$effectanimate = 'data-anijs="if: scroll, on: window, do: bounceInUp animated, before: scrollReveal"';
}elseif($column_effectanimate == 'rubberBand'){
	$effectanimate = 'data-anijs="if: scroll, on: window, do: rubberBand animated, before: scrollReveal"';
}elseif($column_effectanimate == 'rollIn'){
	$effectanimate = 'data-anijs="if: scroll, on: window, do: rollIn animated, before: scrollReveal"';
}
}else{
	$effectanimate='';
}


$effect_col = '';
if( !is_page_template('page-templates/template-animate.php') || is_page_template('page-templates/template-effect.php')){
if($column_effect == 'bottommove'){
	$effect_col = 'data-scroll-reveal="enter bottom and move 150px over 1s"';
}elseif($column_effect == 'topmove'){
	$effect_col = 'data-scroll-reveal="enter top and move 150px over 1s"';
}else{
	$effect_col = '';
}
}else{
	$effect_col='';
}
$wap_id = (!empty($wap_id) ? ' id="'.esc_attr($wap_id).'"' : '');

$el_class .= ' wpb_column column_container';

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $width.$el_class, $this->settings['base']);
$output .= "\n\t".'<div class="'.$css_class.'" '.$effectanimate.' '.$effect_col.' >';
$output .= "\n\t\t".'<div '.$wap_id.' class="wpb_wrapper '.$wap_class.'">';
if($title!=""){
	$output .='<h5>'.$title.'</h5>';
}
$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
$output .= "\n\t\t".'</div> '.$this->endBlockComment('.wpb_wrapper');
$output .= "\n\t".'</div> '.$this->endBlockComment($el_class) . "\n";

echo $output;