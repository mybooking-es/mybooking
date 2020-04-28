<?php
/**
*		SITE NAVIGATION RIGHT PARTIAL
*  	-----------------------------
*
* 	Versión: 0.0.2
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.4.0
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-nav">

  <?php $container = get_theme_mod( 'mybooking_container_type' );
  if ( 'container' == $container ) : ?>
    <div class="container-fluid">
  <?php endif; ?>

    <div class="navbar-main">

      <!-- Logo & branding -->
      <?php get_template_part( 'mybooking-parts/site/mybooking-navigation-branding' ) ?>

      <!-- Menu toggler -->
      <?php get_template_part( 'mybooking-parts/site/mybooking-navigation-toggler' ) ?>

    </div>

      <!-- WordPress menu -->
      <?php get_template_part( 'mybooking-parts/site/mybooking-navigation-walker' ) ?>

      <!-- Conditional Extras Zone -->
      <?php
      $panel_one_image = get_option( 'global_navigation_image_one' );
      $panel_two_image = get_option( 'global_navigation_image_two' );
      if ( $panel_one_image !== '' || $panel_two_image !== '' ) : ?>

        <div class="col col-lg-1 navbar-extras d-flex justify-content-end align-items-center">
          <!-- Panels -->
          <?php get_template_part( 'mybooking-parts/site/mybooking-navigation-panels' ) ?>
        </div>

      <?php endif; ?>

  <?php if ( 'container' == $container ) : ?>
    </div>
  <?php endif; ?>

</nav>
