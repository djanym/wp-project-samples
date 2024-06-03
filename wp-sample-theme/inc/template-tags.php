<?php

use Ricubai\WPHelpers\ContentHelper;

if ( ! function_exists( 'theme_site_logo' ) ) :
    /**
     * Prints site logo HTML tag if logo is set in theme options.
     */
    function theme_site_logo() : void {
        $logo_url = get_field( 'logo', 'option' );
        if ( $logo_url ) {
            echo '<a href="' . esc_url( site_url() ) . '"><img src="' . esc_url( $logo_url ) . '" alt="Site Logo" /></a>';
        }
    }
endif;

if ( ! function_exists( 'theme_navigation' ) ) :
    function theme_navigation( $infinite_scroll = false ) {
        // For screen readers

        if ( ! $infinite_scroll ) {
            ContentHelper::paginator( [
                'prev_text'          => 'Previous',
                'next_text'          => 'Next',
                'screen_reader_text' => 'Listing pagination',
                'before_links'       => '<nav class="pagination"><ul>',
                'link_class'       => 'page-link',
            ] );

            return;
        }

        ?>
        <nav class="navigation pagination hidden">
            <div class="nav-links">
                <div class="nav-links">
                    <?php echo get_the_posts_navigation(
                        [
                            'prev_text'          => __( 'Previous', 'pango' ),
                            'next_text'          => __( 'Next', 'pango' ),
                            'screen_reader_text' => __( 'Navigation', 'pango' ),
                        ]
                    ); ?>
                </div>
            </div>
        </nav>
        <?php
    }
endif;

if ( ! function_exists( 'theme_post_footer' ) ) :
    /**
     * Prints HTML with meta information for the current post.
     */
    function theme_post_listing_footer() {
        $byline = sprintf(
        /* translators: %s: post author. */
            'By: %s | %s',
            esc_html( get_the_author() ),
            esc_html( get_the_date( 'F jS, Y' ) )
        );

        // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        echo '<span class="byline"> ' . $byline . '</span>';

        echo edit_post_link(
            'Edit post',
            '&nbsp;<span class="edit-link">',
            '</span>'
        );
    }
endif;
