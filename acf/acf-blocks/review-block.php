<?php
$review_text          = get_field( 'review_text' );
$review_button        = get_field( 'review_button' );
$review_h1            = get_field( 'review_h1' );
$review_text_color    = get_field( 'review_text_color' );
$review_text_color    = ( ! empty( $review_text_color ) ) ? 'style="color:' . $review_text_color . '"' : '';
$review_schema_toggle = get_field( 'review_schema_toggle' );
$review_schema = get_field('review_schema');

global $post;
$post_id = $post->ID;
$post_query = get_queried_object();


echo acf_block_before( 'Review block', $is_preview );
?>

    <div class="jumbotron">
		<?php if ( $review_schema_toggle  ): ?>
            <script type="application/ld+json">
              { "@context": "https://schema.org",
                "@type": "Review",
                "author": {
                    "@type": "Person",
                    "name": "<?= $review_schema['name']?>"
                },
                "itemReviewed": {
                    "@type": "Game",
                    "image": "<?= $review_schema['logo'] ?>",
                    "name": "<?= $review_schema['bookmaker'] ?>"
                },
                "publisher": {
                    "@type": "Organization",
                    "name": "<?= ! empty( get_field( 'site_name', 'options' ) ) ? get_field( 'site_name', 'options' ) : 'Site'; ?>",
                    "logo": {
                      "@type": "ImageObject",
                      "url": "<?= wp_get_attachment_url( get_field( 'header_logo', 'options' ) ); ?>"
                    }
                 },
                "datePublished": "<?= get_the_date('Y-j-n',$post->ID) ?> ",
                "dateCreated": "<?= get_the_date('Y-j-n',$post->ID) ?>",
                "dateModified": "<?= get_the_date($post->post_modified) ?>",
                "reviewRating": {
                    "@type": "Rating",
                    "bestRating": 5,
                    "ratingValue": "<?= $review_schema['rating'] ?>",
                    "worstRating": 1
                }
              }
</script>
		<?php endif; ?>

        <div class="row">
            <div class="col-7">
                <div <?= $review_text_color ?>>
					<?php if ( ! empty( $review_h1 ) ): ?>
                        <h1><?= $review_h1 ?></h1>
					<?php endif; ?>
					<?php if ( ! empty( $review_text ) ): ?>
						<?= $review_text ?>
					<?php endif; ?>
                </div>
				<?php if ( ! empty( $review_button['url'] ) && ! empty( $review_button['title'] ) ): ?>
					<?= get_button( $review_button['url'], $review_button['title'], ' content-button__control btn btn-big-text btn-with-back ', 'nofollow' ) ?>
				<?php endif; ?>

            </div>
            <div class="col-5 ">
                <InnerBlocks/>
            </div>
        </div>
    </div>

<?php
echo acf_block_after( $is_preview );