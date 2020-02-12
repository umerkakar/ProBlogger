<?php
/**
 * Check and setup theme's default settings
 *
 * @package protheme
 *
 */
function setup_theme_default_settings() {

	// check if settings are set, if not set defaults.
	// Caution: DO NOT check existence using === always check with == .
	// Latest blog posts style.
	$protheme_posts_index_style = get_theme_mod( 'protheme_posts_index_style' );
	if ( '' == $protheme_posts_index_style ) {
		set_theme_mod( 'protheme_posts_index_style', 'default' );
	}

	// Sidebar position.
	$protheme_sidebar_position = get_theme_mod( 'protheme_sidebar_position' );
	if ( '' == $protheme_sidebar_position ) {
		set_theme_mod( 'protheme_sidebar_position', 'right' );
	}

	// Container width.
	$protheme_container_type = get_theme_mod( 'protheme_container_type' );
	if ( '' == $protheme_container_type ) {
		set_theme_mod( 'protheme_container_type', 'container' );
	}
}
