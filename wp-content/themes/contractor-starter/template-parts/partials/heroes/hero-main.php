<?php 
$content = get_sub_field( 'hero_content' );
$video = get_sub_field('banner_video');
$hero_cta_button = get_sub_field('hero_cta_button');
$hero_cta_button_style = get_sub_field('hero_cta_button_style');
$url = get_the_post_thumbnail_url(get_the_ID(),'full');
?>
<!-- Hero Main -->
<section class="hero hero--main" aria-label="page introduction">
    <?php if (!empty($video)) { ?>
        <div class="hero-banner-video overlay">
            <video width="100%" height="100%" autoplay playsinline muted loop preload poster="<?php echo esc_url($url); ?>">
                <source src="<?php echo esc_url($video['url']); ?>">
            </video>
        </div>
    <?php } else { ?>
        <?php if( has_post_thumbnail()) {?>
            <picture class="bg--image-abs w-100 h-100">
                <?php echo get_the_post_thumbnail( get_the_ID(), 'full' );	?>
            </picture>
        <?php } ?>
    <?php } ?>
    <div class="container pt-def">
        <div class="row justify-content-lg-between">
            <div class="col-lg-6">
                <div class="hero-content">
                    <?php  get_template_part( '/template-parts/components/hero', 'headings' );?>
                    <?php if(!empty($content)):?>
                    <div class="content-editor">
                        <?php echo $content;?>
                    </div>
                    <?php endif;?>
                    <?php get_template_part( '/template-parts/components/highlight', 'list' );?>
                    <?php if(!empty($hero_cta_button)):?>
                        <div class="cta-link">
                            <a class="<?php echo $hero_cta_button_style;?>" href="<?php echo $hero_cta_button['url'];?>" <?php if(!empty($hero_cta_button['target'])) {?> target="_blank" <?php }?>><?php echo $hero_cta_button['title'];?></a>
                        </div>    
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End - Hero Main -->