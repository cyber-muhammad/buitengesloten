<section class="page-banner">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 text-center">
                <div class="banner-content">
                    <h1 class="banner-title"><?php echo get_the_title(); ?></h1>
                    <p class="banner-text"><?php echo get_the_excerpt(); ?></p>
                    
                    <div class="banner-buttons">
                        <a href="tel:+32493089359" class="btn btn-primary">
                            <span>BEL 0493/08 93 59</span>
                        </a>
                        <a href="contact.html" class="btn btn-outline">
                            <span>Contacteer ons</span>
                        </a>
                    </div>

                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <?php echo do_shortcode('[rank_math_breadcrumb]'); ?>

                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>