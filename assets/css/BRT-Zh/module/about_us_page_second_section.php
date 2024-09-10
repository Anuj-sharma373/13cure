<!-- About us page Second Section -->

<?php
$about_us_page_first_section_heading = get_sub_field("about_us_page_first_section_heading");
$about_us_page_first_section_content = get_sub_field("about_us_page_first_section_content");

?>

<section class="aboutUsTextBlock">
        <div class="container commanContainer">

            <div class="innerTextAbout">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="leftSideHeading">
                            <h2><?php echo $about_us_page_first_section_heading; ?></h2>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="rightSideText">
                            <p class="mb-3">
                             <?php echo  $about_us_page_first_section_content; ?>
                            </p>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>