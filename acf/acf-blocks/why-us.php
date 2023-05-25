<?php
$wu_icon= get_field('wuIcon');
$wu_text= get_field('wuText');

echo acf_block_before( 'Why us', $is_preview );
?>
<div class="app-why-us">
    <div class="app-why-us__item">
      <div class="app-why-us__icon">
        <?php
         if( $wu_icon ) {
          echo wp_get_attachment_image( $wu_icon, 'medium' );
        }?>
      </div>
      <div class="app-why-us__description">
      <?=$wu_text?>
      </div>
    </div>
  </div>

<?php
echo acf_block_after( $is_preview );