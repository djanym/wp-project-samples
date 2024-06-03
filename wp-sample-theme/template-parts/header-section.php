<?php
/**
 * Title: Site Header Section
 * Slug: nemontessori/header-section
 * Inserter: no
 */

use Ricubai\WPHelpers\Navwalker;
?>

<header class="container site-header scroll-offset-src">
    <div class="container nav-row">
        <div class="site-logo">
            <?php theme_site_logo(); ?>
        </div>
        <nav class="navbar-container navbar-mobile">
            <div class="navbar-mobile-header">
                <div class="site-logo">
                    <?php theme_site_logo(); ?>
                </div>
                <button class="navbar-closer" title="Menu Closer">&nbsp;</button>
            </div>
            <?php wp_nav_menu( array(
                'theme_location' => 'menu-main',
                'depth'          => 10,
                'container'      => 'ul',
                'menu_class'     => 'navbar-nav',
                'fallback_cb'    => '\Ricubai\WPHelpers\Navwalker::fallback',
                'walker'         => new Navwalker(),
            ) ); ?>
        </nav>
        <div class="navbar-menu-toggler-container">
            <button class="navbar-opener toggler-button" title="Menu Opener">
                <div class="lines"></div>
            </button>
        </div>
    </div>
</header>

