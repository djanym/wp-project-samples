<?php
/**
 * Layout part for displaying single page/post with sidebar.
 */

?>

<section class="content-block-fluid content-width-wider padding-top-nav">
    <header class="page-header padding-top-0">
        <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
    </header>
</section>

<div class="container-with-sidebar">

    <aside class="sidebar">
        <?php if ( is_show_toc() ) : ?>
            <div class="widget">
                <?php show_toc_outside_content(); ?>
            </div>
        <?php endif; ?>

        <?php if ( has_child_pages( get_the_ID() ) ) : ?>
            <div class="widget">
                <?php display_child_pages_list(); ?>
            </div>
        <?php endif; ?>

        <?php dynamic_sidebar( 'page-sidebar-widgets' ); ?>
    </aside>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <section class="content-block-fluid wp-core padding-top-0 padding-bottom-single-page" role="main">

            <?php
            the_content();

            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pango' ),
                'after'  => '</div>',
            ) );
            ?>
        </section>
    </article>

</div>