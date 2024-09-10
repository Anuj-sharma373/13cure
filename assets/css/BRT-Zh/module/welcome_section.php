<?php
/* 
 * File Name - Welcome Section
 * Page Name - Home Page
 * Theme Name - BRT Zh Theme
 */

$heading = get_sub_field("heading");
$content = get_sub_field("content");
$quote_parts = get_sub_field("quote_parts");


?>
<section class="welcomeBlock">
    <div class="container p-0">
        <div class="welComeInner text-center">
            <?php if (!empty($heading)) { ?>
                <h5><?php echo $heading; ?></h5>
            <?php }
            if (!empty($content))
                echo $content; ?>
        </div>

        <div class="bottomIcon">
            <div class="row">
                <?php foreach ($quote_parts as $quote_parts_group) { ?>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                        <div class="appoinmentBlock text-center">
                            <div class="iconApp">
                                <img src="<?php echo $quote_parts_group['image']['url']; ?>" alt="" class="w-100" />
                            </div>
                            <a class="btn btn-primary"
                                    href="<?php echo $quote_parts_group['button']['url']; ?>"><?php echo $quote_parts_group['button']['title']; ?></a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>