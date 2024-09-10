<!-- Four cards Section Our Services -->
                    <?php
                  // Fields for layout 4
                    $repeater = get_sub_field('repeater');
                    ?>

                    <section class="fourCards">
                        <div class="container">
                            <div class="innerFourCards">
                                <div class="row">
                                    <?php if ($repeater):
                                        foreach ($repeater as $item):
                                            $image = $item['image'];
                                            $heading = $item['heading'];
                                            $content = $item['content'];
                                            $button = $item['button'];
                                            ?>
                                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                                <div class="cardsBlock">
                                                    <div class="imageBlock">
                                                        <img src="<?php echo $image; ?>" alt="" class="w-100">
                                                    </div>
                                                    <div class="TextAreaBlock">
                                                        <h5><?php echo $heading; ?></h5>
                                                        <p><?php echo $content; ?></p>
                                                        <a class="btn btn-primary rounded-pill mx-auto mr-auto text-uppercase"
                                                            href="<?php echo esc_url($button['url']); ?>"><?php echo esc_html($button['title']); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </section>