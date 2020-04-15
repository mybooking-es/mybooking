<?php
/**
*		NAVIGATION PANELS PARTIAL
*  	-------------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.4.0
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div>
<!-- Panel triggers -->
<?php $panel_one_image = get_option( 'global_navigation_image_one' );
  if ( $panel_one_image !== '' ) { ?>
    <image class="navpanel_opener navpanel_opener-one" src="<?php echo $panel_one_image ?>" aria-hidden="true" data-toggle="modal" data-target="#navpanel-one">
  <?php  } ?>

<?php $panel_two_image = get_option( 'global_navigation_image_two' );
  if ( $panel_two_image !== '' ) { ?>
    <image class="navpanel_opener navpanel_opener-two" src="<?php echo $panel_two_image ?>" aria-hidden="true" data-toggle="modal" data-target="#navpanel-two">
  <?php  } ?>
</div>

<!-- Panel content -->
<?php $panel_one_active = get_option( 'global_navigation_panel_one' );
  if ( $panel_one_active == 1 ) { ?>

  <div class="navpanel navpanel_one modal fade" id="navpanel-one" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="navpanel-dialog navpanel_content modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
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

<?php $panel_two_active = get_option( 'global_navigation_panel_two' );
  if ( $panel_two_active == 1 ) { ?>

    <div class="navpanel navpanel_two modal fade" id="navpanel-two" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="navpanel-dialog modal-dialog" role="document">
        <div class="navpanel_content modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
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
