<?php

if ( ! function_exists( 'min_enqueue_theme_controls' ) ) {
	function min_enqueue_theme_controls() {
        add_filter('wp_nav_menu_items', 'min_get_night_mode_toggle', 10, 2);
        add_filter('wp_nav_menu_items', 'min_get_search_bar_toggle', 10, 2);
	}
}

min_enqueue_theme_controls();

if ( ! function_exists( 'min_get_night_mode_toggle' ) ) {
	function min_get_night_mode_toggle($items, $args) {
	    if ($args->menu == 'menu-1') {
		    $toggle_name = esc_html__( 'night mode', 'min' );
		    return $items . '<li class="night_mode_toggle"><a href="#" data-glitch="' . $toggle_name . '" class="glitch">
                   ' . $toggle_name . '</a></li>';
	    }
	    return $items;
	}
}

if ( ! function_exists( 'min_get_search_bar_toggle' ) ) {
	function min_get_search_bar_toggle($items, $args) {
		if ($args->menu == 'menu-1') {
			$toggle_name = esc_html__( 'search', 'min' );
			return $items . '<li class="search-trigger"><a href="#" data-glitch=' . $toggle_name . ' class="glitch">
                   ' . $toggle_name . '</a></li>'.min_get_hideable_search_form();
		}
		return $items;
	}
}

if ( ! function_exists( 'min_get_hideable_search_form' ) ) {
	function min_get_hideable_search_form() {
		return '
		<li class="search-form-hideable hidden-by-search">
		    <form 
		        aria-hidden="true" 
		        role="search" 
		        method="get" 
		        action="' . esc_attr(home_url( '/' )) . '" name="form">
				<label>
					<span class="screen-reader-text">
					    ' . esc_html__('Search for:', 'min') . '
	                </span>
					<input type="search" class="search-field" placeholder="Search ..." value="" name="s">
				</label>
				<a 
	                class="search-submit glitch" 
	                tabindex="0" 
	                onclick="form.submit()"> 
	                ' . esc_html__('search', 'min') . '
	            </a>
				<a 
				    class="search-hide glitch" 
				    tabindex="0"
				    id="search-hide-trigger"
	            >
	                
	                ' . esc_html__('hide', 'min') . '
	            </a>
			</form>
		</li>';
	}
}
