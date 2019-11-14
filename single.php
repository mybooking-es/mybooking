<?php
/**
*		SINGLE POST
*  	-----------
*		Overrides parent document on Understrap Theme
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper page_content" id="single-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="row">
			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'mybooking-parts/blog/mybooking-content-single' ); ?>
					<?php understrap_post_nav(); ?>

					<!-- @Mybooking: We don't want comments on client's posts -->
					
				<?php endwhile; ?>

			</main>
		</div>
	</div>
</div>

<?php get_footer();
