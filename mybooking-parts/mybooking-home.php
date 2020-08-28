<?php
/**
*   Template Name: MyBooking Home
*  	-----------------------------
*
* 	@version 0.0.5
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

<!-- WordPress Content -->
<?php get_template_part( 'mybooking-parts/home/mybooking-home-content' ); ?>

<!-- Mybooking Widgets Module -->
<?php get_template_part( 'mybooking-parts/home/mybooking-home-widgets' ); ?>

<!-- Mybooking News Module -->
<?php get_template_part( 'mybooking-parts/home/mybooking-home-news' ); ?>

<!-- Mybooking Testimonials Module -->
<?php get_template_part( 'mybooking-parts/home/mybooking-home-testimonials' ); ?>

<!-- END MYBOOKING PARTIALS -->

<?php get_footer();
