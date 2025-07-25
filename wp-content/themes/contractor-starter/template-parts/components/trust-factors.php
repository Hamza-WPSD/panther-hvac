<div class="trust-factors">

    <?php if ( get_sub_field( 'custom_trust_factor_title' ) ) : ?>
        <p><?php the_sub_field( 'custom_trust_factor_title' ); ?></p>
    <?php else : ?>
        <p><?php the_field( 'trust_factor_title', 'option' ); ?></p>
    <?php endif ; ?>

    <div class="trust-factors__slider">

        <?php if ( have_rows( 'custom_trust_logos' ) ) : ?> 
            <?php while ( have_rows( 'custom_trust_logos' ) ) : the_row(); ?>
                <?php $logo = get_sub_field( 'logo' ); ?>
                <?php if ( $logo ) : ?>
                    <div>
                        <img src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $logo['alt'] ); ?>" />
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        
        <?php else :  ?>

            <?php if ( have_rows( 'trust_factor_logos', 'option' ) ) : ?>
                <?php while ( have_rows( 'trust_factor_logos', 'option' ) ) : the_row(); ?>
                    <?php $logo = get_sub_field( 'logo' ); ?>
                    <?php if ( $logo ) : ?>
                        <div>
                        <img src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $logo['alt'] ); ?>" />
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>

        <?php endif;  ?>
        
    </div>
</div>