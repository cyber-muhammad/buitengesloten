<section class="faq-section section-padding">
    <div class="container">
        <!-- Section Title -->
        <div class="row">
            <div class="col-lg-8 col-xl-6 offset-xl-3 col-12 offset-lg-2 text-center">
                <div class="section-title">
                    <h2><?php the_field('faq_title'); ?></h2>
                </div>
            </div>
        </div>

        <!-- FAQ Items -->
        <?php if(have_rows('faq_items')): 
            $total_items = count(get_field('faq_items'));
            $use_columns = $total_items > 3;
        ?>
            <div class="row">
                <?php if($use_columns): ?>
                    <!-- Left Column -->
                    <div class="col-lg-6 col-12">
                <?php else: ?>
                    <!-- Full Width Column -->
                    <div class="col-12">
                <?php endif; ?>
                    
                    <div class="accordion" id="faqAccordionLeft">
                        <?php 
                        $counter = 0;
                        
                        while(have_rows('faq_items')): the_row();
                            $counter++;
                            // For split columns, only show first 3 items in left column
                            if(!$use_columns || ($use_columns && $counter <= 3)):
                        ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faq<?php echo $counter; ?>">
                                    <button class="accordion-button<?php echo ($counter !== 1) ? ' collapsed' : ''; ?>" 
                                            type="button" 
                                            data-bs-toggle="collapse" 
                                            data-bs-target="#faqCollapse<?php echo $counter; ?>" 
                                            aria-expanded="<?php echo ($counter === 1) ? 'true' : 'false'; ?>" 
                                            aria-controls="faqCollapse<?php echo $counter; ?>">
                                        <?php echo esc_html(get_sub_field('question')); ?>
                                        <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <polyline points="6 9 12 15 18 9"></polyline>
                                            </svg>
                                        </span>
                                    </button>
                                </h2>
                                <div id="faqCollapse<?php echo $counter; ?>" 
                                     class="accordion-collapse collapse<?php echo ($counter === 1) ? ' show' : ''; ?>" 
                                     aria-labelledby="faq<?php echo $counter; ?>" 
                                     data-bs-parent="#faqAccordionLeft">
                                    <div class="accordion-body">
                                        <p><?php echo esc_html(get_sub_field('answer')); ?></p>
                                        <?php 
                                        $link = get_sub_field('read_more_link');
                                        if($link): ?>
                                            <a href="<?php echo esc_url($link['url']); ?>" class="read-more">
                                                <?php echo esc_html($link['title'] ? $link['title'] : 'Lees meer'); ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php 
                            endif;
                        endwhile; 
                        ?>
                    </div>
                </div>

                <?php if($use_columns): ?>
                    <!-- Right Column (only shown if more than 3 items) -->
                    <div class="col-lg-6 col-12">
                        <div class="accordion" id="faqAccordionRight">
                            <?php 
                            $counter = 0;
                            
                            while(have_rows('faq_items')): the_row();
                                $counter++;
                                if($counter > 3): // Show items after the first 3
                            ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="faq<?php echo $counter; ?>">
                                        <button class="accordion-button collapsed" 
                                                type="button" 
                                                data-bs-toggle="collapse" 
                                                data-bs-target="#faqCollapse<?php echo $counter; ?>" 
                                                aria-expanded="false" 
                                                aria-controls="faqCollapse<?php echo $counter; ?>">
                                            <?php echo esc_html(get_sub_field('question')); ?>
                                            <span class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <polyline points="6 9 12 15 18 9"></polyline>
                                                </svg>
                                            </span>
                                        </button>
                                    </h2>
                                    <div id="faqCollapse<?php echo $counter; ?>" 
                                         class="accordion-collapse collapse" 
                                         aria-labelledby="faq<?php echo $counter; ?>" 
                                         data-bs-parent="#faqAccordionRight">
                                        <div class="accordion-body">
                                            <p><?php echo esc_html(get_sub_field('answer')); ?></p>
                                            <?php 
                                            $link = get_sub_field('read_more_link');
                                            if($link): ?>
                                                <a href="<?php echo esc_url($link['url']); ?>" class="read-more">
                                                    <?php echo esc_html($link['title'] ? $link['title'] : 'Lees meer'); ?>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php 
                                endif;
                            endwhile; 
                            ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>