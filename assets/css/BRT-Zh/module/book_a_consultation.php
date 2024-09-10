<?php
$heading = get_sub_field('heading');
$content = get_sub_field('content');
$sub_heading = get_sub_field('sub_heading');
?>

<section class="commanCardBlock   servicesAccording bookConsulatation">
    <div class="testimonialContainer m-auto ">
        <div class="row  m-0">
            <div class="col-xl-6 col-lg-6 col-md-6 pl-0">
                <div class="formBlock">
                    <h2><?php echo $heading; ?></h2>
                    <p> <?php echo $content; ?> </p>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="textBlock ml-auto">
                    <h5><?php echo $sub_heading; ?></h5>
                    <div class="accordingBlock">
                        <p class="mb-5"><?php echo $quick_links_text; ?></p>

                        <div id="accordion">
                            <?php if (have_rows('repeater')): ?>
                                <?php $index = 1; ?>
                                <?php while (have_rows('repeater')):
                                    the_row(); ?>
                                    <?php
                                    $heading = get_sub_field("heading");
                                    $content = get_sub_field("content");
                                    ?>
                                    <div class="card">
                                        <div class="card-header" id="heading<?php echo $index; ?>">
                                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapse<?php echo $index; ?>"
                                                aria-controls="collapse<?php echo $index; ?>">
                                                <button class="btn btn-link">
                                                    <?php echo $heading; ?>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapse<?php echo $index; ?>"
                                            class="collapse <?php echo ($index === 1) ? 'show' : ''; ?>"
                                            aria-labelledby="heading<?php echo $index; ?>" data-parent="#accordion">
                                            <div class="card-body">
                                                <?php echo $content; ?>
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