<?php
$arRating= get_field('arRating');
$arVotes= get_field('arVotes');
$arDownloads= get_field('arDownloads');
$arReview= get_field('arReview');
$arButton= get_field('arButton');
$arTitle= get_field('arTitle');
$arMicro= get_field('arMicro');
echo acf_block_before( 'App rating', $is_preview );
?>

    <div >

      <?php  if(!empty($arMicro) ) {
        get_template_part('ld+json/Rating');
      } ?>


      <div class="app-rating-block">
      <div class="app-rating-block__item">
        <h3 style=" margin:10px;">  <?=$arTitle?></h3>
      </div>


      </div>
      <div class="app-rating-block" style="margin-bottom: 10px;">
        <div class="app-rating-block__item">
          <div class="app-rating-block__number">
            <?=$arRating?>
          </div>
        </div>
        <div class="app-rating-block__item">
          <div class="app-rating__votes">
            <svg width="10" height="11" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M2.5 2.60526C2.5 4.04163 3.62167 5.21053 5 5.21053C6.37833 5.21053 7.5 4.04163 7.5 2.60526C7.5 1.16889 6.37833 0 5 0C3.62167 0 2.5 1.16889 2.5 2.60526ZM9.44444 11H10V10.4211C10 8.18689 8.255 6.36842 6.11111 6.36842H3.88889C1.74444 6.36842 0 8.18689 0 10.4211V11H9.44444Z"
                    fill="black"></path>
            </svg>
            (<?=$arVotes?>)
          </div>
          <div class="app-download__count">
            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M5.89893 8.53977C5.91094 8.55607 5.92627 8.56925 5.94379 8.57832C5.9613 8.58738 5.98052 8.59209 6 8.59209C6.01948 8.59209 6.0387 8.58738 6.05621 8.57832C6.07372 8.56925 6.08906 8.55607 6.10107 8.53977L7.89786 6.12443C7.96364 6.0358 7.90428 5.90455 7.79679 5.90455H6.60802V0.136364C6.60802 0.0613636 6.55027 0 6.47968 0H5.51711C5.44652 0 5.38877 0.0613636 5.38877 0.136364V5.90284H4.20321C4.09572 5.90284 4.03636 6.03409 4.10214 6.12273L5.89893 8.53977ZM11.8717 7.94318H10.9091C10.8385 7.94318 10.7807 8.00455 10.7807 8.07955V10.7045H1.21925V8.07955C1.21925 8.00455 1.1615 7.94318 1.09091 7.94318H0.128342C0.057754 7.94318 0 8.00455 0 8.07955V11.4545C0 11.7563 0.229412 12 0.513369 12H11.4866C11.7706 12 12 11.7563 12 11.4545V8.07955C12 8.00455 11.9422 7.94318 11.8717 7.94318Z"
                    fill="black"></path>
            </svg>
            Downloaded: <?=$arDownloads?>
          </div>
          <div class="app-rating-block__stars">
            <span>☆ ☆ ☆ ☆ ☆</span>
            <span style="width:<?=$arRating*20?>%">★ ★ ★ ★ ★</span>
          </div>
        </div>
        <div class="app-rating-block__item">

        </div>


      </div>
      <div class="app-rating-block">
        <div class="app-rating-block__item">
          <?php  if( $arButton ):
            $link_url = $arButton['url'];
            $link_title = $arButton['title'];
            $link_target = $arButton['target'] ? $arButton['target'] : '_self';
            ?>
            <a href="<?=$arButton['url']?>"><?=$arButton['title']?></a>


          <?php endif; ?>
        </div>
        <div class="app-rating-block__item">

          <?php  if( $arReview ):
            $link_url = $arReview['url'];
            $link_title = $arReview['title'];
            $link_target = $arReview['target'] ? $arReview['target'] : '_self';
            ?>

            <a href="<?=$arReview['url']?>"><?=$arReview['title']?></a>

          <?php endif; ?>
        </div>




      </div>

    </div>
    <!-- /.container -->



<?php
echo acf_block_after( $is_preview );