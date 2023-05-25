<?php

//revisions count
function wp_revisions_to_keep_count( $revisions ) {
	return 10;
}
add_filter( 'wp_revisions_to_keep', 'wp_revisions_to_keep_count' );

//default gutenberg image align
function change_default_gutenberg_image_block_options (){
	$block_type = WP_Block_Type_Registry::get_instance()->get_registered( "core/image" );
	$block_type->attributes['align']['default'] = 'center';
}
add_action( 'init', 'change_default_gutenberg_image_block_options');

//default gutenberg image size
function custom_image_size() {
	update_option('image_default_size', 'full' );
}
add_action('after_setup_theme', 'custom_image_size');