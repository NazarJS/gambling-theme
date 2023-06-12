<?php
$css_ver = filemtime(get_template_directory() . '/assets/dist/css/style.css');
$js_ver = filemtime(get_template_directory() . '/assets/dist/js/main.js');

function my_acf_admin_head()
{
    global $css_ver; ?>
    <link rel="stylesheet" href="<?= CSS_DIR . '/style.css?ver=' . $css_ver ?>">
    <style type="text/css">
        .wp-block {
            max-width: 100%;
        }

        .preview-block {
            padding: 5px;
            border: 1px solid #929292;
            border-radius: 5px;
        }

        .preview-block__title {
            background-color: #929292;
            padding: 5px;
            border-radius: 3px;
            color: #ffffff;
        }

        .preview-block__content {
            border: 1px solid #c8c8c8;
            border-radius: 3px;
            margin-top: 5px;
            padding: 5px;
        }

        .interface-interface-skeleton__editor {
            padding-bottom: 30px;
        }

        .block-editor-block-list__block {
            margin: 0;
        }

        <?php
          $ft_background_color = get_field('ft_background_color', 'options');
           $secondary_bg_color = get_field('secondary_bg_color', 'options') ?? '#ebebeb';
          $ft_text_color = get_field('ft_text_color', 'options');
          $h_background_color = get_field('h_background_color', 'options');
          $h_navigation_color = get_field('h_navigation_color', 'options');
          $h_text_color = get_field('h_text_color', 'options');
          $main_accent_color = get_field('main_accent_color', 'options');
          $bg_body = get_field('bg_body', 'options');
          $buttons_back = get_field('buttons_back', 'options');
          $buttons_border = get_field('buttons_border', 'options');
          $border_radius = get_field('border_radius', 'options');
          $text_body_color = get_field('text_body_color', 'options');
        ?>
       
    </style>
    <?php
}


//styles for Editor
add_action('current_screen', 'styles_for_editor');
function styles_for_editor()
{
    $screen = get_current_screen();

    if ($screen->post_type === 'page' || $screen->post_type === 'post' && $screen->is_block_editor) {
        add_action('acf/input/admin_head', 'my_acf_admin_head');
    }
}

add_action('wp_enqueue_scripts', 'add_styles_scripts');



//styles for Front end
function add_styles_scripts()
{
    global $css_ver, $js_ver;
    if (is_archive() || is_author()) {
        wp_enqueue_script('jquey', 'https://code.jquery.com/jquery-3.6.0.min.js', null, '3.6.0', true);
        wp_enqueue_script('load', JS_DIR . '/myloadmore.min.js', null, $js_ver, true);
    }
    wp_enqueue_style('main-new-css', CSS_DIR . '/style.css', null, $css_ver);
    // wp_enqueue_style('main-css', CSS_DIR . '/main.min.css', null, $css_ver);
    wp_enqueue_script('main-js', JS_DIR . '/main.js', null, $js_ver, false);
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array(), '1.0.0');

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

# Закрывает все маршруты REST API от публичного доступа
add_filter('rest_authentication_errors', function ($result) {

    if (is_null($result) && !current_user_can('edit_others_posts')) {
        return new WP_Error('rest_forbidden', 'You are not currently logged in.', ['status' => 401]);
    }

    return $result;
});

// Add async
function namespace_async_scripts($tag, $handle)
{
    // Just return the tag normally if this isn't one we want to async
    if ('comment-reply' !== $handle && 'contact-form-7' !== $handle) {
        return $tag;
    }
    return str_replace(' src', ' async src', $tag);
}

add_filter('script_loader_tag', 'namespace_async_scripts', 10, 2);