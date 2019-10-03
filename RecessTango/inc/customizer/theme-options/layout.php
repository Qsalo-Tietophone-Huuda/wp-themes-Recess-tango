<?php
/**
* Layout options
*
* @package Theme Qsalo
* @subpackage RecessTango
* @since RecessTango 0.01
*/

// Add sidebar section
$wp_customize->add_section( 'RecessTango_layout', 
	array(
		'title'               => esc_html__( 'Layout','RecessTango' ),
		'description'         => esc_html__( 'Layout section options.', 'RecessTango' ),
		'panel'               => 'RecessTango_theme_options_panel',
	)
);

// Sidebar position setting and control.
$wp_customize->add_setting( 'RecessTango_theme_options[sidebar_position]', 
	array(
		'sanitize_callback'   => 'RecessTango_sanitize_select',
		'default'             => $options['sidebar_position'],
	)
);

$wp_customize->add_control( 'RecessTango_theme_options[sidebar_position]', 
	array(
		'label'               => esc_html__( 'Sidebar Position', 'RecessTango' ),
		'section'             => 'RecessTango_layout',
		'type'                => 'select',
		'choices'			  => RecessTango_sidebar_position(),
	)
);

// Site layout setting and control.
$wp_customize->add_setting( 'RecessTango_theme_options[site_layout]', 
	array(
		'sanitize_callback'   => 'RecessTango_sanitize_select',
		'default'             => $options['site_layout'],
	)
);

$wp_customize->add_control( 'RecessTango_theme_options[site_layout]', 
	array(
		'label'               => esc_html__( 'Site Layout', 'RecessTango' ),
		'section'             => 'RecessTango_layout',
		'type'                => 'select',
		'choices'			  => RecessTango_site_layout(),
	)
);
