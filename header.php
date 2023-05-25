<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package latte-theme
 */

?>
<!doctype html>
<?php

$first_header_button  = get_field( 'first_header_button', 'options' );
$second_header_button = get_field( 'second_header_button', 'options' );

if ( function_exists( 'get_field' ) ) {
	$site_language = get_field( 'site_language', 'options' ) ?? 'en';
	$ID_acf        = '';
	if ( ! is_404() ) {
		$ID_acf = $post->ID;
		if ( is_archive() ) {
			$ID_acf = get_queried_object();
		}
	}
	$page_title       = get_field( 'page_title', $ID_acf );
	$page_description = get_field( 'page_description', $ID_acf );
	$page_image       = wp_get_attachment_image_src( get_field( 'page_image', $ID_acf ), 'full' );
	$page_image_ID    = get_field( 'page_image', $ID_acf );
	$buttons_header   = get_field( 'buttons_header', 'options' );
	$theme_path       = get_template_directory_uri();

}

?>

<?php if(!empty($site_language)):?>
<html lang="<?= $site_language; ?>">
<?php else:?>
<html <?php language_attributes(); ?> >
<?php endif;?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preload"
          href="<?= $theme_path ?>/assets/build/fonts/roboto-regular.woff2"
          as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload"
          href="<?= $theme_path ?>/assets/build/fonts/roboto-bold.woff2"
          as="font" type="font/woff2" crossorigin="anonymous">

	<?php
	wp_head();
	//get_template_part( 'inc/default-styles' );
  
	$head_metrics_code = get_field( 'head_code', 'options' );
	if ( ! empty( $head_metrics_code ) ) {
		echo $head_metrics_code;
	}
	?>
</head>

<body <?php body_class(); ?>>
<?php
$body_metrics_code = get_field( 'body_code', 'options' );
if ( ! empty( $body_metrics_code ) ) {
	echo $body_metrics_code;
}
?>

<?php wp_body_open(); ?>



<div id="page" class="site">
    <!-- <header id="masthead" class="site-header header">
        <div class="container">
			<div class="header-container">
				<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php if ( CUSTOM_HEADER_LOGO || CUSTOM_SITE_NAME ): ?>
							<?php if ( CUSTOM_HEADER_LOGO ): ?>
								<?php echo get_image( CUSTOM_HEADER_LOGO ); ?>
							<?php else: ?>
								<p><?= CUSTOM_SITE_NAME; ?></p>
							<?php endif; ?>
							</a>
				<?php endif; ?>

				<div class="header-wrapper">
						
					<div class="header-wrap">
						
					</div>


				</div>
				<?php get_template_part( 'template-parts/header', 'buttons' ); ?>
				<div class="header-burger" id ="burger">
					<span class="header-burger-span"></span>
				</div>
			</div>
        </div>
    </header> -->

	<header class="header" id="header">
    <div class="container">
      <div class="header__body">
        <div class="header-burger" id ="burger">
          <div class="header-burger__span"></div>
        </div>

        <a href="#" class="header__logo logo">
          <img src="./images/Logo.png" alt="alt">
        </a>

        <div class="header__container">
          <div class="menu__wrapper">

            <nav class="menu header__menu">

           

              <?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-main',
									'menu'           => '',
									'container'      => '',
									'menu_class'     => 'header-menu',
								)
								);
						?>
            </nav>

           
          </div>

          <div class="header-block__buttons">
              <?php

                if ( ! empty( $first_header_button['url'] ) || ! empty( $first_header_button['title'] ) ) {
                echo get_button( $first_header_button['url'], $first_header_button['title'], ' ui-btn__register ui-btn', 'register' );
                }

                if ( ! empty( $second_header_button['url'] ) || ! empty( $second_header_button['title'] ) ) {
                echo get_button( $second_header_button['url'], $second_header_button['title'], ' ui-btn__download ui-btn ', 'download' );
                }

              ?>
          </div>
        </div>
      </div>
    </div>
</header>






