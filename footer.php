<?php
/**
 * 	The template for displaying the footer.
 *
 * 	Contains the closing of the #content div and all content after
 *
 *	Versión: 0.0.2
 *  @package WordPress
<<<<<<< HEAD
 *  @subpackage Mybooking WordPress Theme
 *  @since Mybooking WordPress Theme 0.0.1
=======
 *  @subpackage Understrap Mybooking Child
 *  @since Understrap Mybooking Child 0.0.1
>>>>>>> de63521a53d8950b8cbc1c378d102dafb08a090d
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

			<div class="wrapper-footer" id="wrapper-footer">
				<div class="<?php echo esc_attr( $container ); ?>">

					<?php $footer_layout = get_option("global_footer_layout");
					if ($footer_layout == 0) {
							get_template_part('mybooking-parts/mybooking-footer-regular');
						} else {
							get_template_part('mybooking-parts/mybooking-footer-simple');
						} ?>

				</div><!-- container end -->
			</div><!-- wrapper end -->

		</div><!-- #page we need this extra closing tag here -->

		<?php wp_footer(); ?>

		<a href="#0" class="cd-top">Top</a>

	</body>
</html>
