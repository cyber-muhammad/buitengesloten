<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package pro-theme
 */

get_header();
?>
<?php get_template_part( 'global-parts/hero-page'); ?>
<main id="primary" class="site-main">
    <section class="error-404 not-found">
        <div class="section-content">

            <div class="container">
                <div class="row">
                    <main class="site-main mt-5 mb-5 d-flex flex-direction-column justify-content-center" id="main">
                        <div class="row">
                            <div class="page404 p-5 col-lg-12">
                                <h1>404</h1>
                                <h3>Oops deze pagina bestaat niet (meer)</h3>
                                <p>Klik <a href="/">HIER</a> om terug te gaan naar hoofdpagina</p>
                            </div>
                        </div>
                    </main>
                </div>
            </div>

        </div>
    </section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();