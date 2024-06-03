<?php
/**
 * Title: Pango Pattern: List Item with Icon
 * Slug: pango/theme-icon-list-item
 * Categories: theme-custom-patterns
 *  Keywords: icon, list, pango
 *  Block Types: core/columns
 */
?>
<!-- wp:columns {"isStackedOnMobile":false,"className":"list-item-with-icon"} -->
<div class="wp-block-columns is-not-stacked-on-mobile list-item-with-icon"><!-- wp:column {"verticalAlignment":"top","width":""} -->
    <div class="wp-block-column is-vertically-aligned-top">
        <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
        <div class="wp-block-group"><!-- wp:safe-svg/svg-icon {"svgURL":"<?php echo content_url(); ?>/uploads/2024/03/list-icon.svg","imageID":671,"imageWidth":50,"imageHeight":50,"dimensionWidth":50,"dimensionHeight":50,"imageSizes":{"full":{"height":50,"width":50,"url":"<?php echo content_url(); ?>/uploads/2024/03/list-icon.svg","orientation":"portrait"},"medium":{"height":"300","width":"300","url":"<?php echo content_url(); ?>/uploads/2024/03/list-icon.svg","orientation":"portrait"},"thumbnail":{"height":"150","width":"150","url":"<?php echo content_url(); ?>/uploads/2024/03/list-icon.svg","orientation":"portrait"}}} /--></div>
        <!-- /wp:group --></div>
    <!-- /wp:column -->

    <!-- wp:column {"verticalAlignment":"top","width":""} -->
    <div class="wp-block-column is-vertically-aligned-top"><!-- wp:heading {"level":3} -->
        <h3 class="wp-block-heading">Title</h3>
        <!-- /wp:heading -->

        <!-- wp:paragraph -->
        <p>Content</p>
        <!-- /wp:paragraph --></div>
    <!-- /wp:column --></div>
<!-- /wp:columns -->