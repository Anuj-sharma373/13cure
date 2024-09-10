<?php
/*
 * File Name: BRT Experience
 * Theme Name: BRT Zh Theme
 */

$heading = get_sub_field("heading");
$button_link = get_sub_field("button_link");
$video = get_sub_field("video");

?>
<section class="brtExpBlock">
        <div class="container">
            <div class="videoBlock">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-lg-5 co-md-5">
                        <div class="welComeInner text-left">
                            <?php if(!empty($heading)) { ?>
                            <h2><?php echo $heading; ?></h2>
                            <?php } if(!empty($button_link)) { ?>
                            <a class="btn btn-primary rounded-pill redButton text-uppercase" href="<?php echo $button_link['url']; ?>"><?php echo $button_link['title']; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 co-md-7">
                        <?php if(!empty($video)) { ?>
                        <div class="videoBlockInner">
                            <?php echo $video; ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>