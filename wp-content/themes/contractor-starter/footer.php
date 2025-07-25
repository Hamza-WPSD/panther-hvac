<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Contractor_Starter_Theme
 */

// Custom field vars
$address = get_field( 'address', 'option' );
$phone_number = get_field( 'phone_number', 'option' );
$email = get_field( 'email_address', 'option' );
$copyright_links = get_field( 'footer_copyright_links', 'option' );
$companycam_script = get_field( 'companycam_script', 'option' );
$hook_logo_link = get_field( 'hook_logo_link', 'option' );
?>
	<footer id="colophon" class="site-footer spacer-lg-top spacer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo-link">
						<img class="footer-logo" src="<?php echo get_theme_mod( 'contractor_starter_footer_logo' ); ?>" alt="">
					</a>
					<?php if(!empty($address || $phone_number || $email)):?>
						<div class="contact-info">
							<?php if(!empty($phone_number)): ?>
								<p>Phone</p>
								<a aria-label="Call us" href="<?php echo esc_url( $phone_number['url'] ); ?>" target="<?php echo esc_attr( $phone_number['target'] ); ?>"><?php echo esc_html( $phone_number['title'] ); ?></a>
							<?php endif; ?>
							<?php if(!empty($email)): ?>
								<p>Email</p>
								<a aria-label="Email us" href="<?php echo esc_url( $email['url'] ); ?>" target="<?php echo esc_attr( $email['target'] ); ?>"><?php echo esc_html(  $email['title'] ); ?></a>
							<?php endif; ?>
							<?php if(!empty($address)): ?>
								<p>Address</p>
								<a aria-label="Find us on Google Maps" href="<?php echo esc_url( $address['url'] ); ?>" target="<?php echo esc_attr( $address['target'] ); ?>"><?php echo esc_html( $address['title'] ); ?></a>   
							<?php endif; ?>
						</div><!-- end contact-info-->
					<?php endif;?>
				</div>
				<div class="col-lg-8">
					<nav aria-label="footer navigation ">
						<?php wp_nav_menu( 
							array( 
								'theme_location' => 'menu-3',
								'menu_class' => 'footer-nav',
								'items_wrap'	 => '<ul id="%1$s" class="%2$s d-flex justify-content-start align-items-start">%3$s</ul>',
								'container' 	 => ''	
							)
						); ?>
					</nav>
				</div> <!--end  footer-menu -->
			</div>
			<div class="col-12">
				<div class="footer-copy">
					<p>&copy; &nbsp;<?php echo date('Y'); ?>&nbsp;<?php echo get_bloginfo(); ?>. All Rights Reserved. | License <?php the_field('company_license', 'option'); ?>
						<?php if(!empty($copyright_links)){ echo $copyright_links;}?>
					</p>
					<?php if(is_front_page() && !empty($hook_logo_link)):?>
						<p> Site design & SEO by 
							<a aria-label="About Hook Agency" href="<?php echo $hook_logo_link['url'];?>" <?php if(!empty($hook_logo_link['target'])) {?> target="_blank" <?php }?>class="brand-attr">
								<img class="hook-brand" src="<?php echo get_template_directory_uri();?>/inc/img/hook-logo-1.svg" alt="">
							</a>
						</p>
					<?php endif;?>
				</div>
			</div>
		</div>
	</footer>
</div><!-- #page -->
<?php wp_footer(); ?>
<?php if ( is_page_template( 'page-ppc.php') ) : ?>
	<script>
		jQuery(function ($) {
			var callbar = $("#mobile-call");
			$(window).scroll(function() {    
				var scroll = $(window).scrollTop();
				if (scroll >= 60) {
					callbar.addClass("on-scroll");
				} else {
					callbar.removeClass("on-scroll");
				}
			})
		})
	</script>
<?php endif; ?>
<?php if( $companycam_script ) { echo $companycam_script; } ?>
<?php if ( get_field( 'footer_scripts' , 'options' ) ) : ?>
	<script class="footer-script">
		<?php echo get_field( 'footer_scripts' , 'options' );?>
	</script> dasdasdasdas
<?php endif ; ?>
<?php edit_post_link( 'Quick Edit' ); ?>
</body>
</html>
