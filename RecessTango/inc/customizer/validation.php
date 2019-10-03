<?php
/**
* Customizer validation functions
*
* @package Theme Qsalo
* @subpackage RecessTango
* @since RecessTango 0.01
*/

function RecessTango_validate_long_excerpt( $validity, $value ){
    $value = intval( $value );

    if ( empty( $value ) || ! is_numeric( $value ) ) {
       $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'RecessTango' ) );
    } elseif ( $value < 5 ) {
       $validity->add( 'min_no_of_words', esc_html__( 'Minimum no of words is 5', 'RecessTango' ) );
    } elseif ( $value > 100 ) {
       $validity->add( 'max_no_of_words', esc_html__( 'Maximum no of words is 100', 'RecessTango' ) );
    }
    return $validity;
}

function RecessTango_validate_short_excerpt( $validity, $value ){
    $value = intval( $value );
    
    if ( empty( $value ) || ! is_numeric( $value ) ) {
       $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'RecessTango' ) );
    } elseif ( $value < 5 ) {
       $validity->add( 'min_no_of_words', esc_html__( 'Minimum no of words is 5', 'RecessTango' ) );
    } elseif ( $value > 25 ) {
       $validity->add( 'max_no_of_words', esc_html__( 'Maximum no of words is 25', 'RecessTango' ) );
    }
    return $validity;
}
