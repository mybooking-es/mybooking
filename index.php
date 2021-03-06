<?php
/**
*		MAIN INDEX PAGE
*  	---------------
*
* 	@version 0.0.8
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.1.2
*
*   CHANGELOG
*   Version 0.0.5
*   - Deleted deprecated Understrap's hero section
*		Version 0.0.6
*		- Deleted .wrapper #wrapper-index and #content
*		- Deleted old hook calling Understrap's no-content partial
*		- Added right sidebar
*		- Added pagination hook
*		- Added no-content message
*		Version 0.0.7
*		- Template part route updated
*		V3rsion 0.0.8
*		- Moved sidebar to sidebar.php
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div class="page_content">
	<div class="container" id="content" tabindex="-1">
		<div class="row">
			<div class="col">
				<div class="row">
					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'mybooking-parts/blog/mybooking-content-blog' ); ?>
						<?php endwhile; ?>
					<?php else : ?>

						<h3><?php echo esc_html_x( 'No content found. Please publish at least one post to show something at here', 'blog_message', 'mybooking' ); ?></h3>

					<?php endif; ?>

				</div>
			</div>

			<?php get_sidebar(); ?>

			<div class="col-12">

				<?php get_template_part( 'mybooking-parts/blog/mybooking-pagination' ); ?>

			</div>

		</div>
	</div>
</div>

<?php get_footer();
