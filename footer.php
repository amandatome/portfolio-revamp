<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;?>

<?php
$container = get_theme_mod('understrap_container_type');
?>

<?php get_template_part('sidebar-templates/sidebar', 'footerfull'); ?>

	<footer class="site-footer">
		<div class="<?php echo esc_attr($container); ?> text-center container-fluid pt-2">
			<div class="row">
				<div class="col-md-12 py-2">
					<a href='https://github.com/amandatome' target='_blank' rel='noopener noreferrer' aria-label='Link to contact page' data-toggle='tooltip' title='Github Link'><i class='fab fa-github-square fa-2x'></i></a>
					<a href="mailto:amandatome@me.com?subject=Mail from Portfolio" target='_blank' rel='noopener noreferrer' aria-label='Link to Email Client' data-toggle='tooltip' title='Email Link'><i class="fas fa-envelope-square fa-2x"></i></a>  

				</div>
				<!--col end -->
			</div><!-- row end -->
			<div class='row'>
				<div class='col-md-12 text-center'>
					<div class="site-info">
					<?php $date = date_i18n( 'Y' );?>
						<p>Copyright &copy; <?php echo $date; ?> - Amanda Tomé</p>
					</div><!-- .site-info -->
				</div>
			</div>
		</div><!-- container end -->
	</footer><!-- #colophon -->



<?php wp_footer(); ?>

</body>

</html>