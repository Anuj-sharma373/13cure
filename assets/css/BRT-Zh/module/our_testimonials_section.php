            <?php 
            $heading = get_sub_field('heading');
            $main_image = get_sub_field('main_image');
            $button = get_sub_field('button');
            $sub_heading = get_sub_field('sub_heading');
            ?>

            <section class="whatsNewBlock">
                <div class="testimonialContainer">
                    <div class="welComeInner text-left">
                        <h2><?php echo esc_html( $heading ); ?></h2>
                    </div>   

                    <div class="whatsNewInner">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <div class="leftSideCard">
                                    <div class="imageCard_">
                                        <img src="<?php echo esc_url( $main_image['url'] ); ?>" alt="<?php echo esc_attr( $main_image['alt'] ); ?>" class="w-100">
                                    </div>
                                    <?php if ( have_rows( 'repeater' ) ) : ?>
                                        <?php while ( have_rows( 'repeater' ) ) : the_row(); ?>
                                            <?php $content = get_sub_field('content'); ?>
                                            <p><?php echo esc_html( $content ); ?></p>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                    <a href="<?php echo esc_url( $button['url'] ); ?>" class="btn btn-primary rounded-pill redButton text-uppercase"><?php echo esc_html( $button['title'] ); ?></a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <div class="whatsNewB">
                                    <h4><?php echo esc_html( $sub_heading ); ?></h4>
                                </div>
                                <?php echo do_shortcode('[our_category_shortcode]'); ?>
                            </div>
                        </div>
                    </div>

                </div>
            </section>