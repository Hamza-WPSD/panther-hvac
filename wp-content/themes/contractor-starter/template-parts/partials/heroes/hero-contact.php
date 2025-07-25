<?php
// This is the layout for the Contact page hero section.

// Custom field vars from Theme Options
$address = get_field( 'address', 'option' );
$phone_number = get_field( 'phone_number', 'option' );
$email = get_field( 'email_address', 'option' );

?>

<section class="hero hero--contact" aria-label="contact information">

    <picture class="bg--image-abs pos-abs w-100 h-100">
        <?php if( the_post_thumbnail() ) {
            echo get_the_post_thumbnail( get_the_ID(), 'full' );	
        } ?>
    </picture>

    <div class="container"><div class="row">
        <div class="col">
            <?php get_template_part( '/template-parts/components/hero', 'headings' ); ?>
        </div>
    </div></div>

    <div class="container"><div class="row justify-content-lg-between">
        <div class="col-lg-6">
            <div class="d-flex flex-column ">
                <div class="hero-content">
                    <?php if( $email ): ?>
                        <div class="contact-info__item d-flex align-items-center ">
                            <img src="<?php bloginfo('template_directory');?>/inc/img/email-icon-navy.svg" alt="Email Address" class="">
                            
                            <a href="<?php echo esc_url( $email['url'] ); ?>" target="<?php echo esc_attr( $email['target'] ); ?>" class="basic"><?php echo esc_html(  $email['title'] ); ?></a>
                        </div>
                    <?php endif; ?>

                    <?php if( $address ): ?>
                        <div class="contact-info__item d-flex align-items-center ">
                            <img src="<?php bloginfo('template_directory');?>/inc/img/location-pin-icon-navy.svg" alt="Office Address" class="">

                            <a href="<?php echo esc_url( $address['url'] ); ?>" target="<?php echo esc_attr( $address['target'] ); ?>" class="basic "><?php echo esc_html( $address['title'] ); ?></a>
                        </div>
                    <?php endif; ?>

                    <?php if( $phone_number ): ?>
                        <div class="contact-info__item d-flex align-items-center ">
                            <img src="<?php bloginfo('template_directory');?>/inc/img/phone-icon-navy.svg" alt="Phone Number" class="">
                            
                            <a href="<?php echo esc_url( $phone_number['url'] ); ?>" target="<?php echo esc_attr( $phone_number['target'] ); ?>" class=""><?php echo esc_html( $phone_number['title'] ); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-lg-5 pos-rel">
            <?php get_template_part( '/template-parts/components/hero', 'form' ); ?>
        </div>
    </div></div>
</section>