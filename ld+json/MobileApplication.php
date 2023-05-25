<?php
$post_id = get_queried_object_id();
$post_query = get_queried_object();
?>

<script type="application/ld+json">
  {
    "@context" : "http://schema.org",
    "@type" : "MobileApplication",
    "name": "<?= !empty(get_field('review_title', $post_query)) ? get_field('review_title', $post_query) : str_replace('"', '`', get_the_title($post_id)); ?>",
    "applicationCategory" : "GameApplication",
    "description" : "<?= !empty(get_field('excerpt', $post_id)) ? get_field('excerpt', $post_id) : get_the_excerpt($post_id);?>",
    "operatingSystem" : "Android, iOS",
    "image" : "",
    "sourceOrganization" : {
      "@context" : "http://schema.org",
      "@type" : "Organization",
      "name" : "<?= !empty(get_field('site_name', 'options')) ? get_field('site_name', 'options') : 'Site'; ?>",
      "url" : "<?= site_url();?>"
    },
    "offers" : {
      "@type" : "Offer",
      "price": 0,
      "priceCurrency" : "RS"
    },
    "aggregateRating": {
      "@type": "AggregateRating",
      "bestRating": 5,
      "ratingValue": "<?= get_field('aiRating') ?>",
      "worstRating": 3,
      "ratingCount": "<?= rand(5,20);?>"
    }
  }
</script>