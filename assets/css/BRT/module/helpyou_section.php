<?php
/* 
 * File Name - Help You Section
 * Page Name - Home Page
 * Theme Name - BRT Theme
 */

$heading = get_sub_field("heading");
$content = get_sub_field("content");
$help_boxes = get_sub_field("help_boxes");
$last_content = get_sub_field("last_content");
$button = get_sub_field("button");

?>
<section class="helpYouBlock position-relative">
    <div class="customeContainer">
        <div class="helpYouInner">
            <div class="welComeInner text-left">
                <?php if (!empty($heading)) { ?>
                    <h2><?php echo $heading; ?></h2>
                <?php } ?>
                <?php if (!empty($content)) { ?>
                    <p class="text-uppercase CottorwayTypeface"><?php echo $content; ?></p>
                <?php } ?>
            </div>

            <div class="findOutMore position-relative">
                <div class="row">
                    <?php if (!empty($help_boxes)) {
                        foreach ($help_boxes as $help_boxes_group) {
                            if (!empty($help_boxes_group['content'])) { ?>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                                    <div
                                        class="card border-0 align-items-center justify-content-center rounded-pill --darkColor--001">
                                        <h5 class="text-white m-0 text-center"><?php echo $help_boxes_group['content']; ?></h5>
                                    </div>
                                </div>
                            <?php }
                        }
                    } ?>

                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                        <?php if (!empty($last_content)) { ?>
                            <div class="card border-0 justify-content-end bg-transparent">
                                <?php echo $last_content; ?>
                                <?php if (!empty($button)) { ?>
                                    
                                        <a  class="btn btn-primary rounded-pill mx-auto mr-auto redButton text-uppercase" href="<?php echo $button['url']; ?>"><?php echo $button['title']; ?></a>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>