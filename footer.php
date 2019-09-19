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

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper-footer" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<footer class="site-footer flex-block-wrapper" id="colophon">

			<div class="site-info">

				<div class="centered-flex-block">
			    <div class="color-transparent-white">&copy; 2019 mybooking</div>
			  </div>

			</div><!-- .site-info -->

		</footer><!-- #colophon -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>
