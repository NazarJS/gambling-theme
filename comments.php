<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bettingtheme
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
global $post;

$commenter = wp_get_current_commenter();
$req       = get_option( 'require_name_email' );
$aria_req  = ( $req ? " " : '' );
$html_req  = ( $req ? " required='required'" : '' );
$html5     = current_theme_supports( 'html5', 'comment-form' );

$defaults = [
	'fields'               => [
		'author'  => '<input id="author" class="comment-respond__input" name="author" placeholder="' . __( 'Name' ) . ' *" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . $html_req . ' />',
		'email'   => '<input id="email" class="comment-respond__input" name="email" placeholder="' . __( 'Email' ) . ' *" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '" aria-describedby="email-notes"' . $aria_req . $html_req . ' />',
		'url'     => '',
		'cookies' => '',
	],
	'comment_field'        => '<textarea id="comment" name="comment" class="comment-respond__input"   required="required"></textarea>',
	'comment_notes_before' => '',
	'comment_notes_after'  => '',
	'id_form'              => 'commentform',
	'id_submit'            => 'submit',
	'class_form'           => 'comment-form',
	'class_submit'         => 'submit btn btn-with-back',
	'name_submit'          => 'submit',
	'title_reply'          => __( 'Leave a Reply' ),
	'title_reply_to'       => __( 'Leave a Reply to %s' ),
	'title_reply_before'   => '<h2 id="reply-title" class="comment-reply-title">',
	'title_reply_after'    => '</h2>',
	'cancel_reply_before'  => ' <small>',
	'cancel_reply_after'   => '</small>',
	'cancel_reply_link'    => __( 'Cancel reply' ),
	'label_submit'         => __( 'Post Comment' ),
	'submit_button'        => '<button name="%1$s" type="submit" id="%2$s" class="%3$s" ><i class="reply-icon"></i>%4$s</button>',
	'submit_field'         => '%1$s %2$s',
	'format'               => 'xhtml',
];
?>
<?php if ( comments_open() ) : ?>

        <div id="comments" class="comments-area">
            <div class="container">

                        <?php comment_form( $defaults ); ?>
					<?php
					// You can start editing here -- including this comment!
					if ( have_comments() ) :
						?>

                        <ul class="comments">
							<?php
							wp_list_comments(
								array(
									'walker'            => null,
									'max_depth'         => '',
									'style'             => 'ul',
									'callback'          => 'mytheme_comment',
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
                        </ul><!-- .comment-list -->

					<?php endif; // Check for have_comments().?>

            </div>
        </div><!-- #comments -->

<?php endif; ?>