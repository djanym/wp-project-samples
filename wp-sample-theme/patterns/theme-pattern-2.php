<?php
/**
 * Title: Pango Product: Cards Container Pattern
 * Slug: pango/theme-pattern-2
 * Categories: theme-custom-patterns
 * Keywords: cards, container, pango
 * Block Types: theme/card, theme/custom-container
 */
?>
<!-- wp:theme/custom-container {"gridLayoutOption":true,"gridCols":3} -->
<div class="wp-block-theme-custom-container alignfull">
    <div class="wp-block-group__inner-container is-layout-grid grid-cols-3">
        <!-- wp:theme/card {"style":{"color":{"text":""},"spacing":{"padding":{"right":"0","left":"0"}}},"backgroundColor":"white"} -->
        <div class="wp-block-theme-card width- has-white-background-color has-background" style="padding-right:0;padding-left:0"><div class="wp-card-block-inner-container"><!-- wp:heading {"placeholder":"Add card heading"} -->
                <h2 class="wp-block-heading">Enter title...</h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"placeholder":"Add card content..."} -->
                <p>Enter content...</p>
                <!-- /wp:paragraph --></div></div>
        <!-- /wp:theme/card -->

        <!-- wp:theme/card {"style":{"color":{"text":""}},"backgroundColor":"white","className":"is-style-outline"} -->
        <div class="wp-block-theme-card width- is-style-outline has-white-background-color has-background">
            <div class="wp-card-block-inner-container"><!-- wp:heading {"level":4,"placeholder":"Add card heading"} -->
                <h4 class="wp-block-heading has-text-align-center">Enter title...</h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"placeholder":"Add card content...","style":{"elements":{"link":{"color":{"text":"var:preset|color|theme-color-5"}}}},"textColor":"theme-color-5","fontSize":"d-md"} -->
                <p class="has-text-align-center has-theme-color-5-color has-text-color has-link-color has-d-md-font-size">Number...</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph -->
                <p class="has-text-align-center">Enter content...</p>
                <!-- /wp:paragraph --></div>
        </div>
        <!-- /wp:theme/card -->

        <!-- wp:theme/card {"style":{"color":{"text":""}},"backgroundColor":"white","className":"is-style-outline"} -->
        <div class="wp-block-theme-card width- is-style-outline has-white-background-color has-background">
            <div class="wp-card-block-inner-container"><!-- wp:heading {"level":4,"placeholder":"Add card heading"} -->
                <h4 class="wp-block-heading has-text-align-center">Enter title...</h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"placeholder":"Add card content...","style":{"elements":{"link":{"color":{"text":"var:preset|color|theme-color-5"}}}},"textColor":"theme-color-5","fontSize":"d-md"} -->
                <p class="has-text-align-center has-theme-color-5-color has-text-color has-link-color has-d-md-font-size">Number...</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph -->
                <p class="has-text-align-center">Enter content...</p>
                <!-- /wp:paragraph --></div>
        </div>
        <!-- /wp:theme/card --></div>
</div>
<!-- /wp:theme/custom-container -->
