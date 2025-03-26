<section id="content" class="py-5">
    <div class="container">
        <?php 
            if( have_rows('flexible_content') ):
                while( have_rows('flexible_content') ): the_row();
                    if( get_row_layout() == 'image_text_layout' ):
                        $alignment = get_sub_field('alignment');
                        $image = get_sub_field('image');
                        $text = get_sub_field('text');
        ?>
        <div class="row mt-5 mb-5">
            <?php if($alignment !== 'text_only'): ?>
            <div class="col-lg-5 mt-3 mb-3  <?php echo $alignment === 'right' ? 'order-lg-2' : ''; ?>">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            </div>
            <div class="col-lg-7 mt-3 mb-3">
                <?php echo wp_kses_post($text); ?>
            </div>
            <?php else: ?>
            <div class="col-lg-12">
                <?php echo wp_kses_post($text); ?>
            </div>
            <?php endif; ?>
        </div>
        <?php 
                    endif;
                endwhile;
            endif;
        ?>
</section>