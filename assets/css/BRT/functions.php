<?php
/**
 * brttheme functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, brttheme_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @link https://developer.wordpress.org/themes/advanced-topics/child-themes/
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value).
 *     remove_filter( 'excerpt_length', 'brttheme_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see https://developer.wordpress.org/plugins/.
 *
 * @package WordPress
 * @subpackage BRT_Theme
 * @since BRT Theme 1.0
 */

/*
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if (!isset($content_width)) {
	$content_width = 640;
}

/* Tell WordPress to run brttheme_setup() when the 'after_setup_theme' hook is run. */
add_action('after_setup_theme', 'brttheme_setup');

if (!function_exists('brttheme_setup')):
	/**
	 * Set up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which runs
	 * before the init hook. The init hook is too late for some features, such as indicating
	 * support post thumbnails.
	 *
	 * To override brttheme_setup() in a child theme, add your own brttheme_setup to your child theme's
	 * functions.php file.
	 *
	 * @uses add_theme_support()        To add support for post thumbnails, custom headers and backgrounds, and automatic feed links.
	 * @uses register_nav_menus()       To add support for navigation menus.
	 * @uses add_editor_style()         To style the visual editor.
	 * @uses load_theme_textdomain()    For translation/localization support.
	 * @uses register_default_headers() To register the default custom header images provided with the theme.
	 * @uses set_post_thumbnail_size()  To set a custom post thumbnail size.
	 *
	 * @since BRT Theme 1.0
	 */
	function brttheme_setup()
	{

		// This theme styles the visual editor with editor-style.css to match the theme style.
		add_editor_style();

		// Load regular editor styles into the new block-based editor.
		add_theme_support('editor-styles');

		// Load default block styles.
		add_theme_support('wp-block-styles');

		// Add support for custom color scheme.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name' => __('Blue', 'brttheme'),
					'slug' => 'blue',
					'color' => '#0066cc',
				),
				array(
					'name' => __('Black', 'brttheme'),
					'slug' => 'black',
					'color' => '#000',
				),
				array(
					'name' => __('Medium Gray', 'brttheme'),
					'slug' => 'medium-gray',
					'color' => '#666',
				),
				array(
					'name' => __('Light Gray', 'brttheme'),
					'slug' => 'light-gray',
					'color' => '#f1f1f1',
				),
				array(
					'name' => __('White', 'brttheme'),
					'slug' => 'white',
					'color' => '#fff',
				),
			)
		);

		// Post Format support. You can also use the legacy "gallery" or "asides" (note the plural) categories.
		add_theme_support('post-formats', array('aside', 'gallery'));

		// This theme uses post thumbnails.
		add_theme_support('post-thumbnails');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 *
		 * Manual loading of text domain is not required after the introduction of
		 * just in time translation loading in WordPress version 4.6.
		 *
		 * @ticket 58318
		 */
		if (version_compare($GLOBALS['wp_version'], '4.6', '<')) {
			load_theme_textdomain('brttheme', get_template_directory() . '/languages');
		}

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => __('Primary Navigation', 'brttheme'),
			)
		);




		function theme_register_menus()
		{
			register_nav_menus(
				array(
					'complete' => 'Header Complete',
				)
			);
		}
		add_action('after_setup_theme', 'theme_register_menus');








		// This theme allows users to set a custom background.
		add_theme_support(
			'custom-background',
			array(
				// Let WordPress know what our default background color is.
				'default-color' => 'f1f1f1',
			)
		);

		// The custom header business starts here.

		$custom_header_support = array(
			/*
			 * The default image to use.
			 * The %s is a placeholder for the theme template directory URI.
			 */
			'default-image' => '%s/images/headers/path.jpg',
			// The height and width of our custom header.
			/**
			 * Filters the BRT Theme default header image width.
			 *
			 * @since BRT Theme 1.0
			 *
			 * @param int The default header image width in pixels. Default 940.
			 */
			'width' => apply_filters('brttheme_header_image_width', 940),
			/**
			 * Filters the BRT Theme default header image height.
			 *
			 * @since BRT Theme 1.0
			 *
			 * @param int The default header image height in pixels. Default 198.
			 */
			'height' => apply_filters('brttheme_header_image_height', 198),
			// Support flexible heights.
			'flex-height' => true,
			// Don't support text inside the header image.
			'header-text' => false,
			// Callback for styling the header preview in the admin.
			'admin-head-callback' => 'brttheme_admin_header_style',
		);

		add_theme_support('custom-header', $custom_header_support);

		if (!function_exists('get_custom_header')) {
			// This is all for compatibility with versions of WordPress prior to 3.4.
			define('HEADER_TEXTCOLOR', '');
			define('NO_HEADER_TEXT', true);
			define('HEADER_IMAGE', $custom_header_support['default-image']);
			define('HEADER_IMAGE_WIDTH', $custom_header_support['width']);
			define('HEADER_IMAGE_HEIGHT', $custom_header_support['height']);
			add_custom_image_header('', $custom_header_support['admin-head-callback']);
			add_custom_background();
		}

		/*
		 * We'll be using post thumbnails for custom header images on posts and pages.
		 * We want them to be 940 pixels wide by 198 pixels tall.
		 * Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
		 */
		set_post_thumbnail_size($custom_header_support['width'], $custom_header_support['height'], true);

		// ...and thus ends the custom header business.

		// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
		register_default_headers(
			array(
				'berries' => array(
					'url' => '%s/images/headers/berries.jpg',
					'thumbnail_url' => '%s/images/headers/berries-thumbnail.jpg',
					/* translators: Header image description. */
					'description' => __('Berries', 'brttheme'),
				),
				'cherryblossom' => array(
					'url' => '%s/images/headers/cherryblossoms.jpg',
					'thumbnail_url' => '%s/images/headers/cherryblossoms-thumbnail.jpg',
					/* translators: Header image description. */
					'description' => __('Cherry Blossoms', 'brttheme'),
				),
				'concave' => array(
					'url' => '%s/images/headers/concave.jpg',
					'thumbnail_url' => '%s/images/headers/concave-thumbnail.jpg',
					/* translators: Header image description. */
					'description' => __('Concave', 'brttheme'),
				),
				'fern' => array(
					'url' => '%s/images/headers/fern.jpg',
					'thumbnail_url' => '%s/images/headers/fern-thumbnail.jpg',
					/* translators: Header image description. */
					'description' => __('Fern', 'brttheme'),
				),
				'forestfloor' => array(
					'url' => '%s/images/headers/forestfloor.jpg',
					'thumbnail_url' => '%s/images/headers/forestfloor-thumbnail.jpg',
					/* translators: Header image description. */
					'description' => __('Forest Floor', 'brttheme'),
				),
				'inkwell' => array(
					'url' => '%s/images/headers/inkwell.jpg',
					'thumbnail_url' => '%s/images/headers/inkwell-thumbnail.jpg',
					/* translators: Header image description. */
					'description' => __('Inkwell', 'brttheme'),
				),
				'path' => array(
					'url' => '%s/images/headers/path.jpg',
					'thumbnail_url' => '%s/images/headers/path-thumbnail.jpg',
					/* translators: Header image description. */
					'description' => __('Path', 'brttheme'),
				),
				'sunset' => array(
					'url' => '%s/images/headers/sunset.jpg',
					'thumbnail_url' => '%s/images/headers/sunset-thumbnail.jpg',
					/* translators: Header image description. */
					'description' => __('Sunset', 'brttheme'),
				),
			)
		);
	}
endif;

if (!function_exists('brttheme_admin_header_style')):
	/**
	 * Style the header image displayed on the Appearance > Header admin panel.
	 *
	 * Referenced via add_custom_image_header() in brttheme_setup().
	 *
	 * @since BRT Theme 1.0
	 */
	function brttheme_admin_header_style()
	{
		?>
		<style type="text/css" id="brttheme-admin-header-css">
			/* Shows the same border as on front end */
			#headimg {
				border-bottom: 1px solid #000;
				border-top: 4px solid #000;
			}

			/* If header-text was supported, you would style the text with these selectors:
							#headimg #name { }
							#headimg #desc { }
							*/
		</style>
		<?php
	}
endif;


if (!function_exists('brttheme_header_image')):
	/**
	 * Custom header image markup displayed.
	 *
	 * @since BRT Theme 4.0
	 */
	function brttheme_header_image()
	{
		$attrs = array(
			'alt' => get_bloginfo('name', 'display'),
		);

		// Compatibility with versions of WordPress prior to 3.4.
		if (function_exists('get_custom_header')) {
			$custom_header = get_custom_header();
			$attrs['width'] = $custom_header->width;
			$attrs['height'] = $custom_header->height;
		} else {
			$attrs['width'] = HEADER_IMAGE_WIDTH;
			$attrs['height'] = HEADER_IMAGE_HEIGHT;
		}

		if (function_exists('the_header_image_tag')) {
			the_header_image_tag($attrs);
			return;
		}

		?>
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr($attrs['width']); ?>"
			height="<?php echo esc_attr($attrs['height']); ?>" alt="<?php echo esc_attr($attrs['alt']); ?>" />
		<?php
	}
endif; // brttheme_header_image()

/**
 * Show a home link for our wp_nav_menu() fallback, wp_page_menu().
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the wp_page_menu_args filter hook.
 *
 * @since BRT Theme 1.0
 *
 * @param array $args An optional array of arguments. @see wp_page_menu()
 */
function brttheme_page_menu_args($args)
{
	if (!isset($args['show_home'])) {
		$args['show_home'] = true;
	}
	return $args;
}
add_filter('wp_page_menu_args', 'brttheme_page_menu_args');

/**
 * Set the post excerpt length to 40 characters.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 *
 * @since BRT Theme 1.0
 *
 * @param int $length The number of excerpt characters.
 * @return int The filtered number of excerpt characters.
 */
function brttheme_excerpt_length($length)
{
	return 40;
}
add_filter('excerpt_length', 'brttheme_excerpt_length');

if (!function_exists('brttheme_continue_reading_link')):
	/**
	 * Return a "Continue Reading" link for excerpts.
	 *
	 * @since BRT Theme 1.0
	 *
	 * @return string "Continue Reading" link.
	 */
	function brttheme_continue_reading_link()
	{
		return ' <a href="' . esc_url(get_permalink()) . '">' . __('Continue reading <span class="meta-nav">&rarr;</span>', 'brttheme') . '</a>';
	}
endif;

/**
 * Replace "[...]" with an ellipsis and brttheme_continue_reading_link().
 *
 * "[...]" is appended to automatically generated excerpts.
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @since BRT Theme 1.0
 *
 * @param string $more The Read More text.
 * @return string The filtered Read More text.
 */
function brttheme_auto_excerpt_more($more)
{
	if (!is_admin()) {
		return ' &hellip;' . brttheme_continue_reading_link();
	}
	return $more;
}
add_filter('excerpt_more', 'brttheme_auto_excerpt_more');

/**
 * Add a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 * @since BRT Theme 1.0
 *
 * @param string $output The "Continue Reading" link.
 * @return string Excerpt with a pretty "Continue Reading" link.
 */
function brttheme_custom_excerpt_more($output)
{
	if (has_excerpt() && !is_attachment() && !is_admin()) {
		$output .= brttheme_continue_reading_link();
	}
	return $output;
}
add_filter('get_the_excerpt', 'brttheme_custom_excerpt_more');

/**
 * Remove inline styles printed when the gallery shortcode is used.
 *
 * Galleries are styled by the theme in BRT Theme's style.css. This is just
 * a simple filter call that tells WordPress to not use the default styles.
 *
 * @since BRT Theme 1.2
 */
add_filter('use_default_gallery_style', '__return_false');

/**
 * Deprecated way to remove inline styles printed when the gallery shortcode is used.
 *
 * This function is no longer needed or used. Use the use_default_gallery_style
 * filter instead, as seen above.
 *
 * @since BRT Theme 1.0
 * @deprecated Deprecated in BRT Theme 1.2 for WordPress 3.1
 *
 * @return string The gallery style filter, with the styles themselves removed.
 */
function brttheme_remove_gallery_css($css)
{
	return preg_replace("#<style type='text/css'>(.*?)</style>#s", '', $css);
}
// Backward compatibility with WordPress 3.0.
if (version_compare($GLOBALS['wp_version'], '3.1', '<')) {
	add_filter('gallery_style', 'brttheme_remove_gallery_css');
}

if (!function_exists('brttheme_comment')):
	/**
	 * Template for comments and pingbacks.
	 *
	 * To override this walker in a child theme without modifying the comments template
	 * simply create your own brttheme_comment(), and that function will be used instead.
	 *
	 * Used as a callback by wp_list_comments() for displaying the comments.
	 *
	 * @since BRT Theme 1.0
	 *
	 * @param WP_Comment $comment The comment object.
	 * @param array      $args    An array of arguments. @see get_comment_reply_link()
	 * @param int        $depth   The depth of the comment.
	 */
	function brttheme_comment($comment, $args, $depth)
	{
		$GLOBALS['comment'] = $comment;
		switch ($comment->comment_type):
			case '':
			case 'comment':
				?>
				<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
					<div id="comment-<?php comment_ID(); ?>">
						<div class="comment-author vcard">
							<?php echo get_avatar($comment, 40); ?>
							<?php
							/* translators: %s: Author display name. */
							printf(__('%s <span class="says">says:</span>', 'brttheme'), sprintf('<cite class="fn">%s</cite>', get_comment_author_link()));
							?>
						</div><!-- .comment-author .vcard -->

						<?php
						$commenter = wp_get_current_commenter();
						if ($commenter['comment_author_email']) {
							$moderation_note = __('Your comment is awaiting moderation.', 'brttheme');
						} else {
							$moderation_note = __('Your comment is awaiting moderation. This is a preview; your comment will be visible after it has been approved.', 'brttheme');
						}
						?>

						<?php if ('0' === $comment->comment_approved): ?>
							<em class="comment-awaiting-moderation"><?php echo $moderation_note; ?></em>
							<br />
						<?php endif; ?>

						<div class="comment-meta commentmetadata"><a
								href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
								<?php
								/* translators: 1: Date, 2: Time. */
								printf(__('%1$s at %2$s', 'brttheme'), get_comment_date(), get_comment_time());
								?>
							</a>
							<?php
							edit_comment_link(__('(Edit)', 'brttheme'), ' ');
							?>
						</div><!-- .comment-meta .commentmetadata -->

						<div class="comment-body"><?php comment_text(); ?></div>

						<div class="reply">
							<?php
							comment_reply_link(
								array_merge(
									$args,
									array(
										'depth' => $depth,
										'max_depth' => $args['max_depth'],
									)
								)
							);
							?>
						</div><!-- .reply -->
					</div><!-- #comment-##  -->

					<?php
					break;
			case 'pingback':
			case 'trackback':
				?>
				<li class="post pingback">
					<p><?php _e('Pingback:', 'brttheme'); ?>
						<?php comment_author_link(); ?> 				<?php edit_comment_link(__('(Edit)', 'brttheme'), ' '); ?>
					</p>
					<?php
					break;
		endswitch;
	}
endif;

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override brttheme_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since BRT Theme 1.0
 *
 * @uses register_sidebar()
 */
function brttheme_widgets_init()
{
	// Area 1, located at the top of the sidebar.
	register_sidebar(
		array(
			'name' => __('Primary Widget Area', 'brttheme'),
			'id' => 'primary-widget-area',
			'description' => __('Add widgets here to appear in your sidebar.', 'brttheme'),
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);

	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar(
		array(
			'name' => __('Secondary Widget Area', 'brttheme'),
			'id' => 'secondary-widget-area',
			'description' => __('An optional secondary widget area, displays below the primary widget area in your sidebar.', 'brttheme'),
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);

	// Area 3, located in the footer. Empty by default.
	register_sidebar(
		array(
			'name' => __('First Footer Widget Area', 'brttheme'),
			'id' => 'first-footer-widget-area',
			'description' => __('An optional widget area for your site footer.', 'brttheme'),
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);

	// Area 4, located in the footer. Empty by default.
	register_sidebar(
		array(
			'name' => __('Second Footer Widget Area', 'brttheme'),
			'id' => 'second-footer-widget-area',
			'description' => __('An optional widget area for your site footer.', 'brttheme'),
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);

	// Area 5, located in the footer. Empty by default.
	register_sidebar(
		array(
			'name' => __('Third Footer Widget Area', 'brttheme'),
			'id' => 'third-footer-widget-area',
			'description' => __('An optional widget area for your site footer.', 'brttheme'),
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);

	// Area 6, located in the footer. Empty by default.
	register_sidebar(
		array(
			'name' => __('Fourth Footer Widget Area', 'brttheme'),
			'id' => 'fourth-footer-widget-area',
			'description' => __('An optional widget area for your site footer.', 'brttheme'),
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);
}
/** Register sidebars by running brttheme_widgets_init() on the widgets_init hook. */
add_action('widgets_init', 'brttheme_widgets_init');

/**
 * Remove the default styles that are packaged with the Recent Comments widget.
 *
 * To override this in a child theme, remove the filter and optionally add your own
 * function tied to the widgets_init action hook.
 *
 * This function uses a filter (show_recent_comments_widget_style) new in WordPress 3.1
 * to remove the default style. Using BRT Theme 1.2 in WordPress 3.0 will show the styles,
 * but they won't have any effect on the widget in default BRT Theme styling.
 *
 * @since BRT Theme 1.0
 */
function brttheme_remove_recent_comments_style()
{
	add_filter('show_recent_comments_widget_style', '__return_false');
}
add_action('widgets_init', 'brttheme_remove_recent_comments_style');

if (!function_exists('brttheme_posted_on')):
	/**
	 * Print HTML with meta information for the current post-date/time and author.
	 *
	 * @since BRT Theme 1.0
	 */
	function brttheme_posted_on()
	{
		printf(
			/* translators: 1: CSS classes, 2: Date, 3: Author display name. */
			__('<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'brttheme'),
			'meta-prep meta-prep-author',
			sprintf(
				'<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
				esc_url(get_permalink()),
				esc_attr(get_the_time()),
				get_the_date()
			),
			sprintf(
				'<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
				esc_url(get_author_posts_url(get_the_author_meta('ID'))),
				/* translators: %s: Author display name. */
				esc_attr(sprintf(__('View all posts by %s', 'brttheme'), get_the_author())),
				get_the_author()
			)
		);
	}
endif;

if (!function_exists('brttheme_posted_in')):
	/**
	 * Print HTML with meta information for the current post (category, tags and permalink).
	 *
	 * @since BRT Theme 1.0
	 */
	function brttheme_posted_in()
	{
		// Retrieves tag list of current post, separated by commas.
		$tags_list = get_the_tag_list('', ', ');

		if ($tags_list && !is_wp_error($tags_list)) {
			/* translators: 1: Category name, 2: Tag name, 3: Post permalink, 4: Post title. */
			$posted_in = __('This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'brttheme');
		} elseif (is_object_in_taxonomy(get_post_type(), 'category')) {
			/* translators: 1: Category name, 3: Post permalink, 4: Post title. */
			$posted_in = __('This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'brttheme');
		} else {
			/* translators: 3: Post permalink, 4: Post title. */
			$posted_in = __('Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'brttheme');
		}

		// Prints the string, replacing the placeholders.
		printf(
			$posted_in,
			get_the_category_list(', '),
			$tags_list,
			esc_url(get_permalink()),
			the_title_attribute('echo=0')
		);
	}
endif;

/**
 * Retrieve the IDs for images in a gallery.
 *
 * @uses get_post_galleries() First, if available. Falls back to shortcode parsing,
 *                            then as last option uses a get_posts() call.
 *
 * @since BRT Theme 1.6.
 *
 * @return array List of image IDs from the post gallery.
 */
function brttheme_get_gallery_images()
{
	$images = array();

	if (function_exists('get_post_galleries')) {
		$galleries = get_post_galleries(get_the_ID(), false);
		if (isset($galleries[0]['ids'])) {
			$images = explode(',', $galleries[0]['ids']);
		}
	} else {
		$pattern = get_shortcode_regex();
		preg_match("/$pattern/s", get_the_content(), $match);
		$atts = shortcode_parse_atts($match[3]);
		if (isset($atts['ids'])) {
			$images = explode(',', $atts['ids']);
		}
	}

	if (!$images) {
		$images = get_posts(
			array(
				'fields' => 'ids',
				'numberposts' => 999,
				'order' => 'ASC',
				'orderby' => 'menu_order',
				'post_mime_type' => 'image',
				'post_parent' => get_the_ID(),
				'post_type' => 'attachment',
			)
		);
	}

	return $images;
}

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since BRT Theme 2.4
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function brttheme_widget_tag_cloud_args($args)
{
	$args['largest'] = 22;
	$args['smallest'] = 8;
	$args['unit'] = 'pt';
	$args['format'] = 'list';

	return $args;
}
add_filter('widget_tag_cloud_args', 'brttheme_widget_tag_cloud_args');

/**
 * Enqueue scripts and styles for front end.
 *
 * @since BRT Theme 2.6
 */
function brttheme_scripts_styles()
{
	// Theme block stylesheet.
	wp_enqueue_style('brttheme-block-style', get_template_directory_uri() . '/blocks.css', array(), '20230627');
}
add_action('wp_enqueue_scripts', 'brttheme_scripts_styles');

/**
 * Enqueue styles for the block-based editor.
 *
 * @since BRT Theme 2.6
 */
function brttheme_block_editor_styles()
{
	// Block styles.
	wp_enqueue_style('brttheme-block-editor-style', get_template_directory_uri() . '/editor-blocks.css', array(), '20230627');
}
add_action('enqueue_block_editor_assets', 'brttheme_block_editor_styles');

// Block Patterns.
require get_template_directory() . '/block-patterns.php';

if (!function_exists('wp_body_open')):
	/**
	 * Fire the wp_body_open action.
	 *
	 * Added for backward compatibility to support pre-5.2.0 WordPress versions.
	 *
	 * @since BRT Theme 2.9
	 */
	function wp_body_open()
	{
		/**
		 * Triggered after the opening <body> tag.
		 *
		 * @since BRT Theme 2.9
		 */
		do_action('wp_body_open');
	}
endif;

function brt_styles_and_scripts()
{
	// Enqueue Styles
	wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css', array(), null, 'all');
	wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), null, 'all');
	wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/style.css', array(), null, 'all');
	wp_enqueue_style('responsive-style', get_template_directory_uri() . '/assets/css/responsive.css', array(), null, 'all');
	wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');

	// Conditionally enqueue seprate-style on the home page
	if (is_home() || is_front_page()) {
		wp_enqueue_style('seprate-style', get_template_directory_uri() . '/assets/css/seprate.css', array(), null, 'all');
	}

	// Enqueue Scripts
	wp_enqueue_script('jquery');
	wp_enqueue_script('slick-carousel', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array(), '', false);
	wp_enqueue_script('popper-js', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', array(), null, true);
	wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js', array('jquery', 'popper-js'), null, true);
	wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/script.js', array(), '', false);
}
add_action('wp_enqueue_scripts', 'brt_styles_and_scripts');




/* multiple submission */

add_action('wp_footer', 'mycustom_wp_footer');
function mycustom_wp_footer()
{
	?>
		<script type="text/javascript">
			(function ($) {
				$(document).ready(function () {

					fixCF7MultiSubmit();

					function fixCF7MultiSubmit() {
						jQuery('button.btn.newleterBtn').click(function () {
							var disabled = jQuery(this).attr('data-disabled');
							if (disabled && disabled == "disabled") {
								return false;
							} else {
								jQuery(this).attr('data-disabled', "disabled");
								return true;
							}
						});
						jQuery('.wpcf7').bind("wpcf7submit", function () {
							jQuery(this).find('button.btn.newleterBtn').attr('data-disabled', "enabled");
						});
					}
				});
			}(jQuery));
		</script>
	<?php }


add_action('wp_footer', 'mycustom_wp_contact');
function mycustom_wp_contact()
{
	?>
		<script type="text/javascript">
			(function ($) {
				$(document).ready(function () {

					fixCF7MultiSubmit();

					function fixCF7MultiSubmit() {
						jQuery('.wpcf7-form-control.wpcf7-submit.has-spinner').click(function () {
							var disabled = jQuery(this).attr('data-disabled');
							if (disabled && disabled == "disabled") {
								return false;
							} else {
								jQuery(this).attr('data-disabled', "disabled");
								return true;
							}
						});
						jQuery('.wpcf7').bind("wpcf7submit", function () {
							jQuery(this).find('.wpcf7-form-control.wpcf7-submit.has-spinner').attr('data-disabled', "enabled");
						});
					}
				});
			}(jQuery));
		</script>
	<?php }


add_action('wp_footer', 'mycustom_wp_billing_address');
function mycustom_wp_billing_address()
{
	?>
		<script type="text/javascript">
			(function ($) {
				$(document).ready(function () {

					fixCF7MultiSubmit();

					function fixCF7MultiSubmit() {
						jQuery(' button.button[type="submit"]').click(function () {
							var disabled = jQuery(this).attr('data-disabled');
							if (disabled && disabled == "disabled") {
								return false;
							} else {
								jQuery(this).attr('data-disabled', "disabled");
								return true;
							}
						});
						jQuery('.woocommerce-MyAccount-content form div.woocommerce-address-field').bind("button", function () {
							jQuery(this).find('.woocommerce-MyAccount-content form div.woocommerce-address-field .button[type="submit"]').attr('data-disabled', "enabled");
						});
					}
				});
			}(jQuery));
		</script>
	<?php }


// Register menus
function register_my_menu()
{
	register_nav_menu('Secondary-Menu', __('Secondary-Menu'));
	register_nav_menu('Full-Menu', __('Full-Menu'));
}
add_action('init', 'register_my_menu');





/* 
 * ACF Code For Optional Feilds
 */

if (function_exists('acf_add_options_page')) {

	acf_add_options_page(
		array(
			'page_title' => 'Theme General Settings',
			'menu_title' => 'Theme Settings',
			'menu_slug' => 'theme-general-settings',
			'capability' => 'edit_posts',
			'redirect' => false
		)
	);

	acf_add_options_sub_page(
		array(
			'page_title' => 'Theme Header Settings',
			'menu_title' => 'Header',
			'parent_slug' => 'theme-general-settings',
		)
	);

	acf_add_options_sub_page(
		array(
			'page_title' => 'Theme Footer Settings',
			'menu_title' => 'Footer',
			'parent_slug' => 'theme-general-settings',
		)
	);

}

// Register Footer Menu Locations
function theme_register_footer_menus()
{
	register_nav_menus(
		array(
			'footer-primary' => esc_html__('Footer First Menu', 'text-domain'),
			'footer-secondary' => esc_html__('Footer Second Menu', 'text-domain'),
			'footer-extra' => esc_html__('Footer Thirt Menu', 'text-domain'),
		)
	);
}
add_action('after_setup_theme', 'theme_register_footer_menus');



function patients_say_post_type()
{

	$labels = array(
		'name' => _x('Patients', 'Post Type General Name', 'DiviChild'),
		'singular_name' => _x('Patients', 'Post Type Singular Name', 'DiviChild'),
		'menu_name' => __('Patients', 'DiviChild'),
		'parent_item_colon' => __('Parent Patients', 'DiviChild'),
		'all_items' => __('All Patients', 'DiviChild'),
		'view_item' => __('View Patients', 'DiviChild'),
		'add_new_item' => __('Add New Patients', 'DiviChild'),
		'add_new' => __('Add New', 'DiviChild'),
		'edit_item' => __('Edit Patients', 'DiviChild'),
		'update_item' => __('Update Patients', 'DiviChild'),
		'search_items' => __('Search Patients', 'DiviChild'),
		'not_found' => __('Not Found', 'DiviChild'),
		'not_found_in_trash' => __('Not found in Trash', 'DiviChild'),
	);


	$args = array(
		'label' => __('Patients', 'DiviChild'),
		'description' => __('Patients news and patients', 'DiviChild'),
		'labels' => $labels,
		// Features this CPT supports in Post Editor
		'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies' => array('genres'),
		/* A hierarchical CPT is like Pages and can have
		 * Parent and child items. A non-hierarchical CPT
		 * is like Posts.
		 */
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar' => true,
		'menu_position' => 5,
		'can_export' => true,
		'has_archive' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'capability_type' => 'post',
		'show_in_rest' => true,

	);

	// Registering your Custom Post Type
	register_post_type('Patients', $args);

}

add_action('init', 'patients_say_post_type', 0);




function patuents_say_shortcode($atts)
{
	$atts = shortcode_atts(
		array(
			'post_type' => 'Patients',
		),
		$atts,
		'patuents_say_shortcode'
	);

	$query = new WP_Query(
		array(
			'post_type' => $atts['post_type'],
			'posts_per_page' => -1,
		)
	);

	if ($query->have_posts()) {
		ob_start();
		while ($query->have_posts()) {
			$query->the_post();
			$heading = get_field('heading');
			$message = get_field('message');
			$rating = get_field('star_rating');
			?>
				<div class="innerConntent">

					<div class="patientsReview">
						<?php if (!empty($heading)) { ?>
							<p class="position-relative text-white"><?php echo $heading; ?></p>
						<?php } ?>
						<div class="startsReview">
							<div class="starts">

								<?php for ($i = 1; $i <= 5; $i++): ?>
									<?php if ($i <= $rating): ?>
										<i class="fa fa-star"></i>
									<?php else: ?>
										<i class="fa fa-star-o"></i>
									<?php endif; ?>
								<?php endfor; ?>

							</div>
							<?php if (!empty($message)) { ?>
								<div class="reviewText">
									<p class="text-white"><?php echo $message; ?></p>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<?php
		}
		wp_reset_postdata();
		return ob_get_clean();
	}

	return '';
}

add_shortcode('patuents_say_shortcode', 'patuents_say_shortcode');
add_filter('wpcf7_autop_or_not', '__return_false');

function custom_remove_quantity_field($return, $product)
{
	return true;
}

add_filter('woocommerce_is_sold_individually', 'custom_remove_quantity_field', 10, 2);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 5);

add_action('woocommerce_single_product_summary', 'remove_product_category', 20);
function remove_product_category()
{
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
}

/**
 * Remove Description tab from WooCommerce product page.
 */
add_filter('woocommerce_product_tabs', 'remove_description_tab', 98);
function remove_description_tab($tabs)
{
	unset($tabs['description']);
	return $tabs;
}


// CUSTOM POST TYPE FOR Testimonials

function Testimonials_custom_post_type()
{

	$labels = array(
		'name' => _x('Testimonial', 'Post Type General Name', 'DiviChild'),
		'singular_name' => _x('Testimonial', 'Post Type Singular Name', 'DiviChild'),
		'menu_name' => __('Testimonials', 'DiviChild'),
		'parent_item_colon' => __('Parent Testimonial', 'DiviChild'),
		'all_items' => __('All Testimonials', 'DiviChild'),
		'view_item' => __('View Testimonial', 'DiviChild'),
		'add_new_item' => __('Add New Testimonial', 'DiviChild'),
		'add_new' => __('Add New', 'DiviChild'),
		'edit_item' => __('Edit Testimonial', 'DiviChild'),
		'update_item' => __('Update Testimonial', 'DiviChild'),
		'search_items' => __('Search Testimonial', 'DiviChild'),
		'not_found' => __('Not Found', 'DiviChild'),
		'not_found_in_trash' => __('Not found in Trash', 'DiviChild'),
	);


	$args = array(
		'label' => __('Testimonials', 'DiviChild'),
		'description' => __('Testimonial news and reviews', 'DiviChild'),
		'labels' => $labels,
		// Features this CPT supports in Post Editor
		'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies' => array('category'),
		/* A hierarchical CPT is like Pages and can have
		 * Parent and child items. A non-hierarchical CPT
		 * is like Posts.
		 */
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar' => true,
		'menu_position' => 5,
		'can_export' => true,
		'has_archive' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'capability_type' => 'post',
		'show_in_rest' => true,

	);

	// Registering your Custom Post Type
	register_post_type('Testimonial', $args);

}

add_action('init', 'Testimonials_custom_post_type', 0);
function custom_post_shortcode($atts)
{
	$atts = shortcode_atts(
		array(
			'post_type' => 'Testimonial',
		), $atts, 'custom_post_shortcode');

	$query = new WP_Query(
		array(
			'post_type' => $atts['post_type'],
			'posts_per_page' => -1,
		)
	);

	if ($query->have_posts()) {
		ob_start();
		?>
			<section class="commanCardBlock aboutUsBlock aboutUsSecOne testimonialSlider ">
				<div class="customeContainer m-auto ">
					<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner"> <?php
						while ($query->have_posts()) {
							$query->the_post();
							?>


								<div class="carousel-item">

									<div class="row align-items-center m-0">
										<div class="col-xl-6 col-lg-6 col-md-6">
											<div class="textBlock">
												<h2>Testimonials</h2>
												<h4 class="mb-3"><?php the_title(); ?> </h4>
												<p class="mb-3"> <?php the_content(); ?> </p>
												<div class="personName d-flex align-items-center  ">
													<?php
													// Display reviewer name
													$reviewer_name = get_field('reviewer_name');
													if ($reviewer_name) {
														?>
														<h4 class="m-0"><?php echo $reviewer_name; ?></h4>
														<span>|</span>
													<?php }

													// Display designation
													$designation = get_field('designation');
													if ($designation) {
														?>
														<p class="m-0"><?php echo $designation; ?></p>
													<?php } ?>
												</div>
												<?php
												// Display find more button
												$button = get_field('button');
												if ($button) {
													?>
													<a type="button" class="btn btn-primary rounded-pill redButton text-uppercase"
														href="<?php echo $button['url']; ?>"><?php echo $button['title']; ?></a>
												<?php } ?>


											</div>
										</div>

										<div class="col-xl-6 col-lg-6 col-md-6 pr-0 position-relative">
											<?php
											// Display the featured image
											if (has_post_thumbnail()) {
												?>
												<div class="aboutUsImage">
													<?php
													if (has_post_thumbnail()) {
														// Get the post thumbnail URL without dimensions suffix
														$thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0];
														?>
														<img src="<?php echo esc_url($thumbnail_url); ?>" class="w-100 h-100 wp-post-image"
															alt="" decoding="async">
													<?php } ?>
												</div>


											<?php }

											// Display Top Image
											$top_cut_image = get_field('top_cut_image');
											if ($top_cut_image) {
												?>
												<div class=" position-absolute topC">
													<img src="<?php echo $top_cut_image; ?>" alt="">
												</div>
											<?php } ?>
											<?php
											$bottom_cut_image = get_field('bottom_cut_image');
											if ($bottom_cut_image) {
												?>
												<div class="position-absolute bottomc">
													<img src="<?php echo $bottom_cut_image; ?>" alt="">
												</div>
											<?php } ?>
										</div>
									</div>
								</div>
								<?php
						}
						?>
						</div>
					</div>
				</div>
				<?php
				// Display Previous button
				$previous = get_field('previous');
				if ($previous) {
					?>
					<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon_" aria-hidden="true"></span>
						<span class="sr-only"><?php echo $previous['title']; ?></span>
					</a>
				<?php }
				// Display Next button
				$next = get_field('next');
				if ($next) {
					?>
					<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
						<span class="carousel-control-next-icon_" aria-hidden="true"></span>
						<span class="sr-only"><?php echo $next['title']; ?></span>
					</a>
				<?php } ?>

			</section>
			<?php
			wp_reset_postdata();
			return ob_get_clean();
	}

	return '';
}

add_shortcode('our_customer_shortcode', 'custom_post_shortcode');



// REVIEWS SECTION
// Add the action to display reviews section
add_action('woocommerce_after_single_product_summary', 'custom_content_before_related_products', 15);
function custom_content_before_related_products()
{
	$args = array(
		'post_id' => get_the_ID(),
		'status' => 'approve',
		'orderby' => 'comment_date',
		'order' => 'ASC',
	);

	$comments_query = new WP_Comment_Query;
	$comments = $comments_query->query($args);

	// Calculate overall rating and total comments
	$total_rating = 0;
	$total_comments = 0;

	foreach ($comments as $comment) {
		$rating = get_comment_meta($comment->comment_ID, 'rating', true);
		if (!empty($rating) && is_numeric($rating)) {
			$total_rating += intval($rating);
			$total_comments++;
		}
	}

	$overall_rating = $total_comments > 0 ? round($total_rating / $total_comments, 1) : 0;

	// Get WordPress comment pagination settings
	$comments_per_page = get_option('comments_per_page');
	$paged = get_query_var('cpage') ? get_query_var('cpage') : 1;
	$offset = ($paged - 1) * $comments_per_page;
	$paged_comments = array_slice($comments, $offset, $comments_per_page);

	echo '<div class="woocommerce-tabs added">';
	echo '<div class="container-for">';
	echo '<h2>Reviews</h2>';

	// Displaying overall rating with stars
	echo '<div class="overall-rating">';
	echo '<h3>' . number_format($overall_rating, 1) . '</h3>';
	echo wc_get_rating_html($overall_rating);
	echo '</div>';

	// Displaying total number of comments
	echo '<h4>Based on ' . $total_comments . ' ' . ($total_comments == 1 ? 'Review' : 'Reviews') . '</h4>';

	echo '<ul class="comment-list">';

	foreach ($paged_comments as $comment) {
		$rating = get_comment_meta($comment->comment_ID, 'rating', true);
		echo '<div class="review-content-wrapper">';
		echo '<div class="product-name">';
		echo '<p>' . esc_html(get_the_title()) . '</p>';
		echo '<span class="comment-date">' . get_comment_date('', $comment->comment_ID) . '</span>';
		echo '</div>';
		echo '<div class="comment-content">' . wpautop($comment->comment_content) . '</div>';

		echo '<div class="comment-meta">';
		echo '- <strong class="comment-author">' . get_comment_author($comment->comment_ID) . '</strong>';
		if (!empty($rating)) {
			echo '<span class="comment-rating">';
			for ($i = 1; $i <= 5; $i++) {
				if ($i <= $rating) {
					echo '<i class="fas fa-star"></i>'; // Filled star
				} else {
					echo '<i class="far fa-star"></i>'; // Empty star
				}
			}
		} else {
			echo '<span class="comment-rating">';
			for ($i = 1; $i <= 5; $i++) {
				echo '<i class="far fa-star"></i>'; // Empty star
			}
		}

		echo '</div>';
		echo '</div>';
	}

	echo '</ul>';

	// Pagination
	$pagination_args = array(
		'base' => get_permalink() . '%_%',
		'format' => 'comment-page-%#%',
		'current' => max(1, $paged),
		'total' => ceil(count($comments) / $comments_per_page),
		'prev_text' => '&laquo; Previous',
		'next_text' => 'Next &raquo;',
		'type' => 'list',
		'add_fragment' => '#comments',
	);

	echo '<div class="pagination">';
	echo paginate_comments_links($pagination_args);
	echo '</div>';


	echo '<button id="write-review-button" class="button">Write a Review</button>';
	echo '</div>';



	// Custom comment form callback
	comment_form(
		array(
			'comment_field' => '<p class="comment-form-comment"><label for="comment">' . __('Your Review', 'textdomain') . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required></textarea></p>',
			'title_reply' => '',
			'class_submit' => 'submit',
			'submit_button' => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
			'submit_field' => '<p class="form-submit">%1$s %2$s</p>',
			'logged_in_as' => '',
			'fields' => array(
				'author' => '<p class="comment-form-author">' . '<label for="author">' . __('Name', 'textdomain') . '</label> ' . ($req ? '<span class="required">*</span>' : '') .
					'<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' /></p>',
				'email' => '<p class="comment-form-email"><label for="email">' . __('Email', 'textdomain') . '</label> ' . ($req ? '<span class="required">*</span>' : '') .
					'<input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' /></p>',
				'rating' => '<p class="comment-form-rating"><label for="rating">' . __('Your Rating', 'textdomain') . '</label><select name="rating" id="rating" aria-required="true" required>
                            <option value="5">5 stars</option>
                            <option value="4">4 stars</option>
                            <option value="3">3 stars</option>
                            <option value="2">2 stars</option>
                            <option value="1">1 star</option>
                        </select></p>'
			),
		)
	);
	echo '</div>';
}











function category_post_shortcode($atts)
{
	$atts = shortcode_atts(
		array(
			'post_type' => 'Testimonial',
			'category' => 'selected', // category slug
		), $atts, 'our_category_shortcode');

	// Setup WP_Query arguments
	$query_args = array(
		'post_type' => $atts['post_type'],
		'posts_per_page' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'category',
				'field' => 'slug',
				'terms' => $atts['category'],
			),
		),
	);

	$query = new WP_Query($query_args);

	if ($query->have_posts()) {
		ob_start();
		?>
			<?php
			while ($query->have_posts()) {
				$query->the_post();
				?>
				<div class="newWhats">

					<div class="row">
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
							<div class="imageBl">
								<?php the_post_thumbnail('thumbnail', array('class' => 'w-100')); ?>
							</div>
						</div>
						<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
							<div class="textArea">
								<h5><?php echo wp_trim_words(get_the_title(), 5, '...'); ?></h5>
								<p><?php echo wp_trim_words(get_the_content(), 20, '...'); ?></p>
								<div class="timeBlock d-flex align-items-center">
									<p class="m-0"><?php echo get_time_ago(); ?></p>
									<span>|</span>
									<p class="m-0"><?php echo estimated_reading_time(); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<?php
			}
			?>
			<?php
			wp_reset_postdata();
			return ob_get_clean();
	} else {
		return ''; // Return empty if no posts found
	}
}

add_shortcode('our_category_shortcode', 'category_post_shortcode');


function get_time_ago()
{
	$post_date = get_the_date('Y-m-d H:i:s'); // Get post date in 'Y-m-d H:i:s' format
	$time_ago = strtotime($post_date); // Convert post date to a UNIX timestamp
	$current_time = time(); // Get current UNIX timestamp
	$time_difference = $current_time - $time_ago; // Calculate the time difference in seconds

	// Calculate time ago in months
	$months_ago = floor($time_difference / (60 * 60 * 24 * 30)); // Approximation: 30 days in a month

	if ($months_ago == 1) {
		return '1 month ago';
	} elseif ($months_ago > 1) {
		return $months_ago . ' months ago';
	} else {
		return 'Less than a month ago'; // Fallback if the calculation is less than a month
	}
}

function estimated_reading_time()
{
	$content = get_the_content();
	$word_count = str_word_count(strip_tags($content));
	$reading_time = ceil($word_count / 200); // Assuming 200 words per minute reading speed
	return $reading_time . ' minute read';
}
?>


	<?php
	function slider_testimonial_post_shortcode($atts)
	{
		$atts = shortcode_atts(
			array(
				'post_type' => 'Testimonial', // Changed to lowercase as post types are usually lowercase
			), $atts, 'our_testimonial_slider_shortcode');

		$query = new WP_Query(
			array(
				'post_type' => $atts['post_type'],
				'posts_per_page' => -1,
			)
		);

		if ($query->have_posts()) {
			ob_start();
			?>
			<div class="testimonial-slider-main">
				<?php while ($query->have_posts()):
					$query->the_post(); ?>
					<div class="slide">
						<div class="slide-content">
							<?php
							// Get ACF fields
							$star_image = get_field('star_image');
							$reviewer_name = get_field('reviewer_name');
							$designation = get_field('designation');
							$reviewer_image = get_field('reviewer_image')
								?>

							<div class="star-image"> <?php echo $star_image; ?></div>

							<div class="post-content"><?php the_content(); ?></div>

							<div class="reviewCustomer">
								<div class="reviewer-image">
									<img class="attachment-thumbnail size-thumbnail wp-post-image"
										src="<?php echo $reviewer_image; ?>">

								</div>

								<div class="personDetails">
									<div class="reviewer-name"><?php echo esc_html($reviewer_name); ?></div>

									<div class="reviewer-designation"><?php echo esc_html($designation); ?></div>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
			<?php
			wp_reset_postdata();
			return ob_get_clean();
		}

		return ''; // Return an empty string if no posts found
	}

	add_shortcode('our_testimonial_slider_shortcode', 'slider_testimonial_post_shortcode');



	// Remove breadcrumbs from single product page
	add_action('template_redirect', 'remove_product_breadcrumbs');
	function remove_product_breadcrumbs()
	{
		if (is_product()) {
			remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
		}
	}




	add_action('woocommerce_before_single_product', 'remove_product_rating');
	function remove_product_rating()
	{
		remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
	}



	function add_page_name_to_body_class($classes)
	{
		if (is_page()) {
			global $post;
			$classes[] = 'page-' . $post->post_name;
		}
		return $classes;
	}
	add_filter('body_class', 'add_page_name_to_body_class');



	function setup_woocommerce_support()
	{
		add_theme_support('woocommerce');
		add_theme_support('wc-product-gallery-zoom');
		add_theme_support('wc-product-gallery-lightbox');
		add_theme_support('wc-product-gallery-slider');
	}
	add_action('after_setup_theme', 'setup_woocommerce_support');



	//   add_action( 'wp', 'remove_shop_and_archive_sidebar' );
//   function remove_shop_and_archive_sidebar() {
// 	  if ( is_shop() || is_product_category() || is_product_tag() ) {
// 		  remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
// 	  }
//   }
	
	add_filter('body_class', 'add_custom_body_classes');
	function add_custom_body_classes($classes)
	{
		if (is_shop()) {
			$classes[] = 'shop-page';
		}
		if (is_product_category() || is_product_tag()) {
			$classes[] = 'woocommerce-archive';
		}
		return $classes;
	}

	add_filter('woocommerce_product_tabs', 'remove_woocommerce_product_tabs', 98);

	function remove_woocommerce_product_tabs($tabs)
	{
		unset($tabs['description']);       // Remove the description tab
		unset($tabs['reviews']);           // Remove the reviews tab
		unset($tabs['additional_information']); // Remove the additional information tab
		return $tabs;
	}




	/* CPT Treatments */
	function custom_post_type()
	{

		/* Set UI labels for Custom Post Type */
		$labels = array(
			'name' => _x('Treatments', 'Post Type General Name', 'twentytwentyone'),
			'singular_name' => _x('Treatment', 'Post Type Singular Name', 'twentytwentyone'),
			'menu_name' => __('Treatments', 'twentytwentyone'),
			'parent_item_colon' => __('Parent Treatments', 'twentytwentyone'),
			'all_items' => __('All Treatments', 'twentytwentyone'),
			'view_item' => __('View Treatment', 'twentytwentyone'),
			'add_new_item' => __('Add New Treatment', 'twentytwentyone'),
			'add_new' => __('Add New', 'twentytwentyone'),
			'edit_item' => __('Edit Treatment', 'twentytwentyone'),
			'update_item' => __('Update Treatment', 'twentytwentyone'),
			'search_items' => __('Search Treatment', 'twentytwentyone'),
			'not_found' => __('Not Found', 'twentytwentyone'),
			'not_found_in_trash' => __('Not found in Trash', 'twentytwentyone'),
		);

		// Set other options for Custom Post Type
	
		$args = array(
			'label' => __('treatments', 'twentytwentyone'),
			'description' => __('Treatment news and reviews', 'twentytwentyone'),
			'labels' => $labels,
			// Features this CPT supports in Post Editor
			'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
			// You can associate this CPT with a taxonomy or custom taxonomy. 
			'taxonomies' => array('genres'),
			/* A hierarchical CPT is like Pages and can have
			 * Parent and child items. A non-hierarchical CPT
			 * is like Posts.
			 */
			'hierarchical' => false,
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'show_in_admin_bar' => true,
			'menu_position' => 5,
			'can_export' => true,
			'has_archive' => false,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'capability_type' => 'post',
			'show_in_rest' => true,

		);

		// Registering your Custom Post Type
		register_post_type('treatments', $args);

	}

	/* Hook into the 'init' action so that the function
	 * Containing our post type registration is not 
	 * unnecessarily executed. 
	 */

	add_action('init', 'custom_post_type', 0);



	function custom_post_type_services()
	{

		$labels = array(
			'name' => _x('Our Services', 'Post Type General Name', 'brt_theme'),
			'singular_name' => _x('Service', 'Post Type Singular Name', 'brt_theme'),
			'menu_name' => __('Services', 'brt_theme'),
			'parent_item_colon' => __('Parent Service', 'brt_theme'),
			'all_items' => __('All Services', 'brt_theme'),
			'view_item' => __('View Service', 'brt_theme'),
			'add_new_item' => __('Add New Service', 'brt_theme'),
			'add_new' => __('Add New', 'brt_theme'),
			'edit_item' => __('Edit Service', 'brt_theme'),
			'update_item' => __('Update Service', 'brt_theme'),
			'search_items' => __('Search Services', 'brt_theme'),
			'not_found' => __('Not Found', 'brt_theme'),
			'not_found_in_trash' => __('Not found in Trash', 'brt_theme'),
		);

		$args = array(
			'label' => __('services', 'brt_theme'),
			'description' => __('Services', 'brt_theme'),
			'labels' => $labels,
			'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
			'taxonomies' => array('category'),
			'hierarchical' => false,
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'show_in_admin_bar' => true,
			'menu_position' => 5,
			'can_export' => true,
			'has_archive' => false,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'capability_type' => 'post',
			'show_in_rest' => true,
		);

		register_post_type('services', $args);

	}

	add_action('init', 'custom_post_type_services', 0);


	function custom_shop_page_acf_section()
	{
		// Check if it's the shop page
		if (is_shop()) {
			?>
			<?php if (have_rows('single_product')): ?>
				<?php while (have_rows('single_product')):
					the_row(); ?>

					<?php if (get_row_layout() == 'choose_section'): ?>
						<?php
						$heading = get_sub_field('heading');
						?>

						<section class="whyChooseBlock">
							<div class="container">
								<div class="chooseUsInner">
									<div class="welComeInner text-center">
										<h2><?php echo esc_html($heading); ?></h2>
									</div>
								</div>

								<?php if (have_rows('repeater')): ?>
									<div class="row">
										<?php while (have_rows('repeater')):
											the_row(); ?>
											<?php
											$image = get_sub_field('image');
											$subheading = get_sub_field('subheading');
											$content = get_sub_field('content');
											?>

											<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
												<div class="ourFacilatyCard">
													<div class="imageIcon">
														<img src="<?php echo esc_url($image); ?>" alt="" class="w-100">
														<h4><?php echo esc_html($subheading); ?></h4>
													</div>
													<div class="textArea text-center">
														<p><?php echo esc_html($content); ?></p>
													</div>
												</div>
											</div>

										<?php endwhile; ?>
									</div>
								<?php endif; ?>

							</div>
						</section>

					<?php endif; ?>

				<?php endwhile; ?>
			<?php endif; ?>
			<?php
		}
	}
	add_action('woocommerce_after_main_content', 'custom_shop_page_acf_section');


	function custom_post_type_therapist()
	{

		$labels = array(
			'name' => _x('Our Therapists', 'Post Type General Name', 'brt_theme'),
			'singular_name' => _x('Therapist', 'Post Type Singular Name', 'brt_theme'),
			'menu_name' => __('Therapists', 'brt_theme'),
			'parent_item_colon' => __('Parent Therapist', 'brt_theme'),
			'all_items' => __('All Therapists', 'brt_theme'),
			'view_item' => __('View Therapist', 'brt_theme'),
			'add_new_item' => __('Add New Therapist', 'brt_theme'),
			'add_new' => __('Add New', 'brt_theme'),
			'edit_item' => __('Edit Therapist', 'brt_theme'),
			'update_item' => __('Update Therapist', 'brt_theme'),
			'search_items' => __('Search Therapists', 'brt_theme'),
			'not_found' => __('Not Found', 'brt_theme'),
			'not_found_in_trash' => __('Not found in Trash', 'brt_theme'),
		);

		$args = array(
			'label' => __('therapist', 'brt_theme'),
			'description' => __('therapist', 'brt_theme'),
			'labels' => $labels,
			'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
			'taxonomies' => array('category'),
			'hierarchical' => false,
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'show_in_admin_bar' => true,
			'menu_position' => 5,
			'can_export' => true,
			'has_archive' => false,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'capability_type' => 'post',
			'show_in_rest' => true,
		);

		register_post_type('therapist', $args);

	}

	add_action('init', 'custom_post_type_therapist', 0);
