<?php
/* 
 * File Name - Patients Say's Section
 * Page Name - Home Page
 * Theme Name - BRT Zh Theme
 */

$heading = get_sub_field("heading");
$code = get_sub_field("code");
$button = get_sub_field("button");
?>

<section class="sliderBlock position-relative secondSlider">
    <div class="container">
        <div class="innerSlider">
            <div class="welComeInner text-left">
                <?php if(!empty($heading)) { ?>
                    <h2><?php echo $heading; ?></h2>
                <?php } ?>
                <?php if(!empty($button)) { ?>
                        <a class="btn btn-primary rounded-pill redButton text-uppercase" href="<?php echo esc_url($button['url']); ?>"><?php echo esc_html($button['title']); ?></a>
                <?php } ?>
            </div>
            <div class="innerSlider_ position-relative">
                <div class="slickSlidr">
                    <?php echo do_shortcode($code); ?>
                </div>
            </div>
        </div>
    </div>
</section>
