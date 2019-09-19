<?php

/**
* Template Name: MyBooking Home
*
* @package WordPress
* @subpackage Understrap Mybooking Child
* @since Understrap Mybooking Child 0.0.1
*/

get_header();
?>

<!-- HERO SECTION -->

<div class="hero-header-container">
  <div class="hero-header-content">

    <!-- PUNCHLINE -->
    <div class="hero-header-left">
      <div class="aligner">
        <h1>Mybooking Wordpress Theme</h1>
        <p>
          Lorem ipsum dolor amet flannel mumblecore air plant iceland hexagon
          tote bag twee pok pok scenester selfies.
        </p>
      </div>
    </div>

    <!-- WIDGET AREA -->
    <div class="hero-header-right">
      <?php if ( is_active_sidebar( 'mybooking_home_hero' ) ) : ?>
      	<?php dynamic_sidebar( 'mybooking_home_hero' ); ?>
      <?php endif; ?>
    </div>
    
  </div>

  <div class="diagonal-section"></div>
</div>

<?php get_footer();
