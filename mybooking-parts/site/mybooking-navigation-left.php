<?php
/**
*		SITE NAVIGATION LEFT PARTIAL
*  	----------------------------
*
* 	@version 0.0.3
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.4.0
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<nav class="navbar navbar-expand-lg navbar-dark" role="navigation">

  <?php $mybooking_container = MyBookingCustomizer::getInstance()->get_theme_option( 'mybooking_container_type' ); ?>
  <div class="<?php echo esc_attr( $mybooking_container ); ?>">
    <div class="navbar-main nav-left">
      <!-- Menu toggler -->
      <?php get_template_part( 'mybooking-parts/site/mybooking-navigation-toggler' ) ?>
      <!-- Logo & branding -->
      <?php get_template_part( 'mybooking-parts/site/mybooking-navigation-branding' ) ?>
    </div>
    <!-- WordPress menu walker -->
    <?php get_template_part( 'mybooking-parts/site/mybooking-navigation-walker' ) ?>
  </div>
</nav>
