<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Qsalo
 	 * @subpackage RecessTango
 	 * @since RecessTango 0.01
	 */

	/**
	 * RecessTango_doctype hook
	 *
	 * @hooked RecessTango_doctype -  10
	 *
	 */
	do_action( 'RecessTango_doctype' );
?>
<head>
<?php
	/**
	 * RecessTango_before_wp_head hook
	 *
	 * @hooked RecessTango_head -  10
	 *
	 */
	do_action( 'RecessTango_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<?php
	/**
	 * RecessTango_page_start_action hook
	 *
	 * @hooked RecessTango_page_start -  10
	 *
	 */
	do_action( 'RecessTango_page_start_action' ); 

	/**
	 * RecessTango_before_header hook
	 *
	 * @hooked RecessTango_add_breadcrumb -  30
	 *
	 */
	do_action( 'RecessTango_before_header' );

	/**
	 * RecessTango_header_action hook
	 *
	 * @hooked RecessTango_header_start -  10
	 * @hooked RecessTango_site_branding -  20
	 * @hooked RecessTango_site_navigation -  30
	 * @hooked RecessTango_header_end -  50
	 *
	 */
	do_action( 'RecessTango_header_action' );

	/**
	 * RecessTango_after_header hook
	 *
	 * @hooked RecessTango_mobile_menu -  10
	 *
	 */
	do_action( 'RecessTango_after_header' );

	/**
	 * RecessTango_content_start_action hook
	 *
	 * @hooked RecessTango_content_start -  10
	 * @hooked RecessTango_render_banner_section -  20
	 *
	 */
	do_action( 'RecessTango_content_start_action' );

	/**
	 * RecessTango_primary_content hook
	 *
	 * @hooked RecessTango_add_featured_category_section -  10
	 * @hooked RecessTango_add_latest_news_section -  60
	 *
	 */
	do_action( 'RecessTango_primary_content' );
