<?php
/*
 * File Name: Our Treatments Section
 * Theme Name: BRT Zh Theme
 */

$heading = get_sub_field("heading");
$icons = get_sub_field("icons");

?>
<section class="ourTreatments">
    <div class="container">
        <?php if (!empty($heading)) { ?>
            <div class="welComeInner text-left">
                <h2><?php echo $heading; ?></h2>
            </div>
        <?php } ?>
        <div class="allTreatmentIconsMain">
            <div class="allTreatmentIcons mr-auto ml-auto">
                <div class="iconBlock">
                    <?php foreach ($icons as $icons_group) { ?>
                        <div class="iconInner <?php echo $icons_group['class_name']?>">
                            <div class="iconscard leftSideIcon">
                                <?php
                                if (!empty($icons_group['left_side_icons'])) {
                                    foreach ($icons_group['left_side_icons'] as $left_side_icons_group) {
                                        if (!empty($left_side_icons_group)) { ?>
                                            <div class="<?php echo $left_side_icons_group['class_name']; ?>">
                                                <?php if (!empty($left_side_icons_group['image'])) { ?>
                                                    <div
                                                        class="iconBinner d-flex align-items-center justify-content-center <?php echo $left_side_icons_group['mini_class']; ?>">
                                                        <a href="<?php echo $left_side_icons_group['link']['url']; ?>">
                                                            <img src="<?php echo $left_side_icons_group['image']; ?>" alt=""
                                                                class="w-100" />
                                                        </a>
                                                    </div>
                                                <?php } ?>
                                                <?php if (!empty($left_side_icons_group['content'])) { ?>
                                                    <p><?php echo $left_side_icons_group['content']; ?></p>
                                                <?php } ?>
                                            </div>
                                        <?php }
                                    }
                                } ?>
                            </div>
                            <div class="iconscard iconOne singleColumn <?php echo $icons_group['middle_class_name']; ?>">
                                <?php
                                if (!empty($icons_group['middle_icons'])) {
                                    foreach ($icons_group['middle_icons'] as $middle_icons_group) {
                                        if (!empty($middle_icons_group)) { ?>
                                            <div class="<?php echo $middle_icons_group['class_name']; ?>">
                                                <?php if (!empty($middle_icons_group['image'])) { ?>
                                                    <div
                                                        class="iconBinner d-flex align-items-center justify-content-center <?php echo $middle_icons_group['mini_class']; ?> ">
                                                        <?php if (!empty($middle_icons_group['link']['url'])) { ?>
                                                            <a href="<?php echo $middle_icons_group['link']['url']; ?>">
                                                            <?php } ?>
                                                            <img src="<?php echo $middle_icons_group['image']; ?>" alt="" class="w-100" />
                                                            <?php if (!empty($middle_icons_group['link']['url'])) { ?>
                                                            </a>
                                                        <?php } ?>
                                                    </div>
                                                <?php } ?>
                                                <?php if (!empty($middle_icons_group['content'])) { ?>
                                                    <p><?php echo $middle_icons_group['content']; ?></p>
                                                <?php } ?>
                                            </div>
                                        <?php }
                                    }
                                } ?>

                            </div>
                            <div class="iconscard leftSideIcon rightSideIcons">
                                <?php
                                if (!empty($icons_group['right_side_icons'])) {
                                    foreach ($icons_group['right_side_icons'] as $right_side_icons) {
                                        if (!empty($right_side_icons)) { ?>
                                            <div class="<?php echo $right_side_icons['class_name']; ?>">
                                                <?php if (!empty($right_side_icons['image'])) { ?>
                                                    <div class="iconBinner d-flex align-items-center justify-content-center <?php echo $right_side_icons['mini_class']; ?> ">
                                                        <?php if(!empty($right_side_icons['link']['url'])) { ?>
                                                        <a href="<?php echo $right_side_icons['link']['url']; ?>">
                                                            <?php }?>
                                                            <img src="<?php echo $right_side_icons['image']; ?>" alt="" class="w-100" />
                                                            <?php if(!empty($right_side_icons['link']['url'])) { ?>
                                                        </a>
                                                        <?php } ?>
                                                    </div>
                                                <?php } ?>
                                                <?php if (!empty($right_side_icons['content'])) { ?>
                                                    <p><?php echo $right_side_icons['content']; ?></p>
                                                <?php } ?>
                                            </div>
                                        <?php }
                                    }
                                } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
