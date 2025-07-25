<?php 
// Custom field vars for this layout
$pt = get_sub_field( 'top_spacing' );
$pb = get_sub_field( 'bottom_spacing' );
$micro_title = get_sub_field( 'micro_title' );
$main_title = get_sub_field( 'main_title' );
$select_posts = get_sub_field( 'select_posts' );
$section_cta_button = get_sub_field( 'section_cta_button' );
$section_cta_button_style = get_sub_field( 'section_cta_button_style' );
$ppc_cta = get_field( 'ppc_cta' );
?>
<!-- Recent Article Section -->
<section id="recent-articles-<?php echo $post->ID;?>-<?php echo get_row_index();?>" class="recent-articles <?php echo esc_attr($pt);?> <?php echo esc_attr($pb);?>" aria-label="recent articles">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <header class="section-header">
                    <?php if ( $main_title || $micro_title) : ?>
                        <?php if (!empty($micro_title)) : ?>
                            <p class="micro"><?php echo $micro_title;?></p>
                        <?php endif ; ?>
                        <?php if (!empty($main_title)) : ?>
                            <h2 class="jumbo"><?php echo $main_title;?></h2>
                        <?php endif ; ?>
                    <?php else : ?>
                        <h2 class="jumbo">Recent Articles</h2>
                    <?php endif ; ?>
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
            <div class="col-12">
                <?php $display = get_sub_field( 'display' ); 
                if ( $display === 'display_recent' ) : ?>
                    <?php  $args = array(    
                        'post_type' => 'post',          
                        'posts_per_page' => 3, 
                        'post_status' => 'publish',
                        'post__not_in' => get_option( 'sticky_posts' ),
                        'orderby' => 'date', 
                        'order'   => 'DESC', 
                    );
                    $the_query = new WP_Query($args);
                    if($the_query->have_posts()) : ?> 
                        <div class="row">
                            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                <div class="col-md-4">
                                    <a href="<?php the_permalink(); ?>" class="rec-art-link">
                                        <div class="rec-art__item card">
                                            <?php if ( has_post_thumbnail() ) : ?>
                                                <picture>
                                                    <?php the_post_thumbnail('full', array('class' => '')); ?>
                                                </picture>
                                            <?php endif; ?>
                                            <div class="p-3">
                                                <p><?php echo reading_time($post); ?> Read</p>
                                                <p><?php echo get_the_date('n.d.y');?></p>
                                                <h4><?php the_title(); ?></h4>
                                                <p><?php echo wp_trim_words( get_the_content(), 24 ); ?></p>
                                                <button aria-label="Read more about <?php the_title();?>" href="<?php the_permalink(); ?>" class="btn">Keep Reading</button>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                            <?php wp_reset_query(); ?>
                        </div>
                    <?php endif; ?>
                <?php  else : //displays Selection ?>  
                    <?php if (!empty($select_posts)) : ?>
                        <div class="row">
                            <?php foreach($select_posts as $post) :
                                setup_postdata($post); ?>
                                <div class="col-md-4">
                                    <a href="<?php the_permalink(); ?>" class="rec-art-link">
                                        <div class="rec-art__item card">
                                            <?php if ( has_post_thumbnail() ) : ?>
                                                <picture>
                                                    <?php the_post_thumbnail('full', array('class' => '')); ?>
                                                </picture>
                                            <?php endif; ?>
                                            <div class="p-3">
                                                <p><?php echo reading_time($post); ?> Read</p>
                                                <p><?php echo get_the_date('n.d.y');?></p>
                                                <h4><?php the_title(); ?></h4>
                                                <p><?php echo wp_trim_words( get_the_content(), 24 ); ?></p>
                                                <button aria-label="Read more about <?php the_title();?>" href="<?php the_permalink(); ?>" class="btn">Keep Reading</button>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    <?php endif; ?>
                <?php endif;?>
            </div>        
        </div>
    </div> <!-- END '.row'/ '.container' -->
</section>
<!--End - Recent Article Section -->