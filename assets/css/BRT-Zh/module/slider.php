            <?php
            $heading = get_sub_field('heading');
            $button = get_sub_field('button');
            ?>

            <section class="sliderBlock position-relative secondSlider">
                <div class="container">
                    <div class="innerSlider">
                        <div class="welComeInner text-left">
                            <h2><?php echo $heading; ?></h2>
                            <a href="<?php echo $button['url']; ?>" class="btn btn-primary rounded-pill redButton text-uppercase"><?php echo $button['title']; ?></a>
                        </div>
                        <div class="innerSlider_ position-relative">
                            <div class="slickSlidr">
                                <?php echo do_shortcode('[patuents_say_shortcode]'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>