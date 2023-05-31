<?php

$title = get_field( 'title' );
$description = get_field( 'description' );
$android_button = get_field('button_android');
$ios_button = get_field('button_ios');
$image = get_field('image');

echo acf_block_before( 'MainScreen', $is_preview );

 ?>
    

<div class="main-screen">
    <div class="container">
      <div class="main-screen__body">
        <div class="row">
          <div class="col-md-6">
            <div class="main-screen__wrap">
              <div >

              <?php if ( ! empty( $title ) ): ?>
                <h1>
                    <?php echo $title ?>
                </h1>
				      <?php endif; ?>
                
              </div>
  
              <div class="main-screen__txt">
                <?php echo $description ?>
              </div>
                
              <div class="main-screen__btns">

              <?php if ( ! empty( $android_button['url'] ) && ! empty( $android_button['title'] ) ): ?>
					      <?php echo get_button( $android_button['url'], $android_button['title'], 'ui-btn__icon ui-btn__android','', true ); ?>
				      <?php endif; ?>

              <?php if ( ! empty( $ios_button['url'] ) && ! empty( $ios_button['title'] ) ): ?>
					      <?php echo  get_button( $ios_button['url'], $ios_button['title'], 'ui-btn__icon ui-btn__ios','', true ); ?>
				      <?php endif; ?>
                 
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="main-screen__image">
             <?php echo get_image($image)?>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<?php
echo acf_block_after( $is_preview );