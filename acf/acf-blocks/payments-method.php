<?php
echo acf_block_before( 'Payment Toggle', $is_preview );
$payments = get_field( 'payments_list' );
$payments_title = get_field( 'payments_title' );


?>
    <div class="payment payment--with-bg">
        <div class="payment__title">
            <i class="payment-icon"></i>
            <?=$payments_title?>
        </div>
        <div class="payment__wrap">
			<?php foreach ( $payments as $payment ): ?>
                <div class="payment__item">
                    <img src="<?= get_template_directory_uri() ?>/assets/build/images/payment-methods/<?= $payment ?>.svg"
                         class="payment__image" alt="<?= $payment ?>" loading="lazy">
                </div>
			<?php endforeach; ?>
        </div>
    </div>
<?php
echo acf_block_after( $is_preview );