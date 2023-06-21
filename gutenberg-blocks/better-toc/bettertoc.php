<?php
add_action( 'init', 'better_toc_block_init' );
function better_toc_block_init() {
	register_block_type( __DIR__ . '/build', array( 'render_callback' => 'render_better_toc' ) );
}

function render_better_toc( $attributes, $content, $block ) {
	ob_start();
	?>
	<div class="content">
		<div class="content__title">
			<h2>
				<?= $attributes['ListTitle']; ?>
			</h2>
		</div>

		<nav class="content__body">
				<?php
				printf( '<%s class="content__list">', $attributes['ListType'] );
				foreach ( $attributes['tocContent'] as $attribute ) {
					printf( '<li class="content__li"><a class="content__link" href="#%s">%s</a></li>', $attribute[0][1], $attribute[1][1] );
				}
				printf( '</%s>', $attributes['ListType'] );
				?>

		</nav>
	</div>

	<?php

	return ob_get_clean();


}



