<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Contractor_Starter_Theme
 */
?>
<?php
if (is_singular()) : ?>
	<!-- Start Blog Hero -->
	<section class="hero hero--blog detail" aria-label="Blog detail page">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-10">
					<div class="blog-content">
						<h1 class="jumbo"><?php the_title(); ?></h1>
						<p><?php echo reading_time($post); ?> Read</p>
						<p>Posted <?php echo get_the_date('n.d.y');?></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End - Blog single hero -->
	<!-- Blog single section -->
	<section class="blog-detail-banner" aria-label="page introduction">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-10">
					<div class="blog-detail-wrapper">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End - Blog single section -->
<?php endif; ?>