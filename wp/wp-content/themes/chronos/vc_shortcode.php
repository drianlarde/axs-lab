<?php 
//Slider
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text." Banner Slider", $textdomain),
   "base" => "slider",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
      array(
         'type' => 'attach_images',
         'heading' => __( 'Images', 'js_composer' ),
         'param_name' => 'images',
         'value' => '',
         'description' => __( 'Select images from media library.', 'js_composer' )
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text on the Subtitle", $textdomain),
         "param_name" => "subtitle",
         "value" => "- specialized in brand experience -",
         "description" => __("Text on the Subtitle.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link on the Twitter", $textdomain),
         "param_name" => "link_tw",
         "value" => "http://twitter.com",
         "description" => __("Link on the Twitter.", $textdomain)
      ),      
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link on the Facebook", $textdomain),
         "param_name" => "link_fb",
         "value" => "http://facebook.com",
         "description" => __("Link on the Facebook.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link on the Github", $textdomain),
         "param_name" => "link_gh",
         "value" => "http://github.com",
         "description" => __("Link on the Github.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link on the Google +", $textdomain),
         "param_name" => "link_gg",
         "value" => "http://google.com",
         "description" => __("Link on the Google +.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text on the Other Social", $textdomain),
         "param_name" => "text_sc",
         "value" => "Social",
         "description" => __("Text on the Other Social.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Class on the Other Social", $textdomain),
         "param_name" => "class_sc",
         "value" => "fa-linkedin",
         "description" => __("Text on the Other Social.View here: http://fortawesome.github.io/Font-Awesome/cheatsheet/", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link on the Other Social", $textdomain),
         "param_name" => "link_sc",
         "value" => "#",
         "description" => __("Link on the Other Social.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Section do you want scroll.", $textdomain),
         "param_name" => "scroll",
         "value" => "#about",
         "description" => __("Section do you want scroll. Ex: #about .", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text of Section.", $textdomain),
         "param_name" => "text_st",
         "value" => "about agency",
         "description" => __("Text of Section.Ex: About Agency .", $textdomain)
      ),
      array(
         'type' => 'attach_images',
         'heading' => __( 'Images for Fade out on slider.', 'js_composer' ),
         'param_name' => 'pattern',
         'value' => '',
         'description' => __( 'Select images from media library.', 'js_composer' )
      ),
    )));
}
//About
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text." About", $textdomain),
   "base" => "about",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
     array(
         'type' => 'attach_image',
         'heading' => __( 'Image', 'js_composer' ),
         'param_name' => 'image',
         'value' => '',
         'description' => __( 'Select image from media library to do your signature.', 'js_composer' )
      ),
     array(
         'type' => 'dropdown',
         'heading' => __( 'Show illustration or not.', 'js_composer' ),
         'param_name' => 'illust',
         'value' => array(
            __( 'Show Illustration', 'js_composer' ) => 'yes',
            __( 'Not Show Illustration', 'js_composer' ) => 'no',
         ),
         'description' => __( 'Select field do you want Show.', 'js_composer' )
      ),
    )));
}

//About Us
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text." About Us", $textdomain),
   "base" => "aboutus",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
   array(
      "type" => "textfield",
      "holder" => "div",
      "class" => "",
      "heading" => __("The Title.", $textdomain),
      "param_name" => "title",
      "value" => "Title",
      "description" => __("The Title.", $textdomain)
   ),
   array(
      "type" => "textfield",
      "holder" => "div",
      "class" => "",
      "heading" => __("The SubTitle.", $textdomain),
      "param_name" => "subtitle",
      "value" => "SubTitle",
      "description" => __("The SubTitle.", $textdomain)
   ),
   array(
         'type' => 'dropdown',
         'heading' => __( 'Show line dashed', 'js_composer' ),
         'param_name' => 'effect',
         'value' => array(
            __( 'Top', 'js_composer' ) => 'effect_top',
            __( 'Bottom', 'js_composer' ) => 'effect_bottom',
            __( 'Left', 'js_composer' ) => 'effect_left',
            __( 'Right', 'js_composer' ) => 'effect_right',
         ),
         'description' => __( 'Select field do you want Show.', 'js_composer' )
      ),
    )));
}

//Team
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text." Team", $textdomain),
   "base" => "team",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
   array(
      "type" => "textfield",
      "holder" => "div",
      "class" => "",
      "heading" => __("Name of The Team.", $textdomain),
      "param_name" => "name",
      "value" => "Your Name",
      "description" => __("Name of The Team.", $textdomain)
   ),
   array(
      "type" => "textfield",
      "holder" => "div",
      "class" => "",
      "heading" => __("Job of The Team.", $textdomain),
      "param_name" => "job",
      "value" => "Your Job",
      "description" => __("Job of The Team.", $textdomain)
   ),
   array(
      "type" => "textarea",
      "holder" => "div",
      "class" => "",
      "heading" => __("The Description.", $textdomain),
      "param_name" => "description",
      "value" => "Description",
      "description" => __("The Description.", $textdomain)
   ),
   array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link on the Twitter", $textdomain),
         "param_name" => "link_tw",
         "value" => "http://twitter.com",
         "description" => __("Link on the Twitter.", $textdomain)
      ),      
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link on the Facebook", $textdomain),
         "param_name" => "link_fb",
         "value" => "http://facebook.com",
         "description" => __("Link on the Facebook.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link on the Github", $textdomain),
         "param_name" => "link_gh",
         "value" => "http://github.com",
         "description" => __("Link on the Github.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link on the Google +", $textdomain),
         "param_name" => "link_gg",
         "value" => "http://google.com",
         "description" => __("Link on the Google +.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text on the Other Social", $textdomain),
         "param_name" => "text_sc",
         "value" => "Social",
         "description" => __("Text on the Other Social.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Class on the Other Social", $textdomain),
         "param_name" => "class_sc",
         "value" => "fa-linkedin",
         "description" => __("Text on the Other Social.View here: http://fortawesome.github.io/Font-Awesome/cheatsheet/", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link on the Other Social", $textdomain),
         "param_name" => "link_sc",
         "value" => "#",
         "description" => __("Link on the Other Social.", $textdomain)
      ),
   array(
         'type' => 'attach_image',
         'heading' => __( 'Image', 'js_composer' ),
         'param_name' => 'image',
         'value' => '',
         'description' => __( 'Select image from media library to do your signature.', 'js_composer' )
      ),
   array(
         'type' => 'dropdown',
         'heading' => __( 'Show line dashed', 'js_composer' ),
         'param_name' => 'effect_team',
         'value' => array(
            __( 'Top', 'js_composer' ) => 'effect_top',
            __( 'Bottom', 'js_composer' ) => 'effect_bottom',
            __( 'Left', 'js_composer' ) => 'effect_left',
            __( 'Right', 'js_composer' ) => 'effect_right',
         ),
         'description' => __( 'Select field do you want Show.', 'js_composer' )
      ),
    )));
}

//Clients_images
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text." Clients Images", $textdomain),
   "base" => "clientsimg",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
   array(
         'type' => 'attach_image',
         'heading' => __( 'Image for effect.', 'js_composer' ),
         'param_name' => 'image',
         'value' => '',
         'description' => __( 'Select image from media library to do your signature.', 'js_composer' )
      ),
   array(
         'type' => 'attach_image',
         'heading' => __( 'Image for Parallax', 'js_composer' ),
         'param_name' => 'image_pr',
         'value' => '',
         'description' => __( 'Select image from media library to do your signature.', 'js_composer' )
      ),
   
    )));
}

//Clients
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text." Clients ", $textdomain),
   "base" => "clients",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
   array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Title of the Clients", $textdomain),
         "param_name" => "title",
         "value" => "Title",
         "description" => __("Title of the Clients.", $textdomain)
      ),
   array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Number of the Clients", $textdomain),
         "param_name" => "number",
         "value" => "50",
         "description" => __("Number of the Clients.", $textdomain)
      ),
   array(
         'type' => 'dropdown',
         'heading' => __( 'Show line dashed', 'js_composer' ),
         'param_name' => 'show_line',
         'value' => array(
            __( 'Show Line', 'js_composer' ) => 'yes',
            __( 'No Show Line', 'js_composer' ) => 'no',
         ),
         'description' => __( 'Select field do you want Show.', 'js_composer' )
      ),
   
    )));
}

// Portfolio
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text."Portfolio", $textdomain),
   "base" => "portfolio",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text 'Show All'. ", $textdomain),
         "param_name" => "portfolio_show",
         "value" => "Show All",
         "description" => __("Text 'Show All'.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Number of portfolio You want show.", $textdomain),
         "param_name" => "portfolio_number",
         "value" => "8",
         "description" => __("Number of portfolio You want show.", $textdomain)
      ),
      array(
         'type' => 'dropdown',
         'heading' => __( 'Sort Order', 'js_composer' ),
         'param_name' => 'orderpost',
         'value' => array(
            __( 'ASC : lowest to highest', 'js_composer' ) => 'ASC',
            __( 'DESC : highest to lowest', 'js_composer' ) => 'DESC',
         ),
         'description' => __( 'Select field do you want Order.', 'js_composer' )
      ),
      array(
         'type' => 'dropdown',
         'heading' => __( 'Order by', 'js_composer' ),
         'param_name' => 'orderby',
         'value' => array(
            __( 'Title' ) => 'title',
            __( 'Date' ) => 'date',
            __( 'Random' ) => 'random',
         ),
         'description' => __( 'Select field do you want Order.', 'js_composer' )
      ),

    )));
}

// Get In Touch
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text."Get in Touch", $textdomain),
   "base" => "gettouch",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Title for Get in touch. ", $textdomain),
         "param_name" => "title",
         "value" => "Title",
         "description" => __("Title for Get in touch.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("SubTitle for Get in touch. ", $textdomain),
         "param_name" => "subtitle",
         "value" => "SubTitle",
         "description" => __("SubTitle for Get in touch.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link section or your link for Get in touch. ", $textdomain),
         "param_name" => "link",
         "value" => "#contact",
         "description" => __("Link section or your link for Get in touch.", $textdomain)
      ),
      array(
         'type' => 'dropdown',
         'heading' => __( 'Show line dashed', 'js_composer' ),
         'param_name' => 'link_other',
         'value' => array(
            __( 'Link for scroll', 'js_composer' ) => 'yes',
            __( 'Link to your website', 'js_composer' ) => 'no',
         ),
         'description' => __( 'Select field do you want Show.', 'js_composer' )
      ),
    )));
}

// Testimonial
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text."Testimonial", $textdomain),
   "base" => "testimonial",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Class on the icon", $textdomain),
         "param_name" => "class_icon",
         "value" => "fa-quote-right",
         "description" => __("Text on the icon.View here: http://fortawesome.github.io/Font-Awesome/cheatsheet/", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Your Name and Your Job.", $textdomain),
         "param_name" => "job",
         "value" => "Name And Job",
         "description" => __("Your Name and Your Job.", $textdomain)
      ),
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => __("Your Description. ", $textdomain),
         "param_name" => "desc",
         "value" => "Description",
         "description" => __("Your Description.", $textdomain)
      ),
      array(
         'type' => 'dropdown',
         'heading' => __( 'Open or Close UL for slider.', 'js_composer' ),
         'param_name' => 'style_ul',
         'value' => array(
            __( 'Open UL', 'js_composer' ) => 'open',
            __( 'Center', 'js_composer' ) => 'center',
            __( 'Close UL', 'js_composer' ) => 'close',
         ),
         'description' => __( 'Select field do you want Show.', 'js_composer' )
      ),
    )));
}

// Services
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text."Services", $textdomain),
   "base" => "services",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Your Job.", $textdomain),
         "param_name" => "job",
         "value" => "Your Job",
         "description" => __("Your Job.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Class on the icon", $textdomain),
         "param_name" => "icon",
         "value" => "fa-paperclip",
         "description" => __("Text on the icon.View here: http://fortawesome.github.io/Font-Awesome/cheatsheet/", $textdomain)
      ),
      
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => __("Your Description. ", $textdomain),
         "param_name" => "desc",
         "value" => "Description",
         "description" => __("Your Description.", $textdomain)
      ),
      array(
         'type' => 'dropdown',
         'heading' => __( 'Services box on Left or Right.', 'js_composer' ),
         'param_name' => 'location',
         'value' => array(
            __( 'Left', 'js_composer' ) => 'left',
            __( 'Right', 'js_composer' ) => 'right',
         ),
         'description' => __( 'Select field do you want Show.', 'js_composer' )
      ),
      array(
         'type' => 'dropdown',
         'heading' => __( 'Show line dashed', 'js_composer' ),
         'param_name' => 'effect_sv',
         'value' => array(
            __( 'Top', 'js_composer' ) => 'effect_top',
            __( 'Bottom', 'js_composer' ) => 'effect_bottom',
            __( 'Left', 'js_composer' ) => 'effect_left',
            __( 'Right', 'js_composer' ) => 'effect_right',
         ),
         'description' => __( 'Select field do you want Show.', 'js_composer' )
      ),
    )));
}

// Pricing Table
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text." Pricing ", $textdomain),
   "base" => "pricing",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Title.", $textdomain),
         "param_name" => "title",
         "value" => "Your Title",
         "description" => __("Your Title.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Price.", $textdomain),
         "param_name" => "price",
         "value" => "50",
         "description" => __("Your price.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Your Currency.", $textdomain),
         "param_name" => "currency",
         "value" => "$",
         "description" => __("Your Currency.", $textdomain)
      ),
      array(
         'type' => 'dropdown',
         'heading' => __( 'Currency Effect.', 'js_composer' ),
         'param_name' => 'effect_currency',
         'value' => array(
            __( 'On', 'js_composer' ) => 'on',
            __( 'Off', 'js_composer' ) => 'off',
         ),
         'description' => __( 'Select field do you want Show.', 'js_composer' )
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Subtitle.", $textdomain),
         "param_name" => "subtitle",
         "value" => "Your Subtitle",
         "description" => __("Your Subtitle.", $textdomain)
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Your Field. ", $textdomain),
         "param_name" => "desc",
         "value" => "<li><p>Brand Design</p></li>",
         "description" => __("Your Field.Ex: <li><p>Brand Design</p></li>", $textdomain)
      ),
      array(
         'type' => 'dropdown',
         'heading' => __( 'Your Product is featured or not.', 'js_composer' ),
         'param_name' => 'featured',
         'value' => array(
            __( 'Standard', 'js_composer' ) => 'no',
            __( 'Featured', 'js_composer' ) => 'yes',
         ),
         'description' => __( 'Select field do you want Show.', 'js_composer' )
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text Sing up.", $textdomain),
         "param_name" => "sing_up",
         "value" => "Sing Up",
         "description" => __("Text Sing up.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link of your Product.", $textdomain),
         "param_name" => "link_pr",
         "value" => "#",
         "description" => __("Link of your Product.", $textdomain)
      ),
      array(
         'type' => 'dropdown',
         'heading' => __( 'Show line dashed', 'js_composer' ),
         'param_name' => 'effect_pr',
         'value' => array(
            __( 'Top', 'js_composer' ) => 'effect_top',
            __( 'Bottom', 'js_composer' ) => 'effect_bottom',
            __( 'Left', 'js_composer' ) => 'effect_left',
            __( 'Right', 'js_composer' ) => 'effect_right',
         ),
         'description' => __( 'Select field do you want Show.', 'js_composer' )
      ),
    )));
}

// Logos
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text."Logos", $textdomain),
   "base" => "logos",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
      array(
         'type' => 'attach_images',
         'heading' => __( 'Image for Logos.', 'js_composer' ),
         'param_name' => 'logos',
         'value' => '',
         'description' => __( 'Select images from media library.', 'js_composer' )
      ),
      array(
         'type' => 'dropdown',
         'heading' => __( 'Show line dashed', 'js_composer' ),
         'param_name' => 'effect_logo',
         'value' => array(
            __( 'Top', 'js_composer' ) => 'effect_top',
            __( 'Bottom', 'js_composer' ) => 'effect_bottom',
            __( 'Left', 'js_composer' ) => 'effect_left',
            __( 'Right', 'js_composer' ) => 'effect_right',
         ),
         'description' => __( 'Select field do you want Show.', 'js_composer' )
      ),
    )));
}

// Contact info
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text."Contact Info", $textdomain),
   "base" => "contactinfo",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Class for icon Phone.", $textdomain),
         "param_name" => "icon_phone",
         "value" => "fa-phone",
         "description" => __("Class for icon Phone.View here: http://fortawesome.github.io/Font-Awesome/cheatsheet/", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text for icon Phone.", $textdomain),
         "param_name" => "text_phone",
         "value" => "Call-Us:",
         "description" => __("Text for icon Phone.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Telephone Number.", $textdomain),
         "param_name" => "phone_number",
         "value" => "(381) 267-6386",
         "description" => __("Telephone Number.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Your Timezone.", $textdomain),
         "param_name" => "timezone",
         "value" => "Monday–Friday | 9am–5pm (GMT +1)",
         "description" => __("Your Timezone.", $textdomain)
      ),

      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Class for icon Location.", $textdomain),
         "param_name" => "icon_location",
         "value" => "fa-map-marker",
         "description" => __("Class for icon Location.View here: http://fortawesome.github.io/Font-Awesome/cheatsheet/", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text for icon Location.", $textdomain),
         "param_name" => "text_location",
         "value" => "Visit Us:",
         "description" => __("Text for icon Location.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Your Address.", $textdomain),
         "param_name" => "address",
         "value" => "First Street, Sunrise Avenue, New York, USA",
         "description" => __("Your Address.", $textdomain)
      ),
      array(
         'type' => 'dropdown',
         'heading' => __( 'Show line dashed', 'js_composer' ),
         'param_name' => 'effect_contact',
         'value' => array(
            __( 'Top', 'js_composer' ) => 'effect_top',
            __( 'Bottom', 'js_composer' ) => 'effect_bottom',
            __( 'Left', 'js_composer' ) => 'effect_left',
            __( 'Right', 'js_composer' ) => 'effect_right',
         ),
         'description' => __( 'Select field do you want Show.', 'js_composer' )
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Title For Contact Form.", $textdomain),
         "param_name" => "title_cf",
         "value" => "Contact Us:",
         "description" => __("Your Title.", $textdomain)
      ),
    )));
}

// Title of map
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text."Title Of Map", $textdomain),
   "base" => "titlemap",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Title Map.", $textdomain),
         "param_name" => "title",
         "value" => "Locate Us on Map",
         "description" => __("Title of Map.", $textdomain)
      ),
    )));
}

//gmap
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text."Gmap", $textdomain),
   "base" => "gmap",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Latitude of Your Address.Search here: http://www.latlong.net/ ", $textdomain),
         "param_name" => "latitude",
         "value" => "21.033333",
         "description" => __("Latitude of Your Address.Search here: http://www.latlong.net/", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Longitude of Your Address.Search here: http://www.latlong.net/ ", $textdomain),
         "param_name" => "longitude",
         "value" => "105.850000",
         "description" => __("Longitude of Your Address.Search here: http://www.latlong.net/", $textdomain)
      ),
      array(
         'type' => 'attach_images',
         'heading' => __( 'Image for Location of Map.', 'js_composer' ),
         'param_name' => 'image_map',
         'value' => '',
         'description' => __( 'Select images from media library.', 'js_composer' )
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Title of Popup on Gmap.", $textdomain),
         "param_name" => "title",
         "value" => "Chronos",
         "description" => __("Title of Popup on Gmap.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Subtitle of Popup on Gmap.", $textdomain),
         "param_name" => "subtitle",
         "value" => "Checking out our office too?",
         "description" => __("Subtitle of Popup on Gmap.", $textdomain)
      ),
    )));
}

//Video
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text." Video ", $textdomain),
   "base" => "video",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link of your video, that you upload.", $textdomain),
         "param_name" => "link_video",
         "value" => "",
         "description" => __("Link of your video, that you upload.", $textdomain)
      ),
      array(
         "type" => "textarea_html",
         "heading" => __('Text Title on Video', 'wpb'),
         "param_name" => "title",
         "value" => "",
         "description" => __("Text Title on Video.", "wpb"),   
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text on the Subtitle", $textdomain),
         "param_name" => "subtitle",
         "value" => "- specialized in brand experience -",
         "description" => __("Text on the Subtitle.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link on the Twitter", $textdomain),
         "param_name" => "link_tw",
         "value" => "http://twitter.com",
         "description" => __("Link on the Twitter.", $textdomain)
      ),      
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link on the Facebook", $textdomain),
         "param_name" => "link_fb",
         "value" => "http://facebook.com",
         "description" => __("Link on the Facebook.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link on the Github", $textdomain),
         "param_name" => "link_gh",
         "value" => "http://github.com",
         "description" => __("Link on the Github.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link on the Google +", $textdomain),
         "param_name" => "link_gg",
         "value" => "http://google.com",
         "description" => __("Link on the Google +.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text on the Other Social", $textdomain),
         "param_name" => "text_sc",
         "value" => "Social",
         "description" => __("Text on the Other Social.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Class on the Other Social", $textdomain),
         "param_name" => "class_sc",
         "value" => "fa-linkedin",
         "description" => __("Text on the Other Social.View here: http://fortawesome.github.io/Font-Awesome/cheatsheet/", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link on the Other Social", $textdomain),
         "param_name" => "link_sc",
         "value" => "#",
         "description" => __("Link on the Other Social.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Section do you want scroll.", $textdomain),
         "param_name" => "scroll",
         "value" => "#about",
         "description" => __("Section do you want scroll. Ex: #about .", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text of Section.", $textdomain),
         "param_name" => "text_st",
         "value" => "about agency",
         "description" => __("Text of Section.Ex: About Agency .", $textdomain)
      ),
      array(
         'type' => 'attach_images',
         'heading' => __( 'Images for Fade out on slider.', 'js_composer' ),
         'param_name' => 'pattern',
         'value' => '',
         'description' => __( 'Select images from media library.', 'js_composer' )
      ),
    )));
}

//Parallax
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text." Parallax ", $textdomain),
   "base" => "parallax",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
      array(
         'type' => 'attach_images',
         'heading' => __( 'Images for Page Parallax.', 'js_composer' ),
         'param_name' => 'img_prl',
         'value' => '',
         'description' => __( 'Select images from media library.', 'js_composer' )
      ),
      array(
         "type" => "textarea_html",
         "heading" => __('Text Title on Video', 'wpb'),
         "param_name" => "title",
         "value" => "",
         "description" => __("Text Title on Video.", "wpb"),   
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text on the Subtitle", $textdomain),
         "param_name" => "subtitle",
         "value" => "- specialized in brand experience -",
         "description" => __("Text on the Subtitle.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link on the Twitter", $textdomain),
         "param_name" => "link_tw",
         "value" => "http://twitter.com",
         "description" => __("Link on the Twitter.", $textdomain)
      ),      
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link on the Facebook", $textdomain),
         "param_name" => "link_fb",
         "value" => "http://facebook.com",
         "description" => __("Link on the Facebook.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link on the Github", $textdomain),
         "param_name" => "link_gh",
         "value" => "http://github.com",
         "description" => __("Link on the Github.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link on the Google +", $textdomain),
         "param_name" => "link_gg",
         "value" => "http://google.com",
         "description" => __("Link on the Google +.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text on the Other Social", $textdomain),
         "param_name" => "text_sc",
         "value" => "Social",
         "description" => __("Text on the Other Social.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Class on the Other Social", $textdomain),
         "param_name" => "class_sc",
         "value" => "fa-linkedin",
         "description" => __("Text on the Other Social.View here: http://fortawesome.github.io/Font-Awesome/cheatsheet/", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link on the Other Social", $textdomain),
         "param_name" => "link_sc",
         "value" => "#",
         "description" => __("Link on the Other Social.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Section do you want scroll.", $textdomain),
         "param_name" => "scroll",
         "value" => "#about",
         "description" => __("Section do you want scroll. Ex: #about .", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text of Section.", $textdomain),
         "param_name" => "text_st",
         "value" => "about agency",
         "description" => __("Text of Section.Ex: About Agency .", $textdomain)
      ),
      array(
         'type' => 'attach_images',
         'heading' => __( 'Images for Fade out on slider.', 'js_composer' ),
         'param_name' => 'pattern',
         'value' => '',
         'description' => __( 'Select images from media library.', 'js_composer' )
      ),
    )));
}

//Moving Background
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text." Moving Background ", $textdomain),
   "base" => "moving",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
      array(
         'type' => 'attach_images',
         'heading' => __( 'Images for Page Parallax.', 'js_composer' ),
         'param_name' => 'img_prl',
         'value' => '',
         'description' => __( 'Select images from media library.', 'js_composer' )
      ),
      array(
         "type" => "textarea_html",
         "heading" => __('Text Title on Video', 'wpb'),
         "param_name" => "title",
         "value" => "",
         "description" => __("Text Title on Video.", "wpb"),   
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text on the Subtitle", $textdomain),
         "param_name" => "subtitle",
         "value" => "- specialized in brand experience -",
         "description" => __("Text on the Subtitle.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link on the Twitter", $textdomain),
         "param_name" => "link_tw",
         "value" => "http://twitter.com",
         "description" => __("Link on the Twitter.", $textdomain)
      ),      
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link on the Facebook", $textdomain),
         "param_name" => "link_fb",
         "value" => "http://facebook.com",
         "description" => __("Link on the Facebook.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link on the Github", $textdomain),
         "param_name" => "link_gh",
         "value" => "http://github.com",
         "description" => __("Link on the Github.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link on the Google +", $textdomain),
         "param_name" => "link_gg",
         "value" => "http://google.com",
         "description" => __("Link on the Google +.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text on the Other Social", $textdomain),
         "param_name" => "text_sc",
         "value" => "Social",
         "description" => __("Text on the Other Social.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Class on the Other Social", $textdomain),
         "param_name" => "class_sc",
         "value" => "fa-linkedin",
         "description" => __("Text on the Other Social.View here: http://fortawesome.github.io/Font-Awesome/cheatsheet/", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link on the Other Social", $textdomain),
         "param_name" => "link_sc",
         "value" => "#",
         "description" => __("Link on the Other Social.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Section do you want scroll.", $textdomain),
         "param_name" => "scroll",
         "value" => "#about",
         "description" => __("Section do you want scroll. Ex: #about .", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text of Section.", $textdomain),
         "param_name" => "text_st",
         "value" => "about agency",
         "description" => __("Text of Section.Ex: About Agency .", $textdomain)
      ),
      array(
         'type' => 'attach_images',
         'heading' => __( 'Images for Fade out on slider.', 'js_composer' ),
         'param_name' => 'pattern',
         'value' => '',
         'description' => __( 'Select images from media library.', 'js_composer' )
      ),
    )));
}

//Video Youtube
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text." Video Youtube ", $textdomain),
   "base" => "videoyt",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link of your video on Youtube.", $textdomain),
         "param_name" => "link_videoyt",
         "value" => "",
         "description" => __("Link of your video on Youtube.EX: http://www.youtube.com/watch?v=NTDwXK64Bjk", $textdomain)
      ),
      array(
         "type" => "textfield",
         "heading" => __('Text 1 Of Slider Title on Video', 'wpb'),
         "param_name" => "title",
         "value" => "",
         "description" => __("Text Of Slider Title on Video.", "wpb"),   
      ),
      array(
         "type" => "textfield",
         "heading" => __('Text 2 Of Slider Title on Video', 'wpb'),
         "param_name" => "title1",
         "value" => "",
         "description" => __("Text Of Slider Title on Video.", "wpb"),   
      ),
      array(
         "type" => "textfield",
         "heading" => __('Text 3 Of Slider Title on Video', 'wpb'),
         "param_name" => "title2",
         "value" => "",
         "description" => __("Text Of Slider Title on Video.", "wpb"),   
      ),
      array(
         "type" => "textfield",
         "heading" => __('Text 4 Of Slider Title on Video', 'wpb'),
         "param_name" => "title3",
         "value" => "",
         "description" => __("Text Of Slider Title on Video.", "wpb"),   
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text on the Subtitle", $textdomain),
         "param_name" => "subtitle",
         "value" => "- specialized in brand experience -",
         "description" => __("Text on the Subtitle.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link on the Twitter", $textdomain),
         "param_name" => "link_tw",
         "value" => "http://twitter.com",
         "description" => __("Link on the Twitter.", $textdomain)
      ),      
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link on the Facebook", $textdomain),
         "param_name" => "link_fb",
         "value" => "http://facebook.com",
         "description" => __("Link on the Facebook.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link on the Github", $textdomain),
         "param_name" => "link_gh",
         "value" => "http://github.com",
         "description" => __("Link on the Github.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link on the Google +", $textdomain),
         "param_name" => "link_gg",
         "value" => "http://google.com",
         "description" => __("Link on the Google +.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text on the Other Social", $textdomain),
         "param_name" => "text_sc",
         "value" => "Social",
         "description" => __("Text on the Other Social.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Class on the Other Social", $textdomain),
         "param_name" => "class_sc",
         "value" => "fa-linkedin",
         "description" => __("Text on the Other Social.View here: http://fortawesome.github.io/Font-Awesome/cheatsheet/", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link on the Other Social", $textdomain),
         "param_name" => "link_sc",
         "value" => "#",
         "description" => __("Link on the Other Social.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Section do you want scroll.", $textdomain),
         "param_name" => "scroll",
         "value" => "#about",
         "description" => __("Section do you want scroll. Ex: #about .", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text of Section.", $textdomain),
         "param_name" => "text_st",
         "value" => "about agency",
         "description" => __("Text of Section.Ex: About Agency .", $textdomain)
      ),
      array(
         'type' => 'attach_images',
         'heading' => __( 'Images for Fade out on slider.', 'js_composer' ),
         'param_name' => 'pattern',
         'value' => '',
         'description' => __( 'Select images from media library.', 'js_composer' )
      ),
    )));
}