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

  <div class="flex-form-group-wrapper">

      <% if (not_hidden_family_id && configuration.selectFamily) { %>
        <div class="flex-form-group widget_family" style="display: none">
          <div class="flex-form-box mb-0">
            <label for="family_id"><?php echo esc_html_x( 'Family', 'renting_form_selector', 'mybooking' ) ?></label>
            <div class="flex-form-item">
              <select name="family_id" id="widget_family_id" class="ml-1"></select>
            </div>
          </div>
        </div>
      <% } %>

      <div class="flex-form-group">
        <div class="flex-form-box mb-0">
          <label><?php echo esc_html_x( 'Pick-up date', 'renting_form_selector', 'mybooking' ) ?></label>
          <div class="flex-form-item">
            <label for="widget_date_from"><i class="fa fa-calendar flex-icon" aria-hidden="true"></i></label>
            <input class="only-dates" type="text" id="widget_date_from" name="date_from" readonly="true" />
            <% if (configuration.timeToFrom) { %>
              <select class="ml-1" id="widget_time_from" name="time_from">
            </select>
            <% } else { %>
              <input type="hidden" name="time_from" value="<%=configuration.defaultTimeStart%>" />
            <% } %>
          </div>
        </div>
      </div>
      
      <div class="flex-form-group">
        <div class="flex-form-box mb-0">
          <label><?php echo esc_html_x( 'Return date', 'renting_form_selector', 'mybooking' ) ?></label>
          <div class="flex-form-item">
            <label for="widget_date_to"><i class="fa fa-calendar flex-icon" aria-hidden="true"></i></label>
            <input class="only-dates" type="text" id="widget_date_to" name="date_to" readonly="true" />
            <% if (configuration.timeToFrom) { %>
            <select class="ml-1" id="widget_time_to" name="time_to">
            </select>
            <% } else { %>
            <input type="hidden" name="time_to" value="<%=configuration.defaultTimeEnd%>" />
            <% } %>
          </div>
        </div>
      </div>
    
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
          <input type="submit" class="btn btn-primary btn-only-dates"
            value="<?php echo esc_html_x( 'Search', 'renting_form_selector', 'mybooking') ?>" />
        </div>
      </div>

  </div>

  <% } else { %>	

  <div class="flex-form-group-wrapper">

    <% if (configuration.pickupReturnPlace) { %> 
      <!-- Pickup / Return place -->
      <div class="flex-form-group">
        <div class="flex-form-box">
          <label><?php echo esc_html_x( 'Pick-up place', 'renting_form_selector', 'mybooking') ?></label>
          <div class="flex-form-item widget_pickup_place_group">
            <label class="form_selector-select_label_wrap">
              <select id="widget_pickup_place" name="pickup_place" class="form_selector-select_dropdown"></select>
            </label>
          </div>
          <!-- Custom delivery place -->
          <div id="another_pickup_place_group" style="display: none;">
            <div class="flex-form-item justify-content-between position-relative">
              <input class="w-100" type="text" id="widget_pickup_place_other" name="pickup_place_other" />
              <input type="hidden" name="custom_pickup_place" value="false" />
              <button type="button" class="widget_another_pickup_place_group_close p-0">
                <i class="fa fa-times flex-icon-absolute"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="flex-form-box">
          <label><?php echo esc_html_x( 'Return place', 'renting_form_selector', 'mybooking' ) ?></label>
          <div class="flex-form-item widget_return_place_group">
            <label class="form_selector-select_label_wrap">
              <select id="widget_return_place" name="return_place" class="form_selector-select_dropdown">
              </select>
            </label>
          </div>
          <!-- Custom delivery place -->
          <div id="another_return_place_group" style="display: none;">
            <div class="flex-form-item justify-content-between position-relative">
              <input class="w-100" type="text" id="widget_return_place_other" name="return_place_other" />
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
        <label><?php echo esc_html_x( 'Pick-up date', 'renting_form_selector', 'mybooking' ) ?></label>
        <div class="flex-form-item">
          <label for="widget_date_from"><i class="fa fa-calendar flex-icon" aria-hidden="true"></i></label>
          <input type="text" id="widget_date_from" name="date_from" readonly="true"/>
          <% if (configuration.timeToFrom) { %>
            <select class="ml-1" id="widget_time_from" name="time_from">
            </select>
          <% } else { %>
            <input type="hidden" name="time_from" value="<%=configuration.defaultTimeStart%>"/>
          <% } %>
        </div>
      </div>
      <div class="flex-form-box">
        <label><?php echo esc_html_x( 'Return date', 'renting_form_selector', 'mybooking' ) ?></label>
        <div class="flex-form-item">
          <label for="widget_date_to"><i class="fa fa-calendar flex-icon" aria-hidden="true"></i></label>
          <input type="text" id="widget_date_to" name="date_to" readonly="true"/>
          <% if (configuration.timeToFrom) { %>
            <select class="ml-1" id="widget_time_to" name="time_to">
            </select>
          <% } else { %>
            <input type="hidden" name="time_to" value="<%=configuration.defaultTimeEnd%>"/>
          <% } %>
        </div>
      </div>
    </div>
  </div>

  <% if (not_hidden_family_id && configuration.selectFamily) { %>
    <div class="flex-form-group ml-0 widget_family" style="display: none">
      <div class="flex-form-box">
        <label for="family_id"><?php echo esc_html_x( 'Family', 'renting_form_selector', 'mybooking' ) ?></label>
        <div class="flex-form-horizontal-item">
          <select name="family_id" id="widget_family_id" class="form-control"></select>
        </div>
      </div>
    </div>
  <% } %>

      
  <% if (configuration.promotionCode) { %>
  <div class="flex-form-group ml-0">
    <div class="flex-form-box">
      <label
        for="promotion_code"><?php echo esc_html_x( 'Promotion code', 'renting_form_selector', 'mybooking' ) ?></label>
      <div class="flex-form-horizontal-item">
        <input type="text" class="form-control" name="promotion_code" id="widget_promotion_code" autocomplete="off">
      </div>
    </div>
  </div>
  <% } %>

  <div class="flex-form-box">
    <input type="submit" class="btn btn-primary mt-3"
      value="<?php echo esc_html_x( 'Search', 'renting_form_selector', 'mybooking') ?>" />
  </div>

  <% } %>
</script>