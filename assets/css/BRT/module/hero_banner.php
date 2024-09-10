<?php
/*
 * File Name - Hero Banner Section
 * Page Name - Home Page
 * Theme Name - BRT Theme
 */

$banner_image = get_sub_field("banner_image");
$video_link = get_sub_field("video_link");
$icon_image = get_sub_field("icon_image");
$sub_heading = get_sub_field("sub_heading");
$heading = get_sub_field("heading");
$content = get_sub_field("content");
$button = get_sub_field("button");
?>

<section class="bannerHero">
    <div class="banerMainBlock position-relative">
        <div class="heroImgeBanner">
            <img src="<?php echo $banner_image; ?>" class="w-100 h-100 object-fit-cover" id="bannerImage" />
        </div>
        <div class="bannerVideo_" id="bannerVideoContainer" style="display: none;">
        <iframe id="videoPlayer" width="1835" height="650" src="<?php echo $video_link; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

        </div>
       
        <div class="bannerVideo">
            <div class="row align-items-center">
                <div class="playIcon col-xxl-5 col-xl-5 col-lg-5 col-md-5">
                    <?php if (!empty($icon_image)) { ?>
                        <div class="playIcon cursor-pointer text-left" id="playButton">
                            <img src="<?php echo $icon_image; ?>" alt="">
                        </div>
                    <?php } ?>
                </div>
                <div class="heroText col-xxl-7 col-xl-7 col-lg-7 col-md-7">
                    <?php if (!empty($sub_heading)) { ?>
                        <h5><?php echo $sub_heading; ?></h5>
                    <?php } ?>
                    <?php if (!empty($heading)) { ?>
                        <h1><?php echo $heading; ?></h1>
                    <?php } ?>
                    <?php if (!empty($content)) { ?>
                        <p><?php echo $content; ?></p>
                    <?php } ?>
                    <?php if (!empty($button)) { ?>
                        <a class="btn btn-primary" href="<?php echo $button['url']; ?>"><?php echo $button['title']; ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
