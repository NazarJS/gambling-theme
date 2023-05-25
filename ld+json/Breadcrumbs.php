<?php
global $post;

$breadcrumbs_setup = get_field('breadcrumbs_setup', 'options');
$main = !empty($breadcrumbs_setup['main_breadcrumb']) ? $breadcrumbs_setup['main_breadcrumb'] : 'Home';
$breadcrumb_title = get_field('breadcrumb_title', $post->ID);

?>
<?php if( is_single() ):?>
<script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [{
      "@type": "ListItem",
      "position": 1,
      "item": {
        "@id": "<?= site_url()?>",
        "name": "<?= $main?>"
      }
    },
    <?php
    $post_categories = get_the_category();
    $count = 1;

    if( ! empty( $post_categories[0]->cat_ID ) ) :
      $cat = get_category_parents( $post_categories[0]->cat_ID, false, ',' ) ;
      $cat_array = explode(',', $cat);
      foreach ($cat_array as $name) :
        if(!empty($name)) :
          $count++;
    ?>
    {
      "@type": "ListItem",
      "position": <?= $count?>,
      "item": {
        "@id": "<?= get_category_link(get_cat_ID($name))?>",
        "name": "<?= $name?>"
      }
    },
    <?php endif;?>
    <?php endforeach;?>
    {
      "@type": "ListItem",
      "position": <?= count($cat_array) + 1?>,
      "item": {
        "@id": "<?= get_permalink($post->ID)?>",
        "name": "<?= !empty($breadcrumb_title) ? $breadcrumb_title : get_the_title()?>"
      }
    }<?php endif;?>]
  }
</script>
<?php elseif ( is_page() ):?>
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [{
      "@type": "ListItem",
      "position": 1,
      "item": {
        "@id": "<?= site_url()?>",
        "name": "<?= $main?>"
      }
    },
    <?php if($post->post_parent):
      $parent_id  = $post->post_parent;
      $breadcrumbs = [];
      $count = 1;

      while ( $parent_id ) {
        $page = get_post( $parent_id );
        $breadcrumbs[] = $page->ID;
        $parent_id = $page->post_parent;
      }

      foreach (array_reverse( $breadcrumbs ) as $id):
        $count++;
      ?>
    {
      "@type": "ListItem",
      "position": <?= $count?>,
      "item": {
        "@id": "<?= get_permalink($id)?>",
        "name": "<?= get_the_title($id) ?>"
      }
    },
    <?php endforeach;?>
    {
      "@type": "ListItem",
      "position": <?= count($breadcrumbs) + 2; ?>,
      "item": {
        "@id": "<?= get_permalink($post->ID)?>",
        "name": "<?= !empty($breadcrumb_title) ? $breadcrumb_title : get_the_title()?>"
      }
    } <?php else: ?>
    {
      "@type": "ListItem",
      "position": 2,
      "item": {
        "@id": "<?= get_permalink($post->ID)?>",
        "name": "<?= !empty($breadcrumb_title) ? $breadcrumb_title : get_the_title()?>"
      }
    }<?php endif;?>]
  }
</script>
<?php elseif ( is_category() ):?>
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [{
      "@type": "ListItem",
      "position": 1,
      "item": {
        "@id": "<?= site_url()?>",
        "name": "<?= $main?>"
      }
    },{
      "@type": "ListItem",
      "position": 2,
      "item": {
        "@id": "<?= get_category_link(get_cat_ID(single_cat_title('', 0))) ?>",
        "name": "<?= single_cat_title('', 0); ?>"
      }
    }]
  }
</script>
<?php endif;?>