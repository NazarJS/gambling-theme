<?php
$post_id = get_queried_object_id();
$post_query = get_queried_object();

?>
<script type="application/ld+json">
  { "@context": "https://schema.org",
    "@type": "Article",
    "headline": "<?= str_replace('"', '`', get_the_title($post_id));?>",
    "image": "<?= !empty(get_the_post_thumbnail_url($post_id)) ? get_the_post_thumbnail_url($post_id) : wp_get_attachment_url(get_field('header_logo', 'options'));?>",
    "author": {
        "@type": "Person",
        "name": "<?= get_the_author_meta('name', $post_query->post_author)?>"
    },
    "publisher": {
        "@type": "Organization",
        "name": "<?= !empty(get_field('site_name', 'options')) ? get_field('site_name', 'options') : 'Site'; ?>",
        "logo": {
          "@type": "ImageObject",
          "url": "<?= wp_get_attachment_url(get_field('header_logo', 'options')); ?>"
        }
     },
    "url": "<?= get_permalink($post_id)?>",
    "mainEntityOfPage": {
      "@type": "WebPage",
      "@id": "<?= get_permalink($post_id)?>"
    },
    "datePublished": "<?= $post_query->post_date; ?>",
    "dateCreated": "<?= $post_query->post_date; ?>",
    "dateModified": "<?= $post_query->post_modified; ?>",
    "description": "<?= !empty(get_field('excerpt', $post_id)) ? str_replace('"', '`', get_field('excerpt', $post_id)) : str_replace('"', '`', get_the_excerpt($post_id));?>",
    "articleBody": "<?= !empty(get_field('excerpt', $post_id)) ? str_replace('"', '`', get_field('excerpt', $post_id)) : str_replace('"', '`', get_the_excerpt($post_id));?>"
  }
</script>
