<?php
function latte_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'latte-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'latte-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar( array(
		'name'          => 'Footer Top', //название виджета в админ-панели
		'id'            => 'footer-top', //идентификатор виджета
		// 'class'         => 'footer-top',
		'description'   => 'Виден в футере на всем сайте', //описание виджета в админ-панели
		'before_widget' => '<div id="%1$s" class="widget %2$s footer-top">', //открывающий тег виджета с динамичным идентификатором
		'after_widget'  => '</div>', //закрывающий тег виджета с очищающим блоком
		'before_title'  => '<span class="widget-title">', //открывающий тег заголовка виджета
		'after_title'   => '</span>',//закрывающий тег заголовка виджета
	) );
	register_sidebar( array(
		'name'          => 'Footer Middle', //название виджета в админ-панели
		'id'            => 'footer-middle', //идентификатор виджета
		'description'   => 'Виден в футере на всем сайте', //описание виджета в админ-панели
		'before_widget' => '<div id="%1$s" class="widget %2$s">', //открывающий тег виджета с динамичным идентификатором
		'after_widget'  => '</div>', //закрывающий тег виджета с очищающим блоком
		'before_title'  => '<span class="widget-title">', //открывающий тег заголовка виджета
		'after_title'   => '</span>',//закрывающий тег заголовка виджета
	) );
	register_sidebar( array(
		'name'          => 'Footer Bottom', //название виджета в админ-панели
		'id'            => 'footer-bottom', //идентификатор виджета
		'description'   => 'Виден в футере на всем сайте', //описание виджета в админ-панели
		'before_widget' => '<div id="%1$s" class="widget %2$s">', //открывающий тег виджета с динамичным идентификатором
		'after_widget'  => '</div>', //закрывающий тег виджета с очищающим блоком
		'before_title'  => '<span class="widget-title">', //открывающий тег заголовка виджета
		'after_title'   => '</span>',//закрывающий тег заголовка виджета
	) );
}
add_action( 'widgets_init', 'latte_theme_widgets_init' );