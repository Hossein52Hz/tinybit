<?php
/**
 * Check and setup theme's default settings
 *
 * @package tinybit
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'tinybit_setup_theme_default_settings' ) ) {
	function tinybit_setup_theme_default_settings() {

		// check if settings are set, if not set defaults.
		// Caution: DO NOT check existence using === always check with == .
		// Latest blog posts style.
		$tinybit_posts_index_style = get_theme_mod( 'tinybit_posts_index_style' );
		if ( '' == $tinybit_posts_index_style ) {
			set_theme_mod( 'tinybit_posts_index_style', 'default' );
		}

		// Container width.
		$tinybit_container_type = get_theme_mod( 'tinybit_container_type' );
		if ( '' == $tinybit_container_type ) {
			set_theme_mod( 'tinybit_container_type', 'container' );
		}
	}
}
