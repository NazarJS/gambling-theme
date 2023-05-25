<?php

$card_style = get_field( 'card_style','option' );
$section_tag = get_field( 'section_tag' ) ?? 'section';
$section_title = get_field('section_title');
$section_background = get_field( 'section_background' ) ?? 'color';
$section_bg_color = get_field( 'background_color' );
$section_bg_image = get_field( 'background_image' );
$add_paddings = get_field('add_paddings');
$add_rounded_container = get_field('add_rounded_section');
$section_style_string = '';
$container_class_string = '';
$section_class_string = 'tag-block';
$sec_tag_title = get_field('sec_tag_title');

if ( !empty($card_style) ) {
  $container_class_string="round-container";
}
if ( !empty($add_paddings) ) {
  foreach ($add_paddings as $class) {
    $section_class_string .= ' '.$class;
  }
}

if ( ! empty( $section_bg_color ) || ! empty( $section_bg_image ) ) {
	switch ( $section_background ) {
		case 'color':
			$section_style_string = "style='background-color:{$section_bg_color};'";
			break;
		case 'image':
			$section_style_string = "style='background-image:url({$section_bg_image});'";
			break;
		case 'both':
			$section_style_string = "style='background:{$section_bg_color} url({$section_bg_image})'";
			break;
	}
}

$toc_settings = get_field('toc');
$section_anchor_id_string = '';
if (!empty($toc_settings['title'])) {
	$section_anchor_id_string =' id="el-'.sanitize_title($toc_settings['title']).'" ';
}

array_push($GLOBALS['toc_settings'], $toc_settings);

echo acf_block_before( 'Section (tag: '.$section_tag.')', $is_preview );
?>
<<?= $section_tag?> <?= $section_anchor_id_string?> class='<?= $section_class_string?>'  <?= $section_style_string?>>
    <div class="container <?=$container_class_string?>">

      <?php if(!empty($section_title)):?>
        <div class="tag-block__title">
        <<?= !empty($sec_tag_title) ? $sec_tag_title : 'h2'?> style="<?= !empty($section_bg_color) ? 'background-color: ' . $section_bg_color: ''; ?>"><?= $section_title; ?></<?= !empty($sec_tag_title) ? $sec_tag_title : 'h2'?>>
        </div>
      <?php endif;?>
      <InnerBlocks/>
    </div>
</<?= $section_tag?>>
<?php
echo acf_block_after( $is_preview );
