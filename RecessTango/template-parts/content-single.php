<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Qsalo
 * @subpackage RecessTango
 * @since RecessTango 0.01
 */

global $post;

	/*
	 * RecessTango_post_title hook
	 *
	 * @hooked RecessTango_get_post_title -  10
	 *
	*/
	do_action( 'RecessTango_post_title' );
?>

 	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> data-wow-delay="0.3s" data-wow-duration="0.5s">

        <div class="image-wrapper">
        	<?php RecessTango_get_thumbnail_image(); // get thumbnail images ?>

        	<?php if ( 'post' === get_post_type() ) : ?>
	            <p class="entry-meta">
	            <?php RecessTango_posted_on(); ?>
	            </p><!-- .entry-meta -->
        	<?php endif; ?>
        </div><!-- .image-wrapper -->

        <?php if ( 'post' == get_post_type() ) : ?>
			<header class="entry-header">
				<?php RecessTango_entry_category_tags(); ?>
			</header><!-- .entry-header -->
		<?php endif; ?>

		<div class="entry-content">
			<?php 
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'RecessTango' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'RecessTango' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php RecessTango_entry_footer(); ?>
		</footer><!-- .entry-footer -->
		
    </article><!-- #post-1 -->
