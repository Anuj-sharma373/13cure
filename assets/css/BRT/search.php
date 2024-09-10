<?php
/**
 * Template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage BRT_Theme
 * @since BRT Theme 1.0
 */

get_header(); ?>

		<div class="container">
			<div class="serach-page">

<?php if ( have_posts() ) : ?>
				<h1 class="page-title">
				<?php
				/* translators: %s: Search query. */
				printf( __( 'Search Results for: %s', 'brttheme' ), '<span>' . get_search_query() . '</span>' );
				?>
				</h1>
				<?php
				/*
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called loop-search.php and that will be used instead.
				 */
				get_template_part( 'loop', 'search' );
				?>
<?php else : ?>
				<div id="post-0" class="post no-results not-found">
					<h2 class="entry-title"><?php _e( 'Nothing Found', 'brttheme' ); ?></h2>
					<div class="entry-content">
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'brttheme' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-0 -->
<?php endif; ?>
</div>
		</div><!-- #container -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
