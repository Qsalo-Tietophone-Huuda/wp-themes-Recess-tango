<?php
/**
* pagination options
*
* @package Theme Qsalo
* @subpackage RecessTango
* @since RecessTango 0.01
*/

// Add sidebar section
$wp_customize->add_section( 'RecessTango_pagination', 
	array(
		'title'               => esc_html__( 'Pagination','RecessTango' ),
		'description'         => esc_html__( 'Pagination section options.', 'RecessTango' ),
		'panel'               => 'RecessTango_theme_options_panel',
	)
);

// Sidebar position setting and control.
$wp_customize->add_setting( 'RecessTango_theme_options[pagination_enable]', 
	array(
		'sanitize_callback'   => 'RecessTango_sanitize_checkbox',
		'default'             => $options['pagination_enable'],
	)
);

$wp_customize->add_control( 'RecessTango_theme_options[pagination_enable]', 
	array(
		'label'               => esc_html__( 'Pagination Enable', 'RecessTango' ),
		'section'             => 'RecessTango_pagination',
		'type'                => 'checkbox',
	)
);
