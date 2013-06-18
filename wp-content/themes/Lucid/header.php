<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php elegant_titles(); ?></title>
	<?php elegant_description(); ?>
	<?php elegant_keywords(); ?>
	<?php elegant_canonical(); ?>

	<?php do_action('et_head_meta'); ?>
	
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->

	<script type="text/javascript">
		document.documentElement.className = 'js';
	</script>

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php do_action('et_header_top'); ?>
	<header id="main-header">
		<div class="container clearfix">
			<?php do_action('et_header_menu'); ?>
			<nav id="top-menu">
				<?php
					$menuClass = 'nav';
					if ( et_get_option('lucid_disable_toptier') == 'on' ) $menuClass .= ' et_disable_top_tier';
					$primaryNav = '';
					if (function_exists('wp_nav_menu')) {
						$primaryNav = wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'echo' => false ) );
					}
					if ($primaryNav == '') { ?>
						<ul class="<?php echo $menuClass; ?>">
							<?php if (et_get_option('lucid_home_link') == 'on') { ?>
								<li <?php if (is_home()) echo('class="current_page_item"') ?>><a href="<?php echo home_url(); ?>"><?php esc_html_e('Home','Lucid') ?></a></li>
							<?php }; ?>

							<?php show_page_menu($menuClass,false,false); ?>
							<?php show_categories_menu($menuClass,false); ?>
						</ul>
					<?php }
					else echo($primaryNav);
				?>
			</nav>	
			
			<?php
				$social_icons = '';
				$et_rss_url = '' != et_get_option('lucid_rss_url') ? et_get_option('lucid_rss_url') : get_bloginfo('rss2_url');
				if ( 'on' == et_get_option('lucid_show_twitter_icon') ) $social_icons['twitter'] = array('image' => get_bloginfo('template_directory') . '/images/twitter.png', 'url' => et_get_option('lucid_twitter_url'), 'alt' => 'Twitter' );
				if ( 'on' == et_get_option('lucid_show_rss_icon') ) $social_icons['rss'] = array('image' => get_bloginfo('template_directory') . '/images/rss.png', 'url' => $et_rss_url, 'alt' => 'Rss' );
				if ( 'on' == et_get_option('lucid_show_facebook_icon') ) $social_icons['facebook'] = array('image' => get_bloginfo('template_directory') . '/images/facebook.png', 'url' => et_get_option('lucid_facebook_url'), 'alt' => 'Facebook' );
				$social_icons = apply_filters('et_social_icons', $social_icons);
				if ( !empty($social_icons) ) {
					echo '<div id="social-icons">';
					foreach ($social_icons as $icon) {
						echo "<a href='" . esc_url( $icon['url'] ) . "' target='_blank'><img alt='" . esc_attr( $icon['alt'] ) . "' src='" . esc_url( $icon['image'] ) . "' /></a>";
					}
					echo '</div> <!-- end #social-icons -->';
				}
			?>
			
			<div id="search">
				<div id="search-form">
					<form method="get" id="searchform" action="<?php echo esc_url( home_url() ); ?>/">
						<input type="text" value="<?php esc_attr_e('Search This Site...', 'Lucid'); ?>" name="s" id="searchinput" />
						<input type="image" src="<?php echo esc_url( get_template_directory_uri() . '/images/search_btn.png' ); ?>" id="searchsubmit" />
					</form>
				</div> <!-- end #search-form -->
			</div> <!-- end #search -->
		</div> <!-- end .container -->
	</header> <!-- end #main-header -->
	
	<?php
		$use_header_banner = et_get_option( 'lucid_468_header_enable', 'false' );
	?>
	
	<div class="container">
		<div id="logo-area"<?php if ( 'on' == $use_header_banner ) echo ' class="header_banner clearfix"'; ?>>
			<a href="<?php echo esc_url( home_url() ); ?>">
				<?php 
					$color_scheme = et_get_option( 'lucid_color_scheme', 'Orange' );
					$color_scheme = ( 'Orange' == $color_scheme ) ? '' : '-' . strtolower( $color_scheme );
					$logo = ( ( $user_logo = et_get_option('lucid_logo') ) && '' != $user_logo ) ? $user_logo : get_template_directory_uri() . "/images/logo{$color_scheme}.png"; 
				?>
				<img src="<?php echo esc_url ( $logo ); ?>" alt="<?php echo esc_attr( get_bloginfo('name')) ; ?>" id="logo"/>
			</a>
			
			<?php if ( 'on' == $use_header_banner ){ ?>
				<div id="top_banner">
					<?php 
						if ( ( $lucid_468_header_adsense = et_get_option('lucid_468_header_adsense') ) && '' != $lucid_468_header_adsense ) echo( $lucid_468_header_adsense );
						else { ?>
						   <a href="<?php echo esc_url(et_get_option('lucid_468_header_url')); ?>"><img src="<?php echo esc_url(et_get_option('lucid_468_header_image')); ?>" /></a>
					<?php } ?>
				</div> <!-- end #top_banner -->
			<?php } ?>
		</div>	
	</div> <!-- end .container -->
	<div id="secondary-menu">
		<div class="container">
			<?php do_action('et_secondary_menu'); ?>
			<nav id="second-menu" class="clearfix">
				<?php
					$menuClass = 'nav';
					if ( et_get_option('lucid_disable_toptier') == 'on' ) $menuClass .= ' et_disable_top_tier';
					$primaryNav = '';
					if (function_exists('wp_nav_menu')) {
						$primaryNav = wp_nav_menu( array( 'theme_location' => 'secondary-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'echo' => false ) );
					}
					if ($primaryNav == '') { ?>
						<ul class="<?php echo $menuClass; ?>">
							<?php if (et_get_option('lucid_home_link') == 'on') { ?>
								<li <?php if (is_home()) echo('class="current_page_item"') ?>><a href="<?php echo home_url(); ?>"><?php esc_html_e('Home','Lucid') ?></a></li>
							<?php }; ?>

							<?php show_page_menu($menuClass,false,false); ?>
							<?php show_categories_menu($menuClass,false); ?>
						</ul>
					<?php }
					else echo($primaryNav);
				?>
			</nav>
		</div> <!-- end .container -->
	</div> <!-- end #secondary-menu -->
	<div id="main-area">
		<div class="container">