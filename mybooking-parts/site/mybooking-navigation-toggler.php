<?php
/**
*		NAVIGATION TOGGLER PARTIAL
*  	--------------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.3.0
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<button
  class="navbar-toggler"
  type="button"
  data-toggle="collapse"
  data-target="#navbarNavDropdown"
  aria-controls="navbarNavDropdown"
  aria-expanded="false"
  aria-label="<?php esc_attr_e( 'Toggle navigation', 'mybooking' ); ?>">
  <span class="navbar-toggler-icon"></span>
</button>
