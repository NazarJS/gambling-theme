<?php

function create_block_button_encoded_block_init() {
	register_block_type( __DIR__ . '/build',array( 'render_callback' => 'render_button_encode' ));
}
add_action( 'init', 'create_block_button_encoded_block_init' );

function render_button_encode( $attributes, $content, $block ) {
	ob_start();
	printf("<button class='special-button %s' data-link='%s'>%s</button>",$attributes['btnStyle'],base64_encode( $attributes['url'] ),$attributes['anchor']);
	return ob_get_clean();
}
