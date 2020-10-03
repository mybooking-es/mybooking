<?php
/**
*		NAVIGATION WALKER PARTIAL
*  	-------------------------
*
* 	@version 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.4.0
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php wp_nav_menu(
  array(
    'theme_location'  => 'primary',
    'container_class' => 'collapse navbar-collapse',
    'container_id'    => 'navbarNavDropdown',
    'menu_class'      => 'navbar-nav ml-auto',
    'fallback_cb'     => '',
    'menu_id'         => 'main-menu',
    'depth'           => 10,
    'walker'          => new Mybooking_WP_Bootstrap_Navwalker(),
  )
);
?>

<?php if ( is_active_sidebar( 'mybooking_primary_menu' ) ) : ?>
  <?php dynamic_sidebar( 'mybooking_primary_menu' ); ?>
<?php endif; ?>
