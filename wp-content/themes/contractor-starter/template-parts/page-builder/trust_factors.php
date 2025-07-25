<?php 
//Custom fields
$pt = get_sub_field( 'top_spacing' ); 
$pb = get_sub_field( 'bottom_spacing' );
$trust_factor_title = get_field( 'trust_factor_title','option' );
$trust_factor_type = get_sub_field( 'trust_factor_type' );
if ( $trust_factor_type === 'slider-no' ) {
 $sliderType = 'section-trust-factors';
} else{	
 $sliderType = 'section-trust-factors__slider';
}?>
<!-- Start Trust Factor -->
<section id="trust-factors-<?php echo $post->ID;?>-<?php echo get_row_index();?>" class="trust-factors <?php echo esc_attr($pt);?> <?php echo esc_attr($pb);?>" aria-label="trusted partners">
	<div class="container">
		<?php if(!empty($trust_factor_title)):?>
			<h2><?php echo $trust_factor_title;?></h2>
		<?php endif;?>
		<div class="row <?php echo $sliderType;?>">
			<?php if ( have_rows( 'override_trust_logos' ) ) : ?>
				<?php while ( have_rows( 'override_trust_logos' ) ) : the_row();
					$logo = get_sub_field( 'logo' ); 
					if (!empty($logo)) : ?>
						<div class="col-lg-3">
							<div class="tf--single">
								<img src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $logo['alt'] ); ?>" />
							</div>
						</div>
					<?php endif; ?>
			<?php endwhile; else : ?> 
				<?php  if( have_rows( 'trust_factor_logos', 'option' ) ): while( have_rows( 'trust_factor_logos', 'option' ) ): the_row(); ?>
					<?php $logo = get_sub_field( 'logo' ); 
					if (!empty($logo)): ?>
						<div class="col-lg-3">
							<div class="tf--single">
								<img src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $logo['alt'] ); ?>" />
							</div>
						</div>
					<?php endif; ?>
				<?php endwhile; endif; ?>
			<?php endif; ?>	
		</div>
	</div>	
</section>
<!-- End - Trust Factor -->