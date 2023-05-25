<?php
$downloadPlatform= get_field('DownloadPlatform');
$downloadLink= get_field('DownloadLink');
$DownloadCardStyleBlock= get_field('DownloadCardStyleBlock');
$classString='';
if ( !empty($DownloadCardStyleBlock) ) {
  $classString="card-style-block";
}
echo acf_block_before( 'Download App '.$downloadPlatform, $is_preview );
?>




  <div class="app-platform-download <?=$classString?>">
    <div class="app-platform-download__icon ">
      <?php if($downloadPlatform=="ios"):?>
      <img src="<?=IMG_DIR?>/icon/ios.png" alt="">
      <?php endif;?>
      <?php if($downloadPlatform=="android"):?>
        <img src="<?=IMG_DIR?>/icon/android.png" alt="">
      <?php endif;?>

    </div>
    <div class="app-platform-download__button-wrap">

      <?php
      $link = get_field('link');
      if( $link ):
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
       <?php endif; ?>


      <?php





      if( $downloadLink ):
        $link_url = $downloadLink['url'];
        $link_title = $downloadLink['title'];
        $link_target = $downloadLink['target'] ? $downloadLink['target'] : '_self';
        $link_title = !empty($link_title) ? $link_title : 'Download';
        ?>

        <?= get_button($link_url, $link_title, 'download-button button', 'nofollow sponsored',true); ?>


      <?php endif; ?>


    </div>
  </div>


<?php
echo acf_block_after( $is_preview );