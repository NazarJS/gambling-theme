
<?php


$custom_code_css = get_field('custom_code_css', 'options');
$main_colors = get_field('main_colors', 'options');
$header_colors = get_field('header_colors', 'options');
$footer_colors = get_field('footer_colors', 'options');
$links_color = get_field('link_colors', 'options');

$first_header_button = get_field('first_header_button_color', 'options');
$second_header_button = get_field('second_header_button_color', 'options');

$first_header_button_arr = [
    'color_bg' => $first_header_button['color_bg'] ?? '#ffffff',
    'color_bg_hover' => $first_header_button['color_bg_hover'] ?? '#efefef',
    'color_text' => $first_header_button['color_text'] ?? '#1b96f3',
    'color_border' => $first_header_button['color_border'] ?? '#e3e3e3',
    'color_border_hover' => $first_header_button['color_border_hover'] ?? '#efefef',
];
$second_header_button_arr = [
    'color_bg' => $second_header_button['color_bg'] ?? '#ffffff',
    'color_bg_hover' => $second_header_button['color_bg_hover'] ?? '#efefef',
    'color_text' => $second_header_button['color_text'] ?? '#1b96f3',
    'color_border' => $second_header_button['color_border'] ?? '#e3e3e3',
    'color_border_hover' => $second_header_button['color_border_hover'] ?? '#efefef',
];

$main_colors_arr = [
    'bg' => $main_colors['bg_color'] ?? '#efefef',
    'accend_color' => $main_colors['accent__color'] ?? '#1b96f3',
    'text_color_dark' =>$main_colors['text_color_dark'] ?? '#000',
    'text_color_light' => $main_colors['text_color_light'] ?? '#ffffff',
];

$header_colors_arr = [
    'bg_color' => $header_colors['bg_color'] ?? '#1b96f3',
    'text_color' => $header_colors['text_color'] ?? '#000',
    'hover_nav_color' => $header_colors['hover_nav_color'] ?? '#1e73be',
    'hover_nav_bg_color' => $header_colors['hover_nav_bg_color'] ?? '#1e73be',
];
$footer_colors = [
    'bg_color' => $footer_colors['bg_color'] ?? '#1b96f3',
    'text_color' => $footer_colors['text_color'] ?? '#fff',
];

$link_colors_arr = [
    'link_color' => $links_color['link_color'] ?? '#1b96f3',
    'link_color_hover' => $links_color['link_color_hover'] ?? '#000',
];


$button_android = get_field('button_android', 'options');
$button_ios = get_field('button_ios', 'options');
$button_register = get_field('button_register', 'options');
$button_download = get_field('button_download', 'options');

$b_font_size = get_field('b_font_size', 'options') ?? '15';


$bg_body = get_field('bg_body', 'options') ?? '#f8f8fa';
$buttons_back = get_field('buttons_back', 'options');
$buttons_border = get_field('buttons_border', 'options');
$border_radius = get_field('border_radius', 'options') ?? '0';
$review_bg_color = get_field('review_bg_color', 'options') ?? '#1d2730';
$review_progress_bar = get_field('review_progress_bar', 'options') ?? '#e6b900';
$review_text_progress_bar = get_field('review_text_progress_bar', 'options') ?? '#ffffff';

?>
<style>

    :root {
        /* footer */
        --bg-footer: <?= $footer_colors['bg_color']?>;
        --ft_text_color: <?= $footer_colors['text_color']?>;
         /* Header */
         --color-menu: <?= $header_colors_arr['text_color']?>;
        --bg-header: <?= $header_colors_arr['bg_color']?>;

        /* Links */
        --link_color: <?= $link_colors_arr['link_color']; ?>;
        --link_hover: <?= $link_colors_arr['link_color_hover']; ?>;
        /* Main colors */
        --body-bg-color: <?= $main_colors_arr['bg']?>;
        --color-primary: <?= $main_colors_arr['accend_color']?>;
        --color-txt-dark: <?= $main_colors_arr['text_color_dark']?>;
        --color-txt-white: <?= $main_colors_arr['text_color_light']?>;

        
        /* Border */
        --border-radius: <?= $border_radius?>px;
       

        /* Buttons */
        --b-font-size: <?= $b_font_size; ?>px;
        --btn-back-text-color: <?= !empty($buttons_back['text_color']) ? $buttons_back['text_color'] : '#FFFFFF'?>;
        --btn-back-color: <?= !empty($buttons_back['background_color']) ? $buttons_back['background_color'] : '#33B63C'?>;
        --btn-back-hover-bg-color: <?= !empty($buttons_back['hover_background_color']) ? $buttons_back['hover_background_color'] : '#15851d'?>;
        --btn-back-hover-text-color: <?= !empty($buttons_back['hover_text_color']) ? $buttons_back['hover_text_color'] : '#ffffff'?>;
        --btn-border-color: <?= !empty($buttons_border['border_color']) ? $buttons_border['border_color'] : '#ffffff'?>;
        --btn-border-hover-color: <?= !empty($buttons_border['hover_border_color']) ? $buttons_border['hover_border_color'] : '#33B63C'?>;
        --btn-border-hover-text-color: <?= !empty($buttons_border['hover_text_border_color']) ? $buttons_border['hover_text_border_color'] : '#ffffff'?>;

        /* button android */
        --btn-color-android: <?= !empty($button_android['text_color']) ? $button_android['text_color'] : '#ffffff'?>;
        --btn-bg-android:<?= !empty($button_android['bg_color']) ? $button_android['bg_color'] : '#000000'?>;
        --btn-svg-android:<?= !empty($button_android['svg_color']) ? $button_android['svg_color'] : '#7CB342'?>;

        /* button ios */
        --btn-color-ios: <?= !empty($button_ios['text_color']) ? $button_ios['text_color'] : '#ffffff'?>;
        --btn-bg-ios:<?= !empty($button_ios['bg_color']) ? $button_ios['bg_color'] : '#2D7CF2'?>;
        --btn-svg-ios:<?= !empty($button_ios['svg_color']) ? $button_ios['svg_color'] : '#ffffff'?>;

        /* button register */
        --btn-color-register: <?= !empty($button_register['text_color']) ? $button_register['text_color'] : '#EDF2FA'?>;
        --bg-color-register:<?= !empty($button_register['bg_color']) ? $button_register['bg_color'] : '#2D7CF2'?>;

        /* button download  */
        --btn-color-download: <?= !empty($button_download['text_color']) ? $button_download['text_color'] : '#2D7CF2'?>;
        --bg-color-download:<?= !empty($button_download['bg_color']) ? $button_download['bg_color'] : '#EDF2FA'?>;
   


        --btn_header_first_color_bg: <?=$first_header_button_arr['color_bg']?>;
        --btn_header_first_color_bg_hover: <?=$first_header_button_arr['color_bg_hover']?>;
        --btn_header_first_color_text: <?=$first_header_button_arr['color_text']?>;
        --btn_header_first_color_border: <?=$first_header_button_arr['color_border']?>;
        --btn_header_first_color_border_hover: <?=$first_header_button_arr['color_border_hover']?>;

        --btn_header_second_color_bg: <?=$second_header_button_arr['color_bg']?>;
        --btn_header_second_color_bg_hover: <?=$second_header_button_arr['color_bg_hover']?>;
        --btn_header_second_color_text: <?=$second_header_button_arr['color_text']?>;
        --btn_header_second_color_border: <?=$second_header_button_arr['color_border']?>;
        --btn_header_second_color_border_hover: <?=$second_header_button_arr['color_border_hover']?>;

        /* Buttons */
        --review-bg-color: <?= $review_bg_color?>;
        --review-progress-bar: <?= $review_progress_bar?>;
        --review-text: <?= $review_text_progress_bar?>;
    }

    <?php if(!empty($custom_code_css)): ?>
    <?= $custom_code_css; ?>
    <?php endif;?>
</style>


<?php
if (get_field('enable_google_fonts', 'options')) {
    ?>
    <style>
        <?php
        the_field('import_string', 'options');
        ?>


        body {
        <?php  the_field('font_family', 'options');?>
        }

        body a, body .btn, body .button {
        <?php the_field('font_family', 'options');?>
        }
    </style>
    <?php
}
?>


<?php
echo "<meta name='theme-color' content=" . $main_colors_arr['accend_color'] . ">";