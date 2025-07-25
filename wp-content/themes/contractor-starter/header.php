<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Contractor_Starter_Theme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta name="google-site-verification" content="mHeEan4dKv08KyXU-9v6j0KC5Fowtiwn9ZUoFriqNL4" />
	<?php if ( get_field( 'head_scripts' , 'options' ) ) : ?>
		<script class="head-script">
			<?php echo get_field( 'head_scripts' , 'options' );?>
		</script>
	<?php endif ; ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php if ( get_field( 'body_scripts' , 'options' ) ) : ?>
	<script class="body-script">
		<?php echo get_field( 'body_scripts' , 'options' );?>
	</script>
<?php endif ; ?>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a  class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'contractor_starter' ); ?></a>
	<header id="masthead" class="site-header test-header">
		<?php 
		$alert_message = get_field('alert_message','option');
		$bill_pay_link = get_field('bill_pay_link','option');
		$financing_option_link = get_field('financing_option_link','option');
		$phone_number = get_field( 'phone_number', 'option' ); 
		if(!is_page_template( 'page-ppc.php')):?>
			<div class="container test-container"> 
			<div class="container  testing"> 
				<div class="row">
					<?php echo "testing";?>
					<?php if(!empty($financing_option_link)):?>
						<div class="col-lg-6">
							<a href="<?php echo $financing_option_link['url'];?>" <?php if(!empty($financing_option_link['target'])){?> target="_blank" <?php }?>><?php echo $financing_option_link['title'];?></a>
						</div>
					<?php endif;?>
					<?php if(!empty($bill_pay_link)):?>
						<div class="col-lg-3">
							<a href="<?php echo $bill_pay_link['url'];?>" <?php if(!empty($bill_pay_link['target'])) {?> target="_blank" <?php }?>><?php echo $bill_pay_link['title'];?></a>
						</div>
					<?php endif;?>
					<?php if(!empty($alert_message || $phone_number)):?>
						<div class="col-lg-3">
							<?php if(!empty($alert_message)):?>
								<p><?php echo $alert_message;?></p>
							<?php endif;?>
							<?php if(!empty($phone_number)): ?>
								<a aria-label="Call us" href="<?php echo esc_url( $phone_number['url'] ); ?>" target="<?php echo esc_attr( $phone_number['target'] ? $phone_number['target'] : '_self' ); ?>" class=""><?php echo esc_html( $phone_number['title'] ); ?></a>
							<?php endif; ?>
						</div>
					<?php endif;?>
				</div>
			</div>
		<?php endif;?>
		<div class="site-header__inner d-flex justify-content-between align-items-center">
			<div class="site-header__inner__branding">
				<?php if( !is_page_template( 'page-ppc.php' ) ) : ?>
					<?php if ( get_custom_logo() ) :
					the_custom_logo();
					else : ?>
						<a aria-label="Back to the home page" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					<?php endif; ?>
				<?php else : ?>
					<?php echo wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'full' );?>
				<?php endif; ?>
			</div><!-- END .site-branding -->
			<div class="site-header__inner__nav d-flex align-items-center">
				<?php if ( !is_page_template( 'page-ppc.php' ) ):
					$show_mega_menu = get_field('show_mega_menu','option'); 
					if($show_mega_menu == 1):?> 
						<nav id="site-navigation" class="main-navigation d-none d-lg-block" aria-label="site naviation">
							<?php if(have_rows('menu_options','option')):?>
								<ul class="d-flex justify-content-between align-items-center">
									<?php while(have_rows('menu_options','option')): the_row();
										$main_page = get_sub_field('main_page');
										$select_layout = get_sub_field('select_layout');
										$mega_menu_option = get_sub_field('mega_menu_option');
										$dropdown_menu_option = get_sub_field('dropdown_menu_option');
										if(!empty($main_page)):?>
										<li>
											<a href="<?php echo $main_page['url'];?>" <?php if(!empty($main_page['target'])) {?> target="_blank" <?php }?>><?php echo $main_page['title'];?></a>
											<?php if($select_layout == 'mega-menu' && !empty($mega_menu_option)):
												$select_review = $mega_menu_option['select_review'];
												$review_link = $mega_menu_option['review_link'];
												$service_menu_links = $mega_menu_option['service_menu_links'];
												if(!empty($select_review || $service_menu_links)):?>
													<ul class="sub-menu">
														<li>
															<?php if(!empty($service_menu_links)):?>
																<div class="row">
																	<?php foreach ($service_menu_links as $service):
																		$custom_title = $service['custom_title'];
																		$sub_links = $service['sub_links'];
																		$page = $service['page']; ?>
																		<?php if ($page) :
																			$post = $page;
																			$page_icon = get_field('page_icon');
																			setup_postdata($post); ?>
																			<div class="col-lg-3">
																				<a aria-label="Read about <?php the_title(); ?>" href="<?php the_permalink(); ?>" class="card--block-link h-100">
																					<?php if (!empty($page_icon)): ?>
																						<div class="page-icon">
																							<img src="<?php echo $page_icon['url']; ?>" alt="<?php echo $page_icon['alt']; ?>">
																						</div>
																					<?php endif; ?>
																					<?php if (!empty($custom_title)) : ?>
																						<h4 class="lvl-4"><?php echo $custom_title; ?></h4>
																					<?php else : ?>
																						<h4 class="lvl-4"><?php the_title(); ?></h4>
																					<?php endif; ?>
																				</a>
																				<?php if (!empty($sub_links)) : ?>
																					<ul class="sub_links">
																						<?php foreach ($sub_links as $sub_link):
																							if (!empty($sub_link['sub_link'])) : ?>
																								<li>
																									<a href="<?php echo $sub_link['sub_link']['url']; ?>" <?php if(!empty($sub_link['sub_link']['target'])) {?> target="_blank" <?php }?>><?php echo $sub_link['sub_link']['title']; ?></a>
																								</li>
																						<?php endif;
																						endforeach; wp_reset_postdata();?>
																					</ul>
																				<?php endif; ?>
																			</div>
																		<?php endif; ?>
																	<?php endforeach; wp_reset_postdata(); ?>
																</div>
															<?php endif;?>
															<?php if(!empty($select_review)):
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
																			<?php if(!empty($review_link)):?>
																				<a href="<?php echo $review_link['url'];?>" <?php if(!empty($review_link['target'])) {?> target="_blank" <?php }?>><?php echo $review_link['title'];?></a>
																			<?php endif;?>
																		</div>
																	</div>
																<?php endforeach; wp_reset_postdata();
															endif;?>
														</li>
													</ul>
												<?php endif;?>
											<?php else :?>
												<?php if (!empty($dropdown_menu_option)): ?>
													<ul class="sub-menu">
														<?php foreach ($dropdown_menu_option as $sub_page):
															if (!empty($sub_page['sub_page'])): ?>
																<li>
																	<a href="<?php echo $sub_page['sub_page']['url']; ?>" <?php if (!empty($sub_page['sub_page']['target'])) { ?> target="_blank" <?php } ?>><?php echo $sub_page['sub_page']['title']; ?></a>
																</li>
															<?php endif;
														endforeach; wp_reset_postdata(); ?> 
													</ul>
												<?php endif; ?>
											<?php endif;?>
										</li>
										<?php endif;
									endwhile;?> <?php wp_reset_postdata();?>
								</ul>
							<?php endif;?>
						</nav>
					<?php else:?>
						<nav id="site-navigation" class="main-navigation d-none d-lg-block" aria-label="site naviation">
							<?php wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',		
									'items_wrap'	 => '<ul id="%1$s" class="d-flex justify-content-between align-items-center">%3$s</ul>',
									'container' 	 => ''			
								)
							); ?>
						</nav><!-- END #site-navigation -->	
					<?php endif;?>
					<div class="d-flex">
						<?php $primary_cta = get_field( 'primary_cta', 'option' ); 
						if(!empty($primary_cta)): ?>
							<a aria-label="Call Us" href="<?php echo esc_url($primary_cta['url']); ?>" target="<?php echo esc_attr( $primary_cta['target'] ? $primary_cta['target'] : '_self'); ?>" class="btn d-none d-md-block ms-3"><?php echo esc_html($primary_cta['title']); ?></a>
						<?php endif; ?>
					</div>	
				<?php else :// PPC template specific header items here ?>
					<?php $ppc_number = get_field( 'ppc_phone' ); 
					if(!empty($ppc_number)): ?>
						<a aria-label="Call us" href="<?php echo esc_url( $ppc_number['url'] ); ?>" target="<?php echo esc_attr( $ppc_number['target'] ? $ppc_number['target'] : '_self' ); ?>" class=""><?php echo esc_html( $ppc_number['title'] ); ?></a>
					<?php endif; ?>
				<?php endif; ?>
			</div> <!-- END .site-header__inner_nav -->
		</div> <!-- END .site-header__inner -->
		<?php // Progress bar for blog posts
		if ( is_single() && 'post' == get_post_type() ): ?>
			<div class="post-progress">
				<div class="post-progress__bar" id="scroll-progress"></div>
			</div>
		<?php endif; ?>
	</header><!-- END #masthead -->
	<?php if ( !is_page_template( 'page-ppc.php' ) ): ?>
		<!-- Mobile handler is active to 'lg' breakpoint -->
		<div id="mobile-handler" class="d-flex d-lg-none justify-content-between justify-content-md-end p-3">
			<?php $phone_number = get_field( 'phone_number', 'option' ); 
			$primary_cta = get_field( 'primary_cta', 'option' ); 
			if(!empty($primary_cta)): ?>
				<a aria-label="Call Us" href="<?php echo esc_url($primary_cta['url']); ?>" target="<?php echo esc_attr( $primary_cta['target'] ? $primary_cta['target'] : '_self'); ?>" class="btn d-none d-md-block ms-3"><?php echo esc_html($primary_cta['title']); ?></a>
			<?php endif; ?>
            <?php if (!empty($phone_number)) : ?>
                <a aria-label="Call us" href="<?php echo esc_url( $phone_number['url'] ); ?>" target="<?php echo esc_attr( $phone_number['target'] ); ?>">
                    <?php echo esc_html( $phone_number['title'] ); ?>
                </a>
            <?php endif; ?>
			<button class="menu-toggle" aria-controls="mobile-menu"><?php esc_html_e( 'Mobile Menu', 'contractor_starter' ); ?></button>
		</div>
		<div id="mobile-navigation" class="responsive-navigation" aria-expanded="false">
			<nav id="mobile-nav">
				<?php // Container class assigned in this menu array is targeted in 'responsive-nav.js'
				wp_nav_menu(
					array(
						'theme_location' => 'menu-2',
						'menu_class'        => 'menu-panel__nav',
						'container_class' 	 => 'menu-panel'
					)
				); ?>
			</nav><!-- END #mobile-navigation -->
		</div>
	<?php else : ?> 
		<div id="mobile-call" class="d-flex d-lg-none justify-content-center p-3">
			<?php $ppc_number = get_field( 'ppc_phone' ); 
			if(!empty($ppc_number)): ?>
				<a aria-label="Call us" href="<?php echo esc_url( $ppc_number['url'] ); ?>" target="<?php echo esc_attr( $ppc_number['target'] ? $ppc_number['target'] : '_self' ); ?>" class=""><?php echo esc_html( $ppc_number['title'] ); ?></a>
			<?php endif; ?>
		</div>
	<?php endif; ?>