<?php
echo acf_block_before( 'Info block', $is_preview );
$title = get_field('info_title');
$image = get_field('info_image');
$txt = get_field('info_txt');
$infoRegister = get_field('info_register');
$infoDownload = get_field('info_download');

?>
  
  <div class="block-info">
        
    <div class="container">
        <h2 class="title-underline">
            <?= $title ?>
        </h2>

        <div class="block-info__img">
          <?php echo get_image($image)?>
        </div>

        <div class="block-info__txt">
            <?= $txt ?>
        </div>

        <div class="block-info__buttons">
          <a href="#" class="ui-btn ui-btn__register">register</a>
          <a href="#" class="ui-btn ui-btn__download">download</a>

          <?
            // echo get_button( $infoRegister['url'], $infoRegister['title'], 'ui-btn ui-btn__register', '1' );
          ?>

          <?     
            // echo get_button( $infoDownload['url'], $infoDownload['title'], 'ui-btn ui-btn__download', '2' );
          ?>
        </div>
    </div>
      
    </div>    

<?php
echo acf_block_after( $is_preview );