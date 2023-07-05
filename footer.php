<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package latte-theme
 */

$bg_image_group     = get_field( 'bg_image_group', 'options' );
$choose_footer_logo = get_field( 'choose_footer_logo', 'options' );
$footer_logo        = null;
switch ( $choose_footer_logo ) {
	case 'header':
		$footer_logo = get_image( get_field( 'header_logo', 'options' ) );
		break;
	case 'another':
		$footer_logo = get_image( get_field( 'footer_logo', 'options' ) );
		break;
	case 'disabled':
		$footer_logo = null;
		break;
}
$social_links         = get_field( 'social_links', 'options' );
$link_for_mobile      = get_field( 'link_for_mobile', 'options' );
$link_for_mobile_text = get_field( 'link_for_mobile_text', 'options' ) ?? '';
$link_for_mobile_link = get_field( 'link_for_mobile_link', 'options' ) ?? '';
$copyright = get_field('footer_bottom_copyright' , 'options');
?>
<?php
$body_metrics_code = get_field( 'body_code', 'options' );
if ( ! empty( $body_metrics_code ) ) {
	echo $body_metrics_code;
}
?>

<footer class="footer" id="footer">
    <div class="container">
         
        <div class="footer__container">
        <?php if ( $footer_logo ): ?>
              <div class="footer-logo">
                  <a href="/">
                    <?= $footer_logo ?>
                  </a>
              </div>
				<?php endif; ?>

          <div class="footer-social">

            <div class="socials-icons">
              <ul class="socials-icons__wrap">
                  <?php
                  foreach ( $social_links as $social ) {
                      echo 
                      ' <li class="footer-social__item">
                      <a href="' . $social['link'] . '">
                      <img src="' . IMG_DIR . '/socials/' . $social['network'] . '.svg' . '" alt="alt" loading="lazy">
                      </a></li>';
                  }
                  ?>
              </ul>
            </div>
          </div>
        </div>

        <div class="footer-list">
         

		   <?php
	                wp_nav_menu(
		                array(
			                'theme_location' => 'menu-footer',
			                'menu'           => '',
			                'container'      => '',
			                'menu_class'     => 'footer-menu',
		                )
	                );
	                ?>
        </div>

        <div class="footer-banners">
        

          <?php get_template_part( 'template-parts/footer', 'payments' ); ?>

          
        </div>

        <div class="footer-bottom">
          <div class="footer-bootom__links">
            <a href="#" class="footer-bottom__link">
              Privacy Policy
            </a>

            <a href="#" class="footer-bottom__link">
              Rules of personal data processing
            </a>
          </div>

          <div class="footer-bottom__info">
            © <?php echo  date('Y') ?>. <?php echo $copyright ?>  
          </div>
        </div>
    </div>
</footer>

</div>
<?php wp_footer(); ?>
</body>
</html>
