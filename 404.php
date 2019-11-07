<?php
/**
*		404
*  	---
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.2
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="row justify-content-center text-center">
			<main class="site-main" id="main">

				<div class="col">
					<h1>404</h1>
					<p class="lead"><?php _e('No ha sido posible encontrar la página solicitada') ?></p>
					<hr>
					<p>Puede regresar a la <a href="<?php echo home_url( '/' ); ?>">página de inicio</a> o realizar una búqueda</p>
					<?php get_search_form(); ?>
				</div>

				<?php while ( have_posts() ) : the_post(); ?>
		      <?php the_content(); ?>
		    <?php endwhile;?>

			</main>
		</div>
	</div>
	<div class="push"></div>
</div>

<?php get_footer();