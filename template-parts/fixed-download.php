<?php
$footer_fixed_title       = get_field( 'footer_fixed_title', 'option' );
$footer_fixed_description = get_field( 'footer_fixed_description', 'option' );
$footer_fixed_button      = get_field( 'footer_fixed_button', 'option' );
$footer_fixed_img         = get_field( 'footer_fixed_img', 'option' );
?>


<div class="fixed-download">
	<?php if(!empty($footer_fixed_title)):?>
    <div class="fixed-download__wrap">
        <div class="fixed-download__body">
            <div class="fixed-download__logo">
				<?php echo get_image( $footer_fixed_img ) ?>
            </div>
            <div class="fixed-download__content">
                <div class="fixed-download__subtitle"><?php echo $footer_fixed_title['mobile']; ?></div>
                <div class="fixed-download__bonus"><?php echo $footer_fixed_description['mobile']; ?></div>
            </div>
        </div>
		<?php if ( ! empty( $footer_fixed_button['mobile']['url'] ) && ( ! empty( $footer_fixed_button['mobile']['title'] ) ) ): ?>
			<?= get_button( $footer_fixed_button['mobile']['url'], $footer_fixed_button['mobile']['title'], 'btn ', 'nofollow sponsored', true ); ?>
		<?php endif; ?>
    </div>
	<?php endif;?>
</div>