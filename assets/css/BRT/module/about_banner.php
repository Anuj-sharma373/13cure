<?php
$about_us_page_first_section_heading = get_sub_field("about_us_page_first_section_heading");
$about_us_page_first_section_sub_heading = get_sub_field("about_us_page_first_section_sub_heading");
$about_us_page_first_section_find_out_button = get_sub_field("about_us_page_first_section_find_out_button");
$about_us_page_first_section_image = get_sub_field("about_us_page_first_section_image");
?>

<section class="commanCardBlock aboutUsBlock aboutUsSecOne">
    <div class="customeContainer ml-auto">
        <div class="row align-items-center m-0">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="textBlock">
                    <h2><?php echo $about_us_page_first_section_heading; ?></h2>
                    <h4 class="mb-3"><?php echo $about_us_page_first_section_sub_heading; ?></h4>
                    <?php
                    // Check if the repeater field has rows
                    if (have_rows('about_us_page_first_section_content_repeater')) :
                        // Loop through the rows of repeater fields
                        while (have_rows('about_us_page_first_section_content_repeater')) : the_row();
                            // Display sub field value inside the repeater
                            $about_us_page_first_section_content_repeater_text = get_sub_field('about_us_page_first_section_content_repeater_text');
                    ?>
                            <p class="mb-3">
                                <?php echo $about_us_page_first_section_content_repeater_text; ?>
                            </p>
                    <?php
                        endwhile;
                    endif;
                    ?>
                    <a class="btn btn-primary rounded-pill redButton text-uppercase" href="<?php echo $about_us_page_first_section_find_out_button['url']; ?>">
<?php echo $about_us_page_first_section_find_out_button['title']; ?>
                    </a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 pr-0">
                <div class="aboutUsImage">
                    <img src="<?php echo $about_us_page_first_section_image; ?>" alt="" class="w-100 h-100" />
                </div>
            </div>
        </div>
    </div>
</section>
