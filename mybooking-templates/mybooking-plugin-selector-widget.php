<?php
/**
*   PLUGIN SELECTOR WIDGET
*   ----------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/
?>
<!-- FLEX-FORM-SELECTOR -->
<section class="widget widget_mybooking_rent_engine_selector reservation-step">
  <form id="form-selector" name="widget_search_form" method="get"
        enctype="application/x-www-form-urlencoded" class="flex-form" autocomplete="off">

    <?php if ( $args['sales_channel_code'] != '' ) : ?>

      <input type="hidden" name="sales_channel_code" value="<?php echo $args['sales_channel_code']?>"/>

    <?php endif; ?>
    <?php if ( $args['family_id'] != '' ) : ?>

      <input type="hidden" name="family_id" value="<?php echo $args['family_id']?>"/>

    <?php endif; ?>
    <!-- Pickup place -->
    <div class="flex-form-item-box">
      <label><?php _e('Lugar Entrega ', 'mybooking') ?></label>
      <div class="flex-form-item widget_pickup_place_group">
        <select id="widget_pickup_place" name="pickup_place"></select>
        <i class="fa fa-angle-down flex-icon"></i>
      </div>
      <!-- Custom delivery place -->
      <div id="another_pickup_place_group" style="display: none;">
        <div class="flex-form-item justify-content-between">
          <input class="bg-white w-100" type="text" id="widget_pickup_place_other" name="pickup_place_other" />
          <input type="hidden" name="custom_pickup_place" value="false" />
          <button type="button" class="widget_another_pickup_place_group_close p-0">
            <i class="fa fa-times flex-icon"></i>
          </button>
        </div>
      </div>
    </div>
    <!-- Return place -->
    <div class="flex-form-item-box">
      <label><?php _e('Lugar Devolución ', 'mybooking') ?></label>
      <div class="flex-form-item widget_return_place_group">
        <select id="widget_return_place" name="return_place">
        </select>
        <i class="fa fa-angle-down flex-icon"></i>
      </div>
      <!-- Custom delivery place -->
      <div id="another_return_place_group" style="display: none;">
        <div class="flex-form-item bg-white justify-content-between">
          <input class="bg-white w-100" type="text" id="widget_return_place_other" name="return_place_other" />
          <input type="hidden" name="custom_return_place" value="false" />
          <button type="button" class="widget_another_return_place_group_close p-0">
            <i class="fa fa-times flex-icon"></i>
          </button>
        </div>
      </div>
    </div>
    <!-- Date/Time From -->
    <div class="flex-form-item-box">
      <label><?php _e('Fecha Entrega ', 'mybooking') ?></label>
      <div class="flex-form-item">
        <i class="fa fa-calendar flex-icon" aria-hidden="true"></i>
        <input type="text" id="widget_date_from" name="date_from" readonly="true"/>
        <select class="ml-1" id="widget_time_from" name="time_from">
        </select>
      </div>
    </div>
    <!-- Date/Time To -->
    <div class="flex-form-item-box">
      <label><?php _e('Fecha Devolución ', 'mybooking') ?></label>
      <div class="flex-form-item">
        <i class="fa fa-calendar flex-icon" aria-hidden="true"></i>
        <input type="text" id="widget_date_to" name="date_to" readonly="true"/>
        <select class="ml-1" id="widget_time_to" name="time_to">
        </select>
      </div>
    </div>
    <div class="flex-form-item-box">
      <input type="submit" class="btn btn-primary" value="<?php _e('Buscar', 'mybooking') ?>" />
    </div>
  </form>
</section>
