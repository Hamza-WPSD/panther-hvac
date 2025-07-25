<?php
// Section Spacers
$pt = get_sub_field( 'top_spacing' ); 
$pb = get_sub_field( 'bottom_spacing' ); 
// Custom field vars for this layout
$microTitle = get_sub_field( 'micro_title' );
$mainTitle = get_sub_field( 'main_title' );
$sectionContent = get_sub_field( 'section_content' );
$section_cta_button = get_sub_field( 'section_cta_button' );
$section_cta_button_style = get_sub_field( 'section_cta_button_style' );
$row_order = get_sub_field( 'row_order' );
$select_layout = get_sub_field( 'select_layout' );
$select_review = get_sub_field( 'select_review' );
$main_image = get_sub_field( 'main_image' );
$size = 'medium';
?>
<!-- Start Two Column -->
<section id="two-col-<?php echo $post->ID;?>-<?php echo get_row_index();?>" class="two-col <?php echo esc_attr($pt);?> <?php echo esc_attr($pb);?> <?php echo esc_attr($row_order);?>">
	<div class="container">
		<div class="row row--tc">
			<div class="col-lg-6">
				<?php if (!empty($microTitle || $mainTitle)) : ?>
					<div class="section-header">
						<?php if(!empty($microTitle)):?>
							<h2 class="micro"><?php echo $microTitle;?></h2>
						<?php endif;?>
						<?php if(!empty($mainTitle)):?>
							<h3 class="jumbo"><?php echo $mainTitle;?></h3>
						<?php endif;?>
					</div>
				<?php endif; ?>
				<?php if (!empty($sectionContent)) : ?>
					<div class="content-editor">
						<?php echo $sectionContent;?>
					</div>
				<?php endif ; ?>
				<?php if( !is_page_template( 'page-ppc.php' ) ) : ?>
					<?php if(!empty($section_cta_button)):?>
						<div class="cta-link">
							<a class="<?php echo $section_cta_button_style;?>" href="<?php echo $section_cta_button['url'];?>" <?php if(!empty($section_cta_button['target'])) {?> target="_blank" <?php }?>><?php echo $section_cta_button['title'];?></a>
						</div>    
					<?php endif;?>
				<?php else : ?>
					<?php if(!empty($section_cta_button)):?>
						<div class="cta-link">
							<a class="<?php echo $section_cta_button_style;?>" href="<?php echo $ppc_cta['url'];?>" <?php if(!empty($ppc_cta['target'])) {?> target="_blank" <?php }?>><?php echo $ppc_cta['title'];?></a>
						</div>    
					<?php endif;?>
				<?php endif;?>		
			</div>
			<?php if(!empty($main_image || $select_review)):?>
				<div class="col-lg-6 <?php echo $select_layout;?>">
					<?php if(!empty($main_image)):?>
						<div class="tc--image-wrapper">
							<picture>
								<?php echo wp_get_attachment_image( $main_image, $size ); ?>
							</picture>
						</div>
					<?php endif;?>
					<?php if($select_layout == 'standard' && !empty($select_review) ):
						foreach ($select_review as $post) : 
							setup_postdata($post); 
							$termsArray = get_the_terms( $post->ID, 'review-source' ); 
							foreach ( $termsArray as $term ) { 
								$termsString = $term->slug;
								$termImg = '<img src="'.get_bloginfo('template_directory').'/inc/img/review-logos/'. $term->slug .'-logo.svg" alt="'.$term->name.'">';
							}?>  
							<div class="reviews__item">
								<div class="d-flex flex-column card card--reviews <?php echo $termsString; ?>">
									<p class="py-xs"><?php echo get_the_content(); ?></p>
									<header class="pos-rel">
										<?php if(get_the_post_thumbnail() ) :?>
											<picture class="obj-cov review--image">
												<?php the_post_thumbnail('thumbnail'); ?>
											</picture>
										<?php else : ?>
											<div class="review--initials">
												<?php $firstLetters = get_the_title();
												$firstname = $firstLetters;
												$firstinitial = $firstname[0];?>
												<p class="initials"><?php echo $firstinitial;?></p>
											</div>
										<?php endif;?>
										<h4><?php the_title(); ?></h4>
									</header>
									<main class="inner d-flex flex-column justify-content-between">
										<?php echo $termImg; ?>
										<img src="<?php echo get_template_directory_uri();?>/inc/img/review-logos/stars-5.svg" alt="">
									</main>
								</div>
							</div>
						<?php endforeach; wp_reset_postdata();
					endif;?>
				</div>
			<?php endif;?>
		</div>
	</div>
</section>
<!-- End - Two Column -->