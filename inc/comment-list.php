<?php

function mytheme_comment( $comment, $args, $depth ) {
	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}

	$classes = ' ' . comment_class( empty( $args['has_children'] ) ? '' : 'parent', null, null, false );
	?>

    <<?php echo $tag, $classes; ?> id="comment-<?php comment_ID() ?>">
    <article id="div-comment-<?php comment_ID() ?>"  itemscope="" itemtype="https://schema.org/Comment">
        <div class="comment__body">
            <div class="comment__author vcard" itemprop="author" itemscope="" itemtype="https://schema.org/Person">
				<?php printf( __( '<h3 itemprop="name" >%s</h3>' ), get_comment_author() ); ?>
            </div>
            <div class="comment__meta commentmetadata" itemprop="dateCreated">
				<?php
				printf(
					__( '%1$s %2$s' ),
					get_comment_date(),
					get_comment_time()
				); ?>
            </div>
        </div>
		<?php if ( $comment->comment_approved == '0' ) { ?>
            <em class="comment__awaiting-moderation">
				<?php _e( 'Your comment is awaiting moderation.' ); ?>
            </em>
		<?php } ?>
        <div class="comment__text" itemprop="text">
			<?php comment_text(); ?>
        </div>

    </article>
	<?php
}