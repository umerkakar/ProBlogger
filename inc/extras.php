<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package protheme
 */

if ( ! function_exists( 'protheme_body_classes' ) ) {
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 *
	 * @return array
	 */
	function protheme_body_classes( $classes ) {
		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}
		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		return $classes;
	}
}
add_filter( 'body_class', 'protheme_body_classes' );

// Removes tag class from the body_class array to avoid Bootstrap markup styling issues.
add_filter( 'body_class', 'adjust_body_class' );

if ( ! function_exists( 'adjust_body_class' ) ) {
	/**
	 * Setup body classes.
	 *
	 * @param string $classes CSS classes.
	 *
	 * @return mixed
	 */
	function adjust_body_class( $classes ) {

		foreach ( $classes as $key => $value ) {
			if ( 'tag' == $value ) {
				unset( $classes[ $key ] );
			}
		}

		return $classes;

	}
}

// Filter custom logo with correct classes.
add_filter( 'get_custom_logo', 'change_logo_class' );

if ( ! function_exists( 'change_logo_class' ) ) {
	/**
	 * Replaces logo CSS class.
	 *
	 * @param string $html Markup.
	 *
	 * @return mixed
	 */
	function change_logo_class( $html ) {

		$html = str_replace( 'class="custom-logo"', 'class="img-responsive"', $html );
		$html = str_replace( 'class="custom-logo-link"', 'class="navbar-brand custom-logo-link"', $html );
		$html = str_replace( 'alt=""', 'title="Home" alt="logo"' , $html );

		return $html;
	}
}

/**
 * Display navigation to next/previous post when applicable.
 */
if ( ! function_exists( 'protheme_post_nav' ) ) :

	function protheme_post_nav() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
		?>

		<div class="row">
			<div class="col-md-12">
				<nav class="navigation post-navigation">
					<h2 class="sr-only"><?php _e( 'Post navigation', 'protheme' ); ?></h2>
					<div class="nav-links">
						<?php

							if ( get_previous_post_link() ) {
								previous_post_link( '<span class="nav-previous float-xs-left">%link</span>', _x( '<i class="fa fa-angle-left"></i>&nbsp;%title', 'Previous post link', 'protheme' ) );
							}
							if ( get_next_post_link() ) {
								next_post_link( '<span class="nav-next float-xs-right">%link</span>',     _x( '%title&nbsp;<i class="fa fa-angle-right"></i>', 'Next post link', 'protheme' ) );
							}
						?>
					</div><!-- .nav-links -->
				</nav><!-- .navigation -->
			</div>
		</div>
		<?php
	}
endif;
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'ptube_register_required_plugins' );

/**
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function ptube_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
	
		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => true,
		),
		array(
			'name'      => 'Disqus Comment System',
			'slug'      => 'disqus-comment-system',
			'required'  => true,
		),
	);

	$config = array(
		'id'           => 'pjobs',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}

// Ad search icon at end of primary navigation
/*function add_search_to_wp_menu ( $items, $args ) {
	if( 'primary' === $args -> theme_location ) {
$items .= '<li class="dropdown header-search hidden-lg-down">
					  <span class="search-toggle" type="" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-search" aria-hidden="true"></i>
					  </span>
					  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="#">We are loading search..</a>
					  </ul>
					</li>';
	}
return $items;
}
add_filter('wp_nav_menu_items','add_search_to_wp_menu',10,2); */

// Add image sizes
add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {
    add_image_size( 'featured-thumb', 751, 422, true ); // (cropped)
}