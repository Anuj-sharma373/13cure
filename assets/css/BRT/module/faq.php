<?php 
            $heading_main = get_sub_field('heading_main');
            $quick_links_text = get_sub_field('quick_links_text');
            $contact_heading = get_sub_field('contact_heading');
            ?>

            <section class="commanCardBlock servicesAccording productFaq">
                <div class="testimonialContainer mr-auto">
                    <div class="row m-0">
                        <div class="col-xl-6 col-lg-6 col-md-6 pl-0">
                            <div class="formBlock">
                                <div class="contact-form-wrapper">
                                    <div class="contact-form-heading testimonials">
                                        <h2><?php echo $contact_heading; ?></h2>
                                    </div>
                                    <div class="contact-form-content">
                                        <?php echo do_shortcode('[contact-form-7 id="6c40ca3" title="Contact Details"]'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="textBlock ml-auto">
                                <h2><?php echo esc_html( $heading_main ); ?></h2>
                                <div class="accordingBlock">
                                    <p class="mb-5"><?php echo esc_html( $quick_links_text ); ?></p>

                                    <div id="accordiontestimonial">
                                        <?php if ( have_rows( 'repeater' ) ) : ?>
                                            <?php $index = 11; ?>
                                            <?php while ( have_rows( 'repeater' ) ) : the_row(); ?>
                                                <?php
                                                $sub_heading = get_sub_field('sub_heading');
                                                $content = get_sub_field('content');
                                                ?>
                                                <div class="card">
                                                    <div class="card-header" id="headingg<?php echo $index; ?>">
                                                        <h5 class="mb-0" data-toggle="collapse" data-target="#collapse<?php echo $index; ?>" aria-expanded="<?php echo ($index === 11) ? 'true' : 'false'; ?>" aria-controls="collapse<?php echo $index; ?>">
                                                            <button class="btn btn-link" type="button" >
                                                                <?php echo esc_html( $sub_heading ); ?>
                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div id="collapse<?php echo $index; ?>" class="collapse <?php echo ($index === 11) ? 'show' : ''; ?>" aria-labelledby="heading<?php echo $index; ?>" data-parent="#accordiontestimonial">
                                                        <div class="card-body">
                                                            <?php echo wp_kses_post( $content ); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $index++; ?>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>