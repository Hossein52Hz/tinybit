<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package tinybit
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'tinybit_container_type' );
?>

<div class="wrapper" id="archive-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<div class="col-md content-area" id="primary">
			
			<div id="site-info">
			<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
			<p class="description">
			<?php bloginfo( 'description' ); ?>
			</p>			
			<div>
				<ul class="social-link">
				<?php show_social_media(); ?>
				</ul>
			</div>
		</div>

			<header class="page-header">
						<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
					</header><!-- .page-header -->
			<main class="site-main" id="main">

				<?php if ( have_posts() ) : ?>

					

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'loop-templates/content', get_post_format() );
						?>

					<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php tinybit_pagination(); ?>

			</div><!-- #closing the primary container -->

		</div> <!-- .row -->

	</div><!-- #content -->

	</div><!-- #archive-wrapper -->

<?php get_footer(); ?>
