<?php
/**
 * Demo Import.
 *
 * This is the template that includes all the other files for core featured of Theme Palace
 *
 * @package Theme Qsalo
 * @subpackage RecessTango
 * @since RecessTango 0.01
 */

function RecessTango_intro_text( $default_text ) {
    $default_text .= sprintf( '<p class="about-description">%1$s <a href="%2$s">%3$s</a></p>', esc_html__( 'Demo content files for RecessTango Theme.', 'RecessTango' ),
    esc_url( 'https://themepalace.com/instructions/themes/RecessTango' ), esc_html__( 'Click here for Demo File download', 'RecessTango' ) );

    return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'RecessTango_intro_text' );
