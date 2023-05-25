<?php

if ( ! function_exists( 'theme_setup' ) ) :
  function theme_setup() {
    add_theme_support( 'post-thumbnails' );

    register_nav_menus(
      array(
        'menu-main' => 'Main Header Menu',
        'menu-mobile' => 'Mobile Header Menu',
        'menu-second' => 'Second Menu',
        'menu-footer' => 'Footer Menu'
      ));

    add_theme_support(
      'html5',
      array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
      )
    );
  }
endif;
add_action( 'after_setup_theme', 'theme_setup' );

//Add thumbnails sizes
add_image_size( 'custom_small', 150 );
add_image_size( 'custom_medium', 550 );
add_image_size( 'custom_large', 850 );

//Disable emojis
function disable_emojis() {
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'disable_emojis' );

//Disable wp-embed
function my_deregister_scripts() {
  wp_dequeue_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );

if ( function_exists( 'get_field' ) ) {
  define('CUSTOM_HEADER_LOGO', get_field( 'header_logo', 'options' ) ?? null);
  define('CUSTOM_SITE_NAME', get_field('site_name', 'options') ?? null);
  define('CUSTOM_IS_ENABLE_BREADCRUMBS', get_field('enable_breadcrumbs', 'options') ?? false);
  $GLOBALS['toc_settings'] = [];
}

// replace figure to div
function filter_figure( $content ) {
  $pattern     = "/<figure(.*?)<\/figure>/i";
  $replacement = '<div$1</div>';
  $content     = preg_replace( $pattern, $replacement, $content );

  return $content;
}
add_filter( 'the_content', 'filter_figure' );