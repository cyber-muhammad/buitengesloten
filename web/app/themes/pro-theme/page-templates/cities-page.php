<?php
/**
 * Template Name: Cities Page Template
 *
 * Template for displaying a page with the cities section.
 *
 * @package pro-theme
 */

get_header();
?>
<?php get_template_part('global-parts/hero-page'); ?>
<?php get_template_part('global-parts/service-categories'); ?>

<main id="primary" class="site-main mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <?php
                while (have_posts()) :
                    the_post();

                    get_template_part('template-parts/content', 'page');

                endwhile; // End of the loop.
                ?>
            </div>
        </div>
    </div>
</main><!-- #main -->

<?php

// Display the cities section - directly including the template
// to ensure it works regardless of whether the helper function is available
get_template_part('template-parts/template-cities-acf');?>

<?php get_template_part('global-parts/faq'); ?>
<?php get_template_part('global-parts/cta'); ?>

<?php
get_sidebar();
get_footer();