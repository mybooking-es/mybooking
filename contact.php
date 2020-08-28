<?php

/**
*   Template Name: MyBooking Contact
*  	-----------------------------
*
* 	@version 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<section class="bg-contact">

  <div class="contact-content">
    <div class="contact-left">

      <!-- Contact info -->
      <?php get_template_part('mybooking-parts/contact/mybooking-contact-info') ?>

      <!-- Map -->
      <?php get_template_part('mybooking-parts/contact/mybooking-contact-map') ?>

    </div>

    <!-- Contact form -->
    <?php get_template_part('mybooking-parts/contact/mybooking-contact-form') ?>

  </div>
</section>

<?php get_footer();
