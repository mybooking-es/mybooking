<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
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
  <div class="site" id="page">

    <!-- Navbar -->

    <div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

      <a class="skip-link sr-only sr-only-focusable"
        href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

      <!-- Topbar -->
      <div class="cta">
        <span>
          <i class="fa fa-phone" aria-hidden="true"></i>
          <a href="tel:+34888888888"> +34 888 88 88 88</span> </a>
        </span>
        <span class="ml-3">
          <i class="fa fa-envelope-o" aria-hidden="true"></i>
          <a class="color-gray-800" href="mailto:info@johndoe.com">info@johndoe.com</a>
        </span>
      </div>

      <!-- Navigation -->

      <nav class="navbar navbar-expand-lg navbar-dark bg-nav">

        <?php if ( 'container' == $container ) : ?>
        <div class="container-fluid">
          <?php endif; ?>

          <!-- Logo & branding -->
          <?php if ( ! has_custom_logo() ) { ?>

          <?php if ( is_front_page() && is_home() ) : ?>
          <h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"
              title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
              itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
          <?php else : ?>
          <a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"
            title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
            itemprop="url"><?php bloginfo( 'name' ); ?></a>
          <?php endif; ?>

          <?php } else { the_custom_logo(); } ?>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false"
            aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- WordPress menu -->

          <?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav ml-auto',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				); ?>

          <?php if ( 'container' == $container ) : ?>
        </div>
        <?php endif; ?>

      </nav>
    </div>
