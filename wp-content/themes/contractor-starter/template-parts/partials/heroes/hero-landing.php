<?php 
$content = get_sub_field( 'hero_content' );
?>
<!-- Hero Landing -->
<section class="hero hero--landing" aria-label="page introduction">
    <?php if( has_post_thumbnail()) {?>
        <picture class="bg--image-abs w-100 h-100">
            <?php echo get_the_post_thumbnail( get_the_ID(), 'full' );	?>
        </picture>
    <?php } ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="hero-content">
                    <?php  get_template_part( '/template-parts/components/hero', 'headings' );?>
                    <?php if(!empty($content)):?>
                    <div class="content-editor">
                        <?php echo $content;?>
                    </div>
                    <?php endif;?>
                    <?php get_template_part( '/template-parts/components/highlight', 'list' );?>
                </div>
            </div>
            <div class="col-lg-6">
                <?php get_template_part( '/template-parts/components/hero', 'form' );?>
            </div>
        </div>
    </div>
</section>
<!--End - Hero Landing -->