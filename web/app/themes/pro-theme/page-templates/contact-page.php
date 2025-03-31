<?php
/**
 * Template Name: Contact Page
 * Description: A custom template for the contact page
 */

get_header();
?>

<main>
<?php get_template_part( 'global-parts/hero-page'); ?>

    <!-- Contact Us Section -->
    <section class="contact-us-wrapper">
        <div class="container">

            <!-- Section Title -->
            <div class="row mt-5">
                <div class="col-lg-8 col-xl-6 offset-xl-3 offset-lg-2 text-center">
                    <div class="block-contents">
                        <div class="section-title mb-5">
                            <h2><?php echo __('Contacteer ons', 'slotenmaker'); ?></h2>
                            <p><?php echo get_field('contact_description'); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form and cards -->
            <div class="row">
                <div class="col-lg-6 pe-lg-4 order-2 order-lg-1 mb-5 mb-lg-0">
                <div class="row text-center">
                <!-- Changed from horizontal to vertical layout by removing column classes -->
                <div class="col-12 mb-4">
                    <a href="tel:<?php echo get_field('phone_number'); ?>" style="text-decoration: none; color: inherit;">
                        <div class="single-contact-box box1">
                            <div class="icon">
                                <svg stroke="currentColor" fill="#1A76D1" stroke-width="0" viewBox="0 0 1024 1024" height="40px" width="40px" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M721.7 184.9L610.9 295.8l120.8 120.7-8 21.6A481.29 481.29 0 0 1 438 723.9l-21.6 8-.9-.9-119.8-120-110.8 110.9 104.5 104.5c10.8 10.7 26 15.7 40.8 13.2 117.9-19.5 235.4-82.9 330.9-178.4s158.9-213.1 178.4-331c2.5-14.8-2.5-30-13.3-40.8L721.7 184.9z"></path>
                                    <path d="M877.1 238.7L770.6 132.3c-13-13-30.4-20.3-48.8-20.3s-35.8 7.2-48.8 20.3L558.3 246.8c-13 13-20.3 30.5-20.3 48.9 0 18.5 7.2 35.8 20.3 48.9l89.6 89.7a405.46 405.46 0 0 1-86.4 127.3c-36.7 36.9-79.6 66-127.2 86.6l-89.6-89.7c-13-13-30.4-20.3-48.8-20.3a68.2 68.2 0 0 0-48.8 20.3L132.3 673c-13 13-20.3 30.5-20.3 48.9 0 18.5 7.2 35.8 20.3 48.9l106.4 106.4c22.2 22.2 52.8 34.9 84.2 34.9 6.5 0 12.8-.5 19.2-1.6 132.4-21.8 263.8-92.3 369.9-198.3C818 606 888.4 474.6 910.4 342.1c6.3-37.6-6.3-76.3-33.3-103.4zm-37.6 91.5c-19.5 117.9-82.9 235.5-178.4 331s-213 158.9-330.9 178.4c-14.8 2.5-30-2.5-40.8-13.2L184.9 721.9 295.7 611l119.8 120 .9.9 21.6-8a481.29 481.29 0 0 0 285.7-285.8l8-21.6-120.8-120.7 110.8-110.9 104.5 104.5c10.8 10.8 15.8 26 13.3 40.8z"></path>
                                </svg>
                            </div>
                            <div class="contact-info">
                                <span><?php echo __('Bel ons', 'slotenmaker'); ?></span>
                                <span><?php echo get_field('phone_number'); ?></span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 mb-4">
                    <a href="mailto:<?php echo get_field('email_address'); ?>" style="text-decoration: none; color: inherit;">
                        <div class="single-contact-box box2">
                            <div class="icon">
                                <svg stroke="currentColor" fill="#28a745" stroke-width="0" viewBox="0 0 512 512" height="40px" width="40px" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path>
                                </svg>
                            </div>
                            <div class="contact-info">
                                <span><?php echo __('Mail ons', 'slotenmaker'); ?></span>
                                <span><?php echo get_field('email_address'); ?></span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 mb-4">
                    <div class="single-contact-box box3">
                        <div class="icon">
                            <svg stroke="currentColor" fill="#ffc107" stroke-width="0" viewBox="0 0 512 512" height="40px" width="40px" xmlns="http://www.w3.org/2000/svg">
                                <path d="M256,8C119,8,8,119,8,256S119,504,256,504,504,393,504,256,393,8,256,8Zm92.49,313h0l-20,25a16,16,0,0,1-22.49,2.5h0l-67-49.72a40,40,0,0,1-15-31.23V112a16,16,0,0,1,16-16h32a16,16,0,0,1,16,16V256l58,42.5A16,16,0,0,1,348.49,321Z"></path>
                            </svg>
                        </div>
                        <div class="contact-info">
                            <span><?php echo __('Openingsuren', 'slotenmaker'); ?></span>
                            <span><?php echo get_field('opening_hours'); ?></span>
                        </div>
                    </div>
                </div>
            </div>
                </div>

                <!-- Contact Form -->
                <div class="col-lg-6 ps-lg-4 order-1 order-lg-2">
                    <div class="contact-form">
                        <?php
                        // Check if Contact Form 7 is active
                        if (function_exists('wpcf7_contact_form')) {
                            // First try to get the form ID from ACF field
                            $form_id = get_field('contact_form_id');
                            
                            if (!empty($form_id)) {
                                // Use the form ID from ACF field
                                echo do_shortcode('[contact-form-7 id="' . $form_id . '"]');
                            } else {
                                // Fallback to hardcoded ID
                                echo do_shortcode('[contact-form-7 id="30e185d" title="Form - Contact Page"]');
                            }
                        } else {
                            // Display a static form if Contact Form 7 is not active
                            ?>

                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>