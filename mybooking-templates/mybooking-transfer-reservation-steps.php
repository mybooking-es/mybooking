<?php
/**
*		TRANSFER RESERVATION STEPS
*  	--------------------------

* 	@version 1.0.10
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*
*
*   Notes:
*   ------
*
*   The wizard container is included in order to be able to show the selection
*   wizard in the reservation steps (choose vehicle - checkout - summary)
*
*/
?>

<div class="steps-bg-color">
  <div class="steps-wrapper">
    <div id="steps">

      <?php
      $mybooking_step_classes = get_body_class();
      $mybooking_choose_active = '';
      if ( in_array('mybooking-transfer-choose-product',$mybooking_step_classes) ) {
        $mybooking_choose_active = 'active';
      } elseif ( in_array('mybooking-transfer-complete',$mybooking_step_classes) ) {
        $mybooking_complete_active = 'active';
      } elseif ( in_array('mybooking-transfer-summary',$mybooking_step_classes) ) {
        $mybooking_summary_active = 'active';
      } ?>
      <div data-desc="<?php echo esc_attr_x( 'Select dates', 'transfer_reservation_step', 'mybooking' ) ?>" class="step"><?php echo esc_html_x('1','transfer_reservation_steps', 'mybooking');?></div>
      <div data-desc="<?php echo esc_attr_x( 'Select vehicle', 'transfer_reservation_step', 'mybooking' ) ?>" class="<?php echo esc_attr( $mybooking_choose_active ) ?> step"><?php echo esc_html_x('2','transfer_reservation_steps', 'mybooking');?></div>
      <div data-desc="<?php echo esc_attr_x( 'Checkout', 'transfer_reservation_step', 'mybooking' ) ?>" class="<?php echo esc_attr( $mybooking_complete_active ) ?> step"><?php echo esc_html_x('3','transfer_reservation_steps', 'mybooking');?></div>
      <div data-desc="<?php echo esc_attr_x( 'Summary', 'transfer_reservation_step', 'mybooking' ) ?>" class="<?php echo esc_attr( $mybooking_summary_active ) ?> step"><?php echo esc_html_x('4','transfer_reservation_steps', 'mybooking');?></div>
    </div>
  </div>
</div>