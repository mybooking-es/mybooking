<?php
/**
*   Template Name: MyBooking Landing
*  	--------------------------------
*
* 	Versión: 0.0.5
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
<?php $header_layout = get_option('global_header_layout');
  if ($header_layout == 0) {
    get_template_part('mybooking-parts/home/mybooking-home-header');
  } else {
    get_template_part('mybooking-parts/home/mybooking-home-header-horizontal');
  }
?>

<?php
// Erased unused modules we can replicate with Elementor: Promos, Highlight & Features
// TODO: Refactorice /mybooking-parts and /mybooking-config to clean up erased modules
?>

<!-- Content -->
<?php get_template_part('mybooking-parts/home/mybooking-home-content'); ?>

<!-- News -->
<?php get_template_part('mybooking-parts/home/mybooking-home-news'); ?>

<!-- Testimonials -->
<?php get_template_part('mybooking-parts/home/mybooking-home-testimonials'); ?>

<!-- END MYBOOKING PARTIALS -->

<?php get_footer(); ?>
