<?php
/**
*		NAVIGATION BRANDING PARTIAL
*  	---------------------------
*
* 	@version 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.4.0
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<div class="header-titles">
  
  <?php echo wp_kses_post( mybooking_site_logo() ) ?>
  <?php echo wp_kses_post( mybooking_site_description() ) ?>

</div>
