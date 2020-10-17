<?php
/**
*		404
*  	---
*
* 	@version 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.2
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$mybooking_container = MyBookingCustomizer::getInstance()->get_theme_option( 'mybooking_container_type' );

?>

<div class="wrapper" id="page-wrapper">
	<div class="<?php echo esc_attr( $mybooking_container ); ?>" id="content" tabindex="-1">
		<div class="row justify-content-center text-center">
			<main class="site-main" id="main">

				<div class="col">
					<h1 class="title-404"><?php echo esc_html_x('404', '404_page', 'mybooking') ?></h1>
					<h2 class="subtitle-404 lead"><?php echo esc_html_x('Page not found', '404_page', 'mybooking') ?></h2>
					<hr>
					<p><?php echo esc_html_x('We are sorry. The page you were looking for could not be found', '404_page', 'mybooking' ); ?></p>
					<?php get_search_form(); ?>
				</div>

			</main>
		</div>
	</div>
	<div class="push"></div>
</div>

<?php get_footer();
