<?php
$show_title = get_field('show_title');
$show_button = get_field('show_button');
$tag_wrapper = get_field('tag_wrapper');
$count_posts = get_field('count_posts');
$count = 0;
$list_posts = [];

if(!empty(get_field('list_posts'))){
  $list_posts = get_field('list_posts');
} elseif (!empty(get_field('taxonomy'))) {
  $taxonomy = get_field('taxonomy');
  $posts = get_posts(array('category' => $taxonomy));
  foreach ($posts as $post) {
    array_push($list_posts, $post->ID);
  }
}

echo acf_block_before( 'Block with posts', $is_preview );
?>
  <<?= $tag_wrapper?> class="block-posts">
    <?php if($show_title): ?>
    <div class="tag-block__title">
      <h2><?= get_field('title_block');?></h2>
    </div>
    <?php endif;?>
    <div class="container">
      <div class="block-posts__wrap">
      <?php foreach ($list_posts as $post): $count++;?>
      <?php if($count > 2 && $count !== count($list_posts) && $count !== 4 && $count != $count_posts):?>
        <div class="block-posts__second">
      <?php endif;?>
        <div class="post">
          <a href="<?= get_permalink($post)?>">
          <span class="post__date"><?= get_the_date('j M, Y / g:i a', $post)?></span>
          <div class="post__image"><?= get_the_post_thumbnail($post);?></div>
          <div class="post__content">
            <p class="post__title"><?= get_the_title($post);?></p>
            <div class="post__description">
              <?php if(!empty(get_field('excerpt', $post)) || !empty(get_the_excerpt($post))): ?>
                <p><?= get_post_type($post) === 'page' ? mb_strimwidth(get_field('excerpt', $post), 0, 100, "...") : mb_strimwidth(get_the_excerpt($post), 0, 100, '...');?></p>
              <?php endif;?>
              <span class="post__read-more btn btn-without-back-green"><?= !empty(get_field('text_for_link')) ? get_field('text_for_link') : 'Read';?></span>
            </div>
          </a>
          </div>
        </div>
        <?php if($count === 4):?>
          </div>
        <?php endif;?>
      <?php if($count === 4 || $count == $count_posts) break;?>
      <?php endforeach;?>
      </div>
      <?php if($show_button):?>
        <a href="<?= get_field('link_button');?>" class="tag-block__btn-more"><?= get_field('text_for_button');?></a>
      <?php endif;?>
    </div>
  </<?= $tag_wrapper?>>
<?php
echo acf_block_after( $is_preview );
