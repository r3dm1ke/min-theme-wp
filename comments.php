<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package min
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
require get_template_directory().'/comment-form.php';

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
        function min_format_comment($comment, $args, $depth) {

            $GLOBALS['comment'] = $comment; ?>

            <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

                <div class="comment-intro">
                    <?php printf(__('%s', 'min'), strtolower(get_comment_author_link())) ?>
                    <it> | </it>
                    <a class="comment-permalink" href="<?php echo htmlspecialchars ( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s', 'min'), strtolower(get_comment_date()), strtolower(get_comment_time())) ?></a>
                </div>

                <?php if ($comment->comment_approved == '0') : ?>
                    <em><php _e('Your comment is awaiting moderation.') ?></em><br />
                <?php endif; ?>

                <?php comment_text(); ?>

                <div class="reply">
                    <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                </div>

            <?php }
		?>

        <div class="comment_flex_right_wrapper">
            <h3 class="comments-title">
		        <?php
		        $min_comment_count = get_comments_number();
		        if ( '1' === $min_comment_count ) {
			        printf(
			        /* translators: 1: title. */
				        esc_html__( 'one comment', 'min' )
			        );
		        } else {
			        printf( // WPCS: XSS OK.
			        /* translators: 1: comment count number, 2: title. */
				        esc_html( _nx( '%1$s comment', '%1$s comments', $min_comment_count, 'comments title', 'min' ) ),
				        number_format_i18n( $min_comment_count )
			        );
		        }
		        ?>
            </h3><!-- .comments-title -->
            <ol class="comment-list">
		        <?php
		        wp_list_comments('type=comment&callback=min_format_comment');
		        ?>
            </ol><!-- .comment-list -->
        </div>


		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'comments are closed.', 'min' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

    min_display_comment_form();
	?>

</div><!-- #comments -->
