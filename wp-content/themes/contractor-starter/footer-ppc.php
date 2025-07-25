<?php
/**
 * The template for displaying the PPC footer
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
$companycam_script = get_field( 'companycam_script', 'option' );
?>
	<footer id="colophon" class="site-footer spacer-lg-top spacer-bottom">
		<div class="container">
            <div class="ppc-footer-logo">
				<img class="footer-logo" src="<?php echo get_theme_mod( 'contractor_starter_footer_logo' ); ?>" alt="">
            </div>
			<?php if(!empty($address || $phone_number || $email)):?>
				<div class="row">
					<?php if(!empty($phone_number)): ?>
						<div class="col-lg-4">
							<p>Phone</p>
							<a aria-label="Call us" href="<?php echo esc_url( $phone_number['url'] ); ?>" target="<?php echo esc_attr( $phone_number['target'] ); ?>"><?php echo esc_html( $phone_number['title'] ); ?></a>
						</div>
					<?php endif; ?>
					<?php if(!empty($email)): ?>
						<div class="col-lg-4">
							<p>Email</p>
							<a aria-label="Email us" href="<?php echo esc_url( $email['url'] ); ?>" target="<?php echo esc_attr( $email['target'] ); ?>"><?php echo esc_html(  $email['title'] ); ?></a>
						</div>
					<?php endif; ?>
					<?php if(!empty($address)): ?>
						<div class="col-lg-4">
							<p>Address</p>
							<a aria-label="Find us on Google Maps" href="<?php echo esc_url( $address['url'] ); ?>" target="<?php echo esc_attr( $address['target'] ); ?>"><?php echo esc_html( $address['title'] ); ?></a>   
						</div>
					<?php endif; ?>
				</div>
			<?php endif;?>
			<div class="footer-copy">
				<p>&copy; &nbsp;<?php echo date('Y'); ?>&nbsp;<?php echo get_bloginfo(); ?>. All Rights Reserved. | License <?php the_field('company_license', 'option'); ?>
					| <a href="/privacy-policy/">Privacy Policy</a> |
					This site is secured by Google ReCaptcha - see <a href="/privacy-policy/">Privacy</a> & <a href="/terms-conditions/">Terms</a>.
				</p>
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
<?php // Loads </body> scripts if the domain is live.
if(!$_SERVER['HTTP_HOST'] == 'localhost' && get_field('footer_script' , 'options' )) {
	// true
	the_field( 'footer_script' , 'options' );
} else {
	//false
	// echo 'Footer scripts disabled on localhost';
} ?>
<?php edit_post_link( 'Quick Edit' ); ?>
</body>
</html>
