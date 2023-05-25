<?php

$title = get_field('banner_title');
$bonus = get_field('banner_bonus');


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

        <a href="#" class="ui-btn__sign">
            Sign Up
            <img src="./images/Logo.png" alt="alt" loading="lazy">
        </a>
        </div>
     </div>

   
<?php
echo acf_block_after( $is_preview );