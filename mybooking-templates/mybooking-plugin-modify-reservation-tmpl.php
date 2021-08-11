<?php
  /** 
   * The Template for showing the renting modify reservation form - JS Microtemplates
   *
   * This template can be overridden by copying it to yourtheme/mybooking-templates/mybooking-plugin-modify-reservation-tmpl.php
   *
   * @phpcs:disable PHPCompatibility.Miscellaneous.RemovedAlternativePHPTags.MaybeASPOpenTagFound 
   * @phpcs:disable Generic.PHP.DisallowAlternativePHPTags.MaybeASPOpenTagFound
   * @phpcs:disable Generic.PHP.DisallowAlternativePHPTags.MaybeASPShortOpenTagFound   
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
            <div class="form_selector-select_label_wrap mb-0">
              <select id="pickup_place" name="pickup_place" class="form_selector-select_dropdown form-control"></select>
            </div>
          </div>
          <!-- Custom delivery place -->
          <div id="another_pickup_place_group" style="display: none;">
            <div class="flex-form-item justify-content-between position-relative">
              <input class="w-100 form-control" type="text" id="pickup_place_other" name="pickup_place_other" />
              <input class="w-100 form-control" type="hidden" name="custom_pickup_place" value="false" />
              <button type="button" class="another_pickup_place_group_close p-0">
                <i class="fa fa-times flex-icon-absolute"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="flex-form-box">
          <label><?php echo esc_html_x( 'Return place', 'renting_form_selector', 'mybooking' ) ?></label>
          <div class="flex-form-item return_place_group">
            <div class="form_selector-select_label_wrap mb-0">
              <select id="return_place" name="return_place" class="form_selector-select_dropdown form-control">
              </select>
            </div>
          </div>
          <!-- Custom delivery place -->
          <div id="another_return_place_group" style="display: none;">
            <div class="flex-form-item justify-content-between position-relative">
              <input class="w-100 form-control" type="text" id="return_place_other" name="return_place_other" />
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
        <label><?php echo esc_html( MyBookingEngineContext::getInstance()->getDeliveryDate() ) ?></label>

        <div class="flex-form-item">
          <span class="w-100">
            <div class="inputWithIcon">
            <input class="modify-dates form-control" type="text" id="date_from" name="date_from" readonly="true" />
            <i class="fa fa-calendar flex-icon" aria-hidden="true"></i>
            </div>
          </span>

          <% if (configuration.timeToFrom) { %>
            <select class="ml-1" id="time_from" name="time_from">
            </select>
          <% } else { %>
            <input class="modify-dates form-control" type="hidden" name="time_from" value="10:00" />
          <% } %>
        </div>
      </div>
      <div class="flex-form-box">
        <label><?php echo esc_html( MyBookingEngineContext::getInstance()->getCollectionDate() ) ?></label>
        <div class="flex-form-item">
        <span class="w-100">
            <div class="inputWithIcon">
              <input class="modify-dates form-control" type="text" id="date_to" name="date_to" readonly="true" />
                <i class="fa fa-calendar flex-icon" aria-hidden="true"></i>
            </div>
        </span>

          <% if (configuration.timeToFrom) { %>
            <select class="ml-1" id="time_to" name="time_to">
            </select>
          <% } else { %>
            <input class="modify-dates form-control" type="hidden" name="time_to" value="20:00" />
          <% } %>
        </div>
      </div>
    </div>
  </div>

  <% if (not_hidden_family_id && configuration.selectFamily) { %>
    <div class="flex-form-horizontal-box family" style="display: none">
      <label class="mb-0" for="family_id"><?php echo esc_html( MyBookingEngineContext::getInstance()->getFamily() ) ?></label>
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