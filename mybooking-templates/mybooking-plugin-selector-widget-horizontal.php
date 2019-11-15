<?php
/**
*   PLUGIN WIDGET FORM
*   ------------------
*
*   Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/
?>
<!-- FLEX-FORM-SELECTOR -->
<section class="widget widget_mybooking_rent_engine_selector reservation-step">
  <form id="form-selector" name="widget_search_form" method="get" enctype="application/x-www-form-urlencoded"
    class="flex-form-horizontal" autocomplete="off">

    <?php if ( $args['sales_channel_code'] != '' ) : ?>
    <input type="hidden" name="sales_channel_code" value="<?php echo $args['sales_channel_code']?>"/>
    <?php endif; ?>

    <?php if ( $args['family_id'] != '' ) : ?>
    <input type="hidden" name="family_id" value="<?php echo $args['family_id']?>"/>
    <?php endif; ?>

    <div class="flex-form-group-wrapper">
      <div class="flex-form-group">
        <div class="flex-form-horizontal-box">
          <label><?php _e('Lugar Entrega ', 'mybooking') ?></label>
          <div class="flex-form-horizontal-item">
            <select id="widget_pickup_place" name="pickup_place"></select>
            <i class="fa fa-angle-down flex-icon"></i>
          </div>
        </div>
        <div class="flex-form-horizontal-box">
          <label><?php _e('Lugar Devolución ', 'mybooking') ?></label>
          <div class="flex-form-horizontal-item">
            <select id="widget_return_place" name="return_place">
            </select>
            <i class="fa fa-angle-down flex-icon"></i>
          </div>
        </div>
      </div>
      <div class="flex-form-group">
        <div class="flex-form-horizontal-box">
          <label><?php _e('Fecha Entrega ', 'mybooking') ?></label>
          <div class="flex-form-horizontal-item">
            <i class="fa fa-calendar flex-icon" aria-hidden="true"></i>
            <input type="text" id="widget_date_from" name="date_from" />
            <select class="ml-1" id="widget_time_from" name="time_from">
            </select>
          </div>
        </div>
        <div class="flex-form-horizontal-box">
          <label><?php _e('Fecha Devolución ', 'mybooking') ?></label>
          <div class="flex-form-horizontal-item">
            <i class="fa fa-calendar flex-icon" aria-hidden="true"></i>
            <input type="text" id="widget_date_to" name="date_to" />
            <select class="ml-1" id="widget_time_to" name="time_to">
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="flex-form-horizontal-box">
      <input type="submit" class="btn btn-primary mt-3" value="<?php _e('Buscar', 'mybooking') ?>" />
    </div>
  </form>
</section>