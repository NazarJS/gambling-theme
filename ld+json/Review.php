<?php
$post_id = get_queried_object_id();
$post_query = get_queried_object();

$name = get_field('author_name');
$description_info = get_field('description_info');
$rating = get_field("rating");



?>
<script type="application/ld+json">
  { "@context": "https://schema.org",
    "@type": "Review",
    "author": {
        "@type": "Person",
        "name": "<?= get_the_author_meta('name', $post_query->post_author)?>$name"
    },
    "itemReviewed": {
        "@type": "Game",
        
        "name": "<?= $name; ?>"
    },
    "publisher": {
        "@type": "Organization",
        "name": "<?= !empty(get_field('site_name', 'options')) ? get_field('site_name', 'options') : 'Site'; ?>",
        "logo": {
          "@type": "ImageObject",
          "url": "<?= wp_get_attachment_url(get_field('header_logo', 'options')); ?>"
        }
     },
     "description" : "<?= wp_strip_all_tags($description_info); ?>",
    "datePublished": "<?= $post_query->post_date; ?>",
    "dateCreated": "<?= $post_query->post_date; ?>",
    "dateModified": "<?= $post_query->post_modified; ?>",
    "reviewRating": {
        "@type": "Rating",
        "bestRating": 5,
        "ratingValue": "<?= $rating; ?>",
        "worstRating": 1
    }
  }
</script>
