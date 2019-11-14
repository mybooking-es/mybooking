<?php
/**
*		SITE NAVIGATION PARTIAL
*  	-----------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
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
      aria-label="<?php esc_attr_e( 'Toggle navigation', 'mybooking' ); ?>">
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
