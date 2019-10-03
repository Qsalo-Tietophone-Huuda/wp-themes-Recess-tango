<?php
/**
 * Reset options
 *
 * @package Theme Qsalo
 * @subpackage RecessTango
 * @since RecessTango 0.01
 */

/**
* Reset section
*/

// Add reset enable section
$wp_customize->add_section( 'RecessTango_reset_section', 
	array(
		'title'             => esc_html__( 'Reset all settings', 'RecessTango' ),
		'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'RecessTango' ),
	)
);

// Add reset enable setting and control.
$wp_customize->add_setting( 'RecessTango_theme_options[reset_options]', 
	array(
		'default'           => $options['reset_options'],
		'sanitize_callback' => 'RecessTango_sanitize_checkbox',
		'transport'			=> 'postMessage',
	)
);

$wp_customize->add_control( 'RecessTango_theme_options[reset_options]', 
	array(
		'label'             => esc_html__( 'Check to reset all settings', 'RecessTango' ),
		'section'           => 'RecessTango_reset_section',
		'type'              => 'checkbox',
	)
);
