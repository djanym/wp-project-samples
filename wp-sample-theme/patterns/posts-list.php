<?php
/**
 * Title: List of posts with images, 3 columns
 * Slug: theme/posts-list
 * Categories: query, posts
 * Block Types: core/query
 * Inserter: no
 */
?>

<div class="content-block-fluid wp-core">
    <?php if ( have_posts() ) : ?>

        <div class="masonry-listing posts-list-container">
            <?php while ( have_posts() ) :
                the_post();
                get_template_part( 'patterns/posts-list-item' );
            endwhile;
            ?>
        </div>

        <?php theme_navigation(); ?>

    <?php else : ?>

        <?php get_template_part( 'patterns/no-results' ); ?>

    <?php endif; ?>
</div>
