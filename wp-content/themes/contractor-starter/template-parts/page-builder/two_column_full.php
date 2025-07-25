<?php
// Section Spacers
$pt = get_sub_field( 'top_spacing' ); 
$pb = get_sub_field( 'bottom_spacing' ); 
$microTitle = get_sub_field( 'micro_title' );
$mainTitle = get_sub_field( 'main_title' );
$sectionContent = get_sub_field( 'section_content' );
$section_cta_button = get_sub_field( 'section_cta_button' );
$section_cta_button_style = get_sub_field( 'section_cta_button_style' );
$row_order = get_sub_field( 'row_order' ); 
$main_image = get_sub_field( 'main_image' );
$size = 'full';
?>
<!-- Two Column Full Width -->
<section id="two-col-full-<?php echo $post->ID;?>-<?php echo get_row_index();?>" class="two-col-full">
        <div class="two-col-full__wrapper d-flex <?php echo esc_attr($row_order);?>">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="tcfw--info-wrap">
                            <div class="tcfw--info">
                                <?php if(!empty($microTitle || $mainTitle)):?>
                                    <div class="section-headers">
                                        <?php if(!empty($microTitle)):?>
                                            <h2 clas="micro"><?php echo $microTitle;?></h2>
                                        <?php endif;?>
                                        <?php if(!empty($mainTitle)):?>
                                            <h2 class="jumbo"><?php echo $mainTitle;?></h2>
                                        <?php endif;?>
                                    </div>
                                <?php endif;?>
                                <?php if (!empty($sectionContent)) : ?>
                                    <div class="content-editor">
                                        <?php echo $sectionContent;?>
                                    </div>
                                <?php endif ; ?>
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
                </div>
            </div><!-- END .container -->
            <?php if(!empty($main_image)):?>
                <div class="two-col-full__image">
                    <picture class="w-100 h-auto h-lg-100">
                        <?php echo wp_get_attachment_image( $main_image, $size ); ?>
                    </picture>
                </div>
            <?php endif;?>
        </div><!-- END .two-col-full__wrapper -->
</section>
<!--End -Two Column Full Width -->
