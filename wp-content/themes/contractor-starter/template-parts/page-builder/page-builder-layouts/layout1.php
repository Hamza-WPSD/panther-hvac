<?php

/** 
 * 
 *  Layout1 : Featured Layout for Service (Service)
 * 
 */
// Custom field
$micro_title = get_sub_field('micro_title');
$main_title = get_sub_field('main_title');
$section_cta_button = get_sub_field('section_cta_button');
$section_cta_button_style = get_sub_field('section_cta_button_style');
?>

<!-- Services section -->
<section id="services-<?php echo $post->ID; ?>-<?php echo get_row_index(); ?>" class="services <?php echo esc_attr($pt); ?> <?php echo esc_attr($pb);?> <?php echo esc_attr($card_layout); ?>" aria-label="our services">
    <div class="container">
        <div class="featured-services_wrapper">
            <?php if(!empty($micro_title || $main_title)):?>
                <header>
                    <?php if(!empty($micro_title)):?>
                        <h2 class="micro"><?php echo $micro_title;?></h2>
                    <?php endif;?>
                    <?php if(!empty($main_title)):?>
                        <h3 class="jumbo"><?php echo $main_title;?></h3>
                    <?php endif;?>
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
            <?php endif;?>
            <?php if (have_rows('services_select')) : ?>
                <div class="row">
                    <?php while (have_rows('services_select')) : the_row();
                        $custom_title = get_sub_field('custom_title');
                        $page = get_sub_field('page');
                        if ($page) : ?>
                            <?php $post = $page;
                            $page_icon = get_field('page_icon');
                            setup_postdata($post); ?>
                            <div class="col-lg-4">
                                <div class="card--featured-service-blocks">
                                    <?php if(!is_page_template('page-ppc.php')) { ?>
                                    <a aria-label="Read about <?php the_title(); ?>" href="<?php the_permalink(); ?>" class="card--block-link"> <?php }?>
                                        <div class="service-card">      
                                            <?php if(has_post_thumbnail()) { ?>                            
                                                <picture class="service_img">
                                                    <?php echo get_the_post_thumbnail(get_the_ID(), 'medium'); ?>
                                                </picture>
                                            <?php } ?>
                                            <div class="service-info">
                                                <div class="service-info-header">
                                                    <?php if(!empty($page_icon)):?>
                                                        <picture class="service-icon">
                                                            <img src="<?php echo $page_icon['url'];?>" alt="<?php echo $page_icon['alt'];?>">
                                                        </picture>
                                                    <?php endif;?>
                                                    <?php if (!empty($custom_title)) : ?>
                                                        <h5 class="service-title"><?php echo $custom_title; ?></h5>
                                                    <?php else : ?>
                                                        <h5 class="service-title"><?php the_title(); ?></h5>
                                                    <?php endif; ?>
                                                </div>
                                                <?php if(get_the_content()):?>
                                                    <div class="editor-content">
                                                        <?php echo wp_trim_words(get_the_content(), 24);?>
                                                    </div>
                                                <?php endif;?>
                                                <?php if(!is_page_template('page-ppc.php')) { ?><span class="btn btn--link-white">Learn More</span><?php }?>
                                            </div>
                                        </div>
                                    <?php if(!is_page_template('page-ppc.php')) { ?> </a> <?php }?>
                                </div>
                            </div>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- End - Services section -->