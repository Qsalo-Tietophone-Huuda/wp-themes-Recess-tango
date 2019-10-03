<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Qsalo
 * @subpackage RecessTango
 * @since RecessTango 0.01
 */

$selected_sidebar = get_post_meta( get_the_id(), 'RecessTango-selected-sidebar', true );
$post_sidebar = ! empty( $selected_sidebar ) ? $selected_sidebar : 'sidebar-1';

if( ! is_active_sidebar( $post_sidebar ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php 
		dynamic_sidebar( $post_sidebar );
	?>
</aside><!-- #secondary -->
