<?php
get_header();
?>

    <main class="include-nav-padding">
        <?php
        if ( have_posts() ) : while ( have_posts() ) :
            the_post();
            ?>
            <div class="content-block-fluid wp-core">
                <h1 class="post-title"><?php the_title(); ?></h1>
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
