<?php
/**
 * Template Name: Treatments Page
 */

get_header(); ?>
<section class="treatMentBlock">
    <div class="container">
        <div class="welComeInner text-left">
            <h2 class="mw-100"><?php echo get_the_title(); ?></h2>    
        </div>

        <?php
        // Query arguments for custom post type "treatments"
        $args = array(
            'post_type' => 'treatments',
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'order' => 'ASC',
            'orderby' => 'title',
        );

        // Custom query for "treatments" CPT
        $treatments_query = new WP_Query( $args );

        // Check if the query returns any posts
        if ( $treatments_query->have_posts() ) : ?>

            <div class="treatmentCardBlock">
                <div class="row">
                    <?php
                    // Start the loop
                    while ( $treatments_query->have_posts() ) : $treatments_query->the_post(); ?>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="treatmentCart">
                                <div class="imageBlockTreat">
                                    <?php
                                    // Get the featured image of the post
                                    if ( has_post_thumbnail() ) {
                                        the_post_thumbnail( 'full', array( 'class' => 'w-100' ) );
                                    }
                                    ?>                                  
                                </div>
                                <div class="treatmentTextBlock">
                                    <h4><?php echo get_the_title(); ?></h4>                                    
                                    <?php
                                    // Get the content and trim it to a specific number of words
                                    $excerpt = wp_trim_words( get_the_content(), 100, '' ); // Change 100 to the desired number of words
                                    echo '<p>' . $excerpt . '</p>';
                                    ?>                                
                                </div>
                                <button type="button" onclick="window.location.href='<?php //echo get_permalink(); ?> #'" class="btn btn-primary rounded-pill redButton text-uppercase">Book An Appointment</button>
                            </div>
                        </div>
                    <?php
                    // End the loop
                    endwhile; ?>
                </div>
            </div>
            <?php
            // Reset post data
            wp_reset_postdata();
        else :
            // If no posts were found, display a message
            echo '<p>No treatments found.</p>';
        endif;
        ?>
    </div>
</section>

<?php if ( have_rows( 'testimonials_main' ) ) : ?>
    <?php while ( have_rows( 'testimonials_main' ) ) : the_row(); ?>
        <?php if ( get_row_layout() == 'book_a_consultation' ) : ?>
            <?php
            $heading = get_sub_field('heading');
            $content = get_sub_field('content');
            $sub_heading = get_sub_field('sub_heading');    
            ?>
            <section class="commanCardBlock servicesAccording bookConsulatation">
                <div class="testimonialContainer m-auto ">
                    <div class="row m-0">
                        <div class="col-xl-6 col-lg-6 col-md-6">
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
                                        <?php if (have_rows('repeater')) : ?>
                                            <?php $index = 1; ?>
                                            <?php while (have_rows('repeater')) : the_row(); ?>
                                                <?php
                                                $heading = get_sub_field("heading");
                                                $content = get_sub_field("content");
                                                ?>
                                                <div class="card">
                                                    <div class="card-header" id="heading<?php echo $index; ?>">
                                                        <h5 class="mb-0" data-toggle="collapse" data-target="#collapse<?php echo $index; ?>" aria-controls="collapse<?php echo $index; ?>">
                                                            <button class="btn btn-link">
                                                                <?php echo $heading; ?>
                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div id="collapse<?php echo $index; ?>" class="collapse <?php echo ($index === 1) ? 'show' : ''; ?>" aria-labelledby="heading<?php echo $index; ?>" data-parent="#accordion">
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
        <?php endif; // End 'book_a_consultation' layout check ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php if ( have_rows( 'testimonials_main' ) ) : ?>
    <?php while ( have_rows( 'testimonials_main' ) ) : the_row(); ?>
        <?php if ( get_row_layout() == 'contact_form' ) : ?>
            <?php $heading = get_sub_field('heading'); ?>
        <?php endif; // End 'contact_form' layout check ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php if ( have_rows( 'testimonials_main' ) ) : ?>
    <?php while ( have_rows( 'testimonials_main' ) ) : the_row(); ?>
        <?php if ( get_row_layout() == 'faq' ) : ?>
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
                                    <div id="accordionfaq">
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
                                                    <div id="collapse<?php echo $index; ?>" class="collapse <?php echo ($index === 11) ? 'show' : ''; ?>" aria-labelledby="headingg<?php echo $index; ?>" data-parent="#accordionfaq">
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
        <?php endif; // End 'faq' layout check ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_template_part('module-part'); ?>
<?php get_footer(); ?>
