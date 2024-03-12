<?php
$root =dirname(dirname(dirname(dirname(dirname(__FILE__)))));
if ( file_exists( $root.'/wp-load.php' ) ) {
    require_once( $root.'/wp-load.php' );
} elseif ( file_exists( $root.'/wp-config.php' ) ) {
    require_once( $root.'/wp-config.php' );
}
header('Content-type: application/x-javascript');
global $theme_option; 
?>
<?php if($theme_option['preload'] == 'text'){
    $style='text';
    }elseif($theme_option['preload'] == 'number'){
    $style='number';
    }

    ?>

(function($) { "use strict";
            Royal_Preloader.config({
                mode:           '<?php echo $style;?>', // 'number', "text" or "logo"
                text:           '<?php if($theme_option['preload_text'] != ''){echo $theme_option['preload_text'];}else{echo 'Chronos';} ?>',                
                timeout:        0,
                showInfo:       true,
                opacity:        1,
                background:     ['#000000']
            });
})(jQuery);