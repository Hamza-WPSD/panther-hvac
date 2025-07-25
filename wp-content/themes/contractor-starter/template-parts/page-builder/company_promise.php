<?php 
// Global Modules > Section Spacers - vars for controlling section spacers 
if ( have_rows( 'spacer_module' ) ) : while ( have_rows( 'spacer_module' ) ) : the_row(); {
    $pt = get_sub_field( 'top_spacing' );
    $pb = get_sub_field( 'bottom_spacing' );
} endwhile; endif; 



?>

<section id="company-promise-<?php echo $post->ID;?>-<?php echo get_row_index();?>" class="company-promise <?php echo esc_attr($pt);?> <?php echo esc_attr($pb);?>" aria-label="company promise">
    <div class="container"><div class="row">

        <div class="col">


            <?php if ( get_field( 'company_promise_subtitle', 'option' ) ) : ?>
                <h2 class="micro"><?php the_field( 'company_promise_subtitle', 'option' ); ?></h2>
                <h3 class="jumbo"><?php the_field( 'company_promise_title', 'option' ); ?></h3>              
            <?php else : ?>
                <h2 class="jumbo"><?php the_field( 'company_promise_title', 'option' ); ?></h2>              

            <?php endif ; ?>


            <?php the_field( 'company_promise_info', 'option' ); ?>
            <?php $company_promise_photo = get_field( 'company_promise_photo', 'option' ); ?>
            <?php if ( $company_promise_photo ) : ?>
                <img src="<?php echo esc_url( $company_promise_photo['url'] ); ?>" alt="<?php echo esc_attr( $company_promise_photo['alt'] ); ?>" />
            <?php endif; ?>
            <?php $company_promise_signature = get_field( 'company_promise_signature', 'option' ); ?>
            <?php if ( $company_promise_signature ) : ?>
                <img src="<?php echo esc_url( $company_promise_signature['url'] ); ?>" alt="<?php echo esc_attr( $company_promise_signature['alt'] ); ?>" />
            <?php endif; ?>
            <?php the_field( 'company_promise_name', 'option' ); ?>
            <?php the_field( 'company_promise_job_title', 'option' ); ?>
            <?php $company_promise_cta = get_field( 'company_promise_cta', 'option' ); ?>
            <?php if ( $company_promise_cta ) : ?>
                <a href="<?php echo esc_url( $company_promise_cta['url'] ); ?>" target="<?php echo esc_attr( $company_promise_cta['target'] ); ?>"><?php echo esc_html( $company_promise_cta['title'] ); ?></a>
            <?php endif; ?>


        </div>


        
    </div></div> 
</section>


		