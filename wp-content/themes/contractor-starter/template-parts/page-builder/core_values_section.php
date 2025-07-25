<?php
// Section Spacers
$pt = get_sub_field( 'top_spacing' );
$pb = get_sub_field( 'bottom_spacing' );
// Custom fields
$core_values_section_title = get_field('core_values_main_title', 'option');
$core_values_section_content = get_field('core_values_content', 'option');
?>
<!-- Core Value Section -->
<section id="core-values-<?php echo $post->ID;?>-<?php echo get_row_index();?>" class="core-values <?php echo esc_attr($pt);?> <?php echo esc_attr($pb);?>">
    <div class="container">
            <?php if (!empty($core_values_section_title)) : ?>
                <div class="section-header">
                    <h2 class="jumbo m-0"><?php echo $core_values_section_title; ?></h2>
                </div>
            <?php endif; ?>
            <?php if (!empty($core_values_section_content)) : ?>
                <div class="editor-content pt-sm">
                    <?php echo $core_values_section_content; ?>
                </div>
            <?php endif; ?>
            <?php if ( have_rows( 'core_values', 'option' ) ) : ?>
                <div class="row">
                    <div class="core_value_slider">
                        <?php while ( have_rows( 'core_values', 'option' ) ) : the_row();
                            $core_values_icon = get_sub_field('icon');
                            $core_values_title = get_sub_field('title');
                            $core_values_content = get_sub_field('content'); 
                            if(!empty($core_values_icon || $core_values_title)):?>
                                <div class="col-md-4">
                                    <div class="core-val-single">
                                        <?php if ( !empty($core_values_icon) ) : ?>
                                            <img class="m-auto" src="<?php echo esc_url($core_values_icon['url']); ?>" alt="<?php echo esc_attr($core_values_icon['alt']); ?>" />
                                        <?php endif; ?>
                                        <div class="core-val-inner pt-sm">
                                            <?php if (!empty($core_values_title)) : ?>
                                                <h3 class="lvl-5 ta-c m-0 pb-xs"><?php echo $core_values_title; ?></h3>
                                            <?php endif; ?>
                                            <?php if (!empty($core_values_content)) : ?>
                                                <p class="ta-c"><?php echo $core_values_content; ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif;
                        endwhile; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!--End - Core Value Section -->