<?php
/**
*		VEHICLE SINGLE POST
*  	-------------------
*
* 	@version 0.0.5
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.1.4
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div class="wrapper page_content" id="single-wrapper">
	<div class="container" id="content" tabindex="-1">
		<main class="site-main" id="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'mybooking-parts/loops/mybooking-vehicle-single' ); ?>
				<?php mybooking_post_nav(); ?>

			<?php endwhile; ?>

		</main>
	</div>
</div>

<?php get_footer();
