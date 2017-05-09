<?php


function nrw_register_customizer_theme_options( $wp_customize ) {
	
	/*
	 * Add Sections
	 */
	$wp_customize->add_section( 'nrw_theme_options', array(
		'title' => 'Theme Options',
		'description' => null,
		'priority' => 1
	) );
	
	/*
	 * Add Settings
	 */
	$wp_customize->add_setting( 'nrw_theme_options_settings', array(
		'default' => '',
		'sanatize_callback' => 'nrw_sanatize_callback'
	) );
	
	/*
	 * Add Control
	 */
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'nrw_theme_options',
			array(
				'label' => 'Theme Options',
				'section' => 'nrw_theme_options',
				'settings' => 'nrw_theme_options_settings',
				'type' => 'text'
			)
		)
	);
	
}

add_action( 'customize_register', 'nrw_register_customizer_theme_options' );