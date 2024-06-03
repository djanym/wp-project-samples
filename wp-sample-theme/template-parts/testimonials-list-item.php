<?php
/**
 * Title: Testimonials Post item
 * Slug: theme/testimonials-list-item
 * Inserter: no
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>
    <div class="entry-wrapper is-vertical is-nowrap is-layout-flex wp-container-core-group-is-layout-2 wp-block-group-is-layout-flex">
        <blockquote class="wp-block-quote is-layout-flow wp-block-quote-is-layout-flow">
            <h2 class="entry-title"><?php the_title(); ?></h2>

            <hr class="wp-block-separator is-style-wide" />

            <?php the_content(); ?>

        </blockquote>

        <div class="wp-block-group testimonials-author-block">
            <?php if ( has_post_thumbnail() ) : ?>
                <!-- wp:post-featured-image {"isLink":false, "className": "author-image"} /-->
                <figure class="author-image wp-block-post-featured-image">
                    <?php the_post_thumbnail(); ?>
                </figure>
            <?php endif; ?>
            <div class="author-info">
                <?php if ( get_field( 'author_name' ) ) : ?>
                    <p><?php the_field( 'author_name' ); ?></p>
                <?php endif; ?>
                <?php if ( get_field( 'author_details' ) ) : ?>
                    <p><?php the_field( 'author_details' ); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</article>