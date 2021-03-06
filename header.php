<?php

/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php do_action('wp_body_open'); ?>
	<div class="site" id="page">

		<!-- ******************* The Navbar Area ******************* -->
		<div id="wrapper-navbar" class='header' itemscope itemtype="http://schema.org/WebSite">

			<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e('Skip to content', 'understrap'); ?></a>
			<!-- <?php if ('container' == $container) : ?>
					<div class="container-fluid">
					<?php endif; ?> -->
			<nav class='navbar navbar-expand-lg navbar-light bg-light justify-content-end'>

				
					<?php $website_logo = get_field('logo', 'option');
					$size = 'logo'; ?>

					<!-- Your site title as branding in the menu -->
					<?php if (!has_custom_logo()) { ?>

						<?php if (is_front_page() && is_home()) : ?>

							<!-- <h1 class="navbar-brand mb-0" id='logo'><a rel="home" href="<?php echo esc_url(home_url('/')); ?>" title="<?php if ($website_logo) {echo wp_get_attachment_image($website_logo, $size);} ?>" itemprop="url"><?php bloginfo('name'); ?></a></h1> -->

						<?php else : ?>

							<!-- <a class="navbar-brand ml-3" id='logo' rel="home" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" itemprop="url"> <?php if ($website_logo) { echo wp_get_attachment_image($website_logo, $size);} ?></a> -->
						<?php endif; ?>
					<?php } else {
						the_custom_logo();
					} ?>
					<!-- end custom logo -->

					<button class="navbar-toggler custom-toggler mb-2" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'understrap'); ?>">
						<span class="navbar-toggler-icon"></span>
					</button>

					<!-- The WordPress Menu goes here -->
					<?php wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav ml-auto',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'depth'           => 2,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
						)
					); ?>
					<?php if ('container' == $container) : ?>
				<?php endif; ?>

			</nav><!-- .site-navigation -->
			</div><!-- .container -->

		</div><!-- #wrapper-navbar end -->