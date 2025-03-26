<?php
/**
 * Template Name: Cities By Province
 *
 * Template for displaying all cities organized by province
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php 
        // Get all provinces
        $provinces = get_terms(array(
            'taxonomy' => 'province',
            'hide_empty' => true,
        ));
        
        if (!empty($provinces) && !is_wp_error($provinces)) {
            foreach ($provinces as $province) { 
                // For each province, get all cities
                $args = array(
                    'post_type' => 'city',
                    'posts_per_page' => -1,
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'province',
                            'field' => 'term_id',
                            'terms' => $province->term_id,
                        ),
                    ),
                );
                
                $cities_query = new WP_Query($args);
                
                if ($cities_query->have_posts()) {
                    ?>
                    <section class="cities-wrapper section-padding section-bg">
                        <div class="container">
                            <div class="col-lg-8 col-xl-6 offset-xl-3 col-12 offset-lg-2 text-center">
                                <div class="block-contents">
                                    <div class="section-title wow fadeInUp" data-wow-duration="1s">
                                        <h2>Onze Locaties in de Provincie <?php echo esc_html($province->name); ?></h2>
                                    </div>
                                </div>
                            </div>
                            
                            <ul class="data-row">
                                <?php while ($cities_query->have_posts()) : $cities_query->the_post(); 
                                    // Get custom URL if exists, otherwise use permalink
                                    $custom_url = get_post_meta(get_the_ID(), '_city_custom_url', true);
                                    $city_url = !empty($custom_url) ? $custom_url : get_permalink();
                                ?>
                                    <li class="data-col">•<!-- --> <!-- --><a href="<?php echo esc_url($city_url); ?>"><?php the_title(); ?></a></li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    </section>
                    <?php
                }
                wp_reset_postdata();
            }
        }
        ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>