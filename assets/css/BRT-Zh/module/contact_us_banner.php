<?php
/**
 *
 * @package WordPress
 * @subpackage BRT_Zh_Theme
 * @since BRT Zh Theme 1.0
 */

$bg_ct_image = get_sub_field("bg_ct_image"); // Assuming bg_image is a custom field on this page template
?>

<section class="banner-cstm contact-banner" style="background-image: url('<?php echo $bg_ct_image['url']; ?>'); ">
    <div class="heading-page">
        <h2><?php the_title(); ?></h2>
    </div>
</section>

