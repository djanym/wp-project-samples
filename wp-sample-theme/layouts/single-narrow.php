<?php
/**
 * Layout part for displaying single page/post without sidebar.
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section class="content-block-fluid content-width-narrow wp-core padding-top-nav padding-bottom-single-page" role="main">

        <?php
        the_content();

        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pango' ),
            'after'  => '</div>',
        ) );
        ?>
    </section>
</article>
