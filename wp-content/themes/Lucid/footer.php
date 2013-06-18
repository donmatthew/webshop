<?php
	$footer_sidebars = array('footer-area-1','footer-area-2','footer-area-3');
	$any_widget_area_active = is_active_sidebar( $footer_sidebars[0] ) || is_active_sidebar( $footer_sidebars[1] ) || is_active_sidebar( $footer_sidebars[2] );
?>
		
		</div> <!-- end .container -->
	</div> <!-- end #main-area -->
	<footer id="main-footer">
	<?php if ( $any_widget_area_active ) { ?>
		<div id="footer-divider"></div>
	<?php } ?>
		<div class="container">
			<div id="footer-widgets" class="clearfix">
				<?php
					if ( $any_widget_area_active ) {
						foreach ( $footer_sidebars as $key => $footer_sidebar ){
							if ( is_active_sidebar( $footer_sidebar ) ) {
								echo '<div class="footer-widget' . (  2 == $key ? ' last' : '' ) . '">';
								dynamic_sidebar( $footer_sidebar );
								echo '</div> <!-- end .footer-widget -->';
							}
						}
					}
				?>
			</div> <!-- end #footer-widgets -->	
		</div> <!-- end .container -->
		
		<?php if ( 'on' == et_get_option( 'lucid_728_enable', 'false' ) ){ ?>
			<div id="bottom-advertisment">
				<div class="container">			
					<?php 
						if ( ( $lucid_728_adsense = et_get_option('lucid_728_adsense') ) && '' != $lucid_728_adsense ) echo( $lucid_728_adsense );
						else { ?>
						   <a href="<?php echo esc_url(et_get_option('lucid_728_url')); ?>"><img src="<?php echo esc_url(et_get_option('lucid_728_image')); ?>" /></a>
					<?php } ?>
				</div> <!-- end .container -->	
			</div>
		<?php } ?>		
	</footer> <!-- end #main-footer -->
	
	<div id="footer-bottom">	
		<div class="container clearfix">
			<?php
				$menuID = 'bottom-menu';
				$footerNav = '';

				if (function_exists('wp_nav_menu')) $footerNav = wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container' => '', 'fallback_cb' => '', 'menu_id' => $menuID, 'menu_class' => 'bottom-nav', 'echo' => false, 'depth' => '1' ) );
				if ($footerNav == '') show_page_menu($menuID);
				else echo($footerNav);
			?>

			<p id="copyright"><?php printf( __('Designed by %s | Powered by %s', 'Lucid'), '<a href="http://www.elegantthemes.com" title="Premium WordPress Themes">Elegant Themes</a>', '<a href="http://www.wordpress.org">WordPress</a>' ); ?></p>
		</div> <!-- end .container -->	
	</div> <!-- end #footer-bottom -->	
	
	<?php wp_footer(); ?>
</body>
</html>