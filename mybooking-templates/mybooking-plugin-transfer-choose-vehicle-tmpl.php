<?php
  /**
   * The Template for showing the transfer select vehicle step - JS Microtemplates
   *
   * This template can be overridden by copying it to your theme /mybooking-templates/mybooking-plugin-transfer-choose-vehicle-tmpl.php
   *
   * @phpcs:disable PHPCompatibility.Miscellaneous.RemovedAlternativePHPTags.MaybeASPOpenTagFound
   * @phpcs:disable Generic.PHP.DisallowAlternativePHPTags.MaybeASPOpenTagFound
   * @phpcs:disable Generic.PHP.DisallowAlternativePHPTags.MaybeASPShortOpenTagFound
   */
?>

<!-- Script detailed for reservation summary -->
<script type="text/tmpl" id="script_transfer_reservation_summary">
  <div class="reservation-summary-sticky-wrapper">
    <div class="reservation-summary-sticky">

      <!-- Transfer type -->
      <% if (shopping_cart.round_trip) { %>
        <span class="mybooking_transfer_reservation-summary_transfer-type">
          <?php echo esc_html_x( 'Round trip', 'transfer_choose_vehicle', 'mybooking' ) ?>
        </span>
      <% } else { %>
        <span class="mybooking_transfer_reservation-summary_transfer-type">
          <?php echo esc_html_x( 'One Way', 'transfer_choose_vehicle', 'mybooking-wp-plugin' ) ?>
        </span>
      <% } %>

      <!-- Transfer info -->
      <div class="reservation-summary_info">
        <div class="reservation-summary_block">
          <% if (!shopping_cart.round_trip) { %>
            <span class="mybooking_transfer_reservation-summary_transfer-hint">&#8594;</span>
            <span><i class="fa fa-calendar"></i>&nbsp;<%=shopping_cart.date%> <%=shopping_cart.time%></span>
            <span><i class="fa fa-car"></i>&nbsp;<%=shopping_cart.origin_point_name%></span>
            <span><i class="fa fa-map-marker"></i>&nbsp;<%=shopping_cart.destination_point_name%></span>
          <% } else { %>
            <span class="mybooking_transfer_reservation-summary_transfer-hint">&#8594;</span></span>
            <span><i class="fa fa-calendar"></i>&nbsp;<%=shopping_cart.date%> <%=shopping_cart.time%></span>
            <span><i class="fa fa-car"></i>&nbsp;<%=shopping_cart.origin_point_name%></span>
            <span><i class="fa fa-map-marker"></i>&nbsp;<%=shopping_cart.destination_point_name%></span>
            <br>
            <span class="mybooking_transfer_reservation-summary_transfer-hint">&#8592;</span>
            <span><i class="fa fa-calendar"></i>&nbsp;<%=shopping_cart.date%> <%=shopping_cart.time%></span>
            <span><i class="fa fa-car"></i>&nbsp;<%=shopping_cart.date%> <%=shopping_cart.time%>: <%=shopping_cart.origin_point_name%></span>
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
        <?php echo esc_html_x( 'Edit', 'renting_choose_product', 'mybooking' ) ?>
      </button>
    </div>
  </div>
</script>

<!-- Script detailed product for choose_product -->
<script type="text/tmpl" id="script_transfer_detailed_product">

  <!-- Search results -->
  <% if (available > 0) { %>
    <h2 class="h5"><%=i18next.t('transfer.chooseVehicle.vehicleFound', {available: available})%></h2>
  <% } else { %>
    <h2 class="h5"><%=i18next.t('transfer.chooseVehicle.vehicleNotFound')%></h2>
  <% } %>

  <div class="cards-static-container">
    <% for (var idx=0;idx<products.length; idx++) { %>
      <% var product = products[idx]; %>
      <div class="card-static-wrapper">
        <div class="card-static">

          <div class="card-static_image-container">
            <% if (product.photo_url) { %>
              <img class="card-img-top js-product-info-btn" src="<%=product.photo_url%>" alt="<%=product.name%>" data-product="<%=product.id%>">
            <% } %>
            <i type="button" class="card-static_info-button fa fa-info-circle js-product-info-btn" data-toggle="modal" data-target="#infoModal" data-product="<%=product.code%>"></i>
          </div>

          <div class="card-static_header">
            <div class="card-static_price">
              <h2 class="card-static_amount">
                <%= configuration.formatCurrency(product.price)%>
              </h2>
            </div>
          </div>

          <div class="card-static_body">
            <h2 class="card-static_product-name" style="margin-bottom: 2rem;"><%=product.name%></h2>
            <button class="btn btn-primary btn-choose-product" data-product="<%=product.id%>"><?php echo _x( 'Book it!', 'renting_choose_product', 'mybooking') ?></button>
            <!-- Context was transfer_choose_vehicle -->
          </div>
        </div>
      </div>
    <% } %>
  </div>
</script>
