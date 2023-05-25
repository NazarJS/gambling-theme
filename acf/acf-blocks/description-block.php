<?php
$description_text       = get_field( 'description_text' );
$description_button     = get_field( 'description_button' );
$description_h1         = get_field( 'description_h1' );
$description_text_color = get_field( 'description_text_color' );
$description_text_color = ( ! empty( $description_text_color ) ) ? 'style="color:' . $description_text_color . '"' : '';

echo acf_block_before( 'Description block', $is_preview );
?>

    <div class="jumbotron">
        <div class="row">
            <div class="col-7">
                <div <?= $description_text_color ?>>
					<?php if ( ! empty( $description_h1 ) ): ?>
                        <h1  ><?= $description_h1 ?></h1>
					<?php endif; ?>
					<?php if ( ! empty( $description_text ) ): ?>
						<?= $description_text ?>
					<?php endif; ?>
                </div>
				<?php if ( ! empty( $description_button['url'] ) && ! empty( $description_button['title'] ) ): ?>
					<?= get_button( $description_button['url'], $description_button['title'], ' content-button__control btn btn-big-text btn-with-back ', 'nofollow' ) ?>
				<?php endif; ?>

            </div>
            <div class="col-5 ">
                <InnerBlocks/>
            </div>
        </div>
    </div>

<?php
echo acf_block_after( $is_preview );