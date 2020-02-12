<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package protheme
 */

$container = get_theme_mod( 'protheme_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar">

		<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content',
		'protheme' ); ?></a>

		<nav class="navbar navbar-toggleable-md  navbar-inverse bg-inverse fixed-top">

		<?php if ( 'container' == $container ) : ?>
			<div class="container ">
		<?php endif; ?>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

					<!-- Your site title as branding in the menu -->
					<?php if ( ! has_custom_logo() ) { ?>

						<?php if ( is_front_page() && is_home() ) : ?>

							<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
							
						<?php else : ?>

							<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
						
						<?php endif; ?>
						
					
					<?php } else {
						the_custom_logo();
					} ?><!-- end custom logo -->

				<!-- The WordPress Menu goes here -->
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse ml-auto',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'nav navbar-nav ml-auto',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'walker'          => new WP_Bootstrap_Navwalker(),
					)
				); ?>
				
				
				
				<ul class="saerch-bar-top float-right">
					<li class="dropdown header-search">
						
						<span class="search-toggle" type="" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-search" aria-hidden="true"></i>
						</span>
						
						<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<li>
								<script>
								  (function() {
									var cx = '014037583351628715760:-gjibmuexa4';
									var gcse = document.createElement('script');
									gcse.type = 'text/javascript';
									gcse.async = true;
									gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
									var s = document.getElementsByTagName('script')[0];
									s.parentNode.insertBefore(gcse, s);
								  })();
								</script>
								<gcse:search></gcse:search>
							</li>
						</ul>
					</li>
				</ul>
			<?php if ( 'container' == $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>

		</nav><!-- .site-navigation -->

	</div><!-- .wrapper-navbar end -->
	
	<?php // advertising area head ?>
	<div class="<?php echo esc_html( $container ); ?> homepage-top-ad content-area-bg" id="content" tabindex="-1">
		<div class="row">
			<div class="col-md-12" id="header-ad">
				<!-- attachment-bottom-area -->
					<?php if ( is_active_sidebar( 'header-ad' ) ) : ?>
						<?php dynamic_sidebar( 'header-ad' ); ?>
					<?php endif; ?>
			</div>
		</div>
	</div>
	<?php // Advertising area end ?>