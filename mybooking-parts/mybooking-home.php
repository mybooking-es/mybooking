<?php
/**
*   Template Name: MyBooking Home
*  	-----------------------------
*
* 	@version 0.0.8
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php get_header(); ?>

<!-- MYBOOKING PARTIALS -->

<!-- Header -->
<?php get_template_part( 'mybooking-parts/home/mybooking-home-header' ); ?>

<!-- Mybooking Home Top Widgets -->
<?php get_template_part( 'mybooking-parts/home/mybooking-home-widgets-top' ); ?>

<!-- WordPress Content -->
<?php get_template_part( 'mybooking-parts/home/mybooking-home-content' ); ?>

<!-- Mybooking Home Center Widgets -->
<?php get_template_part( 'mybooking-parts/home/mybooking-home-widgets-center' ); ?>

<!-- Mybooking News -->
<?php get_template_part( 'mybooking-parts/home/mybooking-home-news' ); ?>

<!-- Mybooking Home Bottom Widgets -->
<?php get_template_part( 'mybooking-parts/home/mybooking-home-widgets-bottom' ); ?>

<!-- END MYBOOKING PARTIALS -->

<?php get_footer();
