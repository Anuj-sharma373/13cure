<?php
/* 
 * File Name - Inner News Section
 * Page Name - What's Hot Page
 * Theme Name - BRT Zh Theme
 */

$heading = get_sub_field("heading");
$content = get_sub_field("content");
$button = get_sub_field("button");
$image = get_sub_field("image");
$bg_image = get_sub_field("bg_image");

// Define the number of posts per page
$posts_per_page = 6;

// Get the current page number from URL (default is 1)
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

// Query to fetch latest posts
$args = array(
    'post_type' => 'post',
    'posts_per_page' => $posts_per_page,
    'paged' => $paged
);
$query = new WP_Query($args);
?>

<section class="letestHotNews">
    <div class="container">
        <div class="newsCardsBlock">
            <div class="headIngBlock">
                <p class="text-uppercase"><?php echo esc_html($heading); ?></p>
                <h4><?php echo esc_html($content); ?></h4>
            </div>
            <div class="row">
                <?php if ($query->have_posts()) : ?>
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="innerNewCards">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-12">
                                        <div class="imageBlock_">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>" class="w-100">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12">
                                        <div class="textAreaB">
                                            <h4><?php the_title(); ?></h4>
                                            <p><?php echo wp_trim_words(get_the_excerpt(), 30, '...'); ?></p>
                                            <div class="readMore position-relative d-flex">
                                                <a href="<?php the_permalink(); ?>" class="d-block text-uppercase text-decoration-none fw-semibold">read more</a>
                                                <div class="line position-relative"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <div class="nextpagesBtn d-flex align-items-center">
                <?php
                // Pagination
                $total_pages = $query->max_num_pages;

                if ($total_pages > 1) {
                    $current_page = max(1, get_query_var('paged'));

                    // Previous Arrow
                    if ($current_page > 1) {
                        echo '<a href="' . get_pagenum_link($current_page - 1) . '" class="prev-arrow"><button class="prev-arrow"><span></span></button></a>';
                    } else {
                        echo '<button class="prev-arrow disabled"><span></span></button>';
                    }

                    echo '<p class="m-0 text-uppercase">' . $current_page . '/' . $total_pages . ' Pages</p>';

                    // Next Arrow
                    if ($current_page < $total_pages) {
                        echo '<a href="' . get_pagenum_link($current_page + 1) . '" class="next-arrow"><button><span></span></button></a>';
                    } else {
                        echo '<button class="next-arrow disabled"><span></span></button>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>

