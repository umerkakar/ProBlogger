<?php
/**
 * WordPress.com-specific functions and definitions
 *
 * This file is centrally included from `wp-content/mu-plugins/wpcom-theme-compat.php`.
 *
 * @package protheme
 */

/**
 * Adds support for wp.com-specific theme functions.
 *
 * @global array $themecolors
 */
function protheme_wpcom_setup() {
	global $themecolors;

	// Set theme colors for third party services.
	if ( ! isset( $themecolors ) ) {
		$themecolors = array(
			'bg'     => '',
			'border' => '',
			'text'   => '',
			'link'   => '',
			'url'    => '',
		);
	}
	
	/* Add WP.com print styles */
	add_theme_support( 'print-styles' );
}
add_action( 'after_setup_theme', 'protheme_wpcom_setup' );

/*
 * WordPress.com-specific styles
 */
function protheme_wpcom_styles() {
	wp_enqueue_style( 'protheme-wpcom', get_template_directory_uri() . '/inc/style-wpcom.css', '20160411' );
}
add_action( 'wp_enqueue_scripts', 'protheme_wpcom_styles' );
