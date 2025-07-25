<?php 
// Global Modules > Section Spacers - vars for controlling section spacers 
if ( have_rows( 'spacer_module' ) ) : while ( have_rows( 'spacer_module' ) ) : the_row(); {
    $pt = get_sub_field( 'top_spacing' );
    $pb = get_sub_field( 'bottom_spacing' );
} endwhile; endif; 

// Custom fields
$iframe = get_sub_field( 'iframe_video_url' );
?>


<section id="iframe-<?php echo $post->ID;?>-<?php echo get_row_index();?>" class="iframe <?php echo esc_attr($pt);?> <?php echo esc_attr($pb);?>">
    <div class="container"><div class="row">
        <div class="col">
            <?php 
            get_template_part( '/template-parts/components/section', 'headings' );

            echo $iframe; 
            
            get_template_part( '/template-parts/components/cta', 'link' ); 
            ?>
        </div>
    </div></div>
</section>