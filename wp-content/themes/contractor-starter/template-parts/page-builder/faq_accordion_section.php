<?php 
// Custom field vars for this layout
$pt = get_sub_field( 'top_spacing' );
$pb = get_sub_field( 'bottom_spacing' );
$main_title = get_sub_field( 'main_title' );
$select_faqs = get_sub_field( 'select_faqs' ); 
$section_cta_button = get_sub_field( 'section_cta_button' );
$section_cta_button_style = get_sub_field( 'section_cta_button_style' );
$ppc_cta = get_field( 'ppc_cta' );
?>
<!-- FAQ Section -->
<section id="faq-accordion-<?php echo $post->ID;?>-<?php echo get_row_index();?>" class="faq-accordion <?php echo esc_attr($pt);?> <?php echo esc_attr($pb);?>" aria-label="frequently asked questions">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 ta-c">
                <header class="section-header">
                    <?php if(!empty($main_title)) : ?>
                        <h2 class="jumbo"><?php echo $main_title;?></h2>                        
                    <?php else : ?>
                        <h2 class="jumbo">Frequently Asked Questions</h2>
                    <?php endif; ?>
                </header>
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
            <?php if(!empty($select_faqs)): ?>
                <div class="col-lg-8 col-md-9 faqs__wrapper">
                    <?php foreach ( $select_faqs as $post ) :
                        setup_postdata($post); ?>
                        <div class="faq-single">
                            <div class="faq-title">
                                <h3><?php the_title(); ?></h3>
                                <div class="plus"></div>
                            </div>
                            <div class="faq-content">
                                <?php the_content(); ?>
                            </div>
                        </div>         
                    <?php endforeach;?><?php wp_reset_postdata(); ?>
                </div> <!-- faq-wrapper -->
            <?php endif; ?>
        </div>
    </div> <!-- END '.row'/ '.container' -->
</section>
<!--End - FAQ Section -->