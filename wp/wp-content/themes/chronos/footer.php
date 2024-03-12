<?php global $theme_option; ?>
<div id="footer">
				<a class="scroll" href="<?php if(is_page_template('page-templates/template-yt.php') || is_page_template('page-templates/template-slider.php') || is_page_template('page-templates/template-ajax.php') || is_page_template('page-templates/template-moving.php')){ echo '#home'; }else{echo '#blog';} ?>"><div class="back-top"><i class="fa-angle-double-up"></i></div></a>	
				<div class="container">
					<div class="sixteen columns">
						<p><?php if($theme_option['footer_text'] != ''){ echo htmlspecialchars_decode($theme_option['footer_text']);} ?></p>
						<p><small><?php if($theme_option['footer_info'] != ''){echo esc_attr($theme_option['footer_info']);} ?></small></p>
					</div>
				</div>	
			</div>
<?php if( $theme_option['rtl'] == 1 ){ ?>
    <!-- Switch Panel -->
    <div id="switch">
        <div class="content-switcher" >        
			<p>Color Options:</p>
			<ul class="header">           
				<li><a href="#" title="orange" onClick="setActiveStyleSheet('orange'); return false;" class="button color switch" style="background-color:#e67e22"></a></li>
				<li><a href="#" title="green" onClick="setActiveStyleSheet('green'); return false;" class="button color switch" style="background-color:#2ecc71"></a></li>
				<li><a href="#" title="red" onClick="setActiveStyleSheet('red'); return false;" class="button color switch" style="background-color:#e74c3c"></a></li>
				<li><a href="#" title="blue" onClick="setActiveStyleSheet('blue'); return false;" class="button color switch" style="background-color:#3498db"></a></li>
				<li><a href="#" title="yellow" onClick="setActiveStyleSheet('yellow'); return false;" class="button color switch" style="background-color:#f1c40f"></a></li> 
			</ul>        
			<div class="clear"></div>      
			<p>Page Templates:</p> 
			<div class="home-options">
				<a href="<?php echo esc_url($theme_option['link1']); ?>"><?php echo esc_attr($theme_option['text1']); ?></a>
				<a href="<?php echo esc_url($theme_option['link2']); ?>"><?php echo esc_attr($theme_option['text2']); ?></a>
				<a href="<?php echo esc_url($theme_option['link3']); ?>"><?php echo esc_attr($theme_option['text3']); ?></a>
				<a href="<?php echo esc_url($theme_option['link4']); ?>"><?php echo esc_attr($theme_option['text4']); ?></a>
				<a href="<?php echo esc_url($theme_option['link5']); ?>"><?php echo esc_attr($theme_option['text5']); ?></a>
				<a href="<?php echo esc_url($theme_option['link6']); ?>"><?php echo esc_attr($theme_option['text6']); ?></a>
				<a href="<?php echo esc_url($theme_option['link7']); ?>"><?php echo esc_attr($theme_option['text7']); ?></a>
				<a href="<?php echo esc_url($theme_option['link8']); ?>"><?php echo esc_attr($theme_option['text8']); ?></a>
				<a href="<?php echo esc_url($theme_option['link9']); ?>"><?php echo esc_attr($theme_option['text9']); ?></a>
			</div>    
			<div id="hide">
				<img  src="<?php echo get_template_directory_uri()?>/images/close.png" alt="" /> 
			</div>
        </div>
	</div>
	<div id="show" style="display: block;">
        <div id="setting"></div>
    </div>
    <!-- Switch Panel -->
<?php }else{} ?>
	<!-- JAVASCRIPT
    ================================================== -->
	  

<?php wp_footer(); ?>
<!-- End Document
================================================== -->
</body>
</html>