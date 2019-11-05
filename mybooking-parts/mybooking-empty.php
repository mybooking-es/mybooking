<?php

/**
*   Template Name: MyBooking Empty
*  	------------------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
<?php endwhile;?>

<?php get_footer();
