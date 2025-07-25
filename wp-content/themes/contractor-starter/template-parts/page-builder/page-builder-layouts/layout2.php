<?php

/** 
 * 
 *  Layout2 : Default Layout for Service (Service Card Layout)
 * 
 */
?>
<!-- Services section -->
<section id="services-<?php echo $post->ID; ?>-<?php echo get_row_index(); ?>" class="services <?php echo esc_attr($pt); ?> <?php echo esc_attr($pb); ?> <?php echo esc_attr($card_layout); ?>" aria-label="our services">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row service-card-row">
                    <?php if (have_rows('services_select')) : ?>
                        <?php while (have_rows('services_select')) : the_row();
                            $custom_title = get_sub_field('custom_title');
                            $page = get_sub_field('page'); ?>
                            <?php if ($page) : ?>
                                <?php $post = $page;
                                setup_postdata($post); ?>
                                <div class="col-lg-4">
                                    <div class="card--service pos-rel card h-100">
                                        <?php if(!is_page_template('page-ppc.php')) { ?>
                                        <a aria-label="Read about <?php the_title(); ?>" href="<?php the_permalink(); ?>" class="card--block-link h-100"><?php }?>
                                            <div class="service-block-wrapper ta-c h-100">
                                                <?php // Get featured image by ID to enable Wordpress responsive image settings (srcset)
                                                    if (has_post_thumbnail()) { ?>
                                                    <picture class="service_img w-100 overlay">
                                                        <?php echo get_the_post_thumbnail(get_the_ID(), 'medium'); ?>
                                                    </picture>
                                                <?php } ?>
                                                <?php if (!empty($custom_title)) : ?>
                                                    <h3 class="title"><?php echo $custom_title; ?></h3>
                                                <?php else : ?>
                                                    <h3 class="title"><?php the_title(); ?></h3>
                                                <?php endif; ?>
                                                <?php if (get_the_content()) : ?>
                                                    <div class="editor-content">
                                                        <?php the_content(); ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if(!is_page_template('page-ppc.php')) { ?><span class="btn btn--tertiary">Learn More</span><?php }?>
                                            </div>
                                        <?php if(!is_page_template('page-ppc.php')) { ?></a> <?php }?>
                                    </div>
                                </div>
                                <?php wp_reset_postdata(); ?>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End - Services section -->