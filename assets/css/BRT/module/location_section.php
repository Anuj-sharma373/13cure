<?php
/* 
 * File Name - Patients Say's Section
 * Page Name - Home Page
 * Theme Name - BRT Theme
 */

$heading = get_sub_field("heading");
$content = get_sub_field("content");
$map_code = get_sub_field("map_code");
$image = get_sub_field("image");

?>

<section class="location-section">
    <div class="container">
        <?php if (!empty($heading)) : ?>
            <div class="location-main-heading">
                <h2><?php echo $heading; ?></h2>
            </div>
        <?php endif; ?>

        <div class="wrap-left-right">
            <?php if (!empty($content)) : ?>
                <div class="location-left">
                    <?php echo $content; ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($image)) : ?>
            <div class="bottom-image">
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
            </div>
        <?php endif; ?>
        </div>

        
    </div>
</section>


