<?php
/**
 * Template for displaying the footer
 *
 * Contains the closing of the id=main div and all content
 * after. Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage BRT_Zh_Theme
 * @since BRT Zh Theme 1.0
 */
?>

<!-- ACF FIELDS  -->
 <?php

$footer_newsletter_form_heading = get_field("footer_newsletter_form_heading", "option");
$footer_newsletter_form_pahragraph = get_field("footer_newsletter_form_pahragraph", "option");
$footer_newsletter_form_email_heading = get_field("footer_newsletter_form_email_heading", "option");
$newsletter_form_below_text = get_field("newsletter_form_below_text", "option");
$newsletter_form_terms_and_condition = get_field("newsletter_form_terms_and_condition", "option");
$after_newsletter_form_heading = get_field("after_newsletter_form_heading", "option");
$after_newsletter_form_find_deals_button = get_field("after_newsletter_form_find_deals_button", "option");
$after_newsletter_form_first_menu_heading = get_field("after_newsletter_form_first_menu_heading", "option");
$after_newsletter_form_second_menu_heading = get_field("after_newsletter_form_second_menu_heading", "option");
$after_newsletter_form_third_menu_heading = get_field("after_newsletter_form_third_menu_heading", "option");
$after_newsletter_form_back_to_top = get_field("after_newsletter_form_back_to_top", "option");
$after_newsletter_form_back_to_top_image = get_field("after_newsletter_form_back_to_top_image", "option");
$footer_last_text = get_field("footer_last_text", "option");
$footer_girl_image = get_field("footer_girl_image", "option");

// Repeater Fields


?>



	 <footer class="position-relative">
        <div class="container">
            <div class="topfooter">
                <div class="newsletter">
                    <div class="letterInner">
                        <h4 class="mb-0"><?php echo  $footer_newsletter_form_heading; ?></h4>
                        <p><?php echo   $footer_newsletter_form_pahragraph; ?></p>
                        <div class="newLeterInput">
                            <h5><?php echo  $footer_newsletter_form_email_heading; ?></h5>
                            <?php echo do_shortcode('[contact-form-7 id="68fcfd0" title="Footer Newsletter Form"]'); ?>
                        </div>
                        <p class="mb-0"><?php echo  $newsletter_form_below_text; ?></p>
                        <a href=""><?php echo  $newsletter_form_terms_and_condition; ?></a>
                    </div>
                </div>
            </div>
            <div class="bttomFooter">
                <div class="footerLinks">
                    <div class="bFooter">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <h4><?php echo $after_newsletter_form_heading; ?></h4>
                                <a class="btn btn-primary rounded-pill text-uppercase" href="<?php echo $after_newsletter_form_find_deals_button['url']; ?> "><?php echo $after_newsletter_form_find_deals_button['title']; ?></a>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2">
                                <div class="quickLinks">
                                    <ul class="p-0 m-0 list-unstyled">
                                        <li class="items text-uppercase"><?php echo  $after_newsletter_form_first_menu_heading; ?></li>
                                        <li>
                                        <?php
                                          wp_nav_menu( array(
                                             'theme_location' => 'footer-primary',
                                             'menu_class'     => 'footer-primary-menu-class',
                                             // You can add more parameters here as needed
                                           ) );
                                        ?>
                                        </li>
                                    </ul>
                                   <!-- Repeater Fields -->
<?php if( have_rows('footer_social_media_links_repeater', 'option') ):?>
    <ul class="p-0 socialMediaBlock d-flex gap-2 list-unstyled p-0">
    <?php while ( have_rows('footer_social_media_links_repeater', 'option') ) : the_row();?>
        <?php 
            $footer_social_media_links_url = get_sub_field('footer_social_media_links_url');
            $footer_social_media_links_image = get_sub_field('footer_social_media_links_image');
       ?>
        <li>
            <a href="<?php echo esc_url($footer_social_media_links_url['url']);?>">
                <img src="<?php echo esc_url($footer_social_media_links_image);?>" alt="" class="w-100" />
            </a>
        </li>
    <?php endwhile;?>
    </ul>
<?php endif;?>

                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2">
                                <div class="quickLinks">
                                    <ul class="p-0 m-0 list-unstyled">
                                        <li class="items text-uppercase"><?php echo $after_newsletter_form_second_menu_heading; ?></li>
                                        <li>
                                        <?php
                                           wp_nav_menu( array(
                                            'theme_location' => 'footer-secondary',
                                            'menu_class'     => 'footer-secondary-menu-class',
                                            // You can add more parameters here as needed
                                          ) );
                                       ?>
                                     </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2">
                                <div class="quickLinks">
                                    <ul class="p-0 m-0 list-unstyled">
                                        <li class="items text-uppercase"><?php echo  $after_newsletter_form_third_menu_heading; ?></li>
                                        <li>
                                        <?php
                                        wp_nav_menu( array(
                                         'theme_location' => 'footer-extra',
                                         'menu_class'     => 'footer-extra-menu-class',
                                          // You can add more parameters here as needed
                                          ) );
                                             ?>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="backToTop text-right">
                        <button id="back-to-top" class="bg-transparent border-0 d-flex align-items-center"><?php echo $after_newsletter_form_back_to_top; ?><img src="<?php echo  $after_newsletter_form_back_to_top_image; ?>" alt="" class="w-100"/></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyrights">
            <p class="m-0"><?php echo $footer_last_text; ?></p>
        </div>
        <div class="girlImg">
            <img src="<?php echo $footer_girl_image; ?>" alt="" class="w-100" />
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js "></script>

<?php
	/*
	 * Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */
	wp_footer();
?>

</body>
</html>