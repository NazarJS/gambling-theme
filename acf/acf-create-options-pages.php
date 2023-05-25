<?php

if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page( [
		'page_title' => 'Setting site',
		'menu_title' => 'Setting site',
		'menu_slug'  => 'setting-site',
		'capability' => 'edit_posts',
		'icon_url'   => 'dashicons-admin-settings',
		'redirect'   => false
	] );

	acf_add_options_sub_page( array(
		'page_title'  => 'Setting theme',
		'menu_title'  => 'Setting theme',
		'parent_slug' => 'setting-site'
	) );
	acf_add_options_sub_page( array(
		'page_title'  => 'Footer buttons ',
		'menu_title'  => 'Footer buttons',
		'parent_slug' => 'setting-site'
	) );
	acf_add_options_sub_page( array(
		'page_title'  => 'Header buttons ',
		'menu_title'  => 'Header buttons',
		'parent_slug' => 'setting-site'
	) );
}