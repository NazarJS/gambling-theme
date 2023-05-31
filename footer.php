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
            <!-- <div class="footer-social__item">
              <svg class="ui-icon">
                <use xlink:href="http://game-owner.loc/wp-content/themes/game-owner/assets/dist/images/svg/header-sprite.svg#register-img"></use>
              </svg>
            </div>

            <div class="footer-social__item">
              <svg class="ui-icon">
                <use xlink:href="http://game-owner.loc/wp-content/themes/game-owner/assets/dist/images/svg/header-sprite.svg#register-img"></use>
              </svg>
            </div>

            <div class="footer-social__item">
              <svg class="ui-icon">
                <use xlink:href="http://game-owner.loc/wp-content/themes/game-owner/assets/dist/images/svg/header-sprite.svg#register-img"></use>
              </svg>
            </div> -->

            <div class="socials-icons">
              <ul class="socials-icons__wrap">
                  <?php
                  foreach ( $social_links as $social ) {
                      echo ' <li class="footer-social__item"><a href="' . $social['link'] . '"><img src="' . IMG_DIR . '/socials/' . $social['network'] . '.svg' . '" alt="alt" loading="lazy"></a></li>';
                  }
                  ?>
              </ul>
            </div>
          </div>
        </div>

        <div class="footer-list">
           <!-- <ul class="footer-list__ul">
              <li class="footer-list__li">
                <a href="#">Sobre a Confiabilidade</a>
              </li>

              <li class="footer-list__li">
                <a href="#">Sobre a Confiabilidade</a>
              </li>

              <li class="footer-list__li">
                <a href="#">Sobre a Confiabilidade</a>
              </li>

              <li class="footer-list__li">
                <a href="#">Sobre a Confiabilidade</a>
              </li>

              <li class="footer-list__li">
                <a href="#">Sobre a Confiabilidade</a>
              </li>

              <li class="footer-list__li">
                <a href="#">Sobre a Confiabilidade</a>
              </li>

              <li class="footer-list__li">
                <a href="#">Sobre a Confiabilidade</a>
              </li>

            
           </ul> -->

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
          <div class="footer-banners__item">
            <img src="./images/image 12.png" alt="alt" loading="lazy">
          </div>

          <div class="footer-banners__item">
            <img src="./images/image 12.png" alt="alt" loading="lazy">
          </div>

          <div class="footer-banners__item">
            <img src="./images/image 12.png" alt="alt" loading="lazy">
          </div>

          <div class="footer-banners__item">
            <img src="./images/image 12.png" alt="alt" loading="lazy">
          </div>

          <div class="footer-banners__item">
            <img src="./images/image 12.png" alt="alt" loading="lazy">
          </div>

          <div class="footer-banners__item">
            <img src="./images/image 12.png" alt="alt" loading="lazy">
          </div>

          
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
            © 2010-2023. All rights reserved. 
          </div>
        </div>
    </div>
</footer>

</div>
<?php wp_footer(); ?>
</body>
</html>
