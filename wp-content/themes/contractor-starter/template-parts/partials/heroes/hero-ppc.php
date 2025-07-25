<?php
// Custom field vars for this template part
$hero_microTitle = get_field( 'hero_micro_title' );
$hero_mainTitle = get_field( 'hero_main_title' );
$ppc_hero_form_id = get_field( 'ppc_hero_form_id' );
$ppc_hero_form_title = get_field( 'ppc_hero_form_title' );
$content = get_field( 'ppc_content' );
?>
<!-- Hero PPC -->
<section class="hero hero--ppc" aria-label="page introduction">
	<?php if( has_post_thumbnail() ) {?>
		<picture class="bg--image-abs">
			<?php echo get_the_post_thumbnail( get_the_ID(), 'full' );	?>
		</picture>
	<?php } ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="hero-content">
					<?php if(!empty($hero_mainTitle || $hero_microTitle)):?>
						<header class="hero-header-content">
							<?php if (!empty($hero_microTitle)) : ?>
								<h1 class="micro"><?php echo $hero_microTitle; ?></h1>
								<?php if(!empty($hero_mainTitle)):?>
									<h2 class="jumbo"><?php echo $hero_mainTitle; ?></h2>
								<?php endif;?>
							<?php else : ?>
								<?php if(!empty($hero_mainTitle)):?>
									<h1 class="jumbo"><?php echo $hero_mainTitle; ?></h1>
								<?php endif;?>
							<?php endif; ?>
						</header>
					<?php endif;?>
					<?php if(!empty($content)):?>
						<div class="content-editor">
							<?php echo $content; ?>
						</div>
					<?php endif;?>
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
				</div>
			</div>	
			<?php if(!empty($ppc_hero_form_id)):?>	
				<div class="col-lg-6">
					<div id="lead-form"></div>
					<div class="hero-form-column">
						<div id="hero-form" class="form-wrapper">
							<?php if (!empty($ppc_hero_form_title)) : ?>
								<h4><?php echo $ppc_hero_form_title;?></h4>       
							<?php endif ; ?>
							<?php echo do_shortcode('[gravityform id="' . $ppc_hero_form_id . '" title="false" description="false" ajax="false"]'); ?>
						</div>
					</div>
				</div>
			<?php endif;?>
		</div>
	</div>
</section>
<!--End - Hero PPC -->