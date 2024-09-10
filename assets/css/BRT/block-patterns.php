<?php
/**
 * Block Patterns
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_pattern/
 * @link https://developer.wordpress.org/reference/functions/register_block_pattern_category/
 *
 * @package WordPress
 * @subpackage BRT_Theme
 * @since BRT Theme 3.4
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'brttheme',
		array( 'label' => esc_html__( 'BRT Theme', 'brttheme' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {

	// Image with large heading and paragraph.
	register_block_pattern(
		'brttheme/intro',
		array(
			'title'         => esc_html__( 'Introduction', 'brttheme' ),
			'categories'    => array( 'brttheme' ),
			'viewportWidth' => 700,
			'content'       => '<!-- wp:image {"id":null,"sizeSlug":"large","linkDestination":"none"} --><figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/images/patterns/pattern-barn.jpg" alt="' . esc_attr__( 'A red barn with a white roof in a field.', 'brttheme' ) . '" /><figcaption><em>' . esc_html__( 'An old barn we passed on the drive', 'brttheme' ) . '</em></figcaption></figure><!-- /wp:image --><!-- wp:heading {"style":{"typography":{"fontSize":60}}} --><h2 style="font-size:60px">' . esc_html__( 'A Weekend Away', 'brttheme' ) . '</h2><!-- /wp:heading --><!-- wp:paragraph --><p>' . esc_html__( 'It’s amazing what a good weekend can do. After a tough couple weeks at work, I knew I needed to get away and be in nature. My partner and I decided to take a long weekend and stay in a cabin in the woods. We packed up after work on Friday and drove out into the country, passing through fields full of horses, old farms, and quaint little town squares. It was an idyllic drive. Eventually, we reached our destination and unpacked the car. We couldn’t wait to cook up a simple dinner and then relax by the fireplace.', 'brttheme' ) . '</p><!-- /wp:paragraph -->',
		)
	);

	// Cover block with a pullquote.
	register_block_pattern(
		'brttheme/highlighted-quote',
		array(
			'title'         => esc_html__( 'Highlighted Quote', 'brttheme' ),
			'categories'    => array( 'brttheme' ),
			'viewportWidth' => 700,
			'content'       => '<!-- wp:cover {"overlayColor":"light-gray"} --><div class="wp-block-cover has-light-gray-background-color has-background-dim"><div class="wp-block-cover__inner-container"><!-- wp:pullquote {"textColor":"black","className":"is-style-solid-color"} --><figure class="wp-block-pullquote is-style-solid-color"><blockquote class="has-text-color has-black-color"><p><em>' . esc_html__( '"Take time off&hellip; The world will not fall apart without you."', 'brttheme' ) . '</em></p><cite>' . esc_html__( '— Malebo Sephodi', 'brttheme' ) . '</cite></blockquote></figure><!-- /wp:pullquote --></div></div><!-- /wp:cover -->',
		)
	);

	// Column blocks featuring two images with text on the side.
	register_block_pattern(
		'brttheme/alternating-images',
		array(
			'title'         => esc_html__( 'Alternating Images', 'brttheme' ),
			'categories'    => array( 'brttheme' ),
			'viewportWidth' => 700,
			'content'       => '<!-- wp:columns {"verticalAlignment":"center"} --><div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"66.66%"} --><div class="wp-block-column is-vertically-aligned-center" style="flex-basis:66.66%"><!-- wp:image {"id":null,"sizeSlug":"large","linkDestination":"none"} --><figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/images/patterns/pattern-dock.jpg" alt="' . esc_attr__( 'A lake with several boats docked. The sun is rising behind mountains in the background.', 'brttheme' ) . '" /><figcaption><em>' . esc_html__( 'The lake at 6:54 AM', 'brttheme' ) . '</em></figcaption></figure><!-- /wp:image --></div><!-- /wp:column --><!-- wp:column {"verticalAlignment":"top","width":"33.33%"} --><div class="wp-block-column is-vertically-aligned-top" style="flex-basis:33.33%"><!-- wp:paragraph --><p><em>' . esc_html__( 'Nearby our cabin was a lake. The sunrise looked beautiful as it rose over the hills beyond the water, reflecting down onto the gentle morning waves. I sat on the dock and drank a cup of coffee, enjoying the cool air on my skin. The coffee kept me warm inside.', 'brttheme' ) . '</em></p><!-- /wp:paragraph --></div><!-- /wp:column --></div><!-- /wp:columns --><!-- wp:columns --><div class="wp-block-columns"><!-- wp:column {"width":"33.33%"} --><div class="wp-block-column" style="flex-basis:33.33%"><!-- wp:paragraph --><p><em>' . esc_html__( 'Later that night, we went back to the lake and sat by the shore. It felt different at night; quieter, as if all of nature had gone to sleep for  a little while. The only noises were the chirp of crickets and the soft splash of the waves lapping at the shore. What a beautiful way to end the day.', 'brttheme' ) . '</em></p><!-- /wp:paragraph --></div><!-- /wp:column --><!-- wp:column {"width":"66.66%"} --><div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:image {"id":null,"sizeSlug":"large","linkDestination":"none"} --><figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/images/patterns/pattern-lake.jpg" alt="' . esc_attr__( 'A lake at night, with Adirondack chairs in the foreground. The sun sets in the background.', 'brttheme' ) . '" /><figcaption><em>' . esc_html__( 'Relaxing at the lake after dinner', 'brttheme' ) . '</em></figcaption></figure><!-- /wp:image --></div><!-- /wp:column --></div><!-- /wp:columns -->',
		)
	);
}
