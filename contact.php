<?php

/**
*   Template Name: MyBooking Contact
*  	-----------------------------
*
* 	@version 0.0.2
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div class="page_content">
  <div class="container">
    <div class="row">
      <div class="col-md-6">

        <!-- Contact info -->
        <?php get_template_part('mybooking-parts/contact/mybooking-contact-info') ?>

      </div>
      <div class="col-md-6">

        <!-- Contact form -->
        <?php get_template_part('mybooking-parts/contact/mybooking-contact-form') ?>

      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-12 embed-responsive embed-responsive-16by9">

        <!-- Contact map -->
        <?php get_template_part('mybooking-parts/contact/mybooking-contact-map') ?>

      </div>
    </div>
  </div>
</div>

<?php get_footer();
