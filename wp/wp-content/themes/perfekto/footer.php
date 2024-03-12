<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage Perfekto
 * @since Perfekto 1.0
 */
?>
<?php if (is_front_page()) { ?>
                     <div class="useful">
			<div id="foot-col3">
				<?php get_sidebar('footer3');?>
			</div><!-- end #foot-col3 -->
                     </div>
<?php } ?>
	</div><!-- end .pad_container -->
	<div id="footer">
			<div id="foot-col1">
				<?php get_sidebar('footer1');?>
			</div><!-- end #foot-col1 -->
			<div id="foot-col2">
				<?php get_sidebar('footer2');?>
			</div><!-- end #foot-col2 -->

			<div class="clear"></div>
		</div><!-- end #footer -->	
		<div id="footer-copyright">
            <div id="copyright">				
				<?php $foot= stripslashes(get_option('templatesquare_footer'))?>
				<?php if($foot==""){?>
				<?php _e('Copyright', 'templatesquare'); ?> &copy;
				<?php global $wpdb;
				$post_datetimes = $wpdb->get_results("SELECT YEAR(min(post_date_gmt)) AS firstyear, YEAR(max(post_date_gmt)) AS lastyear FROM $wpdb->posts WHERE post_date_gmt > 1970");
				if ($post_datetimes) {
					$firstpost_year = $post_datetimes[0]->firstyear;
					$lastpost_year = $post_datetimes[0]->lastyear;
	
					$copyright = $firstpost_year;
					if($firstpost_year != $lastpost_year) {
						$copyright .= '-'. $lastpost_year;
					}
					$copyright .= ' ';
	
					echo $copyright;
					echo '<a href="'.home_url( '/').'">'.get_bloginfo('name') .'</a>';
				}
			?>. <?php _e('All rights reserved.', 'templatesquare'); ?>
	
				<?php }else{?>
				<?php echo $foot; ?>
				<?php } ?>
			</div>
            <div id="footermenu">
			
			<?php wp_nav_menu( array(
				  'container'       => 'ul', 
				  'menu_class'      => '',
				  'menu_id'         => '', 
				  'depth'           => 1,
				  'sort_column'    => 'menu_order',
				  'theme_location' => 'footmenu' 
				  )); 
			?>
            </div>
        </div><!-- end #footer-copyright -->
	</div><!-- end #container -->
</div><!-- end #frame -->
	<script type="text/javascript"> Cufon.now();</script> <!-- to fix cufon problems in IE browser -->
	<?php
		/* Always have wp_footer() just before the closing </body>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to reference JavaScript files.
		 */
	
		wp_footer();
	?>
	<?php $google = stripslashes(get_option('templatesquare_google'));?>
	<?php if($google=="false"){?>
	<?php }else{?>
	<?php echo $google; ?>
	<?php } ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30848038-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>