<?php
/**
* Homepage (Static ) options
*
* @package Theme Qsalo
* @subpackage RecessTango
* @since RecessTango 0.01
*/

// Homepage (Static ) setting and control.
$wp_customize->add_setting( 'RecessTango_theme_options[enable_frontpage_content]', 
	array(
		'sanitize_callback' => 'RecessTango_sanitize_checkbox',
		'default'           => $options['enable_frontpage_content'],
	)
);

$wp_customize->add_control( 'RecessTango_theme_options[enable_frontpage_content]', 
	array(
		'label'       		=> esc_html__( 'Enable Content', 'RecessTango' ),
		'description' 		=> esc_html__( 'Check to enable content on static front page only.', 'RecessTango' ),
		'section'     		=> 'static_front_page',
		'type'        		=> 'checkbox'
	)
);
