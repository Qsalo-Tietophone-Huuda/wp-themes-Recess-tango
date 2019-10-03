<?php
/**
 * Recess Tango options
 *
 * @package Theme Qsalo
 * @subpackage RecessTango
 * @since RecessTango 0.01
 */

if( ! function_exists( 'RecessTango_enable_disable_options' ) ) :
    /**
     * Section enable/disable options
     * @return array enable/disable options
     */
    function RecessTango_enable_disable_options() {
        $RecessTango_enable_disable_options = array(
            'static-frontpage'  => esc_html__( 'Static Frontpage', 'RecessTango' ),
            'disabled'          => esc_html__( 'Disabled', 'RecessTango' ),
        );

        $output = apply_filters( 'RecessTango_enable_disable_options', $RecessTango_enable_disable_options );
      
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;

if( ! function_exists( 'RecessTango_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function RecessTango_site_layout() {
        $RecessTango_site_layout = array(
            'wide'  => esc_html__( 'Wide', 'RecessTango' ),
            'boxed' => esc_html__( 'Boxed', 'RecessTango' ),
        );

        $output = apply_filters( 'RecessTango_site_layout', $RecessTango_site_layout );

        return $output;
    }
endif;

if( !function_exists( 'RecessTango_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function RecessTango_sidebar_position() {
      $RecessTango_sidebar_position = array(
        'right-sidebar' => esc_html__( 'Right', 'RecessTango' ),
        'no-sidebar'    => esc_html__( 'No Sidebar', 'RecessTango' ),
      );

      $output = apply_filters( 'RecessTango_sidebar_position', $RecessTango_sidebar_position );

      return $output;
    }
endif;

if( ! function_exists( 'RecessTango_selected_sidebar' ) ) :
    /**
     * Selected sidebar
     * @return array available Sidbar
     */
    function RecessTango_selected_sidebar() {
        $RecessTango_selected_sidebar = array(
            'sidebar-1'          => esc_html__( 'Default ( Primary Sidebar )', 'RecessTango' ),
            'front_page_sidebar' => esc_html__( 'Front Page Sidebar', 'RecessTango' ),
            'optional_sidebar_1' => esc_html__( 'Custom Sidebar 1', 'RecessTango' ),
            'optional_sidebar_2' => esc_html__( 'Custom Sidebar 2', 'RecessTango' ),
        );

        $output = apply_filters( 'RecessTango_selected_sidebar', $RecessTango_selected_sidebar );

        return $output;
    }
endif;

if( ! function_exists( 'RecessTango_header_image' ) ) :
    /**
     * Header image options
     * @return array Header image options
     */
    function RecessTango_header_image() {
        $RecessTango_header_image = array(
            'enable'  => esc_html__( 'Enable( Featured Image )', 'RecessTango' ),
            ''        => esc_html__( 'Default ( Customizer Header Image )', 'RecessTango' ),
            'disable' => esc_html__( 'Disable', 'RecessTango' ),
        );

        $output = apply_filters( 'RecessTango_header_image', $RecessTango_header_image );

        return $output;
    }
endif;
