<?php

/**
* Template Name: MyBooking Home
*
* @package WordPress
* @subpackage Understrap Mybooking Child
* @since Understrap Mybooking Child 0.0.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php get_header(); ?>

<!-- MYBOOKING PARTIALS -->

<!-- Header -->
<?php get_template_part('mybooking-parts/mybooking-home-header'); ?>

<!-- Highlight -->
<?php get_template_part('mybooking-parts/mybooking-home-highlight'); ?>

<!-- Promo -->
<?php get_template_part('mybooking-parts/mybooking-home-promo'); ?>

<!-- Features -->
<?php get_template_part('mybooking-parts/mybooking-home-features'); ?>

<!-- News -->
<?php get_template_part('mybooking-parts/mybooking-home-news'); ?>

<!-- Testimonials -->
<?php get_template_part('mybooking-parts/mybooking-home-testimonials'); ?>

<!-- END MYBOKKING PARTIALS -->

<?php get_footer(); ?>
