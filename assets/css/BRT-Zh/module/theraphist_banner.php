<?php
/**
 *
 * @package WordPress
 * @subpackage BRT_Zh_Theme
 * @since BRT Zh Theme 1.0
 */
$heading = get_sub_field("heading");
$background_image = get_sub_field("background_image"); 
?>

<section class="banner-cstm theraphist-banner" style="background-image: url('<?php echo $background_image['url']; ?>'); ">
    <div class="heading-page">
        <h2><?php echo $heading ?></h2>
    </div>
</section>

