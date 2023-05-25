<?php
if ( !is_admin() && ( ! defined('DOING_AJAX') || ( defined('DOING_AJAX') && ! DOING_AJAX ) ) ) {
	ob_start( 'html5_slash_fixer' );
	add_action( 'shutdown', 'html5_slash_fixer_flush' );
}

function html5_slash_fixer( $buffer ) {
	return str_replace( ' />', '>', $buffer );
}

function html5_slash_fixer_flush() {
	ob_end_flush();
}

