<?php
/**
 * The template for displaying Projects Landing Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Contractor_Starter_Theme
 */

get_header();
?>

	<main id="primary" class="site-main site-main--projects">
		<?php // Loop through flex content and get layouts from 'template-parts/partials/heros'
		if ( have_rows( 'hero_sections' ) ) : while ( have_rows( 'hero_sections' ) ) : the_row(); ?>
			<?php get_template_part( 'template-parts/partials/heroes/' . get_row_layout() ); ?>
		<?php endwhile; endif; ?>


        <div class="container">
            <div class="filters-wrap">
                <p>Filters: </p><?php echo do_shortcode( '[facetwp facet="project_filters"]' );?>
            </div>


            <div class="filtered-cpt">
            <div class="row justify-content-center projects-list">
                <?php
                $args = array(
                    'post_type' => 'projects',
                    'post_status ' => 'publish',
                    'orderby' => 'date',
                    'order' => 'ASC',
                    'posts_per_page' => -1,
                    //'posts_per_page' => 2,
                    'facetwp' => true, // Needs to be true so FacetWP will filter this WP_Query
                );

                $reviewslist = new WP_Query( $args );
                ?>

                <?php if($reviewslist->have_posts()) : while ( $reviewslist->have_posts() ) : $reviewslist->the_post(); ?>

                    <div class="col-md-4">
                        <div class="projects-card--single">

                            <a aria-label="More about <?php the_title();?>" href="<?php the_permalink();?>">
                                <div class="d-flex flex-column ">
                                    <header class="pos-rel">
                                        
                                        <?php if(get_the_post_thumbnail() ) :?>
                                            <picture class="obj-cov review--image">
                                                <?php the_post_thumbnail('thumbnail'); ?>
                                            </picture>
                                    
                                        <?php endif;?>

                                        <h4><?php the_title(); ?></h4>
                                    </header>

                                </div>
                            </a>
                        </div>
                    </div>

                    <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
                <?php wp_reset_query(); ?>

                <?php endif; ?>


            </div>
            </div>
            
            <?php echo do_shortcode( '[facetwp facet="load_more"]' );?>
        </div>
		
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
get_footer();