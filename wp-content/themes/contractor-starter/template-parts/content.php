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
if ( is_singular() ) : ?>
	
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<section class="hero post">
				
				
				
				<div class="container"><div class="row justify-content-center">
					<div class="col-lg-8 col-md-9">
						<?php 
						// This is a function of the Rank Math SEO plugin
						// To change settings go to Rank Math > General Settings > Breadcrumbs
						if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
						
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						
						<div class="entry-meta">
							<p>Estimated Read Time:&nbsp;<?php echo reading_time($post); ?></p>
							<p><?php the_author(); ?>, <?php echo get_the_date(); ?></p>
							
							<?php $post_tags = get_the_tags();
								if ( ! empty( $post_tags ) ) {
									echo '<ul class="posts__single__tags">';
									foreach( $post_tags as $post_tag ) { ?>
									<li><a aria-label="More posts about <?php echo esc_attr( $post_tag->name ); ?>" href="<?php echo esc_url( get_tag_link( $post_tag->term_id ) ); ?>" title="<?php echo esc_attr( $post_tag->name ); ?>"><?php echo esc_html( $post_tag->name ); ?></a></li>
<!-- 										echo '<li>' . $post_tag->name . '</li>'; -->
									<?php }
									echo '</ul>';
							} ?>
						</div><!-- .entry-meta -->
					</div>
				</div></div>
				
			</section>
		</header><!-- .entry-header -->
		
		<div class="entry-content">
			<div class="container"><div class="row justify-content-center">
				<div class="col-lg-8 col-md-9">
					<?php
					the_content(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'contractor_starter' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						)
					);
			
					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'contractor_starter' ),
							'after'  => '</div>',
						)
					);
					?>

					<div class="novashare-box">
						<p>SHARE THIS</p>
						<?php echo do_shortcode('[novashare_inline_content]');?>
					</div>


				</div>

				

			</div></div>
		</div><!-- .entry-content -->

		
	
		<footer class="entry-footer">
			<div class="container"><div class="row justify-content-center">
				<div class="col-lg-8 col-md-9">
					
					<?php
					$authorid = $post->post_author; // Grabs Author ID
					$author_acf_prefix = 'user_'; // WP User  Prefix
					$author_id_prefixed = $author_acf_prefix . $authorid; // Concats Prefix to ID ex: 'user_2'
					$author_photo = get_field( 'author_photo', $author_id_prefixed ); // Retrieves ACF User Photo Field
					?>

					<?php if ( $author_photo ) : ?>
						<picture class="rec-art__author-photo">
							<img src="<?php echo esc_url( $author_photo['sizes']['thumbnail'] ); ?>" alt="<?php echo esc_attr( $author_photo['alt'] ); ?>" />
						</picture>
					<?php endif; ?>

					<h4><?php echo get_the_author_meta('display_name'); ?></h4>
					<p><?php echo get_the_author_meta('user_description'); ?></p>
				</div>
			</div></div>
		</footer><!-- .entry-footer -->
	</article><!-- #post -->
	
<?php else :
// This is what shows in the archive loop.	
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">

			<?php
			$authorid = $post->post_author; // Grabs Author ID
			$author_acf_prefix = 'user_'; // WP User  Prefix
			$author_id_prefixed = $author_acf_prefix . $authorid; // Concats Prefix to ID ex: 'user_2'
			$author_photo = get_field( 'author_photo', $author_id_prefixed ); // Retrieves ACF User Photo Field
			?>

			<?php if ( $author_photo ) : ?>
				<picture class="rec-art__author-photo">
					<img src="<?php echo esc_url( $author_photo['sizes']['thumbnail'] ); ?>" alt="<?php echo esc_attr( $author_photo['alt'] ); ?>" />
				</picture>
			<?php endif; ?>

			
			<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
			
			<div class="entry-meta">
				<p>Estimated Read Time:&nbsp;<?php echo reading_time($post); ?></p>
				<p><?php the_author(); ?>, <?php echo get_the_date(); ?></p>
				
				<?php $post_tags = get_the_tags();
					if ( ! empty( $post_tags ) ) {
						echo '<ul class="posts__single__tags d-flex">';
						foreach( $post_tags as $post_tag ) {
							echo '<li class="m-0 pe-3">' . $post_tag->name . '</li>';
						}
						echo '</ul>';
				} ?>
			</div><!-- .entry-meta -->
				
		</header><!-- .entry-header -->
		
		<div class="entry-content">
			<?php echo wp_trim_words( get_the_excerpt(), 20); ?>
		</div><!-- .entry-content -->
	</article><!-- #post -->

<?php endif; ?>
 