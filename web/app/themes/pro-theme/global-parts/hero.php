<?php
    $hero_image = get_field('hero_background_image');
    $hero_image_url = $hero_image ? $hero_image['url'] : './images/default-hero.jpg'; // Provide a fallback image URL if no image is set.
    $content_image = get_field('content_image');
?>

<style>
#hero {
    background: url(<?php echo $hero_image_url; ?>) center top no-repeat;
    background-size: cover;
    background-position: center;
}
</style>

<section id="hero" class="d-flex align-xl-items-center p-space-80 mb-5">
    <div class="container">
        <div class="content mx-3">
            <div class="row">
                <div class="col-xl-7 col-12 col-lg-10 offset-lg-1 offset-xl-0">
                    <div class="titles align-xl-items-center mt-3">
                        <h1><?php the_field('hero_title'); ?></h1>
                        <h2><?php the_field('hero_description'); ?></h2>
                    </div>
                    <div class="buttons mt-5">
                        <?php echo do_shortcode('[phone_number class="button-primary me-5" icon="fa-headset" id="hero-call-button"]') ?>
                        <a href="/contact" class="button-outline">Contacteer ons</a>
                    </div>
                </div>
                <?php if (!empty($content_image)) : ?>
                <div class="col-xl-5 content-image col-12 text-xl-end col-lg-10 offset-lg-1 offset-xl-0">
                    <img src="<?php echo esc_url($content_image['url']); ?>"
                        alt="<?php echo esc_attr($content_image['alt']); ?>" />
                </div>
                <?php endif; ?>
            </div>
        </div>
</section>