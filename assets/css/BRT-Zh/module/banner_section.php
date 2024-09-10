<!-- SLIDER section -->
<?php echo do_shortcode('[our_customer_shortcode]'); ?>

<!-- BANNER section testimonial page -->

           <?php 
            $star_image = get_sub_field('star_image');
            $ratings = get_sub_field('ratings');
            $heading = get_sub_field('heading');    
            ?>

            <section class="ratingBlock">
                <div class="container">
                    <div class="welComeInner text-center">
                        <div class="startIcontRating">
							<div class="star-rating-icons">
						    <?php echo $star_image; ?>
							</div>
                            <p><?php echo $ratings; ?></p>
                        </div>
                        <h2 class="text-center"><?php echo $heading; ?></h2>

                        <?php if ( have_rows( 'repeater' ) ) : ?>
                            <?php while ( have_rows( 'repeater' ) ) : the_row(); ?>
                                <?php
                                $content = get_sub_field('content');
                                ?>
                                <p class="mb-5"><?php echo $content; ?></p>
                            <?php endwhile; ?>
                        <?php endif; ?>

                    </div>
                </div>
            </section>

            <section class="reviewSlider">
            <div class="container">
                    <?php echo do_shortcode('[our_testimonial_slider_shortcode]'); ?>
            </div>
            </section>