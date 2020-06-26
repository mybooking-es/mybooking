<?php
/**
*   Renting Selector Form Template
*   ------------------------------
*
*   Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Plugin
*   @since Mybooking WordPress Plugin 0.5.12
*/
?>
<script type="text/tmpl" id="widget_form_selector_tmpl">

  <% if (!configuration.pickupReturnPlace && !configuration.timeToFrom) { %>

  <div class="flex-form-group-wrapper">
    <div class="flex-form-group">
      <label for="date_from"><?php _e('Fecha Entrega ', 'mybooking') ?></label>
      <div class="flex-form-item">
        <input type="text" class="form-control" name="date_from" id="widget_date_from" autocomplete="off">
        <input type="hidden" name="time_from" value="<%=configuration.defaultTimeStart%>"/>
      </div>
    </div>
    <div class="flex-form-group">
      <label for="date_from"><?php _e('Fecha Devolución ', 'mybooking') ?></label>
      <div class="flex-form-item">
        <input type="text" class="form-control" name="date_to" id="widget_date_to" autocomplete="off">
        <input type="hidden" name="time_to" value="<%=configuration.defaultTimeEnd%>"/>
      </div>
    </div>
    <% if (configuration.promotionCode) { %>
      <div class="flex-form-group">
          <label for="promotion_code"><?php echo _x( 'Promotion code', 'renting_form_selector', 'mybooking-wp-plugin' ) ?></label>
          <div class="flex-form-horizontal-item">
            <input type="text" class="form-control" name="promotion_code" id="widget_promotion_code" autocomplete="off">
          </div>
      </div>
    <% } %>
    <div class="flex-form-group flex-form-group-no-label">
      <div class="flex-form-item">
        <input class="btn btn-primary mt-3" type="submit" value="<?php _e('Buscar', 'mybooking') ?>" />
      </div>
    </div>
  </div>

  <% } else { %>	

  <div class="flex-form-group-wrapper">

    <% if (configuration.pickupReturnPlace) { %> 
      <!-- Pickup / Return place -->
      <div class="flex-form-group">
        <div class="flex-form-box">
          <label><?php _e('Lugar Entrega ', 'mybooking') ?></label>
          <div class="flex-form-item widget_pickup_place_group">
            <label class="form_selector-select_label_wrap">
              <select id="widget_pickup_place" name="pickup_place" class="form_selector-select_dropdown"></select>
            </label>
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
        <div class="flex-form-box">
          <label><?php _e('Lugar Devolución ', 'mybooking') ?></label>
          <div class="flex-form-item widget_return_place_group">
            <label class="form_selector-select_label_wrap">
              <select id="widget_return_place" name="return_place" class="form_selector-select_dropdown">
              </select>
            </label>
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
      </div>
    <% } %>

    <!-- Date/Time from / to -->
    <div class="flex-form-group">
      <div class="flex-form-box">
        <label><?php _e('Fecha Entrega ', 'mybooking') ?></label>
        <div class="flex-form-item">
          <label for="widget_date_from"><i class="fa fa-calendar flex-icon" aria-hidden="true"></i></label>
          <input type="text" id="widget_date_from" name="date_from" readonly="true"/>
          <% if (configuration.timeToFrom) { %>
            <select class="ml-1" id="widget_time_from" name="time_from">
            </select>
          <% } else { %>
            <input type="hidden" name="time_from" value="10:00"/>
          <% } %>
        </div>
      </div>
      <div class="flex-form-box">
        <label><?php _e('Fecha Devolución ', 'mybooking') ?></label>
        <div class="flex-form-item">
          <label for="widget_date_to"><i class="fa fa-calendar flex-icon" aria-hidden="true"></i></label>
          <input type="text" id="widget_date_to" name="date_to" readonly="true"/>
          <% if (configuration.timeToFrom) { %>
            <select class="ml-1" id="widget_time_to" name="time_to">
            </select>
          <% } else { %>
            <input type="hidden" name="time_to" value="20:00"/>
          <% } %>
        </div>
      </div>
    </div>
  </div>
      <% if (configuration.promotionCode) { %>
      <div class="flex-form-group ml-0">
        <div class="flex-form-box">
          <label
            for="promotion_code"><?php echo _x( 'Promotion code', 'renting_form_selector', 'mybooking-wp-plugin' ) ?></label>
          <div class="flex-form-horizontal-item">
            <input type="text" class="form-control" name="promotion_code" id="widget_promotion_code" autocomplete="off">
          </div>
        </div>
      </div>
      <% } %>
  <div class="flex-form-box">
    <input type="submit" class="btn btn-primary mt-3" value="<?php _e('Buscar', 'mybooking') ?>" />
  </div>

  <% } %>
</script>