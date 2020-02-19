<?php
/**
*		INDEX
*  	-----
*		Parent document
*
* 	Versión: 0.0.3
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.1.2
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'mybooking_container_type' );
?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<div class="wrapper page_content" id="index-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="row">
			<main class="site-main" id="main">

				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'mybooking-parts/loops/mybooking-content-blog' ); ?>
					<?php endwhile; ?>
				<?php else : ?>
					<?php get_template_part( 'loop-templates/content', 'none' ); ?>
				<?php endif; ?>

			</main>

			<?php mybooking_pagination(); ?>

		</div>
	</div>
</div>

<?php get_footer();
