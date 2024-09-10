<?php
/*
 * File Name: BRT Experience
 * Theme Name: BRT Theme
 */

$heading = get_sub_field("heading");
$button_link = get_sub_field("button_link");
$video = get_sub_field("video");

?>
<section class="brtExpBlock" autoplay muted loop src="https://brt.ilovedemellows.com/wp-content/uploads/2024/07/green-min-waves.mp4" type="video/mp4">
        <div  class="container">
            <div style="position:relative;z-index:99;" class="videoBlock">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-lg-5 co-md-5">
                        <div class="welComeInner text-left">
                            <?php if(!empty($heading)) { ?>
                            <h2><?php echo $heading; ?></h2>
                            <?php } if(!empty($button_link)) { ?>
                            <a class="btn btn-primary rounded-pill redButton text-uppercase" href="<?php echo $button_link['url']; ?>"><?php echo $button_link['title']; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 co-md-7">
                        <?php if(!empty($video)) { ?>
                        <div class="videoBlockInner">
                            <?php echo $video; ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        
        <video style="object-fit:fill; width:100%; height:100%;position:absolute;left:0;top:0;z-index:9" autoplay="" loop="" muted="">
   	     <source src="https://brt.ilovedemellows.com/wp-content/uploads/2024/07/Wavesmin.mp4"  type="video/mp4">
	   <source src="https://brt.ilovedemellows.com/wp-content/uploads/2024/07/Waves-min-1.ogg" type="video/ogg">
	</video>
    </section>