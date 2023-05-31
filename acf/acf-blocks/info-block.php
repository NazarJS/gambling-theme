<?php
  echo acf_block_before( 'Info block', $is_preview );
  $title = get_field('info_title');
  $image = get_field('info_image');
  $txt = get_field('info_description');
  $infoRegister = get_field('info_register');
  $infoDownload = get_field('info_download');
  $reverseBg = get_field('boolean');
?>
  
  <div class="block-info <?php if ( $reverseBg == true ): ?> block-info--primery
    <?php endif; ?>">
        
        <?php if ( ! empty( $title ) ): ?>
          <h2 class="title-underline">
            <?php echo $title ?>
          </h2>
        <?php endif; ?>


        <InnerBlocks/>

    
      
  </div>    

<?php
echo acf_block_after( $is_preview );