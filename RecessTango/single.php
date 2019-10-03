<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Theme Qsalo
 * @subpackage RecessTango
 * @since RecessTango 0.01
 */

get_header(); ?>
<div class="container page-section">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single' );

			the_post_navigation();
			/**
			* Hook RecessTango_author_profile
			*  
			* @hooked RecessTango_get_author_profile 
			*/
			do_action( 'RecessTango_author_profile' );

			/**
			 * Hook RecessTango_related_posts
			 *  
			 * @hooked RecessTango_get_related_posts 
			 */
			do_action( 'RecessTango_related_posts' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php
		if ( RecessTango_is_sidebar_enable() ) {
			get_sidebar();
		}
	?>
</div><!-- .container -->

<?php
get_footer();
