<?php
/**
* Breadcrumb options
*
* @package Theme Qsalo
* @subpackage RecessTango
* @since RecessTango 0.01
*/

$wp_customize->add_section( 'RecessTango_breadcrumb', 
	array(
		'title'             => esc_html__( 'Breadcrumb','RecessTango' ),
		'description'       => esc_html__( 'Breadcrumb section options.', 'RecessTango' ),
		'panel'             => 'RecessTango_theme_options_panel',
	)
);

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'RecessTango_theme_options[breadcrumb_enable]', 
	array(
		'sanitize_callback'	=> 'RecessTango_sanitize_checkbox',
		'default'          	=> $options['breadcrumb_enable'],
	)
);

$wp_customize->add_control( 'RecessTango_theme_options[breadcrumb_enable]', 
	array(
		'label'            	=> esc_html__( 'Enable Breadcrumb', 'RecessTango' ),
		'section'          	=> 'RecessTango_breadcrumb',
		'type'             	=> 'checkbox',
	)
);
