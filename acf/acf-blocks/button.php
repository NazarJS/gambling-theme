<?php

$button_url = get_field('link');
$button_title = get_field('title');
$align = get_field('align') ?? 'left';
$align_class = "align-{$align}";
$add_nofollow = get_field('add_nofollow') ? "nofollow" : '';
$type_of_button = get_field('type_of_button');

$is_custom_colors = get_field('custom_colors');
$custom_colors_string = '';
if ($is_custom_colors) {
    $background_color = get_field('background_color');
    $text_color = get_field('text_color');
    $border_color = get_field('border_color');

    $custom_colors_string = "<style>.content-button__control{background:{$background_color};color:{$text_color};border:1px solid {$border_color};}</style>";
}

echo acf_block_before('Button', $is_preview);
?>
<div class="content-button <?= $align_class ?>">
  <?= $custom_colors_string ?>
  <?= get_button($button_url, $button_title, 'content-button__control btn btn-big-text ' . $type_of_button, $add_nofollow)?>
</div>
<?php
echo acf_block_after($is_preview);