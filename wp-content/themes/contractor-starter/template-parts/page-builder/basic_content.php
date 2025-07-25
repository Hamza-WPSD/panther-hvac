<?php 
// Custom fields
$pt = get_sub_field( 'top_spacing' ); 
$pb = get_sub_field( 'bottom_spacing' ); 
$microTitle = get_sub_field( 'micro_title' );
$mainTitle = get_sub_field( 'main_title' );
$section_image = get_sub_field( 'section_image' );
$section_content = get_sub_field( 'section_content' );
$section_cta_button = get_sub_field( 'section_cta_button' );
$section_cta_button_style = get_sub_field( 'section_cta_button_style' );
$ppc_cta = get_field( 'ppc_cta' );
?>
<!-- Basic Content Section -->
<section id="basic-content-<?php echo $post->ID;?>-<?php echo get_row_index();?>" class="basic-content <?php echo esc_attr($pt);?> <?php echo esc_attr($pb);?>">
    <div class="container">
        <div class="row justify-text-center">
            <div class="col-12">
                <?php if(!empty($section_image)):?>
                    <picture>
                        <img src="<?php echo $section_image['url'];?>" alt="<?php echo $section_image['alt'];?>">
                    </picture>
                <?php endif;?>
                <?php if(!empty($microTitle)):?>
                    <h2 class="micro"><?php echo $microTitle;?></h2>
                <?php endif;?>
                <?php if(!empty($mainTitle)):?>
                    <h3 class="jumbo"><?php echo $mainTitle;?></h3>
                <?php endif;?>
                <?php if(!empty($section_content)):?>
                    <div class="content-editor">
                        <?php echo $section_content;?>
                    </div>
                <?php endif;?>
                <?php if( !is_page_template( 'page-ppc.php' ) ) : ?>
                    <?php if(!empty($section_cta_button)):?>
                        <div class="cta-link">
                            <a class="<?php echo $section_cta_button_style;?>" href="<?php echo $section_cta_button['url'];?>" <?php if(!empty($section_cta_button['target'])) {?> target="_blank" <?php }?>><?php echo $section_cta_button['title'];?></a>
                        </div>    
                    <?php endif;?>
                <?php else : ?>
                    <?php if(!empty($section_cta_button)):?>
                        <div class="cta-link">
                            <a class="<?php echo $section_cta_button_style;?>" href="<?php echo $ppc_cta['url'];?>" <?php if(!empty($ppc_cta['target'])) {?> target="_blank" <?php }?>><?php echo $ppc_cta['title'];?></a>
                        </div>    
                    <?php endif;?>
                <?php endif;?>
            </div>
        </div>
    </div>    
</section>
<!--End - Basic Content Section -->