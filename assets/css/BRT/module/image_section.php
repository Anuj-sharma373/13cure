            <?php
            $background_image = get_sub_field('background_image');
            $heading = get_sub_field('heading');
            $button = get_sub_field('button');
            ?>

            <section class="brtExpBlock position-relative aboutUsBlock_" style="background-image: unset;">
                <div class="container">
                    <div class="videoBlock">
                        <div class="row align-items-center">
                            <div class="col-xl-7 col-lg-7 col-md-7">
                                <div class="welComeInner text-left">
                                    <h2><?php echo $heading; ?></h2>

                                    <?php if ( have_rows( 'repeater' ) ) : ?>
                                        <?php while ( have_rows( 'repeater' ) ) : the_row(); ?>
                                            <?php
                                            $content = get_sub_field('content');
                                            ?>
                                            <p class="mb-3"><?php echo $content; ?></p>
                                        <?php endwhile; ?>
                                    <?php endif; ?>

                                    <a href="<?php echo $button['url']; ?>" class="btn btn-primary rounded-pill redButton text-uppercase"><?php echo $button['title']; ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bgImage position-absolute">
                    <img src="<?php echo $background_image; ?>" alt="" class="w-100">
                </div>
            </section>