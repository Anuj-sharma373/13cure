<?php
/**
 * Template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage BRT_Theme
 * @since BRT Theme 1.0
 */

get_header(); ?>

		<div class="container">
		

<?php
	/*
	 * Queue the first post, that way we know
	 * what date we're dealing with (if that is the case).
	 *
	 * We reset this later so we can run the loop
	 * properly with a call to rewind_posts().
	 */
if ( have_posts() ) {
	the_post();
}
?>

			<h1 class="page-title">
			<?php
			if ( is_day() ) {
				/* translators: %s: Date. */
				printf( __( 'Daily Archives: <span>%s</span>', 'brttheme' ), get_the_date() );
			} elseif ( is_month() ) {
				/* translators: %s: Date. */
				printf( __( 'Monthly Archives: <span>%s</span>', 'brttheme' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'brttheme' ) ) );
			} elseif ( is_year() ) {
				/* translators: %s: Date. */
				printf( __( 'Yearly Archives: <span>%s</span>', 'brttheme' ), get_the_date( _x( 'Y', 'yearly archives date format', 'brttheme' ) ) );
			} else {
				_e( 'Blog Archives', 'brttheme' );
			}
			?>
			</h1>

<?php
	/*
	 * Since we called the_post() above, we need
	 * to rewind the loop back to the beginning.
	 * That way we can run the loop properly, in full.
	 */
	rewind_posts();

	/*
	 * Run the loop for the archives page to output the posts.
	 * If you want to overload this in a child theme then include a file
	 * called loop-archive.php and that will be used instead.
	 */
	get_template_part( 'loop', 'archive' );
?>

		</div><!-- #container -->


<?php get_footer(); ?>
