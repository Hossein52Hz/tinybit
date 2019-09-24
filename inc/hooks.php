<?php
/**
 * Custom hooks.
 *
 * @package tinybit
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'tinybit_site_info' ) ) {
	/**
	 * Add site info hook to WP hook library.
	 */
	function tinybit_site_info() {
		do_action( 'tinybit_site_info' );
	}
}

if ( ! function_exists( 'tinybit_add_site_info' ) ) {
	add_action( 'tinybit_site_info', 'tinybit_add_site_info' );

	/**
	 * Add site info content.
	 */
	function tinybit_add_site_info() {
		$the_theme = wp_get_theme();

		$site_info = sprintf(
			'<a href="%1$s">%2$s</a><span class="sep"> | </span>%3$s(%4$s)',
			esc_url( __( 'http://wordpress.org/', 'tinybit' ) ),
			sprintf(
				/* translators:*/
				esc_html__( 'Proudly powered by %s', 'tinybit' ),
				'WordPress'
			),
			sprintf( // WPCS: XSS ok.
				/* translators:*/
				esc_html__( 'Theme: %1$s by %2$s.', 'tinybit' ),
				$the_theme->get( 'Name' ),
				'<a href="' . esc_url( __( 'http://tinybit.com', 'tinybit' ) ) . '">tinybit.com</a>'
			),
			sprintf( // WPCS: XSS ok.
				/* translators:*/
				esc_html__( 'Version: %1$s', 'tinybit' ),
				$the_theme->get( 'Version' )
			)
		);

		echo apply_filters( 'tinybit_site_info_content', $site_info ); // WPCS: XSS ok.
	}
}
