<?php

/**
 * blockwp functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package blockwp
 */

if (!defined('BLOCKWP_VERSION')) {
	// Replace the version number of the theme on each release.
	define('BLOCKWP_VERSION', '1.0.0');
}

if (!function_exists('blockwp_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function blockwp_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on blockwp, use a find and replace
		 * to change 'blockwp' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('blockwp');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__('Primary', 'blockwp'),
				'top-menu' => esc_html__('Top Menu', 'blockwp'),
				'footer-menu' => esc_html__('Footer Menu', 'blockwp'),
				'social-menu' => esc_html__('Social Menu', 'blockwp'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'blockwp_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Add image size for the theme
		add_image_size('blockwp-left-img-small', 420, 350, true);
		add_image_size('blockwp-left-img-large', 570, 420, true);
		add_image_size('blockwp-full-img-small', 870, 653, true);
		add_image_size('blockwp-full-img-large', 1170, 750, true);

		// Add support for Yoast SEO Breadcrumbs.
		add_theme_support('yoast-seo-breadcrumbs');

		// Add support for Rank Math Breadcrumbs.
		add_theme_support('rank-math-breadcrumbs');
	}
endif;
add_action('after_setup_theme', 'blockwp_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function blockwp_content_width()
{
	$GLOBALS['content_width'] = apply_filters('blockwp_content_width', 640);
}
add_action('after_setup_theme', 'blockwp_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blockwp_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'blockwp'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'blockwp'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Offcanvas Sidebar', 'blockwp'),
			'id'            => 'offcanvas-sidebar',
			'description'   => esc_html__('Add widgets here.', 'blockwp'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'blockwp_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function blockwp_scripts()
{
	$min = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';

	/*
	* Google Fonts
	*/
	wp_enqueue_style('google-font', '//fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap', array(), BLOCKWP_VERSION);

	/*
	* Font Awesome CSS
	*/
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/candidthemes/assets/vendor/font-awesome/all' . $min . '.css', array(), BLOCKWP_VERSION);


	/*
	* Theme CSS
	*/
	wp_enqueue_style('blockwp-style', get_stylesheet_uri(), array(), BLOCKWP_VERSION);
	wp_style_add_data('blockwp-style', 'rtl', 'replace');

	wp_enqueue_script('blockwp-navigation', get_template_directory_uri() . '/candidthemes/assets/js/navigation.js', array(), BLOCKWP_VERSION, true);

	if ('masonry' == get_theme_mod('blockwp_blog_page_masonry_normal', 'normal')) {
		wp_enqueue_script('masonry');
	}
	if (1 == get_theme_mod('blockwp_enable_sticky_sidebar', 1)) {
		wp_enqueue_script('theia-sticky-sidebar', get_template_directory_uri() . '/candidthemes/assets/js/theia-sticky-sidebar.js', array('jquery'), BLOCKWP_VERSION, true);
	}
	wp_enqueue_script('fairy-custom-js', get_template_directory_uri() . '/candidthemes/assets/js/custom.js', array('jquery'), BLOCKWP_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'blockwp_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 * Include custom functions
 */
require get_template_directory() . '/candidthemes/core.php';