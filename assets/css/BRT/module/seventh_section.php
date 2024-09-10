<?php 
$about_us_page_seventh_section_heading = get_sub_field("about_us_page_seventh_section_heading");
$about_us_page_seventh_section_read_more_button = get_sub_field("about_us_page_seventh_section_read_more_button");
$about_us_page_seventh_section_image_main = get_sub_field("about_us_page_seventh_section_image_main");
?>

<section class="brtExpBlock position-relative aboutUsBlock_" style="background-image: unset;">
    <div class="container">
        <div class="videoBlock">
            <div class="row align-items-center">
                <div class="col-xl-7">
                    <div class="welComeInner text-left">
                        <h2><?php echo $about_us_page_seventh_section_heading; ?></h2>
                        <?php if( have_rows('about_us_page_seventh_section_repeater') ): ?>
                            <?php while( have_rows('about_us_page_seventh_section_repeater') ): the_row(); ?>
                                <p class="mb-3"><?php the_sub_field('about_us_page_seventh_section_repeater_content'); ?></p>
                            <?php endwhile; ?>
                        <?php endif; ?>
                       
                            <a href="<?php echo $about_us_page_seventh_section_read_more_button['url']; ?>" class="btn btn-primary rounded-pill redButton text-uppercase">
                                <?php echo $about_us_page_seventh_section_read_more_button['title']; ?>
                            </a>
                       
                    </div>
                </div>
                <div class="col-xl-5">
                    <!-- You can add content or elements here if needed -->
                </div>
            </div>
        </div>
    </div>
    <div class="bgImage position-aboslute">
        <img src="<?php echo $about_us_page_seventh_section_image_main; ?>" alt="" class="w-100" />
    </div>
</section>
