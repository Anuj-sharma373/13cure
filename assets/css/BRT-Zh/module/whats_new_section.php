<?php
/* 
 * File Name - What's New Section
 * Page Name - Home Page
 * Theme Name - BRT Zh Theme
 */

$heading = get_sub_field("heading");
$image_and_link = get_sub_field("image_and_link");
?>
<section class="sliderBlock position-relative whatsNew">
        <div class="container">
            <div class="innerSlider">
                <?php if(!empty($heading)) { ?>
                <div class="welComeInner text-left">
                    <h2><?php echo $heading; ?></h2>
                </div>
                <?php } ?>
                <?php if (!empty($image_and_link)) { ?>
                <div class="slickSlidr">
                    <?php foreach ($image_and_link as $image_and_link_group) { ?>
                    <div class="innerConntent">
                        <a href="<?php echo $image_and_link_group['image_link']['url']; ?>"><img src="<?php echo $image_and_link_group['image']; ?>" class="w-100" /></a>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="bgImage">
            <img src="/wp-content/uploads/2024/06/bgSliderI.png" alt="" class="w-100" />
        </div>
    </section>