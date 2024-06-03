<?php

function gutenberg_2column_block_init() {
    acf_register_block_type( array(
        'name'            => 'two-column-custom-layout',
        'title'           => __( 'Homepage 2 Columns', '[theme-slug-placeholder]' ),
        'description'     => __( 'Custom 2 columns block.', '[theme-slug-placeholder]' ),
        'render_template' => 'template-parts/blocks/2columns.php',
        'category'        => 'layout',
        'icon'            => 'align-right',
        'keywords'        => array( 'column', 'image', 'home', 'text' ),
    ) );
}
add_action( 'acf/init', 'gutenberg_2column_block_init' );

function gutenberg_services_grid_listing_block_init() {
    acf_register_block_type( array(
        'name'            => 'services-grid-listing',
        'title'           => __( 'Homepage Services Grid Listing', '[theme-slug-placeholder]' ),
        'description'     => __( 'Displays services listing in custom grid style.', '[theme-slug-placeholder]' ),
        'render_template' => 'template-parts/blocks/services-grid-listing.php',
        'category'        => 'embed',
        'icon'            => 'grid-view',
        'keywords'        => array( 'grid', 'post', 'listing' ),
    ) );
}
add_action( 'acf/init', 'gutenberg_services_grid_listing_block_init' );
