<?php
    $title = get_field( 'title' );
    $description = get_field( 'description' );
    $android_button = get_field('android_button');
    $ios_button = get_field('ios_button');
    $image = get_field('image');
    $button_install = get_field('button_install');
    $rating = get_field('rating');
    $people_counter = get_field('people_counter');
    $people_download = get_field('people_download');

    echo acf_block_before( 'Main Screen', $is_preview );
 ?>
    

    <div class="main-screen mobile-screen">
    <div class="container">
      <div class="main-screen__body">
        <div class="row">
          <div class="col-md-6">
            <div class="main-screen__wrap">
             
  
              <div class="mobile-screen__container">
                    <div class="mobile-screen__image">
                        <?php echo get_image($image)?>
                    </div>

                    <div class="mobile-screen__rating">
                        <?php if ( ! empty( $rating )): ?>
                            
                            <?php echo get_rating($rating) ?>   
                            
                        <?php endif; ?>

                       <div class="mobile-screen__wrap">
                       <?php if ( ! empty( $rating )): ?>
                            
                            <div class="mobile-screen__stat">
                              <?php echo $rating ?> / 5 
                            </div> 
                            
                            
                            <div class="mobile-screen__counter">
                            <img src="<?=IMG_DIR?>/counter-img.png" alt="alt">
                            <?php if ( ! empty( $people_counter )): ?>
                             (<?php echo $people_counter ?>)
                             <?php endif; ?>
                            </div>
                            
                        <?php endif; ?>
                       </div>
                    </div>

              </div>
                
              <div class="main-screen__btns">
                <?php if ( ! empty( $android_button['url'] ) && ! empty( $android_button['title'] ) ): ?>
                            <?php echo  get_button( $android_button['url'], $android_button['title'], 'ui-btn__icon ui-btn__android','', true ); ?>
                        <?php endif; ?>

                <?php if ( ! empty( $ios_button['url'] ) && ! empty( $ios_button['title'] ) ): ?>
                            <?php echo  get_button( $ios_button['url'], $ios_button['title'], 'ui-btn__icon ui-btn__ios','', true ); ?>
                        <?php endif; ?>
                 
              </div>

              <div class="mobile-screen__bottom">
                <?php if ( ! empty( $button_install['url'] ) && ! empty( $button_install['title'] ) ): ?>

                        <a href="<?php echo $button_install['url'] ?>" class="main-register__how-to">
                          <?php echo $button_install['title'] ?>
                        </a> 
                        
                <?php endif; ?>

                <div class="mobile-screen__status">
                <img src="<?=IMG_DIR?>/dowload-rating.png" alt="alt">
                  Downloaded: <?php echo $people_download ?>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="main-screen__info">
            
                <?php if ( ! empty( $title ) ): ?>
                    <h1>
                        <?php echo $title ?>
                    </h1>
                <?php endif; ?>

                <div class="main-screen__txt">
                    <?php echo $description ?>
                </div>
            
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<?php
echo acf_block_after( $is_preview );