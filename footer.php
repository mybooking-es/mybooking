<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper-footer" id="wrapper-footer"  style="background-color:#333;color:#FFF;">

	<div class="<?php echo esc_attr( $container ); ?>">

		<!-- Footer widgets -->

		<div class="row">
			<div class="col-sm">

				<?php if ( is_active_sidebar( 'mybooking_global_footer_1' ) ) : ?>
					<?php dynamic_sidebar( 'mybooking_global_footer_1' ); ?>
				<?php endif; ?>

			</div>
			<div class="col-sm">

				<?php if ( is_active_sidebar( 'mybooking_global_footer_2' ) ) : ?>
					<?php dynamic_sidebar( 'mybooking_global_footer_2' ); ?>
				<?php endif; ?>

			</div>
			<div class="col-sm">

				<?php if ( is_active_sidebar( 'mybooking_global_footer_3' ) ) : ?>
					<?php dynamic_sidebar( 'mybooking_global_footer_3' ); ?>
				<?php endif; ?>

			</div>
			<hr style="background-color: #FFF;">
		</div>

		<!-- Footer menu -->

		<div class="row justify-content-center">

				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('mybooking_global_footer_menu') ) : ?>
					<div class="col-md-8">
						<?php dynamic_sidebar( 'mybooking_global_footer_menu' ); ?>
					</div>
				<?php endif; ?>

		</div>

		<!-- Footer info -->

		<footer class="site-footer" id="colophon">
			<div class="site-info">

					<div class="row">
						<div class="col-sm">

							<!-- Branding & company info -->

							<?php if ( ! has_custom_logo() ) { ?>

								<?php if ( is_front_page() && is_home() ) : ?>
								<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"
										title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
										itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
								<?php else : ?>
								<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"
									title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
									itemprop="url"><?php bloginfo( 'name' ); ?></a>
								<?php endif; ?>

							<?php } else { ?>
								<p><?php the_custom_logo(); ?></p>
							<?php } ?>

							<?php $company_name = get_option("company_info_name");
	        	    if ($company_name !== '') { ?>
	        	    	<p><?php echo $company_name ?>
	        	  <?php } ?>

							<?php $company_id = get_option("company_info_nif");
	        	    if ($company_id !== '') { ?>
	        	    	<br>NIF: <?php echo $company_id ?>
	        	  <?php } ?>

							<?php $company_adress = get_option("company_info_adress");
	        	    if ($company_adress !== '') { ?>
	        	    	<br><?php echo $company_adress ?></p>
	        	  <?php } ?>

						</div>
						<div class="col-sm">
							<h4><?php _e('Follow us', 'mybookinges'); ?></h4>
							<ul class="social-links">
			          <li class="social__item">

			            <?php $company_twitter = get_option("company_info_twitter_url");
			        	    if ($company_twitter !== '') { ?>
			                <a href="<?php echo $company_twitter ?>" target="_blank"><i class="fa fa-twitter"></i></a>
			        	  <?php } ?>

			          </li>
			          <li class="social__item">

			            <?php $company_facebook = get_option("company_info_facebook_url");
			        	    if ($company_facebook !== '') { ?>
			                <a href="<?php echo $company_facebook ?>" target="_blank"><i class="fa fa-facebook"></i></a>
			        	  <?php } ?>

			          </li>
			          <li class="social__item">

			            <?php $company_instagram = get_option("company_info_instagram_url");
			        	    if ($company_instagram !== '') { ?>
			                <a href="<?php echo $company_instagram ?>" target="_blank"><i class="fa fa-instagram"></i></a>
			        	  <?php } ?>

			          </li>
			          <li class="social__item">

			            <?php $company_linkedin = get_option("company_info_linkedin_url");
			        	    if ($company_linkedin !== '') { ?>
			                <a href="<?php echo $company_linkedin ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
			        	  <?php } ?>

			          </li>
			        </ul>
						</div>
						<div class="col-sm">
							<h4><?php _e('Payment methods', 'mybookinges'); ?></h4>
							<ul class="social-links">
			          <li class="social__item">

			            <?php $company_visa = get_option("company_payment_visa");
			        	    if ($company_visa == 1) { ?>
			                <a href="<?php echo $company_visa ?>" target="_blank"><i class="fa fa-cc-visa"></i></a>
			        	  <?php } ?>

			          </li>
			          <li class="social__item">

			            <?php $company_mastercard = get_option("company_payment_mastercard");
			        	    if ($company_mastercard == 1) { ?>
			                <a href="<?php echo $company_mastercard ?>" target="_blank"><i class="fa fa-cc-mastercard"></i></a>
			        	  <?php } ?>

			          </li>
			          <li class="social__item">

			            <?php $company_paypal = get_option("company_payment_paypal");
			        	    if ($company_paypal == 1) { ?>
			                <a href="<?php echo $company_paypal ?>" target="_blank"><i class="fa fa-paypal"></i></a>
			        	  <?php } ?>

			          </li>
			        </ul>
						</div>
					</div>

					<?php $company_trade_name = get_option("company_info_trade_name");
	            if ($company_trade_name !== '') { ?>
	              <div class="color-transparent-white">&copy; 2019 <?php echo $company_trade_name ?></div>
								<br>
	        <?php }
	            else { ?>
								<div class="color-transparent-white">&copy; <?php _e("2019 mybooking",'mybookinges'); ?></div>
								<br>
	        <?php } ?>

			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- container end -->
</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

<a href="#0" class="cd-top">Top</a>

</body>

</html>
