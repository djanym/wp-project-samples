<?php
/**
 * Layout part for displaying single page/post.
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section class="content-block-fluid wp-core _content-padding-y" role="main">

		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pango' ),
			'after'  => '</div>',
		) );
		?>
    </section>
</article>
