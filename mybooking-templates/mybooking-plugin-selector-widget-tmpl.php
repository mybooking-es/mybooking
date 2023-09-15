<?php
  /**
   * The Template for showing the renting selector widget - JS Microtemplates
   *
   * This template can be overridden by copying it to yourtheme/mybooking-templates/mybooking-plugin-selector-widget-tmpl.php
   *
   * @phpcs:disable PHPCompatibility.Miscellaneous.RemovedAlternativePHPTags.MaybeASPOpenTagFound
   * @phpcs:disable Generic.PHP.DisallowAlternativePHPTags.MaybeASPOpenTagFound
   * @phpcs:disable Generic.PHP.DisallowAlternativePHPTags.MaybeASPShortOpenTagFound
   */
?>
<script type="text/tmpl" id="widget_form_selector_tmpl">

  <% if (!configuration.pickupReturnPlace && !configuration.timeToFrom) { %>
    
    <!-- Inline selector -->
    <div class="flex-form-group-wrapper flex-form-group-wrapper-inline">

        <!-- Simple location -->
        <% if (configuration.simpleLocation) { %>
          <div class="flex-form-group">
            <div class="flex-form-box">
              <label for="widget_simple_location_id">
                <?php echo esc_html_x( 'Where', 'renting_form_selector', 'mybooking' ) ?>
              </label>
              <input type="text" disabled readonly class="form-control" style="opacity: 0; height: 0; margin: 0; padding: 0; border: none !important; margin-left: 20px;" /><!-- This is a input fake for width , TODO revise this -->
              <div class="flex-form-item">
                <select name="simple_location_id" id="widget_simple_location_id" class="form-control"></select>
              </div>
            </div>
          </div>
        <% } %>
        <!-- END Simple location -->

        <!-- Rental location -->

        <% if (not_hidden_rental_location_code && configuration.selectorRentalLocation) { %>
          <div class="flex-form-group widget_rental_location" style="display: none">
            <label for="widget_rental_location_code"><?php echo esc_html( MyBookingEngineContext::getInstance()->getRentalLocation() ) ?></label>
            <div class="flex-form-item">
              <select name="rental_location_code" id="widget_rental_location_code" class="form-control"></select>
            </div>
          </div>
        <% } %>

        <!-- Family -->

        <% if (not_hidden_family_id && configuration.selectFamily) { %>
          <div class="flex-form-group widget_family" style="display: none">
            <div class="flex-form-box mb-0">
              <label for="widget_family_id"><?php echo esc_html( MyBookingEngineContext::getInstance()->getFamily() )?></label>
              <div class="flex-form-item">
                <select name="family_id" id="widget_family_id" class="form-control"></select>
              </div>
            </div>
          </div>
        <% } %>

        <!-- Delivery date -->

        <div class="flex-form-group">
          <div class="flex-form-box mb-0">
            <label for="widget_date_from"><?php echo esc_html( MyBookingEngineContext::getInstance()->getDeliveryDate() )?></label>
            <div class="flex-form-item">
              <span class="w-100">
                <div class="inputWithIcon">
                  <input class="form-control" type="text" id="widget_date_from" name="date_from" readonly="true"/>
                  <i class="fa fa-calendar flex-icon" aria-hidden="true"></i>
                </div>
              </span>
              <% if (configuration.rentDateSelector === 'date_from_date_to') { %>
                <input type="hidden" name="time_from" value="<%=configuration.defaultTimeStart%>" />
              <% } %>  
            </div>
          </div>
        </div>

        <% if (configuration.rentDateSelector === 'date_from_duration') { %>
          <div class="flex-form-group">
            <div class="flex-form-box mb-0">
              <label for="widget_renting_duration"><?php echo esc_html_x( 'Duration', 'renting_form_selector', 'mybooking' ) ?></label>
              <div class="flex-form-item">
                <span class="w-100">
                  <select class="form-control" id="widget_renting_duration" name="renting_duration">
                  </select>  
                </span>
              </div>
            </div>
          </div>
        <% } else if (configuration.rentDateSelector === 'date_from_date_to') { %>
          <div class="flex-form-group">
            <div class="flex-form-box mb-0">
              <label for="widget_date_to"><?php echo esc_html( MyBookingEngineContext::getInstance()->getCollectionDate() )?></label>
              <div class="flex-form-item">
                <span class="w-100">
                  <div class="inputWithIcon">
                    <input class="form-control" type="text" id="widget_date_to" name="date_to" readonly="true"/>
                    <i class="fa fa-calendar flex-icon" aria-hidden="true"></i>
                  </div>
                </span>
                <input type="hidden" name="time_to" value="<%=configuration.defaultTimeEnd%>" />
              </div>
            </div>
          </div>
        <% } %>

        <!-- Age code selector -->
        <div class="flex-form-group ml-0 driver_age_rule" style="display: none">
          <div class="flex-form-box">
            <label for="driver_age_rule_id" >
              <?php echo esc_html_x( 'Age selector', 'renting_form_selector', 'mybooking' ) ?>
            </label>
            <div class="flex-form-horizontal-item">
              <select name="driver_age_rule_id" id="driver_age_rule_id" class="form-control"></select>
            </div>
          </div>
        </div>
        
        <!-- Promotion code -->
        <% if (configuration.promotionCode) { %>
          <div class="flex-form-group">
            <div class="flex-form-box mb-0">
              <label
                for="promotion_code"><?php echo esc_html_x( 'Promotion code', 'renting_form_selector', 'mybooking' ) ?></label>
              <div class="flex-form-horizontal-item">
                <input type="text" class="form-control" name="promotion_code" id="widget_promotion_code" autocomplete="off">
              </div>
            </div>
          </div>
        <% } %>

        <div class="flex-form-group">
          <div class="flex-form-box mb-0">
            <input 
              type="submit" 
              class="btn btn-primary btn-only-dates mybooking-search-button"
              value="<?php echo esc_html_x( 'Search', 'renting_form_selector', 'mybooking') ?>" />
          </div>
        </div>

    </div>

  <% } else { %>

    <% if (not_hidden_rental_location_code && configuration.selectorRentalLocation) { %>
      <div class="flex-form-group-wrapper">
        <div class="flex-form-group widget_rental_location" style="display: none">
          <label for="widget_rental_location_code"><?php echo esc_html( MyBookingEngineContext::getInstance()->getRentalLocation() ) ?></label>
          <div class="flex-form-item">
            <select name="rental_location_code" id="widget_rental_location_code" class="form-control"></select>
          </div>
        </div>
      </div>
    <% } %>

    <div class="flex-form-group-wrapper">

      <% if (configuration.pickupReturnPlace) { %>
        <!-- Pickup / Return place -->
        <div class="flex-form-group">
          <div class="flex-form-box">
            <label for="widget_pickup_place"><?php echo esc_html_x( 'Pick-up place', 'renting_form_selector', 'mybooking') ?></label>
            <div class="flex-form-item widget_pickup_place_group">
              <div class="form_selector-select_label_wrap">
                <select class="form-control" id="widget_pickup_place" name="pickup_place" class="form_selector-select_dropdown"></select>
              </div>
            </div>
            <!-- Custom delivery place -->
            <div id="widget_another_pickup_place_group" style="display: none;">
              <div class="flex-form-item justify-content-between position-relative">
                <input class="w-100 form-control custom-delivery" type="text" id="widget_pickup_place_other" name="pickup_place_other" />
                <input class="w-100 form-control" type="hidden" name="custom_pickup_place" value="false" />
                <button type="button" class="widget_another_pickup_place_group_close p-0">
                  <i class="fa fa-times flex-icon-absolute"></i>
                </button>
              </div>
            </div>
          </div>
          <div class="flex-form-box">
            <label for="widget_return_place"><?php echo esc_html_x( 'Return place', 'renting_form_selector', 'mybooking' ) ?></label>
            <div class="flex-form-item widget_return_place_group">
              <div class="form_selector-select_label_wrap">
                <select id="widget_return_place" name="return_place" class="form_selector-select_dropdown form-control">
                </select>
              </div>
            </div>
            <!-- Custom delivery place -->
            <div id="widget_another_return_place_group" style="display: none;">
              <div class="flex-form-item justify-content-between position-relative">
                <input class="w-100 form-control custom-delivery" type="text" id="widget_return_place_other" name="return_place_other" />
                <input type="hidden" name="custom_return_place" value="false" />
                <button type="button" class="widget_another_return_place_group_close p-0">
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
          <label for="widget_date_from"><?php echo esc_html( MyBookingEngineContext::getInstance()->getDeliveryDate() )?></label>
          <div class="flex-form-item">
    
            <span class="w-100">
            <div class="inputWithIcon">
            <input class="form-control" type="text" id="widget_date_from" name="date_from" readonly="true"/>
              <i class="fa fa-calendar flex-icon" aria-hidden="true"></i>
            </div>
            </span>

            <% if (configuration.timeToFrom) { %>
              <select class="ml-1 form-control" id="widget_time_from" name="time_from">
              </select>
            <% } else { %>
              <input class="form-control" type="hidden" name="time_from" value="<%=configuration.defaultTimeStart%>"/>
            <% } %>
          </div>
        </div>


        <div class="flex-form-box">
          <% if (configuration.rentDateSelector === 'date_from_duration') { %>
            <label for="widget_renting_duration"><?php echo esc_html_x( 'Duration', 'renting_form_selector', 'mybooking' ) ?></label>
            <div class="flex-form-item">
              <span class="w-100">
                <select class="form-control" id="widget_renting_duration" name="renting_duration">
                </select>  
              </span>
            </div>
          <% } else if (configuration.rentDateSelector === 'date_from_date_to') { %>
            <label for="widget_date_to"><?php echo esc_html( MyBookingEngineContext::getInstance()->getCollectionDate() ) ?></label>
            <div class="flex-form-item">
              <span class="w-100">
                <div class="inputWithIcon">
                  <input class="form-control" type="text" id="widget_date_to" name="date_to" readonly="true"/>
                  <i class="fa fa-calendar flex-icon" aria-hidden="true"></i>
                </div>
              </span>
              <% if (configuration.timeToFrom) { %>
                <select class="ml-1 form-control" id="widget_time_to" name="time_to">
                </select>
              <% } else { %>
                <input class="form-control" type="hidden" name="time_to" value="<%=configuration.defaultTimeEnd%>"/>
              <% } %>
            </div>
          <% } %>  
        </div>

      </div>
    </div>

    <% if (not_hidden_family_id && configuration.selectFamily) { %>
      <div class="flex-form-group ml-0 widget_family" style="display: none">
        <div class="flex-form-box">
          <label for="family_id"><?php echo esc_html( MyBookingEngineContext::getInstance()->getFamily() ) ?></label>
          <div class="flex-form-horizontal-item">
            <select name="family_id" id="widget_family_id" class="form-control"></select>
          </div>
        </div>
      </div>
    <% } %>

    <!-- Age code selector -->
    <div class="flex-form-group ml-0 driver_age_rule" style="display: none">
      <div class="flex-form-box">
        <label for="driver_age_rule_id" >
          <?php echo esc_html_x( 'Age selector', 'renting_form_selector', 'mybooking' ) ?>
        </label>
        <div class="flex-form-horizontal-item">
          <select name="driver_age_rule_id" id="driver_age_rule_id" class="form-control"></select>
        </div>
      </div>
    </div>

    <% if (configuration.promotionCode) { %>
      <div class="flex-form-group ml-0">
        <div class="flex-form-box">
          <label
            for="widget_promotion_code"><?php echo esc_html_x( 'Promotion code', 'renting_form_selector', 'mybooking' ) ?></label>
          <div class="flex-form-horizontal-item">
            <input type="text" class="form-control" name="promotion_code" id="widget_promotion_code" autocomplete="off">
          </div>
        </div>
      </div>
    <% } %>

    <div class="flex-form-box">
      <input 
        type="submit" 
        class="btn btn-primary mt-3 mybooking-search-button"
        value="<?php echo esc_html_x( 'Search', 'renting_form_selector', 'mybooking') ?>" />
    </div>

  <% } %>
</script>