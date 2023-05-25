<?php

function acf_block_before( $block_name, $is_preview ) {
	if ( $is_preview ) {
		return "<div class='preview-block'>
        <div class='preview-block__title'>$block_name</div>
        <div class='preview-block__content'>";
	}
}

function acf_block_after( $is_preview ) {
	if ( $is_preview ) {
		return "</div></div>";
	}
}
