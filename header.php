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

   <!-- Cookies popup -->
   <div class="eupopup-container eupopup-container-bottom eupopup-style-compact">
     <div class="eupopup-markup">
       <div class="eupopup-head">
         <?php _e('Esta web usa cookies','mybooking') ?>
       </div>
       <div class="eupopup-body">
         <?php _e('Si continuas navegando entendemos que aceptas todas las cookies','mybooking') ?>
       </div>
       <div class="eupopup-buttons">
         <a href="cookies" target="_blank" class="eupopup-button eupopup-button_2">
           <?php _e('Información','mybooking') ?>
         </a>
         <a href="#" class="eupopup-button eupopup-button_1">
           <?php _e('Continuar','mybooking') ?>
         </a>
       </div>
       <div class="clearfix"></div>
       <a href="#" class="eupopup-closebutton">x</a>
     </div>
   </div>

    <!-- Content -->
    <div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">
      <a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'mybooking' ); ?></a>

      <!-- Topbar -->
      <?php get_template_part('mybooking-parts/site/mybooking-top-bar') ?>

      <!-- Navigation -->
      <?php get_template_part('mybooking-parts/site/mybooking-navigation') ?>

    </div>
