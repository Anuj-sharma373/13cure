<?php
/* 
 * File Name - Patients Say's Section
 * Page Name - Home Page
 * Theme Name - BRT Theme
 */

$heading = get_sub_field("heading");
$content = get_sub_field("content");
$button = get_sub_field("button");
$image = get_sub_field("image");
$bg_image = get_sub_field("bg_image");
?>

<section class="brtExpBlock">
        <div class="container">
            <div class="videoBlock">
                <div class="row align-items-center">
                    <div class="col-xl-5">
                        <div class="welComeInner text-left">
                            <h2>Enjoy The BRT Experience</h2>
                            <button type="button" class="btn btn-primary rounded-pill redButton text-uppercase">get in touch</button>
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <div class="videoBlockInner">
                            <img src="images/videoImage.png" class="object-fit-cover w-100" autoplay/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>