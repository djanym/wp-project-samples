<?php
/**
 * Title: Site Footer Section
 * Slug: nemontessori/footer-section
 * Inserter: no
 */

use Ricubai\WPHelpers\Navwalker;

$footer_bottom_content   = get_field( 'footer_bottom_content', 'option' );
?>
<footer class="site-footer">
    <div class="content-block nav-row">
        <nav class="navbar-container">
            <?php wp_nav_menu( array(
                'theme_location' => 'menu-footer',
                'depth'          => 1,
                'container'      => 'ul',
                'menu_class'     => 'navbar-nav',
                'fallback_cb'    => '\Ricubai\WPHelpers\Navwalker::fallback',
                'walker'         => new Navwalker(),
            ) ); ?>
        </nav>
    </div>
    <div class="content-block">
        <div class="bottom-content"><?php echo wp_kses_post( do_shortcode( get_field( 'footer_bottom_content', 'option', false, false ) ) ); ?></div>
    </div>
</footer>