<?php
/**
*		MYBOOKING HOME BOTTOM WIDGETS PARTIAL
*  	-------------------------------------
*
* 	@version 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 1.0.0
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit; ?>

<?php $widgets_visible = MyBookingCustomizer::getInstance()->get_theme_option( "mybooking_home_bottom_widgets_visibility" );
if ( $widgets_visible == "1" ) { ?>

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

<?php } ?>
