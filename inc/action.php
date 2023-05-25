<?php
// Remove unwanted SVG filter injection WP
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

add_post_type_support( 'page', 'excerpt' );