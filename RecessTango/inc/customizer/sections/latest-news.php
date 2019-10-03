<?php
/**
 * RecessTango Latest News Customizer options
 *
 * @package Theme Qsalo
 * @subpackage RecessTango
 * @since RecessTango 0.01
 */

// Add latest news enable section
$wp_customize->add_section( 'RecessTango_latest_news_section', 
	array(
		'title'             => esc_html__( 'Latest News','RecessTango'),
		'description'       => esc_html__( 'Latest news section options.', 'RecessTango' ),
		'panel'             => 'RecessTango_sections_panel',
	)
);

// Add latest news enable setting and control.
$wp_customize->add_setting( 'RecessTango_theme_options[latest_news_enable]', 
	array(
		'default'           => $options['latest_news_enable'],
		'sanitize_callback' => 'RecessTango_sanitize_select',
	)
);

$wp_customize->add_control( 'RecessTango_theme_options[latest_news_enable]', 
	array(
		'label'             => esc_html__( 'Enable on', 'RecessTango' ),
		'section'           => 'RecessTango_latest_news_section',
		'type'              => 'select',
		'choices'           => RecessTango_enable_disable_options(),
	)
);

// Add latest news title setting and control.
$wp_customize->add_setting( 'RecessTango_theme_options[latest_news_title]', 
	array(
		'default'           => $options['latest_news_title'],
		'transport'			=> 'postMessage',
		'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control( 'RecessTango_theme_options[latest_news_title]', 
	array(
		'label'           	=> esc_html__( 'Title', 'RecessTango' ),
		'section'         	=> 'RecessTango_latest_news_section',
		'active_callback' 	=> 'RecessTango_is_latest_news_section_active',
	)
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'RecessTango_theme_options[latest_news_title]', 
		array(
			'selector'            => '#latest-news h2.entry-title',
			'render_callback'     => 'RecessTango_customize_partial_latest_news_title',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
		)
	);
}

// Add trending section content type setting and control.
$wp_customize->add_setting( 'RecessTango_theme_options[latest_news_content_type]', 
	array(
		'default'           	=> $options['latest_news_content_type'],
		'sanitize_callback' 	=> 'RecessTango_sanitize_select',
	)
);

$wp_customize->add_control( 'RecessTango_theme_options[latest_news_content_type]', 
	array(
	    'label'             	=> esc_html__( 'Content Type', 'RecessTango' ),
	    'description'			=> esc_html__( 'Select content type', 'RecessTango' ),
	    'section'           	=> 'RecessTango_latest_news_section',
	    'type'              	=> 'select',
	    'choices'           	=>  array(
	    	'category' 			=> esc_html__( 'Category', 'RecessTango' ),
	    ),
	    'active_callback'		=> 'RecessTango_is_latest_news_section_active',
	)
);

// Category Content Type
$wp_customize->add_setting(  'RecessTango_theme_options[latest_news_content_category]', array(
  		'sanitize_callback' 	=> 'RecessTango_sanitize_category_list',
) ) ;

$wp_customize->add_control( new RecessTango_Multi_Select_Category_Control ( $wp_customize,'RecessTango_theme_options[latest_news_content_category]', 
	array(
		'label'             	=> esc_html__( 'Select Category', 'RecessTango' ),
		'section'           	=> 'RecessTango_latest_news_section',
		'type'              	=> 'dropdown-category',
		'active_callback'   	=> 'RecessTango_is_latest_news_category_active',
	)
) );
