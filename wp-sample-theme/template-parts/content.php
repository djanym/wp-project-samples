<?php
/**
 * Template part for displaying posts in archive
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class("post col-sm-12 col-md-6 col-lg-6"); ?>>
    <section class="entry-content">
        <?php _theme_slug_placeholder__post_custom_thumbnail(); ?>
        <div class="blog-post-content">

            <div class="blog-post-header">
                <?php the_title( '<h2 class="entry-title"><a href="'.get_the_permalink().'">', '</a></h2>' ); ?>
                <div class="entry-footer article-footer">
                    <?php _theme_slug_placeholder__article_footer(); ?>
                </div>
            </div>

            <div class="blog-blocks-separator"></div>

            <?php
            echo wp_trim_words( get_the_content(), 20, '...' );
            echo '<div class="mt-3"><a href="'.esc_url( get_permalink() ).'" rel="bookmark">Read More ></a></div>'; ?>

        </div>

        <?php wp_link_pages( array(
            'before' => '<div class="page-links">'.esc_html__( 'Pages:', '[theme-slug-placeholder]' ),
            'after'  => '</div>',
        ) ); ?>

    </section>
</article>
