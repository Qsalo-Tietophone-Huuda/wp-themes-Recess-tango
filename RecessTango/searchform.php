<?php
/**
 * The template for displaying search form
 *
 * @package Theme Qsalo
 * @subpackage RecessTango 
 * @since RecessTango 0.01
 */
?>

<form action="<?php echo esc_url( home_url('/') ); ?>" role="search" method="get" class="search-form">
	<label>
		 <span class="screen-reader-text"><?php printf( esc_html__( 'Search for: %s','RecessTango' ), get_search_query() ); ?></span>
		<input type="search" name="s" placeholder="<?php esc_attr_e( 'Search...', 'RecessTango' ); ?>" value="<?php echo get_search_query(); ?>" >
	</label>
	<button type="submit" class="search-submit"><span class="screen-reader-text"><?php esc_html_e('Search', 'RecessTango' ); ?></span><i class="fa fa-search"></i></button>	
</form>
