<?php
/**
 * min Theme Customizer
 *
 * @package min
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function min_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'min_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'min_customize_partial_blogdescription',
		) );
	}

	// ============== Footer ==============
	$wp_customize->add_section( 'min_footer_customizer' , array(
		'title'      => __( 'Footer', 'min' ),
		'priority'   => 30,
	) );

	// Footer options
	$wp_customize->add_setting( 'min_footer_copyright' , array(
		'default'   => __('2019 all rights reserved', 'min'),
		'transport' => 'postMessage',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	) );
	$wp_customize->add_setting( 'min_footer_subtitle' , array(
		'default'   => __('something about cookies', 'min'),
		'transport' => 'postMessage',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	) );
	$wp_customize->add_setting( 'min_footer_custom_html' , array(
		'default'   => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'wp_kses_post'
	) );

	// Footer controls
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'min_footer_copyright', array(
		'label'      => __( 'Copyright line', 'min' ),
		'section'    => 'min_footer_customizer',
		'settings'   => 'min_footer_copyright',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'min_footer_subtitle', array(
		'label'      => __( 'Subtitle line', 'min' ),
		'section'    => 'min_footer_customizer',
		'settings'   => 'min_footer_subtitle',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'min_footer_custom_html', array(
		'label'      => __( 'Last link (custom HTML supported, but won\'t show in customizer window)', 'min' ),
		'section'    => 'min_footer_customizer',
		'settings'   => 'min_footer_custom_html',
		'type'       => 'textarea'
	) ) );

	// =============== Glitch =================
	$wp_customize->add_section('min_glitch_customizer', array(
		'title'     => __('Glitch Effect', 'min'),
		'priority'  => 30
	));

	$wp_customize->add_setting('min_glitch_turned_on', array(
		'default'   => '1',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));

	$wp_customize->add_setting('min_glitch_color_1', array(
		'default'   => '#0ff',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color'
	));

	$wp_customize->add_setting('min_glitch_color_2', array(
		'default'   => '#f0f',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color'
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'min_glitch_turned_on', array(
		'label'     => __('Turn Glitch effect on hover globally', 'min'),
		'section'   => 'min_glitch_customizer',
		'settings'  => 'min_glitch_turned_on',
		'type'      => 'checkbox'
	)));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'min_glitch_color_1', array(
		'label'     => __('Glitch color #1', 'min'),
		'section'   => 'min_glitch_customizer',
		'settings'  => 'min_glitch_color_1'
	)));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'min_glitch_color_2', array(
		'label'     => __('Glitch color #2', 'min'),
		'section'   => 'min_glitch_customizer',
		'settings'  => 'min_glitch_color_2'
	)));

	// ============= Cookie banner ===============
	$wp_customize->add_section('min_cookie_banner_customizer', array(
		'title'     => __('GDPR Cookie Banner', 'min'),
		'priority'  => 20
	));

	$wp_customize->add_setting('min_cookie_banner_turned_on', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));

	$wp_customize->add_setting('min_cookie_banner_text', array(
		'default'           => __('This website uses cookies to ensure you get the best experience on our website.', 'min'),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));

	$wp_customize->add_setting('min_cookie_banner_button_text', array(
		'default'           => __('Got it!', 'min'),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));

	$wp_customize->add_setting('min_cookie_banner_learn_more_text', array(
		'default'           => __('Learn more...', 'min'),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));

	$wp_customize->add_setting('min_cookie_banner_learn_more_link', array(
		'default'           => __('https://www.cookiesandyou.com/', 'min'),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'esc_url'
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'min_cookie_banner_turned_on', array(
		'label'     => __('Turn on GPDR cookie banner?', 'min'),
		'section'   => 'min_cookie_banner_customizer',
		'settings'  => 'min_cookie_banner_turned_on',
		'type'      => 'checkbox'
	)));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'min_cookie_banner_text', array(
		'label'     => __('Text for cookie consent banner', 'min'),
		'section'   => 'min_cookie_banner_customizer',
		'settings'  => 'min_cookie_banner_text',
	)));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'min_cookie_banner_button_text', array(
		'label'     => __('Text for confirmation button', 'min'),
		'section'   => 'min_cookie_banner_customizer',
		'settings'  => 'min_cookie_banner_button_text',
	)));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'min_cookie_banner_learn_more_text', array(
		'label'     => __('Text for learn more link', 'min'),
		'section'   => 'min_cookie_banner_customizer',
		'settings'  => 'min_cookie_banner_learn_more_text',
	)));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'min_cookie_banner_learn_more_link', array(
		'label'     => __('Link for learn more', 'min'),
		'section'   => 'min_cookie_banner_customizer',
		'settings'  => 'min_cookie_banner_learn_more_link',
	)));

	// ========= Night mode & search in navbar ==========
	$wp_customize->add_section('min_navbar_extras', array(
		'title'     => __('Night mode and search in  navbar', 'min'),
		'priority'  => 50
	));

	$wp_customize->add_setting('min_night_mode_turned_on', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));

	$wp_customize->add_setting('min_search_widget_turned_on', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'min_night_mode_turned_on', array(
		'label'     => __('Turn on night mode toggle in navbar', 'min'),
		'section'   => 'min_navbar_extras',
		'settings'  => 'min_night_mode_turned_on',
		'type'      => 'checkbox'
	)));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'min_search_widget_turned_on', array(
		'label'     => __('Turn on search widget in navbar', 'min'),
		'section'   => 'min_navbar_extras',
		'settings'  => 'min_search_widget_turned_on',
		'type'      => 'checkbox'
	)));

	// ====== LAYOUT ======
	$wp_customize->add_section('min_layout_customizer', array(
		'title'     => __('Global Layout Settings', 'min'),
		'priority'  => '30'
	));

	$wp_customize->add_setting('min_layout_type', array(
		'default'           => 'content-sidebar',
		'transport'         => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'min_layout_type', array(
		'label'     => __('Layout type', 'min'),
		'section'   => 'min_layout_customizer',
		'settings'  => 'min_layout_type',
		'type'      => 'radio',
		'choices'   => array(
			'content-sidebar'   => __('Content - Sidebar', 'min'),
			'sidebar-content'   => __('Sidebar - Content', 'min')
		)
	)));
}
add_action( 'customize_register', 'min_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function min_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function min_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function min_customize_preview_js() {
	wp_enqueue_script( 'min-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'min_customize_preview_js' );
