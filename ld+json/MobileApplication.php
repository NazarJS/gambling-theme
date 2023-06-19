<?php
  $description      = str_replace('"', '`', get_field( 'description' ));
  $title = get_field('title');
  $rating          = get_field( 'rating' );
  $image       = get_field( 'image' );
  $name = get_field('author_name'); 
?>

<script type="application/ld+json">
  {
    "@context" : "http://schema.org",
    "@type" : "MobileApplication",
    "name": "<?= $name; ?>",
    "applicationCategory" : "GameApplication",
    "description" : "<?= wp_strip_all_tags($description); ?>",
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
      "ratingValue": "<?= $rating; ?>",
      "worstRating": 3,
      "ratingCount": "<?= rand(5,20);?>"
    }
  }
</script>