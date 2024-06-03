<?php get_header(); ?>

    <main class="include-nav-padding">
            <div class="content-block-fluid wp-core">
                <header class="content-grid cover-wrapper">
                    <h1 class="entry-title breakout"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'commtask' ); ?></h1>
                </header>
                <section class="content-block-fluid wp-core content-padding-y" role="main">
                    <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'commtask' ); ?></p>

                    <?php get_search_form(); ?>
                </section>
            </div>
    </main>

<?php get_footer();
