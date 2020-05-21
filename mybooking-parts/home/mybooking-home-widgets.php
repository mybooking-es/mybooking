<?php
/**
*		MYBOOKING HOME WIDGETS PARTIAL
*  	------------------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.7.0
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'mybooking_container_type' );
?>

<?php $widgets_visible = get_option("promo_home_widgets_active");
if ($widgets_visible == 1) { ?>

  <div class="home-widgets">
    <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
      <div class="row">
        <?php if ( is_active_sidebar( 'home_widgets_1' ) ) : ?>
          <div class="col-12 col-md-6">
            <?php dynamic_sidebar( 'home_widgets_1' ); ?>
          </div>
        <?php endif; ?>

        <?php if ( is_active_sidebar( 'home_widgets_2' ) ) : ?>
          <div class="col-6 col-md-3">
            <?php dynamic_sidebar( 'home_widgets_2' ); ?>
          </div>
        <?php endif; ?>

        <?php if ( is_active_sidebar( 'home_widgets_3' ) ) : ?>
          <div class="col-6 col-md-3">
            <?php dynamic_sidebar( 'home_widgets_3' ); ?>
          </div>
        <?php endif; ?>

        <?php if ( is_active_sidebar( 'home_widgets_4' ) ) : ?>
          <div class="col-12 col-md-6">
            <?php dynamic_sidebar( 'home_widgets_4' ); ?>
          </div>
        <?php endif; ?>

        <?php if ( is_active_sidebar( 'home_widgets_5' ) ) : ?>
          <div class="col-6 col-md-3">
            <?php dynamic_sidebar( 'home_widgets_5' ); ?>
          </div>
        <?php endif; ?>

        <?php if ( is_active_sidebar( 'home_widgets_6' ) ) : ?>
          <div class="col-6 col-md-3">
            <?php dynamic_sidebar( 'home_widgets_6' ); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

<?php } ?>
