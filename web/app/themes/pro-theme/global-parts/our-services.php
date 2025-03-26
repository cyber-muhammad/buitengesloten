<?php
// File: global-parts/section-our-services.php

if (!function_exists('get_field')) {
    echo "ACF is not active or not installed.";
    return;
}

if (!have_rows('page_sections', 'option')) {
    echo "The 'page_sections' field is not found or empty in the options page.";
    return;
}

$found_services_section = false;

if (have_rows('page_sections', 'option')) :
    while (have_rows('page_sections', 'option')) : the_row();
        if (get_row_layout() == 'services_section') :
            $found_services_section = true;
            $title = get_sub_field('title');
            ?>
            <section class="our-services-wrapper section-padding pt-0">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 offset-xl-2 text-center">
                            <div class="section-title">
                                <h2><?php echo esc_html($title); ?></h2>
                            </div>
                        </div>
                    </div>
                    <?php if (have_rows('services_section', 'option')) : ?>
                        <div class="row">
                            <?php while (have_rows('services_section', 'option')) : the_row();
                                $service_title = get_sub_field('service_title');
                                $service_slug = get_sub_field('service_slug');
                                $service_icon = get_sub_field('service_icon');
                                $service_description = get_sub_field('service_description');
                                ?>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <a href="/diensten/<?php echo esc_attr($service_slug); ?>" class="service-card">
                                        <div class="service-card-inner">
                                            <div class="service-icon">
                                                <?php 
                                                if ($service_icon) {
                                                    echo wp_get_attachment_image($service_icon['ID'], 'thumbnail', false, array('alt' => $service_title));
                                                } else {
                                                    echo "No icon found";
                                                }
                                                ?>
                                            </div>
                                            <h3><?php echo esc_html($service_title); ?></h3>
                                            <p><?php echo esc_html($service_description); ?></p>
                                        </div>
                                    </a>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php else : ?>
                        <p>No services found.</p>
                    <?php endif; ?>
                </div>
            </section>
            <?php
        endif;
    endwhile;
endif;

if (!$found_services_section) {
    echo "No 'services_section' layout found in the 'page_sections' field.";
}
?>