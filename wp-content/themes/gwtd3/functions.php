<?php
/**
 * gwtd3 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gwtd3
 */

if ( ! function_exists( 'gwtd3_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gwtd3_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on gwtd3, use a find and replace
	 * to change 'gwtd3' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'gwtd3', get_template_directory() . '/languages' );

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
		'mobile-menu' => esc_html__( 'Mobile Menu', 'gwtd3' ),
		'gwtd-menu' => esc_html__( 'Gwtd Menu', 'gwtd3' ),
		'gwsub-menu' => esc_html__( 'Sub Menu', 'gwtd3' ),
		'ginvsub-menu' => esc_html__( 'Get Involved Sub Menu', 'gwtd3' ),
		'thepeoplesub-menu' => esc_html__( 'The People Sub Menu', 'gwtd3' ),
		'medkitsub-menu' => esc_html__( 'Media Kit Sub Menu', 'gwtd3' ),
		'footer-menu' => esc_html__( 'Footer Menu', 'gwtd3' ),
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
	add_theme_support( 'custom-background', apply_filters( 'gwtd3_custom_background_args', array(
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
add_action( 'after_setup_theme', 'gwtd3_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gwtd3_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gwtd3_content_width', 640 );
}
add_action( 'after_setup_theme', 'gwtd3_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gwtd3_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'gwtd3' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'gwtd3' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Social', 'gwtd3' ),
		'id'            => 'footer-social',
		'description'   => esc_html__( 'Add widgets here.', 'gwtd3' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Subscribe Area', 'gwtd3' ),
		'id'            => 'subscribe-area',
		'description'   => esc_html__( 'Add widgets here.', 'gwtd3' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'gwtd3_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function gwtd3_scripts() {

	wp_enqueue_style( 'gwtd3-s', get_template_directory_uri() . '/layouts/s.css', array(), '20170725' );

	wp_enqueue_style( 'gwtd3-skeleton', get_template_directory_uri() . '/layouts/skeleton.css', array(), '20170725' );

	wp_enqueue_style( 'gwtd3-style', get_stylesheet_uri() );

	wp_enqueue_style( 'dashicons' );

	wp_enqueue_style( 'gwtd3-fonts', 'https://fonts.googleapis.com/css?family=Changa:400,600,700|Open+Sans:400,400i,600,700' );

	wp_enqueue_style( 'gwtd3-font-awesome', get_template_directory_uri() . '/layouts/font-awesome/css/font-awesome.min.css', array(), '20170725' );
	
	if ( get_page_template_slug() == 'local-events-page.php' || get_page_template_slug() == 'livedata-page.php' ) {
		wp_enqueue_style( 'gwtd-map', get_template_directory_uri() . '/layouts/gwtd-map.css', array(), '20170830' );
	}

	wp_enqueue_script( 'gwtd3-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20170725', true );

	wp_enqueue_script( 'gwtd3-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20170725', true );

	wp_enqueue_script( 'jquery' );

	//if ( is_front_page() || get_page_template_slug() == 'schedule-page.php' ) {
		wp_enqueue_script( 'gwtd3-moment', get_template_directory_uri() . '/js/moment.js', array( 'jquery' ), '20170725', true );
		wp_enqueue_script( 'gwtd3-moment-data', get_template_directory_uri() . '/js/moment.timezone.with.data.js', array( 'jquery' ), '20170725', true );
		wp_enqueue_script( 'gwtd3-countdown', get_template_directory_uri() . '/js/jquery.countdown.min.js', array( 'jquery' ), '20170725', true );
	//}

	if ( get_page_template_slug() == 'local-events-page.php' ) {
		wp_register_script( 'gwtd-map-base', get_template_directory_uri() . '/js/ammap.js', array(), false, true );
		wp_register_script( 'gwtd-map-design', get_template_directory_uri() . '/js/worldHigh.js', array(), false, true );
		wp_register_script( 'gwtd-map', get_template_directory_uri() . '/js/gwtd-map.js', array(), false, true );
        wp_enqueue_script( 'gwtd-map-base' );
        wp_enqueue_script( 'gwtd-map-design' );
        wp_enqueue_script( 'gwtd-map' );
	}
	if ( get_page_template_slug() == 'livedata-page.php' ) {
		wp_register_script( 'gwtd-map-base', get_template_directory_uri() . '/js/ammap.js', array(), false, true );
		wp_register_script( 'gwtd-map-design', get_template_directory_uri() . '/js/worldHigh.js', array(), false, true );
		wp_register_script( 'gwtd-map', get_template_directory_uri() . '/js/gwtd-map.js', array(), false, true );
        wp_enqueue_script( 'gwtd-map-base' );
        wp_enqueue_script( 'gwtd-map-design' );
        wp_enqueue_script( 'gwtd-map' );
	}

	wp_enqueue_script( 'gwtd3-custom-scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), '20170725', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gwtd3_scripts' );

/*-----------------------------------------------------------------------------------*/
/* Theme customizer options
/*-----------------------------------------------------------------------------------*/
function gwtd3_customize( $wp_customize )
{

	//	General Options

	$wp_customize->add_section(
		'gwtd3_options',
		array(
			'title' => __( 'Header Images', 'gwtd3' ),
			'priority' => 30,
			'capability' => 'edit_theme_options',
		)
	);

	$wp_customize->add_setting( 'gwtd3_landing_header_img',
		array(
			'default' => '',
			'sanitize_callback' => 'simplespace_sanitize_customizer_url',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control( $wp_customize, 'gwtd3_landing_header_img',
			array(
				'label' => __( 'Landing Page Header Image', 'gwtd3' ),
				'section' => 'gwtd3_options',
				'settings' => 'gwtd3_landing_header_img',
			)
		)
	);

	$wp_customize->add_setting( 'gwtd3_landing_mobile_header_img',
		array(
			'default' => '',
			'sanitize_callback' => 'simplespace_sanitize_customizer_url',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control( $wp_customize, 'gwtd3_landing_mobile_header_img',
			array(
				'label' => __( 'Landing Page Mobile Header Image', 'gwtd3' ),
				'section' => 'gwtd3_options',
				'settings' => 'gwtd3_landing_mobile_header_img',
			)
		)
	);

	$wp_customize->add_setting( 'gwtd3_internal_header_img',
		array(
			'default' => '',
			'sanitize_callback' => 'simplespace_sanitize_customizer_url',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control( $wp_customize, 'gwtd3_internal_header_img',
			array(
				'label' => __( 'Internal Page Header Image', 'gwtd3' ),
				'section' => 'gwtd3_options',
				'settings' => 'gwtd3_internal_header_img',
			)
		)
	);

	$wp_customize->add_setting( 'gwtd3_internal_mobile_header_img',
		array(
			'default' => '',
			'sanitize_callback' => 'simplespace_sanitize_customizer_url',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control( $wp_customize, 'gwtd3_internal_mobile_header_img',
			array(
				'label' => __( 'Internal Page Mobile Header Image', 'gwtd3' ),
				'section' => 'gwtd3_options',
				'settings' => 'gwtd3_internal_mobile_header_img',
			)
		)
	);

}

add_action( 'customize_register', 'gwtd3_customize' );

function simplespace_sanitize_customizer_url( $value )
{
	$sanitized = esc_url( $value );
	return $sanitized;
}

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// remove jetpack open graph tags As per instructions on
// https://crunchify.com/how-to-prevent-jetpack-from-doubling-open-graph-meta-tags-in-wordpress-header
// Entered by Tobi 2017-08-07

remove_action( 'wp_head','jetpack_og_tags' );
