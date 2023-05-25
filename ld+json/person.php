<?php
$id = get_queried_object_id();

if(!is_author()) {
  $id_author = get_queried_object()->post_author;
}
else {
  $id_author = get_the_author_meta('ID');
}
$user = 'user_'.$id_author;

$author_avatar = wp_get_attachment_url(get_field('avatar', $user));
$author_name = get_field('name', $user);
$author_email = get_field('emal', $user);
$author_social_links = get_field('social_links', $user) ?? [];
$author_url = get_author_posts_url($id_author);

$array_link = [];
if(!empty($author_social_links)) {
  foreach ($author_social_links as $soc) {
    array_push($array_link, '"'.$soc['link'].'"');
  }
}

?>
<script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Person",
    "email": "<?= $author_email; ?>",
    "image": "<?= $author_avatar; ?>",
    "name": "<?= $author_name; ?>",
    "url": "<?= $author_url; ?>",
    "sameAs" : [ <?= implode(',', $array_link); ?> ]
  }
</script>
