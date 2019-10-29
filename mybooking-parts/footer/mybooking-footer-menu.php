<?php
/**
*		MYBOOKING FOOTER MENU PARTIAL
*  	-----------------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Understrap Mybooking Child
*   @since Understrap Mybooking Child 0.0.2
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<!-- Footer menu -->

<div class="row justify-content-center mybooking-menu_footer">
  <div class="col">

    <?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
    
  </div>
</div>
