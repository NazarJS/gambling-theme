<?php

$title = get_field('banner_title');
$bonus = get_field('banner_bonus');
$button = get_field('button');


echo acf_block_before( 'Banner', $is_preview );
?>
     <div class="banner">
        <div class="banner__body">
            <div class="banner__title">
                <?= $title ?>
            </div>

        <div class="banner__bonus">
            <?= $bonus ?>  
        </div>

        <?php if ( ! empty( $button['url'] ) && ! empty( $button['title'] ) ): ?>
            <div>
                <?=  get_button( $button['url'], $button['title'], 'ui-btn__sign','', true ); ?>   
            </div>
		<?php endif; ?>
        </div>
     </div>

   
<?php
echo acf_block_after( $is_preview );