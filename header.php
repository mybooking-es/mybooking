<?php
/**
*		HEADER
*  	------
*   Displays all of the <head> section and everything up till <div id="content">
*
*	  @version 0.0.3
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <?php 
    if ( function_exists( 'wp_body_open' ) ) {
      wp_body_open();
    } else {
      do_action( 'wp_body_open' );
    }
  ?>
  
  <?php
    $navbar_integrated = MyBookingCustomizer::getInstance()->get_theme_option( "mybooking_home_navbar_integrated" );
    $navbar_class = ($navbar_integrated == '1' ? 'nav-container-absolute' : '');

  ?>
  <div class="site" id="page">

    <div id="wrapper-navbar" class="navbar-container <?php echo esc_attr($navbar_class); ?>" itemscope
      itemtype="http://schema.org/WebSite">
      <a class="skip-link sr-only sr-only-focusable"
        href="#content"><?php echo esc_html_x( 'Skip to content', 'header', 'mybooking' ); ?></a>

      <!-- TopBar Message area -->
      <?php if ( is_active_sidebar( 'mybooking_global_top_notification' ) ) { ?>
        <div class="topbar-message">
          <?php dynamic_sidebar( 'mybooking_global_top_notification' ); ?>
        </div>
      <?php } ?>

      <!-- Topbar -->
      <?php $topbar_active = MyBookingCustomizer::getInstance()->get_theme_option( "mybooking_global_topbar" );
        if ( $topbar_active == '1' ) {
            get_template_part( 'mybooking-parts/site/mybooking-top-bar' );
          } ?>

      <!-- Navigation -->
      <?php $options_navigation = MyBookingCustomizer::getInstance()->get_theme_option( "mybooking_global_navigation_layout" );
        if ( $options_navigation == '0' ) {
            get_template_part( 'mybooking-parts/site/mybooking-navigation-right' );
          } else {
            get_template_part( 'mybooking-parts/site/mybooking-navigation-left' );
          } ?>

    </div>

    <div id="full_loader">
      <div class="gooey">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
