<?php
/**
 * Header Navbar 
 *
 * @package pro-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<nav class="navbar-main">
    <?php
        wp_nav_menu(
            array(
                'theme_location'  => 'menu-1',
                'container' => 'div',
                'container_id'    => '',
                'menu_class'      => 'menu-nav',
                'fallback_cb'     => '',
                'menu_id'         => '',
                'depth'           => 2,
                'walker'          => new WP_Bootstrap_Navwalker(),
            )
        );
        ?>
</nav><!-- #site-navigation -->

<div id="overlay" style="display: none;">
    <div class="site-branding mb-4 d-flex justify-content-between">
        <a href="/" class="d-flex align-items-center">
            <?php $brandLink = get_field('brand_logo', 'option'); ?>
            <img src="<?php echo esc_url($brandLink['url']); ?>" class="mx-3"
                alt="<?php echo esc_attr($brandLink['alt']); ?>" style="height: 80px" />
        </a>
        <button id="close-menu" class="close-btn"><i class="fa-regular fa-circle-xmark"></i></button>
    </div><!-- .site-branding -->
    <?php
        wp_nav_menu(
            array(
                'theme_location'  => 'menu-1',
                'container' => 'div',
                'container_id'    => '',
                'menu_class'      => 'menu-nav',
                'fallback_cb'     => '',
                'menu_id'         => '',
                'depth'           => 2,
                'walker'          => new WP_Bootstrap_Navwalker(),
            )
        );
        ?>
</div>