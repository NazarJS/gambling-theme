<?php

require_once( ABSPATH . 'wp-admin/includes/plugin.php' );

add_action( 'admin_notices', function () {
	if ( ! function_exists( 'get_field' ) ):
		if ( ! is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ): ?>
            <div class="error">
                <p>Warning: The theme needs ACF Pro to function.</p>
                <p>
                    <a href="https://connect.advancedcustomfields.com/v2/plugins/download?p=pro&k=NjY2ZjMwOTFjNzhmYTJlZjkzNjJmOTEwYzQ4ODRmYWE1NzQ1MmEwOGZiMjFjNTAzMmEwZjU5">Download</a>
                </p>
            </div>
		<?php
		endif;
	endif;
} );