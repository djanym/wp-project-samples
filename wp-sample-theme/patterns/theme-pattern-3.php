<?php
/**
 * Title: Theme Product: Title + Cards Container Pattern
 * Slug: pango/theme-pattern-3
 * Categories: theme-custom-patterns
 * Keywords: cards, container, title
 * Block Types: theme/card, theme/custom-container, heading, paragraph
 */
?>

<!-- wp:theme/custom-container {"style":{"color":{"text":""}},"backgroundColor":"theme-color-10","flexLayoutOption":true} -->
<div class="wp-block-theme-custom-container alignfull has-theme-color-10-background-color has-background">
    <div class="wp-block-group__inner-container is-layout-flex is-vertical"><!-- wp:heading {"textAlign":"center","placeholder":"Add Heading"} -->
        <h2 class="wp-block-heading has-text-align-center">Enter title</h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","placeholder":"Add content..."} -->
        <p class="has-text-align-center">Enter content...</p>
        <!-- /wp:paragraph -->

        <!-- wp:theme/custom-container {"style":{"color":{"text":"","background":"","gradient":""},"spacing":{"padding":{"top":"0","bottom":"0"}}},"gridLayoutOption":true,"gridCols":3} -->
        <div class="wp-block-theme-custom-container alignfull" style="padding-top:0;padding-bottom:0">
            <div class="wp-block-group__inner-container is-layout-grid grid-cols-3">

                <!-- wp:theme/card {"style":{"color":{"text":""}},"backgroundColor":"white"} -->
                <div class="wp-block-theme-card width- has-white-background-color has-background">
                    <div class="wp-card-block-inner-container"><!-- wp:heading {"textAlign":"center","level":4,"placeholder":"Add card heading","fontSize":"h-2"} -->
                        <h4 class="wp-block-heading has-text-align-center has-h-2-font-size">Add header...</h4>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"align":"center","placeholder":"Add card content..."} -->
                        <p class="has-text-align-center">Add content...</p>
                        <!-- /wp:paragraph --></div>
                </div>
                <!-- /wp:theme/card -->

                <!-- wp:theme/card {"style":{"color":{"text":""}},"backgroundColor":"white"} -->
                <div class="wp-block-theme-card width- has-white-background-color has-background">
                    <div class="wp-card-block-inner-container"><!-- wp:heading {"textAlign":"center","level":4,"placeholder":"Add card heading","fontSize":"h-2"} -->
                        <h4 class="wp-block-heading has-text-align-center has-h-2-font-size">Add header...</h4>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"align":"center","placeholder":"Add card content..."} -->
                        <p class="has-text-align-center">Add content...</p>
                        <!-- /wp:paragraph --></div>
                </div>
                <!-- /wp:theme/card -->

                <!-- wp:theme/card {"style":{"color":{"text":""}},"backgroundColor":"white"} -->
                <div class="wp-block-theme-card width- has-white-background-color has-background">
                    <div class="wp-card-block-inner-container"><!-- wp:heading {"textAlign":"center","level":4,"placeholder":"Add card heading","fontSize":"h-2"} -->
                        <h4 class="wp-block-heading has-text-align-center has-h-2-font-size">Add header...</h4>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"align":"center","placeholder":"Add card content..."} -->
                        <p class="has-text-align-center">Add content...</p>
                        <!-- /wp:paragraph --></div>
                </div>
                <!-- /wp:theme/card -->
            </div>
        </div>
        <!-- /wp:theme/custom-container -->

    </div>
</div>
<!-- /wp:theme/custom-container -->