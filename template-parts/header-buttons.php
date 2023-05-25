<?php

$first_header_button  = get_field( 'first_header_button', 'options' );
$second_header_button = get_field( 'second_header_button', 'options' );
?>
<div class="header-buttons">
	<?php

    if ( ! empty( $first_header_button['url'] ) || ! empty( $first_header_button['title'] ) ) {
		echo get_button( $first_header_button['url'], $first_header_button['title'], ' btn-header-load btn-header ', 'nofollow' );
	}

	if ( ! empty( $second_header_button['url'] ) || ! empty( $second_header_button['title'] ) ) {
		echo get_button( $second_header_button['url'], $second_header_button['title'], ' btn-header-reg btn-header ', 'nofollow' );
	}

	?>
</div>
