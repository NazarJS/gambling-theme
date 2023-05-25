<?php
// $main_title       = get_field( 'main_title' );
// //$description      = get_field( 'description' );
// $main_image       = get_field( 'main_image' );
// $steps            = get_field( 'steps' );
// $enable_microdata = get_field( 'enable_microdata' ) ?? false;

$title = get_field( 'title' );
$txt = get_field( 'txt' );
$android_button = get_field('button_android');
$image = get_field('image');

echo acf_block_before( 'MainScreen', $is_preview );

 ?>
    

<div class="main-screen">
    <div class="container">
      <div class="main-screen__body">
        <div class="row">
          <div class="col-md-6">
            <div class="main-screen__wrap">
              <div class="main-screen__info">
                <h1>
                    <? echo $title ?>
                </h1>
              </div>
  
              <div class="main-screen__txt">
                <? echo $txt;
                 ?>
              </div>
                
              <div class="main-screen__btns">
                <!-- <a href="#" class="ui-btn__icon ui-btn__android">
                  <img src="./images/flat-color-icons_android-os.png" alt="alt">
  
                  <span class="ui-btn__name">
                    Download
  
                    <span class="ui-btn__subtitle">
                      for Android
                    </span>
                  </span>
                </a>
  
                <a href="#" class="ui-btn__icon ui-btn__ios">
                  <img src="./images/Icons.png" alt="alt">
  
                  <span class="ui-btn__name">
                    Download
  
                    <span class="ui-btn__subtitle">
                      for IOS
                    </span>
                  </span>
                </a> -->

                <?
                  echo get_button( $android_button['url'], $android_button['title'], 'ui-btn__icon ui-btn__android', '' );
                 ?>

                
              </div>

              <?php

                // if ( ! empty( $first_header_button['url'] ) || ! empty( $first_header_button['title'] ) ) {
            
                // }

                // if ( ! empty( $second_header_button['url'] ) || ! empty( $second_header_button['title'] ) ) {
                // echo get_button( $second_header_button['url'], $second_header_button['title'], ' ui-btn__download ui-btn ', 'download' );
                // }

              ?>
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