<?php if ( have_rows( 'cta_module' ) ) : while ( have_rows( 'cta_module' ) ) : the_row(); 
    $button_link = get_sub_field( 'button_link' );
    $ppc_cta = get_field( 'ppc_cta' );
    $style = get_sub_field( 'button_style' );?>
    <?php if( !is_page_template( 'page-ppc.php' ) ) : ?>
        <?php if (!empty($button_link )) : ?>
            <div class="cta-link">
                <a href="<?php echo esc_url( $button_link['url'] );?>" target="<?php echo esc_attr( $button_link['target'] ); ?>" class="btn <?php echo $style;?>" aria-label="More about <?php echo esc_html( $button_link['title'] ); ?>"> 
                    <?php echo esc_html( $button_link['title'] ); ?>
                </a>      
            </div>
        <?php endif; ?>
    <?php else : ?>
        <?php if (!empty($button_link)) : ?>
            <div class="cta-link">
                <a href="<?php echo esc_url( $ppc_cta['url'] );?>" target="<?php echo esc_attr( $ppc_cta['target'] ); ?>" class="btn <?php echo $style;?>" aria-label="More about <?php echo esc_html( $ppc_cta['title'] ); ?>">
                    <?php echo esc_html( $ppc_cta['title'] ); ?>
                </a>
            </div>
        <?php endif; ?>
    <?php endif; ?>
<?php endwhile; endif; ?>