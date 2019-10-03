<?php
/**
 * Excerpt options
 *
 * @package Theme Qsalo
 * @subpackage RecessTango
 * @since RecessTango 0.01
 */

// Add excerpt section
$wp_customize->add_section( 'RecessTango_excerpt_section', 
	array(
		'title'             => esc_html__( 'Excerpt','RecessTango' ),
		'description'       => esc_html__( 'Excerpt section options.', 'RecessTango' ),
		'panel'             => 'RecessTango_theme_options_panel'
	)
);


// long Excerpt length setting and control.
$wp_customize->add_setting( 'RecessTango_theme_options[long_excerpt_length]', 
	array(
		'sanitize_callback' => 'RecessTango_sanitize_number_range',
		'validate_callback' => 'RecessTango_validate_long_excerpt',
		'default'			=> $options['long_excerpt_length'],
	)
);

$wp_customize->add_control( 'RecessTango_theme_options[long_excerpt_length]', 
	array(
		'label'       		=> esc_html__( 'Blog Page Excerpt Length', 'RecessTango' ),
		'description' 		=> esc_html__( 'Total words to be displayed in archive page/search page.', 'RecessTango' ),
		'section'     		=> 'RecessTango_excerpt_section',
		'type'        		=> 'number',
		'input_attrs' 		=> array(
			'style'       	=> 'width: 80px;',
			'max'         	=> 100,
			'min'         	=> 5,
		),
	)
);


// Read more text.
$wp_customize->add_setting( 'RecessTango_theme_options[read_more_text]', 
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'			=> $options['read_more_text'],
	)
);

$wp_customize->add_control( 'RecessTango_theme_options[read_more_text]', 
	array(
		'label'       		=> esc_html__( 'Read More Text', 'RecessTango' ),
		'section'     		=> 'RecessTango_excerpt_section',
		'type'        		=> 'text',
	)
);
