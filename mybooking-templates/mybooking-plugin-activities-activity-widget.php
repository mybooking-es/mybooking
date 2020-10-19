<?php
  /** 
   * The Template for showing the activity selector widget
   *
   * This template can be overridden by copying it to yourtheme/mybooking-templates/mybooking-plugin-activities-activity-widget.php
   *
   */
?>
<div>
  <div id="buy_selector" class="full-size-datepicker-container" data-id="<?php echo esc_attr( $args['activity_id'] )?>">
  </div>
  <?php mybooking_engine_get_template('mybooking-plugin-activities-activity-widget-tmpl.php') ?>
</div>