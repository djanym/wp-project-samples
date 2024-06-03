<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 * @package pango
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 *
 * @return array
 */
function pango_body_classes( $classes ) {
    // Adds a class of hfeed to non-singular pages.
    if ( ! is_singular() ) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if ( ! is_active_sidebar( 'sidebar-1' ) ) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}
add_filter( 'body_class', 'pango_body_classes' );

function pango_get_service_posts_by_term( $term_id ) {
    if ( ! (int) $term_id ) {
        return NULL;
    }
    $posts = get_posts( array(
        'post_type'   => 'service',
        'numberposts' => - 1,
        'tax_query'   => array(
            array(
                'taxonomy' => 'service_type',
                'field'    => 'id',
                'terms'    => $term_id
            )
        ),
        'meta_key'    => 'homepage_listing_title',
        'orderby'     => 'meta_value',
        'order'       => 'asc'
    ) );

    return $posts;
}

function pango_get_archive_search_label() {
//    $pt_name = get_current_query_post_type();
    $pt_name = get_archive_post_type();
    if ( $pt_name ) {
        $pt           = get_post_type_object( $pt_name );
        $search_label = isset( $pt->labels->search_items ) ? $pt->labels->search_items : 'Search News';
        if( $search_label == 'Search Posts' ){
            $search_label = 'Search News';
        }
    } else {
        $obj = get_queried_object();
        if ( get_class( $obj ) == 'WP_Term' ) {
            $search_label = 'Search in ' . $obj->name;
        } else {
            $search_label = 'Search News';
        }
    }

    return $search_label;
}
