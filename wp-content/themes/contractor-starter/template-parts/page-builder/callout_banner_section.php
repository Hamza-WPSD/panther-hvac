<?php 
// Custom fields
$pt = get_sub_field( 'top_spacing' ); 
$pb = get_sub_field( 'bottom_spacing' ); 
$select_layout = get_sub_field( 'select_layout' );
$mainTitle = get_sub_field( 'main_title' );
$image = get_sub_field( 'image' );
$select_coupon = get_sub_field( 'select_coupon' );
$section_content = get_sub_field( 'section_content' );
$section_cta_button = get_sub_field( 'section_cta_button' );
$section_cta_button_style = get_sub_field( 'section_cta_button_style' );
$ppc_cta = get_field( 'ppc_cta' );
?>
<!-- Callout Banner Section -->
<section id="callout-banner-<?php echo $post->ID;?>-<?php echo get_row_index();?>" class="callout-banner <?php echo esc_attr($pt);?> <?php echo esc_attr($pb);?> <?php echo $select_layout;?>">
    <?php if($select_layout == 'alt-layout'):?>  
        <div class="container">
            <?php if(!empty($image)):?>
                <picture>
                    <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
                </picture>
            <?php endif;?>
            <div class="row">
                <div class="col-lg-8">
                    <?php if(!empty($mainTitle)):?>
                        <h2 class="jumbo"><?php echo $mainTitle;?></h2>
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
                <?php if(!empty($select_coupon)):
                    foreach($select_coupon as $post):
                        $financing_period = get_field('financing_period');
                        $warranty_period = get_field('warranty_period');
                        $other_details = get_field('other_details');
                        setup_postdata($post);?>
                        <div class="col-lg-4">
                            <h4><?php echo get_the_title();?></h4>
                            <?php if(!empty($financing_period)):?>
                                <p><?php echo $financing_period;?></p>
                            <?php endif;?>
                            <?php if(!empty($warranty_period)):?>
                                <p><?php echo $warranty_period;?></p>
                            <?php endif;?><?php if(!empty($other_details)):?>
                                <p><?php echo $other_details;?></p>
                            <?php endif;?>
                        </div>
                    <?php endforeach; wp_reset_postdata();
                endif;?>
            </div>
        </div>  
    <?php else:?>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <?php if(!empty($mainTitle)):?>
                        <h2 class="jumbo"><?php echo $mainTitle;?></h2>
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
                <?php if(!empty($image)):?>
                    <div class="col-lg-4">
                        <picture>
                            <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
                        </picture>
                    </div>
                <?php endif;?>
            </div>
        </div>
    <?php endif;?>
</section>
<!--End - Callout Banner Section -->