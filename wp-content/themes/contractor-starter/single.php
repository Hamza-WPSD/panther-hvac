<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Contractor_Starter_Theme
 */

get_header();
?>
	<main id="primary" class="site-main">
		<?php while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', get_post_type() ); ?>
		<?php endwhile; ?>
		<?php 
		// ACF Page Options to True/False fields to show/hide universal page sections
		// Get template part if option is set to true (1)
		if ( get_field( 'show_page_cta' ) == 1 ) {
			get_template_part( 'template-parts/partials/page-options', 'cta-banner' );
		} ?>
	</main><!-- #main -->
<?php
get_footer();
