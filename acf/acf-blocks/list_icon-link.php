<?php
$list_icon_link = get_field('list_icon_link');
$style_list = get_field('style_list');
$type_card = get_field('type_card');
$button_card = get_field('button_card');
$display_flex = get_field('display_flex');

echo acf_block_before( 'List "Icon + Link"', $is_preview );
?>
<?php if($type_card === 'list'): ?>
<div class="list-IL <?= !$display_flex ? $style_list['width_list'] : $style_list['width_list'].'-list'?>">
  <ul>
    <?php foreach ($list_icon_link as $list):?>
    <li class="list-IL__item" <?= !empty($style_list['color_list']) ? 'style="background-color: '.$style_list['color_list'].'"': ''; ?>>
    <?php if(!empty($list['link'])):?>
      <a href="<?= $list['link']?>" class="list-IL__link">
        <?= get_image($list['icon'])?>
        <span><?= $list['text']?></span>
      </a>
    <?php else:?>
      <?= get_image($list['icon'])?>
      <span><?= $list['text']?></span>
    <?php endif;?>
    </li>
    <?php endforeach;?>
  </ul>
</div>
<?php else:?>
    <div class="cards <?= $style_list['width_list']?>">
      <ul class="cards__list">
        <?php foreach ($list_icon_link as $list):?>
          <li class="cards__item" <?= !empty($style_list['color_list']) ? 'style="background-color: '.$style_list['color_list'].'"': ''; ?>>
            <a href="<?= $list['link']?>"><?= get_image($list['icon'])?><span><?= $list['text']?></span></a>
          </li>
        <?php endforeach;?>
      </ul>
      <?php if(!empty($button_card['text'])):?>
        <a href="<?= $button_card['link']?>" class="cards__btn-more" style="<?= $button_card['button_align'] === 'center' ? '' : 'margin-'.$button_card['button_align'].': 0;' ;?>"><?= $button_card['text']?></a>
      <?php endif;?>
    </div>
<?php endif;?>
<?php
echo acf_block_after( $is_preview );