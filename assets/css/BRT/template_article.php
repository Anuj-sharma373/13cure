<?php
/**
 * Template Name: Article Page
 */

get_header(); ?>

<section class="treatMentBlock">
            <div class="container">
                <div class="welComeInner text-left">
                    <h2 class="mw-100"><?php echo get_the_title() ; ?></h2>    
                </div>

                <?php
// Query arguments for custom post type "treatments"
$args = array(
    'post_type' => 'post',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'order' => 'DESC',
    'orderby' => 'publish_date',

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
                                        $excerpt = wp_trim_words( get_the_content(), 100, '' ); // Change 20 to the desired number of words
                                        echo '<p>' . $excerpt . '</p>';
                                        ?>                                
                                </div>
                                <button type="button" onclick="window.location.href='<?php echo get_permalink(); ?>'" class="btn btn-primary rounded-pill redButton text-uppercase">Find out more</button>

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
</section>

<?php get_footer(); ?>
