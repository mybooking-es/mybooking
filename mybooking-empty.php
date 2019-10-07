<?php

/**
* Template Name: MyBooking Empty
*
* @package WordPress
* @subpackage Understrap Mybooking Child
* @since Understrap Mybooking Child 0.0.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
<?php endwhile;?>

<?php get_footer();
