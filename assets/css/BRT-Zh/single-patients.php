<?php
/**
 * Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage BRT_Zh_Theme
 * @since BRT Zh Theme 1.0
 */

get_header(); ?>

		<div class="container">
			

			<?php
			/*
			 * Run the loop to output the post.
			 * If you want to overload this in a child theme then include a file
			 * called loop-single.php and that will be used instead.
			 */
			get_template_part( 'loop', 'single' );
			?>

			
		</div><!-- #container -->


<?php get_footer(); ?>