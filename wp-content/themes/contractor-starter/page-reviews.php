<?php
/**
 * The template for displaying Reviews Landing Page
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

	<main id="primary" class="site-main site-main--reviews">
		<?php // Loop through flex content and get layouts from 'template-parts/partials/heros'
		if ( have_rows( 'hero_sections' ) ) : while ( have_rows( 'hero_sections' ) ) : the_row(); ?>
			<?php get_template_part( 'template-parts/partials/heroes/' . get_row_layout() ); ?>
		<?php endwhile; endif; ?>


        <div class="container">
            <div class="filters-wrap">
                <p>Filters: </p><?php echo do_shortcode( '[facetwp facet="review_filters"]' );?>
            </div>
            <div class="filtered-cpt">
            <div class="row justify-content-center reviews-list">
                <?php
                $args = array(
                    'post_type' => 'reviews',
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

                    <div class="col-md-6">
                        <div class="reviews__slider__item">

                            <?php
                            
                            $termsArray = get_the_terms( $post->ID, 'review_source' );  
                            foreach ( $termsArray as $term ) { 
                                $termsString = $term->slug;
                                $termImg = '<img src="'.get_bloginfo('template_directory').'/inc/img/review-logos/'. $term->slug .'-logo.svg" alt="'.$term->name.'">';
                            }
                            
                            ;?>
                            <div class="d-flex flex-column card card--reviews <?php echo $termsString; ?> p-4 p-lg-5 bg-lt c-dark">
                                <header class="pos-rel">
                                    
                                    <?php if(get_the_post_thumbnail() ) :?>
                                        <picture class="obj-cov review--image">
                                            <?php the_post_thumbnail('thumbnail'); ?>
                                        </picture>
                                    <?php else : ?>

                                        <div class="review--initials">
                            
                                            <?php
                                            $firstLetters = get_the_title() ;
                                            $parts = explode(" ", $firstLetters); // Seperates first last strings
                                            $lastname = array_pop($parts); 
                                            $firstname = $firstLetters;
                                            $lastinitial = $lastname[0];
                                            $firstinitial = $firstname[0]
                                            ?>
                                    
                                            <p class="initials"><?php echo $firstinitial;?><?php echo $lastinitial;?></p>
                                        </div>

                                    <?php endif;?>

                                    <h4><?php the_title(); ?></h4>
                                </header>

                                <main class="inner d-flex flex-column justify-content-between">
                                    <p class="py-xs"><?php echo wp_trim_words( get_the_content(), 32 ); ?></p>
                                    <?php echo $termImg; ?>
                                    <img src="<?php echo get_template_directory_uri();?>/inc/img/review-logos/stars-5.svg" alt="">
                                </main>
                            </div>
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