<?php
/**
 * protheme enqueue scripts
 *
 * @package protheme
 */

if ( ! function_exists( 'protheme_scripts' ) ) {
	/**
	 * Load theme's JavaScript sources.
	 */
	function protheme_scripts() {
		// Get the theme data.
		$the_theme = wp_get_theme();
		wp_enqueue_style( 'protheme-styles', get_stylesheet_directory_uri() . '/css/theme.css', array(), $the_theme->get( 'Version' ) );
		wp_enqueue_style( 'protheme-style', get_stylesheet_directory_uri() . '/css/style.css', array(), $the_theme->get( 'Version' ) );

		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'protheme-scripts', get_template_directory_uri() . '/js/theme.js', array(), $the_theme->get( 'Version' ), true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // endif function_exists( 'protheme_scripts' ).

add_action( 'wp_enqueue_scripts', 'protheme_scripts' );
