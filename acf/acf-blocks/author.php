<?php
$post_id = get_queried_object();
$id = get_queried_object_id();
$id_author = 'user_'.$post_id->post_author;
$author_avatar = get_field('avatar', $id_author);
$author_name = get_field('name', $id_author);
$author_email = get_field('emal', $id_author);
$author_social_links = get_field('social_links', $id_author) ?? [];
$author_url = get_author_posts_url($post_id->post_author);
$review_rating = get_field('review_rating', $id);
$title_author = get_field('title_author');
$description_author = get_field('description_author');
$post_modified = date("j M Y, g:i a", strtotime($post_id->post_modified));

echo acf_block_before( 'Author', $is_preview );
?>
<?php get_template_part('ld+json/person');?>
  <div class="author">
      <div class="author__wrap">
        <div class="author__description">
          <?php if(!empty($title_author)):?><h2><?= $title_author; ?></h2> <span class="author__date"><?= $post_modified; ?></span><?php endif;?>
          <?php if(!empty($description_author)):?><div class="text"><?= $description_author; ?></div><?php endif;?>
        </div>
        <div class="author__cart">
          <div class="author__img-name">
            <a href="<?= $author_url; ?>"><?php if(!empty($author_avatar)):?><?= get_image($author_avatar, 'thumbnail'); ?><?php endif;?></a>
            <?php if(!empty($author_name)):?><h3><?= $author_name; ?></h3><?php endif;?>
          </div>
          <div class="author__social">
            <div>
              <?php if(!empty($author_social_links)): ?><?= social_link($author_social_links, 'icon', 'link'); ?><?php endif;?>
              <?php if(!empty($author_email)):?><a href="mailto:<?= $author_email?>" class="author__email"><?= $author_email?></a><?php endif;?>
            </div>
            <div>
              <?php if(!empty($review_rating)): ?>
                <p class="author__rating">My Rating:
                  <span>
                  <span class="empty"></span>
                  <span class="full" style="width: <?php echo $review_rating * 10; ?>%"></span>
                </span>
                </p>
              <?php endif;?>
              <?php if(!empty(comm_rating_get_average_ratings( $id ))): ?>
                <p class="author__rating">Players Rating:
                <span>
                  <span class="empty"></span>
                  <span class="full" style="width: <?php echo comm_rating_get_average_ratings( $id ) * 20; ?>%"></span>
                </span>
                </p>
                <label class="label-comment" for="comment">Add Review</label>
              <?php endif;?>
            </div>
          </div>
        </div>
      </div>
  </div>
<?php
echo acf_block_after( $is_preview );