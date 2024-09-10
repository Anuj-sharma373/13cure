<?php
/* 
 * File Name - Partnership Banner Section
 * Page Name - Home Page
 * Theme Name - BRT Zh Theme
 */

$heading = get_sub_field("heading");
$content = get_sub_field("content");
?>

<section class="partnershipBlock">
            <div class="container">
                <div class="textArea">
                    <?php if(!empty($heading)) { ?>
                    <h2><?php echo $heading; ?></h2>
                    <?php } if(!empty($content))  ?>
                 <?php echo $content; ?>    
                </div>
            </div>
    </section>
