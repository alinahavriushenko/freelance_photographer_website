<?php


if ( ! isset( $content_width ) ) {
	$content_width = 800; /* pixels */
}


if ( ! function_exists( 'myfirsttheme_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various
	 * WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme
	 * hook, which runs before the init hook. The init hook is too late
	 * for some features, such as indicating support post thumbnails.
	 */
	function theme_setup() {

		/**
		 * Make theme available for translation.
		 * Translations can be placed in the /languages/ directory.
		 */
		load_theme_textdomain( 'freelance-theme', get_template_directory() . '/languages' );

		/**
		 * Add default posts and comments RSS feed links to <head>.
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Enable support for post thumbnails and featured images.
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Add support for two custom navigation menus.
		 */
		register_nav_menus( array(
			'main-menu'   => __( 'Primary Menu', 'freelance-theme' ),
            'footer' => __( 'Footer Menu', 'freelance-theme' ),
		) );

		/**
		 * Enable support for the following post formats:
		 * aside, gallery, quote, image, and video
		 */
		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'quote', 'image', 'video' ) );
        add_theme_support( 'custom-logo' );


        wp_enqueue_style( 'style', get_stylesheet_uri() );
	}
endif;
add_action( 'after_setup_theme', 'theme_setup' );


// menu classes

function menu_class($classes)
{
    $classes[] = 'nav-item';
    return $classes;
}

function menu_link_class($attrs)
{
    $attrs['class'] = 'nav-link';
    return $attrs;
}
add_filter('nav_menu_css_class', 'menu_class');
add_filter('nav_menu_link_attributes', 'menu_link_class');

// js

function enqueue_custom_scripts() {

	wp_enqueue_script('jquery');
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0', true);

}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');


// Localize the reference PHP value
	function reference_value() {

	$reference = get_field('reference');
    wp_localize_script('custom-script', 'php_vars', array(
        'reference' => esc_attr($reference),
    ));
}

add_action('wp_enqueue_scripts', 'reference_value');

// Google Fonts

function enqueue_custom_fonts() {

    wp_enqueue_style('custom-fonts', get_stylesheet_directory_uri() . '/assets/fonts/fonts.css', array(), '1.0.0', 'all');
}

add_action('wp_enqueue_scripts', 'enqueue_custom_fonts');

// enqueu ajax

function load_more_photos_scripts() {
    wp_enqueue_script('load-more-script', get_template_directory_uri() . '/js/load-more.js', array('jquery'), '1.0', true);
    wp_localize_script('load-more-script', 'load_more_params', array(
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_enqueue_scripts', 'load_more_photos_scripts');


// Load more button 

function load_more_photos() {
    $page = $_POST['page'];
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 8,
        'paged' => $page,
    );

    $custom_photos_query = new WP_Query($args);

    if ($custom_photos_query->have_posts()) {
        while ($custom_photos_query->have_posts()) {
            $custom_photos_query->the_post();
            get_template_part('templates_parts/photo_block');
        }
        wp_reset_postdata();
    } else {
        echo 'end';
    }

    die();
}
add_action('wp_ajax_load_more_photos', 'load_more_photos');
add_action('wp_ajax_nopriv_load_more_photos', 'load_more_photos');