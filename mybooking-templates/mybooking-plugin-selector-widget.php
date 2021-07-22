<?php
  /** 
   * The Template for showing the renting selector widget
   *
   * This template can be overridden by copying it to yourtheme/mybooking-templates/mybooking-plugin-selector-widget.php
   *
   */
?>
<!-- FLEX-FORM-SELECTOR -->
<section class="widget widget_mybooking_rent_engine_selector widget-reservation-step">
  <form id="form-selector" name="widget_search_form" method="get" enctype="application/x-www-form-urlencoded"
    class="flex-form" autocomplete="off">

    <?php if ( array_key_exists('sales_channel_code', $args) && $args['sales_channel_code'] != '' ) : ?>
    <input type="hidden" name="sales_channel_code" value="<?php echo esc_attr( $args['sales_channel_code'] )?>" />
    <?php endif; ?>
    <?php if ( array_key_exists('family_id', $args) && $args['family_id'] != '' ) : ?>
    <input type="hidden" name="family_id" value="<?php echo esc_attr(  $args['family_id'] )?>" />
    <?php endif; ?>

  </form>
</section>