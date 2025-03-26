<?php 
// Only output the section if we have content
if(get_field('section_title') || get_field('section_subtitle') || have_rows('service_categories')): 
?>

<section class="service-category-overview section-padding">
    <div class="container">
        <?php if(get_field('section_title') || get_field('section_subtitle')): ?>
            <div class="col-xl-8 offset-xl-2 text-center">
                <div class="section-title">
                    <?php if(get_field('section_title')): ?>
                        <h2><?php echo esc_html(get_field('section_title')); ?></h2>
                    <?php endif; ?>
                    <?php if(get_field('section_subtitle')): ?>
                        <p><?php echo esc_html(get_field('section_subtitle')); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php 
        $service_categories = get_field('service_categories');
        if($service_categories): ?>
            <div class="row">
                <?php 
                while(have_rows('service_categories')): the_row();
                    $title = get_sub_field('title');
                    $description = get_sub_field('description');
                    $link = get_sub_field('link');
                ?>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="category-card">
                            <h3><?php echo esc_html($title); ?></h3>
                            <div class="category-divider"></div>
                            <p><?php echo esc_html($description); ?></p>
                            <?php if($link): ?>
                                <div class="category-cta">
                                    <a href="<?php echo esc_url($link); ?>">Lees meer</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php 
endif;
wp_reset_postdata();
?>

<!-- Debug Information -->
<?php
$has_categories = have_rows('service_categories');
$section_title = get_field('section_title');
$section_subtitle = get_field('section_subtitle');
?>
<div style="display: none;">
    Has Categories: <?php echo $has_categories ? 'Yes' : 'No'; ?>
    Section Title: <?php echo $section_title ? 'Yes' : 'No'; ?>
    Section Subtitle: <?php echo $section_subtitle ? 'Yes' : 'No'; ?>
</div>