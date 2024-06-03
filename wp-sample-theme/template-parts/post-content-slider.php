<?php
/**
 * Template part for displaying post content slider
 */

if ( have_rows( 'post_slider' ) ) : ?>

    <div class="post-slider">
        <div id="carouselPostSlider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php while( have_rows( 'post_slider' ) ) : the_row(); ?>
                    <div class="carousel-item <?php echo get_row_index() == 1 ? 'active' : ''; ?>">
                        <img src="<?php the_sub_field( 'image' ); ?>" alt="slide">
                        <?php if ( get_sub_field( 'image_note' ) ) : ?>
                            <div class="carousel-caption"><?php the_sub_field( 'image_note' ); ?></div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
            <a class="carousel-control-prev" href="#carouselPostSlider" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselPostSlider" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
<?php endif;
