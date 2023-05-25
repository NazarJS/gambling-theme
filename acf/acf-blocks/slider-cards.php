<?php
$cards_slider = get_field( 'cards_slider' );

echo acf_block_before( 'Screenshots', $is_preview );
?>

    <div class="app-screenshots m-50">
        <div class="slider">
            <div class="slider__wrap">
				<?php foreach ( $cards_slider as $card ): ?>
                    <div class="slider__item">

                        <img src="<?php echo esc_url( $card['image']['url'] ); ?>" alt="<?php echo esc_attr( $card['image']['alt'] ); ?>" >

                    </div>
				<?php endforeach; ?>
            </div>

        </div>
    </div>

<?php
echo acf_block_after( $is_preview );

