<?php
/**
*		SITE NAVIGATION RIGHT PARTIAL
*  	-----------------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.4.0
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-nav">

  <?php $container = get_theme_mod( 'understrap_container_type' );
  if ( 'container' == $container ) : ?>
    <div class="container-fluid">
    <?php endif; ?>

    <!-- Logo & branding -->
    <?php get_template_part( 'mybooking-parts/site/mybooking-navigation-branding' ) ?>

    <!-- Menu toggler -->
    <?php get_template_part( 'mybooking-parts/site/mybooking-navigation-toggler' ) ?>

    <!-- WordPress menu -->
    <?php get_template_part( 'mybooking-parts/site/mybooking-navigation-walker' ) ?>

    <!-- Panels -->
    <?php get_template_part( 'mybooking-parts/site/mybooking-navigation-panels' ) ?>

    <?php if ( 'container' == $container ) : ?>
  </div>
  <?php endif; ?>

</nav>
