<?php
/**
 * Title: Business Review Block
 * Slug: theme/business-review-block
 * Inserter: no
 */

if ( ! function_exists( 'get_field' ) ) {
    return;
}
if ( ! get_field( 'show_google_reviews_widget' ) ) {
    return;
}

?>

<section class="container">
    <div class="content-block">
        <div class="business-reviews-block">
            <?php echo do_shortcode( '[brb_collection id="' . esc_attr( get_field( 'collection' ) ) . '"]' ); ?>
        </div>
        <div class="clear clearfix"></div>
    </div>
</section>
