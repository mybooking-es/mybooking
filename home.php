<?php
/**
*   Template Name: MyBooking Home
*  	-----------------------------
* 	Autor: Hector Asencio @Mybooking
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Understrap Mybooking Child
*   @since Understrap Mybooking Child 0.0.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php get_header(); ?>

<!-- MYBOOKING PARTIALS -->

<!-- Header -->
<?php get_template_part('mybooking-parts/home/mybooking-home-header'); ?>

<!-- Highlight -->
<?php get_template_part('mybooking-parts/home/mybooking-home-highlight'); ?>

<!-- Promo -->
<?php get_template_part('mybooking-parts/home/mybooking-home-promo'); ?>

<!-- Features -->
<?php get_template_part('mybooking-parts/home/mybooking-home-features'); ?>

<!-- Content -->
<?php get_template_part('mybooking-parts/home/mybooking-home-content'); ?>

<!-- News -->
<?php get_template_part('mybooking-parts/home/mybooking-home-news'); ?>

<!-- Testimonials -->
<?php get_template_part('mybooking-parts/home/mybooking-home-testimonials'); ?>

<!-- END MYBOOKING PARTIALS -->

<?php get_footer(); ?>
