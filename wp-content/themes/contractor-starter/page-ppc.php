<?php
/**
 * Template name: PPC landing page
 *
 * @package Contractor_Starter_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">
		
		<?php // Get layout for PPC Landing Page hero section
		get_template_part( 'template-parts/partials/heroes/hero', 'ppc' ); ?>

		<?php // Loop through flex content and get layouts from 'template-parts/page-builder/'
		if ( have_rows( 'page_builder' ) ) : while ( have_rows( 'page_builder' ) ) : the_row(); ?>
			<?php get_template_part( 'template-parts/page-builder/' . get_row_layout() ); ?>
		<?php endwhile; endif; ?>

		<?php 
		// ACF Page Options to True/False fields to show/hide universal page sections
		// Get template part if option is set to true (1)
		if ( get_field( 'show_page_cta' ) == 1 ) {
			get_template_part( 'template-parts/partials/page-options', 'cta-banner' );
		} ?>

	</main><!-- #main -->

<?php
get_footer('ppc');
