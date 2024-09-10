<?php
/**
 *
 * @package WordPress
 * @subpackage BRT_Theme
 * @since BRT Theme 1.0
 */

$bg_image = get_sub_field("bg_image"); // Assuming bg_image is a custom field on this page template
?>

<section class="banner-cstm" style="background-image: url('<?php echo $bg_image; ?>'); ">
    <div class="heading-page">
        <h2><?php the_title(); ?></h2>
    </div>
</section>


