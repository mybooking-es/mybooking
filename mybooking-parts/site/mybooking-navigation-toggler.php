<?php
/**
*		NAVIGATION TOGGLER PARTIAL
*  	--------------------------
*
* 	@version 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.4.0
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
  aria-controls="navbarNavDropdown" aria-expanded="false"
  aria-label="<?php echo esc_attr_x( 'Toggle navigation', 'toggle_navigation', 'mybooking' ); ?>">
  <span class="navbar-toggler-icon">
    <i class="fa fa-bars"></i>
  </span>
</button>