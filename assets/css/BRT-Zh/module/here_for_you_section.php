<?php
/* 
 * File Name: Here for You Section
 * Page Name: Inner Page
 * Theme Name: BRT Zh Theme
 */

$heading_link = get_sub_field("heading_link");
$total_cards = count($heading_link);
$middle_index = floor($total_cards / 2); // Index of the middle card (zero-indexed)

?>
<section class="hereForYou partnerShipHelp">
    <div class="container">
        <div class="helpCardBlock">
            <div class="row">
                <?php foreach($heading_link as $index => $heading_link_group) { ?>
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="cardsHelp">
                            <?php if(!empty($heading_link_group['heading'])) { ?>
                                <h2><?php echo $heading_link_group['heading']; ?></h2>
                            <?php } ?>
                            <?php if(!empty($heading_link_group['link'])) { ?>
                                <a href="<?php echo $heading_link_group['link']['url']; ?>"><?php echo $heading_link_group['link']['title']; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<script>

jQuery(document).ready(function($) {
        var totalCards = $('.cardsHelp').length;
        var middleIndex = Math.floor(totalCards / 2);

        $('.cardsHelp').eq(middleIndex).addClass('middel');
    });
</script>