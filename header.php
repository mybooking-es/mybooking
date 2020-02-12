<?php
/**
*		HEADER
*  	------
*   Displays all of the <head> section and everything up till <div id="content">
*
*	  Versión: 0.0.3
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
  <?php do_action( 'wp_body_open' ); ?>

  <div class="site eupopup eupopup-bottom" id="page">
    <div id="wrapper-navbar" class="navbar-container" itemscope itemtype="http://schema.org/WebSite">
      <a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'mybooking' ); ?></a>

      <!-- Topbar -->
      <?php $topbar_active = get_option( "global_topbar" );
        if ( $topbar_active == 1 ) {
            get_template_part( 'mybooking-parts/site/mybooking-top-bar' );
          } ?>

      <!-- Navigation -->
      <?php $options_navigation = get_option( 'global_navigation_layout' );
        if ( $options_navigation == 0 ) {
            get_template_part( 'mybooking-parts/site/mybooking-navigation-right' );
          } else {
            get_template_part( 'mybooking-parts/site/mybooking-navigation-left' );
          } ?>

    </div>
