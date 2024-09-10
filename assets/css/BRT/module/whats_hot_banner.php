<?php
/* 
 * File Name - Patients Say's Section
 * Page Name - Home Page
 * Theme Name - BRT Theme
 */

$heading = get_sub_field("heading");
$content = get_sub_field("content");
$button = get_sub_field("button");
$image = get_sub_field("image");
$bg_image = get_sub_field("bg_image");
?>

<section class="commanCardBlock whatsHotBanner aboutUsSecOne position-relative ">
        <div class="customeContainer ml-auto ">
            <?php if(!empty($heading)) { ?>
            <h2><?php echo $heading; ?></h2>
            <?php } ?>
            <div class="row align-items-center m-0">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <?php if(!empty($content)) { ?>
                    <div class="textBlock">
                       
                       <?php echo $content; ?>
                       <?php if(!empty($button)) { ?>
                      <a class="btn btn-primary rounded-pill redButton text-uppercase" href="<?php echo $button['url']; ?>"><?php echo $button['title'] ?></a>
                        <?php } ?>
                    </div>
                    <?php }?>
                </div>
                <?php if(!empty($image)) { ?>
                <div class="col-xl-7 col-lg-7 col-md-6 pr-0">
                    <div class="aboutUsImage">
                        <img src="<?php echo $image; ?>" alt="" class="w-100 h-100 " />
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php if(!empty($bg_image )) { ?>
        <div class="bgImage">
            <img src="<?php echo $bg_image; ?>" alt="w-100">
        </div>
        <?php } ?>
    </section>