<?php
/**
 * Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage BRT_Theme
 * @since BRT Theme 1.0
 */




get_header(); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
jQuery(document).ready(function($) {
    // Initially hide the term descriptions
    $('.cstm-full').hide();

    // Toggle visibility on button click
    $('.toggleDescription').click(function(e) {
        e.preventDefault();
        $('.cstm-full').toggle();
        $(this).text($(this).text() === 'Read More' ? 'Read Less' : 'Read More');
    });
});
</script>



<div class="cstm-single">
	<div class="content" role="main">

		<?php
		/*
		 * Run the loop to output the post.
		 * If you want to overload this in a child theme then include a file
		 * called loop-single.php and that will be used instead.
		 */
		//get_template_part('loop', 'single');
		?>

	</div><!-- #content -->


	<section class="commanCardBlock aboutUsBlock singleTreatMentBAnner">
    <div class="customeContainer m-auto">
        <div class="row align-items-center m-0">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="textBlock">
                    <?php
                    if (have_posts()) :
                        while (have_posts()) : the_post();
                            echo '<h2>' . get_the_title() . '</h2>';
                            echo '<p class="">' . the_content() . '</p>';
                            $terms = get_the_terms(get_the_ID(), 'your_taxonomy_name_here');
                            if ($terms && !is_wp_error($terms)) {
                                foreach ($terms as $term) {
                                    echo '<p class="mb-3 lastChildP">';
                                    echo $term->description;
                                    echo '</p>';
                                }
                            }
                        endwhile;
                    endif;
                    ?>
                   <a href="#" class="btn btn-primary rounded-pill redButton text-uppercase toggleDescription"><?php echo esc_html( get_field('button_text_single_page') ); ?></a>
                </div>
				
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 pr-0">
                <div class="aboutUsImage">
                    <?php
                    // Assuming the post has a featured image
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('full', ['class' => 'w-100 h-100', 'alt' => '']);
                    } else {
                        // Placeholder image if no featured image
                        echo '<img src="' . get_template_directory_uri() . '/images/default.jpg" class="w-100 h-100" alt="">';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

	<section class="breadcrume">
		<div class="breadcrumBlock">
			<ul>
				<li class="readMore"><?php echo esc_html( get_field('text_page_1_single_page') ); ?><div class="line position-relative"></div>
				</li>
				<li class="readMore"><?php echo esc_html( get_field('text_page_2_single_pages') ); ?><div class="line position-relative"></div>
				</li>
				<li><?php echo esc_html( get_field('text_page_3_single_pagess') ); ?></li>
			</ul>
		</div>
	</section>



	<section class="commanCardBlock approachesBlock singleTreatment_">
		<div class="customeContainer ml-0 mr-auto mb-0 mt-0 ">
			<div class="row align-items-center m-0 row-reverse flex-row-reverse">
				<div class="col-xl-6 col-lg-6 col-md-6">
					<div class="textBlock ml-auto">
						<h2><?php echo esc_html( get_field('heading_text_single_page') ); ?></h2>
						<p class="mb-5"><?php the_field('header_content_text_single_page'); ?>
						</p>
						<?php 

$link = get_field('header_button_single_page');

if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
    <a class="btn btn-primary rounded-pill redButton text-uppercase" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
<?php endif; ?>
						<!-- <button type="button" class="btn btn-primary rounded-pill redButton text-uppercase">find out
							more</button> -->
					</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-6 pl-0">
					<div class="aboutUsImage">
						<img src="<?php echo esc_url( get_field( 'header_image_single_page' ) ); ?>" alt="" class="w-100">
					</div>
				</div>
			</div>
		</div>
	</section>


	<section class="graphSection">
		<div class="container">
			<div class="graphBlock">
				<div class="row">
					<div class="col-xl-6 col-lg-6 col-md-6">
						<div class="textBlock ml-auto">
							<h2><?php echo esc_html( get_field('graph_text_single') ); ?></h2>
							<p class="mb-5"><?php the_field('graph_description_single'); ?> </p>
							
							<!-- <button type="button" class="btn btn-primary rounded-pill redButton text-uppercase">find out
								more</button> -->
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6">
						<div class="underlyingData ml-auto">
							<div class="readMore position-relative">
							<?php 

$link = get_field('graph_line_link_single');

if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
    <a class="d-block  text-uppercase text-decoration-none fw-semibold" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?>
<?php endif; ?>
								<!-- <a href="#" class="d-block  text-uppercase text-decoration-none fw-semibold">see
									underlying data</a> -->
								<div class="line position-relative"></div>
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="graphBlockCards">

					<div class="circle-container">
					<?php 
$circle_repeater = get_field('circle_reapeter_page_single');
if( $circle_repeater ): 
    foreach( $circle_repeater as $circle ): 
        $percentage = $circle['circle_percentage_page_single'];
        $content = $circle['circle_content_page_single'];
        $year = $circle['circle_year_page_single']; 
?>

						<!-- First Loader -->
						<div class="loader" data-percentage="<?php echo esc_attr($percentage); ?>">
							<div class="cirle_set_up"><svg viewBox="0 0 100 100">
								<circle class="background" cx="50" cy="50" r="40" />
								<circle class="remaining" cx="50" cy="50" r="40" />
							</svg>
							</div>
							<div class="all_content_one">
							<div class="content_related"><?php echo wp_kses_post($content); ?></div>
							<div class="year"><?php echo esc_html($year); ?></div>
							<div class="percentage"></div>
						</div>
						</div>
						<?php 
    endforeach;
endif; 
?>

						<!-- Second Loader -->
						<!-- <div class="loader" data-percentage="59.48">
						<div class="cirle_set_up"><svg viewBox="0 0 100 100">
								<circle class="background" cx="50" cy="50" r="40" />
								<circle class="remaining" cx="50" cy="50" r="40" />
							</svg>
							</div>
							<div class="all_content_one">
							<div class="content_related">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
							<div class="year">2022</div>
							<div class="percentage"></div>
						</div>
						</div> -->

						<!-- Third Loader -->
						<!-- <div class="loader" data-percentage="75.02">
						<div class="cirle_set_up"><svg viewBox="0 0 100 100">
								<circle class="background" cx="50" cy="50" r="40" />
								<circle class="remaining" cx="50" cy="50" r="40" />
							</svg>
							</div>
							<div class="all_content_one">
							<div class="content_related">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
							<div class="year">2023</div>
							<div class="percentage"></div>
						</div>
						</div> -->
					</div>

				</div>
			</div>
		</div>
	</section>

	
</div><!-- #container -->
<?php get_template_part('templates-part'); ?>
<?php get_footer(); ?>