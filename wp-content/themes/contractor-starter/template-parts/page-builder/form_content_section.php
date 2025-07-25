<?php 
// Custom fields
$pt = get_sub_field( 'top_spacing' ); 
$pb = get_sub_field( 'bottom_spacing' ); 
$row_order = get_sub_field( 'row_order' );
$mainTitle = get_sub_field( 'main_title' );
$main_image = get_sub_field( 'main_image' );
$content_list = get_sub_field( 'content_list' );
$section_content = get_sub_field( 'section_content' );
$section_cta_button = get_sub_field( 'section_cta_button' );
$section_cta_button_style = get_sub_field( 'section_cta_button_style' );
$ppc_cta = get_field( 'ppc_cta' );
?>
<!-- Form + Content Section -->
<section id="form-content-<?php echo $post->ID;?>-<?php echo get_row_index();?>" class="form-content <?php echo esc_attr($pt);?> <?php echo esc_attr($pb);?> <?php echo $row_order;?>">
    <div class="container">
        <div class="row">
            <?php if(!empty($mainTitle || $section_content)):?>
                <div class="col-lg-6">
                    <?php if(!empty($mainTitle)):?>
                        <h2 class="jumbo"><?php echo $mainTitle;?></h2>
                    <?php endif;?>
                    <?php if(!empty($section_content)):?>
                        <div class="content-editor">
                            <?php echo $section_content;?>
                        </div>
                    <?php endif;?>
                    <?php if(!empty($content_list)):?>
                        <div class="content-list">
                            <?php foreach($content_list as $list):
                                if(!empty($list['list'])):?>
                                    <p><?php echo $list['list'];?></p>
                                <?php endif;
                            endforeach; wp_reset_postdata();?>
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
            <?php endif;?>
            <div class="col-lg-6">
                <?php get_template_part( '/template-parts/components/hero', 'form' );?>
                <?php if(!empty($main_image)):?>
                    <picture>
                        <img src="<?php echo $main_image['url'];?>" alt="<?php echo $main_image['alt'];?>">
                    </picture>
                <?php endif;?>
            </div>
        </div>
    </div>    
</section>
<!--End - Form + Content Section -->