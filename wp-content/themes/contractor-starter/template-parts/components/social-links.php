<div class="social-links d-flex align-items-center">
    <?php if ( have_rows( 'social_links', 'option' ) ) : while ( have_rows( 'social_links', 'option' ) ) : the_row(); 
        $social_link = get_sub_field( 'social_url' );
        $social_icon = get_sub_field( 'social_icon' ); 
    ?>

        <?php if ( $social_icon && $social_link ) : ?>
            <a href="<?php echo $social_link; ?>" class="clickable" >
                <img src="<?php echo esc_url( $social_icon['url'] ); ?>" alt="<?php echo esc_attr( $social_icon['alt'] ); ?>" class="social-links-item"/>
            </a>
        <?php endif; ?>

    <?php endwhile; endif; ?>
</div>