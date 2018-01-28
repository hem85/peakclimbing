<?php
/**
 * peakclimbing functions and definitions
 *
 * @package peakclimbing
 */

if ( ! function_exists( 'peakclimbing_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function peakclimbing_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on peakclimbing, use a find and replace
		 * to change 'peakclimbing' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'peakclimbing', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'peak_primay' => esc_html__( 'Primary', 'peakclimbing' ),
			'peak_footer' => esc_html__( 'Footer Menu', 'peakclimbing' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'peakclimbing_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'peakclimbing_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function peakclimbing_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'peakclimbing_content_width', 640 );
}
add_action( 'after_setup_theme', 'peakclimbing_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function peakclimbing_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'peakclimbing' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'peakclimbing' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'peakclimbing_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function peakclimbing_scripts() {
	wp_enqueue_style( 'peakclimbing-style', get_stylesheet_uri() );
	//css
	wp_enqueue_style('bootstrap-css', get_template_directory_uri() .'/assets/bootstrap/dist/css/bootstrap.css', array(), '1.0.0', 'all');

	wp_enqueue_style('style-css', get_template_directory_uri() .'/assets/stylesheets/style.css', array(), '1.0.0', 'all');


	//js file
	wp_dequeue_script('jquery');

	wp_enqueue_script('jquey-min', get_template_directory_uri(). '/assets/javascripts/jquery.min.js', array('jquery'), '1.0.0', true);

	wp_enqueue_script('proper-js', get_template_directory_uri() .'/assets/javascripts/popper.min.js', array(), '1.0.0', true);

	wp_enqueue_script('modernizr-js', get_template_directory_uri() .'/assets/javascripts/modernizr.js', array(), '1.0.0', true);

	wp_enqueue_script('bootstrap-js', get_template_directory_uri() .'/assets/bootstrap/dist/js/bootstrap.min.js', array(), '1.0.0', true);

	wp_enqueue_script('fontawersome-js', get_template_directory_uri() .'/assets/javascripts/fontawesome-all.min.js', array(), '1.0.0', true);

	wp_enqueue_script('parallax-js', get_template_directory_uri() .'/assets/javascripts/parallax.min.js', array(), '1.0.0', true);

	wp_enqueue_script('respon-js', get_template_directory_uri() .'/assets/javascripts/jquery.responsiveTabs.min.js', array(), '1.0.0', true);

	wp_enqueue_script('date-picker-js', get_template_directory_uri() .'/assets/javascripts/bootstrap-datepicker.min.js', array(), '1.0.0', true);

	wp_enqueue_script('wow-js', get_template_directory_uri() .'/assets/javascripts/wow.js', array(), '1.0.0', true);

	wp_enqueue_script('template-js', get_template_directory_uri() .'/assets/javascripts/template.js', array(), '1.0.0', true);

	wp_enqueue_script('translate-js', '//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit', array(), '1.0.0', true);

	wp_enqueue_script( 'peakclimbing-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '', true );

	wp_enqueue_script( 'peakclimbing-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'peakclimbing_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Implement the Custom image resizer it is call threw the imae url.
 */
require get_template_directory() . '/inc/aq_resizer.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/cmb2/init.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Functions which enhance menu.
 */
require get_template_directory() . '/inc/nav-walker.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizers.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
/*if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
*/

remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);

remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);