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

<div class="wrapper-footer" id="wrapper-footer">

	<div class="container">
		<div class="row">

			<div class="col-sm">
				<?php if ( is_active_sidebar( 'mybooking_global_footer' ) ) : ?>
					<?php dynamic_sidebar( 'mybooking_global_footer_1' ); ?>
				<?php endif; ?>
			</div>

			<div class="col-sm">
				<?php if ( is_active_sidebar( 'mybooking_global_footer' ) ) : ?>
					<?php dynamic_sidebar( 'mybooking_global_footer_2' ); ?>
				<?php endif; ?>
			</div>

			<div class="col-sm">
				<?php if ( is_active_sidebar( 'mybooking_global_footer' ) ) : ?>
					<?php dynamic_sidebar( 'mybooking_global_footer_3' ); ?>
				<?php endif; ?>
			</div>

		</div>
	</div>

	<div class="<?php echo esc_attr( $container ); ?>">

		<footer class="site-footer flex-block-wrapper" id="colophon">

			<div class="site-info">

				<div class="centered-flex-block">
			    <div class="color-transparent-white">&copy; 2019 mybooking</div>
					<?php $company_trade_name = get_option("company_info_trade_name");
	            if ($company_trade_name !== '') { ?>
	              <div class="color-transparent-white">&copy; <?php echo $company_trade_name ?></div>
	        <?php }
	            else { ?>
								<div class="color-transparent-white">&copy; <?php _e("2019 mybooking",'mybookinges'); ?></div>
	        <?php } ?>
			  </div>

			</div><!-- .site-info -->

		</footer><!-- #colophon -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

<a href="#0" class="cd-top">Top</a>

</body>

</html>
