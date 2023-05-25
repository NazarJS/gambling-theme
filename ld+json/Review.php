<?php
$post_id = get_queried_object_id();
$post_query = get_queried_object();
$review_title = get_field('review_title', $post_query);
$review_logo = get_field('review_logo', $post_query);
$review_rating = get_field('review_rating', $post_query);



?>
<script type="application/ld+json">
  { "@context": "https://schema.org",
    "@type": "Review",
    "author": {
        "@type": "Person",
        "name": "<?= get_the_author_meta('name', $post_query->post_author)?>"
    },
    "itemReviewed": {
        "@type": "Game",
        "image": "<?= !empty($review_logo) ? wp_get_attachment_url($review_logo) : ''; ?>",
        "name": "<?= $review_title; ?>"
    },
    "publisher": {
        "@type": "Organization",
        "name": "<?= !empty(get_field('site_name', 'options')) ? get_field('site_name', 'options') : 'Site'; ?>",
        "logo": {
          "@type": "ImageObject",
          "url": "<?= wp_get_attachment_url(get_field('header_logo', 'options')); ?>"
        }
     },
    "datePublished": "<?= $post_query->post_date; ?>",
    "dateCreated": "<?= $post_query->post_date; ?>",
    "dateModified": "<?= $post_query->post_modified; ?>",
    "reviewRating": {
        "@type": "Rating",
        "bestRating": 5,
        "ratingValue": "<?= $review_rating / 2; ?>",
        "worstRating": 1
    }
  }
</script>
