<?php

$promo_title = get_field('promo_title');
$promo_date = get_field('promo_date');
$promocode = get_field('promocode');
$promo_text_button = get_field('promo_text_button');
$promo_image = get_field('promo_image');

$style = '';
$style_width = 'style="text-align: center"';
if(!empty($promo_image)) {
  $style = 'style="background-image: url('.$promo_image.')"';
  $style_width = 'style="max-width: 600px;"';
}

echo acf_block_before( 'Promocode', $is_preview );
?>
    <div class="promo-code" <?= $style; ?>>
      <div <?= $style_width; ?>>
        <?php if(!empty($promo_title)): ?><p><?= $promo_title; ?></p><?php endif;?>
        <input type="text" value="<?= $promo_date; ?>" name="date" disabled>
        <input type="text" value="<?= $promocode; ?>" name="promocode" disabled>
        <input type="text" value="<?= $promocode; ?>" class="promocode-copy">
        <a class="btn btn-with-back" ><span><?= $promo_text_button; ?></span></a>
        <span>Done!</span>
      </div>
    </div>
<?php
echo acf_block_after( $is_preview );