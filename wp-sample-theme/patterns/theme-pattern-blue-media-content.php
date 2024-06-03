<?php
/**
 * Title: Pango Pattern: Blue Container with Media + Content
 * Slug: pango/theme-pattern-blue-media-content
 * Categories: theme-custom-patterns
 * Keywords: container, image, blue, pango
 * Block Types: theme/custom-container, core/columns, core/column
 */
?>
<!-- wp:theme/custom-media-text-container {"textColor":"white","backgroundColor":"theme-color-5"} -->
<div class="wp-block-theme-custom-media-text-container alignfull has-white-color has-theme-color-5-background-color has-text-color has-background">
    <div class="wp-block-inner-container"><!-- wp:media-text {"mediaPosition":"right","mediaId":663,"mediaLink":"<?php echo esc_attr( site_url() ); ?>/vpn/frame-12/","mediaType":"image"} -->
        <div class="wp-block-media-text has-media-on-the-right is-stacked-on-mobile">
            <div class="wp-block-media-text__content"><!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white"} -->
                <h2 class="wp-block-heading has-white-color has-text-color has-link-color">We Give You Everything You Need to Sell</h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white"} -->
                <p class="has-white-color has-text-color has-link-color">Content...</p>
                <!-- /wp:paragraph --></div>
            <figure class="wp-block-media-text__media"><img src="<?php echo esc_url( content_url() ); ?>/uploads/2024/03/frame-12.svg" alt="" class="wp-image-663 size-full"/></figure>
        </div>
        <!-- /wp:media-text --></div>
</div>
<!-- /wp:theme/custom-media-text-container -->