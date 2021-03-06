<?php
/**
 * wordpress-gulp functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wordpress-gulp
 */

if ( ! function_exists( 'wordpress_gulp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wordpress_gulp_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on wordpress-gulp, use a find and replace
	 * to change 'wordpress-gulp' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'wordpress-gulp', get_template_directory() . '/languages' );

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

	// Add logo upload in customizer WordPress 4.5+
  add_theme_support( 'custom-logo' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'wordpress-gulp' ),
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
	add_theme_support( 'custom-background', apply_filters( 'wordpress_gulp_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'wordpress_gulp_setup' );

if ( !function_exists( 'strapped_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function wordpress_gulp_the_custom_logo() {
    // Try to retrieve the Custom Logo
    $output = '';
    if (function_exists('get_custom_logo'))
        $output = get_custom_logo();

    // Nothing in the output: Custom Logo is not supported, or there is no selected logo
    // In both cases we display the site's name
    if (empty($output))
        $output = '<a class="navbar-brand" href="' . esc_url(home_url('/')) . '">' . get_bloginfo('name') . '</a>';

    echo $output;
}
endif;

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wordpress_gulp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wordpress_gulp_content_width', 640 );
}
add_action( 'after_setup_theme', 'wordpress_gulp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
 function wordpress_gulp_widgets_init() {
   register_sidebar( array(
     'name'          => esc_html__( 'Sidebar', 'wordpress-gulp' ),
     'id'            => 'sidebar-1',
     'description'   => esc_html__( 'Add widgets here.', 'wordpress-gulp' ),
     'before_widget' => '<section id="%1$s" class="panel panel-default widget %2$s">',
     'after_widget'  => '</section>',
     'before_title'  => '<div class="panel-heading"><h3 class="panel-title widget-title">',
     'after_title'   => '</h3></div>',
   ) );
 }
 add_action( 'widgets_init', 'wordpress_gulp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wordpress_gulp_scripts() {
	// wp_enqueue_style( 'strapped-style', get_template_directory_uri() . '/style.min.css' );
	
	wp_enqueue_style( 'wordpress-gulp-style', get_stylesheet_uri() );

	wp_enqueue_script( 'wordpress-gulp-js', get_template_directory_uri() . '/js/dist/scripts.min.js', array('jquery'), '1.0.0', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wordpress_gulp_scripts' );

/**
 * Editing the Tag Widget
 */
function my_widget_tag_cloud_args( $args ) {
  $args['largest'] = 11;
  $args['smallest'] = 11;
  $args['unit'] = 'px';
  return $args;
}
add_filter( 'widget_tag_cloud_args', 'my_widget_tag_cloud_args' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Bootstrap Walker Menu
 */
require get_template_directory() . '/inc/bootstrap-walker.php';
