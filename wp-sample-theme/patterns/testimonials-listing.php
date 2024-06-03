<?php
/**
 * Title: Testimonials Listing
 * Slug: nemontessori/testimonials-listing
 * Categories: query
 * Block Types: core/query
 * Inserter: no
 */
?>

<div class="content-block-fluid wp-core">
    <?php if ( have_posts() ) : ?>

        <div class="masonry-listing posts-list-container testimonials-list">
            <?php while ( have_posts() ) :
                the_post();
                get_template_part( 'patterns/testimonials-list-item' );
            endwhile;
            ?>
        </div>

        <?php theme_navigation(); ?>

    <?php else : ?>

        <?php get_template_part( 'patterns/no-results' ); ?>

    <?php endif; ?>
</div>