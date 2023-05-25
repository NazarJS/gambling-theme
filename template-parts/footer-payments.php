<?php
$payments = get_field( 'ft_payments','option' );
?>

<?php if(!empty($payments)):?>
<div class="payment payment-footer">
	<div class="payment__wrap">
	<?php foreach ( $payments as $payment ): ?>
		<div class="payment__item">
			<img src="<?= get_template_directory_uri() ?>/assets/build/images/payment-methods/<?= $payment ?>.svg"
			     class="payment__image" alt="<?= $payment ?>" loading="lazy">
		</div>
	<?php endforeach; ?>
	</div>
</div>
<?php endif;?>
