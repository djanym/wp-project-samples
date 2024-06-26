<?php

function theme_testimonials_post_type() {

    $labels = array(
        'name'                  => 'Testimonials',
        'singular_name'         => 'Testimonial',
        'menu_name'             => 'Testimonials',
        'name_admin_bar'        => 'Testimonial',
        'archives'              => 'Testimonial Archives',
        'attributes'            => 'Testimonial Attributes',
        'parent_item_colon'     => 'Parent Testimonial:',
        'all_items'             => 'All Testimonials',
        'add_new_item'          => 'Add New Testimonial',
        'add_new'               => 'Add New',
        'new_item'              => 'New Testimonial',
        'edit_item'             => 'Edit Testimonial',
        'update_item'           => 'Update Testimonial',
        'view_item'             => 'View Testimonial',
        'view_items'            => 'View Testimonials',
        'search_items'          => 'Search Testimonial',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image'    => 'Use as featured image',
        'insert_into_item'      => 'Insert into item',
        'uploaded_to_this_item' => 'Uploaded to this item',
        'items_list'            => 'Testimonials list',
        'items_list_navigation' => 'Testimonials list navigation',
        'filter_items_list'     => 'Filter items list',
    );
    $args   = array(
        'label'               => 'Testimonial',
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'page-attributes', 'thumbnail' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => 'testimonials',
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'show_in_rest'        => true,
    );
    register_post_type( 'testimonials', $args );
}
add_action( 'init', 'theme_testimonials_post_type', 0 );
