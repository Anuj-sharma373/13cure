<?php
/* 
 * File Name - Comman Card Section
 * Page Name - Home Page
 * Theme Name - BRT Theme
 */

$image_side = get_sub_field("image_side");

$heading = get_sub_field("heading");
$content = get_sub_field("content");
$image_and_content = get_sub_field("image_and_content");
$button = get_sub_field("button");
$image = get_sub_field("image");

?>

<?php if ($image_side === "left") { ?>
    <section class="commanCardBlock aboutUsBlock">
        <div class="customeContainer ml-auto">
            <div class="row align-items-center m-0">
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="textBlock">
                        <?php if (!empty($heading)) { ?>
                            <h2><?php echo $heading; ?></h2>
                        <?php } ?>
                        <?php if (!empty($content))
                            echo $content; ?>
                        <?php if (!empty($button)) { ?>
                                <a class="btn btn-primary rounded-pill redButton text-uppercase" href="<?php echo $button['url']; ?>"><?php echo $button['title']; ?></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <?php if (!empty($image)) { ?>
                        <div class="aboutUsImage">
                            <img src="<?php echo $image['url']; ?>" alt="" class="w-100" />
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } elseif ($image_side === "right") { ?>
    <section class="commanCardBlock approachesBlock">
        <div class="customeContainer ml-0 mr-auto mb-0 mt-0">
            <div class="row align-items-center m-0 row-reverse flex-row-reverse">
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="textBlock ml-auto">
                        <?php if (!empty($heading)) { ?>
                            <h2><?php echo $heading; ?></h2>
                        <?php } ?>
                        <?php if (!empty($content))
                            echo $content; ?>
                        <div class="healthIcon d-flex align-items-center gap-5">
                            <?php foreach ($image_and_content as $image_with_content_group) { ?>
                                <div class="hIcon">
                                    <?php if (!empty($image_with_content_group['image'])) { ?>
                                        <img src="<?php echo $image_with_content_group['image']['url']; ?>" alt="" class="w-100" />
                                    <?php } ?>
                                    <?php if (!empty($image_with_content_group['content'])) { ?>
                                        <p class="m-0"><?php echo $image_with_content_group['content']; ?></p>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                        <?php if (!empty($button)) { ?>
                                <a class="btn btn-primary rounded-pill redButton text-uppercase" href="<?php echo $button['url']; ?>"><?php echo $button['title']; ?></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <?php if (!empty($image)) { ?>
                        <div class="aboutUsImage">
                            <img src="<?php echo $image['url']; ?>" alt="" class="w-100" />
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>