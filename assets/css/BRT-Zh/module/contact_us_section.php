<?php
/*
 * File Name: Contact Us
 * Theme Name: BRT Zh Theme
 */

$contact_form_title = get_sub_field("contact_form_title");
$contact_us_form_content = get_sub_field("contact_us_form_content");
$content = get_sub_field("content");
$map_code = get_sub_field("map_code");

?>
<section class="contactussBlock">
        <div class="container">
            <div class="contact-us-ss">
                <div class="contact-welComeInner-head">
                    <?php if(!empty($contact_form_title)) { ?>
                        <h2><?php echo $contact_form_title; ?></h2>
                    <?php } ?>
                </div>
                <div class="contact-welComeInner-cont">                
                    <?php if(!empty($contact_us_form_content)) { ?>                    
                        <?php echo $contact_us_form_content; ?>                        
                    <?php } ?>
                </div>

                <div class="contact-us-form">                   
                    <div class="row">                        
                        <div class="contact-frm">
                             <?php echo do_shortcode( '[contact-form-7 id="dbc20fe" title="Contact Page form"]' ); ?>
                             <div class="content-locations">
                                <?php echo $content; ?>
                             </div>
                        </div>                       
                    </div>
                    <div class="contact-map">
                        <?php echo $map_code ?>
                    </div>
                </div>               
            </div>
        </div>
</section>