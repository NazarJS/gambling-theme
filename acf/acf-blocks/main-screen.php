<?php

$title = get_field( 'title' );
$subtitle = get_field( 'subtitle' );
$description_info = get_field('description_info');
$title_info = get_field('title_info');
$button_sign = get_field('button_sign');
$link_sign_up = get_field('link_sign_up');

$bonus_info = get_field('bonus_info');
$bonus_info_second = get_field('bonus_info_second');
$rating = get_field("rating");


get_template_part('ld+json/Review');

echo acf_block_before( 'main register', $is_preview );
?>
    <div class="main-register">
      <div class="container">
        <div class="row">

          <div class="col-md-6">
            <div class="main-register__wrap">
              <div class="main-register__body">
                  <div class="main-register__container">
                    
                  <?php if ( ! empty( $bonus_info ) ): ?>
					          <div class="main-register__bar">
                      <div class="main-register__circle"></div>
                      <?php echo $bonus_info ?>
                      <span class="main-register__data">
                        24.03.2022
                      </span>
                    </div>
				          <?php endif; ?>

                  <?php if ( ! empty( $bonus_info_second ) ): ?>
					          <div class="main-register__bar main-register__bar--green">
                      <div class="main-register__circle">
                        <img src="<?php echo $path ?>/svg/Subtract.svg" alt="alt">
                      </div>
                        <?php echo $bonus_info_second  ?>
                      </div>
                    
				          <?php endif; ?>    
                  </div>           

                  <div class="main-register__subtitle">
                    <?php echo $subtitle ?>
                  </div>

                  <?php if ( ! empty( $title ) ): ?>
					          <h1>
                      <?php echo $title ?>
                   </h1>
				          <?php endif; ?>

                  <?php if ( ! empty( $button_sign['url'] ) && ! empty( $button_sign['title'] ) ): ?>
					          <?php echo get_button( $button_sign['url'], $button_sign['title'], 'ui-btn__sign','', true ); ?>
				          <?php endif; ?>

               
                  <?php if ( ! empty( $link_sign_up['url'] ) && ! empty( $link_sign_up['title'] ) ): ?>
                    <div>
                      <a href="<?php echo $link_sign_up['url'] ?>" class="main-register__how-to">
                        <?php echo $link_sign_up['title'] ?>
                      </a>  
                    </div> 
				          <?php endif; ?>

                  
                 
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="main-register__description">
              <h1>
                <?php echo $title_info?>
              </h1>

              <div class="main-register__txt">
                  <?php echo $description_info?>
              </div>
            </div>
          </div>

        </div>
      </div>
   </div>

   
<?php
echo acf_block_after( $is_preview );


