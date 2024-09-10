<!-- Resonance Section Our Services -->
                    <?php
                    // Fields for layout 3
                    $image = get_sub_field("image");
                    $main_heading = get_sub_field("main_heading");
                    $main_heading_content = get_sub_field("main_heading_content");
                    $read_more_button = get_sub_field("read_more_button");
                    $quick_links_text = get_sub_field("quick_links_text");
                    ?>

                    <section class="commanCardBlock aboutUsSecOne servicesAccording">
                        <div class="customeContainer mr-auto">
                            <div class="row m-0">
                                <div class="col-xl-6 col-lg-6 col-md-6 pl-0 pl-0">
                                    <div class="aboutUsImage">
                                        <img src="<?php echo $image; ?>" alt="" class="w-100 h-100">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 pl-0">
                                    <div class="textBlock ml-auto">
                                        <h2><?php echo $main_heading; ?></h2>
                                        <p class="mb-3"><?php echo $main_heading_content; ?></p>
                                        <a class="btn btn-primary rounded-pill redButton text-uppercase"
                                            href="<?php echo $read_more_button['url']; ?>"><?php echo $read_more_button['title']; ?></a>

                                        <div class="accordingBlock">
                                            <p class="mb-5"><?php echo $quick_links_text; ?></p>

                                            <div id="accordion">
                                                <?php if (have_rows('repeater')): ?>
                                                    <?php $index = 1; ?>
                                                    <?php while (have_rows('repeater')):
                                                        the_row(); ?>
                                                        <?php
                                                        $content_heading = get_sub_field("content_heading");
                                                        $quick_link_content = get_sub_field("quick_link_content");
                                                        ?>
                                                        <div class="card">
                                                            <div class="card-header" id="heading<?php echo $index; ?>">
                                                                <h5 class="mb-0" data-toggle="collapse" data-target="#collapse<?php echo $index; ?>"
                                                                    aria-controls="collapse<?php echo $index; ?>">
                                                                    <button class="btn btn-link">
                                                                        <?php echo $content_heading; ?>
                                                                    </button>
                                                                </h5>
                                                            </div>

                                                            <div id="collapse<?php echo $index; ?>"
                                                                class="collapse <?php echo ($index === 1) ? 'show' : ''; ?>"
                                                                aria-labelledby="heading<?php echo $index; ?>" data-parent="#accordion">
                                                                <div class="card-body">
                                                                    <?php echo $quick_link_content; ?>
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