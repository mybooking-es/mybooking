<?php
/**
*		MYBOOKING HOME BOTTOM WIDGETS PARTIAL
*  	-------------------------------------
*
* 	@version 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.9.16
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit; ?>

<?php if ( is_active_sidebar( 'home_widgets_bottom' ) ) : ?>
  <div class="home-bottom-widgets">
    <div class="container">
      <div class="row">
        <div class="col">
          <?php dynamic_sidebar( 'home_widgets_bottom' ); ?>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
