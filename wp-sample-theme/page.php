<?php
get_header();
?>

    <main class="include-nav-padding">
        <?php
        if ( have_posts() ) : while ( have_posts() ) :
            the_post();
            get_template_part( 'patterns/page-header-block' );

            get_template_part( 'patterns/business-review-block' );
            ?>
            <div class="content-block-fluid wp-core">
                <?php

                get_template_part( 'patterns/content', 'page' );
                ?>
            </div>

        <?php

        endwhile; // End of the loop.

        else :
            get_template_part( 'patterns/content', 'none' );
        endif;
        ?>
    </main>

<?php
get_footer();
