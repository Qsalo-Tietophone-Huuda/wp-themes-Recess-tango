<?php 

/**
 * Customizer Partial Functions
 *
 * @package Theme Qsalo
 * @subpackage RecessTango
 * @since RecessTango 0.01
 */

// Partial refresh for popular articles title
if ( !function_exists( 'RecessTango_customize_partial_popular_articles_title' ) ) :
	/**
	 * Render the popular articles title for the selective refresh.
	 *
	 * @since RecessTango 0.01
	 *
	 * @return string
	 */
	function RecessTango_customize_partial_popular_articles_title() {
		$options = RecessTango_get_theme_options();
		return esc_html( $options['popular_articles_title'] );
	}
endif;

// Partial refresh for search section button title
if ( !function_exists( 'RecessTango_customize_partial_search_section_button_text' ) ) :
	/**
	 * Render the search section button title for the selective refresh.
	 *
	 * @since RecessTango 0.01
	 *
	 * @return string
	 */
	function RecessTango_customize_partial_search_section_button_text() {
		$options = RecessTango_get_theme_options();
		return esc_html( $options['search_section_button_text'] );
	}
endif;

// Partial refresh for latest news title
if ( !function_exists( 'RecessTango_customize_partial_latest_news_title' ) ) :
	/**
	 * Render the latest news title for the selective refresh.
	 *
	 * @since RecessTango 0.01
	 *
	 * @return string
	 */
	function RecessTango_customize_partial_latest_news_title() {
		$options = RecessTango_get_theme_options();
		return esc_html( $options['latest_news_title'] );
	}
endif;
