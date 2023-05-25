<?php

$video_url           = get_field( 'url' );
$video_name          = get_field( 'name' );
$video_description   = get_field( 'description' );
$video_family        = get_field( 'is_family_friendly' );
$video_upload_date   = get_field( 'upload_date' );
$video_thumbnail_id  = get_field( 'preview' );
$video_thumbnail_jpg = wp_get_attachment_image_url( $video_thumbnail_id );
$horizontal_align    = get_field( 'align' );

echo acf_block_before( 'Video', $is_preview );
?>
  <div class="video <?= $horizontal_align ?>" data-url="<?= $video_url ?>">
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "VideoObject",
        "name": "<?= $video_name ?>",
        "description": "<?= $video_description ?>",
        "thumbnailUrl": "<?= $video_thumbnail_jpg ?>",
        "uploadDate": "<?= $video_upload_date ?>T08:00:00+08:00",
        "isFamilyFriendly": "<?= ($video_family) ? 'true' : 'false' ?>",
        "publisher": {
          "@type": "Organization",
          "name": "<?= !empty(get_field('site_name', 'options')) ? get_field('site_name', 'options') : 'Site'; ?>",
          "logo": {
            "@type": "ImageObject",
            "url": "<?= wp_get_attachment_url(get_field('header_logo', 'options')); ?>"
          }
        },
        "embedUrl": "<?= $video_url ?>"
      }
    </script>
    <div class="video__wrap">
      <div class="video__img">
        <?= get_image( get_field( 'preview' ) ) ?>
      </div>
      <button class="video__play" aria-label="Play">
        <svg width="68" height="48" viewBox="0 0 68 48">
          <path class="video__play-shape"
            d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z"></path>
          <path class="video__play-icon" d="M 45,24 27,14 27,34"></path>
        </svg>
      </button>
    </div>
  </div>
<?php
echo acf_block_after( $is_preview );
