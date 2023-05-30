<?php

require_once 'acf-block-wrapper.php';

add_action( 'acf/init', function () {
	if ( function_exists( 'acf_register_block_type' ) ) {
		acf_register_block_type( [
			'name'            => 'wrapper',
			'title'           => 'Section',
			'description'     => 'Section',
			'category'        =>  'theme-category',
			'render_template' => get_template_directory() . '/acf/acf-blocks/section.php',
			'icon'            => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 15 15"><path fill="#000" fill-rule="evenodd" d="M2 1.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM2 5v5h11V5H2Zm0-1a1 1 0 0 0-1 1v5c0 .6.4 1 1 1h11c.6 0 1-.4 1-1V5c0-.6-.4-1-1-1H2Zm-.5 10a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1ZM4 1.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM3.5 14a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1ZM6 1.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM5.5 14a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1ZM8 1.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM7.5 14a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1ZM10 1.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM9.5 14a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1ZM12 1.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM11.5 14a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1ZM14 1.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM13.5 14a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1Z" clip-rule="evenodd"/></svg>',
			'mode'            => 'preview',
			'supports'        => [
				'align' => false,
				'jsx'   => true
			]
		] );
		acf_register_block_type( [
			'name'            => 'button',
			'title'           => 'Button',
			'description'     => 'Button',
			'category'        =>  'theme-category',
			'render_template' => get_template_directory() . '/acf/acf-blocks/button.php',
			'icon'            => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><path d="M32 12c1.5 0 3 1.1 3 4.1V26c0 1.5 1.4 2.1 2 2.3l6.8 2.5a6.3 6.3 0 0 1 3.9 7.4l-3.2 10.4c-.2.8-.9 1.4-1.8 1.4H26.6c-.8 0-1.5-.4-1.8-1.1l-6.4-15c-.5-1-.2-1.7.8-2.3 1.8-1.3 4.5 0 5.6 2l1.6 2.1c.7 1.3 2.6 1.3 2.6-.5v-19c0-3 1.5-4.2 3-4.2ZM46 2a4 4 0 0 1 4 4v15c0 1.9-1.8 4-4 4h-6c-1 0-1-.8-1-1v-8.5c0-3.8-2-7.5-7-7.5s-7 3.2-7 7.5v8.6c0 .3-.3.9-1 .9H6a4 4 0 0 1-4-4V6a4 4 0 0 1 4-4Z"/></svg>',
			'mode'            => 'preview'
		] );
		acf_register_block_type( [
			'name'            => 'description-block',
			'title'           => 'Description Block',
			'description'     => 'Description Block',
			'category'        =>  'theme-category',
			'render_template' => get_template_directory() . '/acf/acf-blocks/description-block.php',
			'icon'            => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M2.9 2.9A3 3 0 0 1 5 2h14a3 3 0 0 1 3 3v14a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V5c0-.8.3-1.6.9-2.1ZM13 20h6a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1h-6v16ZM11 4v16H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h6Z" clip-rule="evenodd"/></svg>',
			'mode'            => 'preview',
			'supports' => [
				'align' => false,
				'jsx' => true,
				'multiple' => false
			]
		] );
		acf_register_block_type( [
			'name'            => 'review-block',
			'title'           => 'Review Block',
			'description'     => 'Review Block',
			'category'        =>  'theme-category',
			'render_template' => get_template_directory() . '/acf/acf-blocks/review-block.php',
			'icon'            => '<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 210 256"><path d="M174.55 144.5c-1.4-4-5-6.5-9.2-6.5H159V23c0-11.708-9.292-21-21-21H25C12.57 2 2 12.57 2 25v183c0 11.9 10.95 22 22.75 22h114.213c1.207 0 2.27.984 2.18 2.188-.095 1.266-1.153 1.812-2.393 1.812h-45.5L128 254h80l-33.45-109.5zm-92.5 75.7c-3.199 0-5.599-2.399-5.6-5.598-.001-3.045 2.557-5.602 5.602-5.602 3.199.001 5.598 2.401 5.598 5.6-.1 3.2-2.4 5.6-5.6 5.6zM144 138h-19.65c-5.3 0-9.8 4.7-9.8 10s4.5 10 9.8 10h19.8v42H18V31h126v107zm-21.691-50.375v31.221c0 4.652-4.445 9.097-9.097 9.097H85.92c-5.686 0-10.286-.724-15.61-2.584-1.654-.569-6.513-2.584-6.513-2.584v-36.39L85.248 61.16l1.964-11.217h3.877c4.342 0 7.34 3.463 7.34 7.753v2.429c0 5.531-.31 11.113-.982 16.592l-.207 1.809h15.972c4.652.001 9.097 4.446 9.097 9.099zm-83.22 39.025h19.487V82.456H39.089v44.194z"/></svg>',
			'mode'            => 'preview',
			'supports' => [
				'align' => false,
				'jsx' => true,
				'multiple' => false
			]
		] );
		acf_register_block_type( [
			'name'            => 'howto',
			'title'           => 'HowTo',
			'description'     => 'HowTo',
			'category'        =>  'theme-category',
			'render_template' => get_template_directory() . '/acf/acf-blocks/howto.php',
			'icon'            => 'feedback',
			'mode'            => 'preview',
		] );
		acf_register_block_type( [
			'name'            => 'list_icon-link',
			'title'           => 'List "Icon + Text"',
			'description'     => 'List "Icon + Text"',
			'category'        =>  'theme-category',
			'render_template' => get_template_directory() . '/acf/acf-blocks/list_icon-link.php',
			'icon'            => 'grid-view',
			'mode'            => 'edit',
			'supports'        => [
				'align' => false,
			]
		] );
		acf_register_block_type( [
			'name'            => 'block-post',
			'title'           => 'Block with Posts',
			'description'     => 'Block with Posts',
			'category'        =>  'theme-category',
			'render_template' => get_template_directory() . '/acf/acf-blocks/block-post.php',
			'icon'            => 'excerpt-view',
			'mode'            => 'edit',
			'supports'        => [
				'align' => false,
			]
		] );
		acf_register_block_type( [
			'name'            => 'slider-cards',
			'title'           => 'Screenshots',
			'description'     => 'Screenshots"',
			'category'        =>  'theme-category',
			'render_template' => get_template_directory() . '/acf/acf-blocks/slider-cards.php',
			'icon'            => '<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 72 72"><path d="M68.5 61.6a7 7 0 0 1-7 6.9h-51a7 7 0 0 1-7-7v-35a7 7 0 0 1 7-7h51a7 7 0 0 1 7 7v35zm-4-35.2a3 3 0 0 0-3-2.9h-51a3 3 0 0 0-3 3v35a3 3 0 0 0 3 3h51a3 3 0 0 0 3-3v-35z"/><path d="M12.5 37.5a1 1 0 0 1-1-1v-3.8c0-2.7 2.3-5.2 4.9-5.2h18a1 1 0 1 1 0 2h-18c-1.5 0-2.9 1.6-2.9 3.2v3.8c0 .6-.4 1-1 1zM12.5 42.5a1 1 0 0 1-1-1v-2a1 1 0 1 1 2 0v2c0 .6-.4 1-1 1zM60.5 15.5h-49a2 2 0 0 1 0-4h49a2 2 0 0 1 0 4zM54.5 7.5h-37a2 2 0 0 1 0-4h37a2 2 0 0 1 0 4z"/></svg>',
			'mode'            => 'edit',
			'supports'        => [
				'align' => false,
			]
		] );
		acf_register_block_type( [
			'name'            => 'faq',
			'title'           => 'FAQ',
			'description'     => 'FAQ',
			'category'        =>  'theme-category',
			'render_template' => get_template_directory() . '/acf/acf-blocks/faq.php',
			'icon'            => '<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 483.8 483.8"><path d="M434.8 405.3h31.1V122.7h-136v170.6H167.2v112h194.7v78.5z"/><path d="M17.9 280h30.9l73 80v-80h194.8V0H17.9v280zM266 116.6a33 33 0 0 1 16.4 6 27 27 0 0 1 9 19.6c0 14-11.4 25.5-25.4 25.5a25.5 25.5 0 0 1-16.4-45 33 33 0 0 1 16.4-6.1zm-66.2 0a33 33 0 0 1 16.4 6 27 27 0 0 1 9 19.6c0 14-11.4 25.5-25.4 25.5a25.5 25.5 0 0 1-16.4-45 33 33 0 0 1 16.4-6.1zm-66.2.6a25.3 25.3 0 1 1 0 50.6 25.3 25.3 0 0 1 0-50.6zm-66.2 0a25.3 25.3 0 1 1 0 50.6 25.3 25.3 0 0 1 0-50.6z"/></svg>',
			'mode'            => 'preview'
		] );
		acf_register_block_type( [
			'name'            => 'toc',
			'title'           => 'TOC',
			'description'     => 'TOC',
			'category'        =>  'theme-category',
			'render_template' => get_template_directory() . '/acf/acf-blocks/toc.php',
			'icon'            => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><circle cx="2" cy="2" r="2" fill="#494c4e"/><circle cx="2" cy="8" r="2" fill="#494c4e"/><circle cx="2" cy="20" r="2" fill="#494c4e"/><circle cx="2" cy="14" r="2" fill="#494c4e"/><path fill="#494c4e" d="M23.002 3H7.998A1 1 0 0 1 7 2.002v-.004A1 1 0 0 1 7.998 1H23c.55 0 1 .45 1 .998V2c0 .55-.45 1-.998 1zm0 6H7.998A1 1 0 0 1 7 8.002v-.004A1 1 0 0 1 7.998 7H23c.55 0 1 .45 1 .998V8c0 .55-.45 1-.998 1zm0 6H7.998A1 1 0 0 1 7 14.002V14c0-.55.45-1 .998-1H23c.55 0 1 .45 1 .998V14c0 .55-.45 1-.998 1zm0 6H7.998A1 1 0 0 1 7 20.002V20c0-.55.45-1 .998-1H23c.55 0 1 .45 1 .998V20c0 .55-.45 1-.998 1z"/></svg>',
			'mode'            => 'preview'
		] );
		acf_register_block_type( [
			'name'            => 'promocode',
			'title'           => 'Promocode',
			'description'     => 'Promocode',
			'category'        =>  'theme-category',
			'render_template' => get_template_directory() . '/acf/acf-blocks/promocode.php',
			'icon'            => 'tickets-alt',
			'mode'            => 'preview'
		] );
		acf_register_block_type( [
			'name'            => 'video',
			'title'           => 'Video',
			'description'     => 'Video',
			'category'        =>  'theme-category',
			'render_template' => get_template_directory() . '/acf/acf-blocks/video.php',
			'icon'            => 'video-alt2',
			'mode'            => 'preview'
		] );
		acf_register_block_type( [
			'name'            => 'app-block',
			'title'           => 'Application blocks',
			'description'     => 'Application blocks',
			'category'        =>  'theme-category',
			'render_template' => get_template_directory() . '/acf/acf-blocks/app-info.php',
			'icon'            => 'smartphone',
			'mode'            => 'edit',


		] );
		acf_register_block_type( [
			'name'            => 'table-block',
			'title'           => 'Table blocks',
			'description'     => 'Table blocks',
			'category'        =>  'theme-category',
			'render_template' => get_template_directory() . '/acf/acf-blocks/table-block.php',
			'icon'            => 'editor-table',
			'mode'            => 'edit'
		] );
		acf_register_block_type( [
			'name'            => 'features-block',
			'title'           => 'Pros&Cons',
			'description'     => 'Pros&Cons',
			'category'        =>  'theme-category',
			'render_template' => get_template_directory() . '/acf/acf-blocks/features-block.php',
			'icon'            => '<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" id="_x32_" version="1.1" viewBox="0 0 512 512"><path d="M34.4 156.1h78v78.1h43.7v-78.1h78.1v-43.7h-78.1V34.3h-43.7v78.1H34.3zM0 512h512V0L0 512zm418.7-134.2H287.6V334h131v43.8z" class="st0"/></svg>',
			'mode'            => 'edit'
		] );
		acf_register_block_type( [
			'name'            => 'download-block',
			'title'           => 'Download App',
			'description'     => 'Download App',
			'category'        =>  'theme-category',
			'render_template' => get_template_directory() . '/acf/acf-blocks/download-block.php',
			'icon'            => 'download',
			'mode'            => 'edit'
		] );
		acf_register_block_type( [
			'name'            => 'payments-method',
			'title'           => 'Payments method',
			'description'     => 'Payments method',
			'category'        =>  'theme-category',
			'render_template' => get_template_directory() . '/acf/acf-blocks/payments-method.php',
			'icon'            => 'money-alt',
			'mode'            => 'edit'
		] );
		acf_register_block_type( [
			'name'            => 'ol-list',
			'title'           => 'Ordered List',
			'description'     => 'Ordered List',
			'category'        =>  'theme-category',
			'render_template' => get_template_directory() . '/acf/acf-blocks/ol-list.php',
			'icon'            => 'editor-ol',
			'mode'            => 'edit'
		] );
		acf_register_block_type( [
			'name'            => 'promocode-block',
			'title'           => 'Secret Block',
			'description'     => 'Secret Block',
			'category'        =>  'theme-category',
			'render_template' => get_template_directory() . '/acf/acf-blocks/promocode-block.php',
			'icon'            => 'tickets',
			'mode'            => 'edit'
		] );
		acf_register_block_type( [
			'name'            => 'app-rating',
			'title'           => 'App Rating',
			'description'     => 'App Rating',
			'category'        =>  'theme-category',
			'render_template' => get_template_directory() . '/acf/acf-blocks/app-rating.php',
			'icon'            => 'star-half',
			'mode'            => 'edit'
		] );
		acf_register_block_type( [
			'name'            => 'why-us',
			'title'           => 'Why Us',
			'description'     => 'Why Us',
			'category'        =>  'theme-category',
			'render_template' => get_template_directory() . '/acf/acf-blocks/why-us.php',
			'icon'            => 'info',
			'mode'            => 'edit'
		] );
		acf_register_block_type( [
			'name'            => 'another-apps',
			'title'           => 'Another Apps',
			'description'     => 'Another Apps',
			'category'        =>  'theme-category',
			'render_template' => get_template_directory() . '/acf/acf-blocks/another-apps.php',
			'icon'            => 'screenoptions',
			'mode'            => 'edit'
		] );

		acf_register_block_type( [
			'name'            => 'banner',
			'title'           => 'banner',
			'description'     => 'banner',
			'category'        =>  'theme-category',
			'render_template' => get_template_directory() . '/acf/acf-blocks/banner.php',
			'icon'            => '<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" id="_x32_" version="1.1" viewBox="0 0 512 512"><path d="M34.4 156.1h78v78.1h43.7v-78.1h78.1v-43.7h-78.1V34.3h-43.7v78.1H34.3zM0 512h512V0L0 512zm418.7-134.2H287.6V334h131v43.8z" class="st0"/></svg>',
			'mode'            => 'edit'
		] );

		acf_register_block_type( [
			'name'            => 'info-block',
			'title'           => 'Info-block',
			'description'     => 'info-block',
			'category'        =>  'theme-category',
			'render_template' => get_template_directory() . '/acf/acf-blocks/info-block.php',
			'icon'            => '<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" id="_x32_" version="1.1" viewBox="0 0 512 512"><path d="M34.4 156.1h78v78.1h43.7v-78.1h78.1v-43.7h-78.1V34.3h-43.7v78.1H34.3zM0 512h512V0L0 512zm418.7-134.2H287.6V334h131v43.8z" class="st0"/></svg>',
			'mode'            => 'edit',
			'supports'        => [
				'align' => false,
				'jsx'   => true
			]
		] );

		acf_register_block_type( [
			'name'            => 'main-screen',
			'title'           => 'main-screen',
			'description'     => 'main-screen',
			'category'        =>  'theme-category',
			'render_template' => get_template_directory() . '/acf/acf-blocks/main-screen.php',
			'icon'            => '<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" id="_x32_" version="1.1" viewBox="0 0 512 512"><path d="M34.4 156.1h78v78.1h43.7v-78.1h78.1v-43.7h-78.1V34.3h-43.7v78.1H34.3zM0 512h512V0L0 512zm418.7-134.2H287.6V334h131v43.8z" class="st0"/></svg>',
			'mode'            => 'edit'
		] );

		acf_register_block_type( [
			'name'            => 'main-register',
			'title'           => 'main-register',
			'description'     => 'main-register',
			'category'        =>  'theme-category',
			'render_template' => get_template_directory() . '/acf/acf-blocks/main-register.php',
			'icon'            => '<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" id="_x32_" version="1.1" viewBox="0 0 512 512"><path d="M34.4 156.1h78v78.1h43.7v-78.1h78.1v-43.7h-78.1V34.3h-43.7v78.1H34.3zM0 512h512V0L0 512zm418.7-134.2H287.6V334h131v43.8z" class="st0"/></svg>',
			'mode'            => 'edit'
		] );
	}
} );

add_filter('block_categories', 'add_gutenberg_block_categories', 10, 2);
function add_gutenberg_block_categories($categories, $post)
{
	return array_merge(
		array(
			array(
				'slug' => 'theme-category',
				'title' => 'Theme Blocks',
				'icon' => 'carrot'
			),
		),
		$categories
	);
}