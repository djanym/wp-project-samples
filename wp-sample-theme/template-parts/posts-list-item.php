<?php
/**
 * Title: Post item
 * Slug: theme/posts-list-item
 * Categories: query, posts
 * Block Types: core/query
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>
    <div class="entry-wrapper">
        <?php if ( has_post_thumbnail() ) : ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail( 'post-thumbnail', [ 'class' => 'post-thumbnail' ] ); ?>
        </a>
        <?php endif; ?>

        <div class="entry-content">
            <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

            <div class="entry-meta">
                <?php theme_post_listing_footer(); ?>
            </div>

            <div class="entry-excerpt">
                <a href="<?php the_permalink(); ?>"
                   title="<?php the_title_attribute(); ?>"><?php echo esc_html( get_the_excerpt() ); ?></a>
            </div>
        </div>
    </div>
</article>
