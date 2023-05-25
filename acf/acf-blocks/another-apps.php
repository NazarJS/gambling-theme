<?php
echo acf_block_before( 'Another apps', $is_preview );
?>

<?php if( have_rows('another-apps') ): ?>
  <div class="another-app">
    <?php while( have_rows('another-apps') ): the_row();
      $apHeader = get_sub_field('apHeader');
      $apText = get_sub_field('apText');
      $apLogo = get_sub_field('apLogo');
      $aplLink = get_sub_field('aplLink');

      ?>
      <div class="another-app__item">
        <?php if( $apLogo ):?>
          <div class="another-app__logo">
            <?=wp_get_attachment_image( $apLogo, 'medium' );?>
          </div>
        <?php endif;?>

        <div class="another-app__description">
          <h4> <?=$apHeader?></h4>
          <p><?=$apText?></p>
          <div class="another-app__button-wrap">

            <?=get_button($aplLink['url'], $aplLink['title'], 'btn-with-back btn', 'nofollow sponsored', true);?>
          </div>
        </div>


      </div>
    <?php endwhile; ?>
  </div>

<?php endif; ?>


<?php
echo acf_block_after( $is_preview );