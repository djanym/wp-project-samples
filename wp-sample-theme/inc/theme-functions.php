<?php

add_filter( 'wpcf7_autop_or_not', '__return_false' );

function testimonials_post_order( $query ) {
    if ( $query->is_main_query() && is_post_type_archive( 'testimonials' ) ) {
        $query->set( 'posts_per_page', - 1 );
        $query->set( 'orderby', 'menu_order' );
        $query->set( 'order', 'ASC' );
    }
}
add_action( 'pre_get_posts', 'testimonials_post_order' );

function theme_content_side_form( $content ) {
    ob_start();

    $ez_toc = new ezTOC_Post( get_post(), false );

    if ( is_show_toc() && $ez_toc->hasTOCItems() ) {
        $show_toc = true;
    } else {
        $show_toc = false;
    }

    $is_side_content_show = get_field( 'show_side_form' ) || $show_toc;
    if ( ! $is_side_content_show ) {
        return $content;
    }

    ?>
    <div class="side-content-container">
        <?php if ( get_field( 'show_side_form' ) ) : ?>
            <div class="content-form-block">
                <?php echo do_shortcode( '[contact-form-7 id="' . esc_attr( get_field( 'form' ) ) . '"]' ); ?>
            </div>
        <?php endif; ?>
        <?php

        if ( $show_toc ) {
            $ez_toc->toc();
            // Add this line in case using FSE theme.
            // echo do_shortcode( '[no-ez-toc]' );
        }
        ?>
    </div>
    <?php
    return ob_get_clean() . $content;
}
add_filter( 'the_content', 'theme_content_side_form', 9 );

function cf7_gtag_event() {
    ?>
    <script>
        document.addEventListener('wpcf7mailsent', function(event) {
            gtag('event', 'conversion', {
                'send_to': 'AW-10847491022/b8n9CLmDyIoYEM6nvrQo',
                'event_category': event.detail.contactFormId,
                'event_label': event.detail.unitTag
            });
        }, false);
    </script>
    <?php
}
add_action( 'wp_footer', 'cf7_gtag_event' );

/**
 * Add author block to the post content.
 *
 * @param string $content The post content.
 *
 * @return string
 */
function author_block( $content ) : string {
    if ( ! is_singular( 'post' ) ) {
        return $content;
    }

    $author_name      = get_field( 'author_name' );
    $date             = get_field( 'date' );
    $author_image_url = get_field( 'author_image' );
    $author_page_id   = get_field( 'custom_author_page' );

    if ( ! $author_name || ! $author_page_id ) {
        return $content;
    }

    ob_start();
    ?>
    <div class="author-block">
        <?php if ( $author_image_url ) : ?>
            <div class="author-image">
                <img src="<?php echo esc_url( $author_image_url ); ?>" alt="<?php echo esc_attr( $author_name ); ?>">
            </div>
        <?php endif; ?>
        <div class="description">
            <div>By:
                <a href="<?php echo esc_url( get_permalink( $author_page_id ) ); ?>"><?php echo esc_html( $author_name ); ?></a>
                <?php if ( $date ) : ?>
                    <span class="separator">|</span> <span><?php echo wp_kses_post( $date ); ?></span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean() . $content;
}
add_filter( 'the_content', 'author_block', 8 );

