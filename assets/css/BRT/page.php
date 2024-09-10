<?php
/**
 * Template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage BRT_Theme
 * @since BRT Theme 1.0
 */

get_header(); ?>
		<?php get_template_part('templates-part'); ?>
<?php the_content(); ?>

<?php get_footer(); ?>
