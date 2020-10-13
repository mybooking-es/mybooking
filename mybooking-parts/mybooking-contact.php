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
  <div class="container" id="content">
    <div class="row">
      <div class="col-md-6">

        <?php while ( have_posts() ) : the_post(); ?>

          <?php the_content(); ?>
          <?php get_template_part('mybooking-parts/contact/mybooking-contact-info') ?>
                    
        <?php endwhile;?>

      </div>
      <div class="col-md-6 embed-responsive embed-responsive-4by3">

        <!-- Contact map -->
        <?php get_template_part('mybooking-parts/contact/mybooking-contact-map') ?>

      </div>
    </div>

    <!-- Contact widgets -->
    <?php if ( is_active_sidebar( 'mybooking_contact' )) { ?>
      <hr>
      <div class="row">
        <div class="col">
          <?php dynamic_sidebar( 'mybooking_contact' ); ?>
        </div>
      </div>
    <?php } ?>

  </div>
</div>

<?php get_footer();
