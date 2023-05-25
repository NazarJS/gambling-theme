<?php

/* save result  */
add_action( 'comment_post', 'comm_rating_save_comment_rating' );
function comm_rating_save_comment_rating( $comment_id ) {
  $rating = 5;
  if ( ( isset( $_POST['rating'] ) ) && ( '' !== $_POST['rating'] ) )
    $rating = intval( $_POST['rating'] );
  add_comment_meta( $comment_id, 'rating', $rating );
}

/**
 *  Average rating
 *  @param int $id post ID;
 *
 * */
function comm_rating_get_average_ratings( int $id ) {
  $comments = get_approved_comments( $id );
  if ( $comments ) {
    $i = 0;
    $total = 0;
    foreach( $comments as $comment ){
      $rate = get_comment_meta( $comment->comment_ID, 'rating', true );
      if( isset( $rate ) && '' !== $rate ) {
        $i++;
        $total += $rate;
      }
    }

    if ( 0 === $i ) {
      return false;
    } else {
      return round( $total / $i, 1 );
    }
  } else {
    return false;
  }
}

/* captcha */
function mytheme_comment_captcha() {

  $comment_captcha = new ReallySimpleCaptcha();

  $comment_captcha_defaults = array(
    'chars' => 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789',
    'char_length' => '4',
    'img_size' => array( '72', '24' ),
    'fg' => array( '0', '0', '0' ),
    'bg' => array( '255', '255', '255' ),
    'font_size' => '16',
    'font_char_width' => '15',
    'img_type' => 'png',
    'base' => array( '6', '18'),
  );

  $comment_captcha_form_label = 'Captcha:';

  $comment_captcha_word = $comment_captcha->generate_random_word();
  $comment_captcha_prefix = mt_rand();
  $comment_captcha_image_name = $comment_captcha->generate_image($comment_captcha_prefix, $comment_captcha_word);
  $comment_captcha_image_url =  get_bloginfo('wpurl') . '/wp-content/plugins/really-simple-captcha/tmp/';
  $comment_captcha_image_src = $comment_captcha_image_url . $comment_captcha_image_name;
  $comment_captcha_image_width = $comment_captcha->img_size[0];
  $comment_captcha_image_height = $comment_captcha->img_size[1];
  $comment_captcha_field_size = $comment_captcha->char_length;
  ?>
  <p class="comment-form-captcha">
    <img src="<?php echo $comment_captcha_image_src; ?>"
         alt="captcha"
         width="<?php echo $comment_captcha_image_width; ?>"
         height="<?php echo $comment_captcha_image_height; ?>" />
    <label for="captcha_code"><?php echo $comment_captcha_form_label; ?></label>
    <input id="comment_captcha_code" name="comment_captcha_code"
           size="<?php echo $comment_captcha_field_size; ?>" type="text" />
    <input id="comment_captcha_prefix" name="comment_captcha_prefix" type="hidden"
           value="<?php echo $comment_captcha_prefix; ?>" />
  </p>
  <?php
}
if ( class_exists('ReallySimpleCaptcha') ) {
  add_action( 'comment_form_after_fields' , 'mytheme_comment_captcha' );
}

function mytheme_check_comment_captcha( $comment_data  ) {
  $comment_captcha = new ReallySimpleCaptcha();
  $comment_captcha_prefix = $_POST['comment_captcha_prefix'];
  $comment_captcha_code = $_POST['comment_captcha_code'];
  $comment_captcha_correct = false;
  $comment_captcha_check = $comment_captcha->check( $comment_captcha_prefix, $comment_captcha_code );
  $comment_captcha_correct = $comment_captcha_check;
  $comment_captcha->remove($comment_captcha_prefix);
  $comment_captcha->cleanup();
  if ( ! $comment_captcha_correct ) {
    wp_die('You have entered an incorrect CAPTCHA value. Click the BACK button on your browser, reload page and try again.');
  }
  return $comment_data;
}
if ( ( class_exists('ReallySimpleCaptcha') ) ) {
  add_filter('preprocess_comment', 'mytheme_check_comment_captcha', 0);
}