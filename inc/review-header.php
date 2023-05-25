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
<section class="review-page <?= $rev_dark_bg; ?>" <?=  $review_bg_image;?>>
  <div class="container">
    <?php if(!empty($title_page)):?>
      <h1><?= $title_page; ?></h1>
    <?php endif;?>
    <div class="review-page__wrap" <?= ($enable_cards_pc && !empty($name_group_pc)) ? 'style="margin-bottom: 160px;"' : '';?>>
      <div>
        <div class="review-page__logo">
          <div <?= !empty($bg_image_logo) ? $bg_image_logo : $review_bg_logo; ?>>
            <?= get_image($review_logo);?>
          </div>
        </div>
        <div class="review-page__rating">
          <?php if(!empty($rating_table)):?>
            <?php foreach ($rating_table as $rating):?>
              <div data-pct="<?= $rating['rating'] * 10?>">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="-1 -1 34 34">
                  <circle cx="16" cy="16" r="12.7324" class="progress-bar__background" />
                  <circle cx="16" cy="16" r="12.7324" class="progress-bar__progress js-progress-bar" />
                </svg>
                <p><?= $rating['title'];?></p>
              </div>
            <?php endforeach; ?>
          <?php endif;?>
          <div data-pct="<?= $review_rating * 10?>" class="review-page__overall-rating">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="-1 -1 34 34">
              <circle cx="16" cy="16" r="14.3239" class="progress-bar__background" />
              <circle cx="16" cy="16" r="14.3239" class="progress-bar__progress js-progress-bar" />
            </svg>
          </div>
        </div>
      </div>
      <div>
        <?php if(!empty($button)):?>
        <div>
          <?php
          $text = !empty($button['text']) ? $button['text'] : 'Bet now';
          echo get_button($button['link'], $text, 'btn btn-with-back btn-big-text review-page__link-bonus')
          ?>
        </div>
        <?php endif;?>
        <?php if($bonus['text']): ?>
          <div class="review-page__bonus">
            <?php if($bonus['link']): ?>
              <a href="<?= $bonus['link']; ?>"><p>BONUS: <?= $bonus['text']; ?></p></a>
            <?php else: ?>
              <p>BONUS: <?= $bonus['text']; ?></p>
            <?php endif;?>
          </div>
        <?php endif;?>
        <?php if($enable_mobile_apps): ?>
          <div class="review-page__mobile">
            <?php if(!empty($rev_mob_apps_link)): ?>
              <a href="<?= $rev_mob_apps_link?>">
            <?php endif;?>
            <p>Mobile Apps
            <?php foreach ($rev_mobile_apps as $app):?>
            <?php if($app === 'android'): ?>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 42 48" version="1.1">
                  <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Social-Icons---Isolated" transform="translate(-391.000000, -1287.000000)">
                      <path d="M417.727009,1296.6009 C416.935377,1296.6009 416.294532,1295.97719 416.294532,1295.20673 C416.294532,1294.43626 416.935377,1293.81538 417.727009,1293.81538 C418.518641,1293.81538 419.159486,1294.43626 419.159486,1295.20673 C419.159486,1295.97719 418.518641,1296.6009 417.727009,1296.6009 L417.727009,1296.6009 Z M406.272991,1296.6009 C405.481359,1296.6009 404.840514,1295.97719 404.840514,1295.20673 C404.840514,1294.43626 405.481359,1293.81538 406.272991,1293.81538 C407.064623,1293.81538 407.705468,1294.43626 407.705468,1295.20673 C407.705468,1295.97719 407.064623,1296.6009 406.272991,1296.6009 L406.272991,1296.6009 Z M418.573737,1291.01856 C422.62179,1292.85582 425.362055,1296.33562 425.362055,1300.31777 L398.637945,1300.31777 C398.637945,1296.33562 401.37821,1292.85582 405.429163,1291.01856 L404.892709,1290.23398 L404.359155,1289.46069 L403.170257,1287.72221 C403.025269,1287.50772 403.086164,1287.21985 403.303645,1287.07874 C403.524027,1286.93763 403.819801,1286.99408 403.967688,1287.20856 L405.243579,1289.07123 L405.780033,1289.85298 L406.322287,1290.64885 C408.047639,1289.99692 409.973074,1289.63285 412,1289.63285 C414.029826,1289.63285 415.952361,1289.99692 417.677713,1290.64885 L418.222867,1289.85298 L420.038111,1287.20856 C420.180199,1286.99408 420.478873,1286.93481 420.696355,1287.07874 C420.916736,1287.21985 420.97763,1287.50772 420.829743,1287.72221 L419.640845,1289.46069 L419.107291,1290.23398 L418.573737,1291.01856 Z M398.843828,1302.17478 L425.362055,1302.17478 L425.362055,1322.61329 C425.362055,1324.23606 424.010771,1325.55686 422.340514,1325.55686 L420.157001,1325.55686 C420.232394,1325.80239 420.275891,1326.05921 420.275891,1326.33015 L420.275891,1332.21447 C420.275891,1333.75258 418.991301,1335 417.408036,1335 C415.827672,1335 414.545982,1333.75258 414.545982,1332.21447 L414.545982,1326.33015 C414.545982,1326.05921 414.586578,1325.80239 414.659072,1325.55686 L409.340928,1325.55686 C409.413422,1325.80239 409.456918,1326.05921 409.456918,1326.33015 L409.456918,1332.21447 C409.456918,1333.75258 408.172328,1335 406.591964,1335 C405.011599,1335 403.727009,1333.75258 403.727009,1332.21447 L403.727009,1326.33015 C403.727009,1326.05921 403.767606,1325.80239 403.842999,1325.55686 L401.662386,1325.55686 C399.992129,1325.55686 398.637945,1324.23606 398.637945,1322.61329 L398.637945,1302.17478 L398.843828,1302.17478 Z M393.864954,1302.17478 C395.445319,1302.17478 396.727009,1303.42221 396.727009,1304.96031 L396.727009,1316.88418 C396.727009,1318.42229 395.445319,1319.66971 393.864954,1319.66971 C392.28169,1319.66971 391,1318.42229 391,1316.88418 L391,1304.96031 C391,1303.42221 392.28169,1302.17478 393.864954,1302.17478 Z M430.137945,1302.17478 C431.71831,1302.17478 433,1303.42221 433,1304.96031 L433,1316.88418 C433,1318.42229 431.71831,1319.66971 430.137945,1319.66971 C428.554681,1319.66971 427.272991,1318.42229 427.272991,1316.88418 L427.272991,1304.96031 C427.272991,1303.42221 428.554681,1302.17478 430.137945,1302.17478 Z" id="Android"/>
                    </g>
                  </g>
                </svg>
            <?php endif;?>
              <?php if($app === 'ios'): ?>
                <svg xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24">
                  <path d="M12.152 6.896c-.948 0-2.415-1.078-3.96-1.04-2.04.027-3.91 1.183-4.961 3.014-2.117 3.675-.546 9.103 1.519 12.09 1.013 1.454 2.208 3.09 3.792 3.039 1.52-.065 2.09-.987 3.935-.987 1.831 0 2.35.987 3.96.948 1.637-.026 2.676-1.48 3.676-2.948 1.156-1.688 1.636-3.325 1.662-3.415-.039-.013-3.182-1.221-3.22-4.857-.026-3.04 2.48-4.494 2.597-4.559-1.429-2.09-3.623-2.324-4.39-2.376-2-.156-3.675 1.09-4.61 1.09zM15.53 3.83c.843-1.012 1.4-2.427 1.245-3.83-1.207.052-2.662.805-3.532 1.818-.78.896-1.454 2.338-1.273 3.714 1.338.104 2.715-.688 3.559-1.701"/>
                </svg>
              <?php endif;?>
            <?php endforeach;?>
            </p>
                <?php if(!empty($rev_mob_apps_link)): ?>
                  </a>
                <?php endif;?>
          </div>
        <?php endif;?>
      </div>
    </div>
    <?php if(!$link_for_mobile && $rev_m_link !== ''): ?>
      <div class="mobile-version">
        <?= get_button($rev_m_link, $rev_m_text, 'btn btn-with-back', 'nofollow sponsored')?>
      </div>
    <?php endif;?>
  </div>
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