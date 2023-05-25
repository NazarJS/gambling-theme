<?php

add_filter( 'block_editor_settings_all', function( $editor_settings, $editor_context ) {
    $editor_settings['generateAnchors'] = true;
    return $editor_settings;
}, 10, 2 );