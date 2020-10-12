<?php
/**
*		SITE NAVIGATION RIGHT PARTIAL
*  	-----------------------------
*
* 	@version 0.0.3
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.4.0
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-nav" role="navigation">

  <?php $container = get_theme_mod( 'mybooking_container_type' ); ?>
  <div class="<?php echo esc_attr( $container ); ?>">

    <div class="navbar-main nav-right">

      <!-- Logo & branding -->
      <?php get_template_part( 'mybooking-parts/site/mybooking-navigation-branding' ) ?>

      <!-- Menu toggler -->
      <?php get_template_part( 'mybooking-parts/site/mybooking-navigation-toggler' ) ?>


    </div>

    <!-- WordPress menu -->
    <?php get_template_part( 'mybooking-parts/site/mybooking-navigation-walker' ) ?>

  </div>
</nav>
