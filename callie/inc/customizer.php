<?php
/**
 * callie Theme Customizer
 *
 * @package callie
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function callie_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'callie_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'callie_customize_partial_blogdescription',
			)
		);

		$wp_customize->add_setting('callie_copyright', array(
			'default'		=>'copyright 2020',
			'transport'		=>'refresh',
			'sanitize_callback'	=>'callie_sanitization_callback'
		));

		$wp_customize->add_control('callie_copyright', array(
			'label'		=>'Add copyright text here',
			'section'	=>'title_tagline',
			'type'		=>'text'
		));
	}
}
add_action( 'customize_register', 'callie_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function callie_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function callie_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function callie_customize_preview_js() {
	wp_enqueue_script( 'callie-customizer', get_template_directory_uri() . 'inc/js/customizer.js', array( 'customize-preview' ), true, true );
}
add_action( 'customize_preview_init', 'callie_customize_preview_js' );
