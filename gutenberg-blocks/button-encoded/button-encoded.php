<?php

$url = $attributes['url'];
$style = $attributes['btnStyle'];

function create_block_button_encoded_block_init() {
	register_block_type( __DIR__ . '/build',array( 'render_callback' => 'render_button_encode' ));
}
add_action( 'init', 'create_block_button_encoded_block_init' );

function render_button_encode( $attributes, $content, $block ) {
	$image_path = IMG_DIR;
	$url = $attributes['url'];
	$style = $attributes['btnStyle'];
	ob_start();

	if ($attributes['btnStyle'] == 'ui-btn__icon ui-btn__android') {

		echo get_button( $url, ' ', 'ui-btn__icon ui-btn__android','', true );

	} else if ($attributes['btnStyle'] == 'ui-btn__icon ui-btn__ios') {
		printf("<button type='button'
				
				data-decoded-text='$url'
				class='link-button $style'>
				<svg class='ui-icon'>
					<use xlink:href='$image_path/svg/symbols.svg#ios'></use>
				</svg>
				<span class='ui-btn__name'>
					Download

					<span class='ui-btn__subtitle'>
						for IOS
					</span>
				</span>
			</button>");

	} else {
		printf("<button class='special-button %s' data-link='%s'>%s</button>",$attributes['btnStyle'],base64_encode( $attributes['url'] ),$attributes['anchor']);
	  }
	
	
	return ob_get_clean();
}
