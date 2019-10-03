<?php 
/**
 * Menus Customizer options
 *
 * @package Theme Qsalo
 * @subpackage RecessTango
 * @since RecessTango 0.01
 */

//menu section
$wp_customize->add_section( 'menu_options', 
	array(
		'description'		=> esc_html__( 'Extra Menu Options specific to this theme','RecessTango' ),
		'priority'			=> 10,
		'panel'  			=> 'nav_menus',
		'title'    			=> esc_html__( 'Additional Menu Options', 'RecessTango' ),
	)
);

//Disable search options
$wp_customize->add_setting( 'RecessTango_theme_options[append_search]', 
	array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $options['append_search'],
		'sanitize_callback' => 'RecessTango_sanitize_checkbox',
	)
);

$wp_customize->add_control( 'RecessTango_theme_options[append_search]', 
	array(			
		'label'    			=> esc_html__( 'Check to Append Search Options', 'RecessTango' ),
		'section'  			=> 'menu_options',
		'settings' 			=> 'RecessTango_theme_options[append_search]',
		'type'	   			=> 'checkbox',
	)
);
