<?php
/**
 * Block Name: Homepage Post Grid Listing
 * @var array $block
 */

$term_id    = get_field( 'service_type' );
$blockClass = isset( $block['className'] ) ? $block['className'] : '';

$items = _theme_slug_placeholder__get_service_posts_by_term( $term_id );

if ( is_admin() ) {
    echo 'Services post grid listing block';

    return;
}

if ( ! $items ) {
    return;
}

?>

<div id="<?php echo esc_attr( $block['id'] ); ?>" class="container-fluid green-box <?php echo esc_attr( $blockClass ); ?>">
    <div class="overlay-bg"></div>
    <div class="row site-container sv-list">
        <?php foreach ( $items as $item ) : ?>
            <div class="col-sm-6 col-md-3 col-lg-2 px-2">
                <div class="sv-item">
                    <a href="<?php echo get_permalink($item->ID); ?>">
                        <?php if ( get_field('homepage_thumbnail', $item->ID) ) : ?>
                            <img src="<?php the_field('homepage_thumbnail', $item->ID); ?>" alt="image">
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/small-img-01.jpg" alt="image">
                        <?php endif; ?>
                    </a>
                    <p>
                        <a href="<?php echo get_permalink($item->ID); ?>">
                        <?php echo get_field('homepage_listing_title', $item->ID) ?: get_the_title( $item->ID ); ?>
                        </a>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
