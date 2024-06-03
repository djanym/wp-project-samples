<?php

function is_show_toc() {
    $toc_options = get_option( 'ez-toc-settings' );
    $post_type   = get_post_type();

    if ( ! $toc_options || ! is_singular() ) {
        return false;
    }

    $post_id = get_the_ID();

    // If autoinsert enabled for this post type and not disabled for a specific post.
    if ( isset( $toc_options['auto_insert_post_types'][ $post_type ] ) && ! get_post_meta( $post_id, '_ez-toc-disabled', true ) ) {
        return true;
    }

    // If autoinsert not enabled but this post type supports TOC. Then check if this specific post has TOC enabled.
    if ( isset( $toc_options['enabled_post_types'][ $post_type ] ) && get_post_meta( $post_id, '_ez-toc-insert', true ) ) {
        return true;
    }

    return false;
}

/**
 * Show the TOC outside the the_content().
 */
function show_toc_outside_content() {
    if ( is_singular() ) {
        echo do_shortcode( '[ez-toc]' );

        // Add the TOC container class to hide it in the content section.
        add_filter( 'ez_toc_container_class', static function( $classes ) {
            $classes[] = 'display-none';

            return $classes;
        }, 10, 2 );

        // Disables the TOC from being added again. - Now working for manual insertion.
//        echo do_shortcode( '[no-ez-toc]' );
        // Remove the filter to prevent the TOC from being added again. - Now working for manual insertion.
//        remove_filter( 'the_content', array( 'ezTOC', 'the_content' ), 10 );
//        remove_filter( 'the_content', array( 'ezTOC', 'the_content' ), 100 );
//        add_filter( 'ez_toc_maybe_apply_the_content_filter', '__return_false', 110 );
    }
}

function toc_container_class( $default_value ) {
    if ( ! $default_value ) {
        return 'theme-toc-container';
    }

    return $default_value;
}
add_filter( 'ez_toc_get_option_css_container_class', 'toc_container_class' );
