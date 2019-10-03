<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Theme Qsalo
 * @subpackage RecessTango
 * @since RecessTango 0.01
 */

get_header(); ?>
<div class="container page-section">
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>
			<section id="page-heading" class="page-title">
				<header class="entry-header wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="0.5s">
					<h2 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'RecessTango' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
				</header><!-- .page-header -->
			</section><!-- .page-title -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; 

		/**
		* Hook - RecessTango_action_pagination.
		*
		* @hooked RecessTango_default_pagination 
		* @hooked RecessTango_numeric_pagination 
		*/
		do_action( 'RecessTango_action_pagination' ); 
		?>

		</main><!-- #main -->
	</section><!-- #primary -->
	<?php
	if ( RecessTango_is_sidebar_enable() ) {
		get_sidebar();
	} ?>
</div><!-- .container -->
<?php
get_footer();
