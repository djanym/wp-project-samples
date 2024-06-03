<?php
/**
 * Title: Archive Header Block
 * Slug: nemontessori/archive-header-block
 * Inserter: no
 */

use Ricubai\WPHelpers\ContentHelper;

$cover_image_url = false;
$cover_image_css = '';

$show_custom_header = false;
if ( ! is_post_type_archive( 'testimonials' ) && ! is_author() && ! is_search() ) {
    $show_custom_header = true;
}

if ( $show_custom_header ) {
    $blog_page_id        = get_option( 'page_for_posts' );
    $archive_description = get_field( 'below_title_content', $blog_page_id );

    $cover_image_url = ContentHelper::get_cover_image_src();
    if ( $cover_image_url ) {
        $cover_image_css = "background-image: url('{$cover_image_url}');";
    }
} else {
    $archive_description = get_field( get_post_type() . '_archive_below_title_content', 'options' );
}

$classes = '';
if ( $cover_image_url ) {
    $classes = ' has-cover-image-bg';
}

?>

    <section class="container archive-header-section lazycss <?php echo esc_attr( $classes ); ?>"
             data-css="<?php echo esc_attr( $cover_image_css ); ?>">
        <div class="content-block">
            <?php if ( $show_custom_header ) : ?>
                <h1 class="page-title"><?php echo esc_html( get_the_title( get_option( 'page_for_posts' ) ) ); ?></h1>
            <?php endif; ?>

            <?php if ( is_archive() ) : ?>
                <h1 class="page-title"><?php the_archive_title(); ?></h1>
            <?php endif; ?>

            <?php if ( is_search() ) : ?>
                <h1 class="page-title">Search results</h1>
            <?php endif; ?>

            <?php if ( $archive_description ) : ?>
                <div class="archive-header-content">
                    <?php echo wp_kses_post( $archive_description ); ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

<?php if ( $show_custom_header ) : ?>
    <section class="container archive-header-section secondary">
        <div class="content-block">
            <div class="archive-header-content categories-list">
                <label>Categories:</label>
                <?php echo trim(
                    wp_list_categories( [
                        'taxonomy'   => 'category',
                        'style'      => '',
                        'separator'  => ' <span class="separator">|</span> ',
                        'show_count' => true,
                        'echo'       => false,
                    ] ),
                    "|, \n\r"
                ); ?>
            </div>
            <?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
        </div>
    </section>
<?php endif;

if ( is_search() ) : ?>
    <section class="container archive-header-section secondary">
        <div class="content-block">
            <div class="archive-header-content search-query">
                <?php
                printf(
                    'Search Results for: %s',
                    '<span>' . get_search_query() . '</span>'
                );
                ?>
            </div>
            <div class="archive-header-content categories-list">
                <?php get_search_form(); ?>
            </div>
        </div>
    </section>
<?php endif;
