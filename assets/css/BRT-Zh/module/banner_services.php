<!-- Banner Section Our Services -->
                   <?php
                    $banner_section_heading = get_sub_field("banner_section_heading");
                    $background_image = get_sub_field("background_image");
                    $banner_repeater = get_sub_field("banner_repeater");
                    ?>
                    <section class="helpYouBlock servicesBanner position-relative">
                        <div class="customeContainer">
                            <div class="helpYouInner">
                                <div class="welComeInner text-left">
                                    <h2><?php echo $banner_section_heading; ?></h2>
                                </div>
                                <div class="findOutMore position-relative">
                                    <div class="row justify-content-center">
                                        <?php if (have_rows('banner_repeater')): ?>
                                            <?php $index = 0; ?>
                                            <?php while (have_rows('banner_repeater')):
                                                the_row();
                                                $banner_tabs = get_sub_field("banner_tabs");
                                                ?>
                                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="card border-0 align-items-center justify-content-center rounded-pill --darkColor--001 tab-button <?php echo $index === 0 ? 'active' : ''; ?>"
                                                        data-index="<?php echo $index; ?>">
                                                        <h5 class="text-white m-0 text-center"><?php echo $banner_tabs; ?></h5>
                                                    </div>
                                                </div>
                                                <?php $index++; ?>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bgImage position-absolute">
                            <img src="<?php echo esc_url($background_image); ?>" class="w-100 h-100 object-fit-cover">
                        </div>
                    </section>
                    <section class="commanCardBlock servivesBlock">
                        <?php if (have_rows('banner_repeater')): ?>
                            <?php $index = 0; ?>
                            <?php while (have_rows('banner_repeater')):
                                the_row();
                                $banner_tabs_heading = get_sub_field("banner_tabs_heading");
                                $banner_tabs_content = get_sub_field("banner_tabs_content");
                                $banner_tabs_button = get_sub_field("banner_tabs_button");
                                $banner_tabs_image = get_sub_field("banner_tabs_image");
                                ?>
                                <div class="customeContainer ml-auto tab-content <?php echo $index === 0 ? 'active' : ''; ?>"
                                    data-index="<?php echo $index; ?>" style="display: <?php echo $index === 0 ? 'block' : 'none'; ?>;">
                                    <div class="row align-items-center m-0">
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="textBlock">
                                                <h2><?php echo $banner_tabs_heading ?></h2>
                                                <p class="mb-5">
                                                    <?php echo $banner_tabs_content; ?>
                                                </p>
                                                <a href="<?php echo esc_url($banner_tabs_button['url']); ?>">
                                                    <button type="button"
                                                        class="btn btn-primary rounded-pill redButton text-uppercase"><?php echo esc_html($banner_tabs_button['title']); ?></button>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 pr-0">
                                            <div class="aboutUsImage">
                                                <img src="<?php echo $banner_tabs_image; ?>" alt="" class="w-100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $index++; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </section>