<?php
$about_us_page_fifth_section_heading = get_sub_field("about_us_page_fifth_section_heading");

$our_patients_heading = get_sub_field("our_patients_heading");
$our_patients_code = get_sub_field("our_patients_code");
$find_more_button = get_sub_field("find_more_button");
?>

<section class="sliderBlock position-relative secondSlider">
    <div class="container">
        <div class="topHeading">
            <div class="welComeInner text-center">
                <h2 class="mw-100"><?php echo $about_us_page_fifth_section_heading; ?></h2>

                <?php if( have_rows('about_us_page_fifth_section_repeater') ): ?>
                    <?php while( have_rows('about_us_page_fifth_section_repeater') ): the_row(); ?>
                        <p><?php the_sub_field('about_us_page_fifth_section_repeater_content'); ?></p>
                    <?php endwhile; ?>
                <?php endif; ?>
                
            </div>
        </div>
<div class="innerSlider">
            <div class="welComeInner text-left">
                <?php if(!empty($our_patients_heading)) { ?>
                    <h2><?php echo $our_patients_heading; ?></h2>
                <?php } ?>
                <?php if(!empty($find_more_button)) { ?>
                    
                        <a href="<?php echo esc_url($find_more_button['url']); ?>" class="btn btn-primary rounded-pill redButton text-uppercase"><?php echo esc_html($find_more_button['title']); ?></a>
                    
                <?php } ?>
            </div>
            <div class="innerSlider_ position-relative">
                <div class="slickSlidr">
                    <?php echo do_shortcode($our_patients_code); ?>
                </div>
            </div>
        </div>
    </div>
</section>
