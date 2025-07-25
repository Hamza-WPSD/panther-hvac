<?php
/**
 * Template Name: Blog Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Contractor_Starter_Theme
 */

get_header();
?>
	<main id="primary" class="site-main">
		<?php $sticky = get_option( 'sticky_posts' );
		$args = array(
			'posts_per_page'      => 1, // Number of sticky posts to get
			'post__in'            => $sticky,
			'ignore_sticky_posts' => 1
			);
		if(!empty($sticky) ):
			query_posts($args);
			$stickyPosts = new WP_query();
			$stickyPosts->query($args);
			if ( $stickyPosts->have_posts() ): ?>
				<!-- Sticky Posts Section -->
				<section class="hero blog" aria-label="featured article">
					<?php while ( $stickyPosts->have_posts() ) : $stickyPosts->the_post(); ?>
						<div class="container">
							<div class="row justify-content-center">
								<?php if(has_post_thumbnail()) {?>
									<div class="col-lg-4">
										<picture>
											<?php the_post_thumbnail('full', array('class' => '')); ?>
										</picture>
									</div>
								<?php } ?>
								<div class="col-lg-8">
									<div class="blog__inner">
										<div class="blog__inner__meta">
											<p><?php echo reading_time($post); ?> Read</p>
											<p>Posted <?php echo get_the_date('n.d.y');?></p>
										</div>
										<h2><?php echo get_the_title();?></h2>
										<p><?php echo wp_trim_words(get_the_content(),20);?></p>
										<a aria-label="Read more about <?php the_title();?>" class="btn" href="<?php the_permalink(); ?>">Keep Reading</a>
									</div>
								</div>
							</div>
						</div>
					<?php endwhile; ?><?php wp_reset_query(); ?>
				</section>
			<?php endif; ?>
        <?php endif; ?>
		<?php 
		$the_query = new WP_Query( array( 
		'post__not_in' => get_option( 'sticky_posts' ), // Hide 'sticky' post from query
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => -1,
		// 'posts_per_page' => 2,
		'facetwp' => true, ) );
		if ( $the_query->have_posts() ) : ?>	
			<section class="posts " aria-labelledby="list of articles">
				<div class="container">
					<p class="filter-label"><?php echo do_shortcode( '[facetwp facet="blog_tags"]' );?></p>
					<div class="row">
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<div class="col-lg-4">
								<a href="<?php echo get_permalink();?>">
									<div class="posts__single">
										<?php if ( has_post_thumbnail() ) : ?>
											<picture>
												<?php the_post_thumbnail('full', array('class' => '')); ?>
											</picture>
										<?php endif; ?>
										<div class="blog__inner__meta">
											<p><?php echo reading_time($post); ?> Read</p>
											<p>Posted <?php echo get_the_date('n.d.y');?></p>
										</div>
										<h2><?php echo get_the_title();?></h2>
										<p><?php echo  wp_trim_words(get_the_content(),20);?></p>
										<span aria-label="Read more about <?php the_title();?>" class="btn" href="<?php the_permalink(); ?>">Keep Reading</span>
									</div>
								</a>
							</div>
						<?php endwhile; ?><?php wp_reset_postdata(); ?>
					</div>
					<?php echo do_shortcode( '[facetwp facet="pagination"]' );?>
				</div>
			</section>
		<?php endif; ?>
		<?php 
		// ACF Page Options to True/False fields to show/hide universal page sections
		// Get template part if option is set to true (1)
		if ( get_field( 'show_page_cta' ) == 1 ) {
			get_template_part( 'template-parts/partials/page-options', 'cta-banner' );
		} ?>
	</main><!-- #main -->
<?php
get_footer();