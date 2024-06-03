<?php
/**
 * Theme functions and definitions.
 */

use Ricubai\WPHelpers\AdminHelper;
use Ricubai\WPHelpers\ConfigHelper;
use Ricubai\WPHelpers\ContentHelper;
use Ricubai\WPHelpers\WpBlocksHelper;

require get_template_directory() . '/vendor/autoload.php';
require get_template_directory() . '/inc/custom-post-types.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/toc.php';
require get_template_directory() . '/inc/theme-functions.php';

ConfigHelper::disableAllExcept( [
    'admin_bar',
] );

ConfigHelper::disable_easy_toc_debug();

ConfigHelper::simplify_nav_classes();

AdminHelper::globalContentPage( [
    'page_title' => 'Global Content',
    'menu_title' => 'Global Content',
] );

AdminHelper::hide_blogpage_editor();
//AdminHelper::hide_page_cpt_featured_image();

ConfigHelper::excerpt_length( 20 );
ConfigHelper::excerpt_more( '...', false );
ConfigHelper::remove_archive_title_prefix();

ContentHelper::set_cover_image_field_source( 'wp_featured_image_only=1' ); // ?
ContentHelper::year_shortcode();

//WpBlocksHelper::register_block( __DIR__ . '/wp-blocks/custom-container' );

WpBlocksHelper::add_editor_block_category( [
    'slug'  => 'theme-custom-blocks',
    'title' => 'Theme Custom Blocks',
] );

WpBlocksHelper::add_editor_pattern_category(
    'theme-custom-patterns',
    [
        'label' => 'Theme Patterns',
    ]
);

WpBlocksHelper::remove_block_default_styles();

// Prevent caching. For testing purposes. Remove this line in production.
if ( defined( 'DISABLE_THEME_CSS_CACHE' ) && DISABLE_THEME_CSS_CACHE ) {
    define( 'CSS_FILES_VERSION', time() );
    define( 'JS_FILES_VERSION', time() );
} else {
    define( 'CSS_FILES_VERSION', false );
    define( 'JS_FILES_VERSION', false );
}

if ( ! function_exists( 'theme_setup' ) ) :
    function theme_setup() {
//        load_theme_textdomain( 'nemontessori', get_template_directory() . '/inc/languages' );
//        add_theme_support( 'custom-logo' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'align-wide' );
        add_theme_support( 'custom-spacing' );
        add_theme_support( 'justify' );
        add_theme_support( 'appearance-tools' );
//        add_theme_support( 'border' );

        // Fully remove patterns bundled with WordPress core from being accessed in the Inserter.
        remove_theme_support( 'core-block-patterns' );

        // Remove access to the Template Editor. Prevents the ability to create or edit.
//        remove_theme_support( 'block-templates' );

        // Disable default layout styles. Including .is-constrained, gaps, .alignwide.
//        add_theme_support( 'disable-layout-styles' );

        /**
        $default_color_palette = [];
        // If you want to merge default color palette with custom colors, then uncomment below.
        // Get default core color palette from wp-includes/theme.json
        if ( class_exists( 'WP_Theme_JSON_Resolver' ) ) {
            $settings = WP_Theme_JSON_Resolver::get_core_data()->get_settings();
            if ( isset( $settings['color']['palette']['default'] ) ) {
                $default_color_palette = $settings['color']['palette']['default'];
            }
        }
        // Add custom palettes merged with existing.
        add_theme_support( 'editor-color-palette', array_merge( $default_color_palette, array(
            array(
                'name'  => esc_attr__( 'Pango color 1', 'nemontessori' ),
                'slug'  => 'theme-color-1',
                'color' => '#F1F7FB',
            ),
        ) ) );
        */

        add_image_size( 'post-thumbnail', 500, 500, false );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'menu-main'   => esc_html__( 'Primary', 'nemontessori' ),
            'menu-footer' => esc_html__( 'Footer', 'nemontessori' ),
        ) );
    }
endif;
add_action( 'after_setup_theme', 'theme_setup', 20 );

/**
 * Add custom settings to theme.json.
 *
 * @param WP_Theme_JSON_Data $theme_json The theme.json object.
 *
 * @return WP_Theme_JSON_Data The modified theme.json object.
 */
function theme_json( $theme_json ) {
    if ( ! file_exists( get_template_directory() . '/wp-blocks.config.json' ) ) {
        return $theme_json;
    }

    // Read the JSON file contents and decode the JSON string into an associative array.
    $config = wp_json_file_decode( get_template_directory() . '/wp-blocks.config.json', 'associative=true' );

    // Check if JSON decoding was successful.
    if ( $config === null && json_last_error() !== JSON_ERROR_NONE ) {
        // Just return the original theme JSON data.
        return $theme_json;
    }

    // Use this if you want to modify the theme.json data via PHP.
    /**
     * $new_data = [
     * 'version'  => 2,
     * 'settings' => [
     * 'typography' => [
     * 'fluid'     => true,
     * ],
     * ],
     * ];
     */

    // Return the modified theme JSON data.
    return $theme_json->update_with( $config );
}
add_filter( 'wp_theme_json_data_default', 'theme_json' );

/**
 * Enqueue scripts and styles.
 */
function theme_assets() {
    wp_enqueue_script( 'theme-js', get_template_directory_uri() . '/assets/js/build/theme.js', [ 'jquery' ], JS_FILES_VERSION, [ 'in_footer' => true ] );
    wp_enqueue_style( 'dashicons' );
    wp_enqueue_style( 'theme-styles', get_template_directory_uri() . '/assets/css/styles.min.css', [], CSS_FILES_VERSION );
    // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
    wp_enqueue_style( 'google-fonts-lato', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,400;1,700&display=swap', false, null );
    // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
    wp_enqueue_style( 'google-fonts-mulish', 'https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap', false, null );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'theme_assets' );

/**
 * For editor content only. Works for both front-end and inside the editor content.
 *
 * @return void
 */
function theme_editor_content_assets() {
    if ( is_admin() ) {
        wp_enqueue_script( 'theme-block-editor', get_template_directory_uri() . '/assets/js/build/theme_block_editor.js', [ 'wp-blocks', 'wp-dom' ], JS_FILES_VERSION, [ 'in_footer' => true ] );

        wp_enqueue_style( 'theme-editor-styles', get_template_directory_uri() . '/assets/css/wp-editor-style.min.css', [], CSS_FILES_VERSION );

        // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
        wp_enqueue_style( 'google-fonts-lato', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,400;1,700&display=swap', false );
        // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
        wp_enqueue_style( 'google-fonts-mulish', 'https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap', false );
    }
}
add_action( 'enqueue_block_assets', 'theme_editor_content_assets' );

/**
 * Editor scripts and styles. Not for front-end or inside the editor content.
 * For inside the editor content use `enqueue_block_assets` action.
 *
 * @return void
 */
function theme_editor_assets() {
    /**
     * Uncomment this line if you want to load the script on the editor page.
     *
    wp_enqueue_script( 'theme-block-editor', get_template_directory_uri() . '/assets/js/build/theme_block_editor.js', [ 'wp-blocks', 'wp-dom' ], JS_FILES_VERSION, [ 'in_footer' => true ] );
    */
}
add_action( 'enqueue_block_editor_assets', 'theme_editor_assets' );

function theme_resource_hints( $urls, $relation_type ) {
    if ( wp_style_is( 'google-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
        $urls[] = array(
            'href' => 'https://fonts.googleapis.com',
        );
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin',
        );
    }

    return $urls;
}
add_filter( 'wp_resource_hints', 'theme_resource_hints', 20, 2 );
