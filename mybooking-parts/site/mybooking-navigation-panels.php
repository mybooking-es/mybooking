<?php
/**
*		NAVIGATION PANELS PARTIAL
*  	-------------------------
*
* 	Versión: 0.0.2
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.4.0
*
*   Panels on the right of main navigation
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<!-- PANEL ONE -->

<?php $panel_one_image = get_option( 'global_navigation_image_one' );
if ( $panel_one_image !== '' ) { ?>

  <!-- Panel One Trigger -->
  <image class="navpanel_opener" src="<?php echo $panel_one_image ?>" aria-hidden="true" data-toggle="modal" data-target="#navpanel-contact">

  <!-- Panel One Content -->
  <?php $panel_one_active = get_option( 'global_navigation_panel_one' );
    if ( $panel_one_active == 1 ) { ?>

    <div class="navpanel navpanel_one modal fade" id="navpanel-contact" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="navpanel-dialog navpanel_content modal-content">
          <div class="modal-header">
            <?php $panel_one_title = get_option( 'global_navigation_title_one' ); ?>
            <h5 class="modal-title card-info_product-name"><?php $panel_one_title ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/close-icon.png"></span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Widgets Main Menu -->
            <?php if ( is_active_sidebar( 'mybooking_panel_one' ) ) : ?>
              <?php dynamic_sidebar( 'mybooking_panel_one' ); ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>

  <?php  } ?>
<?php  } ?>


<!-- PANEL TWO -->

<?php $panel_two_image = get_option( 'global_navigation_image_two' );
if ( $panel_two_image !== '' ) { ?>

  <!-- Panel Two Trigger -->
  <image class="navpanel_opener" src="<?php echo $panel_two_image ?>" aria-hidden="true" data-toggle="modal" data-target="#navpanel-languages">

  <?php $panel_two_active = get_option( 'global_navigation_panel_two' );
    if ( $panel_two_active == 1 ) { ?>

      <!-- Panel Two Content -->
      <div class="navpanel navpanel_two modal fade" id="navpanel-languages" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="navpanel-dialog modal-dialog" role="document">
          <div class="navpanel_content modal-content">
            <div class="modal-header">
              <?php $panel_two_title = get_option( 'global_navigation_title_two' ); ?>
              <h5 class="modal-title card-info_product-name"><?php $panel_two_title ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/close-icon.png"></span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Widgets Main Menu -->
              <?php if ( is_active_sidebar( 'mybooking_panel_two' ) ) : ?>
                <?php dynamic_sidebar( 'mybooking_panel_two' ); ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
  <?php  } ?>
<?php  } ?>
