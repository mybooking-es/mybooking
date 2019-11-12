<?php
/**
 * 	The template for displaying the footer.
 *
 * 	Contains the closing of the #content div and all content after
 *
 *	Versión: 0.0.3
 *  @package WordPress
 *  @subpackage Mybooking WordPress Theme
 *  @since Mybooking WordPress Theme 0.0.1
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

			<div class="wrapper-footer footer" id="wrapper-footer">
				<div class="<?php echo esc_attr( $container ); ?>">

					<?php $footer_layout = get_option('global_footer_layout');
					if ($footer_layout == 0) {
							get_template_part('mybooking-parts/mybooking-footer-minimal');
						} else {
							get_template_part('mybooking-parts/mybooking-footer-regular');
						}
					?>

				</div>
			</div>
		</div>

		<!-- Goole Analytics -->
		<?php get_template_part('mybooking-parts/site/mybooking-google-analytics') ?>

		<!-- WordPress Footer -->
		<?php wp_footer(); ?>

		<!-- Back top link -->
		<a href="#0" class="cd-top">Top</a>
	</body>
</html>
