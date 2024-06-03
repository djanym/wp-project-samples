<?php

/**
 * Enqueue scripts and styles.
 */
function infinite_scroll_scripts() {
    if( is_archive() || is_home() ){
        wp_enqueue_script( 'infinite-scroll', get_template_directory_uri() . '/assets/js/infinite-scroll.pkgd.min.js', ['jquery','masonry'] );
    }
}
add_action( 'wp_enqueue_scripts', 'infinite_scroll_scripts' );

/**
 * Adds special class to "next" link. Infinite scroll will select this link to fetch new page results.
 * @param $attr
 *
 * @return string
 */
function infinite_scroll_next_link_class($attr) {
    return $attr . ' class="infinite_next_link" style="display: none;"';
}
add_filter( 'next_posts_link_attributes', 'infinite_scroll_next_link_class' );
