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
	$wp_customize->add_setting( 'footer_copyright' , array(
		'default'   => __('2019 all rights reserved', 'min'),
		'transport' => 'postMessage',
	) );
	$wp_customize->add_setting( 'footer_subtitle' , array(
		'default'   => __('something about cookies', 'min'),
		'transport' => 'postMessage',
	) );
	$wp_customize->add_setting( 'footer_custom_html' , array(
		'default'   => '',
		'transport' => 'postMessage',
	) );

	// Footer controls
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_copyright_control', array(
		'label'      => __( 'Copyright line', 'min' ),
		'section'    => 'min_footer_customizer',
		'settings'   => 'footer_copyright',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_subtitle_control', array(
		'label'      => __( 'Subtitle line', 'min' ),
		'section'    => 'min_footer_customizer',
		'settings'   => 'footer_subtitle',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_customhtml_control', array(
		'label'      => __( 'Last link (custom HTML supported, but won\'t show in customizer window)', 'min' ),
		'section'    => 'min_footer_customizer',
		'settings'   => 'footer_custom_html',
		'type'       => 'textarea'
	) ) );

	// =============== Glitch =================
	$wp_customize->add_section('min_glitch_customizer', array(
		'title'     => __('Glitch Effect', 'min'),
		'priority'  => 30
	));

	$wp_customize->add_setting('min_glitch_turned_on', array(
		'default'   => '1',
		'transport' => 'refresh'
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
