<?php

$title = get_field( 'title' );
$txt = get_field( 'subtitle' );
$description_info = get_field('description_info');
$title_info = get_field('title_info');
$button_sign = get_field('button_sign');
// $android_button = get_field('button_android');


echo acf_block_before( 'main register', $is_preview );
?>
    <div class="main-register">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="main-register__body">
              <div class="main-register__container">
                <div class="main-register__bar">
                  <div class="main-register__circle"></div>
                  Bónus activo até: 
                  <span class="main-register__data">
                    24.03.2022
                  </span>
                </div>

                <div class="main-register__bar">
                  <div class="main-register__circle"></div>
                  Informação verificada
                </div>
              </div>

              <div class="main-register__subtitle">
                <?= $subtitle ?>
              </div>

              <h1>
              <?= $title ?>
              </h1>

              <!-- <a href="#" class="ui-btn__sign">
                Sign Up
                <img src="./images/Logo.png" alt="alt" loading="lazy">
              </a> -->

              <?  echo get_button( $button_sign['url'], $button_sign['title'], 'ui-btn__sign', '' ); ?>

              <div>
                <a href="how-to-link" class="main-register__how-to">
                  How to Sign Up?
                </a>

                
              </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="main-register__description">
            <h1>
              <?= $title_info ?>
            </h1>

            <div class="main-register__txt">
                 <?= $description_info?>
            </div>
          </div>
        </div>
      </div>
    </div>
   </div>

   
<?php
echo acf_block_after( $is_preview );


