<?php
if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'latte_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function latte_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on latte-theme, use a find and replace
		 * to change 'latte-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'latte-theme', get_template_directory() . '/languages' );

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


		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

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
	}
endif;
add_action( 'after_setup_theme', 'latte_theme_setup' );


define( 'ASSETS_DIR', get_template_directory_uri() . '/assets' );
define( 'CSS_DIR', get_template_directory_uri() . '/assets/dist/css' );
define( 'FONTS_DIR', get_template_directory_uri() . '/assets/dist/fonts' );
define( 'IMG_DIR', get_template_directory_uri() . '/assets/dist/images' );
define( 'JS_DIR', get_template_directory_uri() . '/assets/dist/js' );


require get_template_directory() . '/inc/template-tags.php';

require_once 'inc/plugins.php';
require_once 'acf/acf-saved-fields/acf-save-fields.php';
require_once 'acf/acf-create-blocks.php';
require_once 'acf/acf-create-options-pages.php';
require_once 'inc/styles-scripts.php';
require_once 'inc/get-image.php';
require_once 'inc/global-setting.php';
require_once 'inc/social-icons.php';
require_once 'inc/breadcrumbs.php';
require_once 'inc/load-post-ajax.php';
require_once 'inc/comment-list.php';
require_once 'inc/comment-rating.php';
require_once 'inc/get_button.php';
require_once 'inc/get-rating.php';
require_once 'inc/toc-function.php';
require_once 'inc/widgets.php';
require_once 'inc/action.php';
require_once 'inc/setting.php';
require_once 'inc/w3c-fix.php';
require_once 'inc/gutenberg-option.php';
require_once 'inc/color-function.php';
add_filter( 'the_content', 'filter_the_content_add_toc', 10 );

function filter_the_content_add_toc( $content ) {


	if ( is_singular() && in_the_loop() && is_main_query() ) {

		$toc_html = generate_toc_list( $content, 2 );
		return preg_replace('/({{TOC}})/',toc_wrapper($toc_html),$content);

	}

	return $content;
}

add_action('wp_footer', function () {
	wp_dequeue_style('core-block-supports');
});

//Guten blocks

require_once 'gutenberg-blocks/gutenberg-blocks-init.php';