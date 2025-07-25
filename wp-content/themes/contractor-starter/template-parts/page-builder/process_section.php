<?php 
// Section Spacers
$pt = get_sub_field( 'top_spacing' ); 
$pb = get_sub_field( 'bottom_spacing' ); 
$process_micro_title = get_field( 'process_micro_title', 'option' );
$process_main_title = get_field( 'process_main_title', 'option' );
$select_employee_quote = get_field( 'select_employee_quote', 'option' );
?>
<!-- Start Process Section -->
<section id="process-<?php echo $post->ID;?>-<?php echo get_row_index();?>" class="process <?php echo esc_attr($pt);?> <?php echo esc_attr($pb);?>">
    <div class="container">
        <?php if (!empty($process_micro_title)) : ?>
            <div class="section-header">
                <h2 class="micro"><?php echo $process_micro_title; ?></h2>
                <?php if(!empty($process_main_title)):?>
                    <h3 class="jumbo"><?php echo $process_main_title; ?></h3>
                <?php endif;?>
            </div>
        <?php else : ?>
            <?php if(!empty($process_main_title)):?>
                <div class="section-header">
                    <h2 class="jumbo"><?php echo $process_main_title; ?></h2>
                </div>
            <?php endif;?>
        <?php endif ; ?>
        <?php if(!empty($select_employee_quote)):?>
            <div class="employee-quote">
                <?php foreach($select_employee_quote as $post):
                    $employee_quote = get_field('employee_quote');
                    $position = get_field('position');
                    setup_postdata($post);
                    if(!empty($employee_quote)):?>
                        <div class="quote-info">
                            <?php
                            $thumb_id = get_post_thumbnail_id();
                            $thumb_url_array = wp_get_attachment_image_src($thumb_id, "thumbnail-size", true);
                            $thumb_url = $thumb_url_array[0];
                            $thumb_alt = get_post_meta(get_post_thumbnail_id(), "_wp_attachment_image_alt", true); ?>
                            <?php if (!empty($thumb_url)) : ?>
                                <div class="team-img">
                                    <img src="<?php echo $thumb_url; ?>" alt="<?php echo $thumb_alt; ?>">
                                </div>
                            <?php endif; ?>
                            <div class="qoute-content">
                                <p><?php echo $employee_quote;?></p>
                            </div>
                            <?php echo get_the_title(); if(!empty($position)){ echo ", " .$position;}?>
                        </div>
                    <?php endif;
                endforeach; wp_reset_postdata();?>
            </div>
        <?php endif;?>
        <?php if ( have_rows( 'process_steps', 'option' ) ) : ?>
            <div class="row process_slider">
                <?php while ( have_rows( 'process_steps', 'option' ) ) : the_row();
                    $icon = get_sub_field('icon');
                    $step_label = get_sub_field('step_label');
                    $title = get_sub_field('title');
                    $info = get_sub_field('info'); 
                    if(!empty($icon)):?>
                        <div class="col-lg-3">
                            <div class="process--icon">
                                <img src="<?php echo $icon['url'];?>" alt="<?php echo $icon['alt'];?>">
                            </div>
                            <?php if(!empty($step_label || $title || $info)):?>
                                <div class="process--info">
                                    <?php if(!empty($step_label)):?>
                                        <p><?php echo $step_label;?></p>
                                    <?php endif;?>
                                    <?php if(!empty($title)):?>
                                        <h4><?php echo $title; ?></h4>
                                    <?php endif;?>
                                    <?php if(!empty($info)):?>
                                        <div class="content-editor">
                                            <p><?php the_sub_field( 'info' ); ?></p>
                                        </div>
                                    <?php endif;?>
                                </div>
                            <?php endif;?>
                        </div>
                    <?php endif;
                endwhile; wp_reset_postdata();?>
            </div>
        <?php endif; ?>
    </div>
</section>
<!-- End - Process Section -->