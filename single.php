<?php
/**
*		SINGLE POST
*  	-----------
*
* 	@version 0.0.4
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*
*   CHANGELOG
*   Version 0.0.4
*		- Moved all HTML markup to content partial
*		- Moved mybooking_post_nav() hook to content partial
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="content">
	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'mybooking-parts/blog/mybooking-content-single' ); ?>

		<?php
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
		?>

	<?php endwhile; ?>
</div>

<?php get_footer();
