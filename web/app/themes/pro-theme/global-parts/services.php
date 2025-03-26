<section class="services-section section-padding">
    <div class="container">
        <?php if(get_field('services_section_title')): ?>
            <div class="row">
                <div class="col-xl-8 offset-xl-2 text-center">
                    <div class="section-title">
                        <h2><?php echo esc_html(get_field('services_section_title')); ?></h2>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if(have_rows('services')): ?>
            <div class="row gy-4">
                <?php while(have_rows('services')): the_row(); 
                    $icon = get_sub_field('service_icon');
                    $title = get_sub_field('service_title');
                    $description = get_sub_field('service_description');
                    $link = get_sub_field('service_link');
                ?>
                    <div class="col-lg-6 col-md-6 col-12">
                        <?php if($link): ?>
                            <a href="<?php echo esc_url($link); ?>" class="service-card">
                        <?php endif; ?>
                            <div class="service-card-inner">
                                <?php if($icon): ?>
                                    <div class="service-icon">
                                        <img src="<?php echo esc_url($icon['url']); ?>" 
                                             alt="<?php echo esc_attr($icon['alt']); ?>" 
                                             width="55" 
                                             height="55">
                                    </div>
                                <?php endif; ?>
                                <div class="service-content">
                                    <?php if($title): ?>
                                        <h3><?php echo esc_html($title); ?></h3>
                                    <?php endif; ?>
                                    <?php if($description): ?>
                                        <p><?php echo esc_html($description); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php if($link): ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>