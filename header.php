<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * 	Versión: 0.0.1
 *   @package WordPress
 *   @subpackage Understrap Mybooking Child
 *   @since Understrap Mybooking Child 0.0.1
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
      <?php get_template_part('mybooking-parts/site/mybooking-top-bar') ?>

      <!-- Navigation -->
      <?php get_template_part('mybooking-parts/site/mybooking-navigation') ?>

    </div>
