<?php
/* Template name: Contact Us Page
 */

get_header();
?>


<div class="cover-image lazycss" data-css="background-image: url('<?php echo esc_attr(_theme_slug_placeholder__background_cover_image()); ?>');">
    <div class="site-container container-fluid">
        <main class="content">
            <div class="content-overlay-bg"></div>
            <div class="google-map">
                <div class="row">
                    <div class="col-sm-12">
                        <?php echo do_shortcode('[ultimate_maps id="1"]'); ?>
                    </div>
                </div>
            </div>
            <div class="overlay-container">
                <?php
                while ( have_posts() ) :
                    the_post();

                    ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="row contact-info">
                            <div class="col-sm-12 col-md-6 col-lg-3 my-2">
                                <strong>Massachusetts Corporate Office</strong>
                                84 New Salem St.<br>
                                Wakefield MA 01880<br>
                                P: 1-800-628-8260<br>
                                F: 1-781-224-9908<br>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3 my-2">
                                <strong>New Hampshire Office</strong>
                                3 Executive Park Drive Suite #215<br>
                                Bedford, NH 03110<br>
                                P: 1-603-589-8001<br>
                                F: 1-603-218-6245<br>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3 my-2">
                                <strong>Rhode Island Office</strong>
                                166 Valley Street, BLDG 6M,<br>
                                Providence, RI 02909<br>
                                P: 1-401-735-2339<br>
                                F: 1-401-735-2340<br>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3 my-2">
                                <strong>Connecticut Office</strong>
                                1 Darling Drive, STE 9<br>
                                Avon, CT 06001<br>
                                P: 1-401-735-2339<br>
                                F: 1-401-735-2340<br>
                            </div>
                        </div>
                        <p class="has-text-align-center"><strong>Mon - Fri: 7am - 5pm</strong></p>

                        <div class="entry-content">
                            <header class="entry-header">
                                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                            </header><!-- .entry-header -->

                            <?php
                            the_content();

                            wp_link_pages( array(
                                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ajfoss' ),
                                'after'  => '</div>',
                            ) );
                            ?>
                        </div><!-- .entry-content -->

                        <?php if ( get_edit_post_link() ) : ?>
                            <footer class="entry-footer text-center py-3">
                                <?php
                                edit_post_link(
                                    sprintf(
                                        wp_kses(
                                        /* translators: %s: Name of current post. Only visible to screen readers */
                                            __( 'Edit <span class="screen-reader-text">%s</span>', 'ajfoss' ),
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
                            </footer><!-- .entry-footer -->
                        <?php endif; ?>
                    </article>

                <?php

                endwhile; // End of the loop.
                ?>

            </div><!-- #overlay -->
        </main><!-- #main -->
    </div><!-- #primary -->
</div><!-- #cover -->

<?php
get_footer();
