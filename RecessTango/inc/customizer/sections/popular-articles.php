<?php
/**
 * RecessTango Popular Articles Customizer options
 *
 * @package Theme Qsalo
 * @subpackage RecessTango
 * @since RecessTango 0.01
 */

// Add popular articles enable section
$wp_customize->add_section( 'RecessTango_popular_articles_section', array(
	'title'             => esc_html__( 'Popular Articles','RecessTango'),
	'description'       => esc_html__( 'Popular Articles section options.', 'RecessTango' ),
	'panel'             => 'RecessTango_sections_panel'
) );

// Add category blog enable setting and control.
$wp_customize->add_setting( 'RecessTango_theme_options[popular_articles_enable]', array(
	'default'           => $options['popular_articles_enable'],
	'sanitize_callback' => 'RecessTango_sanitize_select'
) );

$wp_customize->add_control( 'RecessTango_theme_options[popular_articles_enable]', array(
	'label'             => esc_html__( 'Enable on', 'RecessTango' ),
	'section'           => 'RecessTango_popular_articles_section',
	'type'              => 'select',
	'choices'           => RecessTango_enable_disable_options()
) );

// Add Popular articles title setting and control.
$wp_customize->add_setting( 'RecessTango_theme_options[popular_articles_title]', array(
	'default'           => $options['popular_articles_title'],
	'transport'         => 'postMessage',
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( 'RecessTango_theme_options[popular_articles_title]', array(
	'label'           	=> esc_html__( 'Title', 'RecessTango' ),
	'section'         	=> 'RecessTango_popular_articles_section',
	'active_callback' 	=> 'RecessTango_is_popular_articles_section_active',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'RecessTango_theme_options[popular_articles_title]', array(
		'selector'            => '#popular-articles h2.entry-title',
		'render_callback'     => 'RecessTango_customize_partial_popular_articles_title',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
	) );
}

// Show category type setting and control
$wp_customize->add_setting( 'RecessTango_theme_options[popular_articles_content_category]', array(
	'sanitize_callback' => 'RecessTango_sanitize_dropdown_category_list'
) );

$wp_customize->add_control( new RecessTango_Dropdown_Category_Control( $wp_customize, 'RecessTango_theme_options[popular_articles_content_category]', array(
	'label'           => esc_html__( 'Select Category', 'RecessTango' ),
	'description'     => esc_html__( 'Two latest posts from selected category will be shown.', 'RecessTango' ),
	'type'			  => 'dropdown-category',
	'section'         => 'RecessTango_popular_articles_section',
	'active_callback' => 'RecessTango_is_popular_articles_section_active',
) ) );
