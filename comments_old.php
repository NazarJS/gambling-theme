<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package latte-theme
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div class="container">
  <div id="comments" class="comments-wrapper">

    <?php
    // You can start editing here -- including this comment!
    if ( have_comments() ) :
      ?>


      <?php the_comments_navigation(); ?>

      <ol class="comment-list">
        <?php
        wp_list_comments(
          array(
            'walker'            => null,
            'max_depth'         => '',
            'style'             => 'ul',
            'callback'          => null,
            'end-callback'      => null,
            'type'              => 'all',
            'reply_text'        => 'Reply',
            'page'              => '',
            'per_page'          => '',
            'avatar_size'       => 32,
            'reverse_top_level' => null,
            'reverse_children'  => '',
            'format'            => 'html5', // или xhtml, если HTML5 не поддерживается темой
            'short_ping'        => false,    // С версии 3.6,
            'echo'              => true,     // true или false
          )
        );
        ?>
      </ol><!-- .comment-list -->

      <?php
      the_comments_navigation();

      // If comments are closed and there are comments, let's leave a little note, shall we?
      if ( ! comments_open() ) :
        ?>
        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'latte-theme' ); ?></p>
      <?php
      endif;

    endif; // Check for have_comments().

    comment_form();
    ?>

  </div><!-- #comments -->
</div>
