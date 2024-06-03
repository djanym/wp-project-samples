<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package [theme-slug-placeholder]
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header">
		<h2 class="entry-title text-left"><?php the_title(); ?></h2>

		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php
				_theme_slug_placeholder__posted_on();
				_theme_slug_placeholder__posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</div><!-- .entry-header -->

	<?php _theme_slug_placeholder__post_thumbnail(); ?>

	<div class="entry-summary">
		<div class="blog-blocks-separator"></div>
		<?php
		echo wp_trim_words( get_the_content(), 70, '...' );
		echo '<div class="mt-3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">Read More ></a></div>'; ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php _theme_slug_placeholder__entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
<hr>
