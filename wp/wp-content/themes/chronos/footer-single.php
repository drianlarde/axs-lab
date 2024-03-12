<?php global $theme_option; ?>
<div id="footer">
				<a class="scroll" href="#single-portfolio"><div class="back-top"><i class="fa-angle-double-up"></i></div></a>	
				<div class="container">
					<div class="sixteen columns">
						<p><?php if($theme_option['footer_text'] != ''){ echo htmlspecialchars_decode($theme_option['footer_text']);} ?></p>
						<p><small><?php if($theme_option['footer_info'] != ''){echo esc_attr($theme_option['footer_info']);} ?></small></p>
					</div>
				</div>	
			</div>
	  

<?php wp_footer(); ?>
<!-- End Document
================================================== -->
</body>