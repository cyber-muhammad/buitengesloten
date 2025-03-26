<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pro-theme
 */

get_header();
?>
<?php get_template_part( 'global-parts/hero-page'); ?>
<?php get_template_part( 'global-parts/service-categories'); ?>
<main id="primary" class="site-main mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>
            </div>
        </div>
    </div>
</main><!-- #main -->
<?php get_template_part('global-parts/faq'); ?>
<?php get_template_part( 'global-parts/cta'); ?>

<?php
get_sidebar();
get_footer();