<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package [theme-slug-placeholder]
 */

get_header();
?>

<div class="cover-image lazycss" data-css="background-image: url('<?php echo esc_attr(_theme_slug_placeholder__background_cover_image()); ?>');">
    <div class="site-container container-fluid">

        <main class="content blog-page">
            <div class="content-overlay-bg"></div>
            <div class="overlay-container">

				<?php if ( have_posts() ) : ?>

					<section class="page-header">
                    	<h1 class="page-title">
							<?php
							/* translators: %s: search query. */
							printf( esc_html__( 'Search Results for: %s', '[theme-slug-placeholder]' ), '<span>' . get_search_query() . '</span>' );
							?>
						</h1>

                        <?php if( get_post_type() != 'testimonial' ) : ?>
                            <form role="search" method="get" class="search-form" action="<?php echo get_post_type_archive_link( get_archive_post_type() ); ?>">
                                <div class="input-group justify-content-center mb-4">
                                    <label class="screen-reader-text hidden" for="s">Search for:</label>
                                    <input type="search" class="search-field form-control"
                                           placeholder="<?php echo esc_attr( _theme_slug_placeholder__get_archive_search_label() ); ?>"
                                           value="<?php echo get_search_query(); ?>" name="s" id="s" />
                                    <div class="input-group-prepend">
                                        <input type="submit" class="search-submit input-group-text" value="Search">
                                    </div>
                                </div>
                            </form>
                        <?php endif; ?>

                        <div class="archive-description">
                            <strong class="mr-2"><?php echo esc_html(_theme_slug_placeholder__archive_title()); ?>:</strong>
                            <?php echo trim( wp_list_categories( [
                                'taxonomy'   => get_post_type_taxonomy_name(),
                                'style'      => '',
                                'separator'  => ' | ',
                                'show_count' => false,
                                'echo'       => false
                            ] ), "|, \n\r" ); ?>
                        </div>

                    </section><!-- .page-header -->					
                    
                    <div class="row posts_container" id="infinite_scroll_container">
                        <?php while ( have_posts() ) :
                            the_post();
                            /**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
                            get_template_part( 'template-parts/content' );
                        endwhile;
                        ?>
                    </div>

                    <?php _theme_slug_placeholder__navigation(); ?>

					<?php
					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
			</div><!-- #overlay -->
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- #cover -->

<?php
get_footer();
