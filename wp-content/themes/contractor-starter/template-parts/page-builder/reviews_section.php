<?php
//custom fields
$pt = get_sub_field( 'top_spacing' ); 
$pb = get_sub_field( 'bottom_spacing' );
$review_micro_title = get_field( 'review_micro_title','option' );
$review_main_title = get_field( 'review_main_title','option' );
$select_layout = get_field( 'select_layout','option' );
$embed_script = get_field( 'embed_script','option' );
$shortcode = get_field( 'shortcode','option' );
?>
<!-- Review Section -->
<section id="reviews-<?php echo $post->ID;?>-<?php echo get_row_index();?>" class="reviews <?php echo esc_attr($pt);?> <?php echo esc_attr($pb);?>" aria-label="our reviews">
    <div class="container">
        <?php if(!empty($review_micro_title)):?>
            <h2 class="micro"><?php echo $review_micro_title;?></h2>
        <?php endif;?>
        <?php if(!empty($review_main_title)):?>
            <h3 class="jumbo"><?php echo $review_main_title;?></h3>
        <?php endif;?>
        <?php if($select_layout == 'embed-script' && !empty($embed_script)):?>
            <div class="content-editor">
                <?php echo $embed_script;?>
            </div>
        <?php else :?>
            <?php if(!empty($shortcode)):?>
                <p><?php echo do_shortcode($shortcode);?></p>
            <?php endif;?>
        <?php endif;?>
    </div>
</section>
<!--End - Review Section -->