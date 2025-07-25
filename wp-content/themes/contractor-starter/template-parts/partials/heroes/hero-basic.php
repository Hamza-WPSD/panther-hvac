<?php 
$hero_cta_link = get_sub_field( 'hero_cta_link' ); 
$hero_cta_link_style = get_sub_field( 'hero_cta_link_style' ); 
$hero_content = get_sub_field( 'hero_content' ); 
$hero_text_align = get_sub_field( 'hero_text_align' );
?>
<!-- Hero Basic -->
<section class="hero hero--basic" aria-label="page introduction">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="hero-content <?php echo $hero_text_align;?>">
                    <?php get_template_part( '/template-parts/components/hero', 'headings' );?>
                    <?php if(!empty($hero_content)): ?>
                        <div class="content-editor">
                            <?php echo $hero_content;?>
                        </div>
                    <?php endif;?>
                    <?php if (!empty($hero_cta_link)) : ?>
                        <div class="btn-wrap btn-wrap--hero">
                            <a class="<?php echo $hero_cta_link_style;?>" href="<?php echo esc_url( $hero_cta_link['url'] ); ?>" target="<?php echo esc_attr( $hero_cta_link['target'] ); ?>">
                                <span><?php echo esc_html( $hero_cta_link['title'] ); ?></span>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End - Hero Basic -->