<?php
/**
 * Footer options
 *
 * @package Theme Qsalo
 * @subpackage RecessTango
 * @since RecessTango 0.01
 */

/*Footer Section*/
$wp_customize->add_section( 'RecessTango_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'RecessTango' ),
		'priority'   			=> 900,
		'panel'      			=> 'RecessTango_theme_options_panel',
	)
);

// footer text
$wp_customize->add_setting( 'RecessTango_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'RecessTango_santize_allow_tag',
	)
);
$wp_customize->add_control( 'RecessTango_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Footer Text', 'RecessTango' ),
		'section'    			=> 'RecessTango_section_footer',
		'type'		 			=> 'textarea',
    )
);

// scroll top visible
$wp_customize->add_setting( 'RecessTango_theme_options[scroll_top_visible]',
	array(
		'default'       		=> $options['scroll_top_visible'],
		'sanitize_callback'		=> 'RecessTango_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'RecessTango_theme_options[scroll_top_visible]',
    array(
		'label'      			=> esc_html__( 'Display Scroll Top Button', 'RecessTango' ),
		'section'    			=> 'RecessTango_section_footer',
		'type'		 			=> 'checkbox',
    )
);
