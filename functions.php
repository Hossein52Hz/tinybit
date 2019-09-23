<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
);

foreach ( $understrap_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}

function show_social_media() { ?>
	<?php if ( get_theme_mod( 'understrap_author_options_facebook_url' ) ): ?>
		  <li><a href="<?php echo esc_attr(get_theme_mod( 'understrap_author_options_facebook_url' )); ?>"><i class="fa fa-facebook"></i></a></li>
	<?php endif; ?>

	<?php if ( get_theme_mod( 'understrap_author_options_twitter_url' ) ): ?>
		  <li><a href="<?php echo esc_attr(get_theme_mod( 'understrap_author_options_twitter_url' )); ?>"><i class="fa fa-twitter"></i></a></li>
	<?php endif; ?>

	<?php if ( get_theme_mod( 'understrap_author_options_github_url' ) ): ?>
		  <li><a href="<?php echo esc_attr(get_theme_mod( 'understrap_author_options_github_url' )); ?>"><i class="fa fa-github"></i></a></li>
	<?php endif; ?>

	<?php if ( get_theme_mod( 'understrap_author_options_gitlab_url' ) ): ?>
		  <li><a href="<?php echo esc_attr(get_theme_mod( 'understrap_author_options_gitlab_url' )); ?>"><i class="fa fa-gitlab"></i></a></li>
	<?php endif; ?>

	<?php if ( get_theme_mod( 'understrap_author_options_linkedin_url' ) ): ?>
		  <li><a href="<?php echo esc_attr(get_theme_mod( 'understrap_author_options_linkedin_url' )); ?>"><i class="fa fa-linkedin"></i></a></li>
	<?php endif;
}?>