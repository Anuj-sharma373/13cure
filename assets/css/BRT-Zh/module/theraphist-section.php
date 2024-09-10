<?php
/*
Template Name: Therapists Page
*/
get_header();
?>

<div class="container">
    <div id="therapist-search-section">
        <div class="search-container">
            <input type="text" id="therapist-search-bar" placeholder="Search Therapies...">
            <button id="search-button">
                <i class="fa fa-search"></i> <!-- Font Awesome search icon -->
            </button>
        </div>
    </div>

    <div id="therapist-list" class="therapist-grid">
        <?php
        $args = array(
            'post_type' => 'therapist',
            'posts_per_page' => -1,
        );
        $therapists = new WP_Query($args);
        if ($therapists->have_posts()) :
            while ($therapists->have_posts()) : $therapists->the_post();
                $designation = get_field('designation');
                ?>
                <div class="therapist-item">
                    <?php
                    // Get the full-size image URL
                    $image_url = wp_get_attachment_image_url(get_post_thumbnail_id(), 'full');
                    if ($image_url) :
                    ?>
                    <img src="<?php echo $image_url; ?>" alt="<?php the_title_attribute(); ?>">
                    <?php endif; ?>
                    <h2><?php the_title();?></h2>
                    <p><?php echo $designation;?></p>
                </div>
            <?php
            endwhile;
        else :
            ?>
            <p id="no-results-msg">No therapists found</p>
        <?php
        endif;
        wp_reset_postdata();
        ?>
    </div>

    <!-- Placeholder for search results -->
    <div id="search-results"></div>

    <!-- Message for no results found -->
    <p id="no-results-msg" style="display:none;">No therapists found</p>
</div>
<script>
jQuery(document).ready(function($) {
    $('#search-button').on('click', function() {
        var searchTerm = $('#therapist-search-bar').val().trim().toLowerCase();
        var found = false;

        $('#therapist-list').each(function() {
            var therapistName = $(this).find('h2').text().trim().toLowerCase();
            if (therapistName.includes(searchTerm)) {
                $(this).show(); // Show matching therapists
                found = true;
            } else {
                $(this).hide(); // Hide non-matching therapists
            }
        });

        // Show/hide no results message
        if (!found) {
            $('#no-results-msg').show(); // Show message if no therapists found
        } else {
            $('#no-results-msg').hide(); // Hide message if therapists found
        }

        // Clear previous search results
        $('#search-results').empty();
    });
});
</script>
<?php get_footer(); ?>
