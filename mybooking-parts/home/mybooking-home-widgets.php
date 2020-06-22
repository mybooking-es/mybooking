<?php
/**
*		MYBOOKING HOME WIDGETS PARTIAL
*  	------------------------------
*
* 	Versión: 0.0.2
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.7.0
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'mybooking_container_type' );
?>

<?php $widgets_visible = MyBookingCustomizer::getInstance()->get_theme_option( "mybooking_home_content_widgets_visibility" );
if ($widgets_visible) { ?>

  <div class="home-widgets">
    <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
      <div class="row">
        <?php if ( is_active_sidebar( 'home_widgets_1' ) ) : ?>
          <div class="col">
            <?php dynamic_sidebar( 'home_widgets_1' ); ?>
          </div>
        <?php endif; ?>

        <?php if ( is_active_sidebar( 'home_widgets_2' ) ) : ?>
          <div class="col">
            <?php dynamic_sidebar( 'home_widgets_2' ); ?>
          </div>
        <?php endif; ?>

        <?php if ( is_active_sidebar( 'home_widgets_3' ) ) : ?>
          <div class="col">
            <?php dynamic_sidebar( 'home_widgets_3' ); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

<?php } ?>
