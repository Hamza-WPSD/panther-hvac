<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Contractor_Starter_Theme
 */

get_header();
//custom fields
$error_404_micro_title = get_field('error_404_micro_title', 'option');
$error_404_main_title = get_field('error_404_main_title', 'option');
$cta_link = get_field('cta_link', 'option');
$select_services = get_field('select_services', 'option');
$recent_articles_subtitle = get_field('recent_articles_subtitle', 'option');
$recent_articles_title = get_field('recent_articles_title', 'option');
$recent_articles_button_style = get_field('recent_articles_button_style', 'option');
$recent_articles_button_link = get_field('recent_articles_button_link', 'option');
?>
<main id="primary" class="site-main">
	<?php if (!empty($error_404_main_title)): ?>
		<!-- 404 Hero Section -->
		<section class="hero hero--basic 404-hero">
			<div class="container">
				<div class="row">
					<div class="col-lg-10">
						<div class="hero-content">
							<header class="hero-header">
								<?php if (!empty($error_404_micro_title)): ?>
									<h2 class="micro"><?php echo $error_404_micro_title; ?></h2>
								<?php endif; ?>
								<h1><?php echo $error_404_main_title; ?></h1>
							</header>
							<?php if (!empty($cta_link)): ?>
								<a class="btn btn--secondary" href="<?php echo $cta_link['url']; ?>" <?php if (!empty($cta_link['target'])) { ?> target="_blank" <?php } ?>><?php echo $cta_link['title']; ?></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--End - 404 Hero Section -->
	<?php endif; ?>
	<?php if (!empty($select_services)): ?>
		<!-- Our Service Section -->
		<section class="services services-error pt-lg pb-def">
			<div class="container">
				<div class="row row-gap-36">
					<?php foreach ($select_services as $post) :
						$page_icon = get_field('page_icon');
						setup_postdata($post); ?>
						<div class="col-md-6">
							<div class="card--featured-service-blocks ta-c box-shadow h-100">
								<a aria-label="Read about <?php the_title(); ?>" href="<?php the_permalink(); ?>" class="card--block-link d-column row-gap-24 align-items-center py-md px-xxs h-100">
									<?php if (!empty($page_icon)): ?>
										<picture class="service-icon overlay z-1 mx-auto d-center justify-content-center">
											<img src="<?php echo $page_icon['url']; ?>" alt="<?php echo $page_icon['alt']; ?>">
										</picture>
									<?php endif; ?>
									<h3 class="title c-dark"><?php the_title(); ?></h3>
									<span class="btn btn--tertiary mt-auto">See Service</span>
								</a>
							</div>
						</div>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>
				</div>
			</div>
		</section>
		<!--End - Our Service Section -->
	<?php endif; ?>
	<!-- Start Recent Articles Section -->
	<section id="recent-articles-<?php echo $post->ID; ?>-<?php echo get_row_index(); ?>" class="recent-articles pt-def pb-lg" aria-label="recent articles">
		<div class="container">
			<div class="section-content row align-items-end justify-content-sm-between row-gap-30 pb-def">
				<div class="col-sm-9">
					<header class="section-header">
						<?php if ($recent_articles_title || $recent_articles_subtitle) : ?>
							<?php if (!empty($recent_articles_subtitle)) : ?>
								<h2 class="micro fw-bold"><?php echo $recent_articles_subtitle; ?></h2>
							<?php endif; ?>
							<?php if (!empty($recent_articles_title)) : ?>
								<h3 class="lvl-2"><?php echo $recent_articles_title; ?></h3>
							<?php endif; ?>
						<?php else : ?>
							<h2>Recent Articles</h2>
						<?php endif; ?>
					</header>
				</div>
				<?php if ($recent_articles_button_link) : ?>
					<div class="col-sm-auto">
						<div class="cta-link">
							<a href="<?php echo esc_url($recent_articles_button_link['url']); ?>" target="<?php echo esc_attr($recent_articles_button_link['target']); ?>" class="btn <?php echo $recent_articles_button_style; ?>" aria-label="More about <?php echo esc_html($recent_articles_button_link['title']); ?>">
								<?php echo esc_html($recent_articles_button_link['title']); ?>
							</a>
						</div>
					</div>
				<?php endif; ?>
			</div>
			<?php $select_posts = get_field('select_posts', 'option');
			if ($select_posts) : ?>
				<div class="row row-gap-24">
					<?php foreach ($select_posts as $post) :
						setup_postdata($post); ?>
						<div class="col-md-6">
							<a href="<?php the_permalink(); ?>" class="rec-art__item card box-shadow d-column c-wt h-100 o-hid">
								<?php if (has_post_thumbnail()) : ?>
									<picture class="bg--image-abs overlay z-0">
										<?php echo get_the_post_thumbnail(get_the_ID(), 'full'); ?>
									</picture>
								<?php endif; ?>
								<div class="rec-art-info d-column col">
									<h3><?php the_title(); ?></h3>
									<div class="d-center date-time py-4">
										<div><?php echo reading_time($post); ?> Read</div>
										<div> Posted <?php echo get_the_date('n.d.Y'); ?></div>
									</div>
									<button aria-label="Read more about <?php the_title(); ?>" href="<?php the_permalink(); ?>" class="btn btn--tertiary-white mt-auto">Keep Reading</button>
								</div>
							</a>
						</div>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>
				</div>
			<?php endif; ?>
		</div> <!-- END '.row'/ '.container' -->
	</section>
	<!-- End - Recent Articles Section -->
	<?php get_template_part('template-parts/partials/page-options', 'cta-banner'); ?>
</main><!-- #main -->
<?php
get_footer();
