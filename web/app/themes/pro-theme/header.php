<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package theme-pro
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>
<?php $brandLink = get_field('brand_logo', 'option'); ?>

<div class="mobile-call-button">
    <span>Bel Snel!</span>
    <?php echo do_shortcode('[phone_number icon="fa-solid fa-phone-volume" id="mobile-call-button"]') ?>
</div>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text"
            href="#primary"><?php esc_html_e( 'Skip to content', 'theme-pro' ); ?></a>

            <header id="masthead" class="site-header">
            <?php get_template_part( 'global-templates/topbar'); ?>
            <section id="navigation">
                <div class="container d-flex align-items-center justify-content-between p-2">
                    <div class="site-branding">
                        <a href="/" class="d-flex align-items-center">
                            <img src="<?php echo esc_url($brandLink['url']); ?>" width="180" height="90" class="mx-3"
                                alt="<?php echo esc_attr($brandLink['alt']); ?>"></a>
                    </div><!-- .site-branding -->
                    <?php get_template_part( 'global-parts/navbar'); ?>
                    <div class="mobile-menu d-flex justify-content-between">
                        <a id="burger-menu" class="burger"></a>
                    </div>
                    <div class="contact-buttons">
                        <a href="/contact/" class="button-primary">Afspraak maken</a>
                    </div>
                </div>
            </section>
        </header><!-- #masthead -->