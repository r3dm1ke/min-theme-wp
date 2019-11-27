<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package min
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
add_action( 'dynamic_sidebar_before', 'min_widget_title_h2_h3' );

function min_widget_title_h2_h3( $sidebar_id ) {
	global $wp_registered_sidebars;
	if ( isset( $wp_registered_sidebars[$sidebar_id] ) ) {
		if ( isset($wp_registered_sidebars[$sidebar_id]['before_title']) ) {
			$now = $wp_registered_sidebars[$sidebar_id]['before_title'];
			$h3 = str_ireplace( '<h2', '<h3', $now );
			$wp_registered_sidebars[$sidebar_id]['before_title'] = $h3;
		}
	}
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
