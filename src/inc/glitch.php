<?php

if (get_theme_mod('min_glitch_turned_on') == '1') {

    add_filter('body_class', 'min_add_glitch_body_class');
	if ( ! function_exists( 'min_add_glitch_body_class' ) ) {
		function min_add_glitch_body_class($classes) {
			return array_merge( $classes, array( 'with-glitch' ) );
		}
	}

	add_filter( 'nav_menu_link_attributes', 'min_glitch_menu_atts', 10, 3 );
	if ( ! function_exists( 'min_glitch_menu_atts' ) ) {
		function min_glitch_menu_atts( $atts, $item, $args ) {
			$atts['data-glitch'] = $item->title;
			$atts['class']       = 'glitch';

			return $atts;
		}
	}

	add_action( 'wp_footer', 'min_get_glitch_color_stylesheet' );
	if ( ! function_exists( 'min_get_glitch_color_stylesheet' ) ) {
		function min_get_glitch_color_stylesheet() { ?>
            <style>
                .glitch:after {
                    color: <?php echo esc_html(get_theme_mod('min_glitch_color_2')); ?>;
                }

                .glitch:before {
                    color: <?php echo esc_html(get_theme_mod('min_glitch_color_1')); ?>;
                }
            </style> <?php
		}
	}
}

