<?php
  /** 
   * The Template for showing the renting modify reservation form - JS Microtemplates
   *
   * This template can be overridden by copying it to yourtheme/mybooking-templates/mybooking-plugin-modify-reservation-tmpl.php
   *
   * @phpcs:ignore PHPCompatibility.Miscellaneous.RemovedAlternativePHPTags.MaybeASPOpenTagFound 
   */
?>
<script type="text/tmpl" id="form_selector_tmpl">

  <div class="flex-form-group-wrapper">

    <% if (configuration.pickupReturnPlace) { %> 
      <!-- Pickup / Return place -->
      <div class="flex-form-group">
        <div class="flex-form-box">
          <label><?php echo esc_html_x( 'Pick-up place', 'renting_form_selector', 'mybooking') ?></label>
          <div class="flex-form-item pickup_place_group">
            <label class="form_selector-select_label_wrap mb-0">
              <select id="pickup_place" name="pickup_place" class="form_selector-select_dropdown"></select>
            </label>
          </div>
          <!-- Custom delivery place -->
          <div id="another_pickup_place_group" style="display: none;">
            <div class="flex-form-item justify-content-between position-relative">
              <input class="w-100" type="text" id="pickup_place_other" name="pickup_place_other" />
              <input type="hidden" name="custom_pickup_place" value="false" />
              <button type="button" class="another_pickup_place_group_close p-0">
                <i class="fa fa-times flex-icon-absolute"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="flex-form-box">
          <label><?php echo esc_html_x( 'Return place', 'renting_form_selector', 'mybooking' ) ?></label>
          <div class="flex-form-item return_place_group">
            <label class="form_selector-select_label_wrap mb-0">
              <select id="return_place" name="return_place" class="form_selector-select_dropdown">
              </select>
            </label>
          </div>
          <!-- Custom delivery place -->
          <div id="another_return_place_group" style="display: none;">
            <div class="flex-form-item justify-content-between position-relative">
              <input class="w-100" type="text" id="return_place_other" name="return_place_other" />
              <input type="hidden" name="custom_return_place" value="false" />
              <button type="button" class="another_return_place_group_close p-0">
                <i class="fa fa-times flex-icon-absolute"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    <% } %>

    <!-- Date/Time from / to -->
    <div class="flex-form-group">
      <div class="flex-form-box">
        <label><?php echo esc_html_x( 'Pick-up date', 'renting_form_selector', 'mybooking' ) ?></label>
        <div class="flex-form-item">
          <label class="mb-0" for="date_from"><i class="fa fa-calendar flex-icon" aria-hidden="true"></i></label>
          <input type="text" id="date_from" name="date_from" readonly="true"/>
          <% if (configuration.timeToFrom) { %>
            <select class="ml-1" id="time_from" name="time_from">
            </select>
          <% } else { %>
            <input type="hidden" name="time_from" value="10:00"/>
          <% } %>
        </div>
      </div>
      <div class="flex-form-box">
        <label><?php echo esc_html_x( 'Return date', 'renting_form_selector', 'mybooking' ) ?></label>
        <div class="flex-form-item">
          <label class="mb-0" for="date_to"><i class="fa fa-calendar flex-icon" aria-hidden="true"></i></label>
          <input type="text" id="date_to" name="date_to" readonly="true"/>
          <% if (configuration.timeToFrom) { %>
            <select class="ml-1" id="time_to" name="time_to">
            </select>
          <% } else { %>
            <input type="hidden" name="time_to" value="20:00"/>
          <% } %>
        </div>
      </div>
    </div>
  </div>

  <% if (not_hidden_family_id && configuration.selectFamily) { %>
    <div class="flex-form-horizontal-box family" style="display: none">
      <label class="mb-0" for="family_id"><?php echo esc_html_x( 'Family', 'renting_form_selector', 'mybooking' ) ?></label>
      <div class="flex-form-horizontal-item">
        <select name="family_id" id="family_id" class="form-control"></select>
      </div>
    </div>
  <% } %>

  <div class="flex-form-box">
    <input type="submit" class="btn btn-primary mt-3"
      value="<?php echo esc_html_x( 'Search', 'renting_form_selector', 'mybooking') ?>" />
  </div>

</script>