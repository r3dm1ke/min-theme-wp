<?php
if (!function_exists('min_display_comment_form')) {
	function min_display_comment_form() {
		// Remove email and url fields
		add_filter( 'comment_form_logged_in', '__return_empty_string' );
		function min_remove_crap_from_comment_form($fields) {
			unset($fields['email']);
			unset($fields['url']);

			// Set up placeholders
			foreach( $fields as &$field ) {
				$field = str_replace( 'id="author"', 'id="author" placeholder="name*"', $field );
			}
			return $fields;
		}
		add_filter('comment_form_default_fields', 'min_remove_crap_from_comment_form');

		// Set up placeholder for textarea
		function min_comment_textarea_placeholder( $args ) {
			$args['comment_field'] = str_replace( 'textarea', 'textarea placeholder="comment"', $args['comment_field'] );
			return $args;
		}
		add_filter( 'comment_form_defaults', 'min_comment_textarea_placeholder' );


		$comment_args = array(
			'title_reply' => 'leave a comment',
			'comment_notes_before' => '',
			'title_reply_to' => 'reply to %s',
			'cancel_reply_link' => 'never mind',
			'cancel_reply_before' => '<br><small>'
		);
		comment_form($comment_args);
	}
}

?>