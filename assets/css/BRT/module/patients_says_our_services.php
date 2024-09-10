<!-- patients_says Section Our Services -->
                   <?php
                    // Fields for layout 5
                    $heading = get_sub_field("heading");
                    $code = get_sub_field("code");
                    $button = get_sub_field("button");
                    ?>

                    <section class="sliderBlock position-relative secondSlider">
                        <div class="container">
                            <div class="innerSlider">
                                <div class="welComeInner text-left">
                                    <?php if (!empty($heading)): ?>
                                        <h2><?php echo $heading; ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($button)): ?>
                                        <a class="btn btn-primary rounded-pill redButton text-uppercase"
                                            href="<?php echo esc_url($button['url']); ?>"><?php echo esc_html($button['title']); ?></a>
                                    <?php endif; ?>
                                </div>
                                <div class="innerSlider_ position-relative">
                                    <div class="slickSlidr">
                                        <?php echo do_shortcode($code); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>