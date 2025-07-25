<div class="topbar d-none d-md-flex g-blue c-lt p-2">
    <div class="container"><div class="row">
        <div class="col-12 ta-c">
            <?php if // This hides nav element on the PPC page template.
            ( !is_page_template( 'page-ppc.php' ) ): ?>
                
                <?php $msg = get_field( 'topbar_msg', 'option' );
                if ( $msg ) : ?>
                    <?php echo $msg; ?>
                <?php else : ?>
                    
                    <div class="d-flex justify-content-center">
                        <span class="tt-up fw-bld me-2">Call Us Today!</span>
                        <?php $phone_number = get_field( 'phone_number', 'option' ); 
                        if( $phone_number ): ?>
                            <a aria-label="Call us" href="<?php echo esc_url( $phone_number['url'] ); ?>" target="<?php echo esc_attr( $phone_number['target'] ? $phone_number['target'] : '_self' ); ?>" class="basic c-lt fw-bld"><?php echo esc_html( $phone_number['title'] ); ?></a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

            <?php else : ?>
                <div class="d-flex justify-content-center">
                    <span class="tt-up fw-bld me-2">Call Us Today!</span>
                    <?php $ppc_number = get_field( 'ppc_phone' ); 
                    if( $ppc_number ): ?>
                        <a aria-label="Call us" href="<?php echo esc_url( $ppc_number['url'] ); ?>" target="<?php echo esc_attr( $ppc_number['target'] ? $ppc_number['target'] : '_self' ); ?>" class="basic c-lt fw-bld"><?php echo esc_html( $ppc_number['title'] ); ?></a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div></div>
</div>