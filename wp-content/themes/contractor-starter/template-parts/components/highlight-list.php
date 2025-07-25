<?php if ( have_rows( 'hero_highlights' ) ) : ?>
    <ul class="highlights d-flex flex-column align-items-center align-items-lg-start">
        <?php while ( have_rows( 'hero_highlights' ) ) : the_row();
            $icon = get_sub_field( 'icon' );
            $highlight_text = get_sub_field( 'highlight_text' );
            if(!empty($icon || $highlight_text)) : ?>
                <li class="highlights__item d-flex  align-items-center">
                    <?php if(!empty($icon)):?>
                        <img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>" />
                    <?php endif;?>
                    <?php if(!empty($highlight_text)):?>
                        <?php the_sub_field( 'highlight_text' ); ?>
                    <?php endif;?>
                </li>
            <?php endif;
        endwhile; ?><?php wp_reset_postdata();?>
    </ul>
<?php endif; ?>
