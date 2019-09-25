<?php
/**
 * Tinybit enqueue scripts
 *
 * @package tinybit
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'tinybit_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function tinybit_scripts() {
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );

		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme.min.css' );
		wp_enqueue_style( 'tinybit-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $css_version );
		wp_enqueue_style( 'tinybit-style', get_stylesheet_uri(), array() );
		
		//RTL Support
		wp_style_add_data( 'tinybit-style-rtl', 'rtl', 'replace' ); 
		
		// RTL Font (Vazir)
		wp_enqueue_style( 'tinybit-vazir-font', 'https://cdn.rawgit.com/rastikerdar/vazir-font/v21.0.1/dist/font-face.css', array(), '21.0.1' );

		wp_enqueue_script( 'jquery' );

		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/theme.min.js' );
		wp_enqueue_script( 'tinybit-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // endif function_exists( 'tinybit_scripts' ).

add_action( 'wp_enqueue_scripts', 'tinybit_scripts' );
