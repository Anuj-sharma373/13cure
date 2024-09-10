<!-- Count Section About Us Page -->

<?php
$about_us_page_third_section_repeater_first_text = get_sub_field("about_us_page_third_section_repeater_first_text");
$about_us_page_third_section_repeater_second_text = get_sub_field("about_us_page_third_section_repeater_second_text");

?>

<section class="outTargetBlock">
    <div class="container">
        <div class="targetValues">
            <div class="row">
                <?php if( have_rows('about_us_page_third_section_repeater') ): ?>
                    <?php while( have_rows('about_us_page_third_section_repeater') ): the_row(); ?>
                        <div class="col-xl-4 col-lg-4 col-md-4">
                            <div class="values">
                                <h2><?php the_sub_field('about_us_page_third_section_repeater_first_text'); ?></h2>
                                <p><?php the_sub_field('about_us_page_third_section_repeater_second_text'); ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
