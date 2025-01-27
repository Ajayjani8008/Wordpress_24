<footer class="footer6 footer--light-gradient">
    <div class="footer__big">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="widget text_widget">
                        <?php
                        $footer_logo = get_theme_mod('footer_logo');
                        if ($footer_logo) :
                        ?>
                            <a class="navbar-brand order-sm-1 order-1" href="<?php echo esc_url(home_url('/')); ?>">
                                <img class="footer_logo" src="<?php echo esc_url($footer_logo); ?>" alt="<?php bloginfo('name'); ?>" class="header-logo header-logo-black" />
                            </a>
                        <?php else : ?>
                            <img class="footer_logo" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="logo">
                        <?php endif; ?>
                        <p>
                            <a href="tel:<?php the_field('phone_number', 'option') ?>" class="tel"><?php the_field('phone_number', 'option') ?></a>
                            <a href="mailto:<?php the_field('email', 'option') ?>" class="mail"><?php the_field('email', 'option') ?></a>
                            <span class="address"><?php the_field('address', 'option') ?></span>
                        </p>
                    </div>
                </div><!-- ends: .col-lg-3 -->

                <div class="col-lg-3 col-md-6 col-sm-6 d-flex justify-content-lg-center">
                    <div class="widget widget--links">
                        <h4 class="widget__title2">Company</h4>
                        <ul class="links">
                            <?php if (have_rows('company_links', 'option')) : ?>
                                <?php while (have_rows('company_links', 'option')) : the_row(); ?>
                                    <li><a href="<?php the_sub_field('link_url'); ?>"><?php the_sub_field('link_text'); ?></a></li>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </ul>
                    </div><!-- ends: .widget -->
                </div><!-- ends: .col-lg-3 -->

                <div class="col-lg-3 col-md-6 col-sm-6 d-flex justify-content-lg-center">
                    <div class="widget widget--links">
                        <h4 class="widget__title2">Services</h4>
                        <ul class="links">
                            <?php if (have_rows('services_links', 'option')) : ?>
                                <?php while (have_rows('services_links', 'option')) : the_row(); ?>
                                    <li><a href="<?php the_sub_field('link_url') ?>"><?php the_sub_field('link_text'); ?></a></li>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </ul>
                    </div><!-- ends: .widget -->
                </div><!-- ends: .col-lg-3 -->

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="widget widget--links">
                        <h4 class="widget__title2">Useful Links</h4>
                        <ul class="links">
                            <?php if (have_rows('useful_links', 'option')) : ?>
                                <?php while (have_rows('useful_links', 'option')) : the_row(); ?>
                                    <li><a href="<?php the_sub_field('link_url') ?>"><?php the_sub_field('link_text'); ?></a><?php ?></li>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </ul>
                    </div><!-- ends: .widget -->
                </div><!-- ends: .col-lg-3 -->
            </div>
        </div>
    </div><!-- ends: footer__big -->
    <div class="footer__bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__bottom-content">
                        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved. Created by <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></p>
                        <div class="social-basic ">
                            <ul class="d-flex justify-content-end ">

                                <?php $social_links = get_field('social_media_link','option'); ?>

                                <?php if (!empty($social_links['facebook'])) : ?>
                                    <li><a href="<?php echo $social_links['facebook'] ?>"><span class="fab fa-facebook-f"></span></a></li>
                                <?php endif; ?>

                                <?php if (!empty($social_links['twitter'])) : ?>
                                    <li><a href="<?php echo $social_links['twitter'] ?>"><span class="fab fa-twitter"></span></a></li>
                                <?php endif; ?>

                                <?php if (!empty($social_links['linkdin'])) : ?>
                                    <li><a href="<?php echo $social_links['linkdin'] ?>"><span class="fab fa-linkedin-in"></span></a></li>
                                <?php endif; ?>

                                <?php if (!empty($social_links['google_plus'])) : ?>
                                    <li><a href="<?php echo $social_links['google_plus'] ?>"><span class="fab fa-google-plus-g"></span></a></li>
                                <?php endif; ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- ends: footer__small -->
</footer><!-- ends: footer -->

<div class="go_top">
    <span class="la la-angle-up"></span>
</div>

<!-- <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDduF2tLXicDEPDMAtC6-NLOekX0A5vlnY"></script> -->
<!-- inject:js-->
<!-- <script src="js/plugins.min.js"></script>
    <script src="js/script.min.js"></script> -->
<!-- endinject-->

<?php wp_footer(); ?>
</body>

</html>