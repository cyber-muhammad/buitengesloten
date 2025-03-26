<?php
/**
 * Template Name: Contact Page Template
 *
 * Template for displaying a contact page.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
get_header();
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'global-parts/hero-page'); ?>
<div class="wrapper" id="page-wrapper">
    <div class="container">
        <div class="row">
            <main class="site-main mt-5 mb-5" id="main">
                <section id="contact">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="info-container d-flex flex-column">
                                <div class="intro-text">
                                    <h2>Neem Contact met Ons Op</h2>
                                    <p>Is er sprake van een noodgeval? Een verstopping die zo snel mogelijk opgelost
                                        moet worden? Of wil je graag meer informatie over onze diensten? Aarzel niet en
                                        neem direct contact met ons op.</p>
                                    <p>Onze ervaren en professionele loodgieters staan altijd klaar om je vragen te
                                        beantwoorden en de juiste oplossing voor jouw probleem te bieden.</p>
                                    <p>Je kunt ons telefonisch bereiken voor een directe reactie of een e-mail sturen en
                                        we zullen zo snel mogelijk reageren.</p>
                                    <p>Wij streven ernaar om de best mogelijke service te bieden, gebaseerd op
                                        kwaliteit, snelheid en klanttevredenheid. Neem vandaag nog contact met ons op en
                                        ontdek hoe we je kunnen helpen!</p>
                                </div>

                                <div class="info-item shadow d-flex"> <i class="bi bi-envelope flex-shrink-0"></i>
                                    <div>
                                        <h4>Email:</h4>
                                        <?php echo do_shortcode('[email_address]') ?>
                                    </div>
                                </div>
                                <div class="info-item shadow d-flex"> <i class="bi bi-phone flex-shrink-0"></i>
                                    <div>
                                        <h4>Bel:</h4>
                                        <?php echo do_shortcode('[phone_number class="link"]') ?>
                                    </div>
                                </div>
                                <div class="info-item shadow d-flex"> <i class="bi bi-clock flex-shrink-0"></i>
                                    <div>
                                        <h4>Openingsuren:</h4>
                                        <p>24/7</p>
                                    </div>
                                </div>
                                <div class="social-item d-flex justify-content-center"> <i
                                        class="bi bi-clock flex-shrink-0"></i>
                                    <!-- <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-facebook"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-youtube"></i></a> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="title-section text-center mb-5">
                            </div>
                            <?php echo do_shortcode ('[contact-form-7 id="120" title="Contact Form - Contact Page"]') ?>
                        </div>
                    </div>
                </section>
            </main><!-- #main -->

        </div><!-- .row -->
    </div>

</div><!-- #content -->


<?php
get_footer();