<footer id="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 mb-3 d-flex justify-content-center justify-content-lg-start">
                    <?php $link = get_field('footer_brand_image', 'option'); ?>
                    <img src="<?php echo esc_url($link['url']); ?>" alt="<?php echo esc_attr($link['alt']); ?>"
                        style="width: 200px" />
                </div>

                <div class="col-lg-3 col-md-6 mb-5 footer-contact">
                    <?php the_field('footer_brand_description', 'option'); ?>
                </div>

                <div class="col-lg-3 col-md-6 mb-5 footer-links">
                    <h4><?php the_field('section2_title', 'option'); ?></h4>
                    <?php the_field('section2_description', 'option'); ?>
                </div>

                <div class="col-lg-3 col-md-6 mb-5 footer-links">
                    <h4><?php the_field('section3_title', 'option'); ?></h4>
                    <ul>
                        <?php if (have_rows('section3links', 'option')) : ?>
                        <?php while (have_rows('section3links', 'option')) : the_row(); ?>
                        <?php $link = get_sub_field('section3_link', 'option'); ?>
                        <li><a href="<?php echo esc_url($link['url']); ?>"
                                target="<?php echo esc_attr($link['target']); ?>"><i
                                    class="fas fa-external-link-alt"></i><?php echo esc_html($link['title']); ?></a>
                        </li>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 mb-5 footer-links">
                <h4><?php the_field('section4_title', 'option'); ?></h4>
                    <div class="section4_links mt-3">
                        <ul>
                        <?php if (have_rows('section4_links', 'option')) : ?>
                        <?php while (have_rows('section4_links', 'option')) : the_row(); ?>
                        <?php $slink = get_sub_field('section4_link', 'option'); ?>
                        <li><a href="<?php echo esc_url($slink['url']); ?>"
                            target="<?php echo esc_attr($slink['target']); ?>"><i
                                class="fas fa-external-link-alt"></i><?php echo esc_html($slink['title']); ?></a>
                        </li>
                        <?php endwhile; ?>
                        <?php endif; ?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom clearfix">
        <div class="container">
            <div class="copyright">
            © 2022 Slotenmaker All Rights Reserved - Privacybeleid - Gebruiksvoorwaarden - Cookie Instellingen
            </div>
        </div>
    </div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>