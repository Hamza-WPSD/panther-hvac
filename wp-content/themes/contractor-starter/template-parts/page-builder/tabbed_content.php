<?php 
// Global Modules > Section Spacers - vars for controlling section spacers 
if ( have_rows( 'spacer_module' ) ) : while ( have_rows( 'spacer_module' ) ) : the_row(); {
    $pt = get_sub_field( 'top_spacing' );
    $pb = get_sub_field( 'bottom_spacing' );
} endwhile; endif; 

?>

<section id="tab-content-<?php echo $post->ID;?>-<?php echo get_row_index();?>" class="tab-content <?php echo esc_attr($pt);?> <?php echo esc_attr($pb);?>">
    <div class="container"><div class="row">
        <div class="col">
            <?php get_template_part( '/template-parts/components/section', 'headings' ); ?>
        </div>
    </div></div>

    <div class="container"><div class="row">
        <div class="col">

            <?php if ( !wp_is_mobile() ) : ?>
                <div class="tab-wrapper d-flex flex-column">
                    <?php 
                    // Loop through 'service_list' data to create tab menu controls
                    // Insert <ul> into loop to assign data to <li> items
                    if( have_rows( 'tabs_setup' ) ): ?> 
                        <ul class="tab-menu d-flex">
                            <?php while( have_rows( 'tabs_setup' ) ): the_row(); ?>
                                <li class="m-0 p-3">
                                    <p><?php the_sub_field( 'tab_title' ); ?></p>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>

                    <div class="tab-content">
                        <?php 
                        // Loop through 'service_list' data for 'tab_content' groups to create tab content.
                        if( have_rows('tabs_setup') ): while( have_rows( 'tabs_setup' ) ): the_row(); ?> 
                            
                            <div class="tab-content__wrapper"> <!-- Wrapping element targeted by jQuery -->
                                    
                                <?php the_sub_field('tab_content'); ?>

                                <?php get_template_part( '/template-parts/components/cta', 'link' ); ?>

                            </div> <!-- END .tab-content__wrapper -->

                        <?php endwhile; endif; ?>
                    </div>

                </div>
            <?php else : ?>

                <div class="tab-content-mobile">
                    <?php if ( have_rows( 'tabs_setup' ) ) : ?>
                        <div class="tab-mobile-wrapper">
                        <?php while ( have_rows( 'tabs_setup' ) ) : the_row(); ?>
                            <div class="tab-mobile-single-wrap">
                                <p class="tab-topic"><?php the_sub_field( 'tab_title' ); ?></p>
                                <div class="tab-information">
                                    <?php the_sub_field( 'tab_content' ); ?>
                                    <?php if ( have_rows( 'cta_module' ) ) : ?>
                                        <?php while ( have_rows( 'cta_module' ) ) : the_row(); ?>
                                            
                                            <?php $button_link = get_sub_field( 'button_link' ); ?>
                                            <?php if ( $button_link ) : ?>
                                                <a class="btn <?php the_sub_field( 'button_style' ); ?> " href="<?php echo esc_url( $button_link['url'] ); ?>" target="<?php echo esc_attr( $button_link['target'] ); ?>">
                                                    <span><?php echo esc_html( $button_link['title'] ); ?></span>
                                                </a>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                    
                </div>

                
            <?php endif ; ?>


            
                

        </div>
    </div></div>

</section>