<?php
/**
 * Title: Page Header Block
 * Slug: theme/page-header-block
 * Inserter: no
 */

use Ricubai\WPHelpers\ContentHelper;

$cover_image_url = false;
$cover_image_css = '';

if ( has_post_thumbnail() ) {
    $cover_image_url = ContentHelper::get_cover_image_src();
    $cover_image_css = "background-image: url('{$cover_image_url}');";
}
?>

<section class="container entry-header-section lazycss <?php echo $cover_image_url ? 'has-cover-image-bg' : ''; ?>"
         data-css="<?php echo esc_attr( $cover_image_css ); ?>">
    <div class="content-block">
        <h1 class="page-title"><?php the_title(); ?></h1>

        <?php if ( get_field( 'below_title_content' ) ) : ?>
            <div class="page-header-content">
                <?php the_field( 'below_title_content' ); ?>
            </div>
        <?php endif; ?>
    </div>
</section>
