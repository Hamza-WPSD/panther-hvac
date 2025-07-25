<?php 
// Global Modules > Section Spacers - vars for controlling section spacers 
if ( have_rows( 'spacer_module' ) ) : while ( have_rows( 'spacer_module' ) ) : the_row(); {
    $pt = get_sub_field( 'top_spacing' );
    $pb = get_sub_field( 'bottom_spacing' );
} endwhile; endif; 

// Custom fields
$lb_cover = get_sub_field( 'lightbox_cover_photo' );
$lb_cover_size = 'full';
$lb_text = get_sub_field( 'lightbox_link_text' ); 
$lb_slug = get_sub_field( 'lightbox_youtube_url' );
?>


<section id="lightbox-<?php echo $post->ID;?>-<?php echo get_row_index();?>" class="lightbox <?php echo esc_attr($pt);?> <?php echo esc_attr($pb);?>">

    <div class="container"><div class="row justify-content-center">
        <div class="col">

            <?php get_template_part( '/template-parts/components/section', 'headings' ); ?>
        
            <?php if ( $lb_slug ): ?>
                <!-- Responsive Featherlight iFrame for Youtube embed URLs -->
                <a aria-label="Play video" href="https://www.youtube.com/watch?v=<?php echo $lb_slug; ?>" class="yt-video">
                
                    <?php if ( $lb_cover ) {
                        echo wp_get_attachment_image( $lb_cover, $lb_cover_size );
                    } elseif ( $lb_text ) {
                        echo $lb_text;
                    } ?>
                    
                </a>
            <?php endif; ?>

            <?php get_template_part( '/template-parts/components/cta', 'link' ); ?> 
            
        </div>
    </div></div>

</section>