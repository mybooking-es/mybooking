<?php
/**
*		MYBOOKING HOME TOP WIDGETS PARTIAL
*  	----------------------------------
*
* 	@version 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.9.17
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit; ?>

<?php $mybooking_widgets_visible = MyBookingCustomizer::getInstance()->get_theme_option( "mybooking_home_top_widgets_visibility" ); ?>
<?php if ( $mybooking_widgets_visible == "1" ) { ?>
	<?php if ( is_active_sidebar( 'home_widgets_top' ) ) : ?>
	  <div class="home-top-widgets">
	    <div class="container">
	      <div class="row">
	        <div class="col">
	          <?php dynamic_sidebar( 'home_widgets_top' ); ?>
	        </div>
	      </div>
	    </div>
	  </div>
	<?php endif; ?>
<?php } ?>
