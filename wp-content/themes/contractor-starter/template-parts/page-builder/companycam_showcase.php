<?php 
// Global Modules > Section Spacers - vars for controlling section spacers 
if ( have_rows( 'spacer_module' ) ) : while ( have_rows( 'spacer_module' ) ) : the_row(); {
    $pt = get_sub_field( 'top_spacing' );
    $pb = get_sub_field( 'bottom_spacing' );
} endwhile; endif; 

// Custom fields
$shortcode = get_field( 'companyCam_showcase_shortcode', 'option' );
?>

<section id="companycam-<?php echo $post->ID;?>-<?php echo get_row_index();?>" class="companycam <?php echo esc_attr($pt);?> <?php echo esc_attr($pb);?>" aria-label="companycam projects">
	
    <div class="container">
        <?php
        get_template_part( '/template-parts/components/section', 'headings' ); 
        ?>

        <div class="row">
            <div class="col">
                <?php if ( $shortcode ) : ?>
                    <?php echo $shortcode; ?>
                <?php else : ?>
                    <div class="cc-placement-only">
                        <img src="<?php echo get_template_directory_uri();?>/inc/img/comnycamm-placement-photo.webp" alt="">
                    </div>
                <?php endif ; ?>
                
            </div>

        </div>
    </div>

</section>