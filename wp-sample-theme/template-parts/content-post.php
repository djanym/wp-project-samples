<?php
/**
 * Template part for displaying single post
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php _theme_slug_placeholder__post_thumbnail(); ?>

    <?php google_reviews_widget(); ?>

    <section class="entry-content <?php if ( has_post_thumbnail() ) { ?>entry-content-thumbnail<?php } ?>">

        <section class="entry-header">
    		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    	</section><!-- .entry-header -->

        <?php if( get_field( 'show_request_more_button' ) ) : ?>
            <a href="<?php echo site_url('request-more-info'); ?>" class="button button-orange mb-3">Request more info</a>
        <?php endif; ?>

		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', '[theme-slug-placeholder]' ),
			'after'  => '</div>',
		) );
		?>

        <?php if( get_post_type() != 'service' ) : ?>
        <div class="archive-description">
            <strong class="mr-2"><?php echo esc_html(_theme_slug_placeholder__archive_title()); ?></strong>
            <?php echo trim( wp_list_categories( [
                'taxonomy'  => get_post_type_taxonomy_name(),
                'style'      => '',
                'separator'  => ' | ',
                'show_count' => false,
                'echo'       => false
            ] ), "|, \n\r" ); ?>
        </div>
        <?php endif; ?>

        <?php if( get_post_type() !== 'service' ) : ?>
            <div class="entry-footer article-footer">
                <?php _theme_slug_placeholder__article_footer(); ?>
            </div>

            <div class="article-share"><?php echo do_shortcode('[Sassy_Social_Share title="Share this story, Choose your platform!"]'); ?></div>

            <?php if( get_post_type() !== 'testimonial' ) : ?>
            <div class="article-author-bio">
                <strong>About the Author:</strong> <?php echo _theme_slug_placeholder__author_name(); ?>
                <div class="article-author-bio-info">
                    <?php echo do_shortcode('[avatar]'); ?>
                    <?php echo _theme_slug_placeholder__author_bio(); ?>
                </div>
            </div>
            <?php endif; ?>
        <?php endif; ?>

        <?php if ( get_edit_post_link() ) : ?>
            <section class="entry-footer py-3 text-center">
                <?php
                edit_post_link(
                    sprintf(
                        wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                            __( 'Edit <span class="screen-reader-text">%s</span>', '[theme-slug-placeholder]' ),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        get_the_title()
                    ),
                    '<span class="edit-link">',
                    '</span>'
                );
                ?>
            </section><!-- .entry-footer -->
        <?php endif; ?>

	</section><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
