<?php
/**
 * Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">.
 *
 * @package WordPress
 * @subpackage BRT_Theme
 * @since BRT Theme 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>
		<?php
		/*
		 * Print the <title> tag based on what is being viewed.
		 */
		global $page, $paged;

		wp_title('|', true, 'right');

		// Add the site name.
		bloginfo('name');

		// Add the site description for the home/front page.
		$site_description = get_bloginfo('description', 'display');
		if ($site_description && (is_home() || is_front_page())) {
			echo " | $site_description";
		}

		// Add a page number if necessary:
		if (($paged >= 2 || $page >= 2) && !is_404()) {
			/* translators: %s: Page number. */
			echo esc_html(' | ' . sprintf(__('Page %s', 'brttheme'), max($paged, $page)));
		}

		?>
	</title>
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" media="all"
		href="<?php echo esc_url(get_stylesheet_uri()); ?>?ver=20240402" />
	<link rel="pingback" href="<?php echo esc_url(get_bloginfo('pingback_url')); ?>">
	<?php
	/*
	 * We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if (is_singular() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	/*
	 * Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();


	$logo = get_field("logo", "option");
	$menu_button = get_field("menu_button", "option");
	$search_image = get_field("search_image", "option");

	?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<header>
		<div class="container">
			<div class="headerInner">
				<div class="row align-items-end">
					<div class="col-md-2 col-sm-2 col-4">
						<div class="logo">
							<a href="<?php echo site_url(); ?>"><img src="<?php echo $logo['url']; ?>" alt="" /></a>
						</div>
					</div>
					<div class="col-md-10 col-sm-10 col-8">
						<div class="menusBlock">
							<div class="topMenus">

								<?php
								$args = array(
									'menu_class' => 'd-flex justify-content-center align-items-center list-unstyled m-0 w-100',
									'container' => false,
									'theme_location' => 'primary',
								);
								wp_nav_menu($args);

								?>

							</div>
							<div class="bottomMenus">

								<?php
								$args = array(
									'menu_class' => 'd-flex justify-content-center align-items-center list-unstyled m-0',
									'container' => false,
									'theme_location' => 'Secondary-Menu',
								);
								wp_nav_menu($args);

								?>
								<div class="searchLangusge">
									<div class="search">
										<input type="checkbox">
										<div class="searchBar">
											<div class="searchBarInput">

												<div class="img-search">
													<img src="<?php echo $search_image; ?>" alt="Search Icon">
												</div>
												<?php get_search_form(); ?>

											</div>
										</div>
									</div>



									<div class="language">
										<p>EN</p>
									</div>
								</div>
							</div>

							<div class="last-bottom">
								<div class="full_menue">
									<?php
									wp_nav_menu(
										array(
											'menu_class' => 'full-main',
											'container' => false,
											'theme_location' => 'Full-Menu',
											
										)
									);
									?>
								</div>


							</div>
							<div class="searchLangusge">
								<div class="search">
									<input type="checkbox">
									<div class="searchBar">
										<div class="searchBarInput">

											<div class="img-search">
												<img src="<?php echo $search_image; ?>" alt="Search Icon">
											</div>
											<?php get_search_form(); ?>

										</div>
									</div>
								</div>



								<div class="language">
									<p>EN</p>
								</div>
							</div>

						</div>
					</div>
				</div>


			</div>

		</div>

	</header>