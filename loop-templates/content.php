<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package tinybit
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">
		<?php if ( 'post' == get_post_type() ) : ?>

			<div class="entry-meta">
				<?php tinybit_posted_on(); ?>
			</div><!-- .entry-meta -->

		<?php endif; ?>
		<?php
		the_title(
			sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h2>'
		);
		?>

		

	</header><!-- .entry-header -->

	<?php
	if(is_single() || is_page()):
		echo get_the_post_thumbnail( $post->ID, 'large' );
	endif;
	?>

	<footer class="entry-footer">

		<?php // tinybit_entry_footer(); 
		the_tags('', '', '');?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
