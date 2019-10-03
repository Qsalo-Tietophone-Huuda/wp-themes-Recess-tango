<?php
/**
 * RecessTango Search Section Customizer options
 *
 * @package Theme Qsalo
 * @subpackage RecessTango
 * @since RecessTango 0.01
 */

// Add search section enable section
$wp_customize->add_section( 'RecessTango_search_section', array(
  'title'             => esc_html__( 'Search Section','RecessTango'),
  'description'       => esc_html__( 'Search section options.', 'RecessTango' ),
  'panel'             => 'RecessTango_sections_panel'
) );

// Add search section enable setting and control.
$wp_customize->add_setting( 'RecessTango_theme_options[search_section_enable]', array(
  'default'           => $options['search_section_enable'],
  'sanitize_callback' => 'RecessTango_sanitize_select'
) );

$wp_customize->add_control( 'RecessTango_theme_options[search_section_enable]', array(
  'label'             => esc_html__( 'Enable on', 'RecessTango' ),
  'section'           => 'RecessTango_search_section',
  'type'              => 'select',
  'choices'           => RecessTango_enable_disable_options()
) );

// Add enable page select setting and control.
$wp_customize->add_setting( 'RecessTango_theme_options[search_content_page]', array(
  'sanitize_callback' => 'RecessTango_sanitize_page'
) );

$wp_customize->add_control( 'RecessTango_theme_options[search_content_page]', array(
  'label'             => esc_html__( 'Select Page', 'RecessTango' ),
  'description'       => esc_html__( 'Note: Page title will be used for section title and featured image will be used for background.', 'RecessTango' ),
  'section'           => 'RecessTango_search_section',
  'type'              => 'dropdown-pages',
) );

// Add search section title setting and control.
$wp_customize->add_setting( 'RecessTango_theme_options[search_section_button_text]', array(
  'default'           => $options['search_section_button_text'],
  'transport'         => 'postMessage',
  'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( 'RecessTango_theme_options[search_section_button_text]', array(
  'label'             => esc_html__( 'Search Text', 'RecessTango' ),
  'section'           => 'RecessTango_search_section',
  'active_callback'   => 'RecessTango_is_search_section_active',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
  $wp_customize->selective_refresh->add_partial( 'RecessTango_theme_options[search_section_button_text]', array(
    'selector'            => '#fixed-background button.btn-orange',
    'render_callback'     => 'RecessTango_customize_partial_search_section_button_text',
    'container_inclusive' => false,
    'fallback_refresh'    => true,
  ) );
}

