<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

//Google Fonts
function google_fonts()
{
	$query_args = array(
		'family' => 'Acme|Montserrat|Barlow|Grand+Hotel|Playfair+Display|Raleway|Stardos+Stencil|Josefin+Sans|Suwannaphum',
		'subset' => 'latin,latin-ext'
	);
	wp_enqueue_style('google_fonts', add_query_arg($query_args, "//fonts.googleapis.com/css"), array(), null);
}
add_action('wp_enqueue_scripts', 'google_fonts');

function fontawesome()
{
	wp_enqueue_script(
		'font-awesome', //handle
		'https://kit.fontawesome.com/6b46070716.js',
		array(), //dependencies
		'5.10.2', // version number
		true //load in footer
	);
}
add_action('wp_enqueue_scripts', 'fontawesome');

if (!function_exists('theme_setup')) :

	function theme_setup()
	{

		/* This theme uses post thumbnails (aka "featured images")
	*  all images will be cropped to thumbnail size (below), as well as
	*  a square size (also below). You can add more of your own crop
	*  sizes with add_image_size. */
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size(120, 90, true);
		add_image_size('square', 150, 150, true);
		add_image_size('medium-square', 525, 525, false);
		add_image_size('large-square', 600, 600, true);
		add_image_size('rectangle', 1200, 800, true);
	}
endif;

add_action('after_setup_theme', 'theme_setup');
