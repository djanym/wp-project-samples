<?php
/**
 * Template part for displaying FAQ post
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<section class="entry-content <?php if ( has_post_thumbnail() ) { ?>entry-content-thumbnail<?php } ?>">

        <section class="entry-header">
    		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    	</section><!-- .entry-header -->

		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', '[theme-slug-placeholder]' ),
			'after'  => '</div>',
		) );
		?>

	</section><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
