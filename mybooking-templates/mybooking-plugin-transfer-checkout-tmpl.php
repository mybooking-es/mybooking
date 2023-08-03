<?php
  /**
   * The Template for showing the transfer checkout step - JS microtemplates
   *
   * This template can be overridden by copying it to yourtheme/mybooking-templates/mybooking-plugin-transfer-checkout-tmpl.php
   *
   * @phpcs:disable PHPCompatibility.Miscellaneous.RemovedAlternativePHPTags.MaybeASPOpenTagFound
   * @phpcs:disable Generic.PHP.DisallowAlternativePHPTags.MaybeASPOpenTagFound
   * @phpcs:disable Generic.PHP.DisallowAlternativePHPTags.MaybeASPShortOpenTagFound
   */
?>

<!-- Extra representation -->
<script type="text/template" id="script_transfer_detailed_extra">

  <% if (extras && extras.length > 0) { %>
    <div class="process-section-box">
      <h4 class="brand-primary my-3"><?php echo esc_html_x( 'Extras', 'transfer_checkout', 'mybooking') ?></h4>
      <div class="extras-container">
        <% for (var idx=0;idx<extras.length;idx++) { %>
          <% var extra = extras[idx]; %>
          <div class="extra-wrapper">
            <div class="extras-left">
              <div class="extra-title">
                <% if (extra.photo_url != null) { %>
                  <img src="<%=extra.photo_url%>" class="card-img js-extra-info-btn" data-extra="<%=extra.id%>" />
                <% } %>
                <h6 class="lead"><%=extra.name%></h6>
              </div>
              <div class="extras-text"><%=extra.description%></div>
            </div>
            <div class="extras-right">
            <p class="extras-price"><%= configuration.formatCurrency(extra.price)%></p>
              <% if (extra.max_quantity > 1) { %>
                <div class="input-group input-group-sm" style="width:100px;">
                    <div class="input-group-prepend">
                      <button class="btn btn-outline-secondary btn-minus-extra"
                        data-value="<%=extra.id%>"
                        data-max-quantity="<%=extra.max_quantity%>">-</button>
                    </div>
                    <% value = (extrasInShoppingCart[extra.id]) ? extrasInShoppingCart[extra.id] : 0; %>
                    <input type="text" id="extra-<%=extra.id%>-quantity"
                        class="form-control disabled text-center extra-input" value="<%=value%>" data-extra-code="<%=extra.id%>"/>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary btn-plus-extra"
                        data-value="<%=extra.id%>"
                        data-max-quantity="<%=extra.max_quantity%>">+</button>
                      </div>
                </div>
              <% } else { %>
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input extra-checkbox" id="checkboxl<%=extra.id%>" data-value="<%=extra.id%>" <% if (extrasInShoppingCart[extra.id] &&  extrasInShoppingCart[extra.id] > 0) { %> checked="checked" <% } %>>
                  <label class="custom-control-label" for="checkboxl<%=extra.id%>"></label>
                </div>
              <% } %>
            </div>
          </div>
        <% } %>
      </div>
    </div>
  <% } %>

</script>

<!-- Reservation form -->
<script type="text/tmpl" id="script_transfer_complete_form_tmpl">
  <div class="form-row customer-component">
    <div class="form-group customer_component col-md-6">
      <label for="customer_name"><?php echo esc_html_x( 'Name', 'transfer_checkout', 'mybooking') ?>*</label>
      <input type="text" class="form-control" name="customer_name" id="customer_name" autocomplete="off" placeholder="<?php echo esc_attr_x( 'Name', 'transfer_checkout', 'mybooking') ?>:*" maxlength="40">
    </div>

    <div class="form-group customer_component col-md-6">
      <label for="customer_surname"><?php echo esc_html_x( 'Surname', 'transfer_checkout', 'mybooking') ?>*</label>
      <input type="text" class="form-control" name="customer_surname" id="customer_surname" autocomplete="off" placeholder="<?php echo esc_attr_x( 'Surname', 'transfer_checkout', 'mybooking') ?>:*" maxlength="40">
    </div>

    <div class="form-group customer_component col-md-6">
      <label for="customer_email"><?php echo esc_html_x( 'E-mail', 'transfer_checkout', 'mybooking') ?>*</label>
      <input type="text" class="form-control" name="customer_email" id="customer_email" autocomplete="off" placeholder="<?php echo esc_attr_x( 'E-mail', 'transfer_checkout', 'mybooking') ?>:*" maxlength="50">
    </div>

    <div class="form-group customer_component col-md-6">
      <label for="customer_email"><?php echo esc_html_x( 'Confirm E-mail', 'transfer_checkout', 'mybooking') ?>*</label>
      <input type="text" class="form-control" name="confirm_customer_email" autocomplete="off" id="confirm_customer_email" placeholder="<?php echo esc_attr_x( 'Confirm E-mail', 'transfer_checkout', 'mybooking') ?>:*" maxlength="50">
    </div>

    <div class="form-group customer_component col-md-6">
        <label for="customer_phone"><?php echo esc_html_x( 'Phone number', 'transfer_checkout', 'mybooking') ?>*</label>
        <input type="text" class="form-control" name="customer_phone" id="customer_phone" autocomplete="off" placeholder="<?php echo esc_attr_x( 'Phone number', 'transfer_checkout', 'mybooking') ?>:*" maxlength="15">
    </div>

    <div class="form-group customer_component col-md-6">
        <label for="customer_mobile_phone"><?php echo esc_html_x( 'Alternative phone number', 'transfer_checkout', 'mybooking') ?></label>
        <input type="text" class="form-control" name="customer_mobile_phone" id="customer_mobile_phone" autocomplete="off" placeholder="<?php echo esc_attr_x( 'Alternative phone number', 'transfer_checkout', 'mybooking') ?>:" maxlength="15">
    </div>
    <br>
  </div>

  <% if (configuration.transferFormFillBillingAddress) { %>
    <h5 class="mb-4 complete-section-title"><?php echo esc_html_x( "Billing address", 'transfer_checkout', 'mybooking') ?></h5>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="street"><?php echo esc_html_x( 'Address', 'transfer_checkout', 'mybooking') ?>*</label>
        <input class="form-control" id="customer_address_street" name="customer_address_street" type="text"
          placeholder="<%=configuration.escapeHtml("<?php echo esc_attr_x( 'Address', 'transfer_checkout', 'mybooking') ?>:*")%>" 
          maxlength="100" required>
      </div>
      <div class="form-group col-md-6">
        <label for="city"><?php echo esc_html_x( 'City', 'transfer_checkout', 'mybooking') ?>*</label>
        <input class="form-control" id="customer_address_city" name="customer_address_city" type="text"
          placeholder="<%=configuration.escapeHtml("<?php echo esc_attr_x( 'City', 'transfer_checkout', 'mybooking') ?>:*")%>"  
          maxlength="60" required>
      </div>
      <div class="form-group col-md-6">
        <label for="state"><?php echo esc_html_x( 'State', 'transfer_checkout', 'mybooking') ?>*</label>
        <input class="form-control" id="customer_address_state" name="customer_address_state" type="text"
          placeholder="<%=configuration.escapeHtml("<?php echo esc_attr_x( 'State', 'transfer_checkout', 'mybooking') ?>:*")%>"  
          maxlength="60" required>
      </div>
      <div class="form-group col-md-6">
        <label for="state"><?php echo esc_html_x( 'Postal Code', 'transfer_checkout', 'mybooking') ?>*</label>
        <input class="form-control" id="customer_address_zip" name="customer_address_zip" type="text"
          placeholder="<%=configuration.escapeHtml("<?php echo esc_attr_x( 'Postal Code', 'transfer_checkout', 'mybooking') ?>:*")%>"  
          maxlength="10" required>
      </div>
      <div class="form-group col-md-6">
        <label class="full-width"
          for="country"><?php echo esc_html_x( 'Country', 'transfer_checkout', 'mybooking') ?>*</label>
          <select name="customer_address_country" id="customer_address_country" class="form-control" required>
          </select>
      </div>
    </div>
  <% } %>    

  <hr>

  <% if (configuration.transfer_origin_destination_detailed_info_mode === 'only_address') { %>
    <!-- Only Text detailed information -->
    <div class="form-group">
      <label for="detailed_origin_address"><?php echo esc_html_x( 'Pickup address (hotel, resort, address, terminal)', 'transfer_checkout', 'mybooking') ?>*</label>
      <textarea class="form-control" name="detailed_origin_address" id="detailed_origin_address" rows="5" placeholder="<?php echo esc_attr_x( 'Pickup address (hotel, resort, address, terminal)', 'transfer_checkout', 'mybooking') ?>"></textarea>
    </div>

    <% if (shopping_cart.round_trip) { %>
      <div class="form-group">
        <label for="detailed_origin_address"><?php echo esc_html_x( 'Dropoff address (hotel, resort, address, terminal)', 'transfer_checkout', 'mybooking') ?>*</label>
        <textarea class="form-control" name="detailed_return_origin_address" id="detailed_return_origin_address" rows="5" placeholder="<?php echo esc_attr_x( 'Dropoff address (hotel, resort, address, terminal)', 'transfer_checkout', 'mybooking') ?>"></textarea>
      </div>
    <% } %>  
  <% } else if (configuration.transfer_origin_destination_detailed_info_mode === 'flight_address') { %>
    <!-- Standard pickup/dropoff -->
    <h5 class="mb-4 complete-section-title"><?php echo esc_html_x( "Transfer details", 'transfer_checkout', 'mybooking') ?></h5>
    <h6><?php echo esc_html_x( "Outward Journey Details", 'transfer_checkout', 'mybooking') ?></h6>
    <div class="form-row">
      <div class="form-group customer_component col-md-6">
        <label for="detailed_origin_flight_number"><?php echo esc_html_x( 'Flight or vessel number', 'transfer_checkout', 'mybooking') ?>*</label>
        <input type="text" class="form-control" name="detailed_origin_flight_number" id="detailed_origin_flight_number" autocomplete="off" placeholder="<?php echo esc_attr_x( 'Flight number', 'transfer_checkout', 'mybooking') ?>:*" maxlength="50">
      </div>
      <div class="form-group customer_component col-md-6">
          <label for="detailed_origin_flight_estimated_time"><?php echo esc_html_x( 'Flight or vessel estimated time', 'transfer_checkout', 'mybooking') ?>*</label>
          <input type="text" class="form-control" name="detailed_origin_flight_estimated_time" autocomplete="off" id="detailed_origin_flight_estimated_time" placeholder="<?php echo esc_attr_x( 'Flight estimated time', 'transfer_checkout', 'mybooking') ?>:*" maxlength="50">
      </div>
    </div>   
    <% if (shopping_cart.round_trip) { %>
      <h6><?php echo esc_html_x( "Return Journey Details", 'transfer_checkout', 'mybooking') ?></h6>
      <div class="form-row">
        <div class="form-group customer_component col-md-6">
          <label for="detailed_return_origin_flight_number"><?php echo esc_html_x( 'Flight or Vessel number', 'transfer_checkout', 'mybooking') ?>*</label>
          <input type="text" class="form-control" name="detailed_return_origin_flight_number" id="detailed_return_origin_flight_number" autocomplete="off" placeholder="<?php echo esc_attr_x( 'Flight number', 'transfer_checkout', 'mybooking') ?>:*" maxlength="50">
        </div>
        <div class="form-group customer_component col-md-6">
          <label for="detailed_return_origin_flight_estimated_time"><?php echo esc_html_x( 'Flight or Vessel estimated time', 'transfer_checkout', 'mybooking') ?>*</label>
          <input type="text" class="form-control" name="detailed_return_origin_flight_estimated_time" autocomplete="off" id="detailed_return_origin_flight_estimated_time" placeholder="<?php echo esc_attr_x( 'Flight estimated time', 'transfer_checkout', 'mybooking') ?>:*" maxlength="50">
        </div>
      </div>    
    <% } %>
    <h6><?php echo esc_html_x( "Accommodation", 'transfer_checkout', 'mybooking') ?></h6>
    <div class="form-group">
      <label for="detailed_origin_address"><?php echo esc_html_x( 'Name of Hotel / Complex / Villa and address', 'transfer_checkout', 'mybooking') ?>*</label>
      <textarea class="form-control" name="detailed_origin_address" id="detailed_origin_address" rows="5" placeholder="<?php echo esc_attr_x( 'Name of Hotel / Complex / Villa and address', 'transfer_checkout', 'mybooking') ?>"></textarea>
    </div>      
  <% } else { %>
      <!-- Trip -->
      <h5 class="mb-4 complete-section-title"><?php echo esc_html_x( "Trip details", 'transfer_checkout', 'mybooking') ?></h5>

      <!-- Going Origin -->
      <div class="mb-3"><u><b><i class="fa fa-car"></i>&nbsp;<?php echo esc_html_x( "Pickup", 'transfer_checkout', 'mybooking') ?></b> <%= shopping_cart.origin_point_name_customer_translation%></u></div>

      <% if (shopping_cart.origin_point_detailed_info) { %> 
        <% if (shopping_cart.origin_point_type === 'location') { %>
          <div class="form-group">
            <label for="detailed_origin_address"><?php echo esc_html_x( 'Address or hotel name', 'transfer_checkout', 'mybooking') ?>*</label>
            <textarea class="form-control" name="detailed_origin_address" id="detailed_origin_address" rows="5" placeholder="<?php echo esc_attr_x( 'Address or hotel name', 'transfer_checkout', 'mybooking') ?>"></textarea>
          </div>
        <% } else { %>
          <div class="form-row">
            <div class="form-group customer_component col-md-6">
              <label for="detailed_origin_flight_number"><?php echo esc_html_x( 'Flight or vessel number', 'transfer_checkout', 'mybooking') ?>*</label>
              <input type="text" class="form-control" name="detailed_origin_flight_number" id="detailed_origin_flight_number" autocomplete="off" placeholder="<?php echo esc_attr_x( 'Flight number', 'transfer_checkout', 'mybooking') ?>:*" maxlength="50">
            </div>
            <div class="form-group customer_component col-md-6">
              <label for="detailed_origin_flight_estimated_time"><?php echo esc_html_x( 'Flight or vessel estimated time', 'transfer_checkout', 'mybooking') ?>*</label>
              <input type="text" class="form-control" name="detailed_origin_flight_estimated_time" autocomplete="off" id="detailed_origin_flight_estimated_time" placeholder="<?php echo esc_attr_x( 'Flight estimated time', 'transfer_checkout', 'mybooking') ?>:*" maxlength="50">
            </div>
          </div>
        <% } %>
      <% } %>  

      <!-- Going Destination -->
      
      <div class="mb-3"><u><b><i class="fa fa-map-marker"></i>&nbsp;<?php echo esc_html_x( "Drop off", 'transfer_checkout', 'mybooking') ?></b> <%= shopping_cart.destination_point_name_customer_translation%></u></div>

      <% if (shopping_cart.destination_point_detailed_info) { %> 
        <% if (shopping_cart.destination_point_type === 'location') { %>
          <div class="form-group">
            <label for="detailed_destination_address"><?php echo esc_html_x( 'Address or hotel name', 'transfer_checkout', 'mybooking') ?>*</label>
            <textarea class="form-control" name="detailed_destination_address" id="detailed_destination_address" rows="5" placeholder="<?php echo esc_attr_x( 'Address or hotel name', 'transfer_checkout', 'mybooking') ?>"></textarea>
          </div>
        <% } else { %>
          <div class="form-row">
            <div class="form-group customer_component col-md-6">
              <label for="detailed_destination_flight_number"><?php echo esc_html_x( 'Flight or vessel number', 'transfer_checkout', 'mybooking') ?>*</label>
              <input type="text" class="form-control" name="detailed_destination_flight_number" id="detailed_destination_flight_number" autocomplete="off" placeholder="<?php echo esc_attr_x( 'Flight number', 'transfer_checkout', 'mybooking') ?>:*" maxlength="50">
            </div>
            <div class="form-group customer_component col-md-6">
              <label for="detailed_destination_flight_estimated_time"><?php echo esc_html_x( 'Flight or vessel estimated time', 'transfer_checkout', 'mybooking') ?>*</label>
              <input type="text" class="form-control" name="detailed_destination_flight_estimated_time" autocomplete="off" id="detailed_destination_flight_estimated_time" placeholder="<?php echo esc_attr_x( 'Flight estimated time', 'transfer_checkout', 'mybooking') ?>:*" maxlength="50">
            </div>
          </div>
        <% } %>
      <% } %>  

      <% if (shopping_cart.round_trip) { %>
        <hr>
        <h5 class="mb-4 complete-section-title"><?php echo esc_html_x( "Round trip details", 'transfer_checkout', 'mybooking') ?></h5>

        <!-- Return Origin -->

        <div class="mb-3"><u><b><i class="fa fa-car"></i>&nbsp;<?php echo esc_html_x( "Pickup", 'transfer_checkout', 'mybooking') ?></b> <%= shopping_cart.return_origin_point_name_customer_translation%></u></div>
        
        <% if (shopping_cart.return_origin_point_detailed_info) { %> 
          <% if (shopping_cart.return_origin_point_type === 'location') { %>
            <div class="form-group">
              <label for="detailed_return_origin_address"><?php echo esc_html_x( 'Address or hotel name', 'transfer_checkout', 'mybooking') ?>*</label>
              <textarea class="form-control" name="detailed_return_origin_address" id="detailed_return_origin_address" rows="5" placeholder="<?php echo esc_attr_x( 'Address or hotel name', 'transfer_checkout', 'mybooking') ?>"></textarea>
            </div>
          <% } else { %>
            <div class="form-row">
              <div class="form-group customer_component col-md-6">
                <label for="detailed_return_origin_flight_number"><?php echo esc_html_x( 'Flight or Vessel number', 'transfer_checkout', 'mybooking') ?>*</label>
                <input type="text" class="form-control" name="detailed_return_origin_flight_number" id="detailed_return_origin_flight_number" autocomplete="off" placeholder="<?php echo esc_attr_x( 'Flight number', 'transfer_checkout', 'mybooking') ?>:*" maxlength="50">
              </div>
              <div class="form-group customer_component col-md-6">
                <label for="detailed_return_origin_flight_estimated_time"><?php echo esc_html_x( 'Flight or Vessel estimated time', 'transfer_checkout', 'mybooking') ?>*</label>
                <input type="text" class="form-control" name="detailed_return_origin_flight_estimated_time" autocomplete="off" id="detailed_return_origin_flight_estimated_time" placeholder="<?php echo esc_attr_x( 'Flight estimated time', 'transfer_checkout', 'mybooking') ?>:*" maxlength="50">
              </div>
            </div>
          <% } %>
        <% } %>

        <!-- Return Destination -->
        
        <div class="mb-3"><u><b><i class="fa fa-map-marker"></i>&nbsp;<?php echo esc_html_x( "Drop off", 'transfer_checkout', 'mybooking') ?></b> <%= shopping_cart.return_destination_point_name_customer_translation%></u></div>

        <% if (shopping_cart.return_destination_point_detailed_info) { %> 
          <% if (shopping_cart.return_destination_point_type === 'location') { %>
            <div class="form-group">
              <label for="detailed_return_destination_address"><?php echo esc_html_x( 'Address or hotel name', 'transfer_checkout', 'mybooking') ?>*</label>
              <textarea class="form-control" name="detailed_return_destination_address" id="detailed_return_destination_address" rows="5" placeholder="<?php echo esc_attr_x( 'Address or hotel name', 'transfer_checkout', 'mybooking') ?>"></textarea>
            </div>
          <% } else { %>
            <div class="form-row">
              <div class="form-group customer_component col-md-6">
                <label for="detailed_return_destination_flight_number"><?php echo esc_html_x( 'Flight or Vessel number', 'transfer_checkout', 'mybooking') ?>*</label>
                <input type="text" class="form-control" name="detailed_return_destination_flight_number" id="detailed_return_destination_flight_number" autocomplete="off" placeholder="<?php echo esc_attr_x( 'Flight number', 'transfer_checkout', 'mybooking') ?>:*" maxlength="50">
              </div>
              <div class="form-group customer_component col-md-6">
                <label for="detailed_return_destination_flight_estimated_time"><?php echo esc_html_x( 'Flight or Vessel estimated time', 'transfer_checkout', 'mybooking') ?>*</label>
                <input type="text" class="form-control" name="detailed_return_destination_flight_estimated_time" autocomplete="off" id="detailed_return_destination_flight_estimated_time" placeholder="<?php echo esc_attr_x( 'Flight estimated time', 'transfer_checkout', 'mybooking') ?>:*" maxlength="50">
              </div>
            </div>
          <% } %>
        <% } %>  

      <% } %>

  <% } %>    

  <hr>

  <h5 class="mb-4 complete-section-title"><?php echo esc_html_x( "Additional information", 'transfer_checkout', 'mybooking') ?></h5>

  <div class="form-group">
    <label for="comments"><?php echo esc_html_x( 'Comments', 'transfer_checkout', 'mybooking') ?></label>
    <textarea class="form-control" name="comments" id="comments" rows="5" placeholder="<?php echo esc_attr_x( 'Comments', 'transfer_checkout', 'mybooking') ?>"></textarea>
  </div>
  <br>

  <!-- Reservation : payment (script_payment_detail) -->
  <div id="mybooking_transfer_payment_detail">
  </div>

</script>  


<!-- Reservation summary -->
<script type="text/tmpl" id="script_transfer_reservation_summary">

  <div class="complete-reservation-summary-card ">
    <div class="reservation-summary-sticky-wrapper">
      <div class="reservation-summary-sticky">
        <!-- Transfer type -->
        <% if (shopping_cart.round_trip) { %>
          <span class="mybooking_transfer_reservation-summary_transfer-type">
            <?php echo esc_html_x( 'Round trip', 'transfer_checkout', 'mybooking' ) ?>
            <br>
            <span class="mybooking_transfer_reservation-summary_cost">
              <%=configuration.formatCurrency(shopping_cart.total_cost)%>
            </span>            
          </span>
        <% } else { %>
          <span class="mybooking_transfer_reservation-summary_transfer-type">
            <?php echo esc_html_x( 'One Way', 'transfer_checkout', 'mybooking' ) ?>
            <br>
            <span class="mybooking_transfer_reservation-summary_cost">
              <%=configuration.formatCurrency(shopping_cart.total_cost)%>
            </span>
          </span>
        <% } %>

        <!-- Transfer info -->
        <div class="reservation-summary_info">
          <div class="reservation-summary_block">
            <% if (shopping_cart.round_trip) { %>
              <span class="mybooking_transfer_reservation-summary_transfer-hint">&#8594;</span></span>
              <span><i class="fa fa-calendar"></i>&nbsp;<%=shopping_cart.date%> <%=shopping_cart.time%></span>
              <span><i class="fa fa-car"></i>&nbsp;<%=shopping_cart.origin_point_name%></span>
              <span><i class="fa fa-map-marker"></i>&nbsp;<%=shopping_cart.destination_point_name%></span>
              <br>
              <span class="mybooking_transfer_reservation-summary_transfer-hint">&#8592;</span>
              <span><i class="fa fa-calendar"></i>&nbsp;<%=shopping_cart.return_date%> <%=shopping_cart.return_time%></span>
              <span><i class="fa fa-car"></i>&nbsp;<%=shopping_cart.return_origin_point_name%></span>
              <span><i class="fa fa-map-marker"></i>&nbsp;<%=shopping_cart.return_destination_point_name%></span>
            <% } else { %>
              <span class="mybooking_transfer_reservation-summary_transfer-hint">&#8594;</span>
              <span><i class="fa fa-calendar"></i>&nbsp;<%=shopping_cart.date%> <%=shopping_cart.time%></span>
              <span><i class="fa fa-car"></i>&nbsp;<%=shopping_cart.origin_point_name%></span>
              <span><i class="fa fa-map-marker"></i>&nbsp;<%=shopping_cart.destination_point_name%></span>
            <% } %>
          </div>
          <div class="reservation-summary_block">
            <span><i class="fa fa-user"></i>&nbsp;<%=shopping_cart.number_of_adults%></span>
            <span><i class="fa fa-child"></i>&nbsp;<%=shopping_cart.number_of_children%></span>
            <span><i class="fa fa-baby"></i>&nbsp;<%=shopping_cart.number_of_infants%></span>
          </div>
        </div>

        <!-- Modify transfer -->
        <button id="mybooking_transfer_modify_reservation_button" class="modify-button">
          <i class="d-none d-md-inline mr-2 fas fa-pen"></i>
          <?php echo esc_html_x( 'Edit', 'transfer_checkout', 'mybooking' ) ?>
        </button>

      </div>
    </div>

    <section style="background-color: white;">
      <div class="container product-detail-container">
        <div class="row">
          <div class="col-md-6">

            <!-- Photo -->
            <img class="product-img" src="<%=shopping_cart.item_full_photo%>"/>
          </div>

          <div class="col-md-6 reservation-summary_info">

            <!-- Description -->
            <h3 class="product-detail_title">
              <%=shopping_cart.item_name_customer_translation%>
            </h3>

            <aside class="mybooking-transfer_reservation-summary_details">
              <ul class="mb-list">
                <% if (shopping_cart.round_trip) { %>
                  <li class="mybooking_transfer_reservation-summary_transfer-hint mb-list_item">
                    <?php echo esc_html_x( 'Going', 'transfer_checkout', 'mybooking' ) ?>
                  </li>
                  <li class="mb-list_item"><i class="fa fa-calendar"></i>&nbsp;<%=shopping_cart.date%> <%=shopping_cart.time%></li>
                  <li class="mb-list_item"><i class="fa fa-car"></i>&nbsp;<%=shopping_cart.origin_point_name%></li>
                  <li class="mb-list_item"><i class="fa fa-map-marker"></i>&nbsp;<%=shopping_cart.destination_point_name%></li>
                  <li class="mybooking_transfer_reservation-summary_transfer-hint mb-list_item">
                    <?php echo esc_html_x( 'Return', 'transfer_checkout', 'mybooking' ) ?>
                  </li>
                  <li class="mb-list_item"><i class="fa fa-calendar"></i>&nbsp;<%=shopping_cart.return_date%> <%=shopping_cart.return_time%></li>
                  <li class="mb-list_item"><i class="fa fa-car"></i>&nbsp;<%=shopping_cart.return_origin_point_name%></li>
                  <li class="mb-list_item"><i class="fa fa-map-marker"></i>&nbsp;<%=shopping_cart.return_destination_point_name%></li>
                <% } else { %>
                  <li class="mybooking_transfer_reservation-summary_transfer-hint mb-list_item">
                    <?php echo esc_html_x( 'Going', 'transfer_checkout', 'mybooking' ) ?>
                  </li>
                  <li class="mb-list_item"><i class="fa fa-calendar"></i>&nbsp;<%=shopping_cart.date%> <%=shopping_cart.time%></li>
                  <li class="mb-list_item"><i class="fa fa-car"></i>&nbsp;<%=shopping_cart.origin_point_name%></li>
                  <li class="mb-list_item"><i class="fa fa-map-marker"></i>&nbsp;<%=shopping_cart.destination_point_name%></li>
                <% } %>
              </ul>
              <span><i class="fa fa-user"></i>&nbsp;<%=shopping_cart.number_of_adults%></span>
              <span><i class="fa fa-child"></i>&nbsp;<%=shopping_cart.number_of_children%></span>
              <span><i class="fa fa-baby"></i>&nbsp;<%=shopping_cart.number_of_infants%></span>
            </aside>

            <!-- Extras -->
            <% if (shopping_cart.extras.length > 0) { %>
              <div class="card mb-3">
                <div class="card-header">
                  <b><?php echo esc_html_x( 'Extras', 'transfer_checkout', 'mybooking' ) ?></b>
                </div>
                <ul class="list-group list-group-flush">
                  <% for (var idx=0;idx<shopping_cart.extras.length;idx++) { %>
                  <li class="list-group-item reservation-summary-card-detail">
                    <span class="extra-name"><b><%=shopping_cart.extras[idx].extra_name_customer_translation%></b></span>
                    <span class="badge badge-info"><%=shopping_cart.extras[idx].quantity%></span>
                    <span class="product-amount pull-right"><%=configuration.formatCurrency(shopping_cart.extras[idx].extra_cost)%></span>
                  </li>
                  <% } %>
                </ul>
              </div>
            <% } %>

            <!-- // Supplements -->
            <% if (shopping_cart.supplements.length > 0) { %>
              <div class="card mb-3">
                <div class="card-header">
                  <b><?php echo esc_html_x( 'Supplements', 'transfer_checkout', 'mybooking' ) ?></b>
                </div>
                <ul class="list-group list-group-flush">
                  <% for (var idx=0;idx<shopping_cart.supplements.length;idx++) { %>
                  <li class="list-group-item reservation-summary-card-detail">
                    <span class="extra-name"><b><%=shopping_cart.supplements[idx].supplement_name_customer_translation%></b></span>
                    <span class="badge badge-info">1</span>
                    <span class="product-amount pull-right"><%=configuration.formatCurrency(shopping_cart.supplements[idx].supplement_cost)%></span>
                  </li>
                  <% } %>
                </ul>
              </div>
            <% } %>

          </div>
        </div>
      </div>
    </section>
  </div>

</script>


<!-- Script that shows the extra detail -->
<script type="text/tmpl" id="script_transfer_extra_modal">

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <% for (var idx=0; idx<extra.photos.length; idx++) { %>
            <div class="carousel-item <% if (idx==0) {%>active<%}%>">
              <img class="d-block w-100" src="<%=extra.photos[idx].full_photo_path%>" alt="<%=extra.name%>">
            </div>
            <% } %>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">&lt;</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">&gt;</span>
          </a>
        </div>
        <div class="mt-3 text-muted"><%=extra.description%></div>
      </div>
    </div>
  </div>

</script>

<!-- Payment detail -->
<script type="text/tmpl" id="script_transfer_payment_detail">

    <?php
      $mybooking_engine_privacy_page = get_privacy_policy_url();
    ?>

    <%
       var paymentAmount = 0;
       var selectionOptions = 0;

       if (sales_process.can_request) {
         selectionOptions += 1;
       }

       if (sales_process.can_pay_on_delivery) {
         selectionOptions += 1;
       }

       if (sales_process.can_pay) {
         selectionOptions += 1;
         if (sales_process.can_pay_deposit) {
            paymentAmount = shopping_cart.booking_amount;
         }
         else {
            paymentAmount = shopping_cart.total_cost;
         }
       }
    %>

    <!-- Payment -->

    <% if (sales_process.can_pay) { %>
      <% if (sales_process.payment_methods.paypal_standard && sales_process.payment_methods.tpv_virtual) { %>
        <!-- The payment method will be selected later -->
        <input type="hidden" name="payment" value="none">
      <% } else if (sales_process.payment_methods.paypal_standard) { %>
        <!-- Fixed paypal standard -->
        <input type="hidden" name="payment" value="paypal_standard">
      <% } else  if (sales_process.payment_methods.tpv_virtual) { %>
        <!-- Fixed tpv -->
        <input type="hidden" name="payment" value="<%=sales_process.payment_methods.tpv_virtual%>">
      <% } %>
    <% } else { %>
      <input type="hidden" name="payment" value="none">
    <% } %>

    <% if (selectionOptions > 1) { %>
      <hr>
      <div class="form-row">
         <% if (sales_process.can_request) { %>
           <div class="form-group col-md-12">
             <label for="complete_action_request_reservation">
               <input type="radio" id="complete_action_request_reservation" name="complete_action" value="request_reservation" class="complete_action">&nbsp;
                 <?php echo esc_html_x( 'Request reservation', 'transfer_checkout', 'mybooking' ) ?>
             </label>
           </div>
         <% } %>
         <% if (sales_process.can_pay_on_delivery) { %>
           <div class="form-group col-md-12">
             <label for="payments_paypal_standard">
               <input type="radio" id="complete_action_pay_on_delivery" name="complete_action" value="pay_on_delivery" class="complete_action">&nbsp;
                 <?php echo esc_html_x( 'Book now and pay on arrival', 'transfer_checkout', 'mybooking' ) ?>
             </label>
           </div>
         <% } %>
         <% if (sales_process.can_pay) { %>
           <div class="form-group col-md-12">
             <label for="complete_action_pay_now">
               <input type="radio" id="complete_action_pay_now" name="complete_action" value="pay_now" class="complete_action">&nbsp;
                 <?php echo esc_html_x( 'Book now and pay now', 'transfer_checkout', 'mybooking' ) ?>
             </label>
           </div>
         <% } %>
      </div>
    <% } %>

    <!-- Request reservation -->

    <% if (sales_process.can_request) { %>
      <div id="request_reservation_container" <% if (selectionOptions > 1 || !sales_process.can_request) { %>style="display:none"<%}%>>
          <div class="border p-4">
            <!-- Conditions -->
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="conditions_read_request_reservation">
                  <input type="checkbox" id="conditions_read_request_reservation" name="conditions_read_request_reservation">&nbsp;
                  <?php if ( empty($args['terms_and_conditions']) ) { ?>
                    <?php echo esc_html_x( 'I have read and hereby accept the conditions of transfer', 'transfer_checkout', 'mybooking' ) ?>
                  <?php } else { ?>
                    <?php /* translators: %s: terms and conditions URL */ ?>
                    <?php echo wp_kses_post ( sprintf( _x( 'I have read and hereby accept the <a href="%s" target="_blank">conditions</a> of transfer',
                                                           'transfer_checkout', 'mybooking' ),
                                                       $args['terms_and_conditions'] ) )?>
                  <?php } ?>
                </label>
              </div>
            </div>

            <?php if ( !empty($mybooking_engine_privacy_page) ) { ?>
              <!-- Privacy -->
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="privacy_read_request_reservation">
                    <input type="checkbox" id="privacy_read_request_reservation" name="privacy_read_request_reservation">
                    &nbsp;
                      <?php /* translators: %s: privacy policy URL */ ?>
                      <?php echo wp_kses_post ( sprintf( _x( 'I have read and accept the <a href="%s" target="_blank">privacy policy</a>', 'renting_complete', 'mybooking' ), $mybooking_engine_privacy_page ) )?>
                  </label>
                </div>
              </div>
            <?php } ?>

            <div class="form-row">
              <div class="form-group col-md-12">
                <button type="submit" class="btn btn-primary"><?php echo esc_html_x( 'Request reservation', 'transfer_checkout', 'mybooking' ) ?></button>
              </div>
            </div>
          </div>

      </div>
    <% } %>

    <% if (sales_process.can_pay_on_delivery) { %>
      <!-- Pay on delivery -->
      <div id="payment_on_delivery_container" <% if (selectionOptions > 1 || !sales_process.can_pay_on_delivery) { %>style="display:none"<%}%>>

          <div class="border p-4">
              <!-- Conditions -->
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="conditions_read_payment_on_delivery">
                    <input type="checkbox" id="conditions_read_payment_on_delivery" name="conditions_read_payment_on_delivery">&nbsp;
                    <?php if ( empty($args['terms_and_conditions']) ) { ?>
                      <?php echo esc_html_x( 'I have read and hereby accept the conditions of transfer', 'transfer_checkout', 'mybooking' ) ?>
                    <?php } else { ?>
                      <?php /* translators: %s: terms and conditions URL */ ?>
                      <?php echo wp_kses_post ( sprintf( _x( 'I have read and hereby accept the <a href="%s" target="_blank">conditions</a> of transfer',
                                                             'transfer_checkout', 'mybooking' ),
                                                         $args['terms_and_conditions'] ) ) ?>
                    <?php } ?>
                  </label>
                </div>
              </div>

              <?php if ( !empty($mybooking_engine_privacy_page) ) { ?>
                <!-- Privacy -->
                <div class="form-group col-md-12">
                  <label for="privacy_read_payment_on_delivery">
                    <input type="checkbox" id="privacy_read_payment_on_delivery" name="privacy_read_payment_on_delivery">
                    &nbsp;
                      <?php echo esc_html_x( 'I have read and accept the privacy policy', 'renting_complete', 'mybooking' ) ?>
                    <?php } else { ?>
                      <?php echo wp_kses_post ( sprintf( _x( 'I have read and accept the <a href="%s" target="_blank">privacy policy</a>', 'renting_complete', 'mybooking' ), $mybooking_engine_privacy_page ) )?>
                  </label>
                </div>
              <?php } ?>

              <div class="form-row">
                <div class="form-group col-md-12">
                  <button type="submit" class="btn btn-primary"><?php echo esc_html_x( 'Confirm', 'transfer_checkout', 'mybooking' ) ?></button>
                </div>
              </div>
          </div>

      </div>
    <% } %>

    <% if (sales_process.can_pay) { %>

      <!-- Pay now -->

      <div id="payment_now_container" <% if (selectionOptions > 1 || !sales_process.can_pay) { %>style="display:none"<%}%>>

        <div class="border p-4">
            <h4><%=i18next.t('complete.reservationForm.total_payment', {amount: configuration.formatCurrency(paymentAmount)})%></h4>
            <br>

            <!-- Payment amount -->

            <div class="alert alert-info">
               <p><%=i18next.t('complete.reservationForm.booking_amount',{amount: configuration.formatCurrency(paymentAmount)})%></p>
            </div>

            <% if (sales_process.payment_methods.paypal_standard &&
                   sales_process.payment_methods.tpv_virtual) { %>
                <div class="alert alert-secondary" role="alert">
                  <?php echo wp_kses_post( _x( 'You will be redirected to the <b>payment platform</b> to make the confirmation payment securely. You can use <u>Paypal</u> or <u>credit card</u> to make the payment.', 'transfer_checkout', 'mybooking' ) )?>
                </div>
                <div class="form-row">
                   <div class="form-group col-md-12">
                     <label for="payments_paypal_standard">
                      <input type="radio" id="payments_paypal_standard" name="payment_method_select" class="payment_method_select" value="paypal_standard">&nbsp;<?php echo esc_html_x( 'Paypal', 'transfer_checkout', 'mybooking' ) ?>
                      <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/paypal.png' ) ?>"/>
                     </label>
                   </div>
                   <div class="form-group col-md-12">
                     <label for="payments_credit_card">
                      <input type="radio" id="payments_credit_card" name="payment_method_select" class="payment_method_select" value="<%=sales_process.payment_methods.tpv_virtual%>">&nbsp;<?php echo esc_html_x( 'Credit or debit card', 'transfer_checkout', 'mybooking' ) ?>
                      <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/visa.png' ) ?>"/>
                      <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/mastercard.png' ) ?>"/>
                     </label>
                   </div>
                </div>
                <div id="payment_method_select_error" class="form-row">
                </div>
            <% } else if (sales_process.payment_methods.paypal_standard) { %>
                <div class="alert alert-secondary" role="alert">
                  <?php echo wp_kses_post( _x( 'You will be redirected to <b>Paypal payment platform</b> to make the confirmation payment securely. You can use <u>Paypal</u> or <u>credit card</u> to make the payment.', 'transfer_checkout', 'mybooking' ) ) ?>
                </div>
                <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/paypal.png' ) ?>"/>
                <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/visa.png') ?>"/>
                <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/mastercard.png') ?>"/> 
            <% } else if (sales_process.payment_methods.tpv_virtual) { %>
                <div class="alert alert-secondary" role="alert">
                  <?php echo wp_kses_post( _x( 'You will be redirected to the <b>credit card payment platform</b> to make the confirmation payment securely.' ,
                    'transfer_checkout', 'mybooking' )  )?>
                </div>
                <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/visa.png' ) ?>"/>
                <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/mastercard.png' ) ?>"/>
            <% } %>

            <hr>

            <!-- Conditions -->
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="conditions_read_pay_now">
                  <input type="checkbox" id="conditions_read_pay_now" name="conditions_read_pay_now">&nbsp;
                      <?php if ( empty($args['terms_and_conditions']) ) { ?>
                        <?php echo esc_html_x( 'I have read and hereby accept the conditions of transfer', 'transfer_checkout', 'mybooking' ) ?>
                      <?php } else { ?>
                        <?php /* translators: %s: terms and conditions URL */ ?>
                        <?php echo wp_kses_post ( sprintf( _x( 'I have read and hereby accept the <a href="%s" target="_blank">conditions</a> of transfer',
                                                               'transfer_checkout', 'mybooking' ),
                                                           $args['terms_and_conditions'] ) )?>
                      <?php } ?>
                </label>
              </div>
            </div>

            <?php if ( !empty($mybooking_engine_privacy_page) ) { ?>
              <!-- Privacy -->
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="privacy_read_pay_now">
                    <input type="checkbox" id="privacy_read_pay_now" name="privacy_read_pay_now">
                    &nbsp;
                    <?php echo wp_kses_post ( sprintf( _x( 'I have read and accept the <a href="%s" target="_blank">privacy policy</a>', 'renting_complete', 'mybooking' ), $mybooking_engine_privacy_page ) )?>
                  </label>
                </div>
              </div>
            <?php } ?>

            <div class="form-row">
              <div class="form-group col-md-12">
                <button type="submit" class="btn btn-primary"><%=i18next.t('complete.reservationForm.payment_button',{amount: configuration.formatCurrency(paymentAmount)})%></a>
              </div>
            </div>
        </div>

      </div>
    <% } %>
</script>
