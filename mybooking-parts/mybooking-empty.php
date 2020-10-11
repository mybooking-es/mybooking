<?php

/**
*   Template Name: MyBooking Empty
*  	------------------------------
*
* 	@version 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div id="content">
	<?php while ( have_posts() ) : the_post(); ?>

		<?php the_content(); ?>

		<?php
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
		?>
							
	<?php endwhile;?>
</div>

<?php get_footer();
