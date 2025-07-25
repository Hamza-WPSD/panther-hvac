<?php 
/*
 * This is the layout for the page-bottom CTA Banner
 *
 * By default this layout will pull in field data from 'Theme Options > CTAs'.
 *
 * This can be overridden on an individual basis using the 'Page Options' panel on specific pages.
 *
 */
// Theme Options default fields
$cta_headline = get_field( 'cta_headline', 'option' );
$primary_cta = get_field( 'primary_cta', 'option' );
$secondary_cta = get_field( 'secondary_cta', 'option' );
$def_image = get_field( 'cta_image', 'option' );
$def_image_size = 'full';
$phone_number = get_field( 'phone_number', 'option' );
$cta_call_micro_text = get_field( 'cta_call_micro_text', 'option' );
$cta_call_main_text = get_field( 'cta_call_main_text', 'option' );
$schedule_micro_text = get_field( 'schedule_micro_text', 'option' );
$schedule_main_text = get_field( 'schedule_main_text', 'option' );
// Page Options override fields
$override_headline = get_field( 'override_headline' );
$override_cta = get_field( 'override_cta' );
$override_image = get_field( 'override_image' );
$override_image_size = 'full';
?>
<!-- CTA Banner Section -->
<section id="cta-banner-<?php echo $post->ID;?>" class="cta-banner" aria-label="contact us today">
    <?php if(!empty($override_image || $def_image)):?>
        <picture class="">
            <?php if (!empty($override_image)) : ?>
                <?php echo wp_get_attachment_image( $override_image, $override_image_size ); ?>
            <?php elseif (!empty($def_image)) : ?>
                <?php echo wp_get_attachment_image( $def_image, $def_image_size ); ?>
            <?php endif; ?>
        </picture>
    <?php endif;?>
    <div class="container">
        <header>
            <h2 class="jumbo">
                <?php if (!empty($override_headline)) { 
                    echo $override_headline;
                } elseif (!empty($cta_headline)) {
                    echo $cta_headline;
                }?>
            </h2>
        </header>
        <?php if  ( is_page_template( 'page-ppc.php') ) : //PPC page ?>
            <?php $ppc_cta = get_field( 'ppc_cta' ); ?>
            <?php if (!empty($ppc_cta)) : ?>
                <a href="<?php echo esc_url( $ppc_cta['url'] ); ?>" target="<?php echo esc_attr( $ppc_cta['target'] ); ?>"><?php echo esc_html( $ppc_cta['title'] ); ?></a>
            <?php endif; ?>
        <?php else : ?>
            <?php if (!empty($override_cta)) : ?>
            <a href="<?php echo esc_url( $override_cta['url'] ); ?>" target="<?php echo esc_attr( $override_cta['target'] ); ?>"><?php echo esc_html( $override_cta['title'] ); ?></a>
            <?php elseif (!empty($secondary_cta)) : ?>
                <a href="<?php echo esc_url( $secondary_cta['url'] ); ?>" target="<?php echo esc_attr( $secondary_cta['target'] ); ?>"><?php echo esc_html( $secondary_cta['title'] ); ?></a>
            <?php endif; ?>
        <?php endif ; ?>
        <?php if(!empty($cta_call_micro_text || $cta_call_main_text || $phone_number)):?>
            <div class="call-info">
                <?php if(!empty($cta_call_micro_text)):?>
                    <p><?php echo $cta_call_micro_text;?></p>
                <?php endif;?>
                <?php if(!empty($cta_call_main_text)):?>
                    <p><?php echo $cta_call_main_text;?></p>
                <?php endif;?>
                <?php if(!empty($phone_number)): ?>
                    <a aria-label="Call us" href="<?php echo esc_url( $phone_number['url'] ); ?>" target="<?php echo esc_attr( $phone_number['target'] ); ?>"><?php echo esc_html( $phone_number['title'] ); ?></a>
                <?php endif; ?>
            </div>
        <?php endif;?>
        <?php if(!empty($schedule_micro_text || $schedule_main_text || $primary_cta)):?>
            <div class="schedule-info">
                <?php if(!empty($schedule_micro_text)):?>
                    <p><?php echo $schedule_micro_text;?></p>
                <?php endif;?>
                <?php if(!empty($schedule_main_text)):?>
                    <p><?php echo $schedule_main_text;?></p>
                <?php endif;?>
                <?php if(!empty($primary_cta)): ?>
                    <a aria-label="Call us" href="<?php echo esc_url( $primary_cta['url'] ); ?>" target="<?php echo esc_attr( $primary_cta['target'] ); ?>"><?php echo esc_html( $primary_cta['title'] ); ?></a>
                <?php endif; ?>
            </div>
        <?php endif;?>
    </div>
</section>
<!--End - CTA Banner Section -->