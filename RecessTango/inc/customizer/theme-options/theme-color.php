<?php
/**
* Theme color options
*
* @package RecessTango
* @since RecessTango 0.1
*/

// Site layout setting and control.
$wp_customize->add_setting( 'RecessTango_theme_options[theme_color]', array(
	'sanitize_callback'   => 'RecessTango_sanitize_select',
	'default'             => $options['theme_color']
) );

$wp_customize->add_control( 'RecessTango_theme_options[theme_color]', array(
	'label'               => esc_html__( 'Theme Color', 'RecessTango' ),
	'section'             => 'colors',
	'type'                => 'select',
	'choices'			  => array(
		'blue'			=> esc_html__( 'Blue', 'RecessTango' ),
		'curry-green'			=> esc_html__( 'Curry green', 'RecessTango' ),
		'dark-blue'		=> esc_html__( 'Dark Blue', 'RecessTango' ),
		),
) );
