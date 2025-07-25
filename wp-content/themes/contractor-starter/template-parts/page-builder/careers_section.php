<?php 
// Custom fields
$pt = get_sub_field( 'top_spacing' ); 
$pb = get_sub_field( 'bottom_spacing' ); 
$mainTitle = get_sub_field( 'main_title' );
$select_careers = get_sub_field( 'select_careers' );
?>
<!-- Career Section -->
<section id="career-<?php echo $post->ID;?>-<?php echo get_row_index();?>" class="career <?php echo esc_attr($pt);?> <?php echo esc_attr($pb);?>">
    <div class="container">
        <?php if (!empty($mainTitle)) : ?>
            <div class="section-header">
                <h2 class="jumbo"><?php echo $mainTitle;?></h2>
            </div>
        <?php endif ; ?>     
        <?php if (!empty($select_careers)) : ?>
            <div class="row">
                <?php foreach ( $select_careers as $post ) :
                    $career_description = get_field('career_description');
                    setup_postdata ( $post ); ?>
                    <div class="col-lg-4">
                        <a href="<?php the_permalink(); ?>" aria-label="More about <?php the_title();?>">
                            <div class="career-single">
                                <div class="pos-rel d-flex align-items-center justify-content-between">
                                    <h4><?php the_title(); ?></h4>
                                    <?php if(!empty($career_description)):?>
                                        <div class="content-editor">
                                            <p><?php echo $career_description;?></p>
                                        </div>
                                    <?php endif;?>
                                    <button class="btn--ghost-white" ><span>Learn More</span></button>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; wp_reset_postdata(); ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<!--End - Career Section -->
