<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Qsalo
 * @subpackage RecessTango
 * @since RecessTango 0.01
 */


/**
 * RecessTango_primary_content_footer hook
 *
 * @hooked RecessTango_add_blogs_section -  10
 *
 */
do_action( 'RecessTango_primary_content_footer' );

/**
 * RecessTango_content_end_action hook
 *
 * @hooked RecessTango_content_end -  10
 *
 */
do_action( 'RecessTango_content_end_action' );

/**
 * RecessTango_footer_content hook
 *
 * @hooked RecessTango_get_footer_content -  10
 *
 */
do_action( 'RecessTango_footer_content' );

/**
 * RecessTango_back_to_top hook
 *
 * @hooked RecessTango_back_to_top -  10
 *
 */
do_action( 'RecessTango_back_to_top' );

/**
 * RecessTango_page_end_action hook
 *
 * @hooked RecessTango_page_end -  10
 *
 */
do_action( 'RecessTango_page_end_action' ); 
?>

<?php wp_footer(); ?>

</body>
</html>
