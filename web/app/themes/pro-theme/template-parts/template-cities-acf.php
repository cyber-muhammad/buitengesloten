<?php
/**
 * Template part for displaying a cities/locations section using ACF fields
 *
 * @package theme-pro
 */

// Check if the locations section is enabled
if (function_exists('get_field') && get_field('enable_locations_section')) {
    // Get the section title and province
    $section_title = get_field('locations_section_title');
    $province_name = get_field('province_name');
    $cities_list = get_field('cities_list');
    
    // Only display the section if we have cities
    if (!empty($cities_list)) {
        // Parse the cities list from textarea (format: city|url)
        $cities = [];
        $lines = explode("\n", $cities_list);
        
        foreach ($lines as $line) {
            $line = trim($line);
            if (!empty($line)) {
                $city_data = explode('|', $line);
                
                if (count($city_data) === 2) {
                    $cities[] = [
                        'name' => trim($city_data[0]),
                        'url' => trim($city_data[1]),
                    ];
                }
            }
        }
        
        // Only display the section if we have valid cities
        if (!empty($cities)) {
            ?>
            <section class="cities-wrapper section-padding section-bg">
                <div class="container">
                    <div class="col-lg-8 col-xl-6 col-12 text-center">
                        <div class="block-contents">
                            <div class="section-title wow fadeInUp" data-wow-duration="1s">
                                <h2><?php echo esc_html($section_title); ?> <?php echo esc_html($province_name); ?></h2>
                            </div>
                        </div>
                    </div>
                    
                    <ul class="data-row">
                        <?php foreach ($cities as $city) : ?>
                            <li class="data-col">•<!-- --> <!-- --><a href="<?php echo esc_url($city['url']); ?>"><?php echo esc_html($city['name']); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </section>
            <?php
        }
    }
}
?>