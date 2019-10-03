<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.com/
 *
 * @package Theme Qsalo
 * @subpackage RecessTango
 * @since RecessTango 0.01
 */

if( ! function_exists( 'RecessTango_jetpack_setup' ) ) :
	/**
	 * Jetpack setup function.
	 *
	 */
	function RecessTango_jetpack_setup() {
		// Add theme support for Responsive Videos.
		add_theme_support( 'jetpack-responsive-videos' );
	}
endif; 
add_action( 'after_setup_theme', 'RecessTango_jetpack_setup' );
