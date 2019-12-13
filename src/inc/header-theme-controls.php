<?php

if ( ! function_exists( 'min_enqueue_theme_controls' ) ) {
	function min_enqueue_theme_controls() {
        add_filter('wp_nav_menu_menu-1_items', 'min_get_night_mode_toggle');
        add_filter('wp_nav_menu_menu-1_items', 'min_get_search_bar_toggle');
	}
}

if ( ! function_exists( 'min_get_night_mode_toggle' ) ) {
	function min_get_night_mode_toggle($items) {
	    $toggle_name = esc_html__('night mode', 'min');
        return $items . '<a href="#" data-glitch="' . $toggle_name . '" class="glitch">
               ' . $toggle_name . '</a>';
	}
}

if ( ! function_exists( 'min_get_search_bar_toggle' ) ) {
	function min_get_search_bar_toggle($items) {
        $toggle_name = esc_html__('search', 'min');
        return $items . '<a href="#" data-glitch=' . $toggle_name . ' class="glitch">
               ' . $toggle_name . '</a>';
	}
}

min_enqueue_theme_controls();

if (!function_exists('min_render_theme_controls')) {
	function min_render_theme_controls() {
		$min_night_mode = get_theme_mod('min_night_mode_turned_on');
		$min_search_form = get_theme_mod('min_search_widget_turned_on');
		if ($min_night_mode == '1' || $min_search_form == '1') {
			if ($min_search_form == '1') { min_render_hideable_search_form(); }?>
			<div class="permanent-menu-container">
				<ul id="permanent-menu" class="menu">
					<?php if ($min_night_mode == '1') {
						min_render_night_mode_control();
					}
					if ($min_search_form == '1') {
						min_render_hideable_search_form_toggle();
					} ?>
				</ul>
			</div>
		<?php
		}
	}
}

if (!function_exists('min_render_night_mode_control')) {
	function min_render_night_mode_control() {
        ?>
		<li id="menu-item-9" class="night_mode_toggle menu-item menu-item-type-custom menu-item-object-custom">
			<a href="#" data-glitch="<?php esc_html_e('night mode', 'min') ?>" class="glitch"><?php esc_html_e('night mode', 'min') ?></a>
		</li>
        <?php
	}
}

if ( ! function_exists( 'min_render_hideable_search_form_toggle' ) ) {
	function min_render_hideable_search_form_toggle() {
		?>
		<li id="menu-item-10" class="search-trigger menu-item menu-item-type-custom menu-item-object-custom">
			<a href="#" data-glitch="<?php esc_html_e('search', 'min') ?>" class="glitch"><?php esc_html_e('search', 'min') ?></a>
		</li>
		<?php
	}
}

if ( ! function_exists( 'min_render_hideable_search_form' ) ) {
	function min_render_hideable_search_form() {
		?>
		<form aria-hidden="true" role="search" method="get" class="search-form hidden" action="<?php echo esc_attr(home_url( '/' )); ?>" name="form">
			<label>
				<span class="screen-reader-text"><?php esc_html_e('Search for:', 'min') ?></span>
				<input type="search" class="search-field" placeholder="Search ..." value="" name="s">
			</label>
			<a class="search-submit glitch" tabindex='0' onclick="form.submit()"><?php esc_html_e('search', 'min'); ?></a>
			<a class="search-hide glitch" tabindex='0' id="search-hide-trigger"><?php esc_html_e('hide', 'min'); ?></a>
		</form>
		<?php
	}
}
?>