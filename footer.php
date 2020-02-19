<?php
/**
*		FOOTER
*  	------
* 	Contains the closing of the #content div and all content after
*
*		Versión: 0.0.5
*  	@package WordPress
*  	@subpackage Mybooking WordPress Theme
*  	@since Mybooking WordPress Theme 0.0.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'mybooking_container_type' );
?>

			<div class="footer" id="wrapper-footer">
				<div class="<?php echo esc_attr( $container ); ?>">

					<?php $footer_layout = get_option( 'global_footer_layout' );
					if ( $footer_layout == 0 ) {
						get_template_part('mybooking-parts/mybooking-footer');
					}	?>

				</div>
			</div>

			<?php get_template_part( 'mybooking-parts/footer/mybooking-footer-credits' ); ?>
		</div>

		<?php get_template_part( 'mybooking-parts/site/mybooking-google-analytics' ) ?>
		<?php wp_footer(); ?>

		<!-- Back top link -->
		<a href="#0" class="cd-top">Top</a>
	</body>
</html>
