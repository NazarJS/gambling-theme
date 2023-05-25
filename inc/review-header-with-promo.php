<?php

$page_id = get_queried_object();
$title_page = get_field('title_page', $page_id);
$review_logo = get_field('review_logo', $page_id);
$button = get_field('button', $page_id);
$rating_table = get_field('rating_table',  $page_id);
$review_rating = get_field('review_rating', $page_id);
$bonus = get_field('bonus', $page_id);
$name_group_pc = get_field('pros_cons_group', $page_id);
$enable_cards_pc = get_field('enable_cards_pc', $page_id);
$enable_mobile_apps = get_field('enable_mobile_apps', $page_id);
$rev_mobile_apps = get_field('rev_mobile_apps', $page_id);
$review_bg_image = !empty(get_field('review_bg_image', $page_id)) ? 'style="background-image: url('. get_field('review_bg_image', $page_id) . ')"' : '';
$review_bg_logo = !empty(get_field('review_bg_logo', $page_id)) ? 'style="background-color: '. get_field('review_bg_logo', $page_id) . '"' : '';
$bg_image_logo = !empty(get_field('bg_image_logo', 'option')) ? 'style="background-image: url('.get_field('bg_image_logo', 'option').')"' : '';
$rev_mob_apps_link = get_field('rev_mob_apps_link', $page_id);
$link_for_mobile = get_field('link_for_mobile', 'options');
$rev_m_text = get_field('rev_m_text', $page_id) ?? '';
$rev_m_link = get_field('rev_m_link', $page_id) ?? '';
$rev_dark_bg = get_field('rev_dark_bg', $page_id) ? 'dark-bg' : '';

$rev_promo_label = get_field('rev_promo_label', $page_id);
$rev_promo_label_sub = get_field('rev_promo_label_sub', $page_id);
$rev_promo_code = get_field('rev_promo_code', $page_id);
$rev_promo_text = get_field('rev_promo_text', $page_id);

?>
<style>
  <?php if(!empty($rating_table)):?>
  <?php foreach ($rating_table as $key => $rating):?>
  .review-page__rating .progress-bar__progress.svg-<?= $key?> {
      stroke-dashoffset: <?= 80 - $rating['rating'] * 8;?>;
  }
  <?php endforeach;?>
  <?php endif;?>
  .review-page__rating .progress-bar__progress.svg-overall {
      stroke-dashoffset: <?= 90 - $review_rating * 9;?>;
  }
</style>
<script>
    var bonusCode = '<?php echo $rev_promo_code ?>';
</script>






<section class="p-b  <?= $rev_dark_bg; ?>" <?=  $review_bg_image;?>>

  <section class="bg-graphit">

    <div class="container p-b__grid">
      <div class="p-b__left-side promotional">
        <h1 class="promotional__h1">

          <?php if($rev_promo_label){
            echo $rev_promo_label;
          }else{
            echo  $title_page.' for India';
          }
            ?>
        </h1>


          <p class="promotional__subtext"> <?=$rev_promo_label_sub;?></p>


        <div class="review_field">

          <div class="review_field__bonus-hide" id="inputWrapper">

            <?php if(empty($rev_promo_code)):?>
              <p class="review_field__bonus-text ">Click to see</p>
              <?php
              echo get_button($button['link'], "∗∗∗∗∗∗∗", 'review_field__input')
              ?>

            <?php endif;?>
            <?php if(!empty($rev_promo_code)):?>

              <input   class="review_field__input" id="copyTarget" type="text" value="<?=$rev_promo_code?>" disabled>
              <button class="review_field__button"  id="copyBonusToBuffer">Copy</button>
            <?php endif;?>


          </div>

          <div class="review_field__button-group">

            <?php if(!empty($button)):?>
              <div>
                <?php

                echo get_button($button['link'], 'Get up', 'review_field__button--big')
                ?>
              </div>
            <?php endif;?>



          </div>

        </div>

      </div>
      <div class="p-b__right-side">
        <div <?= !empty($bg_image_logo) ? $bg_image_logo : $review_bg_logo; ?>>
          <?= get_image($review_logo);?>
        </div>
      </div>
      <div class="p-b__bottom-side">
        <div class="get-bonus">
            <p class="get-bonus__text">
              <?=$rev_promo_text?>

            </p>
          <div class="get-bonus__button">

              <?php if(!empty($button)):?>
                <div>
                  <?php
                  $text = !empty($button['text']) ? $button['text'] : 'Bet now';
                  echo get_button($button['link'], $text, 'link-button btn btn-with-back btn-big-text review-table__b-link')
                  ?>
                </div>
              <?php endif;?>





          </div>
        </div>

      </div>

    </div>

    <!-- /.container -->
  </section>


</section>
<?php if(!empty($name_group_pc) && $enable_cards_pc) : ?>
<div class="pc-cards">
  <div class="container">
    <?php foreach ($name_group_pc as $card): ?>
      <div>
        <?php if($card['icon']): ?>
          <?= get_image($card['icon']); ?>
        <?php endif;?>
        <?php if($card['name']): ?>
          <span><?= $card['name']?></span>
        <?php endif;?>
        <?php if(!empty($card['pros'])):?>
          <ul class="pros">
            <?php foreach ($card['pros'] as $pros):?>
              <li><?= $pros['point']?></li>
            <?php endforeach;?>
          </ul>
        <?php endif;?>
        <?php if(!empty($card['cons'])):?>
          <ul class="cons">
            <?php foreach ($card['cons'] as $cons):?>
              <li><?= $cons['point']?></li>
            <?php endforeach;?>
          </ul>
        <?php endif;?>
      </div>
    <?php endforeach;?>
  </div>
</div>
<?php endif;?>
<?php

wp_enqueue_script( 'review-page-script', JS_DIR . '/review.min.js',null, '1.0',true );

?>



