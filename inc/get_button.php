<?php
/**
 * @param string $url link
 * @param string $title title of link
 * @param string $class class for link
 * @param string $rel attr rel
 * @param boolean $encode attr encode if block
 *
 * @return string
 */

function get_button(  $url,  $title, string $class = '', string $rel = 'nofollow', bool $encode = false ): string {
	if (empty($url) || empty($title)) {
		return '';
	}
	$image_path = IMG_DIR;
	$get_encode  = get_field( 'encode_site_links', 'options' ) ?? true;
	$attr_target = ( get_field( 'attr_target', 'options' ) ) ? 'target="_blank"' : '';

	if ( $get_encode || $encode ) {
		$encode      = true;
		$data_encode = 'true';
	} else {
		$encode      = false;
		$data_encode = 'false';
	}

	if ( $encode ) {
		$url = base64_encode( $url );
	}


	if ( $class == 'btn-like-official android' ) {
		if ( $encode ) {
			$btn = "<button type='button'
			data-decoded='$data_encode'
			data-decoded-text='$url'
			class='link-button $class'> <img alt='Download android' src='" . IMG_DIR . "/android-app-logo.png'></button>";

		} else {
			$btn = "<a href='$url'
      rel='$rel' $attr_target
			class='$class'>$title</a>";
		}
	} elseif ( $class == 'download-button btn-like-official android' ) {
		if ( $encode ) {
			$btn = "<button type='button'
			data-decoded='$data_encode'
			data-decoded-text='$url'
			class='link-button download-button $class'> <img alt='Download android' src='" . IMG_DIR . "/android-app-logo.png'></button>";

		} else {
			$btn = "<a href='$url'
      rel='$rel' $attr_target
			class='$class'>$title</a>";
		}
	} elseif ( $class == 'ui-btn__icon ui-btn__android' ) {
		if ( $encode ) {
	
			$btn = "<button type='button'
						data-decoded='$data_encode'
						data-decoded-text='$url'
						class='link-button $class'>
						<img src='./images/flat-color-icons_android-os.png' alt='alt'>
						<span class='ui-btn__name'>
							Download
	
							<span class='ui-btn__subtitle'>
								for Android
							</span>
						</span>
					</button>";
	
		} else {
			$btn = "<a href='$url'
			  rel='$rel' $attr_target
			class='$class'>$title</a>";
		}
		
	} elseif ( $class == 'ui-btn__icon ui-btn__ios' ) {
		if ( $encode ) {
	
			$btn = "<button type='button'
						data-decoded='$data_encode'
						data-decoded-text='$url'
						class='link-button $class'>
						
						<span class='ui-btn__name'>
							Download
	
							<span class='ui-btn__subtitle'>
								for IOS
							</span>
						</span>
					</button>";
	
		} else {
			$btn = "<a href='$url'
			  rel='$rel' $attr_target
			class='$class'>$title</a>";
		}
		
	} elseif ( $class == 'btn-like-official ios' ) {
		if ( $encode ) {
			$btn = "<button type='button'
			data-decoded='$data_encode'
			data-decoded-text='$url'
			class='link-button $class'> <img alt='download for Apple' src='" . IMG_DIR . "/app-store-logo.png'></button>";

		} else {
			$btn = "<a href='$url'
      rel='$rel' $attr_target
			class='$class'>$title</a>";
		}
	} elseif ( $class == 'download-button btn-like-official ios' ) {
		if ( $encode ) {
			$btn = "<button type='button'
			data-decoded='$data_encode'
			data-decoded-text='$url'
			class='link-button download-button $class'> <img alt='download for Apple' src='" . IMG_DIR . "/app-store-logo.png'></button>";

		} else {
			$btn = "<a href='$url'
      rel='$rel' $attr_target
			class='$class'>$title</a>";
		}
	} else {
		if ( $encode ) {
			$btn = "<button type='button'
			data-decoded='$data_encode'
			data-decoded-text='$url'
			class='link-button $class'>$title</button>";

		} else {
			$btn = "<a href='$url'
      rel='$rel' $attr_target
			class='$class'>$title</a>";
		}
	}


	return $btn;
}

// <svg class='ui-icon'>
// 						  <use xlink:href='$image_path/footer-logo.png'></use>
// 						</svg>
