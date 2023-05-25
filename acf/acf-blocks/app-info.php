<?php
$aiTitleH1         = get_field( 'aiTitleH1' );
$aiDescription     = get_field( 'aiDescription' );
$aiIcon            = get_field( 'aiIcon' );
$aiIconDescription = get_field( 'aiIconDescription' );
$aiRating          = get_field( 'aiRating' );
$aiRatingCount     = get_field( 'aiRatingCount' );
$aiDownload        = get_field( 'aiDownload' );
$aiImage           = get_field( 'aiImage' );
$aiTextColor     = get_field( 'aiTextColor' );
$aiTextColor    = ( ! empty( $aiTextColor ) ) ? 'style="color:' . $aiTextColor . '"' : '';

echo acf_block_before( 'Application info', $is_preview );
?>

    <section class="tag-block bg_main" id="mobile-app">
        <div class="jumbotron">
            <div class="container ">
				<?php get_template_part( 'ld+json/MobileApplication' ); ?>
                <div class="row">
                    <div class="col-7">
                        <div <?=$aiTextColor?>>
                            <h1><?= $aiTitleH1 ?></h1>
                            <p>
		                        <?= $aiDescription ?>
                            </p>
                        </div>

                        <div class="app-info ">


                            <div class="app-info__description">
                                <div class="app-info__icon">


									<?php if ( ! empty( $aiIcon ) ): ?>
                                        <img src="<?php echo esc_url( $aiIcon['url'] ); ?>" alt="<?php echo esc_attr( $aiIcon['alt'] ); ?>" >
									<?php endif; ?>
                                </div>

                                <div>
                                    <p>
										<?= $aiIconDescription ?>


                                </div>
                            </div>

                            <div class="app-rating">

                                <div class="app-rating__number">
									<?= $aiRating ?>/5
                                </div>

                                <div>
                                    <div class="app-rating__stars">
                                        <span>☆ ☆ ☆ ☆ ☆</span>
                                        <span style="width:<?= $aiRating * 20 ?>%">★ ★ ★ ★ ★</span>
                                    </div>

                                    <div class="app-rating__votes">
                                        <svg width="10" height="11" viewBox="0 0 10 11" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.5 2.60526C2.5 4.04163 3.62167 5.21053 5 5.21053C6.37833 5.21053 7.5 4.04163 7.5 2.60526C7.5 1.16889 6.37833 0 5 0C3.62167 0 2.5 1.16889 2.5 2.60526ZM9.44444 11H10V10.4211C10 8.18689 8.255 6.36842 6.11111 6.36842H3.88889C1.74444 6.36842 0 8.18689 0 10.4211V11H9.44444Z"
                                                  fill="black"/>
                                        </svg>
                                        (<?= $aiRatingCount ?>)
                                    </div>
                                </div>

                            </div>

							<?php if ( have_rows( 'aiDownload' ) ): ?>

								<?php while ( have_rows( 'aiDownload' ) ): the_row();
									$aiPlatform      = get_sub_field( 'aiPlatform' );
									$aiLink          = get_sub_field( 'aiLink' );
									$aiDownloadCount = get_sub_field( 'aiDownloadCount' );
									?>
									<?php if ( $aiPlatform === 'ios' ): ?>
                                        <div class="app-download">
											<?= get_button( $aiLink, '', 'btn-like-official ios', 'nofollow sponsored', true ); ?>


                                            <div class="app-download__count">
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.89893 8.53977C5.91094 8.55607 5.92627 8.56925 5.94379 8.57832C5.9613 8.58738 5.98052 8.59209 6 8.59209C6.01948 8.59209 6.0387 8.58738 6.05621 8.57832C6.07372 8.56925 6.08906 8.55607 6.10107 8.53977L7.89786 6.12443C7.96364 6.0358 7.90428 5.90455 7.79679 5.90455H6.60802V0.136364C6.60802 0.0613636 6.55027 0 6.47968 0H5.51711C5.44652 0 5.38877 0.0613636 5.38877 0.136364V5.90284H4.20321C4.09572 5.90284 4.03636 6.03409 4.10214 6.12273L5.89893 8.53977ZM11.8717 7.94318H10.9091C10.8385 7.94318 10.7807 8.00455 10.7807 8.07955V10.7045H1.21925V8.07955C1.21925 8.00455 1.1615 7.94318 1.09091 7.94318H0.128342C0.057754 7.94318 0 8.00455 0 8.07955V11.4545C0 11.7563 0.229412 12 0.513369 12H11.4866C11.7706 12 12 11.7563 12 11.4545V8.07955C12 8.00455 11.9422 7.94318 11.8717 7.94318Z"
                                                          fill="black"/>
                                                </svg>
                                                Downloaded: <?= $aiDownloadCount ?>
                                            </div>
                                        </div>
									<?php endif; ?>
									<?php if ( $aiPlatform === 'android' ): ?>
                                        <div class="app-download">


											<?= get_button( $aiLink, '', 'btn-like-official android', 'nofollow sponsored', true ); ?>


                                            <div class="app-download__count">
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.89893 8.53977C5.91094 8.55607 5.92627 8.56925 5.94379 8.57832C5.9613 8.58738 5.98052 8.59209 6 8.59209C6.01948 8.59209 6.0387 8.58738 6.05621 8.57832C6.07372 8.56925 6.08906 8.55607 6.10107 8.53977L7.89786 6.12443C7.96364 6.0358 7.90428 5.90455 7.79679 5.90455H6.60802V0.136364C6.60802 0.0613636 6.55027 0 6.47968 0H5.51711C5.44652 0 5.38877 0.0613636 5.38877 0.136364V5.90284H4.20321C4.09572 5.90284 4.03636 6.03409 4.10214 6.12273L5.89893 8.53977ZM11.8717 7.94318H10.9091C10.8385 7.94318 10.7807 8.00455 10.7807 8.07955V10.7045H1.21925V8.07955C1.21925 8.00455 1.1615 7.94318 1.09091 7.94318H0.128342C0.057754 7.94318 0 8.00455 0 8.07955V11.4545C0 11.7563 0.229412 12 0.513369 12H11.4866C11.7706 12 12 11.7563 12 11.4545V8.07955C12 8.00455 11.9422 7.94318 11.8717 7.94318Z"
                                                          fill="black"/>
                                                </svg>
                                                Downloaded: <?= $aiDownloadCount ?>
                                            </div>

                                        </div>
									<?php endif; ?>
								<?php endwhile; ?>

							<?php endif; ?>


                            <!-- /.app-rating -->

                        </div>
                    </div>
                    <div class="col-5 jumbotron__image-block"><?php if ( ! empty( $aiImage ) ): ?>
                            <img src="<?php echo esc_url( $aiImage['url'] ); ?>" alt="<?php echo esc_attr( $aiImage['alt'] ); ?>">
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
echo acf_block_after( $is_preview );