<?php
/**
 * theme01 functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package theme01
 */

//管理バー非表示
add_filter( 'show_admin_bar', '__return_false' );

if ( ! function_exists( 'theme01_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function theme01_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on theme01, use a find and replace
	 * to change 'theme01' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'theme01', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'theme01' ),
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
	add_theme_support( 'custom-background', apply_filters( 'theme01_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'theme01_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function theme01_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'theme01_content_width', 640 );
}
add_action( 'after_setup_theme', 'theme01_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function theme01_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'theme01' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'theme01' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'theme01_widgets_init' );


// jQuery
function register_script(){
		wp_deregister_script('jquery');	//WordPress既存のjqueryは読み込ませない
		wp_register_script('jquery3.1.0', get_bloginfo('template_directory') . '/js/jquery-3.1.0.min.js');
		wp_register_script('transform', get_bloginfo('template_directory') . '/js/jquery-css-transform.js');
		wp_register_script('rotate_scale', get_bloginfo('template_directory') . '/js/jquery-animate-css-rotate-scale.js');
		wp_register_script('easie1', get_bloginfo('template_directory') . '/js/jquery.easie.js');
		wp_register_script('easie2', get_bloginfo('template_directory') . '/js/jquery.easing.1.3.js');
		wp_register_script('sidr', get_bloginfo('template_directory') . '/js/jquery.sidr.min.js');
		wp_register_script('snapwidget', 'https://snapwidget.com/js/snapwidget.js');
		wp_register_script('masonry', get_bloginfo('template_directory') . '/js/masonry.pkgd.min.js');
		wp_register_script('app', get_bloginfo('template_directory') . '/js/app.js');
}

function add_script() {
	register_script();
	wp_enqueue_script('jquery3.1.0');
	wp_enqueue_script('transform');
	wp_enqueue_script('rotate_scale');
	wp_enqueue_script('easie1');
	wp_enqueue_script('easie2');
	wp_enqueue_script('sidr');
	wp_enqueue_script('snapwidget');
	wp_enqueue_script('masonry');
	wp_enqueue_script('app');

}

//wp_print_scripts非推奨になった為、wp_enqueue_scriptsを使用
// add_action('wp_print_scripts', 'add_script');
add_action('wp_enqueue_scripts', 'add_script');

// Style
function register_style() {
	wp_register_style('style', get_stylesheet_uri());
	wp_register_style('reset', get_bloginfo('template_directory').'/css/html5reset-1.6.1.css');
	wp_register_style('font-awesome','http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');
}
function add_stylesheet() {
	// 共通
	register_style();
	wp_enqueue_style('reset');
	wp_enqueue_style('style');
	wp_enqueue_style('font-awesome');
}
//wp_print_scripts非推奨になった為、wp_enqueue_scriptsを使用
// add_action('wp_print_styles', 'add_stylesheet');
add_action('wp_enqueue_scripts', 'add_stylesheet');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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

//アイキャッチ画像
add_theme_support('post-thumbnails'); //アイキャッチ有効化
add_image_size('category-thumb',360,9999);

//パンくずリストカスタム
function custom_bread_crumb($bread_crumb_arr){
	$bread_crumb_arr[0]['title'] = 'Top';
	return $bread_crumb_arr;
}
add_filter( 'bread_crumb_arr', 'custom_bread_crumb' );
