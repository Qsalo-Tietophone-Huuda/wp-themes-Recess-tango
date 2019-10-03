<?php
/**
 * RecessTango Featured category Customizer options
 *
 * @package Theme Qsalo
 * @subpackage RecessTango
 * @since RecessTango 0.01
 */

// Add featured post enable section
$wp_customize->add_section( 'RecessTango_featured_category_section', 
	array(
		'title'             => esc_html__( 'Featured Category','RecessTango'),
		'description'       => esc_html__( 'Featured category section options.', 'RecessTango' ),
		'panel'             => 'RecessTango_sections_panel',
	)
);

// Add category blog enable setting and control.
$wp_customize->add_setting( 'RecessTango_theme_options[featured_category_enable]', 
	array(
		'default'           => $options['featured_category_enable'],
		'sanitize_callback' => 'RecessTango_sanitize_select',
	)
);

$wp_customize->add_control( 'RecessTango_theme_options[featured_category_enable]', 
	array(
		'label'             => esc_html__( 'Enable on', 'RecessTango' ),
		'section'           => 'RecessTango_featured_category_section',
		'type'              => 'select',
		'choices'           => RecessTango_enable_disable_options(),
	)
);

// Add category blog content type setting and control.
$wp_customize->add_setting( 'RecessTango_theme_options[featured_category_content_type]', array(
		'default'           => $options['featured_category_content_type'],
		'sanitize_callback' => 'RecessTango_sanitize_select',
	)
);

$wp_customize->add_control( 'RecessTango_theme_options[featured_category_content_type]', array(
		'label'           	=> esc_html__( 'Content Type', 'RecessTango' ),
		'section'         	=> 'RecessTango_featured_category_section',
		'type'            	=> 'select',
		'active_callback' 	=> 'RecessTango_is_featured_category_section_active',
		'choices'         	=> array(
	        'category' 		=> esc_html__( 'Category', 'RecessTango' ),
	),
) );

for( $i=1; $i<=4; $i++ ){
	
	/**
 	 * Content type: Catgory
	 */ 

	// Show category type setting and control
	$wp_customize->add_setting( 'RecessTango_theme_options[featured_category_content_category_'. $i .']', 
		array(
			'sanitize_callback' => 'RecessTango_sanitize_dropdown_category_list'
		)
	);

	$wp_customize->add_control( new RecessTango_Dropdown_Category_Control( $wp_customize, 'RecessTango_theme_options[featured_category_content_category_'. $i .']', 
		array(
			'label'           	=> sprintf( esc_html__( 'Select Category # %1$s', 'RecessTango' ), $i ),
			'description'     	=> esc_html__( 'Only top post from selected category will be shown.', 'RecessTango' ),
			'section'         	=> 'RecessTango_featured_category_section',
			'active_callback' 	=> 'RecessTango_is_featured_category_section_active',
		)
	) );
}
