<?php

/**
 * Removes part of title from Archive Page title
 *
 * @param $title
 *
 * @return string|string[]|null
 */
function _theme_slug_placeholder__archive_title_filter( $title ) {
    $title = preg_replace( '/^(Archives|Category)\: /', '', $title );

    return $title;
}
add_filter( 'get_the_archive_title', '_theme_slug_placeholder__archive_title_filter' );

/**
 * Adds async attribute to all javascript/css file includes on the page.
 *
 * @param $tag
 * @param $handle
 *
 * @return mixed
 */
function add_async_attribute( $tag, $handle, $src ) {
    if ( is_admin() ) {
        return $tag;
    }
    $tag = str_replace( ' src', ' defer="defer" src', $tag );

    return $tag;
}
//add_filter('script_loader_tag', 'add_async_attribute', 10, 3);

/**
 * Implements megamenu classes. Works with ACF for menu items
 *
 * @param $items
 * @param $args
 *
 * @return mixed
 */
function megamenu_menu_objects( $items, $args ) {
    foreach ( $items as &$item ) {
        $megamenu_option = get_field( 'megamenu', $item );
        if ( $megamenu_option == 'megamenu_container' ) {
            $item->classes[] = 'nav-columns';
        } elseif ( $megamenu_option == 'megamenu_column' ) {
            $item->classes[] = 'nav-column';
        }
    }

    return $items;
}
add_filter( 'wp_nav_menu_objects', 'megamenu_menu_objects', 10, 2 );

/**
 * Inserts post slider
 *
 * @param $content
 *
 * @return string
 */
function _theme_slug_placeholder__post_slider_content_filter( $content ) {
    // bail if feed, search or archive
    if ( is_feed() || is_search() || is_archive() || is_404() || is_archive() || ! is_single() || ! is_main_query() ) {
        return $content;
    }

    // bail if post not eligible
    $is_eligible = get_field( 'post_slider' );

    if ( ! $is_eligible ) {
        return $content;
    }

    ob_start();
    get_template_part( 'template-parts/post-content-slider' );
    $slider_content = ob_get_clean();

    return $slider_content . $content;
}
add_filter( 'the_content', '_theme_slug_placeholder__post_slider_content_filter', 5 );

/**
 * Fix for the posts with the same create date (which causes doubling in the results)
 *
 * @param $orderby
 *
 * @return string
 */
function posts_orderby_statement( $orderby ) {
    $orderby .= ", wp_posts.post_title ASC";

    return $orderby;
}
add_filter( 'posts_orderby', 'posts_orderby_statement' );

function wpcf7_head_load_js() {
    return 'header';
}
add_filter( 'wpcf7_load_js', 'wpcf7_head_load_js' );

function yoast_no_home_noindex( $value ) {
    global $post;
    if ( is_page( 'projects-gallery' ) ||
         ( isset( $post->post_parent ) && $post->post_parent === 65 ) ) {
        if ( strpos( $value, 'noindex' ) === false ) {
            $value = preg_replace( '/index[, ]*/ism', '', $value );
            $value = 'noindex, ' . $value;
        }
    }

    return $value;
}
add_filter( 'wpseo_robots', 'yoast_no_home_noindex' );

function disable_password_reset() {
    if ( is_admin() ) {
        $userdata = wp_get_current_user();
        $user     = new WP_User( $userdata->ID );
        if ( ! empty( $user->roles ) && is_array( $user->roles ) && $user->roles[0] === 'employee' ) {
            return false;
        }
    }

    return true;
}
add_filter( 'allow_password_reset', 'disable_password_reset' );

function if_employee_user_role() {
    if ( is_user_logged_in() ) {
        $user               = wp_get_current_user();
        $current_user_roles = $user->roles;
        if ( in_array( 'employee', $current_user_roles ) ) {
            return true;
        }

        return false;
    }
}

if ( if_employee_user_role() ) {
    add_filter( 'show_admin_bar', '__return_false' );
}
