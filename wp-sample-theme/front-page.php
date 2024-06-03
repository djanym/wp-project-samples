<?php
get_header();
?>
    <main class="">
        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <div class="content-block-fluid wp-core include-nav-padding">
                <?php

                get_template_part( 'patterns/content', 'page' );
                ?>
            </div>

        <?php

        endwhile; // End of the loop.
        ?>
    </main>
<?php
get_footer();
